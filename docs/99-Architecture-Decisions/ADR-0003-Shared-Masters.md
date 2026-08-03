# ADR-0003 : Shared Masters

**ADR Number:** ADR-0003

**Title:** Shared Masters Architecture

**Status:** Accepted

**Date:** 2026-07-31

**Decision Type:** Core Data Architecture

---

# Problem

ERP System-এর বিভিন্ন Module-এ একই ধরনের তথ্য বারবার ব্যবহৃত হয়।

উদাহরণ:

* Category
* Brand
* UOM
* Territory
* Department
* Designation
* Payment Method

যদি প্রতিটি Module নিজের আলাদা Master তৈরি করে, তাহলে—

* Duplicate Data তৈরি হবে।
* একই তথ্য একাধিক জায়গায় Update করতে হবে।
* Reporting অসঙ্গত হবে।
* Database জটিল হয়ে যাবে।

---

# Context

FFME-তে নিম্নলিখিত Module থাকবে—

* Sales
* Purchase
* Inventory
* Manufacturing
* HR
* Finance
* CRM
* POS
* Distribution

প্রতিটি Module একই Master Data ব্যবহার করবে।

---

# Options Considered

## Option A

### Module Wise Masters

প্রতিটি Module নিজস্ব Master Table ব্যবহার করবে।

উদাহরণ

Sales Category

Purchase Category

Inventory Category

### Advantages

* শুরুতে সহজ
* ছোট সফটওয়্যারের জন্য উপযোগী

### Disadvantages

* Duplicate Data
* একই তথ্য একাধিকবার সংরক্ষণ
* Maintenance কঠিন
* Reporting জটিল

---

## Option B

### Shared Masters

একটি Master Table থাকবে।

সব Module সেই Table ব্যবহার করবে।

---

# Decision

FFME-তে সকল সাধারণ Master Data **Shared Master** হিসেবে সংরক্ষণ করা হবে।

একটি Master একাধিক Module ব্যবহার করবে।

---

# Shared Master List

প্রাথমিকভাবে নিম্নলিখিত Shared Masters থাকবে।

* Business Type
* Category
* Brand
* Unit of Measure (UOM)
* Territory
* Department
* Designation
* Payment Method
* Tax
* Currency
* Country
* Division
* District
* Upazila
* Route

ভবিষ্যতে প্রয়োজন অনুযায়ী নতুন Shared Master যোগ করা যাবে।

---

# Example

## Category

একটি Category Table ব্যবহার করবে—

* Product
* Inventory
* Manufacturing
* Reports

---

## UOM

একটি UOM ব্যবহার করবে—

* Purchase
* Sales
* Production
* Stock
* Packaging

---

## Territory

একটি Territory ব্যবহার করবে—

* Distributor
* Customer
* Sales Representative
* Attendance
* Route
* Reporting

---

# Master Ownership

Shared Masters কোনো নির্দিষ্ট Module-এর মালিকানাধীন হবে না।

তারা System Level Master হিসেবে বিবেচিত হবে।

---

# Modification Policy

Shared Master পরিবর্তনের অধিকার থাকবে শুধুমাত্র অনুমোদিত ব্যবহারকারীর।

সাধারণ ব্যবহারকারী Master পরিবর্তন করতে পারবে না।

---

# Version Control

Shared Master পরিবর্তন হলে—

* Audit Log সংরক্ষণ হবে।
* পুরনো Value Tracking করা হবে।
* প্রয়োজন হলে Inactive করা হবে।

Delete করা হবে না।

---

# Reuse Policy

একটি Shared Master একাধিক Module-এ পুনঃব্যবহার করা বাধ্যতামূলক।

একই ধরনের নতুন Master তৈরি করা যাবে না।

---

# Naming Standard

Shared Master-এর নাম পুরো System-এ এক থাকবে।

উদাহরণ

সঠিক

* Brand
* Category
* Territory

ভুল

* Product Brand
* Sales Brand
* Purchase Brand

---

# Benefits

* Duplicate Data কমবে।
* Database সহজ হবে।
* Reporting একরূপ হবে।
* Maintenance Cost কমবে।
* API Design সহজ হবে।
* Module Integration উন্নত হবে।

---

# Risks

যদি Shared Master ভুলভাবে পরিবর্তন করা হয়—

* একাধিক Module প্রভাবিত হতে পারে।

তাই—

* Permission Control
* Audit Trail
* Validation

বাধ্যতামূলক।

---

# Consequences

FFME-এর প্রতিটি Module Shared Masters ব্যবহার করবে।

কোনো Module নিজস্ব Category, Brand, UOM, Territory বা Department Table তৈরি করবে না।

---

# Impact

এই সিদ্ধান্তের প্রভাব পড়বে—

* Product
* Sales
* Purchase
* Manufacturing
* Inventory
* Finance
* HR
* CRM
* Reporting
* API
* Database Design

---

# Related Documents

* Architecture.md
* Business Partner
* Product
* Sales
* Inventory
* Manufacturing

---

# Notes

Shared Masters হলো FFME-এর Reference Data Layer।

এগুলো তুলনামূলকভাবে কম পরিবর্তিত হয়, কিন্তু পুরো ERP System-এর ভিত্তি হিসেবে কাজ করে।

সঠিকভাবে Shared Masters ডিজাইন করা হলে ভবিষ্যতে Module সংখ্যা বাড়লেও Database Structure অপরিবর্তিত রাখা সম্ভব হবে।

---

**Status:** Accepted

**Version:** 1.0.0
