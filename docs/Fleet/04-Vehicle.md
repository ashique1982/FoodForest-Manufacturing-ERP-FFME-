# Vehicle Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Fleet Management

**Parent Entity:** Vehicle Model

**Module:** Vehicle Management

---

# ১. Purpose

Vehicle Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের প্রতিটি বাস্তব (Physical) যানবাহনকে নিবন্ধন (Register), পরিচালনা (Manage), বরাদ্দ (Assign), ট্র্যাক (Track), রক্ষণাবেক্ষণ (Maintain) এবং আর্থিকভাবে (Financially) নিয়ন্ত্রণ করা।

এই Module Distribution, Sales, Delivery, Warehouse, Manufacturing, Finance, HR এবং Asset Management Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Vehicle হলো প্রতিষ্ঠানের একটি নির্দিষ্ট বাস্তব যানবাহন, যার নিজস্ব—

* Registration Number
* Chassis Number
* Engine Number
* Ownership
* Driver
* Trip History
* Maintenance History

থাকে।

Vehicle একটি **Business Entity**, Master Data নয়।

---

# ৩. Vehicle Hierarchy

```text id="veh001"
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

# ৪. Vehicle Profile

প্রতিটি Vehicle-এর থাকবে—

## Basic Information

* Vehicle Code
* Vehicle Name
* Registration Number
* Vehicle Model
* Vehicle Type
* Vehicle Category
* Status

---

## Technical Information

* Chassis Number
* Engine Number
* VIN (Optional)
* Engine Capacity (CC)
* Color
* Manufacture Year

---

## Ownership Information

* Company
* Branch
* Department
* Cost Center
* Asset Reference

---

## Operational Information

* Assigned Driver
* Assigned Route
* Current Location
* Odometer Reading
* Capacity

---

## Financial Information

* Purchase Date
* Purchase Cost
* Current Book Value
* Depreciation Method
* Insurance Status

---

# ৫. Vehicle Status

সম্ভাব্য Status—

* Planned
* Active
* Idle
* Under Maintenance
* Assigned
* On Trip
* Sold
* Scrapped
* Lost
* Inactive

---

# ৬. Vehicle Registration

Vehicle নিবন্ধনের সময় নিম্নোক্ত তথ্য বাধ্যতামূলক হতে পারে (Company Policy অনুযায়ী)—

* Registration Number
* Chassis Number
* Engine Number
* Vehicle Model
* Purchase Date
* Purchase Cost

---

# ৭. Driver Assignment

একটি Vehicle একটি Default Driver-এর সাথে যুক্ত থাকতে পারে।

Driver Assignment History সংরক্ষণ করা হবে।

উদাহরণ:

```text id="veh002"
Vehicle

↓

Driver

↓

Assignment Date

↓

Release Date
```

---

# ৮. Route Assignment

Vehicle একটি বা একাধিক Route-এ ব্যবহার করা যেতে পারে।

Route Assignment আলাদা Module দ্বারা পরিচালিত হবে।

---

# ৯. Trip Integration

Vehicle-এর সমস্ত Trip History সংরক্ষণ হবে।

প্রতিটি Trip-এ থাকবে—

* Driver
* Route
* Start Time
* End Time
* Distance
* Fuel Used
* Delivery Summary

---

# ১০. Fuel Management

Vehicle অনুযায়ী—

* Fuel Purchase
* Fuel Consumption
* Average Mileage
* Fuel Cost

বিশ্লেষণ করা যাবে।

---

# ১১. Maintenance Management

Vehicle-এর Maintenance History সংরক্ষণ করা হবে।

উদাহরণ:

* Engine Oil
* Tire Change
* Brake Service
* Battery Replacement

---

# ১২. Insurance & Compliance

Vehicle-এর সাথে যুক্ত থাকবে—

* Insurance
* Fitness Certificate
* Tax Token
* Route Permit

Expiry Date অনুযায়ী Reminder দেওয়া যাবে।

---

# ১৩. Vehicle Movement

Vehicle স্থানান্তর করা যাবে—

* Branch → Branch
* Department → Department
* Company → Company (Group Structure)

Movement History সংরক্ষিত হবে।

---

# ১৪. Vehicle Workflow

```text id="veh003"
Purchase

↓

Vehicle Registration

↓

Driver Assignment

↓

Route Assignment

↓

Trip

↓

Fuel

↓

Maintenance

↓

Disposal
```

---

# ১৫. Accounting Integration

Vehicle একটি Asset হিসেবে Accounting Module-এর সাথে যুক্ত থাকবে।

সম্ভাব্য Financial Transaction—

* Purchase
* Depreciation
* Fuel Expense
* Maintenance Expense
* Disposal

সব Journal Entry-এর মাধ্যমে Ledger Update হবে।

---

# ১৬. Reports

## Vehicle Register

* Active Vehicles
* Inactive Vehicles

---

## Vehicle Utilization

* Trip Count
* Distance
* Working Hours

---

## Fuel Report

* Fuel Consumption
* Mileage
* Fuel Cost

---

## Maintenance Report

* Service History
* Maintenance Cost
* Upcoming Service

---

## Compliance Report

* Insurance Expiry
* Fitness Expiry
* Tax Token Expiry
* Permit Expiry

---

## Asset Report

* Purchase Cost
* Book Value
* Depreciation

---

# ১৭. Business Rules

### Rule 001

Vehicle Code Unique হবে।

---

### Rule 002

Registration Number Unique হবে।

---

### Rule 003

একটি Vehicle অবশ্যই একটি Vehicle Model-এর অধীনে থাকবে।

---

### Rule 004

Vehicle Delete করা যাবে না।

Inactive, Sold অথবা Scrapped করা যাবে।

---

### Rule 005

Vehicle Trip History কখনো Delete করা যাবে না।

---

### Rule 006

Vehicle-এর Financial Value Journal Entry-এর মাধ্যমে পরিবর্তিত হবে।

---

### Rule 007

একটি Active Vehicle-এর একই সময়ে একাধিক Active Driver Assignment থাকবে না।

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Vehicle Registered
* Vehicle Updated
* Driver Assigned
* Route Assigned
* Maintenance Added
* Fuel Entry
* Status Changed
* Disposal

---

# ১৯. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* GPS Tracking
* Live Vehicle Monitoring
* OBD Integration
* IoT Sensor
* Driver Behavior Analysis
* AI Fuel Optimization
* Predictive Maintenance
* Fleet Dashboard

---

# ২০. Notes

FFME Fleet Architecture:

| Entity           | Purpose                    |
| ---------------- | -------------------------- |
| Vehicle Category | Highest Classification     |
| Vehicle Type     | Operational Class          |
| Vehicle Model    | Manufacturer Specification |
| Vehicle          | Physical Asset             |
| Driver           | Vehicle Operator           |
| Trip             | Vehicle Activity           |

Vehicle একটি Asset এবং Fleet Resource—দুইভাবেই ব্যবহৃত হবে।

---

# ২১. Related Documents

* Architecture.md
* Vehicle Category
* Vehicle Type
* Vehicle Model
* Driver
* Trip
* Fuel
* Maintenance
* Insurance
* Fitness
* Tax Token
* Permit
* Asset

---

# ২২. Conclusion

Vehicle Module FFME ERP-এর Fleet Management-এর মূল Business Entity।

এর মাধ্যমে—

* Vehicle Registration
* Fleet Control
* Driver Management
* Trip Tracking
* Fuel Analysis
* Maintenance Management
* Financial Integration

একটি Enterprise Grade Fleet Management System গঠন করা সম্ভব।

FFME-তে Vehicle হলো:

**Physical Fleet Asset → Operational Resource → Financial Asset**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `05-Driver.md`
