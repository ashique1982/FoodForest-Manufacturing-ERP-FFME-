# Debit Note Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Debit Note

---

# ১. Purpose

Debit Note Module-এর উদ্দেশ্য হলো Purchase Return, Supplier Overcharge, Short Supply, Damage Claim, Quality Claim অথবা অন্যান্য Financial Adjustment-এর ক্ষেত্রে Supplier-এর বিরুদ্ধে প্রতিষ্ঠানের আর্থিক দাবি (Claim) তৈরি করা এবং Supplier Ledger সমন্বয় করা।

Debit Note নিজে কোনো Payment নয়।

এটি Supplier-এর কাছে একটি Financial Adjustment Document।

---

# ২. Business Philosophy

Purchase Return হল Physical Transaction।

Debit Note হল Financial Transaction।

অর্থাৎ—

প্রথমে পণ্য ফেরত যেতে পারে।

পরে Debit Note তৈরি হতে পারে।

আবার কিছু ক্ষেত্রে পণ্য ফেরত না দিয়েও Debit Note তৈরি হতে পারে।

---

# ৩. Business Flow

```text id="dn001"
Purchase

↓

Purchase Return / Financial Claim

↓

Debit Note

↓

Supplier Confirmation

↓

Supplier Ledger Adjustment

↓

Refund / Adjustment
```

---

# ৪. Debit Note Definition

Debit Note হলো Buyer কর্তৃক Supplier-এর নিকট জারিকৃত একটি Financial Claim Document।

এর মাধ্যমে Buyer জানায়—

"আপনার নিকট আমাদের এই পরিমাণ অর্থ পাওনা রয়েছে অথবা ভবিষ্যৎ Payment থেকে সমন্বয় করতে হবে।"

---

# ৫. Debit Note Sources

Debit Note তৈরি হতে পারে—

* Purchase Return
* Short Supply
* Overcharge
* Price Difference
* Quality Issue
* Damage Claim
* Supplier Penalty
* Freight Adjustment
* Tax Adjustment

---

# ৬. Debit Note Profile

## Basic Information

* Debit Note Number
* Debit Note Date
* Supplier
* Currency
* Status

---

## Reference

* Purchase
* Purchase Return
* Purchase Order
* GRN
* Supplier Invoice

---

## Financial Information

* Gross Amount
* Tax Adjustment
* Discount Adjustment
* Net Debit Amount

---

# ৭. Debit Note Types

## Purchase Return Debit Note

---

## Price Difference Debit Note

Supplier বেশি Rate চার্জ করেছে।

---

## Short Supply Debit Note

Invoice অনুযায়ী Billing হয়েছে কিন্তু কম Product এসেছে।

---

## Damage Claim Debit Note

ক্ষতিগ্রস্ত Product।

---

## Quality Claim Debit Note

Quality Failure।

---

## Freight Claim

Supplier Freight বহন করার কথা ছিল।

---

## Penalty Debit Note

Late Delivery

Contract Violation

---

# ৮. Supplier Adjustment

Debit Note Approved হলে—

Supplier Ledger কমে যাবে।

Adjustment হতে পারে—

* Refund
* Credit Adjustment
* Future Purchase Adjustment

---

# ৯. Refund Process

Example

Purchase

100,000

Return

20,000

Debit Note

20,000

↓

Supplier Refund

20,000

---

# ১০. Future Adjustment

Supplier Cash Refund না দিয়ে—

Future Invoice থেকে Adjustment করতে পারে।

Example

Invoice

150,000

Debit Note

20,000

Payable

130,000

---

# ১১. Multi Reference Support

একটি Debit Note একাধিক Purchase Return-এর বিপরীতে হতে পারে।

---

# ১২. Financial Posting

Approved Debit Note হলে—

Accounts Payable কমবে।

Inventory Entry হবে না (Inventory ইতোমধ্যে Purchase Return-এ সমন্বয় হয়েছে)।

---

# ১৩. Status

সম্ভাব্য Status

* Draft
* Submitted
* Under Review
* Approved
* Sent
* Accepted by Supplier
* Settled
* Closed
* Cancelled

---

# ১৪. Business Rules

### Rule DN-001

Debit Note Financial Adjustment Document।

---

### Rule DN-002

Purchase Return ছাড়াও Debit Note তৈরি করা যাবে।

---

### Rule DN-003

Approved Debit Note Supplier Ledger Update করবে।

---

### Rule DN-004

Debit Note Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule DN-005

একই Claim-এর জন্য Duplicate Debit Note তৈরি করা যাবে না।

---

### Rule DN-006

Debit Note Settlement Refund অথবা Future Adjustment—দুইভাবেই হতে পারে।

---

### Rule DN-007

Debit Note Inventory Update করবে না।

---

# ১৫. Reports

* Debit Note Register
* Supplier Claim Report
* Refund Report
* Pending Debit Note
* Settled Debit Note
* Adjustment Report
* Supplier Ledger Adjustment

---

# ১৬. Audit Trail

সংরক্ষণ হবে—

* Debit Note Created
* Approved
* Sent
* Supplier Accepted
* Ledger Updated
* Settled
* Cancelled

---

# ১৭. Future Expansion

* Supplier Portal
* Digital Debit Note
* Auto Supplier Confirmation
* E-Mail Debit Note
* OCR Claim Attachment
* AI Claim Validation

---

# ১৮. Notes

FFME Financial Flow

```text id="dn002"
Purchase Return

↓

Debit Note

↓

Supplier Ledger

↓

Refund / Adjustment
```

Debit Note Supplier-এর বিরুদ্ধে প্রতিষ্ঠানের Financial Claim।

এটি Purchase Return-এর আর্থিক অংশকে সম্পন্ন করে।

---

# ১৯. Related Documents

* Purchase
* Purchase Return
* Supplier
* Accounts Payable
* Payment
* Ledger
* Finance
* GRN

---

# ২০. Conclusion

Debit Note Module হলো FFME ERP-এর Supplier Financial Claim Engine।

এর মাধ্যমে—

* Purchase Adjustment
* Supplier Claim
* Refund Management
* Ledger Adjustment
* Financial Accuracy

নিশ্চিত করা হবে।

FFME-তে Debit Note হলো:

**Business Claim → Financial Adjustment → Supplier Settlement**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `10-Purchase-Payment.md`
