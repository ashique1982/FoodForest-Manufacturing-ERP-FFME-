# Currency Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Shared Master Architecture

**Module:** Currency Management

---

# ১. Purpose

Currency Module-এর উদ্দেশ্য হলো FFME ERP-তে Multi-Currency Accounting, Sales, Purchase, Manufacturing, Banking এবং Financial Reporting-এর জন্য একটি Standard Currency Framework প্রদান করা।

বর্তমানে অনেক ব্যবসা শুধুমাত্র একটি Currency ব্যবহার করলেও, FFME ভবিষ্যতের Multi-Country ERP Architecture মাথায় রেখে ডিজাইন করা হয়েছে।

---

# ২. Definition

Currency হলো এমন একটি অর্থনৈতিক একক যার মাধ্যমে Financial Transaction সম্পন্ন হয়।

উদাহরণ:

* BDT (Bangladeshi Taka)
* USD (US Dollar)
* EUR (Euro)
* GBP (British Pound)
* INR (Indian Rupee)

---

# ৩. Currency Architecture

```text id="cur001"
Currency Master

      │

      ├── Base Currency

      ├── Exchange Rate

      ├── Financial Transaction

      ├── Sales

      ├── Purchase

      └── Accounting
```

---

# ৪. Base Currency

প্রতিটি Company-এর একটি Base Currency থাকবে।

সমস্ত Accounting, Inventory Valuation এবং Financial Report Base Currency-তে তৈরি হবে।

উদাহরণ:

```text id="cur002"
Company

FoodForest Ltd.

↓

Base Currency

BDT
```

---

# ৫. Supported Currency

FFME Default হিসেবে নিম্নোক্ত Currency Support করবে।

| Code | Currency         | Symbol |
| ---- | ---------------- | ------ |
| BDT  | Bangladeshi Taka | ৳      |
| USD  | US Dollar        | $      |
| EUR  | Euro             | €      |
| GBP  | British Pound    | £      |
| INR  | Indian Rupee     | ₹      |
| SAR  | Saudi Riyal      | ﷼      |
| AED  | UAE Dirham       | د.إ    |

---

# ৬. Currency Profile

প্রতিটি Currency-এর থাকবে—

## Basic Information

* Currency Code (ISO 4217)
* Currency Name
* Symbol
* Decimal Places
* Status

---

## Example

```text id="cur003"
Currency

Bangladeshi Taka

Code

BDT

Symbol

৳

Decimal

2
```

---

# ৭. Exchange Rate

Multi-Currency ব্যবহারের ক্ষেত্রে Exchange Rate সংরক্ষণ করা হবে।

---

## Exchange Rate Information

* From Currency
* To Currency
* Exchange Rate
* Effective Date
* Status

---

## Example

| From | To  |   Rate |
| ---- | --- | -----: |
| USD  | BDT | 125.50 |
| EUR  | BDT | 138.20 |

---

# ৮. Currency Conversion

Financial Transaction-এর সময় System Currency Conversion করতে পারবে।

Workflow:

```text id="cur004"
Transaction Currency

↓

Exchange Rate

↓

Base Currency

↓

Accounting
```

---

# ৯. Currency Usage

Currency বিভিন্ন Module-এ ব্যবহার হবে।

---

## Sales

* Sales Invoice
* Customer Payment
* Sales Return

---

## Purchase

* Purchase Order
* Supplier Invoice
* Supplier Payment

---

## Finance

* Cash
* Bank
* Ledger
* Journal
* Financial Statement

---

## Manufacturing

* Production Cost
* Material Cost
* Finished Goods Cost

---

# ১০. Currency in Financial Entity

Financial Entity সর্বদা Base Currency-তে Ledger সংরক্ষণ করবে।

Example:

```text id="cur005"
Supplier Invoice

USD

↓

Exchange Rate

↓

BDT

↓

Ledger
```

---

# ১১. Currency in Business Partner

Business Partner-এর Default Currency সংরক্ষণ করা যাবে।

উদাহরণ:

```text id="cur006"
Business Partner

ABC Export Ltd.

Default Currency

USD
```

---

# ১২. Currency in Product Pricing

Product-এর Pricing Base Currency অথবা Foreign Currency-তে নির্ধারণ করা যেতে পারে।

উদাহরণ:

```text id="cur007"
Product

Packaging Machine

Price

USD

↓

Accounting

BDT
```

---

# ১৩. Decimal Control

প্রতিটি Currency-এর Decimal Precision সংরক্ষণ করা হবে।

উদাহরণ:

| Currency | Decimal |
| -------- | ------: |
| BDT      |       2 |
| USD      |       2 |
| JPY      |       0 |

---

# ১৪. Currency Status

Status:

* Active
* Inactive

Inactive Currency নতুন Transaction-এ ব্যবহার করা যাবে না।

---

# ১৫. Reports

## Currency Reports

* Currency List
* Exchange Rate History
* Foreign Currency Transactions

---

## Financial Reports

* Base Currency Ledger
* Multi-Currency Report
* Exchange Gain/Loss Report

---

# ১৬. Business Rules

### Rule 001

প্রতিটি Company-এর একটি Base Currency থাকতে হবে।

---

### Rule 002

Base Currency পরিবর্তনের জন্য Administrator Approval প্রয়োজন।

---

### Rule 003

Currency Code অবশ্যই ISO Standard অনুসরণ করবে।

---

### Rule 004

Inactive Currency নতুন Transaction-এ ব্যবহার করা যাবে না।

---

### Rule 005

Exchange Rate History Delete করা যাবে না।

---

### Rule 006

Accounting Ledger সর্বদা Base Currency-তে সংরক্ষণ হবে।

---

# ১৭. Audit Trail

Currency সম্পর্কিত পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Currency Created
* Currency Updated
* Exchange Rate Changed
* Status Changed
* Base Currency Changed

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

* Live Exchange Rate API
* Automatic Currency Update
* Multi-Country ERP
* Exchange Gain/Loss Automation
* Crypto Currency Support
* AI Exchange Forecast

---

# ১৯. Notes

FFME Architecture-এ—

| Entity           | Purpose                      |
| ---------------- | ---------------------------- |
| Currency         | Financial Measurement        |
| Exchange Rate    | Currency Conversion          |
| Financial Entity | Accounting                   |
| Ledger           | Financial Record             |
| Business Partner | Default Transaction Currency |

Inventory Quantity কখনো Currency দ্বারা প্রভাবিত হবে না।

Currency শুধুমাত্র Financial Value নির্ধারণ করবে।

---

# ২০. Related Documents

* Architecture.md
* Financial Entity
* Business Partner
* Sales
* Purchase
* Finance
* Asset
* Manufacturing
* ADR-0003 Shared Masters

---

# ২১. Conclusion

Currency Module FFME ERP-এর Financial Measurement Framework।

এর মাধ্যমে—

* Multi-Currency Support
* Standard Accounting
* Exchange Rate Management
* International Business Support
* Financial Reporting

একটি ভবিষ্যৎ-উপযোগী ERP Architecture গঠন করা সম্ভব।

FFME-তে Currency হলো:

**Financial Value → Accounting Standard → Global Business Support**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `06-Tax.md`
