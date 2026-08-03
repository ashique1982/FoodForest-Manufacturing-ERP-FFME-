# Asset Management

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Company

**Module:** Asset Management

---

# ১. Purpose

Asset Management Module-এর উদ্দেশ্য হলো Company-এর সকল স্থায়ী ও অপারেশনাল সম্পদ (Asset)-এর তথ্য, Ownership, Location, Assignment, Acquisition, Depreciation, Maintenance এবং Lifecycle একটি কেন্দ্রীয় ডিজিটাল কাঠামোর মাধ্যমে পরিচালনা করা।

FFME-তে Asset শুধুমাত্র Accounting-এর জন্য নয়; এটি Business Operation-এর একটি গুরুত্বপূর্ণ Resource।

---

# ২. Definition

Asset হলো এমন কোনো সম্পদ যা Company অথবা Business Entity দীর্ঘমেয়াদি ব্যবসায়িক কাজে ব্যবহার করে এবং যার অর্থনৈতিক মূল্য রয়েছে।

উদাহরণ:

* Factory Machine
* Vehicle
* Computer
* Furniture
* Equipment
* Generator
* Office Equipment

---

# ৩. Asset Architecture

FFME-তে Asset একটি Independent Master Entity।

Architecture:

```text id="asset01"
Company

   │

   ├── Asset

   │

   ├── Asset Category

   │

   ├── Location

   │

   ├── Employee Assignment

   │

   └── Maintenance
```

---

# ৪. Asset Classification

Asset বিভিন্ন Category অনুযায়ী পরিচালিত হবে।

---

## Fixed Asset

দীর্ঘমেয়াদি ব্যবহারের জন্য।

উদাহরণ:

* Building
* Factory Machine
* Vehicle
* Generator

---

## Operational Asset

দৈনন্দিন কাজের জন্য ব্যবহৃত।

উদাহরণ:

* Laptop
* Printer
* Scanner
* Tools

---

## Intangible Asset

ভৌত অস্তিত্ব নেই।

উদাহরণ:

* Software License
* Domain
* ERP License

---

# ৫. Asset Category

প্রতিটি Asset একটি Category-এর অধীনে থাকবে।

উদাহরণ:

## Factory Asset

* Production Machine
* Packaging Machine
* Boiler
* Generator

---

## Office Asset

* Computer
* Printer
* Furniture
* AC

---

## Transport Asset

* Vehicle
* Motorcycle
* Delivery Equipment

---

# ৬. Asset Profile

প্রতিটি Asset-এর থাকবে—

---

## Basic Information

* Asset Code
* Asset Name
* Asset Category
* Asset Type
* Brand
* Model
* Serial Number

---

## Purchase Information

* Purchase Date
* Supplier
* Purchase Invoice
* Purchase Cost
* Warranty Period

---

## Accounting Information

* Asset Value
* Depreciation Method
* Useful Life
* Salvage Value
* Current Book Value

---

## Operational Information

* Current Location
* Assigned Department
* Assigned Employee
* Status

---

# ৭. Asset Ownership

Asset Ownership সংরক্ষণ করা হবে।

---

## Ownership Type

* Company Owned
* Branch Owned
* Department Owned
* Third Party Asset

---

# ৮. Asset Location

Asset-এর Physical Location সংরক্ষণ করা হবে।

---

## Location Hierarchy

```text id="asset02"
Company

↓

Branch

↓

Department

↓

Room / Area

↓

Asset
```

---

## Example

```text id="asset03"
Company

FoodForest Ltd.


Branch

Sylhet Factory


Department

Production


Asset

Grinding Machine-01
```

---

# ৯. Asset Assignment

Asset Employee অথবা Department-এর সাথে Assign করা যাবে।

---

## Assignment Types

* Department Assignment
* Employee Assignment
* Location Assignment

---

## Example

```text id="asset04"
Laptop-001

Assigned To

Accounts Department

Employee

Mr. X
```

---

# ১০. Asset Acquisition Workflow

Workflow:

```text id="asset05"
Asset Requirement

↓

Purchase Request

↓

Approval

↓

Purchase Order

↓

Goods Receive

↓

Asset Registration

↓

Assignment

↓

Accounting Entry
```

---

# ১১. Asset Lifecycle

প্রতিটি Asset-এর সম্পূর্ণ Lifecycle সংরক্ষণ হবে।

---

## Lifecycle Status

* Requested
* Purchased
* Received
* Active
* Under Maintenance
* Transferred
* Damaged
* Disposed
* Retired

---

# ১২. Asset Transfer

একটি Asset এক Location অথবা Employee থেকে অন্যত্র Transfer করা যাবে।

---

## Transfer Information

* Previous Location
* New Location
* Previous User
* New User
* Transfer Date
* Approval

---

# ১৩. Asset Maintenance

Asset Maintenance Tracking থাকবে।

---

## Maintenance Types

* Regular Maintenance
* Repair
* Calibration
* Inspection

---

## Maintenance Information

* Date
* Asset
* Service Provider
* Cost
* Description
* Next Service Date

---

# ১৪. Asset Depreciation

Fixed Asset-এর জন্য Depreciation Management থাকবে।

---

## Depreciation Methods

* Straight Line
* Declining Balance
* Manual Adjustment

---

## Depreciation Information

* Purchase Cost
* Useful Life
* Depreciation Rate
* Accumulated Depreciation
* Current Value

---

# ১৫. Asset Disposal

অপ্রয়োজনীয় Asset Disposal করা যাবে।

---

## Disposal Information

* Disposal Date
* Disposal Reason
* Disposal Value
* Approval
* Remarks

---

# ১৬. Asset Dashboard

Dashboard-এ থাকবে—

## Asset Summary

* Total Asset
* Active Asset
* Maintenance Asset
* Retired Asset

---

## Financial Summary

* Total Asset Value
* Depreciation
* Current Book Value

---

## Operational Summary

* Location Wise Asset
* Department Wise Asset
* Employee Assigned Asset

---

# ১৭. Reports

## Asset Reports

* Asset Register
* Category Wise Asset
* Location Wise Asset
* Employee Wise Asset

---

## Financial Reports

* Asset Value Report
* Depreciation Report
* Book Value Report

---

## Maintenance Reports

* Maintenance History
* Repair Cost
* Upcoming Maintenance

---

# ১৮. Business Rules

### Rule 001

প্রতিটি Asset-এর Unique Asset Code থাকতে হবে।

---

### Rule 002

Asset Category বাধ্যতামূলক।

---

### Rule 003

Asset Registration ছাড়া Asset Operation-এ ব্যবহার করা যাবে না।

---

### Rule 004

Asset Transfer Approval ছাড়া Location পরিবর্তন করা যাবে না।

---

### Rule 005

Asset Disposal-এর আগে Approval বাধ্যতামূলক।

---

### Rule 006

Asset Maintenance History Delete করা যাবে না।

---

### Rule 007

Asset Ownership সংরক্ষণ বাধ্যতামূলক।

---

# ১৯. Audit Trail

Asset সম্পর্কিত সকল পরিবর্তন Audit Log-এ সংরক্ষণ হবে।

---

## Audit Events

* Asset Created
* Asset Updated
* Asset Assigned
* Asset Transferred
* Maintenance Added
* Value Changed
* Disposal Completed

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ২০. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Asset Barcode
* QR Code Tracking
* RFID Integration
* IoT Monitoring
* Asset Mobile App
* Predictive Maintenance
* AI Asset Optimization
* Insurance Management

---

# ২১. Notes

FFME Architecture-এ—

| Entity    | Meaning             |
| --------- | ------------------- |
| Asset     | Business Resource   |
| Vehicle   | Transport Asset     |
| Equipment | Operational Asset   |
| Inventory | Sale/Purchase Stock |
| Expense   | Operational Cost    |

Asset এবং Inventory একই বিষয় নয়।

Asset দীর্ঘমেয়াদি ব্যবহারের জন্য।

Inventory বিক্রয় বা উৎপাদনের জন্য।

---

# ২২. Related Documents

* Architecture.md
* ADR-0003 Shared Masters
* ADR-0006 Multi-UOM
* Vehicle
* Employee
* Warehouse
* Finance
* Purchase
* Inventory
* Maintenance

---

# ২৩. Conclusion

Asset Management Module FFME-এর Financial Control এবং Operational Management-এর একটি গুরুত্বপূর্ণ অংশ।

এই Module-এর মাধ্যমে—

* Asset Tracking
* Ownership Control
* Location Management
* Maintenance
* Depreciation
* Lifecycle Management

একটি কেন্দ্রীয় ERP Framework-এর মাধ্যমে পরিচালনা করা যাবে।

FFME-তে Asset হলো:

**Business Resource → Operational Value → Financial Asset**

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `12-Employee.md`
