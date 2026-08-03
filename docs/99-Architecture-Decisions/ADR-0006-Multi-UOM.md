# ADR-0006 : Multi-UOM (Multiple Unit of Measure)

**ADR Number:** ADR-0006

**Title:** Multi Unit of Measure (Multi-UOM) Architecture

**Status:** Accepted

**Date:** 2026-07-31

**Decision Type:** Core Product & Inventory Architecture

---

# Problem

একটি Product বাস্তবে বিভিন্ন Unit-এ কেনা, উৎপাদন, সংরক্ষণ এবং বিক্রি হতে পারে।

উদাহরণ:

হলুদ

* ৫০ কেজির বস্তায় কেনা হয়
* কেজি হিসেবে Stock রাখা হয়
* ২০০ গ্রাম প্যাকেটে বিক্রি হয়

যদি System শুধুমাত্র একটি UOM (Unit of Measure) সমর্থন করে, তাহলে—

* Purchase জটিল হবে।
* Manufacturing সঠিক হবে না।
* Packaging অসম্ভব হবে।
* Inventory Accuracy নষ্ট হবে।

---

# Context

FFME একটি Manufacturing ERP।

এখানে একই Product বিভিন্ন ধাপে বিভিন্ন Unit ব্যবহার করবে।

উদাহরণ

Raw Material

↓

Production

↓

Packaging

↓

Sales

প্রতিটি ধাপে Unit ভিন্ন হতে পারে।

---

# Options Considered

## Option A

Single UOM

প্রতিটি Product-এর জন্য একটি মাত্র Unit থাকবে।

### Advantages

* সহজ Database
* সহজ Programming

### Disadvantages

* Manufacturing সমর্থন করবে না।
* Packaging সমর্থন করবে না।
* Purchase জটিল হবে।
* FMCG ব্যবসার জন্য উপযুক্ত নয়।

---

## Option B

Multi-UOM

একটি Product-এর একাধিক Unit থাকবে।

প্রতিটি Unit-এর Conversion Factor থাকবে।

---

# Decision

FFME সম্পূর্ণ Multi-UOM Architecture ব্যবহার করবে।

প্রতিটি Product-এর একটি Base Unit থাকবে।

অন্যান্য সকল Unit Base Unit-এর সাথে Conversion দ্বারা সম্পর্কিত হবে।

---

# UOM Hierarchy

```text
Purchase UOM

↓

Base UOM

↓

Production UOM

↓

Packaging UOM

↓

Sales UOM
```

---

# Base UOM

প্রতিটি Product-এর একটি Base UOM থাকবে।

উদাহরণ

হলুদ

Base UOM

Kilogram (kg)

Inventory সবসময় Base UOM-এ সংরক্ষণ হবে।

---

# Example 1

হলুদ

Purchase

50 kg Bag

↓

Inventory

kg

↓

Sales

200 gm Packet

---

# Example 2

মিনারেল ওয়াটার

Purchase

Carton

↓

Inventory

Bottle

↓

Sales

Bottle

---

# Example 3

Cooking Oil

Purchase

200 Liter Drum

↓

Inventory

Liter

↓

Sales

1 Liter Bottle

5 Liter Bottle

---

# Conversion

প্রতিটি UOM-এর Conversion Factor থাকবে।

উদাহরণ

```text
1 Bag = 50 kg

1 kg = 1000 gm

1 Packet = 200 gm

5 Packet = 1 kg
```

System Conversion স্বয়ংক্রিয়ভাবে করবে।

---

# Inventory Rules

Inventory সবসময় Base UOM-এ গণনা হবে।

Display Unit ব্যবহারকারী অনুযায়ী পরিবর্তন হতে পারে।

---

# Manufacturing

Recipe / BOM সবসময় Base UOM ব্যবহার করবে।

উদাহরণ

মরিচ গুঁড়া

Raw Material

25 kg

Packaging

100 gm

Inventory

kg

---

# Sales

Sales বিভিন্ন UOM-এ হতে পারবে।

উদাহরণ

* ১ কেজি
* ৫০০ গ্রাম
* ২০০ গ্রাম
* ১০০ গ্রাম
* ৫০ গ্রাম

সব Inventory থেকে Base UOM অনুযায়ী কমবে।

---

# Purchase

Supplier বিভিন্ন UOM-এ Product Supply করতে পারবে।

উদাহরণ

* Drum
* Bag
* Carton
* Bundle

System Base UOM-এ Convert করবে।

---

# Barcode

একই Product-এর বিভিন্ন UOM-এর জন্য আলাদা Barcode থাকতে পারে।

উদাহরণ

FoodForest Turmeric

* 50 gm
* 100 gm
* 200 gm
* 500 gm
* 1 kg

প্রতিটির Barcode আলাদা হবে।

---

# Pricing

প্রতিটি UOM-এর আলাদা Price থাকতে পারে।

উদাহরণ

50 gm

৳২৫

100 gm

৳৪৫

200 gm

৳৮৫

500 gm

৳২০০

---

# Business Rules

### Rule 001

প্রতিটি Product-এর একটি Base UOM বাধ্যতামূলক।

---

### Rule 002

Inventory শুধুমাত্র Base UOM-এ সংরক্ষণ হবে।

---

### Rule 003

সকল Conversion System দ্বারা পরিচালিত হবে।

Manual Conversion অনুমোদিত নয়।

---

### Rule 004

Conversion Factor পরিবর্তন করলে Audit Log সংরক্ষণ করতে হবে।

---

### Rule 005

একই Product-এর একাধিক Sales UOM থাকতে পারবে।

---

### Rule 006

একই Product-এর Purchase UOM এবং Sales UOM ভিন্ন হতে পারবে।

---

### Rule 007

Conversion Factor শূন্য বা ঋণাত্মক (Negative) হতে পারবে না।

---

# Reports

System দেখাবে—

* Purchase UOM
* Sales UOM
* Base UOM
* Converted Quantity
* Inventory Balance
* Packaging Balance

---

# Benefits

* Manufacturing সমর্থন করবে।
* Packaging সহজ হবে।
* Purchase সহজ হবে।
* Sales Flexible হবে।
* Inventory Accurate থাকবে।
* FMCG ব্যবসার জন্য উপযোগী।

---

# Risks

ভুল Conversion Factor দিলে—

* Stock ভুল হবে।
* Costing ভুল হবে।
* Production ভুল হবে।

তাই Conversion অনুমোদিত ব্যবহারকারী দ্বারা নিয়ন্ত্রিত হবে।

---

# Consequences

FFME-তে Single UOM ব্যবহার করা হবে না।

সকল Product Multi-UOM সমর্থন করবে।

Inventory সবসময় Base UOM-এ পরিচালিত হবে।

---

# Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Variable Weight Product
* Catch Weight
* Dual UOM
* Packaging Automation
* GS1 Barcode Integration
* Smart Scale Integration

---

# Impact

এই সিদ্ধান্তের প্রভাব পড়বে—

* Product
* Purchase
* Inventory
* Manufacturing
* Packaging
* Sales
* POS
* Barcode
* Finance
* Reporting

---

# Related Documents

* ADR-0003 Shared Masters
* Product
* Inventory
* Manufacturing
* Sales
* Purchase

---

# Notes

FFME-তে **UOM**, **Package** এবং **Product** একই বিষয় নয়।

* **Product** → কী বিক্রি বা উৎপাদন করা হচ্ছে
* **UOM** → কোন এককে পরিমাপ করা হচ্ছে
* **Package** → কীভাবে প্যাক করা হচ্ছে

উদাহরণ:

```text
Product
FoodForest Turmeric

Base UOM
Kilogram

Sales UOM
50 gm
100 gm
200 gm
500 gm
1 kg

Package
Pouch
Jar
Bottle
```

এই তিনটি ধারণাকে আলাদাভাবে ডিজাইন করা হবে, যাতে ভবিষ্যতে Packaging এবং Manufacturing Module সহজে সম্প্রসারণ করা যায়।

---

**Status:** Accepted

**Version:** 1.0.0
