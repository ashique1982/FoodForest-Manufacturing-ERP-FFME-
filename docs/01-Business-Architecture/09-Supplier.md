# Supplier (Business Partner Role)

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Business Partner

**Module:** Supplier Management

---

# ১. Purpose

Supplier Module-এর উদ্দেশ্য হলো Company-এর সকল Raw Material Supplier, Product Supplier, Service Provider এবং Vendor-এর সাথে Purchase Relationship, Supply Management, Payment, Payable, Performance এবং Compliance একটি ডিজিটাল কাঠামোর মাধ্যমে পরিচালনা করা।

FFME Architecture অনুযায়ী Supplier কোনো Root Master Entity নয়।

Supplier হলো একটি **Business Partner Role**।

---

# ২. Definition

Supplier হলো এমন একজন ব্যক্তি, প্রতিষ্ঠান অথবা Business Partner, যিনি Company-কে—

* Raw Material
* Finished Product
* Packaging Material
* Spare Parts
* Service

সরবরাহ করেন।

Supplier Company-এর Purchase এবং Payable Relationship-এর অংশ।

---

# ৩. Supplier as Business Partner Role

FFME-তে Supplier একটি Role।

Architecture:

```text id="c8s7ga"
Business Partner

        │

        ├── Supplier

        ├── Customer

        ├── Distributor

        ├── Dealer

        └── Other Roles
```

একজন Business Partner একাধিক Role ধারণ করতে পারবেন।

উদাহরণ:

```text id="h8u5rf"
Business Partner

ABC Trading


Business Roles

✓ Supplier

✓ Customer


Business Type

✓ Wholesaler
```

একই প্রতিষ্ঠানের জন্য আলাদা Supplier এবং Customer Master তৈরি করা হবে না।

---

# ৪. Scope

Supplier Module পরিচালনা করবে—

* Supplier Registration
* Supplier Classification
* Purchase Relationship
* Product Supply
* Quality Management
* Payment Management
* Payable Management
* Supplier Performance
* Supplier History

---

# ৫. Supplier Classification

Supplier-এর ধরন অনুযায়ী Classification থাকবে।

---

## Supplier Type

* Raw Material Supplier
* Packaging Supplier
* Finished Goods Supplier
* Service Provider
* Spare Parts Supplier
* Local Supplier
* Import Supplier

---

## Supply Category

উদাহরণ:

Food Manufacturing:

* Spice Raw Material
* Packaging Material
* Chemical
* Machine Parts

---

# ৬. Supplier Profile

Supplier Profile Business Partner Profile-এর উপর ভিত্তি করে তৈরি হবে।

---

## Basic Information

* Business Partner Code
* Supplier Code
* Supplier Name
* Contact Person
* Mobile Number
* Email
* Website

---

## Business Information

* Business Name
* Business Type
* Supplier Category
* Registration Date
* Status

---

## Legal Information

প্রয়োজন অনুযায়ী—

* Trade License
* BIN
* TIN
* Company Registration
* Import Registration

---

# ৭. Supplier Address & Territory

Supplier-এর Location এবং Business Territory আলাদা Entity হিসেবে পরিচালিত হবে।

---

## Address

সংরক্ষণ করা হবে—

* Country
* Division
* District
* Upazila
* Area
* Full Address

---

## Supplier Territory

Supplier Location ব্যবহার হবে—

* Purchase Planning
* Supplier Analysis
* Delivery Planning
* Supplier Performance

---

# ৮. Supplier Contact Management

একজন Supplier-এর একাধিক Contact Person থাকতে পারে।

---

## Contact Information

* Name
* Designation
* Mobile
* Email
* Preferred Contact Method

---

# ৯. Purchase Relationship

Supplier-এর সাথে Company-এর Purchase Relationship পরিচালিত হবে।

---

## Purchase Information

* Assigned Purchase Officer
* Supplier Category
* Lead Time
* Minimum Order Quantity
* Payment Terms
* Delivery Terms

---

## Purchase Workflow

```text id="4e6c7p"
Purchase Requirement

↓

Purchase Request

↓

Supplier Selection

↓

Purchase Order

↓

Goods Receive

↓

Quality Check

↓

Supplier Bill

↓

Payment

↓

Ledger Update
```

---

# ১০. Supplier Product Management

একজন Supplier একাধিক Product Supply করতে পারবেন।

---

## Product Information

সংরক্ষণ করা হবে—

* Product
* Supplier Code
* Supplier Product Name
* Purchase Price
* Minimum Quantity
* Lead Time

---

# ১১. Multi-UOM Support

Supplier Purchase-এর ক্ষেত্রে Multi-UOM সমর্থিত হবে।

উদাহরণ:

```text id="4u1x0n"
Product

Turmeric


Purchase UOM

50 Kg Bag


Base UOM

Kg
```

System স্বয়ংক্রিয়ভাবে Conversion করবে।

---

# ১২. Quality Management

Supplier Product Quality Monitoring করা হবে।

---

## Quality Information

* Quality Standard
* Inspection Result
* Rejection Rate
* Return History

---

## Quality Workflow

```text id="f0o9cq"
Goods Receive

↓

Quality Inspection

↓

Approved

↓

Rejected

↓

Return / Adjustment
```

---

# ১৩. Supplier Payment & Payable

Supplier Financial Relationship Business Partner Ledger-এর মাধ্যমে পরিচালিত হবে।

---

## Financial Information

* Opening Balance
* Payable Balance
* Payment Terms
* Credit Period
* Advance Payment

---

## Payable Calculation

```text id="6l1d8v"
Previous Payable

+

New Purchase Invoice

-

Payment

=

Current Payable
```

---

# ১৪. Supplier Payment Methods

সমর্থিত হবে—

* Cash
* Bank Transfer
* Cheque
* Mobile Banking
* Online Payment

---

# ১৫. Supplier Return

Purchase Return Workflow:

```text id="1x1b1m"
Return Request

↓

Product Return

↓

Supplier Receive

↓

Debit Adjustment

↓

Ledger Update
```

---

# ১৬. Supplier Performance

Supplier Performance পরিমাপ করা হবে—

* Delivery Time
* Quality Score
* Price Competitiveness
* Supply Reliability
* Payment Terms

---

# ১৭. Supplier Dashboard

Dashboard-এ থাকবে—

## Purchase Summary

* Total Purchase
* Monthly Purchase
* Product Wise Purchase

---

## Financial Summary

* Payable
* Payment History
* Advance Payment

---

## Performance Summary

* Delivery Performance
* Quality Performance
* Supplier Rating

---

# ১৮. Reports

## Purchase Reports

* Supplier Wise Purchase
* Product Wise Purchase
* Monthly Purchase
* Purchase Comparison

---

## Financial Reports

* Payable Report
* Payment Report
* Advance Report

---

## Performance Reports

* Supplier Ranking
* Quality Report
* Delivery Delay Report

---

# ১৯. Business Rules

### Rule 001

Supplier অবশ্যই একটি Business Partner Role হবে।

---

### Rule 002

একটি Business Partner একাধিক Role ধারণ করতে পারবে।

---

### Rule 003

Supplier Code Unique হতে হবে।

---

### Rule 004

Purchase Order ছাড়া Supplier Purchase করা যাবে না।

---

### Rule 005

Goods Receive ছাড়া Supplier Invoice Final করা যাবে না।

---

### Rule 006

Supplier Payment অবশ্যই Ledger Update করবে।

---

### Rule 007

Supplier Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 008

Supplier Product Relationship History সংরক্ষণ করতে হবে।

---

# ২০. Audit Trail

Supplier সম্পর্কিত সকল গুরুত্বপূর্ণ পরিবর্তন Audit Log-এ সংরক্ষণ হবে।

---

## Audit Events

* Supplier Created
* Supplier Updated
* Product Assigned
* Price Changed
* Payment Updated
* Quality Updated
* Status Changed

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ২১. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Supplier Portal
* Supplier Mobile App
* Online Purchase Request
* Supplier Rating System
* AI Supplier Recommendation
* Automated Purchase Planning
* Vendor Contract Management
* Supply Chain Analytics

---

# ২২. Notes

FFME Architecture-এ—

| Entity           | Meaning                             |
| ---------------- | ----------------------------------- |
| Business Partner | ব্যক্তি বা প্রতিষ্ঠান               |
| Supplier Role    | Company-এর সাথে Supply Relationship |
| Business Type    | Partner-এর ব্যবসার ধরন              |
| Product          | যে পণ্য সরবরাহ করে                  |
| Purchase Order   | ক্রয়ের অনুমোদন                     |
| Supplier Ledger  | আর্থিক হিসাব                        |

Supplier এবং Business Partner একই বিষয় নয়।

Supplier হলো Business Partner-এর একটি Role।

---

# ২৩. Related Documents

* Architecture.md
* ADR-0003 Shared Masters
* ADR-0004 Business Partner Roles
* ADR-0005 Territory Model
* ADR-0006 Multi-UOM
* Business Partner
* Customer
* Distributor
* Purchase
* Inventory
* Manufacturing
* Finance

---

# ২৪. Conclusion

Supplier Module FFME-এর Supply Chain এবং Manufacturing Process-এর গুরুত্বপূর্ণ অংশ।

Business Partner Architecture ব্যবহার করার কারণে—

* Duplicate Supplier তৈরি হবে না।
* Supplier এবং Customer Relationship একসাথে পরিচালনা করা যাবে।
* Purchase এবং Finance Integration সহজ হবে।
* Supplier Performance বিশ্লেষণ করা যাবে।
* Future Supply Chain Expansion সহজ হবে।

FFME-তে Supplier হলো:

**Business Partner → Supplier Role**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `10-Dealer.md`
