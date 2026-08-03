# Batch Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Batch Management

---

# ১. Purpose

Batch Management Module-এর উদ্দেশ্য হলো একই Product-এর বিভিন্ন উৎপাদন, ক্রয় বা আমদানিকৃত Lot (Batch) আলাদাভাবে ট্র্যাক করা।

FFME-তে Batch Tracking-এর মাধ্যমে প্রতিটি Batch-এর—

* উৎপত্তি (Origin)
* উৎপাদনের তারিখ
* মেয়াদ
* বর্তমান স্টক
* Movement History
* Quality Status

সম্পূর্ণভাবে নিয়ন্ত্রণ করা হবে।

---

# ২. Business Philosophy

একটি Product-এর বহু Batch থাকতে পারে।

উদাহরণ

FoodForest Turmeric Powder

* Batch-240701
* Batch-240705
* Batch-240712

সবগুলো একই Product হলেও Inventory-তে আলাদা Batch হিসেবে সংরক্ষিত হবে।

---

# ৩. Batch Definition

Batch হলো—

> একই সময়ে, একই Specification অনুযায়ী উৎপাদিত অথবা সংগ্রহকৃত পণ্যের একটি নির্দিষ্ট Lot।

---

# ৪. Batch Sources

Batch তৈরি হতে পারে—

* Manufacturing
* Purchase
* Import Purchase
* Contract Purchase
* Repacking
* Reprocessing
* Manual Batch Creation (Permission অনুযায়ী)

---

# ৫. Batch Number

System—

* Auto Generate
* Manual Entry
* Supplier Batch
* Manufacturer Batch

সবগুলো সমর্থন করবে।

---

# ৬. Batch Information

প্রতিটি Batch-এর থাকবে—

* Batch Number
* Product
* Warehouse
* Manufacturing Date
* Expiry Date
* Best Before Date
* Quantity
* UOM
* Unit Cost
* Current Status
* Supplier (যদি Purchase হয়)
* Production Order (যদি Manufacturing হয়)

---

# ৭. Batch Lifecycle

```text id="bat001"
Batch Created

↓

Quality Check

↓

Available

↓

Sales / Production

↓

Remaining Stock

↓

Expired / Closed
```

---

# ৮. Batch Status

সম্ভাব্য Status

* Draft
* Pending QC
* Available
* Reserved
* Allocated
* In Production
* Quarantine
* Blocked
* Expired
* Consumed
* Closed

---

# ৯. Batch Quantity

প্রতিটি Batch-এর জন্য দেখা যাবে—

* Original Quantity
* Available Quantity
* Reserved Quantity
* Allocated Quantity
* Consumed Quantity
* Remaining Quantity

---

# ১০. Batch Movement

Batch অনুযায়ী Track হবে—

* Purchase
* Production
* Sales
* Transfer
* Adjustment
* Return

---

# ১১. Batch Traceability

যে কোনো Batch নির্বাচন করলে দেখা যাবে—

* কোথা থেকে এসেছে
* কোন Warehouse-এ গেছে
* কোন Customer-এর কাছে বিক্রি হয়েছে
* কোন Production-এ ব্যবহৃত হয়েছে

এটি সম্পূর্ণ Forward এবং Backward Traceability সমর্থন করবে।

---

# ১২. FEFO Support

Expiry Controlled Product-এর ক্ষেত্রে—

System Default Issue Strategy হবে—

FEFO

(First Expired First Out)

Configuration অনুযায়ী FIFO-ও ব্যবহার করা যাবে।

---

# ১৩. Batch Split

একটি Batch প্রয়োজনে—

একাধিক Warehouse বা Bin-এ ভাগ হয়ে থাকতে পারবে।

Example

Batch-240701

Warehouse-A = 100 Kg

Warehouse-B = 60 Kg

---

# ১৪. Batch Merge

Default Policy

Batch Merge Allowed নয়।

ভিন্ন Batch কখনো এক Batch-এ Merge হবে না।

বিশেষ Configuration ও Approval ছাড়া Merge নিষিদ্ধ।

---

# ১৫. Batch Recall

যদি কোনো Batch-এ সমস্যা পাওয়া যায়—

System Batch Recall সমর্থন করবে।

উদাহরণ

* Production Defect
* Quality Failure
* Food Safety Issue
* Supplier Recall

System সেই Batch-এর সকল Movement ও Customer খুঁজে বের করতে পারবে।

---

# ১৬. Batch Blocking

প্রয়োজন হলে Batch Block করা যাবে।

Blocked Batch—

* Sales করা যাবে না।
* Production-এ ব্যবহার করা যাবে না।
* Transfer করা যাবে না।

---

# ১৭. Business Rules

### Rule BAT-001

Batch Number একই Product-এর জন্য Unique হবে।

---

### Rule BAT-002

Batch Delete করা যাবে না।

---

### Rule BAT-003

Consumed Batch Edit করা যাবে না।

---

### Rule BAT-004

Expired Batch Configuration অনুযায়ী Block হবে।

---

### Rule BAT-005

Batch Movement সম্পূর্ণ Traceable হবে।

---

### Rule BAT-006

Batch Merge Default অবস্থায় নিষিদ্ধ।

---

### Rule BAT-007

Quality Rejected Batch Quarantine-এ যাবে।

---

# ১৮. Dashboard

Dashboard-এ দেখা যাবে—

* Active Batch
* Expiring Batch
* Expired Batch
* Blocked Batch
* Quarantine Batch
* Batch Recall Alert

---

# ১৯. Reports

* Batch Register
* Batch Balance Report
* Batch Movement Report
* Batch Traceability Report
* Expiring Batch Report
* Expired Batch Report
* Blocked Batch Report
* Batch Recall Report

---

# ২০. Integration

Batch Module তথ্য গ্রহণ করবে—

* Purchase
* Manufacturing
* Quality Control
* Warehouse
* Inventory

এবং তথ্য প্রদান করবে—

* Sales
* Production
* Inventory Ledger
* Inventory Analytics

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Created
* QC Approved
* Blocked
* Released
* Recalled
* Closed

Delete অনুমোদিত নয়।

---

# ২২. Future Expansion

* GS1 Batch Standard
* QR Batch Tracking
* RFID Batch Tracking
* AI Batch Quality Prediction
* Mobile Batch Scanner

---

# ২৩. Notes

Batch Relationship

```text id="bat002"
Product

↓

Multiple Batches

↓

Warehouse

↓

Sales / Production

↓

Traceability
```

একটি Product-এর একাধিক Batch থাকতে পারে, কিন্তু প্রতিটি Batch-এর পরিচয় ও ইতিহাস স্বতন্ত্র থাকবে।

---

# ২৪. Related Documents

* Stock
* Expiry
* Serial Number
* Warehouse
* Quality Control
* Inventory Ledger
* Stock Movement

---

# ২৫. Conclusion

Batch Management Module হলো FFME ERP-এর **Lot Traceability Engine**।

এর মাধ্যমে—

* Complete Batch Tracking
* FEFO/FIFO Support
* Batch Recall
* Food Safety Compliance
* End-to-End Traceability

নিশ্চিত করা হবে।

FFME-তে Batch Management হলো—

**Batch Creation → Quality → Inventory → Sales/Production → Traceability → Recall (If Required)**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `08-Serial-Number.md`
