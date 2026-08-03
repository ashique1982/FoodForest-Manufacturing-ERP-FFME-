# Purchase Payment Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Payment

---

# ১. Purpose

Purchase Payment Module-এর উদ্দেশ্য হলো Supplier-এর নিকট পণ্য বা সেবার বিপরীতে অর্থ প্রদান, Accounts Payable সমন্বয়, বিভিন্ন Payment Method পরিচালনা এবং সম্পূর্ণ Payment History সংরক্ষণ করা।

FFME-তে Payment সবসময় একটি Financial Transaction এবং এটি Finance Module-এর সাথে সম্পূর্ণভাবে সংযুক্ত থাকবে।

---

# ২. Business Philosophy

Purchase সম্পন্ন হওয়ার অর্থ এই নয় যে সঙ্গে সঙ্গে Payment হবে।

একটি Purchase হতে পারে—

* Cash Purchase
* Credit Purchase
* Partial Payment
* Installment Payment
* Advance Payment
* Retention Payment

---

# ৩. Payment Workflow

```text id="pp001"
Purchase

↓

Accounts Payable

↓

Payment Request

↓

Approval

↓

Payment

↓

Supplier Ledger Update

↓

Accounts Posting
```

---

# ৪. Payment Sources

Payment তৈরি হতে পারে—

* Purchase Invoice
* Supplier Statement
* Due Schedule
* Manual Payment
* Advance Settlement

---

# ৫. Payment Profile

## Basic Information

* Payment Number
* Payment Date
* Supplier
* Currency
* Status

---

## Reference

* Purchase Number
* Supplier Invoice
* Debit Note
* Advance Payment
* Payment Term

---

## Financial Information

* Invoice Amount
* Previous Payment
* Debit Note Adjustment
* Discount
* Tax Deduction
* Net Payable
* Paid Amount
* Outstanding Amount

---

# ৬. Payment Types

FFME সমর্থন করবে—

### Cash Payment

---

### Bank Payment

---

### Mobile Banking

* bKash
* Nagad
* Rocket

---

### Cheque Payment

---

### Online Payment

---

### LC Payment

---

### Advance Payment

---

### Partial Payment

---

### Installment Payment

---

# ৭. Payment Method

Master Data থেকে নির্বাচন করা হবে।

উদাহরণ—

* Cash
* Bank Transfer
* Cheque
* EFT
* RTGS
* Mobile Banking
* Card Payment

---

# ৮. Advance Payment

Supplier-কে Purchase-এর আগে Advance দেওয়া যাবে।

Flow

```text id="pp002"
Advance Payment

↓

Purchase

↓

Advance Adjustment
```

---

# ৯. Partial Payment

একটি Invoice একাধিক Payment-এ পরিশোধ করা যাবে।

Example

Invoice

100,000

↓

Payment-1

30,000

↓

Payment-2

40,000

↓

Payment-3

30,000

↓

Invoice Paid

---

# ১০. Debit Note Adjustment

যদি Debit Note থাকে—

Payment-এর সময় স্বয়ংক্রিয়ভাবে সমন্বয় করা হবে।

Example

Invoice

100,000

Debit Note

10,000

Net Payable

90,000

---

# ১১. Early Payment Discount

Supplier যদি নির্দিষ্ট সময়ের আগে Payment গ্রহণে Discount দেয়—

System Discount Apply করবে।

---

# ১২. Tax Deduction

প্রযোজ্য ক্ষেত্রে—

* VAT
* AIT
* Withholding Tax

Payment-এর সময় কর্তন করা যাবে।

---

# ১৩. Multi Currency

বিদেশি Supplier-এর ক্ষেত্রে—

* Payment Currency
* Exchange Rate
* Base Currency

সংরক্ষণ হবে।

Exchange Gain/Loss Finance Module-এ পোস্ট হবে।

---

# ১৪. Payment Approval

Approval Workflow

```text id="pp003"
Payment Request

↓

Finance Verification

↓

Approval

↓

Payment

↓

Ledger Update
```

Approval Limit Role অনুযায়ী নির্ধারিত হবে।

---

# ১৫. Supplier Ledger Integration

Payment সম্পন্ন হলে—

Supplier Ledger Update হবে।

Outstanding কমবে।

---

# ১৬. Bank Integration

Bank Payment হলে—

* Bank Account
* Transaction Number
* Cheque Number
* Reference Number

সংরক্ষণ হবে।

---

# ১৭. Status

সম্ভাব্য Status

* Draft
* Requested
* Under Review
* Approved
* Paid
* Partially Paid
* Failed
* Cancelled

---

# ১৮. Business Rules

### Rule PP-001

Approved Purchase ছাড়া সাধারণ Payment করা যাবে না (Advance ব্যতীত)।

---

### Rule PP-002

Payment Supplier Ledger Update করবে।

---

### Rule PP-003

Partial Payment সমর্থিত।

---

### Rule PP-004

Debit Note Payment-এর সময় সমন্বয় হবে।

---

### Rule PP-005

Payment Delete করা যাবে না।

Reverse Transaction করতে হবে।

---

### Rule PP-006

একই Supplier Invoice-এর জন্য Duplicate Payment করা যাবে না।

---

### Rule PP-007

Advance Payment Purchase-এর সময় সমন্বয় করা যাবে।

---

# ১৯. Reports

* Payment Register
* Supplier Payment Report
* Outstanding Report
* Partial Payment Report
* Advance Payment Report
* Bank Payment Report
* Cash Payment Report
* Mobile Banking Payment Report

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Payment Created
* Approved
* Paid
* Reversed
* Cancelled
* Ledger Updated

---

# ২১. Future Expansion

* Payment Gateway
* Bank API Integration
* Auto Payment Reminder
* Supplier Portal
* QR Payment
* AI Cash Flow Planning
* Scheduled Payment

---

# ২২. Notes

FFME Payment Model

```text id="pp004"
Purchase

↓

Accounts Payable

↓

Payment

↓

Supplier Ledger

↓

Finance
```

Payment Module Supplier Liability সমাপ্ত করে।

---

# ২৩. Related Documents

* Purchase
* Supplier
* Debit Note
* Accounts Payable
* Ledger
* Bank
* Cash
* Mobile Banking
* Finance

---

# ২৪. Conclusion

Purchase Payment Module হলো FFME ERP-এর Supplier Payment Engine।

এর মাধ্যমে—

* Accurate Payment
* Outstanding Control
* Advance Adjustment
* Debit Note Settlement
* Financial Accuracy

নিশ্চিত করা হবে।

FFME-তে Purchase Payment হলো:

**Supplier Liability → Payment Approval → Financial Settlement**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `11-Purchase-Pricing.md`
