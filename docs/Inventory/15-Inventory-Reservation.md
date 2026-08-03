# Inventory Reservation Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Inventory Reservation

---

# ১. Purpose

Inventory Reservation Module-এর উদ্দেশ্য হলো Available Stock-এর একটি নির্দিষ্ট অংশকে সাময়িকভাবে নির্দিষ্ট Order, Production, Transfer অথবা অন্য কোনো Business Process-এর জন্য সংরক্ষণ (Reserve) করা, যাতে একই Stock একাধিক Transaction-এ ব্যবহার না হয়।

Reservation-এর ফলে Stock Warehouse-এ থাকবে, কিন্তু অন্য কেউ ব্যবহার করতে পারবে না।

---

# ২. Business Philosophy

Reservation মানে Stock বিক্রি হয়ে গেছে—এমন নয়।

Reservation মানে—

> "এই Stock নির্দিষ্ট একটি Transaction-এর জন্য ধরে রাখা হয়েছে।"

উদাহরণ—

Warehouse-এ 100 Bag Rice আছে।

একটি Sales Order-এর জন্য 30 Bag Reserve করা হয়েছে।

তাহলে—

* Physical Stock = 100
* Reserved Stock = 30
* Available Stock = 70

---

# ৩. Reservation Sources

Reservation তৈরি হতে পারে—

* Sales Order
* Distributor Demand
* Production Order
* Stock Transfer
* Project Allocation
* Service Order
* Customer Booking
* Manual Reservation (Permission অনুযায়ী)

---

# ৪. Reservation Workflow

```text id="res001"
Business Document

↓

Reservation

↓

Available Stock Reduced

↓

Issue / Release

↓

Reservation Closed
```

---

# ৫. Reservation Lifecycle

```text id="res002"
Created

↓

Approved

↓

Reserved

↓

Allocated

↓

Issued

↓

Completed

or

Released

or

Expired
```

---

# ৬. Reservation Information

প্রতিটি Reservation-এর থাকবে—

* Reservation Number
* Reservation Date
* Company
* Branch
* Warehouse
* Product
* Batch
* Serial Number
* Reserved Quantity
* Reserved By
* Source Document
* Expiry Date (Optional)
* Status

---

# ৭. Reservation Status

সম্ভাব্য Status—

* Draft
* Pending Approval
* Reserved
* Partially Issued
* Issued
* Released
* Expired
* Cancelled

---

# ৮. Reservation Scope

Reservation করা যাবে—

* Product Wise
* Batch Wise
* Serial Wise
* Bin Wise
* Warehouse Wise

---

# ৯. Batch Reservation

Batch Controlled Product-এর ক্ষেত্রে—

নির্দিষ্ট Batch Reserve করা যাবে।

Example

Turmeric Powder

Batch-240701

Reserve = 100 Kg

---

# ১০. Serial Reservation

Serial Controlled Product-এর ক্ষেত্রে—

নির্দিষ্ট Serial Reserve হবে।

একই Serial অন্য Order-এ Reserve করা যাবে না।

---

# ১১. Automatic Reservation

Configuration অনুযায়ী—

Sales Order Approval-এর সাথে সাথে

Auto Reservation তৈরি হতে পারে।

---

# ১২. Reservation Expiry

Reservation-এর একটি Validity Period থাকতে পারে।

উদাহরণ

Customer Booking

↓

৭ দিনের মধ্যে Purchase না করলে

↓

Reservation Release

---

# ১৩. Reservation Release

Reservation Release হতে পারে—

* Sales Cancel
* Demand Cancel
* Production Cancel
* Manual Release
* Reservation Expire
* Stock Adjustment

Release হলে Reserved Stock আবার Available হবে।

---

# ১৪. Partial Reservation

যদি পর্যাপ্ত Stock না থাকে—

System Partial Reservation সমর্থন করবে।

উদাহরণ—

Order = 100

Available = 70

Reserve = 70

Pending = 30

---

# ১৫. Reservation Priority

একই Product-এর একাধিক Reservation থাকলে Priority ব্যবহার করা যাবে।

উদাহরণ—

* VIP Customer
* Export Order
* Distributor
* Retail Order
* Internal Request

---

# ১৬. Available Stock Calculation

FFME-তে Available Stock নির্ণয় হবে—

```text id="res003"
Available Stock

=

Physical Stock

-

Reserved Stock
```

Inventory Planning, Sales এবং Reorder Level এই Available Stock ব্যবহার করবে।

---

# ১৭. Business Rules

### Rule RES-001

Reserved Stock অন্য Transaction-এ ব্যবহার করা যাবে না।

---

### Rule RES-002

Reservation Delete করা যাবে না।

শুধুমাত্র Release অথবা Cancel করা যাবে।

---

### Rule RES-003

Reservation-এর Source Document বাধ্যতামূলক।

---

### Rule RES-004

Expired Reservation স্বয়ংক্রিয়ভাবে Release হতে পারে (Configuration অনুযায়ী)।

---

### Rule RES-005

Batch ও Serial Controlled Product-এর Reservation পূর্ণ Traceability সমর্থন করবে।

---

### Rule RES-006

Available Stock Calculation-এ Reserved Stock বাদ যাবে।

---

### Rule RES-007

Issued হওয়ার সাথে সাথে Reservation Closed হবে।

---

# ১৮. Dashboard

Dashboard-এ দেখা যাবে—

* Active Reservation
* Reserved Quantity
* Expiring Reservation
* Released Reservation
* Warehouse Wise Reservation
* Product Wise Reservation

---

# ১৯. Reports

* Reservation Register
* Product Reservation Report
* Warehouse Reservation Report
* Batch Reservation Report
* Serial Reservation Report
* Expired Reservation Report
* Released Reservation Report
* Outstanding Reservation Report

---

# ২০. Integration

Reservation Module তথ্য গ্রহণ করবে—

* Sales Order
* Demand
* Production Order
* Warehouse
* Inventory

এবং তথ্য প্রদান করবে—

* Sales
* Production
* Reorder Level
* Inventory Analytics
* Stock Availability

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Created
* Approved
* Reserved
* Released
* Cancelled
* Expired
* Closed

Delete অনুমোদিত নয়।

---

# ২২. Future Expansion

* Customer Reservation Portal
* Mobile Reservation
* AI Reservation Priority
* Automatic Reservation Optimization
* Reservation Expiry Notification

---

# ২৩. Notes

Reservation Relationship

```text id="res004"
Business Document

↓

Reservation

↓

Available Stock

↓

Issue

↓

Reservation Closed
```

Reservation Inventory কমায় না।

শুধুমাত্র Available Stock কমায়।

---

# ২৪. Related Documents

* Stock
* Sales Order
* Demand
* Production Order
* Warehouse
* Batch
* Serial Number
* Inventory Ledger

---

# ২৫. Conclusion

Inventory Reservation Module হলো FFME ERP-এর **Stock Allocation & Commitment Engine**।

এর মাধ্যমে—

* Double Allocation প্রতিরোধ
* Accurate Available Stock
* Sales Commitment
* Production Allocation
* Warehouse Planning

নিশ্চিত করা হবে।

FFME-তে Inventory Reservation হলো—

**Business Document → Reservation → Available Stock Control → Issue / Release**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `16-Inventory-Ledger.md`
