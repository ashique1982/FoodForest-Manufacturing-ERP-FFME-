# Vehicle Model Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Fleet Management

**Parent Entity:** Vehicle Type

**Module:** Vehicle Model Management

---

# ১. Purpose

Vehicle Model Module-এর উদ্দেশ্য হলো Vehicle Type-এর অধীনে বিভিন্ন Manufacturer-এর নির্দিষ্ট Model সংরক্ষণ করা।

Vehicle Model Module-এর মাধ্যমে একই Vehicle Type-এর বিভিন্ন Model-এর Capacity, Fuel Consumption, Maintenance Schedule, Spare Parts এবং Technical Specification আলাদাভাবে পরিচালনা করা যাবে।

---

# ২. Definition

Vehicle Model হলো কোনো Manufacturer কর্তৃক তৈরি নির্দিষ্ট Vehicle Design।

উদাহরণ:

```text id="vm001"
Vehicle Category

Heavy Vehicle

↓

Vehicle Type

Truck

↓

Vehicle Model

Hino 500
```

---

# ৩. Vehicle Hierarchy

```text id="vm002"
Vehicle Category

↓

Vehicle Type

↓

Vehicle Model

↓

Vehicle
```

---

# ৪. Vehicle Model Profile

প্রতিটি Vehicle Model-এর থাকবে—

## Basic Information

* Model Code
* Model Name
* Vehicle Type
* Manufacturer / Brand
* Model Year (Optional)
* Status

---

## Technical Information

* Engine Number Format (Optional)
* Chassis Number Format (Optional)
* Engine Capacity (CC)
* Horse Power
* Transmission Type

---

## Capacity Information

* Load Capacity
* Capacity Unit
* Passenger Capacity

---

## Fuel Information

* Fuel Type
* Fuel Tank Capacity
* Average Fuel Consumption

---

## Maintenance Information

* Service Interval (KM)
* Service Interval (Days)
* Warranty Period (Optional)

---

## Financial Information

* Default Purchase Price (Optional)
* Estimated Useful Life
* Estimated Salvage Value

---

# ৫. Manufacturer Examples

## Hino

* Hino 300
* Hino 500

---

## Tata

* Tata Ace
* Tata LPT 1613

---

## Isuzu

* Isuzu FRR
* Isuzu NPR

---

## Toyota

* HiAce
* Hilux

---

## Honda

* CD 80
* CB Shine

---

# ৬. Model Specification

প্রতিটি Model-এর Default Specification থাকবে।

উদাহরণ:

| Model    | Capacity | Fuel   | Service   |
| -------- | -------: | ------ | --------- |
| Hino 500 |   10 Ton | Diesel | 10,000 KM |
| Tata Ace |    1 Ton | Diesel | 8,000 KM  |
| HiAce    |  14 Seat | Diesel | 10,000 KM |

---

# ৭. Spare Parts Support

প্রতিটি Model-এর সাথে ভবিষ্যতে—

* Tire
* Battery
* Engine Oil
* Brake Pad
* Filter
* Belt

ইত্যাদি Spare Parts Mapping করা যাবে।

---

# ৮. Maintenance Integration

Model অনুযায়ী Default Maintenance Schedule নির্ধারণ করা যাবে।

উদাহরণ:

* Engine Oil Change
* Air Filter
* Brake Inspection
* Tire Rotation

---

# ৯. Vehicle Registration

Vehicle তৈরি করার সময় Model নির্বাচন করলে—

* Capacity
* Fuel Type
* Service Interval
* Manufacturer

স্বয়ংক্রিয়ভাবে পূরণ হবে।

---

# ১০. Operational Usage

Vehicle Model ব্যবহার হবে—

* Vehicle Registration
* Fleet Planning
* Spare Parts Management
* Maintenance
* Fuel Analysis
* Cost Analysis

---

# ১১. Reports

## Vehicle Model Summary

* Total Models

---

## Vehicle by Model

* Number of Vehicles

---

## Fuel Report

* Fuel Consumption by Model

---

## Maintenance Report

* Maintenance Cost by Model

---

## Asset Report

* Asset Value by Model

---

# ১২. Business Rules

### Rule 001

Model Code Unique হবে।

---

### Rule 002

প্রতিটি Model অবশ্যই একটি Vehicle Type-এর অধীনে থাকবে।

---

### Rule 003

Inactive Model নতুন Vehicle তৈরিতে ব্যবহার করা যাবে না।

---

### Rule 004

Vehicle Model Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 005

Vehicle Model শুধুমাত্র Specification Template।

এটি কোনো Physical Vehicle নয়।

---

# ১৩. Audit Trail

সংরক্ষণ হবে—

* Model Created
* Model Updated
* Capacity Changed
* Fuel Specification Changed
* Maintenance Policy Changed
* Status Changed

---

# ১৪. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Manufacturer API
* VIN Decoder
* Spare Parts Catalog
* Recall Information
* CO₂ Emission Standard
* Electric Battery Specification

---

# ১৫. Notes

FFME Fleet Structure:

| Level   | Entity           |
| ------- | ---------------- |
| Level 1 | Vehicle Category |
| Level 2 | Vehicle Type     |
| Level 3 | Vehicle Model    |
| Level 4 | Vehicle          |

Vehicle Model হলো Vehicle Registration-এর Template।

---

# ১৬. Related Documents

* Architecture.md
* Vehicle Category
* Vehicle Type
* Vehicle
* Maintenance
* Fuel
* Driver
* Asset

---

# ১৭. Conclusion

Vehicle Model Module FFME Fleet Management Framework-এর তৃতীয় স্তর।

এর মাধ্যমে—

* Manufacturer Standardization
* Technical Specification
* Maintenance Planning
* Fuel Analysis
* Spare Parts Integration
* Fleet Standardization

একটি Enterprise Grade Fleet Management System গঠন করা সম্ভব।

FFME-তে Vehicle Model হলো:

**Manufacturer Specification → Vehicle Registration → Fleet Management**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `04-Vehicle.md`
