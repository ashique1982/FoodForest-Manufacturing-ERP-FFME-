# Tax Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Shared Master Architecture

**Module:** Tax Management

---

# ১. Purpose

Tax Management Module-এর উদ্দেশ্য হলো FFME ERP-তে VAT, Tax, Duty, Withholding Tax (AIT), SD (Supplementary Duty) এবং অন্যান্য সরকারি কর একটি Standard Framework-এর মাধ্যমে পরিচালনা করা।

এই Module Sales, Purchase, Manufacturing, Finance এবং Accounting-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Tax হলো সরকার কর্তৃক আরোপিত আর্থিক চার্জ যা Product, Service, Purchase অথবা Income-এর উপর প্রযোজ্য হতে পারে।

FFME-তে Tax একটি **Shared Master Entity**।

---

# ৩. Tax Architecture

```text id="tax001"
Tax Master

      │

      ├── Tax Type

      ├── Tax Rate

      ├── Tax Group

      ├── Sales

      ├── Purchase

      └── Finance
```

---

# ৪. Tax Types

FFME বিভিন্ন ধরনের Tax Support করবে।

---

## VAT

Value Added Tax

---

## Supplementary Duty (SD)

নির্দিষ্ট পণ্যের উপর অতিরিক্ত শুল্ক।

---

## Advance Income Tax (AIT)

উৎসে কর কর্তন।

---

## Customs Duty

আমদানিকৃত পণ্যের জন্য।

---

## Local Tax

দেশভেদে নির্ধারিত অন্যান্য কর।

---

# ৫. Tax Profile

প্রতিটি Tax-এর থাকবে—

## Basic Information

* Tax Code
* Tax Name
* Tax Type
* Tax Rate (%)
* Description
* Status

---

## Example

```text id="tax002"
Tax Name

VAT 15%


Tax Code

VAT15


Rate

15%
```

---

# ৬. Tax Group

একাধিক Tax একত্রে একটি Tax Group তৈরি করতে পারবে।

উদাহরণ:

```text id="tax003"
Standard Tax

├── VAT 15%

└── SD 5%
```

---

# ৭. Tax Application

Tax বিভিন্ন Module-এ প্রযোজ্য হবে।

---

## Sales

* Sales Invoice
* Sales Return
* Credit Note

---

## Purchase

* Purchase Invoice
* Purchase Return

---

## Finance

* Journal
* Ledger
* Payment

---

# ৮. Product Tax

প্রতিটি Product-এর Tax নির্ধারণ করা যাবে।

উদাহরণ:

```text id="tax004"
Product

Turmeric Powder

↓

VAT

15%
```

---

# ৯. Business Partner Tax

Business Partner অনুযায়ী Tax Policy নির্ধারণ করা যাবে।

উদাহরণ:

* Local Supplier
* Foreign Supplier
* VAT Registered Customer
* Non-VAT Customer

---

# ১০. Tax Calculation

Calculation:

```text id="tax005"
Net Amount

×

Tax Rate

=

Tax Amount
```

---

## Example

| Amount | VAT | Total |
| -----: | --: | ----: |
|   1000 | 150 |  1150 |

---

# ১১. Tax Inclusive / Exclusive

FFME দুই ধরনের Pricing Support করবে।

---

## Tax Exclusive

```text id="tax006"
Product Price

100

+

VAT

15

=

115
```

---

## Tax Inclusive

```text id="tax007"
Product Price

115

↓

VAT Included
```

---

# ১২. Sales Tax Workflow

```text id="tax008"
Sales Order

↓

Invoice

↓

Tax Calculation

↓

Ledger Entry

↓

Tax Report
```

---

# ১৩. Purchase Tax Workflow

```text id="tax009"
Purchase

↓

Supplier Invoice

↓

Tax Calculation

↓

Ledger

↓

Input VAT
```

---

# ১৪. Tax Ledger

Tax-এর জন্য আলাদা Ledger থাকবে।

উদাহরণ:

* VAT Payable
* VAT Receivable
* AIT Receivable
* Customs Duty

---

# ১৫. Tax Reports

## VAT Reports

* Output VAT
* Input VAT
* VAT Summary

---

## Purchase Tax Reports

* Supplier VAT
* Purchase Tax

---

## Sales Tax Reports

* Customer VAT
* Sales Tax Summary

---

## Government Reports

* VAT Return
* Tax Statement
* Monthly Tax Summary

---

# ১৬. Tax Status

Status:

* Active
* Inactive

Inactive Tax নতুন Transaction-এ ব্যবহার করা যাবে না।

---

# ১৭. Business Rules

### Rule 001

প্রতিটি Tax-এর Unique Tax Code থাকতে হবে।

---

### Rule 002

Tax Rate Percentage হিসেবে সংরক্ষণ হবে।

---

### Rule 003

Inactive Tax নতুন Transaction-এ ব্যবহার করা যাবে না।

---

### Rule 004

Tax History Delete করা যাবে না।

---

### Rule 005

Invoice Save হওয়ার পর Tax পুনরায় গণনা করা যাবে না, Credit/Debit Note ব্যবহার করতে হবে।

---

### Rule 006

Tax Ledger Accounting-এর অংশ হবে।

---

# ১৮. Audit Trail

Tax সম্পর্কিত পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Tax Created
* Tax Updated
* Rate Changed
* Status Changed
* Tax Applied

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ১৯. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Bangladesh VAT Return Automation
* NBR Integration
* E-Invoice
* Country Wise Tax Engine
* GST Support
* Multi-Country Tax Rules
* AI Tax Validation

---

# ২০. Notes

FFME Architecture-এ—

| Entity      | Purpose                     |
| ----------- | --------------------------- |
| Tax         | Government Charge           |
| Tax Group   | Multiple Tax Rules          |
| Product Tax | Product Based Tax           |
| Partner Tax | Customer/Supplier Based Tax |
| Ledger      | Tax Accounting              |

Tax Rate Transaction-এর সময় Snapshot হিসেবে সংরক্ষণ হবে, যাতে ভবিষ্যতে Rate পরিবর্তন হলেও পুরোনো Invoice পরিবর্তিত না হয়।

---

# ২১. Related Documents

* Architecture.md
* Financial Entity
* Currency
* Product
* Sales
* Purchase
* Business Partner
* Finance
* Inventory

---

# ২২. Conclusion

Tax Management Module FFME ERP-এর Financial Compliance Framework।

এই Module-এর মাধ্যমে—

* VAT Management
* Tax Calculation
* Purchase Tax
* Sales Tax
* Government Reporting
* Accounting Integration

একটি Standard এবং Future Ready ERP Architecture তৈরি করা যাবে।

FFME-তে Tax হলো:

**Government Compliance → Financial Calculation → Accounting Control**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `07-Payment-Term.md`
