# Payment Term Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Shared Master Architecture

**Module:** Payment Term Management

---

# ১. Purpose

Payment Term Module-এর উদ্দেশ্য হলো FFME ERP-তে Customer, Supplier, Distributor এবং অন্যান্য Business Partner-এর Payment Policy, Credit Period, Due Date, Installment, Advance Payment এবং Settlement Rules একটি Standard Framework-এর মাধ্যমে পরিচালনা করা।

Payment Term Module Sales, Purchase, Finance এবং Accounts Receivable/Payable-এর সাথে সরাসরি সংযুক্ত থাকবে।

---

# ২. Definition

Payment Term হলো Company এবং Business Partner-এর মধ্যে অর্থ পরিশোধের চুক্তিভিত্তিক নিয়ম।

এটি নির্ধারণ করে—

* কখন Payment হবে
* কত দিনের Credit থাকবে
* Advance লাগবে কি না
* Installment হবে কি না
* Late Payment Policy কী হবে

---

# ৩. Payment Term Architecture

```text id="pt001"
Payment Term Master

        │

        ├── Sales

        ├── Purchase

        ├── Customer

        ├── Supplier

        ├── Distributor

        └── Finance
```

---

# ৪. Payment Term Types

FFME Default হিসেবে নিম্নোক্ত Payment Term সমর্থন করবে।

---

## Cash

Invoice-এর সাথে সাথে সম্পূর্ণ Payment।

---

## Advance Payment

Invoice-এর আগে সম্পূর্ণ বা আংশিক Payment।

---

## Due Payment

নির্ধারিত সময় পরে Payment।

---

## Credit

নির্দিষ্ট দিনের Credit।

উদাহরণ:

* 7 Days
* 15 Days
* 30 Days
* 45 Days
* 60 Days
* 90 Days

---

## Installment

একাধিক কিস্তিতে Payment।

---

## Partial Payment

আংশিক Payment গ্রহণযোগ্য।

---

# ৫. Payment Term Profile

প্রতিটি Payment Term-এর থাকবে—

## Basic Information

* Payment Term Code
* Payment Term Name
* Description
* Status

---

## Control Information

* Credit Days
* Due Calculation Method
* Allow Partial Payment
* Allow Advance Payment
* Installment Allowed

---

# ৬. Payment Term Assignment

Payment Term বিভিন্ন Entity-এর সাথে Assign করা যাবে।

---

## Customer

উদাহরণ:

```text id="pt002"
Customer

ABC Store

↓

Payment Term

30 Days Credit
```

---

## Supplier

```text id="pt003"
Supplier

XYZ Traders

↓

Payment Term

45 Days
```

---

## Distributor

```text id="pt004"
Distributor

Sylhet Distributor

↓

Payment Term

15 Days Credit
```

---

# ৭. Due Date Calculation

Due Date স্বয়ংক্রিয়ভাবে নির্ধারণ হবে।

Example:

```text id="pt005"
Invoice Date

01-Jan-2027

+

30 Days

=

31-Jan-2027
```

---

# ৮. Payment Workflow

Sales:

```text id="pt006"
Sales Order

↓

Invoice

↓

Payment Term

↓

Due Date

↓

Collection

↓

Settlement
```

---

Purchase:

```text id="pt007"
Purchase

↓

Supplier Invoice

↓

Payment Term

↓

Due Date

↓

Payment
```

---

# ৯. Advance Payment

Advance Payment Support থাকবে।

Example:

| Invoice | Advance | Balance |
| ------: | ------: | ------: |
|   10000 |    3000 |    7000 |

---

# ১০. Partial Payment

একটি Invoice-এর বিপরীতে একাধিক Payment গ্রহণ করা যাবে।

Example:

| Invoice | Payment | Balance |
| ------: | ------: | ------: |
|   10000 |    4000 |    6000 |
|   10000 |    3000 |    3000 |
|   10000 |    3000 |       0 |

---

# ১১. Installment Payment

Installment ভিত্তিক Payment Support থাকবে।

Example:

```text id="pt008"
Invoice

120000

↓

12 Installments

↓

10000 / Month
```

---

# ১২. Credit Limit Integration

Payment Term Credit Limit-এর সাথে কাজ করবে।

Example:

```text id="pt009"
Credit Limit

500000

Current Outstanding

450000

New Invoice

100000

↓

Limit Exceeded
```

---

# ১৩. Overdue Management

Due Date অতিক্রম করলে Invoice Overdue হবে।

Status:

* Current
* Due Today
* Overdue

---

Overdue Analysis:

* 1–30 Days
* 31–60 Days
* 61–90 Days
* 90+ Days

---

# ১৪. Payment Status

Invoice Payment Status:

* Unpaid
* Partially Paid
* Paid
* Overdue
* Cancelled

---

# ১৫. Reports

## Customer Payment Report

* Due List
* Outstanding
* Collection History

---

## Supplier Payment Report

* Upcoming Payment
* Overdue Payment
* Payment History

---

## Finance Report

* Aging Report
* Credit Report
* Cash Flow Forecast

---

# ১৬. Business Rules

### Rule 001

প্রতিটি Customer-এর একটি Default Payment Term থাকতে পারে।

---

### Rule 002

Payment Term Invoice Save হওয়ার সময় Snapshot হিসেবে সংরক্ষণ হবে।

---

### Rule 003

Invoice তৈরি হওয়ার পরে Payment Term পরিবর্তন করা যাবে না।

---

### Rule 004

Partial Payment Allow হলে Outstanding স্বয়ংক্রিয়ভাবে Update হবে।

---

### Rule 005

Credit Period শেষ হলে Invoice Overdue হবে।

---

### Rule 006

Inactive Payment Term নতুন Business Partner-এর জন্য ব্যবহার করা যাবে না।

---

# ১৭. Audit Trail

Payment Term সম্পর্কিত সকল পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Payment Term Created
* Payment Term Updated
* Credit Days Changed
* Due Date Changed
* Status Changed

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ১৮. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Dynamic Credit Policy
* AI Credit Risk Analysis
* Auto Payment Reminder
* SMS / Email Reminder
* Installment Schedule Generator
* Online Payment Gateway Integration
* Early Payment Discount
* Late Payment Penalty

---

# ১৯. Notes

FFME Architecture-এ—

| Entity       | Purpose          |
| ------------ | ---------------- |
| Payment Term | Payment Policy   |
| Credit Limit | Maximum Credit   |
| Outstanding  | Unpaid Balance   |
| Due Date     | Payment Deadline |
| Collection   | Received Payment |

Payment Term এবং Credit Limit একই বিষয় নয়।

Payment Term নির্ধারণ করে **কখন Payment হবে**, আর Credit Limit নির্ধারণ করে **কত টাকা পর্যন্ত Credit দেওয়া যাবে**।

---

# ২০. Related Documents

* Architecture.md
* Business Partner
* Customer
* Supplier
* Distributor
* Financial Entity
* Currency
* Tax
* Sales
* Purchase
* Finance

---

# ২১. Conclusion

Payment Term Module FFME ERP-এর Credit Control এবং Cash Flow Management-এর ভিত্তি।

এই Module-এর মাধ্যমে—

* Cash Sales
* Credit Sales
* Supplier Payment
* Installment
* Due Management
* Collection Tracking

একটি Standard এবং Flexible ERP Framework-এর মাধ্যমে পরিচালিত হবে।

FFME-তে Payment Term হলো:

**Business Agreement → Payment Policy → Financial Control**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `08-Payment-Method.md`
