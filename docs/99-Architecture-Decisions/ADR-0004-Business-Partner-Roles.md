# ADR-0004 : Business Partner Roles

**ADR Number:** ADR-0004

**Title:** Business Partner Roles Architecture

**Status:** Accepted

**Date:** 2026-07-31

**Decision Type:** Core Business Architecture

---

# Problem

বাস্তব ব্যবসায় একই ব্যক্তি বা প্রতিষ্ঠান বিভিন্ন সময়ে বিভিন্ন ব্যবসায়িক ভূমিকা (Role) পালন করে।

উদাহরণ:

* একজন Distributor কোম্পানির Customer।
* একই প্রতিষ্ঠান অন্য কোম্পানির Supplier।
* একজন Wholesaler একই সাথে Retailer।
* একজন Franchise Partner একই সাথে Distributor।

যদি প্রতিটি Role-এর জন্য আলাদা Master Record তৈরি করা হয়, তাহলে—

* Duplicate Data তৈরি হবে।
* একই প্রতিষ্ঠানের একাধিক Code হবে।
* Ledger বিভক্ত হবে।
* Reporting জটিল হবে।

---

# Context

FFME Manufacturing, Distribution, Wholesale, Retail এবং Service Business সমর্থন করবে।

সুতরাং Business Relationship স্থির (Static) নয়, পরিবর্তনশীল (Dynamic)।

---

# Options Considered

## Option A

প্রতিটি Role-এর জন্য আলাদা Master।

উদাহরণ

* Customer Table
* Supplier Table
* Distributor Table
* Dealer Table

### Advantages

* ছোট Software-এর জন্য সহজ

### Disadvantages

* Duplicate Information
* একাধিক Ledger
* একই প্রতিষ্ঠানের একাধিক Record
* Data Maintenance কঠিন

---

## Option B

Business Partner হবে Master।

Role আলাদা Table/Relationship হিসেবে সংরক্ষণ করা হবে।

---

# Decision

FFME-তে Business Partner হবে একমাত্র Master Entity।

Customer, Supplier, Distributor, Dealer, Franchise, Transport Partner, Service Provider ইত্যাদি Business Partner-এর Role হবে।

---

# Architecture

```text
Business Partner

│

├── Customer

├── Supplier

├── Distributor

├── Dealer

├── Franchise

├── Transport Partner

├── Service Provider

└── Contractor
```

---

# Role Assignment

একজন Business Partner—

* একটি Role নিতে পারে।
* একাধিক Role নিতে পারে।
* ভবিষ্যতে নতুন Role যোগ করতে পারে।

Role সংখ্যা সীমাবদ্ধ নয়।

---

# Example 1

Rahman Traders

Business Partner

Roles

* Distributor
* Customer

Business Types

* Wholesaler

---

# Example 2

ABC Logistics

Business Partner

Roles

* Transport Partner
* Service Provider

---

# Example 3

XYZ Enterprise

Business Partner

Roles

* Supplier
* Customer
* Dealer

---

# Role Behaviour

## Customer Role

* Sales
* Collection
* Outstanding
* Credit Limit

---

## Supplier Role

* Purchase
* Payment
* Payable
* Purchase Return

---

## Distributor Role

* Territory
* Product Distribution
* Collection
* Stock Management

---

## Dealer Role

* Authorized Sales
* Pricing Policy

---

## Franchise Role

* Franchise Agreement
* Royalty
* Business Operation

---

## Transport Partner

* Vehicle Assignment
* Delivery Charge
* Freight Bill

---

## Service Provider

* Service Contract
* Work Order
* Service Invoice

---

# Financial Rules

Financial Behaviour Role অনুযায়ী নির্ধারিত হবে।

উদাহরণ

Customer Role

→ Accounts Receivable

Supplier Role

→ Accounts Payable

একই Business Partner-এর Receivable এবং Payable উভয়ই থাকতে পারে।

---

# Role Activation

Role

* Add করা যাবে।
* Inactive করা যাবে।
* পুনরায় Active করা যাবে।

Role Delete করা হবে না।

---

# Permission

Role যোগ বা পরিবর্তন করার অনুমতি শুধুমাত্র অনুমোদিত ব্যবহারকারীর থাকবে।

---

# Audit Trail

Log হবে—

* Role Added
* Role Removed (Inactive)
* Role Reactivated
* Role Changed

---

# Benefits

* Duplicate Data কমে।
* একটি Ledger।
* সহজ Reporting।
* সহজ API।
* সহজ Database Design।
* Enterprise ERP Standard অনুসরণ।

---

# Risks

Role Assignment ভুল হলে—

* Permission সমস্যা হতে পারে।
* Accounting সমস্যা হতে পারে।

তাই Validation এবং Approval Policy বাধ্যতামূলক।

---

# Consequences

FFME-তে—

Customer,

Supplier,

Distributor,

Dealer

কোনোটিই Root Master হবে না।

সবই Business Partner Role হবে।

---

# Future Expansion

ভবিষ্যতে নতুন Role যোগ করা যাবে।

উদাহরণ

* Agent
* Export Partner
* Import Partner
* Commission Agent
* Online Marketplace
* Marketing Agency

Database Structure পরিবর্তন ছাড়াই।

---

# Impact

এই সিদ্ধান্তের প্রভাব পড়বে—

* Sales
* Purchase
* Inventory
* Distribution
* Finance
* CRM
* API
* Database Design
* Permission System

---

# Related Documents

* ADR-0001 Business Partner Architecture
* ADR-0003 Shared Masters
* Business Partner
* Distributor
* Customer
* Supplier

---

# Notes

Business Partner এবং Business Type এক বিষয় নয়।

**Business Partner** হলো Master Entity।

**Business Role** হলো কোম্পানির সাথে সম্পর্ক।

**Business Type** হলো Partner-এর নিজের ব্যবসার ধরন।

উদাহরণ:

```text
Business Partner

Rahman Traders

Business Type

Wholesaler

Retailer

Business Roles

Customer

Distributor
```

এই তিনটি ধারণা (Business Partner, Business Type এবং Business Role) সম্পূর্ণ আলাদা এবং FFME-এর Architecture-এ পৃথকভাবে পরিচালিত হবে।

---

**Status:** Accepted

**Version:** 1.0.0
