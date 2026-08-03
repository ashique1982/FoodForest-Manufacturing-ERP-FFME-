# Sales Order Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Sales Order Management

---

# ১. Purpose

Sales Order Module-এর উদ্দেশ্য হলো Retail Customer, Dealer, Corporate Customer, Sales Representative অথবা Online Channel থেকে প্রাপ্ত Order গ্রহণ, যাচাই (Review), সম্পাদনা (Edit) এবং Sales-এ রূপান্তর (Convert to Sales) করা।

Sales Order কখনো Inventory কমাবে না।

---

# ২. Definition

Sales Order হলো Customer কর্তৃক প্রদত্ত পণ্য ক্রয়ের আনুষ্ঠানিক অনুরোধ।

এটি একটি Business Commitment Document।

Financial Transaction বা Inventory Transaction নয়।

---

# ৩. Sales Order Philosophy

FFME-তে Sales Order এবং Demand একই Sales Engine ব্যবহার করলেও তাদের উৎস (Source) ভিন্ন।

| Document    | Source                            |
| ----------- | --------------------------------- |
| Demand      | Distributor / Branch              |
| Sales Order | Retail Customer / Dealer / Online |

দুটি Document-ই পরবর্তীতে **Convert To Sales** হবে।

---

# ৪. Sales Order Architecture

```text id="order001"
Customer

↓

Sales Order

↓

Review

↓

Edit

↓

Approval

↓

Convert To Sales
```

---

# ৫. Sales Order Profile

## Basic Information

* Sales Order Number
* Order Date
* Customer
* Sales Representative
* Branch
* Territory
* Status

---

## Product Information

প্রতিটি Item-এর জন্য—

* Product
* UOM
* Ordered Quantity
* Unit Price
* Discount (Optional)
* Remarks

---

## Summary

* Total Items
* Total Quantity
* Gross Amount
* Discount
* Net Amount
* Expected Delivery Date

---

# ৬. Sales Order Sources

Sales Order আসতে পারে—

* Sales Representative
* Retail Customer
* Dealer
* Corporate Customer
* POS (Optional)
* Online Shop
* Mobile App
* Phone Order

---

# ৭. Sales Order Workflow

```text id="order002"
Draft

↓

Submitted

↓

Under Review

↓

Approved

↓

Convert To Sales

↓

Closed
```

---

# ৮. Order Review

Review-এর সময় যাচাই করা হবে—

* Customer Credit Limit
* Product Availability
* Reserved Stock
* Sales Policy
* Pricing
* Discount Policy

---

# ৯. Quantity Adjustment

যদি Stock কম থাকে—

Customer Order

```text id="order003"
Oil     20

Sugar   10

Salt    15
```

Available Stock

```text id="order004"
Oil     20

Sugar    5

Salt    15
```

Sales হবে

```text id="order005"
Oil     20

Sugar    5

Salt    15
```

Pending থাকবে

```text id="order006"
Sugar    5
```

---

# ১০. Partial Order

একটি Sales Order একাধিক Partial Sales সমর্থন করবে।

উদাহরণ—

Order

100

Sales

40

Sales

30

Sales

30

Order তখন সম্পূর্ণ Close হবে।

---

# ১১. Backorder

Pending Quantity Backorder হিসেবে সংরক্ষণ হবে।

নতুন Stock এলে Backorder থেকে পুনরায় Sales তৈরি করা যাবে।

---

# ১২. Convert To Sales

Convert করার সময়—

* Quantity পরিবর্তন
* Warehouse নির্বাচন
* Discount সংশোধন (Permission অনুযায়ী)
* Delivery Date পরিবর্তন

সম্ভব।

Convert সম্পন্ন হলে—

* Sales Document তৈরি হবে
* Inventory Deduction শুরু হবে

---

# ১৩. Inventory Integration

Sales Order কখনো—

* Stock কমাবে না
* Inventory Ledger Update করবে না

Inventory শুধুমাত্র Sales Document থেকে কমবে।

---

# ১৪. Delivery Integration

Sales তৈরি হওয়ার পর—

* Delivery Note
* Delivery
* Collection

Workflow শুরু হবে।

---

# ১৫. Reports

## Sales Order Register

* Open Orders
* Closed Orders

---

## Pending Orders

* Pending Quantity
* Pending Value

---

## Customer Order Report

* Customer Wise

---

## Product Order Report

* Product Wise
* Brand Wise

---

## Sales Representative Report

* Orders by Salesperson

---

# ১৬. Business Rules

### Rule SO-001

Sales Order Number Unique হবে।

---

### Rule SO-002

Sales Order Inventory কমাবে না।

---

### Rule SO-003

Approved Sales Order Sales-এ Convert করা যাবে।

---

### Rule SO-004

একটি Order একাধিক Partial Sales সমর্থন করবে।

---

### Rule SO-005

Pending Quantity Backorder হিসেবে থাকবে।

---

### Rule SO-006

Sales Order Delete করা যাবে না।

Cancelled করা যাবে।

---

### Rule SO-007

Customer Credit Policy অনুযায়ী Approval বাধ্যতামূলক হতে পারে।

---

# ১৭. Audit Trail

সংরক্ষণ হবে—

* Order Created
* Order Submitted
* Order Approved
* Quantity Changed
* Discount Changed
* Converted To Sales
* Cancelled

---

# ১৮. Future Expansion

* AI Order Suggestion
* Customer Buying Pattern
* Auto Pricing
* Mobile Sales App
* Voice Order
* WhatsApp Order Integration
* E-commerce Integration

---

# ১৯. Notes

Sales Order Module মূলত Retail ও Direct Sales-এর জন্য।

Distributor Flow-তে **Demand Module** ব্যবহার হবে।

দুটি Module একই Sales Conversion Engine ব্যবহার করবে।

---

# ২০. Related Documents

* Sales Overview
* Demand
* Sales
* Customer
* Product
* Pricing
* Discount
* Warehouse
* Inventory
* Delivery
* Collection

---

# ২১. Conclusion

Sales Order Module FFME ERP-এর Retail ও Direct Sales Entry Point।

এর মাধ্যমে Customer Order সংগ্রহ করা হবে, যাচাই করা হবে এবং প্রয়োজন অনুযায়ী সম্পাদনা করে **Convert To Sales** করা হবে।

Sales Order নিজে কোনো Inventory বা Financial Transaction তৈরি করে না।

Inventory Movement শুরু হবে শুধুমাত্র **Sales Document** তৈরির পর।

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `04-Sales.md`
