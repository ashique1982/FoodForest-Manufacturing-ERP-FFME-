# Sales Return Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Sales Return Management

---

# ১. Purpose

Sales Return Module-এর উদ্দেশ্য হলো Customer, Distributor অথবা Business Partner কর্তৃক ফেরত দেওয়া Product গ্রহণ, যাচাই, Stock Adjustment, Financial Adjustment এবং Return History সংরক্ষণ করা।

এই Module Sales, Inventory, Warehouse, Quality Control, Finance এবং Accounting Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Sales Return হলো পূর্বে সম্পন্ন হওয়া Sales Transaction-এর বিপরীতে Customer থেকে Product পুনরায় গ্রহণের Business Process।

Sales Return কখনো নতুন Sales নয়।

এটি একটি Reverse Transaction।

---

# ৩. Sales Return Philosophy

FFME-তে:

```text id="return001"
Original Sales

↓

Customer Return Request

↓

Return Inspection

↓

Sales Return

↓

Inventory Adjustment

↓

Financial Adjustment
```

---

# ৪. Sales Return Architecture

```text id="return002"
Sales

↓

Sales Return

↓

Warehouse Receive

↓

Quality Check

↓

Stock Update

↓

Credit Note / Adjustment
```

---

# ৫. Sales Return Profile

## Basic Information

* Return Number
* Return Date
* Return Type
* Status

---

## Sales Reference

* Original Sales Number
* Invoice Number
* Customer
* Distributor

---

## Product Information

প্রতিটি Return Line-এ থাকবে—

* Product
* Batch Number
* UOM
* Return Quantity
* Return Reason

---

## Warehouse Information

* Return Warehouse
* Receive Location
* Stock Condition

---

## Financial Information

* Return Amount
* Tax Adjustment
* Credit Note Reference

---

# ৬. Sales Return Types

FFME সমর্থন করবে—

* Customer Return
* Distributor Return
* Damaged Product Return
* Expired Product Return
* Wrong Product Return
* Quality Complaint Return
* Sales Cancellation Return

---

# ৭. Return Status

সম্ভাব্য Status—

* Draft
* Submitted
* Approved
* Received
* Inspected
* Accepted
* Rejected
* Completed
* Cancelled

---

# ৮. Return Workflow

```text id="return003"
Return Request

↓

Approval

↓

Product Receive

↓

Quality Inspection

↓

Stock Decision

↓

Financial Adjustment

↓

Closed
```

---

# ৯. Return Inspection

Product Return পাওয়ার পর যাচাই করা হবে—

* Product Condition
* Packaging Condition
* Expiry Status
* Batch
* Damage Reason

---

# ১০. Stock Treatment

Return Product-এর ক্ষেত্রে Stock Status হতে পারে—

## Good Stock

সরাসরি Available Stock-এ যোগ হবে।

---

## Damaged Stock

Damage Warehouse-এ যাবে।

---

## Quality Hold

Inspection পর্যন্ত Hold Location-এ থাকবে।

---

## Expired Stock

Expired Inventory হিসেবে সংরক্ষণ হবে।

---

# ১১. Inventory Integration

Sales Return Confirm হলে—

Inventory Movement হবে:

```text id="return004"
Customer

↓

Warehouse Receive

↓

Inventory Increase
```

---

# ১২. Financial Integration

Sales Return-এর মাধ্যমে—

* Sales Revenue Reverse হবে
* Customer Balance Adjust হবে
* Credit Note তৈরি হবে

Accounting Entry:

Debit:

Sales Return

Tax Adjustment

Credit:

Customer Receivable

---

# ১৩. Credit Note Integration

Customer-কে ফেরত দেওয়া যেতে পারে—

* Credit Adjustment
* Future Purchase Adjustment
* Refund (Company Policy)

---

# ১৪. Reports

## Sales Return Register

* Daily Return
* Monthly Return

---

## Return Analysis

* Product Wise
* Customer Wise
* Reason Wise

---

## Damage Report

* Damaged Quantity
* Loss Value

---

## Quality Report

* Accepted Return
* Rejected Return

---

## Customer Return History

* Customer Wise Return

---

# ১৫. Business Rules

### Rule SR-001

Sales Return অবশ্যই Original Sales Reference করবে।

---

### Rule SR-002

Sales Return Quantity Original Sold Quantity-এর বেশি হতে পারবে না।

---

### Rule SR-003

Return Approval ছাড়া Stock Update হবে না।

---

### Rule SR-004

Return Product Quality Inspection-এর মাধ্যমে যাচাই হতে পারে।

---

### Rule SR-005

Completed Sales Return Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule SR-006

Sales Return Accounting Adjustment তৈরি করবে।

---

# ১৬. Audit Trail

সংরক্ষণ হবে—

* Return Created
* Return Approved
* Product Received
* Quality Checked
* Stock Updated
* Credit Note Created
* Return Cancelled

---

# ১৭. Future Expansion

* Mobile Return Request
* Customer Portal Return
* Barcode Based Return
* Photo Evidence
* AI Return Analysis
* Automated Quality Grading

---

# ১৮. Notes

FFME Reverse Sales Flow:

```text id="return005"
Sales

↓

Delivery

↓

Customer

↓

Sales Return

↓

Inventory

↓

Accounting
```

Sales Return হলো Customer Satisfaction এবং Inventory Accuracy-এর জন্য গুরুত্বপূর্ণ।

---

# ১৯. Related Documents

* Sales Overview
* Sales
* Delivery
* Delivery Note
* Customer
* Distributor
* Inventory
* Warehouse
* Quality Control
* Credit Note
* Ledger
* Journal

---

# ২০. Conclusion

Sales Return Module FFME ERP-এর Reverse Transaction Management System।

এর মাধ্যমে—

* Customer Return
* Product Inspection
* Stock Recovery
* Financial Adjustment
* Quality Analysis

নিয়ন্ত্রিত হবে।

FFME-তে Sales Return হলো:

**Customer Return → Product Recovery → Stock Adjustment → Financial Correction**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `08-Credit-Note.md`
