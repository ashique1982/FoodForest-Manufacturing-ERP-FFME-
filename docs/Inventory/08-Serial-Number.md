# Serial Number Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Serial Number Management

---

# ১. Purpose

Serial Number Management Module-এর উদ্দেশ্য হলো প্রতিটি পৃথক (Unique) Product Unit-কে একটি স্বতন্ত্র পরিচয়ের মাধ্যমে ট্র্যাক করা।

Batch যেখানে একটি Group বা Lot-কে নির্দেশ করে, সেখানে Serial Number একটি নির্দিষ্ট Unit-কে নির্দেশ করে।

---

# ২. Business Philosophy

সব Product-এর Serial Number থাকবে না।

শুধুমাত্র যেসব Product আলাদাভাবে শনাক্ত ও ট্র্যাক করা প্রয়োজন, সেগুলোর জন্য Serial Number ব্যবহার হবে।

উদাহরণ—

* Laptop
* Desktop Computer
* Printer
* Mobile Phone
* Generator
* Electric Motor
* Vehicle Engine
* Medical Equipment
* Industrial Machine
* Asset Item

FoodForest-এর মতো Manufacturing ERP-তে অধিকাংশ Raw Material ও FMCG Product Batch Controlled হবে, কিন্তু Machine, Equipment এবং Asset-Type Product Serial Controlled হবে।

---

# ৩. Serial Number Definition

Serial Number হলো—

> প্রতিটি Product Unit-এর জন্য একটি Unique Identifier।

একই Product-এর দুইটি Serial Number কখনো এক হবে না।

---

# ৪. Serial Sources

Serial তৈরি হতে পারে—

* Manufacturing
* Purchase
* Import Purchase
* Manual Entry (Permission অনুযায়ী)
* Supplier Serial Import

---

# ৫. Serial Number Generation

System সমর্থন করবে—

* Auto Generate
* Manual Entry
* Supplier Serial
* Manufacturer Serial
* Barcode Serial
* QR Serial

---

# ৬. Serial Information

প্রতিটি Serial-এর থাকবে—

* Serial Number
* Product
* Product Model
* Batch (যদি প্রযোজ্য)
* Warehouse
* Bin Location
* Manufacturing Date
* Purchase Date
* Warranty Start
* Warranty End
* Current Status

---

# ৭. Serial Lifecycle

```text id="sn001"
Serial Created

↓

Quality Check

↓

Available

↓

Reserved

↓

Sold / Issued

↓

Installed / Active

↓

Returned (Optional)

↓

Disposed
```

---

# ৮. Serial Status

সম্ভাব্য Status

* Draft
* Pending QC
* Available
* Reserved
* Allocated
* Sold
* Installed
* In Service
* Returned
* Damaged
* Lost
* Blocked
* Disposed

---

# ৯. Serial Movement

প্রতিটি Serial-এর সম্পূর্ণ Movement History সংরক্ষিত হবে।

উদাহরণ—

* Purchase
* Warehouse Receive
* Warehouse Transfer
* Sales
* Customer Return
* Service
* Replacement
* Disposal

---

# ১০. Serial Traceability

যে কোনো Serial নির্বাচন করলে দেখা যাবে—

* কোথা থেকে এসেছে
* কোন Supplier দিয়েছে
* কোন Warehouse-এ ছিল
* কোন Customer কিনেছে
* Warranty Status
* Service History
* Return History

সম্পূর্ণ Forward এবং Backward Traceability থাকবে।

---

# ১১. Warranty Tracking

Serial Controlled Product-এর জন্য Warranty Track করা যাবে।

Fields

* Warranty Start
* Warranty End
* Warranty Status

---

# ১২. Service History

Service Module-এর সাথে Integration থাকবে।

প্রতিটি Serial-এর জন্য দেখা যাবে—

* Installation Date
* Service Date
* Replacement Parts
* Engineer
* Customer Complaint

---

# ১৩. Duplicate Protection

একই Product-এর জন্য একই Serial Number দুইবার গ্রহণ করা যাবে না।

Duplicate Serial System Reject করবে।

---

# ১৪. Sales Validation

Serial Controlled Product Sales করার সময়—

প্রতিটি Serial নির্বাচন বাধ্যতামূলক।

System Available Status যাচাই করবে।

---

# ১৫. Return Validation

Customer Return-এর সময়—

শুধুমাত্র বিক্রিত Serial Return করা যাবে।

অন্য Serial গ্রহণ করা যাবে না।

---

# ১৬. Business Rules

### Rule SN-001

Serial Number Global অথবা Product Wise Unique হবে (Configuration অনুযায়ী)।

---

### Rule SN-002

একটি Serial একই সময়ে দুই Warehouse-এ থাকতে পারবে না।

---

### Rule SN-003

Sold Serial পুনরায় Available হবে শুধুমাত্র Return বা Reverse Transaction-এর মাধ্যমে।

---

### Rule SN-004

Duplicate Serial গ্রহণ করা যাবে না।

---

### Rule SN-005

Disposed Serial পুনরায় ব্যবহার করা যাবে না।

---

### Rule SN-006

Serial Delete করা যাবে না।

---

### Rule SN-007

প্রতিটি Serial-এর পূর্ণ Movement History সংরক্ষিত হবে।

---

# ১৭. Dashboard

Dashboard-এ দেখা যাবে—

* Available Serials
* Reserved Serials
* Sold Serials
* Warranty Expiring
* Returned Serials
* Blocked Serials

---

# ১৮. Reports

* Serial Register
* Serial Movement Report
* Product Serial Report
* Warehouse Serial Report
* Warranty Report
* Service History Report
* Customer Serial Report
* Returned Serial Report

---

# ১৯. Integration

Serial Module তথ্য গ্রহণ করবে—

* Purchase
* Manufacturing
* Warehouse
* Sales
* Service
* CRM

এবং তথ্য প্রদান করবে—

* Warranty
* Asset Management
* Inventory Ledger
* Inventory Analytics

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Created
* Received
* Reserved
* Sold
* Returned
* Serviced
* Blocked
* Disposed

Delete অনুমোদিত নয়।

---

# ২১. Future Expansion

* GS1 Serial Standard
* QR Code Tracking
* RFID Tracking
* Mobile Serial Scanner
* IoT Device Integration
* Digital Product Passport

---

# ২২. Notes

Serial Relationship

```text id="sn002"
Product

↓

Unique Serial

↓

Warehouse

↓

Customer

↓

Service

↓

Disposal
```

প্রতিটি Serial একটি স্বতন্ত্র Product Unit-এর সম্পূর্ণ জীবনচক্র সংরক্ষণ করবে।

---

# ২৩. Related Documents

* Batch
* Stock
* Stock Movement
* Warehouse
* Warranty
* Asset Management
* Inventory Ledger

---

# ২৪. Conclusion

Serial Number Management Module হলো FFME ERP-এর **Unit-Level Traceability Engine**।

এর মাধ্যমে—

* Unique Product Identification
* Warranty Tracking
* Service History
* Customer Ownership
* Complete Unit Traceability

নিশ্চিত করা হবে।

FFME-তে Serial Number Management হলো—

**Unique Unit → Inventory → Customer → Service → Disposal**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `09-Expiry.md`
