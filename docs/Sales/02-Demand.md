# Demand Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Demand Management

---

# ১. Purpose

Demand Module-এর উদ্দেশ্য হলো Distributor, Branch, Dealer অথবা Business Partner কর্তৃক প্রেরিত পণ্যের চাহিদা (Demand) গ্রহণ, পর্যালোচনা, অনুমোদন এবং Sales-এ রূপান্তর (Convert to Sales) করা।

Demand কখনো Inventory কমাবে না।

---

# ২. Definition

Demand হলো Business Partner-এর পক্ষ থেকে ভবিষ্যৎ Supply-এর জন্য Product Requirement।

Demand একটি Request Document।

Sales নয়।

---

# ৩. Demand Philosophy

Demand শুধুমাত্র চাহিদা প্রকাশ করে।

Demand-এর মাধ্যমে—

* Stock কমবে না
* Accounting হবে না
* Invoice হবে না

Demand Review করার পর Sales Department এটিকে Sales-এ Convert করবে।

---

# ৪. Demand Architecture

```text id="demand001"
Distributor

↓

Demand

↓

Review

↓

Edit (if necessary)

↓

Approval

↓

Convert To Sales
```

---

# ৫. Demand Profile

## Basic Information

* Demand Number
* Demand Date
* Distributor
* Branch
* Territory
* Sales Officer
* Status

---

## Product Information

প্রতিটি Product Line-এ থাকবে—

* Product
* UOM
* Requested Quantity
* Remarks

---

## Summary

* Total Items
* Total Quantity
* Expected Delivery Date
* Priority

---

# ৬. Demand Sources

Demand আসতে পারে—

* Authorized Distributor
* Regional Depot
* Branch Office
* Franchise
* Corporate Customer
* Internal Business Unit

---

# ৭. Demand Workflow

```text id="demand002"
Draft

↓

Submitted

↓

Under Review

↓

Approved

↓

Convert To Sales

↓

Closed
```

---

# ৮. Demand Review

Sales Department Review করবে—

* বর্তমান Stock
* Reserved Stock
* Production Plan
* Customer Credit
* Distributor Limit

---

# ৯. Quantity Adjustment

Convert করার আগে Quantity পরিবর্তন করা যাবে।

উদাহরণ:

Demand

```text id="demand003"
Oil     100

Sugar    50

Salt     30
```

Available Stock

```text id="demand004"
Oil     100

Sugar    20

Salt     30
```

Sales হবে

```text id="demand005"
Oil     100

Sugar    20

Salt     30
```

Pending থাকবে

```text id="demand006"
Sugar    30
```

---

# ১০. Backorder

যদি পুরো Demand পূরণ করা সম্ভব না হয়—

Remaining Quantity

Backorder হিসেবে থাকবে।

পরবর্তীতে Pending Quantity থেকে নতুন Sales তৈরি করা যাবে।

---

# ১১. Convert To Sales

Demand-এর সবচেয়ে গুরুত্বপূর্ণ ধাপ।

Convert করার সময়—

* Quantity Edit
* Product Replace
* Warehouse নির্বাচন
* Delivery Date পরিবর্তন

সম্ভব।

Convert সম্পন্ন হলে—

* Sales Document তৈরি হবে
* Inventory Deduction শুরু হবে

---

# ১২. Inventory Integration

Demand Inventory Reserve করবে না।

Inventory শুধুমাত্র Sales Document তৈরি হলে কমবে।

---

# ১৩. Delivery Integration

Sales তৈরি হওয়ার পর—

* Delivery Note
* Delivery
* Collection

Workflow শুরু হবে।

---

# ১৪. Reports

## Demand Register

* Open Demand
* Closed Demand

---

## Pending Demand

* Pending Quantity
* Pending Value

---

## Demand by Distributor

* Distributor Wise

---

## Demand by Territory

* Territory Wise

---

## Product Demand

* Product Wise
* Brand Wise

---

# ১৫. Business Rules

### Rule D-001

Demand Number Unique হবে।

---

### Rule D-002

Demand Inventory কমাবে না।

---

### Rule D-003

Approved Demand Sales-এ Convert করা যাবে।

---

### Rule D-004

একটি Demand একাধিক Partial Sales সমর্থন করবে।

---

### Rule D-005

Convert হওয়ার পরও Pending Quantity Backorder হিসেবে থাকবে।

---

### Rule D-006

Demand Delete করা যাবে না।

Cancelled করা যাবে।

---

# ১৬. Audit Trail

সংরক্ষণ হবে—

* Demand Created
* Demand Submitted
* Demand Approved
* Quantity Changed
* Product Changed
* Converted To Sales
* Cancelled

---

# ১৭. Future Expansion

* Demand Forecasting
* AI Demand Planning
* Auto Stock Allocation
* Auto Production Recommendation
* Distributor Demand Portal
* Mobile Demand App

---

# ১৮. Notes

Demand শুধুমাত্র Distributor-এর জন্য সীমাবদ্ধ নয়।

ভবিষ্যতে এটি ব্যবহার করা যাবে—

* Branch Replenishment
* Inter-Company Demand
* Export Demand
* Institutional Demand

---

# ১৯. Related Documents

* Sales Overview
* Sales Order
* Sales
* Distributor
* Product
* Warehouse
* Inventory
* Delivery
* Collection

---

# ২০. Conclusion

Demand Module হলো FFME Sales Architecture-এর প্রথম Entry Point।

এর মাধ্যমে Distributor বা Business Partner তাদের চাহিদা পাঠাবে, Sales Department তা যাচাই করবে এবং প্রয়োজন অনুযায়ী সংশোধন করে **Convert To Sales** করবে।

Demand নিজে কোনো Inventory বা Financial Transaction তৈরি করে না।

এটি শুধুমাত্র একটি **Business Requirement Document**।

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `03-Sales-Order.md`
