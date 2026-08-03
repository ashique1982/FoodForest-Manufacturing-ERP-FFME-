# Vehicle Management

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Asset Management

**Module:** Vehicle Management

---

# ১. Purpose

Vehicle Management Module-এর উদ্দেশ্য হলো Company, Distributor, Supplier অথবা Third Party-এর সকল Vehicle-এর তথ্য, Ownership, Assignment, Operation, Maintenance, Fuel, Cost এবং Utilization একটি ডিজিটাল কাঠামোর মাধ্যমে পরিচালনা করা।

FFME-তে Vehicle শুধুমাত্র একটি Transport Asset নয়; এটি Supply Chain, Distribution, Delivery এবং Operational Management-এর একটি গুরুত্বপূর্ণ অংশ।

---

# ২. Definition

Vehicle হলো এমন একটি Asset যা Product Movement, Delivery, Transportation অথবা Operational কাজে ব্যবহৃত হয়।

Vehicle হতে পারে—

* Company Owned Vehicle
* Distributor Owned Vehicle
* Third Party Vehicle
* Rental Vehicle

---

# ৩. Vehicle Architecture

FFME-তে Vehicle একটি Independent Asset Entity।

Relationship:

```text id="veh01"
Company

    │

    ├── Vehicle

    │

    ├── Assigned Employee

    │
    
    ├── Assigned Business Partner

    │

    └── Operational Location
```

---

# ৪. Vehicle Ownership Model

Vehicle-এর Ownership সংরক্ষণ করা হবে।

---

## Type A: Company Owned

Company নিজস্ব Vehicle পরিচালনা করবে।

Example:

* Factory Delivery Van
* Company Truck
* Distribution Vehicle

---

## Type B: Distributor Owned

Distributor নিজস্ব Vehicle ব্যবহার করবে।

Example:

* Pickup
* Covered Van
* Motorcycle

---

## Type C: Third Party

ভাড়া বা Contract ভিত্তিক Vehicle।

Example:

* Transport Service
* Courier Vehicle

---

# ৫. Vehicle Profile

প্রতিটি Vehicle-এর থাকবে—

## Basic Information

* Vehicle Code
* Vehicle Name
* Vehicle Type
* Registration Number
* Chassis Number
* Engine Number
* Model
* Manufacturing Year

---

## Legal Information

* Registration Date
* Registration Authority
* Fitness Certificate
* Tax Token
* Insurance Information
* Route Permit

---

## Operational Information

* Ownership Type
* Assigned Company
* Assigned Branch
* Assigned Distributor
* Assigned Warehouse
* Current Location
* Status

---

# ৬. Vehicle Type

FFME বিভিন্ন ধরনের Vehicle Support করবে।

---

## Commercial Vehicle

* Truck
* Covered Van
* Pickup
* Mini Truck

---

## Light Vehicle

* Motorcycle
* Car
* Three Wheeler

---

## Special Vehicle

* Refrigerated Vehicle
* Container Vehicle
* Specialized Transport

---

# ৭. Vehicle Assignment

Vehicle বিভিন্ন Entity-এর সাথে Assign করা যাবে।

---

## Assignment Possible

Vehicle Assigned To:

* Company
* Branch
* Distributor
* Warehouse
* Employee
* Route

---

Example:

```text id="veh02"
Vehicle

Sylhet Delivery Van-01


Assigned To

Distributor

Golapganj Distributor


Driver

Employee X
```

---

# ৮. Driver Management

Vehicle-এর সাথে Driver Assign করা যাবে।

---

## Driver Information

* Employee ID
* Driver Name
* Mobile Number
* License Number
* License Expiry Date

---

## Driver Rules

* একটি Vehicle-এর একজন Primary Driver থাকতে পারে।
* Temporary Driver Assign করা যাবে।
* Driver History সংরক্ষণ হবে।

---

# ৯. Delivery Operation

Vehicle Delivery Process-এর অংশ হিসেবে ব্যবহৃত হবে।

Workflow:

```text id="veh03"
Sales Order

↓

Invoice

↓

Delivery Assignment

↓

Vehicle Selection

↓

Driver Assignment

↓

Dispatch

↓

Customer Delivery

↓

Confirmation
```

---

# ১০. Route Management

Vehicle Route অনুযায়ী পরিচালিত হতে পারে।

তবে Route এবং Vehicle একই Entity নয়।

---

Relationship:

```text id="veh04"
Territory

↓

Route

↓

Vehicle Assignment

↓

Delivery
```

---

# ১১. Fuel Management

Vehicle Fuel Management পরিচালিত হবে।

---

## Fuel Information

* Fuel Type
* Fuel Quantity
* Fuel Cost
* Date
* Vehicle
* Driver
* Meter Reading

---

## Fuel Report

* Daily Fuel Consumption
* Monthly Fuel Cost
* KM per Liter
* Vehicle Efficiency

---

# ১২. Maintenance Management

Vehicle Maintenance Tracking থাকবে।

---

## Maintenance Types

* Regular Service
* Engine Service
* Tire Replacement
* Repair
* Emergency Maintenance

---

## Maintenance Information

* Date
* Vehicle
* Service Type
* Cost
* Vendor
* Remarks

---

# ১৩. Vehicle Cost Management

Vehicle Related Expense সংরক্ষণ করা হবে।

---

## Cost Types

* Fuel Cost
* Maintenance Cost
* Insurance Cost
* Tax Cost
* Driver Cost
* Rental Cost

---

# ১৪. Vehicle Status

Vehicle Status:

* Available
* Assigned
* On Delivery
* Under Maintenance
* Inactive
* Retired

---

# ১৫. Vehicle Dashboard

Dashboard-এ থাকবে—

## Vehicle Summary

* Total Vehicle
* Active Vehicle
* Available Vehicle
* Maintenance Vehicle

---

## Operation

* Today's Delivery
* Running Vehicle
* Route Status
* Driver Assignment

---

## Cost

* Fuel Expense
* Maintenance Expense
* Total Running Cost

---

# ১৬. Reports

## Vehicle Reports

* Vehicle List
* Ownership Report
* Assignment Report
* Status Report

---

## Operation Reports

* Delivery Report
* Route Report
* Driver Performance

---

## Cost Reports

* Fuel Report
* Maintenance Report
* Vehicle Cost Analysis

---

# ১৭. Business Rules

### Rule 001

প্রতিটি Vehicle-এর Unique Vehicle Code থাকতে হবে।

---

### Rule 002

একটি Vehicle একই সময়ে একাধিক Active Assignment পাবে না।

---

### Rule 003

Vehicle Ownership বাধ্যতামূলক।

---

### Rule 004

Driver Assignment ছাড়া Delivery Vehicle Dispatch করা যাবে না।

---

### Rule 005

Vehicle Maintenance History Delete করা যাবে না।

---

### Rule 006

Inactive Vehicle নতুন Operation-এ ব্যবহার করা যাবে না।

---

### Rule 007

Vehicle Company, Distributor অথবা Third Party Ownership হতে পারে।

---

# ১৮. Audit Trail

Vehicle সম্পর্কিত সকল পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Vehicle Created
* Ownership Changed
* Assignment Changed
* Driver Changed
* Status Changed
* Maintenance Added
* Fuel Entry Added

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ১৯. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* GPS Tracking
* Live Vehicle Monitoring
* Fuel Automation
* Route Optimization
* Driver Mobile App
* Vehicle IoT Integration
* Accident Management
* Insurance Reminder
* AI Fleet Optimization

---

# ২০. Notes

FFME Architecture-এ—

| Entity            | Meaning               |
| ----------------- | --------------------- |
| Vehicle           | Transport Asset       |
| Driver            | Vehicle Operator      |
| Route             | Sales/Delivery Area   |
| Territory         | Business Control Area |
| Distributor Point | Operational Center    |
| Warehouse         | Stock Location        |

Vehicle, Route এবং Territory একই বিষয় নয়।

---

# ২১. Related Documents

* Architecture.md
* ADR-0003 Shared Masters
* ADR-0005 Territory Model
* Distributor
* Employee
* Warehouse
* Delivery
* Sales
* Inventory
* Finance

---

# ২২. Conclusion

Vehicle Management Module FFME-এর Distribution, Delivery এবং Logistics Operation-এর গুরুত্বপূর্ণ অংশ।

এই Module-এর মাধ্যমে—

* Vehicle Ownership Control
* Driver Management
* Delivery Operation
* Fuel Monitoring
* Maintenance Tracking
* Cost Analysis

একটি কেন্দ্রীয় ERP Framework-এর মাধ্যমে পরিচালনা করা যাবে।

FFME-তে Vehicle হলো:

**Asset → Operational Resource → Delivery Infrastructure**

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `11-Employee.md`
