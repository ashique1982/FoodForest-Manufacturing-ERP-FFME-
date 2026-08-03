# Vehicle Type Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Fleet Management

**Parent Entity:** Vehicle Category

**Module:** Vehicle Type Management

---

# ১. Purpose

Vehicle Type Module-এর উদ্দেশ্য হলো Vehicle Category-এর অধীনে বিভিন্ন Operational Vehicle Type সংজ্ঞায়িত করা।

Vehicle Type Fleet Planning, Route Planning, Capacity Planning, Driver Assignment, Maintenance এবং Vehicle Registration-এর ভিত্তি হিসেবে কাজ করবে।

---

# ২. Definition

Vehicle Type হলো Vehicle Category-এর অধীন একটি Business Classification, যা একই ধরনের Vehicle Model-গুলিকে একত্রে উপস্থাপন করে।

উদাহরণ:

```text id="vt001"
Vehicle Category

Heavy Vehicle

↓

Vehicle Type

Truck
```

Truck একটি Vehicle Type।

Hino 500, Tata LPT 1613, Isuzu FRR — এগুলো Vehicle Model।

---

# ৩. Vehicle Hierarchy

```text id="vt002"
Vehicle Category

↓

Vehicle Type

↓

Vehicle Model

↓

Vehicle
```

---

# ৪. Vehicle Type Profile

প্রতিটি Vehicle Type-এর থাকবে—

## Basic Information

* Type Code
* Type Name
* Vehicle Category
* Description
* Status

---

## Capacity Information

* Default Capacity
* Capacity Unit
* Maximum Load
* Passenger Capacity (Optional)

---

## Fuel Information

* Default Fuel Type
* Fuel Tank Capacity

---

## Driver Information

* Driver Required
* Required License Class

---

## Maintenance Information

* Maintenance Required
* Default Service Interval

---

## Asset Information

* Default Asset Category
* Depreciation Policy (Reference)

---

# ৫. Default Vehicle Types

## Two Wheeler

* Bicycle
* Motorcycle
* Scooter

---

## Three Wheeler

* Cargo Auto
* Auto Rickshaw
* Easy Bike

---

## Four Wheeler

* Car
* Pickup
* Jeep
* Microbus

---

## Heavy Vehicle

* Mini Truck
* Truck
* Covered Van
* Trailer

---

## Industrial Vehicle

* Forklift
* Tractor
* Crane
* Loader

---

## Water Transport

* Boat
* Cargo Boat
* Launch

---

# ৬. Capacity Planning

Vehicle Type অনুযায়ী Default Capacity নির্ধারণ করা যাবে।

| Vehicle Type | Capacity | Unit |
| ------------ | -------: | ---- |
| Motorcycle   |       50 | kg   |
| Pickup       |     1000 | kg   |
| Mini Truck   |     3000 | kg   |
| Truck        |    10000 | kg   |
| Boat         |     5000 | kg   |

Vehicle তৈরি করার সময় এই মান Default হিসেবে আসবে।

---

# ৭. Fuel Configuration

প্রতিটি Vehicle Type-এর জন্য Supported Fuel Types নির্ধারণ করা যাবে।

* Petrol
* Diesel
* CNG
* LPG
* Electric
* Hybrid

---

# ৮. Driver Requirement

প্রতিটি Vehicle Type অনুযায়ী Driver License Class নির্ধারণ করা যাবে।

উদাহরণ:

| Vehicle Type | License |
| ------------ | ------- |
| Motorcycle   | A       |
| Car          | B       |
| Pickup       | B       |
| Truck        | Heavy   |
| Trailer      | Heavy   |

---

# ৯. Maintenance Policy

Vehicle Type অনুযায়ী Default Maintenance Policy নির্ধারণ করা যাবে।

উদাহরণ:

* প্রতি ৫,০০০ কিমি
* প্রতি ১০,০০০ কিমি
* প্রতি ৬ মাস
* প্রতি ১২ মাস

---

# ১০. Vehicle Model Integration

একটি Vehicle Type-এর অধীনে একাধিক Model থাকতে পারে।

উদাহরণ:

```text id="vt003"
Vehicle Type

Truck

├── Hino 500

├── Tata LPT

├── Isuzu FRR

└── Ashok Leyland
```

---

# ১১. Operational Usage

Vehicle Type ব্যবহার হবে—

* Vehicle Registration
* Driver Assignment
* Route Assignment
* Trip Planning
* Capacity Planning
* Maintenance Planning

---

# ১২. Reports

## Vehicle Type Summary

* Total Types

---

## Vehicle Count

* Vehicle by Type

---

## Capacity Report

* Fleet Capacity

---

## Fuel Report

* Fuel Type Distribution

---

## Maintenance Report

* Maintenance by Type

---

# ১৩. Business Rules

### Rule 001

Type Code Unique হবে।

---

### Rule 002

Vehicle Type অবশ্যই একটি Vehicle Category-এর অধীনে থাকবে।

---

### Rule 003

Inactive Vehicle Type নতুন Vehicle Model বা Vehicle তৈরিতে ব্যবহার করা যাবে না।

---

### Rule 004

Vehicle Type Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 005

Vehicle Type শুধুমাত্র Operational Classification।

এটি কোনো নির্দিষ্ট Vehicle নয়।

---

# ১৪. Audit Trail

সংরক্ষণ হবে—

* Type Created
* Type Updated
* Capacity Changed
* Fuel Policy Changed
* Maintenance Policy Changed
* Status Changed

---

# ১৫. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Autonomous Vehicle Type
* Electric Vehicle Type
* Refrigerated Vehicle
* Hazardous Goods Carrier
* Drone Type
* Smart Fleet Type

---

# ১৬. Notes

FFME Fleet Structure:

| Level   | Entity           |
| ------- | ---------------- |
| Level 1 | Vehicle Category |
| Level 2 | Vehicle Type     |
| Level 3 | Vehicle Model    |
| Level 4 | Vehicle          |

Vehicle Type একটি Shared Master Data।

এটি Vehicle Model-এর Parent Entity।

---

# ১৭. Related Documents

* Architecture.md
* Vehicle Category
* Vehicle Model
* Vehicle
* Driver
* Trip
* Maintenance
* Asset Category

---

# ১৮. Conclusion

Vehicle Type Module FFME Fleet Management Framework-এর দ্বিতীয় স্তর।

এর মাধ্যমে—

* Operational Classification
* Capacity Standardization
* Fuel Policy
* Driver Requirement
* Maintenance Standardization

একটি Flexible এবং Enterprise Grade Fleet Structure গঠন করা সম্ভব।

FFME-তে Vehicle Type হলো:

**Operational Vehicle Class → Vehicle Model → Individual Vehicle**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `03-Vehicle-Model.md`
