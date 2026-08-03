# Business Partner

**Document:** Business Architecture

**Version:** 1.0.0 (Draft)

**Status:** Draft

**Owner:** FFME Core Team

**Module:** Business Partner Management

---

# ১. উদ্দেশ্য (Purpose)

Business Partner Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের সাথে ব্যবসায়িক সম্পর্কযুক্ত সকল ব্যক্তি, প্রতিষ্ঠান এবং ব্যবসায়িক সত্তাকে (Business Entity) একটি কেন্দ্রীয় Master Data হিসেবে সংরক্ষণ করা।

FFME-তে Customer, Supplier, Distributor, Dealer, Franchise, Transport Partner এবং অন্যান্য ব্যবসায়িক সম্পর্ক আলাদা Master হিসেবে নয়, বরং একটি Business Partner-এর বিভিন্ন Role হিসেবে পরিচালিত হবে।

---

# ২. সংজ্ঞা (Definition)

Business Partner হলো এমন ব্যক্তি, প্রতিষ্ঠান বা ব্যবসা, যার সাথে কোম্পানির কোনো না কোনো ব্যবসায়িক সম্পর্ক রয়েছে।

একজন Business Partner এক বা একাধিক Role পালন করতে পারে।

---

# ৩. Business Partner Roles

একজন Partner একাধিক Role একসাথে রাখতে পারবে।

উদাহরণ:

* Customer
* Supplier
* Distributor
* Dealer
* Franchise Partner
* Transport Partner
* Service Provider
* Contractor

---

# ৪. বাস্তব উদাহরণ

## উদাহরণ ১

Rahman Traders

Roles

* Customer
* Distributor

---

## উদাহরণ ২

ABC Packaging

Roles

* Supplier

---

## উদাহরণ ৩

XYZ Logistics

Roles

* Transport Partner
* Service Provider

---

# ৫. Business Partner Profile

## Basic Information

* Partner Name
* Business Name
* Partner Code
* Partner Type
* Business Type

---

## Contact

* Mobile
* Telephone
* Email
* Website

---

## Identity

* Trade License
* BIN
* TIN
* NID (Optional)

---

## Address

* Country
* Division
* District
* Upazila
* Full Address

---

# ৬. Business Type

Business Type দ্বারা Partner-এর নিজের ব্যবসার ধরন বোঝাবে।

উদাহরণ

* Manufacturer
* Distributor
* Wholesaler
* Retailer
* Importer
* Exporter
* Service Provider

---

# ৭. Partner Roles

Role বোঝাবে কোম্পানির সাথে তার সম্পর্ক।

একজন Partner-এর একাধিক Role থাকতে পারে।

উদাহরণ

```text
Rahman Traders

Business Type

Distributor

Roles

✓ Customer

✓ Distributor
```

---

# ৮. Ownership

Business Partner কোন Company-এর অধীনে থাকবে।

Future SaaS Version-এ একই Partner একাধিক Company-এর সাথে সম্পর্ক রাখতে পারবে।

---

# ৯. Financial Information

Business Partner-এর থাকবে—

* Opening Balance
* Current Balance
* Credit Limit
* Credit Days

Role অনুযায়ী Receivable অথবা Payable হিসাব হবে।

---

# ১০. Role Based Behaviour

## Customer Role

* Sales
* Collection
* Outstanding

---

## Supplier Role

* Purchase
* Payment
* Payable

---

## Distributor Role

* Territory
* Company Policy
* Distributor Agreement
* Distributor Incentive

---

## Transport Partner

* Vehicle Assignment
* Freight Charge

---

## Service Provider

* Service Bill
* Work Order

---

# ১১. Relationship

একজন Partner-এর সাথে সম্পর্কিত থাকবে—

* Sales Invoice
* Purchase Invoice
* Payment
* Collection
* Journal
* Contract
* Documents

---

# ১২. Status

* Active
* Inactive
* Suspended
* Blacklisted

---

# ১৩. Reports

* Business Partner List
* Role Wise Report
* Customer Report
* Supplier Report
* Distributor Report
* Outstanding Report
* Payable Report

---

# ১৪. Business Rules

### Rule 001

প্রতিটি Business Partner-এর একটি Unique Partner Code থাকবে।

---

### Rule 002

একজন Partner একাধিক Role নিতে পারবে।

---

### Rule 003

Role পরিবর্তন করলেও Partner Code পরিবর্তন হবে না।

---

### Rule 004

একটি Role মুছে ফেললেও Partner Record মুছে যাবে না।

---

### Rule 005

সব Financial Transaction Partner Ledger-এ সংরক্ষিত হবে।

---

# ১৫. Audit

Log হবে—

* Role Change
* Information Update
* Status Change
* Financial Change

---

# ১৬. Future Expansion

* Customer Portal
* Supplier Portal
* Distributor Portal
* Digital Agreement
* eKYC
* GPS Mapping
* AI Credit Rating
* Partner Performance Score

---

# ১৭. Architecture Relationship

```text
Business Partner
        │
        ├── Customer Role
        ├── Supplier Role
        ├── Distributor Role
        ├── Dealer Role
        ├── Franchise Role
        ├── Transport Partner
        └── Service Provider
```

---

# ১৮. উপসংহার

Business Partner হলো FFME-এর সকল ব্যবসায়িক সম্পর্কের কেন্দ্রীয় Master Entity।

এই Architecture-এর মাধ্যমে একই ব্যক্তি বা প্রতিষ্ঠানকে বারবার Customer, Supplier বা Distributor হিসেবে আলাদা Record তৈরি করতে হবে না।

এটি Duplicate Data কমায়, Accounting সহজ করে এবং ভবিষ্যতে Enterprise SaaS Architecture-এর জন্য শক্ত ভিত্তি তৈরি করে।

---

**Document Status:** Draft v1.0

**Related Documents:**

* Company
* Distributor
* Customer
* Supplier
* Finance
