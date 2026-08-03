# Bin Location Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Bin Location Management

---

# ১. Purpose

Bin Location Management Module-এর উদ্দেশ্য হলো Warehouse-এর ভেতরে প্রতিটি Product-এর সঠিক সংরক্ষণস্থল (Storage Location) নির্ধারণ, নিয়ন্ত্রণ এবং ট্র্যাক করা।

Warehouse হলো বড় Storage Area, আর Bin হলো সেই Warehouse-এর সবচেয়ে ছোট Storage Unit।

---

# ২. Business Philosophy

FFME-তে Product শুধুমাত্র Warehouse-এ থাকবে না।

প্রয়োজনে System জানবে—

* কোন Warehouse-এ আছে
* কোন Zone-এ আছে
* কোন Rack-এ আছে
* কোন Bin-এ আছে

অর্থাৎ Inventory-এর **Exact Physical Location** সংরক্ষণ করা হবে।

---

# ৩. Bin Hierarchy

```text id="bin001"
Company

↓

Branch

↓

Warehouse

↓

Zone

↓

Rack

↓

Bin
```

---

# ৪. Bin Definition

Bin হলো Warehouse-এর একটি নির্দিষ্ট Storage Location যেখানে Product সংরক্ষণ করা হয়।

উদাহরণ—

```text id="bin002"
Warehouse-A

↓

Zone-A

↓

Rack-03

↓

Bin-05
```

---

# ৫. Bin Information

প্রতিটি Bin-এর থাকবে—

* Bin Code
* Bin Name
* Warehouse
* Zone
* Rack
* Capacity
* Status
* Description

---

# ৬. Bin Types

System সমর্থন করবে—

* Receiving Bin
* Storage Bin
* Picking Bin
* Packing Bin
* Dispatch Bin
* Quarantine Bin
* Damage Bin
* Return Bin
* Scrap Bin

---

# ৭. Bin Capacity

প্রতিটি Bin-এর জন্য নির্ধারণ করা যাবে—

* Maximum Quantity
* Maximum Weight
* Maximum Volume
* Maximum Pallet

---

# ৮. Fixed Bin

একটি Product-এর জন্য Default বা Fixed Bin নির্ধারণ করা যাবে।

উদাহরণ—

Turmeric Powder

↓

Warehouse-A

↓

Rack-01

↓

Bin-02

---

# ৯. Dynamic Bin

Configuration অনুযায়ী—

System Available Capacity দেখে Bin Suggest করতে পারবে।

---

# ১০. Bin Status

সম্ভাব্য Status—

* Active
* Inactive
* Full
* Empty
* Reserved
* Locked
* Under Maintenance

---

# ১১. Bin Transfer

একই Warehouse-এর মধ্যে Product এক Bin থেকে অন্য Bin-এ স্থানান্তর করা যাবে।

উদাহরণ

```text id="bin003"
Rack-01

Bin-02

↓

Rack-03

Bin-11
```

এটি Stock Quantity পরিবর্তন করবে না।

শুধুমাত্র Storage Location পরিবর্তন করবে।

---

# ১২. Batch & Serial Support

একই Bin-এ—

* একাধিক Batch থাকতে পারবে।
* একাধিক Serial Number থাকতে পারবে।

Configuration অনুযায়ী—

একটি Bin-এ একাধিক Product Allow অথবা Restrict করা যাবে।

---

# ১৩. Picking Priority

Sales বা Production-এর সময়—

System Picking Priority ব্যবহার করতে পারবে।

উদাহরণ—

* FEFO
* FIFO
* Fixed Bin Priority
* Nearest Bin
* Manual Selection

---

# ১৪. Empty Bin Detection

System দেখাবে—

* কোন Bin খালি
* কোন Bin আংশিক ভর্তি
* কোন Bin সম্পূর্ণ ভর্তি

---

# ১৫. Business Rules

### Rule BIN-001

Bin Code একই Warehouse-এর মধ্যে Unique হবে।

---

### Rule BIN-002

Locked Bin-এ Stock রাখা বা বের করা যাবে না।

---

### Rule BIN-003

Capacity অতিক্রম করলে Warning বা Block হবে (Configuration অনুযায়ী)।

---

### Rule BIN-004

Inactive Bin ব্যবহার করা যাবে না।

---

### Rule BIN-005

Bin Transfer Stock Quantity পরিবর্তন করবে না।

---

### Rule BIN-006

Bin Delete করা যাবে না যদি সেখানে Transaction History থাকে।

---

### Rule BIN-007

Bin ব্যবহার Role Based Permission অনুযায়ী হবে।

---

# ১৬. Dashboard

Dashboard-এ দেখা যাবে—

* Total Bins
* Empty Bins
* Full Bins
* Reserved Bins
* Capacity Usage
* Bin Occupancy

---

# ১৭. Reports

* Bin Register
* Bin Utilization Report
* Bin Capacity Report
* Product Bin Report
* Empty Bin Report
* Bin Transfer Report
* Batch Wise Bin Report
* Serial Wise Bin Report

---

# ১৮. Integration

Bin Location Module তথ্য গ্রহণ করবে—

* Warehouse
* Stock
* Batch
* Serial Number
* Stock Transfer

এবং তথ্য প্রদান করবে—

* Inventory
* Picking
* Stock Movement
* Inventory Analytics

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* Bin Created
* Bin Updated
* Capacity Changed
* Status Changed
* Bin Locked
* Bin Transfer

Delete অনুমোদিত নয়।

---

# ২০. Future Expansion

* Barcode Bin
* QR Bin
* RFID Bin
* Smart Shelf
* Warehouse Robot Navigation
* AI Bin Optimization
* Voice Picking

---

# ২১. Notes

Bin Structure

```text id="bin004"
Warehouse

↓

Zone

↓

Rack

↓

Bin

↓

Product
```

Bin হলো Inventory-এর সবচেয়ে ছোট Physical Storage Location।

---

# ২২. Related Documents

* Warehouse
* Stock
* Stock Transfer
* Stock Movement
* Batch
* Serial Number
* Inventory Ledger

---

# ২৩. Conclusion

Bin Location Management Module হলো FFME ERP-এর **Warehouse Location Control Engine**।

এর মাধ্যমে—

* Exact Product Location
* Bin Capacity Control
* Efficient Picking
* Internal Warehouse Movement
* Storage Optimization

নিশ্চিত করা হবে।

FFME-তে Bin Location Management হলো—

**Warehouse → Zone → Rack → Bin → Product**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `15-Inventory-Ledger.md`
