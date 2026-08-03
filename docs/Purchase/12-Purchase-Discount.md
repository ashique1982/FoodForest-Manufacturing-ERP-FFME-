# Purchase Discount Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Discount

---

# ১. Purpose

Purchase Discount Module-এর উদ্দেশ্য হলো Supplier কর্তৃক প্রদত্ত সকল ধরনের Discount পরিচালনা করা, Purchase Cost সঠিকভাবে নির্ধারণ করা এবং Financial ও Inventory Valuation-এ সঠিক প্রভাব প্রয়োগ করা।

FFME-তে Discount শুধুমাত্র একটি Amount নয়, বরং Procurement Strategy-এর একটি গুরুত্বপূর্ণ অংশ।

---

# ২. Business Philosophy

একটি Purchase-এ একাধিক Discount একসাথে থাকতে পারে।

উদাহরণ—

* Supplier Discount
* Quantity Discount
* Promotional Discount
* Cash Discount
* Year-End Rebate
* Special Agreement Discount

প্রতিটি Discount আলাদাভাবে সংরক্ষণ করা হবে।

---

# ৩. Discount Workflow

```text id="pd001"
Supplier Quotation

↓

Purchase Order

↓

Purchase Invoice

↓

Discount Verification

↓

Purchase Cost

↓

Inventory Cost
```

---

# ৪. Discount Types

FFME নিম্নলিখিত Discount সমর্থন করবে।

## Fixed Discount

উদাহরণ

৫,০০০ টাকা Discount

---

## Percentage Discount

উদাহরণ

১০%

---

## Line Discount

শুধুমাত্র একটি Product-এর উপর প্রযোজ্য।

---

## Invoice Discount

পুরো Invoice-এর উপর প্রযোজ্য।

---

## Quantity Discount

নির্দিষ্ট Quantity-এর বেশি Purchase করলে।

---

## Promotional Discount

নির্দিষ্ট সময়ের জন্য।

---

## Seasonal Discount

ঋতুভিত্তিক।

---

## Contract Discount

চুক্তিভিত্তিক।

---

## Cash Discount

নির্দিষ্ট সময়ের মধ্যে Payment করলে।

---

## Rebate

মাসিক / ত্রৈমাসিক / বাৎসরিক Purchase Target পূরণ করলে।

---

## Special Discount

ম্যানুয়ালি প্রদত্ত বিশেষ Discount।

---

# ৫. Discount Profile

* Discount Name
* Discount Type
* Supplier
* Product (Optional)
* Currency
* Discount Value
* Effective Date
* Expiry Date
* Status

---

# ৬. Discount Scope

Discount প্রযোজ্য হতে পারে—

* নির্দিষ্ট Product
* Product Category
* Brand
* Supplier
* Purchase Order
* Purchase Invoice
* সম্পূর্ণ Purchase

---

# ৭. Discount Priority

যদি একাধিক Discount থাকে—

Priority অনুযায়ী Apply হবে।

Example

```text id="pd002"
Contract Discount

↓

Quantity Discount

↓

Promotional Discount

↓

Cash Discount
```

Priority Admin Configuration থেকে পরিবর্তনযোগ্য হবে।

---

# ৮. Quantity Discount

Example

| Quantity | Discount |
| -------: | -------: |
|   100 Kg |       2% |
|   500 Kg |       5% |
|  1000 Kg |       8% |

---

# ৯. Invoice Discount

উদাহরণ

Invoice

100,000

Invoice Discount

5,000

Net Purchase

95,000

---

# ১০. Line Discount

Product A

100 টাকা

Discount

10%

Net

90 টাকা

---

# ১১. Cash Discount

Supplier Payment ১০ দিনের মধ্যে করলে—

2% Cash Discount।

Cash Discount সাধারণত Inventory Cost পরিবর্তন করবে না, এটি Finance Module-এ Financial Gain হিসেবে বিবেচিত হতে পারে (Accounting Policy অনুযায়ী কনফিগারযোগ্য)।

---

# ১২. Rebate Management

Example

বাৎসরিক Purchase

50,00,000 টাকা

↓

Supplier Rebate

2%

↓

Rebate Amount

1,00,000 টাকা

Rebate তাৎক্ষণিক Discount নয়।

এটি পরবর্তী Settlement-এর সময় Adjust হতে পারে।

---

# ১৩. Purchase Cost Impact

Inventory Cost-এ অন্তর্ভুক্ত হবে—

* Line Discount
* Invoice Discount
* Quantity Discount
* Contract Discount

Cash Discount ও Year-End Rebate Accounting Policy অনুযায়ী Inventory Cost-এ অন্তর্ভুক্ত হবে কি না, System Configuration দ্বারা নির্ধারিত হবে।

---

# ১৪. Approval

Manual Discount Approval Workflow

```text id="pd003"
Manual Discount

↓

Approval

↓

Applied
```

---

# ১৫. Multi Currency

বিদেশি Supplier-এর Discount Base Currency-তেও সংরক্ষণ হবে।

---

# ১৬. Status

সম্ভাব্য Status

* Draft
* Active
* Expired
* Suspended
* Cancelled

---

# ১৭. Business Rules

### Rule PD-001

একটি Purchase-এ একাধিক Discount থাকতে পারবে।

---

### Rule PD-002

Discount Priority অনুযায়ী Apply হবে।

---

### Rule PD-003

Expired Discount Apply হবে না।

---

### Rule PD-004

Manual Discount Role Permission অনুযায়ী হবে।

---

### Rule PD-005

Historical Discount কখনও Delete হবে না।

---

### Rule PD-006

Cash Discount Payment-এর সময় কার্যকর হবে।

---

### Rule PD-007

Rebate তাৎক্ষণিক Discount নয়।

---

# ১৮. Reports

* Supplier Discount Report
* Product Discount Report
* Quantity Discount Report
* Cash Discount Report
* Rebate Report
* Expired Discount Report
* Purchase Discount Analysis

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* Discount Created
* Discount Updated
* Discount Approved
* Discount Applied
* Discount Expired
* Manual Override

---

# ২০. Future Expansion

* AI Discount Optimization
* Supplier Campaign
* Automatic Rebate Calculation
* Seasonal Discount Engine
* Dynamic Quantity Discount

---

# ২১. Notes

FFME Purchase Pricing Model

```text id="pd004"
Supplier Price

↓

Purchase Discount

↓

Net Purchase Price

↓

Landed Cost

↓

Inventory Cost
```

Discount Purchase Cost কমায়, তবে সব ধরনের Discount Inventory Cost-এ একইভাবে প্রভাব ফেলে না। এটি System Configuration ও Accounting Policy অনুযায়ী নিয়ন্ত্রিত হবে।

---

# ২২. Related Documents

* Purchase Pricing
* Purchase Quotation
* Purchase Order
* Purchase
* Supplier
* Finance
* Inventory
* Costing

---

# ২৩. Conclusion

Purchase Discount Module হলো FFME ERP-এর Procurement Cost Optimization Engine।

এর মাধ্যমে—

* Multiple Discount
* Contract Benefit
* Quantity Benefit
* Cash Discount
* Rebate Management
* Accurate Purchase Cost

নিশ্চিত করা হবে।

FFME-তে Purchase Discount হলো:

**Supplier Benefit → Cost Reduction → Accurate Procurement Value**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**End of Purchase Module Documentation**
