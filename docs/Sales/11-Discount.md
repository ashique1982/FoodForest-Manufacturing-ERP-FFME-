# Discount Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Discount Management

---

# ১. Purpose

Discount Module-এর উদ্দেশ্য হলো FFME ERP-তে বিভিন্ন ধরনের Discount Rule তৈরি, নিয়ন্ত্রণ, অনুমোদন এবং প্রয়োগ করা।

Discount Sales Process-এর বিভিন্ন পর্যায়ে প্রয়োগ হতে পারে এবং প্রতিটি Discount-এর নিজস্ব Business Rule থাকবে।

---

# ২. Definition

Discount হলো Product Price বা Payable Amount থেকে অনুমোদিত Reduction।

Discount সরাসরি Price পরিবর্তন নয়।

এটি একটি Adjustment Mechanism।

---

# ৩. Discount Philosophy

FFME-তে Discount বিভিন্ন Business Stage-এ হতে পারে।

```text id="disc001"
Order Stage

↓

Sales Stage

↓

Collection Stage
```

---

# ৪. Discount Types

## ৪.১ Fixed Discount

নির্দিষ্ট Amount কমানো।

Example:

Product Value:

10,000 BDT

Discount:

500 BDT

Final:

9,500 BDT

---

## ৪.২ Percentage Discount

Percentage হিসেবে Discount।

Example:

Amount:

10,000 BDT

Discount:

10%

Final:

9,000 BDT

---

# ৫. Discount Application Stage

---

# ৫.১ Order Discount

Order তৈরির সময় Discount।

Flow:

```text id="disc002"
Customer Order

↓

Apply Discount

↓

Sales Order

↓

Convert To Sales
```

ব্যবহার:

* Customer Negotiation
* Sales Representative Offer
* Contract Discount

---

# ৫.২ Sales Discount

Sales Invoice তৈরির সময় Discount।

Flow:

```text id="disc003"
Sales

↓

Apply Discount

↓

Invoice Amount Adjustment
```

ব্যবহার:

* Approved Sales Discount
* Channel Discount
* Promotion Discount

---

# ৫.৩ Collection Discount

Payment Settlement-এর সময় Discount।

Flow:

```text id="disc004"
Customer Due

↓

Early Payment

↓

Settlement Discount

↓

Collection
```

ব্যবহার:

* Early Payment Discount
* Cash Discount
* Settlement Discount

Example:

Due:

100,000 BDT

Payment within 7 days:

Discount 2%

Pay:

98,000 BDT

---

# ৬. Discount Architecture

```text id="disc005"
Product

+

Customer

+

Role

+

Channel

+

Quantity

+

Date

+

Payment Condition

↓

Discount Rule

↓

Applicable Discount

↓

Transaction
```

---

# ৭. Discount Scope

Discount প্রয়োগ হতে পারে—

## Product Level

একটি নির্দিষ্ট Product-এর জন্য।

---

## Category Level

একটি Category-এর সব Product-এর জন্য।

---

## Brand Level

নির্দিষ্ট Brand-এর জন্য।

---

## Invoice Level

পুরো Invoice-এর উপর।

---

## Customer Level

নির্দিষ্ট Customer-এর জন্য।

---

## Distributor Level

Distributor Scheme অনুযায়ী।

---

# ৮. Quantity Based Discount

Quantity অনুযায়ী Discount পরিবর্তন হতে পারে।

Example:

| Quantity | Discount |
| -------- | -------- |
| 1-10     | 5%       |
| 11-50    | 10%      |
| 51+      | 15%      |

---

# ৯. Promotion Discount

নির্দিষ্ট সময়ের জন্য Discount।

Example:

Eid Campaign

```text id="disc006"
Start:
01 June

End:
15 June

Discount:
20%
```

সময় শেষ হলে Automatic Disable হবে।

---

# ১০. Customer Specific Discount

বিশেষ Customer-এর জন্য আলাদা Discount।

Example:

Corporate Customer:

10%

Regular Customer:

5%

---

# ১১. Role Based Discount Permission

সব User Discount দিতে পারবে না।

Example:

## Sales Representative

Maximum:

5%

---

## Sales Manager

Maximum:

15%

---

## Director

Unlimited Approval

---

# ১২. Discount Approval Workflow

```text id="disc007"
Create Discount

↓

Review

↓

Approve

↓

Active
```

---

# ১৩. Multiple Discount Rule

একাধিক Discount থাকলে Priority অনুযায়ী কাজ করবে।

Default Priority:

```text id="disc008"
Customer Contract Discount

↓

Promotion Discount

↓

Quantity Discount

↓

Channel Discount

↓

Manual Discount
```

---

# ১৪. Discount Calculation Rule

System সংরক্ষণ করবে—

* Original Amount
* Discount Amount
* Discount Percentage
* Final Amount

---

# ১৫. Accounting Integration

Discount অনুযায়ী Accounting Adjustment হবে।

Example:

Sales:

100,000

Discount:

10,000

Net Sales:

90,000

---

# ১৬. Collection Discount Accounting

Early Payment Discount হলে—

Adjustment Entry তৈরি হবে।

---

# ১৭. Discount Visibility

User Role অনুযায়ী Discount দেখা যাবে।

Example:

Customer দেখতে পারে:

Final Price

কিন্তু দেখতে নাও পারে:

Internal Discount Margin

---

# ১৮. Business Rules

### Rule DC-001

Discount Price পরিবর্তন করবে না, Adjustment করবে।

---

### Rule DC-002

Unauthorized User Discount দিতে পারবে না।

---

### Rule DC-003

Maximum Discount Limit Role অনুযায়ী হবে।

---

### Rule DC-004

Expired Discount Automatically Disable হবে।

---

### Rule DC-005

Applied Discount Transaction History-তে সংরক্ষণ হবে।

---

### Rule DC-006

Collection Discount শুধুমাত্র Approved Payment Condition অনুযায়ী হবে।

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* Discount Created
* Discount Approved
* Discount Applied
* Discount Changed
* Discount Removed

---

# ২০. Reports

## Discount Register

* All Discount

---

## Discount Analysis

* Product Wise
* Customer Wise
* Salesperson Wise

---

## Discount Impact Report

* Sales Before Discount
* Discount Amount
* Net Sales

---

## Approval Report

* Pending Approval
* Approved Discount

---

# ২১. Future Expansion

* AI Discount Recommendation
* Customer Behaviour Based Discount
* Dynamic Discount
* Loyalty Discount
* Membership Discount
* Auto Campaign Discount
* Competitor Based Pricing

---

# ২২. Notes

FFME Discount Engine:

```text id="disc009"
Order Discount

↓

Sales Discount

↓

Collection Discount

↓

Accounting Adjustment
```

Discount শুধুমাত্র Sales-এর বিষয় নয়।

এটি Pricing, Customer Relationship, Finance এবং Profitability-এর সাথে সরাসরি যুক্ত।

---

# ২৩. Related Documents

* Pricing
* Sales Order
* Sales
* Collection
* Customer
* Distributor
* Promotion
* Product
* Category
* Brand
* Ledger
* Journal

---

# ২৪. Conclusion

Discount Module FFME ERP-এর Commercial Control System।

এর মাধ্যমে—

* Flexible Discount Management
* Multi Stage Discount
* Role Based Approval
* Promotion Control
* Profit Protection

নিশ্চিত হবে।

FFME-তে Discount হলো:

**Right Customer → Right Condition → Right Time → Right Discount**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `12-Promotion.md`
