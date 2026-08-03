# ADR-0001 : Business Partner Architecture

**ADR Number:** ADR-0001

**Title:** Business Partner as the Master Business Entity

**Status:** Accepted

**Date:** 2026-07-31

**Decision Type:** Core Architecture

---

# Problem

প্রাথমিক Architecture-এ Customer, Supplier এবং Distributor-কে আলাদা Master Entity হিসেবে ডিজাইন করা হয়েছিল।

বাস্তব ব্যবসায় দেখা যায় একই ব্যক্তি বা প্রতিষ্ঠান একাধিক ভূমিকা পালন করতে পারে।

উদাহরণ:

* একজন Distributor কোম্পানির কাছে Customer।
* একই Distributor অন্য প্রতিষ্ঠানের Supplier হতে পারে।
* একজন Wholesaler একই সাথে Retailer-ও হতে পারে।

আলাদা Master Entity ব্যবহার করলে একই প্রতিষ্ঠানের একাধিক Record তৈরি হয় এবং Duplicate Data, Accounting Complexity ও Maintenance Cost বৃদ্ধি পায়।

---

# Options Considered

## Option A

Customer, Supplier এবং Distributor আলাদা Master হিসেবে রাখা।

### সুবিধা

* সহজ Architecture
* ছোট ব্যবসার জন্য উপযোগী

### অসুবিধা

* Duplicate Data
* একই প্রতিষ্ঠানের একাধিক Record
* Accounting জটিল
* Data Synchronization সমস্যা

---

## Option B

Business Partner নামে একটি Master Entity তৈরি করা এবং Customer, Supplier, Distributor ইত্যাদিকে Role হিসেবে সংজ্ঞায়িত করা।

---

# Decision

FFME-তে **Business Partner** হবে সকল ব্যবসায়িক সম্পর্কের Master Entity।

Customer, Supplier, Distributor, Dealer, Franchise, Transport Partner এবং অন্যান্য সম্পর্ক Business Partner-এর Role হিসেবে পরিচালিত হবে।

---

# Business Model

```text
Business Partner

│

├── Customer

├── Supplier

├── Distributor

├── Dealer

├── Franchise

├── Transport Partner

└── Service Provider
```

একজন Business Partner একাধিক Role ধারণ করতে পারবে।

---

# Example

Rahman Traders

Business Partner

Roles

* Distributor
* Customer

Business Types

* Wholesaler
* Retailer

---

# Reasons

এই Architecture নির্বাচন করার কারণ:

* Duplicate Data কমানো
* Enterprise ERP Standard অনুসরণ
* Accounting সহজ করা
* একই Partner-এর একাধিক Business Relationship সমর্থন
* ভবিষ্যতের SaaS Architecture সহজ করা
* Multi Company Support নিশ্চিত করা

---

# Consequences

## Positive

* Single Source of Truth
* সহজ Ledger Management
* সহজ API Design
* Flexible Business Model
* ভবিষ্যতে নতুন Role যোগ করা সহজ

## Negative

* প্রাথমিক Architecture তুলনামূলক জটিল
* Role ভিত্তিক Permission আলাদাভাবে ডিজাইন করতে হবে

---

# Impact

এই সিদ্ধান্তের প্রভাব পড়বে—

* Distributor
* Customer
* Supplier
* Finance
* Sales
* Purchase
* CRM
* API
* Database Design

---

# Related Documents

* Business Partner
* Distributor
* Customer
* Supplier
* Finance

---

# Notes

এই ADR গ্রহণের পর Customer, Supplier এবং Distributor আর আলাদা Master Entity হিসেবে বিবেচিত হবে না।

তারা Business Partner-এর Role হিসেবে পরিচালিত হবে।

---

**Status:** Accepted

**Version:** 1.0.0
