# ADR-0002 : Offline First Architecture

**ADR Number:** ADR-0002

**Title:** Offline First Architecture

**Status:** Accepted

**Date:** 2026-07-31

**Decision Type:** Core System Architecture

---

# Problem

FFME মূলত বাংলাদেশসহ উন্নয়নশীল দেশের ব্যবসা প্রতিষ্ঠানের জন্য তৈরি করা হচ্ছে।

অনেক এলাকায় এখনও নিম্নোক্ত সমস্যা নিয়মিত দেখা যায়—

* দুর্বল ইন্টারনেট
* মোবাইল নেটওয়ার্ক বিচ্ছিন্ন হওয়া
* বিদ্যুৎ বিভ্রাট
* দূরবর্তী গ্রামীণ এলাকা
* চলমান (On Route) বিক্রয় কার্যক্রম

যদি ERP সম্পূর্ণ Online নির্ভর হয়, তাহলে ইন্টারনেট না থাকলে ব্যবসা বন্ধ হয়ে যাবে।

এটি গ্রহণযোগ্য নয়।

---

# Context

FFME ব্যবহার করবে—

* Factory
* Distributor Point
* Retail Shop
* Field Sales Representative
* Delivery Man
* Route Sales
* Mobile Sales
* Warehouse

এই সকল স্থানে সবসময় নিরবচ্ছিন্ন ইন্টারনেট থাকবে—এমনটি ধরে নেওয়া যাবে না।

---

# Options Considered

## Option A

### Online Only

সমস্ত Transaction Server-এ সরাসরি সম্পন্ন হবে।

### Advantages

* সহজ Architecture
* Real-time Data

### Disadvantages

* Internet ছাড়া কাজ বন্ধ
* Route Sales অসম্ভব
* Factory Operation ঝুঁকিপূর্ণ
* POS বন্ধ হয়ে যাবে

---

## Option B

### Offline First

System Internet থাকলে Sync করবে।

Internet না থাকলেও Local Database-এ কাজ চলবে।

Connection ফিরে এলে Synchronization হবে।

---

# Decision

FFME **Offline First Architecture** অনুসরণ করবে।

সকল গুরুত্বপূর্ণ Business Operation Internet ছাড়াই চালানো যাবে।

Synchronization Background-এ সম্পন্ন হবে।

---

# Offline Supported Modules

Offline Mode-এ নিম্নোক্ত Module কাজ করবে।

* Sales
* POS
* Collection
* Attendance
* Inventory Lookup
* Product Search
* Customer Search
* Route Sales
* Delivery Confirmation

---

# Online Required Modules

নিম্নোক্ত কাজগুলো Online হওয়া উত্তম।

* User Management
* Software Update
* Cloud Backup
* License Verification
* Multi Company Synchronization
* Remote Monitoring

---

# Synchronization Policy

System Local Database-এ Transaction সংরক্ষণ করবে।

Synchronization হবে—

* Internet Available হলে
* Manual Sync
* Scheduled Sync
* Background Auto Sync

---

# Conflict Resolution

যদি একই Record একাধিক Device থেকে পরিবর্তিত হয়—

System Conflict Detect করবে।

Company Policy অনুযায়ী—

* Latest Update Wins
* Manual Review
* Manager Approval

—এর যেকোনো একটি নীতি ব্যবহার করা যাবে।

---

# Local Storage

Device অনুযায়ী Local Database ব্যবহার করা হবে।

উদাহরণ

* Desktop → SQLite / Local Storage Layer
* Mobile → Embedded Database
* Browser → IndexedDB (যেখানে প্রযোজ্য)

Implementation Technology ভবিষ্যতে নির্ধারণ করা হবে, কিন্তু Business Rule অপরিবর্তিত থাকবে।

---

# Data Priority

নিম্নোক্ত Data অবশ্যই Offline Available থাকবে।

* Product
* Customer
* Business Partner
* Price List
* UOM
* Tax
* Territory
* Route
* Current Stock

---

# Security

Offline Data Encryption সমর্থন করতে হবে।

User Logout হলে Sensitive Data Company Policy অনুযায়ী—

* Retain
* Encrypt
* Remove

—কনফিগার করা যাবে।

---

# Benefits

* Internet ছাড়াই ব্যবসা চলবে।
* Factory Production বন্ধ হবে না।
* Distributor Point সচল থাকবে।
* Field Sales বন্ধ হবে না।
* POS সবসময় চালু থাকবে।
* Customer Service উন্নত হবে।

---

# Risks

* Synchronization Conflict
* Local Device Failure
* Duplicate Transaction-এর সম্ভাবনা

এসবের জন্য Synchronization Engine এবং Audit Trail বাধ্যতামূলক।

---

# Consequences

FFME-এর সকল Module এমনভাবে ডিজাইন করতে হবে যাতে—

* Offline Operation সম্ভব হয়।
* Online Synchronization সমর্থন করে।
* Transaction হারিয়ে না যায়।
* Duplicate Entry প্রতিরোধ করা যায়।

---

# Impact

এই সিদ্ধান্তের প্রভাব পড়বে—

* Database Design
* API Design
* Mobile App
* POS
* Sales
* Inventory
* Attendance
* Route Management

---

# Related Documents

* Architecture.md
* Business Partner
* Sales
* Inventory
* Attendance
* Route

---

# Notes

Offline First মানে Offline Only নয়।

Internet থাকলে System Real-time কাজ করবে।

Internet না থাকলে ব্যবসা বন্ধ না হয়ে Local Mode-এ চলবে এবং পরে নিরাপদভাবে Synchronization সম্পন্ন করবে।

---

**Status:** Accepted

**Version:** 1.0.0
