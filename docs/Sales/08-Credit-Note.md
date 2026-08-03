# Credit Note Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Credit Note Management

---

# ১. Purpose

Credit Note Module-এর উদ্দেশ্য হলো Customer বা Business Partner-এর Account Balance কমানো, Sales Adjustment, Sales Return Adjustment, Discount Adjustment এবং অন্যান্য Financial Correction পরিচালনা করা।

Credit Note হলো একটি Financial Adjustment Document।

---

# ২. Definition

Credit Note হলো এমন একটি Accounting Document যা পূর্বের Sales Invoice-এর বিপরীতে Customer-এর পাওনা (Receivable) কমিয়ে দেয়।

এটি সাধারণত ব্যবহৃত হয়—

* Sales Return
* Over Billing Correction
* Price Adjustment
* Discount Adjustment
* Compensation

এর জন্য।

---

# ৩. Credit Note Philosophy

FFME-তে:

```text id="cn001"
Sales Invoice

↓

Adjustment Reason

↓

Credit Note

↓

Customer Balance Reduction

↓

Accounting Entry
```

---

# ৪. Credit Note Architecture

```text id="cn002"
Sales

↓

Sales Return

↓

Credit Note

↓

Ledger Adjustment

↓

Customer Account Update
```

---

# ৫. Credit Note Profile

## Basic Information

* Credit Note Number
* Credit Note Date
* Status
* Adjustment Type

---

## Customer Information

* Customer
* Distributor
* Business Partner

---

## Reference Information

* Original Sales Number
* Invoice Number
* Sales Return Number (Optional)

---

## Product Information

যদি Product Related হয়—

* Product
* Quantity
* Rate
* Amount

---

## Financial Information

* Gross Amount
* Discount Adjustment
* Tax Adjustment
* Net Credit Amount

---

# ৬. Credit Note Types

FFME সমর্থন করবে—

* Sales Return Credit Note
* Price Adjustment Credit Note
* Discount Credit Note
* Invoice Correction Credit Note
* Compensation Credit Note

---

# ৭. Credit Note Workflow

```text id="cn003"
Draft

↓

Submitted

↓

Approved

↓

Posted

↓

Closed
```

---

# ৮. Sales Return Integration

Sales Return থেকে Automatic Credit Note তৈরি হতে পারে।

Flow:

```text id="cn004"
Sales Return

↓

Inspection Accepted

↓

Generate Credit Note

↓

Customer Balance Adjust
```

---

# ৯. Customer Balance Impact

Credit Note Confirm হলে—

Customer Outstanding কমবে।

Example:

Previous Due:

```text
100,000 BDT
```

Credit Note:

```text
10,000 BDT
```

New Due:

```text
90,000 BDT
```

---

# ১০. Accounting Integration

Credit Note Confirm হলে Journal Entry তৈরি হবে।

Example:

Debit:

Sales Return

Tax Adjustment

Credit:

Accounts Receivable

---

# ১১. Tax Adjustment

Credit Note-এর মাধ্যমে—

* VAT Adjustment
* Tax Adjustment

সমর্থিত হবে।

---

# ১২. Refund Integration

Company Policy অনুযায়ী Credit Note থেকে—

* Future Sales Adjustment
* Cash Refund
* Bank Refund

করা যেতে পারে।

---

# ১৩. Reports

## Credit Note Register

* Daily
* Monthly
* Yearly

---

## Customer Credit Report

* Customer Wise

---

## Reason Analysis

* Return
* Discount
* Correction

---

## Outstanding Adjustment Report

* Before Adjustment
* After Adjustment

---

# ১৪. Business Rules

### Rule CN-001

Credit Note Number Unique হবে।

---

### Rule CN-002

Credit Note অবশ্যই Customer বা Business Partner Reference করবে।

---

### Rule CN-003

Credit Note Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule CN-004

Approved Credit Note Accounting-এ Post হবে।

---

### Rule CN-005

Sales Return Credit Note Original Sales Reference করবে।

---

### Rule CN-006

Credit Note Amount Original Invoice Amount-এর বেশি হতে পারবে না (Permission Exception ছাড়া)।

---

# ১৫. Audit Trail

সংরক্ষণ হবে—

* Credit Note Created
* Submitted
* Approved
* Posted
* Cancelled
* Adjustment Completed

---

# ১৬. Future Expansion

* Automatic Credit Note Generation
* Customer Portal Adjustment
* Digital Approval Workflow
* AI Fraud Detection
* Tax Authority Integration

---

# ১৭. Notes

FFME Financial Adjustment Flow:

```text id="cn005"
Sales

↓

Invoice

↓

Return / Adjustment

↓

Credit Note

↓

Customer Balance

↓

Accounting
```

Credit Note Sales এবং Finance-এর মধ্যে একটি গুরুত্বপূর্ণ Bridge।

---

# ১৮. Related Documents

* Sales Overview
* Sales
* Sales Return
* Invoice
* Customer
* Distributor
* Collection
* Ledger
* Journal
* Tax

---

# ১৯. Conclusion

Credit Note Module FFME ERP-এর Financial Correction Engine।

এর মাধ্যমে—

* Sales Return Adjustment
* Customer Balance Correction
* Discount Adjustment
* Tax Adjustment
* Accounting Compliance

নিয়ন্ত্রিত হবে।

FFME-তে Credit Note হলো:

**Sales Correction → Customer Adjustment → Accounting Accuracy**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `09-Collection.md`
