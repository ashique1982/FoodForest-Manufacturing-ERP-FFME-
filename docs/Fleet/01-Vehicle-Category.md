# Vehicle Category Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Fleet Management

**Module:** Vehicle Category Management

---

# ১. Purpose

Vehicle Category Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানে ব্যবহৃত সকল যানবাহনকে (Vehicle) একটি উচ্চ-স্তরের (High-Level) শ্রেণিবিন্যাসের মাধ্যমে সংগঠিত করা।

Vehicle Category Fleet Management-এর মূল Master Data এবং Vehicle Type-এর Parent Entity হিসেবে কাজ করবে।

---

# ২. Definition

Vehicle Category হলো যানবাহনের সর্বোচ্চ স্তরের (Top Level) শ্রেণিবিন্যাস।

এটি Vehicle-এর Business Nature নির্দেশ করে, নির্দিষ্ট Model বা Vehicle নয়।

উদাহরণ:

* Two Wheeler
* Three Wheeler
* Four Wheeler
* Heavy Vehicle
* Water Transport

---

# ৩. Vehicle Hierarchy

```text
Vehicle Category

↓

Vehicle Type

↓

Vehicle Model

↓

Vehicle

↓

Trip

↓

Maintenance
```

---

# ৪. Vehicle Category Profile

প্রতিটি Vehicle Category-এর থাকবে—

## Basic Information

* Category Code
* Category Name
* Description
* Status

---

## Operational Information

* Default Capacity Unit
* Default Fuel Types
* Driver Required
* Asset Category
* Maintenance Applicable

---

# ৫. Default Vehicle Categories

## Two Wheeler

উদাহরণ:

* Bicycle
* Motorcycle
* Scooter

---

## Three Wheeler

উদাহরণ:

* Auto Rickshaw
* Cargo Auto
* Easy Bike

---

## Four Wheeler

উদাহরণ:

* Car
* Pickup
* Jeep
* Microbus

---

## Heavy Vehicle

উদাহরণ:

* Truck
* Covered Van
* Trailer
* Lorry

---

## Industrial Vehicle

উদাহরণ:

* Forklift
* Tractor
* Crane
* Loader

---

## Water Transport

উদাহরণ:

* Boat
* Launch
* Cargo Boat

---

## Special Purpose Vehicle

উদাহরণ:

* Ambulance
* Fire Service
* Mobile Service Van

---

# ৬. Capacity Unit

Category অনুযায়ী Default Capacity Unit নির্ধারণ করা যাবে।

উদাহরণ:

| Category   | Default Unit |
| ---------- | ------------ |
| Motorcycle | kg           |
| Pickup     | kg           |
| Truck      | Ton          |
| Boat       | Ton          |

---

# ৭. Fuel Support

Category অনুযায়ী Supported Fuel Types নির্ধারণ করা যাবে।

* Petrol
* Diesel
* Octane
* CNG
* LPG
* Electric
* Hybrid

---

# ৮. Driver Requirement

প্রতিটি Category-এর জন্য নির্ধারণ করা যাবে—

* Driver Required
* Driver License Required
* Heavy License Required

---

# ৯. Asset Integration

Vehicle Category Default Asset Category-এর সাথে যুক্ত থাকবে।

উদাহরণ:

```text
Vehicle Category

↓

Vehicle Asset
```

---

# ১০. Usage

Vehicle Category ব্যবহার হবে—

* Vehicle Type
* Vehicle Registration
* Fleet Planning
* Capacity Planning
* Reporting

---

# ১১. Reports

## Vehicle Category Summary

* Total Categories

---

## Vehicle Distribution

* Vehicle by Category

---

## Capacity Summary

* Capacity by Category

---

## Fuel Summary

* Fuel Usage by Category

---

# ১২. Business Rules

### Rule 001

Category Code Unique হবে।

---

### Rule 002

Category Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 003

Inactive Category-এর অধীনে নতুন Vehicle Type তৈরি করা যাবে না।

---

### Rule 004

একটি Vehicle Type অবশ্যই একটি Vehicle Category-এর অধীনে থাকবে।

---

### Rule 005

Vehicle Category শুধুমাত্র Classification।

এটি কোনো Physical Vehicle নয়।

---

# ১৩. Audit Trail

সংরক্ষণ হবে—

* Category Created
* Category Updated
* Fuel Policy Changed
* Status Changed

---

# ১৪. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Autonomous Vehicle
* Drone
* Electric Fleet
* Hydrogen Vehicle
* CO₂ Emission Category
* Smart Fleet Classification

---

# ১৫. Notes

FFME Fleet Architecture:

| Entity           | Purpose                      |
| ---------------- | ---------------------------- |
| Vehicle Category | Highest Level Classification |
| Vehicle Type     | Operational Type             |
| Vehicle Model    | Manufacturer Model           |
| Vehicle          | Individual Vehicle           |

Vehicle Category শুধুমাত্র Master Data।

এটি Fleet Management-এর ভিত্তি।

---

# ১৬. Related Documents

* Architecture.md
* Vehicle Type
* Vehicle Model
* Vehicle
* Driver
* Trip
* Asset Category
* Fleet Management

---

# ১৭. Conclusion

Vehicle Category Module FFME Fleet Management Architecture-এর প্রথম স্তর।

এর মাধ্যমে—

* Standard Classification
* Fleet Planning
* Capacity Planning
* Asset Integration
* Reporting Standardization

একটি Enterprise Grade Fleet Framework তৈরি করা সম্ভব।

FFME-তে Vehicle Category হলো:

**Fleet Classification → Vehicle Type → Vehicle Model → Vehicle**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `02-Vehicle-Type.md`
