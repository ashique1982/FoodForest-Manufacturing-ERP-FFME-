# Business Type

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Business Partner Architecture

**Module:** Shared Master / Business Classification

---

# ১. Purpose

Business Type Module-এর উদ্দেশ্য হলো FFME ERP-তে কোনো ব্যক্তি, প্রতিষ্ঠান অথবা Business Partner কী ধরনের ব্যবসা পরিচালনা করে তা সংজ্ঞায়িত করা।

Business Type ব্যবহার করে—

* Business Classification
* Sales Strategy
* Purchase Strategy
* Pricing Policy
* Credit Policy
* Reporting
* Business Analysis

পরিচালনা করা হবে।

---

# ২. Definition

Business Type হলো একটি Classification System যা একটি Business Partner-এর ব্যবসার প্রকৃতি (Nature of Business) নির্ধারণ করে।

FFME Architecture অনুযায়ী—

**Business Type ≠ Business Role**

---

## Example

```text id="bt001"
Business Partner

Rahman Traders


Business Type

✓ Wholesaler

✓ Retailer


Business Role

✓ Customer

✓ Distributor
```

এখানে—

* Rahman Traders = Business Partner
* Wholesaler / Retailer = Business Type
* Customer / Distributor = Business Role

---

# ৩. Business Type Architecture

```text id="bt002"
Business Partner

        │

        ├── Business Type

        │        │

        │        ├── Retailer

        │        ├── Wholesaler

        │        ├── Distributor

        │        ├── Manufacturer

        │        └── Service Provider

        │

        └── Business Role

                 │

                 ├── Customer

                 ├── Supplier

                 ├── Distributor Role

                 └── Other Roles
```

---

# ৪. Business Type Characteristics

একটি Business Partner-এর—

* একটি Business Type থাকতে পারে।
* একাধিক Business Type থাকতে পারে।
* সময়ের সাথে Business Type পরিবর্তন হতে পারে।

---

## Example

একটি প্রতিষ্ঠান:

বর্তমানে:

```text
Business Type

Retailer
```

পরবর্তীতে:

```text
Business Type

Retailer

+

Wholesaler
```

হতে পারে।

---

# ৫. Standard Business Types

FFME Default হিসেবে নিম্নোক্ত Business Type সমর্থন করবে।

---

# ৫.১ Retailer

## Definition

যে ব্যবসায়ী সরাসরি শেষ Customer-এর কাছে Product বিক্রি করে।

---

## Example

* Grocery Shop
* Retail Store
* Local Shop

---

## Operational Characteristics

* Small Quantity Purchase
* Frequent Purchase
* Retail Pricing
* Cash/Credit Transaction

---

# ৫.২ Wholesaler

## Definition

যে ব্যবসায়ী বড় পরিমাণে Product ক্রয় করে এবং ছোট ব্যবসায়ীদের কাছে বিক্রি করে।

---

## Characteristics

* Bulk Purchase
* Wholesale Pricing
* Higher Credit Limit
* Large Volume Sales

---

# ৫.৩ Distributor

## Definition

যে Business Partner Company-এর Product নির্দিষ্ট Territory-তে Distribution করে।

---

## Characteristics

* Territory Based Operation
* Warehouse
* Delivery Network
* Collection Management

---

# ৫.৪ Dealer

## Definition

যে ব্যবসায়ী Company-এর অনুমোদিত Sales Channel হিসেবে Product বিক্রি করে।

---

## Characteristics

* Authorized Relationship
* Dealer Agreement
* Special Pricing

---

# ৫.৫ Manufacturer

## Definition

যে প্রতিষ্ঠান নিজে Product উৎপাদন করে।

---

## Characteristics

* Production Facility
* Raw Material Purchase
* Manufacturing Process

---

# ৫.৬ Supplier

## Definition

যে Business Partner Company-কে Product বা Service সরবরাহ করে।

---

## Characteristics

* Supply Relationship
* Purchase Contract
* Payable Management

---

# ৫.৭ Service Provider

## Definition

যে প্রতিষ্ঠান Product নয়, Service প্রদান করে।

---

## Example

* Transport Company
* Maintenance Provider
* Consultant

---

# ৫.৮ Corporate

## Definition

বড় প্রতিষ্ঠান যারা Business Purchase করে।

---

## Example

* Company
* Office
* Organization

---

# ৫.৯ Institutional

## Definition

যে প্রতিষ্ঠান নির্দিষ্ট উদ্দেশ্যে Product গ্রহণ করে।

---

## Example

* School
* Hospital
* NGO

---

# ৫.১০ Government

## Definition

সরকারি প্রতিষ্ঠান বা সংস্থা।

---

# ৬. Business Type Relationship

Business Type অন্যান্য Module-এর সাথে সম্পর্কিত হবে।

---

## Sales

Business Type অনুযায়ী—

* Price Level
* Discount
* Sales Policy

নির্ধারণ করা যাবে।

---

## Purchase

Supplier Business Type অনুযায়ী—

* Purchase Strategy
* Supply Planning

করা যাবে।

---

## Finance

Business Type অনুযায়ী—

* Credit Limit
* Payment Terms

নির্ধারণ করা যাবে।

---

# ৭. Business Type Attributes

প্রতিটি Business Type-এর থাকবে—

---

## Basic Information

* Business Type Code
* Business Type Name
* Description
* Status

---

## Control Information

* Default Price Level
* Default Credit Policy
* Default Payment Terms
* Applicable Module

---

# ৮. Multiple Business Type Example

```text id="bt003"
Business Partner

Food Corner Ltd.


Business Types

✓ Retailer

✓ Wholesaler


Business Roles

✓ Customer
```

---

আরেকটি উদাহরণ:

```text id="bt004"
Business Partner

ABC Trading


Business Types

✓ Distributor

✓ Wholesaler


Business Roles

✓ Customer

✓ Distributor
```

---

# ৯. Business Rules

### Rule 001

Business Type শুধুমাত্র Business Classification-এর জন্য ব্যবহৃত হবে।

---

### Rule 002

Business Type কখনো Business Role-এর বিকল্প নয়।

---

### Rule 003

একজন Business Partner একাধিক Business Type রাখতে পারবে।

---

### Rule 004

Business Type পরিবর্তনের History সংরক্ষণ করতে হবে।

---

### Rule 005

Inactive Business Type নতুন Partner-এর জন্য ব্যবহার করা যাবে না।

---

### Rule 006

Business Type Delete করা যাবে না।

Inactive করা যাবে।

---

# ১০. Audit Trail

Business Type সম্পর্কিত পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Business Type Created
* Business Type Updated
* Status Changed
* Partner Assignment Changed

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ১১. Reports

## Business Analysis Report

* Business Type Wise Partner List
* Sales By Business Type
* Purchase By Business Type
* Outstanding By Business Type

---

# ১২. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* AI Business Classification
* Automatic Partner Segmentation
* Industry Classification
* Business Risk Score
* Partner Ranking

---

# ১৩. Notes

FFME Architecture-এর সবচেয়ে গুরুত্বপূর্ণ Separation:

| Entity           | Purpose                     |
| ---------------- | --------------------------- |
| Business Partner | ব্যক্তি/প্রতিষ্ঠানের Master |
| Business Type    | ব্যবসার ধরন                 |
| Business Role    | Company-এর সাথে সম্পর্ক     |
| Territory        | ব্যবসার এলাকা               |
| Route            | Sales Operation             |

---

# ১৪. Related Documents

* Architecture.md
* ADR-0003 Shared Masters
* ADR-0004 Business Partner Roles
* Business Partner
* Customer
* Supplier
* Distributor
* Dealer
* Sales
* Purchase
* Finance

---

# ১৫. Conclusion

Business Type Module FFME-এর Business Classification Framework।

এর মাধ্যমে একটি Business Partner-এর প্রকৃত ব্যবসার ধরন আলাদা করে সংরক্ষণ করা যাবে।

FFME Architecture অনুযায়ী—

**Business Partner → Business Type + Business Role**

এই কাঠামো ভবিষ্যতে Multi-Company, Multi-Industry এবং SaaS ERP Platform তৈরির জন্য উপযুক্ত।

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `02-Business-Partner.md`
