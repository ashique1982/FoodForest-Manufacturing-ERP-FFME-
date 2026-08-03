# Collection Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Collection Management

---

# ১. Purpose

Collection Module-এর উদ্দেশ্য হলো Customer, Distributor এবং Business Partner-এর কাছ থেকে Sales Due, Invoice Amount, Advance Payment এবং Outstanding Balance সংগ্রহ, সমন্বয় এবং Accounting-এ প্রতিফলন করা।

Collection Module Sales, Customer, Finance, Cash, Bank, Mobile Banking এবং Accounting Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Collection হলো Customer বা Business Partner-এর কাছ থেকে Sales-এর বিপরীতে অর্থ গ্রহণের Financial Transaction।

Sales Revenue তৈরি করে।

Collection Receivable Settlement করে।

---

# ৩. Collection Philosophy

FFME-তে Sales এবং Collection আলাদা Transaction।

একটি Sales হতে পারে—

* Cash Sale
* Credit Sale
* Partial Payment Sale

---

# ৪. Collection Architecture

```text id="col001"
Sales Invoice

↓

Customer Due

↓

Collection

↓

Payment Method

↓

Ledger Update

↓

Receivable Settlement
```

---

# ৫. Collection Profile

## Basic Information

* Collection Number
* Collection Date
* Collection Type
* Status

---

## Customer Information

* Customer
* Distributor
* Business Partner

---

## Reference Information

* Sales Number
* Invoice Number
* Due Reference

---

## Payment Information

* Payment Method
* Amount
* Transaction Number
* Bank Reference

---

# ৬. Collection Types

FFME সমর্থন করবে—

* Cash Collection
* Bank Collection
* Mobile Banking Collection
* Cheque Collection
* Advance Collection
* Security Deposit
* Adjustment Collection

---

# ৭. Payment Methods

Supported Payment Method:

* Cash
* Bank Transfer
* Cheque
* bKash
* Nagad
* Rocket
* Card Payment
* Online Payment

---

# ৮. Collection Workflow

```text id="col002"
Draft

↓

Submitted

↓

Approved

↓

Posted

↓

Completed
```

---

# ৯. Credit Collection Flow

```text id="col003"
Credit Sale

↓

Customer Due

↓

Collection

↓

Due Settlement

↓

Ledger Update
```

---

# ১০. Partial Collection

একটি Invoice-এর বিপরীতে একাধিক Collection গ্রহণ করা যাবে।

Example:

Invoice:

```text id="col004"
100,000 BDT
```

Collection:

```text id="col005"
40,000 BDT
```

Remaining Due:

```text id="col006"
60,000 BDT
```

---

# ১১. Advance Collection

Customer Sales-এর পূর্বে Advance Payment দিতে পারে।

Flow:

```text id="col007"
Advance Payment

↓

Customer Advance Balance

↓

Future Sales Adjustment
```

---

# ১২. Collection Adjustment

Collection সমন্বয় করা যাবে—

* Invoice Wise
* Customer Wise
* Advance Balance Wise
* Credit Note Wise

---

# ১৩. Accounting Integration

Collection Confirm হলে Journal Entry তৈরি হবে।

Example:

Cash Collection:

Debit:

Cash / Bank

Credit:

Accounts Receivable

---

# ১৪. Customer Balance

Collection-এর পরে Customer Account Update হবে।

Dashboard-এ দেখা যাবে—

* Total Due
* Paid Amount
* Remaining Balance
* Overdue Amount

---

# ১৫. Credit Control

Distributor এবং Customer-এর জন্য—

* Credit Limit
* Payment Term
* Due Days
* Overdue Alert

ব্যবহার করা যাবে।

---

# ১৬. Reports

## Collection Register

* Daily Collection
* Monthly Collection

---

## Customer Outstanding Report

* Customer Wise Due

---

## Aging Report

* 0-30 Days
* 31-60 Days
* 61-90 Days
* Above 90 Days

---

## Salesperson Collection Report

* Salesperson Wise

---

## Payment Method Report

* Cash
* Bank
* Mobile Banking

---

# ১৭. Business Rules

### Rule CO-001

Collection Number Unique হবে।

---

### Rule CO-002

Collection অবশ্যই Customer বা Business Partner-এর সাথে সম্পর্কিত হবে।

---

### Rule CO-003

Posted Collection Delete করা যাবে না।

Cancel করতে হবে।

---

### Rule CO-004

একটি Sales Invoice-এর বিপরীতে Multiple Collection হতে পারে।

---

### Rule CO-005

Collection Amount Due Amount-এর বেশি হলে Advance অথবা Overpayment হিসেবে সংরক্ষণ হবে।

---

### Rule CO-006

Collection Accounting Ledger-এ Post হবে।

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Collection Created
* Payment Received
* Payment Approved
* Ledger Posted
* Adjustment Completed
* Collection Cancelled

---

# ১৯. Future Expansion

* Mobile Collection App
* Sales Representative Collection
* Digital Receipt
* Auto Payment Reminder
* Customer Payment Portal
* AI Credit Risk Analysis
* Online Payment Gateway

---

# ২০. Notes

FFME Revenue Cycle:

```text id="col008"
Demand

↓

Sales Order

↓

Sales

↓

Delivery

↓

Invoice

↓

Collection

↓

Accounting
```

Collection হলো Sales Revenue-এর Cash Conversion Layer।

---

# ২১. Related Documents

* Sales Overview
* Demand
* Sales Order
* Sales
* Delivery
* Customer
* Distributor
* Payment Method
* Cash
* Bank
* Mobile Banking
* Ledger
* Journal
* Credit Note

---

# ২২. Conclusion

Collection Module FFME ERP-এর Cash Flow Management Engine।

এর মাধ্যমে—

* Customer Payment
* Outstanding Control
* Credit Management
* Payment Tracking
* Accounting Settlement

নিয়ন্ত্রিত হবে।

FFME-তে Collection হলো:

**Sales Revenue → Payment Collection → Cash Flow → Financial Control**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `10-Pricing.md`
