# ADR-0005 : Territory Model

**ADR Number:** ADR-0005

**Title:** Territory Model Architecture

**Status:** Accepted

**Date:** 2026-07-31

**Decision Type:** Core Business Architecture

---

# Problem

FFME একটি Manufacturing, Distribution, Wholesale এবং Retail ERP।

Sales, Distribution, Collection, Attendance, Delivery এবং Reporting-এর জন্য ভৌগোলিক (Geographical) কাঠামো অত্যন্ত গুরুত্বপূর্ণ।

যদি Territory Model শুরুতেই সঠিকভাবে ডিজাইন না করা হয়, তাহলে—

* Sales Assignment জটিল হবে।
* Distributor Management কঠিন হবে।
* Route Planning অসম্ভব হবে।
* Reporting সঠিক হবে না।
* Attendance নিয়ন্ত্রণ কঠিন হবে।

---

# Context

একটি Company সাধারণত নিম্নোক্তভাবে ব্যবসা পরিচালনা করে—

* Country
* Division
* District
* Upazila / Thana
* Distributor Point
* Sales Route

একই Territory-তে বিভিন্ন ধরনের ব্যবসায়িক Entity থাকতে পারে।

---

# Options Considered

## Option A

শুধু ঠিকানা (Address) সংরক্ষণ করা।

### Advantages

* সহজ Database

### Disadvantages

* Territory ভিত্তিক Sales সম্ভব নয়।
* Route Planning সম্ভব নয়।
* Attendance নিয়ন্ত্রণ কঠিন।
* Reporting সীমিত।

---

## Option B

স্বতন্ত্র (Independent) Territory Model তৈরি করা।

Country থেকে Route পর্যন্ত একটি Hierarchy থাকবে।

---

# Decision

FFME একটি Hierarchical Territory Model ব্যবহার করবে।

Territory শুধুমাত্র Address নয়, বরং একটি Business Structure।

---

# Territory Hierarchy

```text id="k6sowu"
Country

↓

Division

↓

District

↓

Upazila / Thana

↓

Area

↓

Distributor Point

↓

Route
```

প্রতিটি স্তর Parent-Child Relationship অনুসরণ করবে।

---

# Territory Usage

একই Territory ব্যবহার করবে—

* Branch
* Warehouse
* Business Partner
* Distributor
* Customer
* Employee
* Vehicle
* Sales
* Collection
* Attendance
* Reporting

---

# Territory Ownership

Territory কোনো ব্যক্তি বা Module-এর মালিকানাধীন নয়।

এটি একটি Shared Master।

---

# Area

Area হলো Upazila-এর একটি ব্যবসায়িক উপবিভাগ।

উদাহরণ

Golapganj

* Area A
* Area B
* Area C

---

# Distributor Point

Distributor Point হলো বাস্তব (Physical) ব্যবসায়িক কেন্দ্র।

এখানেই—

* Attendance
* Loading
* Delivery
* Collection
* Daily Meeting
* Stock Receiving

সম্পন্ন হবে।

---

# Route

Route হলো Sales ও Delivery-এর কার্যকরী (Operational) ইউনিট।

Route সব Employee-এর জন্য বাধ্যতামূলক নয়।

---

## Route ব্যবহার করবে

* Sales Representative
* Delivery Man
* Route Sales
* Mobile Sales

---

## Route ব্যবহার করবে না

* Factory Worker
* Office Staff
* Store Keeper
* Accountant

---

## Manager Level

Manager-দের একাধিক Route থাকতে পারে।

উদাহরণ

Sales Representative

* প্রতিদিন ১টি নির্ধারিত Route

Zonal Sales Manager

* সপ্তাহে ৩–৪টি Route তদারকি

Area Manager

* সপ্তাহে ১–২টি Route পরিদর্শন

Country Sales Manager

* মাসে নির্ধারিত Route Audit

---

# Attendance Relationship

Attendance Route-এর ভিত্তিতে নয়।

Attendance হবে Assigned Operational Point-এ।

উদাহরণ

Sales Representative

→ Distributor Point

Area Manager

→ Area Office

Factory Worker

→ Factory

Head Office Staff

→ Head Office

---

# Business Rules

### Rule 001

প্রতিটি Distributor অবশ্যই একটি Territory-এর অধীনে থাকবে।

---

### Rule 002

প্রতিটি Customer একটি Territory-এর অন্তর্ভুক্ত হবে।

---

### Rule 003

একজন Employee-এর একটি Primary Operational Point থাকবে।

---

### Rule 004

Route শুধুমাত্র প্রয়োজনীয় Role-এর জন্য প্রযোজ্য হবে।

---

### Rule 005

একই Route একাধিক Sales Representative-এর কাছে Assign করা যাবে কি না, তা Company Policy দ্বারা নিয়ন্ত্রিত হবে।

---

### Rule 006

Attendance Route-এর উপর নির্ভর করবে না।

Attendance শুধুমাত্র Assigned Operational Point অনুযায়ী হবে।

---

### Rule 007

Territory পরিবর্তন হলে ঐ Territory-সংশ্লিষ্ট Reporting History সংরক্ষিত থাকবে।

---

# Reports

Territory ভিত্তিক Report—

* Sales by Territory
* Collection by Territory
* Outstanding by Territory
* Customer by Territory
* Distributor by Territory
* Employee by Territory
* Attendance by Territory
* Route Performance
* Territory Performance

---

# Benefits

* পরিষ্কার Sales Structure
* সহজ Route Planning
* সহজ Attendance
* উন্নত Reporting
* Multi-Level Distribution Support
* ভবিষ্যতের GIS Integration-এর ভিত্তি

---

# Risks

যদি Territory Structure ভুলভাবে ডিজাইন করা হয়—

* Sales Assignment সমস্যা হবে।
* Reporting অসঙ্গত হবে।
* Duplicate Territory তৈরি হতে পারে।

তাই Territory Code এবং Hierarchy Validation বাধ্যতামূলক।

---

# Consequences

FFME-এর সকল ভৌগোলিক ও অপারেশনাল Assignment Territory Model অনুসরণ করবে।

Address এবং Territory একই বিষয় নয়।

Address হলো Location।

Territory হলো Business Control Structure।

---

# Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* GPS Mapping
* Digital Territory Map
* GIS Integration
* Heat Map
* Geo-fencing
* AI Route Optimization
* Route Cost Analysis

---

# Impact

এই সিদ্ধান্তের প্রভাব পড়বে—

* Sales
* Distribution
* CRM
* Inventory
* Attendance
* Vehicle Management
* Delivery
* Reporting
* Business Partner

---

# Related Documents

* ADR-0003 Shared Masters
* ADR-0004 Business Partner Roles
* Business Partner
* Distributor
* Employee
* Customer

---

# Notes

FFME-তে **Address**, **Territory**, **Distributor Point** এবং **Route** চারটি সম্পূর্ণ ভিন্ন ধারণা।

* **Address** → কোথায় অবস্থিত
* **Territory** → কোন ব্যবসায়িক এলাকার অধীনে
* **Distributor Point** → কোথা থেকে অপারেশন পরিচালিত হয়
* **Route** → কোন এলাকায় বিক্রয় বা ডেলিভারি কার্যক্রম পরিচালিত হয়

এই চারটি ধারণাকে কখনো একই Entity হিসেবে বিবেচনা করা যাবে না।

---

**Status:** Accepted

**Version:** 1.0.0
