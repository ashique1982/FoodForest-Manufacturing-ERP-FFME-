# Inventory Allocation Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Inventory Allocation

---

# ১. Purpose

Inventory Allocation Module-এর উদ্দেশ্য হলো Reserved Stock-এর মধ্যে থেকে নির্দিষ্ট Batch, Serial Number, Bin এবং Warehouse নির্বাচন করে Fulfillment-এর জন্য প্রস্তুত করা।

Allocation-এর মাধ্যমে System নির্ধারণ করবে—

* কোন Batch যাবে
* কোন Serial যাবে
* কোন Bin থেকে Pick হবে
* কোন Warehouse থেকে সরবরাহ হবে

---

# ২. Business Philosophy

Allocation মানে Stock এখনও Warehouse-এই আছে।

কিন্তু System ইতিমধ্যে নির্ধারণ করে ফেলেছে—

**কোন Stock Unit কোন Order পূরণ করবে।**

Allocation-এর পরে অন্য কোনো Order সেই Stock ব্যবহার করতে পারবে না।

---

# ৩. Allocation Workflow

```text id="alloc001"
Sales Order

↓

Reservation

↓

Allocation

↓

Picking

↓

Delivery

↓

Sales
```

---

# ৪. Allocation Sources

Allocation তৈরি হতে পারে—

* Sales Order
* Distributor Demand
* Production Order
* Stock Transfer
* Service Order
* Project Issue
* Customer Booking

---

# ৫. Allocation Types

System সমর্থন করবে—

* Product Allocation
* Batch Allocation
* Serial Allocation
* Bin Allocation
* Warehouse Allocation

---

# ৬. Allocation Information

প্রতিটি Allocation-এর থাকবে—

* Allocation Number
* Allocation Date
* Source Document
* Warehouse
* Product
* Batch
* Serial Number
* Bin
* Allocated Quantity
* Allocated By
* Status

---

# ৭. Allocation Status

সম্ভাব্য Status—

* Draft
* Pending
* Allocated
* Picking
* Picked
* Delivered
* Released
* Cancelled

---

# ৮. Batch Allocation

FEFO/FIFO Policy অনুযায়ী—

System নির্দিষ্ট Batch Allocate করবে।

Manual Override Permission অনুযায়ী করা যাবে।

---

# ৯. Serial Allocation

Serial Controlled Product-এর ক্ষেত্রে—

নির্দিষ্ট Serial Number Allocate হবে।

একটি Serial একাধিক Allocation-এ থাকতে পারবে না।

---

# ১০. Bin Allocation

System নির্ধারণ করবে—

কোন Bin থেকে Product Pick হবে।

উদাহরণ—

```text id="alloc002"
Warehouse-A

↓

Rack-02

↓

Bin-07
```

---

# ১১. Warehouse Allocation

একাধিক Warehouse-এ Stock থাকলে—

System Rule অনুযায়ী Warehouse নির্বাচন করবে।

উদাহরণ—

* Nearest Warehouse
* Preferred Warehouse
* Highest Stock Warehouse
* Manual Selection

---

# ১২. Picking Integration

Allocation Approved হলে—

Picking List তৈরি করা যাবে।

Picking Team সেই তালিকা অনুযায়ী Product সংগ্রহ করবে।

---

# ১৩. Partial Allocation

যদি Stock পর্যাপ্ত না থাকে—

Order = 100

Allocate = 70

Pending = 30

System Partial Allocation সমর্থন করবে।

---

# ১৪. Auto Allocation

Configuration অনুযায়ী—

Sales Order Approval-এর সাথে সাথে

Auto Allocation হতে পারে।

---

# ১৫. Allocation Release

Allocation Release হবে—

* Sales Cancel
* Reservation Cancel
* Picking Cancel
* Manual Release

Release হলে Stock পুনরায় Reserved অথবা Available হবে (Configuration অনুযায়ী)।

---

# ১৬. Allocation Priority

Priority নির্ধারণ করা যাবে—

* VIP Customer
* Export Order
* Distributor
* Retail
* Internal Production

---

# ১৭. Business Rules

### Rule ALL-001

Reservation ছাড়া Allocation করা যাবে না (Configuration অনুযায়ী ব্যতিক্রম সম্ভব)।

---

### Rule ALL-002

Allocated Stock অন্য Order-এ Allocate করা যাবে না।

---

### Rule ALL-003

Batch ও Serial Allocation পূর্ণ Traceability সমর্থন করবে।

---

### Rule ALL-004

Allocation Delete করা যাবে না।

Release অথবা Cancel করতে হবে।

---

### Rule ALL-005

Picking শুরু হলে Allocation Edit করা যাবে না।

---

### Rule ALL-006

Allocation-এর Source Document বাধ্যতামূলক।

---

### Rule ALL-007

Allocation Picking ও Delivery Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ১৮. Dashboard

Dashboard-এ দেখা যাবে—

* Active Allocation
* Pending Allocation
* Picking Queue
* Partial Allocation
* Warehouse Allocation
* Batch Allocation

---

# ১৯. Reports

* Allocation Register
* Product Allocation Report
* Warehouse Allocation Report
* Batch Allocation Report
* Serial Allocation Report
* Picking Allocation Report
* Outstanding Allocation Report

---

# ২০. Integration

Allocation Module তথ্য গ্রহণ করবে—

* Reservation
* Warehouse
* Batch
* Serial Number
* Sales Order

এবং তথ্য প্রদান করবে—

* Picking
* Delivery
* Sales
* Inventory Analytics

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Created
* Allocated
* Picking Started
* Picked
* Released
* Cancelled
* Completed

Delete অনুমোদিত নয়।

---

# ২২. Future Expansion

* AI Smart Allocation
* Multi-Warehouse Optimization
* Robot Picking Allocation
* Wave Picking
* Cluster Picking
* Route Optimized Allocation

---

# ২৩. Notes

Allocation Relationship

```text id="alloc003"
Reservation

↓

Allocation

↓

Picking

↓

Delivery

↓

Sales
```

Reservation Stock ধরে রাখে।

Allocation বলে দেয় **কোন Stock Unit যাবে।**

---

# ২৪. Related Documents

* Inventory Reservation
* Warehouse
* Bin Location
* Batch
* Serial Number
* Picking
* Delivery
* Sales

---

# ২৫. Conclusion

Inventory Allocation Module হলো FFME ERP-এর **Order Fulfillment Preparation Engine**।

এর মাধ্যমে—

* সঠিক Batch নির্বাচন
* সঠিক Serial নির্বাচন
* সঠিক Bin নির্বাচন
* Warehouse Optimization
* দ্রুত ও নির্ভুল Picking

নিশ্চিত করা হবে।

FFME-তে Inventory Allocation হলো—

**Reservation → Allocation → Picking → Delivery → Sales**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `17-Picking.md`
