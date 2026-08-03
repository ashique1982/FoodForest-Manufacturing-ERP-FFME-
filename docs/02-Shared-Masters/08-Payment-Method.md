# Payment Method Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Shared Master Architecture

**Module:** Payment Method Management

---

# ১. Purpose

Payment Method Module-এর উদ্দেশ্য হলো FFME ERP-তে সকল ধরনের অর্থ গ্রহণ (Receipt) এবং অর্থ প্রদান (Payment) পদ্ধতি একটি Standard Framework-এর মাধ্যমে পরিচালনা করা।

Payment Method Module Sales, Purchase, Finance, Cash Management, Bank Management এবং Collection Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Payment Method হলো এমন একটি মাধ্যম যার মাধ্যমে কোনো Financial Transaction সম্পন্ন হয়।

এটি নির্ধারণ করে—

* কীভাবে টাকা গ্রহণ করা হবে
* কীভাবে টাকা প্রদান করা হবে
* কোন Account-এ Posting হবে

---

# ৩. Payment Method Architecture

```text id="pm001"
Payment Method Master

        │

        ├── Cash

        ├── Bank

        ├── Mobile Financial Service

        ├── Digital Payment

        ├── Cheque

        └── Credit
```

---

# ৪. Payment Method Types

FFME Default হিসেবে নিম্নোক্ত Payment Method সমর্থন করবে।

---

## Cash

নগদ অর্থ।

---

## Bank Transfer

* BEFTN
* RTGS
* EFT
* Online Transfer

---

## Cheque

* Account Payee
* Bearer Cheque

---

## Mobile Financial Service (MFS)

বাংলাদেশের জন্য—

* bKash
* Nagad
* Rocket
* Upay

---

## Card Payment

* Debit Card
* Credit Card
* POS Machine

---

## Online Payment

* Payment Gateway
* Internet Banking
* QR Payment

---

## Credit

পরে অর্থ পরিশোধ।

---

# ৫. Payment Method Profile

প্রতিটি Payment Method-এর থাকবে—

## Basic Information

* Method Code
* Method Name
* Method Type
* Description
* Status

---

## Control Information

* Require Reference Number
* Require Approval
* Allow Partial Payment
* Allow Refund

---

# ৬. Payment Method Assignment

Payment Method বিভিন্ন Module-এ ব্যবহার করা যাবে।

---

## Sales Collection

```text id="pm002"
Invoice

↓

Cash
```

---

```text id="pm003"
Invoice

↓

bKash
```

---

```text id="pm004"
Invoice

↓

Bank Transfer
```

---

## Purchase Payment

Supplier-কে—

* Bank
* Cheque
* Cash

এর মাধ্যমে Payment করা যাবে।

---

# ৭. Cash Payment

Cash Payment সরাসরি Cash Account-এ Post হবে।

Workflow:

```text id="pm005"
Invoice

↓

Cash Receive

↓

Cash Ledger

↓

Accounting
```

---

# ৮. Bank Payment

Bank Payment Bank Account-এর সাথে সম্পর্কিত থাকবে।

Required Information:

* Bank Name
* Account Number
* Transaction ID
* Transfer Date

---

# ৯. Mobile Financial Service (MFS)

বাংলাদেশের ব্যবসার জন্য গুরুত্বপূর্ণ।

Supported:

* bKash
* Nagad
* Rocket
* Upay

Required Information:

* Mobile Number
* Transaction ID
* Payment Time

---

# ১০. Cheque Payment

Cheque Payment-এর ক্ষেত্রে—

* Cheque Number
* Bank
* Branch
* Cheque Date
* Clearing Status

সংরক্ষণ করা হবে।

---

# ১১. Payment Workflow

Sales Collection

```text id="pm006"
Sales Invoice

↓

Payment Method

↓

Receive Payment

↓

Ledger

↓

Settlement
```

---

Purchase Payment

```text id="pm007"
Supplier Invoice

↓

Payment Method

↓

Payment

↓

Ledger

↓

Settlement
```

---

# ১২. Payment Status

Payment Status:

* Pending
* Received
* Paid
* Cleared
* Cancelled
* Failed

---

# ১৩. Refund Management

Refund-এর জন্য Payment Method পুনরায় ব্যবহার করা যাবে।

Example:

```text id="pm008"
Sales Return

↓

Refund

↓

Original Payment Method
```

---

# ১৪. Bank Reconciliation

Bank Payment-এর ক্ষেত্রে Reconciliation থাকবে।

Example:

* Ledger Balance
* Bank Statement
* Difference Analysis

---

# ১৫. Reports

## Collection Report

* Cash Collection
* Bank Collection
* MFS Collection
* Card Collection

---

## Payment Report

* Supplier Payment
* Employee Payment
* Expense Payment

---

## Finance Report

* Payment Method Wise Collection
* Daily Cash Flow
* Bank Transaction Summary

---

# ১৬. Business Rules

### Rule 001

প্রতিটি Payment Transaction-এর একটি Payment Method থাকতে হবে।

---

### Rule 002

Inactive Payment Method নতুন Transaction-এ ব্যবহার করা যাবে না।

---

### Rule 003

Bank Payment-এর জন্য Transaction Reference বাধ্যতামূলক।

---

### Rule 004

Cheque Clearing-এর আগে Payment সম্পূর্ণ Settled হবে না।

---

### Rule 005

Refund মূল Payment Method-এর মাধ্যমে করা উত্তম, তবে Administrator বিকল্প Method নির্বাচন করতে পারবেন।

---

### Rule 006

Cash Payment সরাসরি Cash Ledger-এ Post হবে।

---

# ১৭. Audit Trail

Payment Method সম্পর্কিত পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Payment Received
* Payment Paid
* Refund Processed
* Method Changed
* Status Changed

---

## Audit Information

* User
* Date & Time
* Transaction ID
* Old Value
* New Value
* Remarks

---

# ১৮. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* SSLCommerz Integration
* Stripe Integration
* PayPal Integration
* Razorpay
* QR Code Payment
* NFC Payment
* Auto Bank Reconciliation
* AI Fraud Detection

---

# ১৯. Notes

FFME Architecture-এ—

| Entity           | Purpose              |
| ---------------- | -------------------- |
| Payment Method   | অর্থ প্রদানের মাধ্যম |
| Payment Term     | অর্থ প্রদানের শর্ত   |
| Currency         | মুদ্রা               |
| Financial Entity | হিসাবরক্ষণ           |
| Ledger           | আর্থিক রেকর্ড        |

**Payment Method** এবং **Payment Term** এক নয়।

* **Payment Method** = কীভাবে টাকা পরিশোধ হবে (Cash, Bank, bKash)
* **Payment Term** = কখন টাকা পরিশোধ হবে (Cash, 30 Days Credit, Installment)

---

# ২০. Related Documents

* Architecture.md
* Currency
* Tax
* Payment Term
* Financial Entity
* Customer
* Supplier
* Distributor
* Sales
* Purchase
* Finance

---

# ২১. Conclusion

Payment Method Module FFME ERP-এর Financial Transaction Framework-এর একটি গুরুত্বপূর্ণ অংশ।

এই Module-এর মাধ্যমে—

* Cash Collection
* Bank Payment
* Mobile Banking
* Card Payment
* Online Payment
* Refund Management

একটি নিরাপদ, নমনীয় এবং ভবিষ্যৎ-উপযোগী ERP Framework-এর মাধ্যমে পরিচালিত হবে।

FFME-তে Payment Method হলো:

**Financial Transaction → Payment Channel → Accounting Integration**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `09-Warehouse-Type.md`
