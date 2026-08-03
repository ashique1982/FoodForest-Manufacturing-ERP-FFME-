# Purchase Return Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Return

---

# ১. Purpose

Purchase Return Module-এর উদ্দেশ্য হলো Supplier-এর নিকট প্রাপ্ত পণ্য সম্পূর্ণ বা আংশিক ফেরত পাঠানো, Inventory পুনঃসমন্বয় করা, Supplier Payable সমন্বয় করা এবং Purchase Transaction সংশোধন করা।

Purchase Return সবসময় Approved Purchase-এর বিপরীতে হবে।

---

# ২. Business Philosophy

সব Purchase Return মানেই ভুল Purchase নয়।

Purchase Return হতে পারে—

* নিম্নমানের পণ্য
* ক্ষতিগ্রস্ত পণ্য
* অতিরিক্ত সরবরাহ
* ভুল Product
* ভুল Specification
* Expired Product
* Supplier Recall
* Warranty Return

---

# ৩. Purchase Return Workflow

```text id="prt001"
Purchase

↓

Return Request

↓

Approval

↓

Return Delivery

↓

Supplier Receive

↓

Debit Note

↓

Purchase Adjustment

↓

Supplier Ledger Adjustment
```

---

# ৪. Purchase Return Definition

Purchase Return হলো Supplier-এর নিকট পূর্বে ক্রয়কৃত Product সম্পূর্ণ বা আংশিক ফেরত পাঠানোর আনুষ্ঠানিক প্রক্রিয়া।

---

# ৫. Purchase Return Sources

Return শুরু হতে পারে—

* Warehouse
* Quality Control
* Production
* Inventory Audit
* Management
* Supplier Recall Notice

---

# ৬. Return Profile

## Basic Information

* Purchase Return Number
* Return Date
* Supplier
* Warehouse
* Status

---

## Reference

* Purchase Number
* Purchase Order
* GRN
* Supplier Invoice

---

## Product Information

প্রতিটি Line-এ থাকবে—

* Product
* Batch
* Quantity Purchased
* Quantity Returned
* Return Price
* Return Amount

---

# ৭. Return Reasons

FFME Standard Return Reasons

* Damaged
* Wrong Product
* Wrong Quantity
* Wrong Specification
* Poor Quality
* Expired
* Manufacturing Defect
* Supplier Recall
* Other

Return Reason বাধ্যতামূলক হবে।

---

# ৮. Partial Return

একটি Purchase-এর আংশিক Return করা যাবে।

Example

Purchased

1000 Kg

Returned

250 Kg

Remaining

750 Kg

---

# ৯. Full Return

সম্পূর্ণ Purchase Return করা যাবে।

Example

Purchased

500 Kg

Returned

500 Kg

Purchase Closed

---

# ১০. Batch Return

Batch ভিত্তিক Product-এর ক্ষেত্রে নির্দিষ্ট Batch Return করা হবে।

Example

Batch

CH-2026-001

↓

Return

200 Kg

---

# ১১. Inventory Adjustment

Approved Purchase Return হলে—

Returned Quantity Inventory থেকে কমে যাবে।

Rejected Return Inventory-তে থাকবে।

---

# ১২. Supplier Ledger Adjustment

Purchase Return Approved হলে—

Supplier Payable কমে যাবে।

যদি Payment হয়ে থাকে—

* Refund
* Credit Adjustment
* Future Purchase Adjustment

হতে পারে।

---

# ১৩. Financial Integration

Purchase Return-এর পরে—

* Inventory Value কমবে
* Supplier Payable কমবে
* Cost পুনঃসমন্বয় হবে

---

# ১৪. Manufacturing Integration

যদি Raw Material Production-এ ব্যবহার না হয়ে থাকে—

সেটি Return করা যাবে।

যদি Production-এ Consume হয়ে যায়—

সাধারণ Purchase Return করা যাবে না।

---

# ১৫. Debit Note Integration

Approved Purchase Return থেকে Debit Note তৈরি করা যাবে।

Debit Note Supplier-এর নিকট Financial Claim হিসেবে ব্যবহৃত হবে।

---

# ১৬. Replacement Management

Supplier Return-এর পরিবর্তে Replacement Product পাঠাতে পারে।

Flow

```text id="prt002"
Purchase Return

↓

Supplier Replacement

↓

GRN

↓

Inventory
```

---

# ১৭. Status

সম্ভাব্য Status

* Draft
* Submitted
* Under Review
* Approved
* Partially Returned
* Fully Returned
* Closed
* Cancelled

---

# ১৮. Business Rules

### Rule PRT-001

Approved Purchase-এর বিপরীতেই Purchase Return হবে।

---

### Rule PRT-002

Return Quantity Purchase Quantity অতিক্রম করতে পারবে না।

---

### Rule PRT-003

Approved Return Inventory থেকে Quantity কমাবে।

---

### Rule PRT-004

Purchase Return Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule PRT-005

Return-এর পরে Supplier Payable পুনঃসমন্বয় হবে।

---

### Rule PRT-006

Batch ভিত্তিক Product Batch Reference ছাড়া Return করা যাবে না।

---

### Rule PRT-007

Production Consume হওয়া Raw Material সাধারণ Return করা যাবে না।

---

# ১৯. Reports

* Purchase Return Register
* Supplier Return Report
* Product Return Report
* Return Reason Analysis
* Damage Analysis
* Batch Return Report
* Replacement Report
* Purchase Adjustment Report

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Return Created
* Return Approved
* Return Cancelled
* Inventory Adjusted
* Debit Note Generated
* Supplier Ledger Updated

---

# ২১. Future Expansion

* Supplier Return Portal
* Barcode Return
* QR Return
* Return Image Attachment
* Warranty Claim
* AI Quality Analysis
* Supplier Return Score

---

# ২২. Notes

FFME Return Model

```text id="prt003"
Purchase

↓

Purchase Return

↓

Debit Note

↓

Supplier Adjustment
```

Purchase Return সবসময় একটি Historical Purchase-এর সাথে সংযুক্ত থাকবে।

Standalone Purchase Return অনুমোদিত নয়।

---

# ২৩. Related Documents

* Purchase
* Goods Receive Note
* Debit Note
* Supplier
* Inventory
* Finance
* Quality Control
* Warehouse

---

# ২৪. Conclusion

Purchase Return Module হলো FFME ERP-এর Supplier Return & Purchase Adjustment Engine।

এর মাধ্যমে—

* Inventory Accuracy
* Supplier Claim
* Financial Adjustment
* Batch Control
* Quality Management

নিশ্চিত করা হবে।

FFME-তে Purchase Return হলো:

**Purchased Goods → Return Verification → Supplier Adjustment → Financial Correction**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `09-Debit-Note.md`
