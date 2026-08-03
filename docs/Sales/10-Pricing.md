# Pricing Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Pricing Management

---

# ১. Purpose

Pricing Module-এর উদ্দেশ্য হলো FFME ERP-তে Product-এর বিভিন্ন ধরনের Price পরিচালনা, নিয়ন্ত্রণ, অনুমোদন এবং Role Based Visibility নিশ্চিত করা।

একই Product-এর একাধিক Price থাকতে পারে এবং প্রত্যেক User শুধুমাত্র তার Permission অনুযায়ী নির্ধারিত Price দেখতে পারবে।

---

# ২. Pricing Philosophy

FFME-তে Price শুধুমাত্র একটি সংখ্যা নয়।

Price নির্ভর করতে পারে—

* Customer Type
* Business Partner Role
* Sales Channel
* Territory
* Quantity
* Date Range
* Promotion
* Contract
* User Permission

---

# ৩. Core Pricing Rule

## One Product → Multiple Prices

একটি Product-এর থাকতে পারে—

* Production Cost
* Factory Price
* Distributor Price
* Wholesale Price
* Retail Price
* MRP
* Promotional Price
* Special Customer Price
* Export Price

---

# ৪. Price Visibility Rule

সব User সব Price দেখতে পারবে না।

Price Visibility Role Based হবে।

---

## Example

Product:

Premium Turmeric Powder 500g

Price:

| Price Type        | Amount  | Visible To         |
| ----------------- | ------- | ------------------ |
| Production Cost   | 120 BDT | Production Manager |
| Factory Price     | 150 BDT | Authorized Staff   |
| Distributor Price | 170 BDT | Distributor Sales  |
| Wholesale Price   | 190 BDT | Wholesale Customer |
| Retail Price      | 220 BDT | Retail Customer    |
| MRP               | 250 BDT | Customer           |
| Promotion Price   | 200 BDT | Campaign Users     |

---

# ৫. Pricing Architecture

```text
Product

↓

Price Rules

↓

Customer / Role / Channel

↓

Applicable Price

↓

Sales Transaction
```

---

# ৬. Price Types

FFME সমর্থন করবে—

## Production Cost

ব্যবহার:

* Manufacturing Cost
* Cost Analysis
* Profit Calculation

Visibility:

* Production
* Costing
* Finance Authorized User

---

## Factory Price

ব্যবহার:

* Internal Transfer
* Distributor Supply

Visibility:

* Authorized Business User

---

## Distributor Price

ব্যবহার:

* Authorized Distributor Sales

Visibility:

* Distributor Sales Team

---

## Wholesale Price

ব্যবহার:

* Wholesale Customer

Visibility:

* Wholesale Channel

---

## Retail Price

ব্যবহার:

* Retail Sales

Visibility:

* Retail Channel

---

## MRP

ব্যবহার:

* Customer Display Price

Visibility:

* Customer

---

## Promotion Price

ব্যবহার:

* Campaign
* Discount Offer

Visibility:

* Defined Period

---

# ৭. Role Based Price Access

User Role অনুযায়ী Price Access হবে।

Example:

## Production Manager

দেখবে:

✓ Production Cost

✓ Manufacturing Margin

দেখবে না:

Distributor Price

---

## Distributor

দেখবে:

✓ Distributor Price

দেখবে না:

Production Cost

---

## Retail Customer

দেখবে:

✓ Retail Price

✓ Promotion Price

দেখবে না:

Wholesale Price

---

# ৮. Time Based Pricing

Price নির্দিষ্ট সময়ের জন্য Active হতে পারে।

Example:

Eid Campaign

```text
Start Date:
01 June

End Date:
15 June

Promotion Price:
199 BDT
```

সময় শেষ হলে Automatic Regular Price Active হবে।

---

# ৯. Quantity Based Pricing

পরিমাণ অনুযায়ী Price পরিবর্তন হতে পারে।

Example:

| Quantity   | Price |
| ---------- | ----- |
| 1-10 pcs   | 100   |
| 11-100 pcs | 95    |
| 101+ pcs   | 90    |

---

# ১০. Customer Specific Pricing

বিশেষ Customer-এর জন্য আলাদা Price হতে পারে।

Example:

Corporate Customer:

Product Price:

Special Contract Price

---

# ১১. Territory Based Pricing

এলাকা অনুযায়ী Price পরিবর্তন হতে পারে।

Example:

* Dhaka Price
* Sylhet Price
* Chittagong Price

---

# ১২. Channel Based Pricing

Sales Channel অনুযায়ী Price:

* Distributor
* Wholesale
* Retail
* Online
* POS

---

# ১৩. Pricing Priority

একাধিক Price Rule থাকলে Priority অনুযায়ী নির্বাচন হবে।

Default Priority:

```
Customer Specific

↓

Contract Price

↓

Promotion Price

↓

Quantity Price

↓

Channel Price

↓

Standard Price
```

---

# ১৪. Sales Integration

Sales তৈরি হওয়ার সময় System Automatically Applicable Price নির্বাচন করবে।

Flow:

```
Customer

↓

Role

↓

Channel

↓

Date

↓

Quantity

↓

Applicable Price

↓

Sales
```

---

# ১৫. Price Approval Workflow

নতুন Price তৈরির ক্ষেত্রে:

```
Draft

↓

Review

↓

Approval

↓

Active
```

---

# ১৬. Price History

System সংরক্ষণ করবে—

* Previous Price
* New Price
* Effective Date
* Changed By
* Approval Person

---

# ১৭. Business Rules

### Rule PR-001

একটি Product-এর Multiple Price থাকতে পারে।

---

### Rule PR-002

Production Cost সাধারণ User দেখতে পারবে না।

---

### Rule PR-003

Price Visibility Role Based হবে।

---

### Rule PR-004

Expired Promotion Price Automatically Disable হবে।

---

### Rule PR-005

Sales Transaction-এ Price Snapshot সংরক্ষণ হবে।

---

### Rule PR-006

পুরাতন Price History Delete করা যাবে না।

---

### Rule PR-007

Unauthorized User Price Edit করতে পারবে না।

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Price Created
* Price Updated
* Price Approved
* Price Activated
* Price Expired
* Price Used In Sale

---

# ১৯. Reports

## Price List Report

* Product Wise
* Channel Wise

---

## Price Change Report

* Old vs New Price

---

## Margin Report

* Cost vs Sales Price

---

## Promotion Report

* Active Promotion Price

---

## Profitability Report

* Product Margin
* Customer Margin

---

# ২০. Future Expansion

* AI Dynamic Pricing
* Market Price Monitoring
* Competitor Price Analysis
* Automatic Margin Control
* Demand Based Pricing
* Customer Segmentation Pricing

---

# ২১. Notes

FFME Pricing Engine-এর মূল নীতি:

```
One Product

↓

Multiple Prices

↓

Controlled Visibility

↓

Role Based Access

↓

Correct Sales Price
```

Pricing শুধু Sales-এর অংশ নয়।

এটি Manufacturing Cost, Inventory Valuation, Finance এবং Profit Analysis-এর সাথে সরাসরি যুক্ত।

---

# ২২. Related Documents

* Sales Overview
* Sales Order
* Sales
* Product
* Customer
* Distributor
* Category
* Brand
* Costing
* Manufacturing
* Finance
* Permission
* Role Management

---

# ২৩. Conclusion

Pricing Module FFME ERP-এর Commercial Control Layer।

এর মাধ্যমে—

* Multiple Price Management
* Role Based Visibility
* Promotion Control
* Customer Specific Pricing
* Profit Protection

নিশ্চিত হবে।

FFME-তে Pricing হলো:

**Right Product → Right Customer → Right Time → Right Price**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `11-Discount.md`
