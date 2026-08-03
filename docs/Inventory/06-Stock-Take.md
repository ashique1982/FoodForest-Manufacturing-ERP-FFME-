# Stock Take Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Stock Take

---

# ১. Purpose

Stock Take Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের বাস্তব (Physical) Inventory গণনা করে System Inventory-এর সাথে মিলিয়ে দেখা এবং প্রয়োজনে Stock Adjustment-এর ভিত্তি তৈরি করা।

**Stock Take নিজে কখনো Stock পরিবর্তন করবে না।**

Stock Take শুধুমাত্র গণনা (Counting), যাচাই (Verification) এবং অমিল (Variance) নির্ণয় করবে।

---

# ২. Business Philosophy

Stock Take এবং Stock Adjustment এক জিনিস নয়।

* **Stock Take** → বাস্তব স্টক গণনা
* **Stock Adjustment** → গণনার ভিত্তিতে স্টক সংশোধন

অর্থাৎ—

```text id="stk001"
Stock Take

↓

Variance Found

↓

Approval

↓

Stock Adjustment

↓

Inventory Updated
```

---

# ৩. Stock Take Types

FFME নিম্নলিখিত ধরনের Stock Take সমর্থন করবে—

* Full Inventory Count
* Warehouse Wise Count
* Zone Wise Count
* Bin Wise Count
* Product Wise Count
* Batch Wise Count
* Serial Wise Count
* Cycle Count
* Surprise Count
* Annual Stock Take

---

# ৪. Stock Take Workflow

```text id="stk002"
Stock Take Plan

↓

Freeze (Optional)

↓

Physical Count

↓

Verification

↓

Variance Analysis

↓

Approval

↓

Stock Adjustment (If Required)
```

---

# ৫. Stock Take Plan

Stock Take শুরু করার আগে Plan তৈরি হবে।

Plan-এ থাকবে—

* Stock Take Number
* Company
* Branch
* Warehouse
* Scope
* Start Date
* End Date
* Responsible Team

---

# ৬. Counting Method

System সমর্থন করবে—

## Blind Count

Counter System Quantity দেখতে পারবে না।

শুধু Physical Quantity লিখবে।

---

## Guided Count

Counter System Quantity দেখতে পারবে।

---

## Barcode Count

Barcode Scan করে Count করা যাবে।

---

## RFID Count

Future Expansion

---

# ৭. Count Scope

গণনা করা যাবে—

* Entire Warehouse
* Selected Products
* Selected Category
* Selected Batch
* Selected Bin
* Selected Rack
* Selected Zone

---

# ৮. Physical Count

প্রতিটি Item-এর জন্য থাকবে—

* Product
* Batch
* Serial
* UOM
* System Quantity
* Physical Quantity
* Difference

---

# ৯. Variance Analysis

System স্বয়ংক্রিয়ভাবে বের করবে—

```text id="stk003"
Variance

=

Physical Quantity

-

System Quantity
```

সম্ভাব্য ফলাফল—

* Match
* Short
* Excess

---

# ১০. Verification

বড় Variance হলে—

Supervisor Verification বাধ্যতামূলক হতে পারে।

---

# ১১. Freeze Option

Stock Take চলাকালীন Warehouse Freeze করা যাবে।

Freeze Mode-এ—

Configuration অনুযায়ী

* Purchase Receive
* Sales Issue
* Transfer
* Production Issue

সীমাবদ্ধ করা যাবে।

---

# ১২. Partial Stock Take

পুরো Warehouse না গুনে—

নির্দিষ্ট অংশ গণনা করা যাবে।

উদাহরণ—

* শুধুমাত্র Finished Goods
* শুধুমাত্র Rack-05
* শুধুমাত্র Batch-B240701

---

# ১৩. Batch & Serial Verification

Batch Controlled Product-এর ক্ষেত্রে—

Batch অনুযায়ী Count হবে।

Serial Controlled Product-এর ক্ষেত্রে—

প্রতিটি Serial Verify হবে।

---

# ১৪. Approval

Stock Take Result Approval-এর পরে—

যদি পার্থক্য থাকে

Stock Adjustment তৈরি হবে।

---

# ১৫. Auto Adjustment

Configuration অনুযায়ী—

ছোট Variance-এর ক্ষেত্রে

System Auto Adjustment Suggest করতে পারবে।

Auto Post নয়।

---

# ১৬. Business Rules

### Rule STK-001

Stock Take নিজে Stock পরিবর্তন করবে না।

---

### Rule STK-002

Variance থাকলে Adjustment আলাদা Document হবে।

---

### Rule STK-003

Blind Count Mode সমর্থিত হবে।

---

### Rule STK-004

Warehouse Freeze Configuration অনুযায়ী হবে।

---

### Rule STK-005

Batch ও Serial Product-এর ক্ষেত্রে পূর্ণ Verification বাধ্যতামূলক।

---

### Rule STK-006

Approved Stock Take পরিবর্তন করা যাবে না।

---

### Rule STK-007

Annual Stock Take-এর Report সংরক্ষণ বাধ্যতামূলক।

---

# ১৭. Dashboard

Dashboard-এ দেখা যাবে—

* Planned Stock Take
* Ongoing Count
* Completed Count
* Pending Verification
* Variance Summary
* Warehouse Status

---

# ১৮. Reports

* Stock Take Register
* Variance Report
* Product Variance Report
* Warehouse Count Report
* Batch Verification Report
* Serial Verification Report
* Annual Stock Take Report
* Cycle Count Report

---

# ১৯. Integration

Stock Take Module তথ্য গ্রহণ করবে—

* Stock
* Warehouse
* Batch
* Serial Number

এবং তথ্য প্রদান করবে—

* Stock Adjustment
* Inventory Audit
* Inventory Analytics

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Planned
* Started
* Counted
* Verified
* Approved
* Closed

Delete অনুমোদিত নয়।

---

# ২১. Future Expansion

* Mobile Counting App
* Offline Count Mode
* Barcode Scanner
* RFID Scanner
* Voice Count
* AI Variance Detection
* Camera Based Counting

---

# ২২. Notes

Stock Take Architecture

```text id="stk004"
System Stock

↓

Physical Count

↓

Variance

↓

Approval

↓

Stock Adjustment
```

Stock Take হলো Inventory Accuracy নিশ্চিত করার প্রধান মাধ্যম।

---

# ২৩. Related Documents

* Stock
* Stock Adjustment
* Inventory Audit
* Inventory Ledger
* Warehouse
* Batch
* Serial Number

---

# ২৪. Conclusion

Stock Take Module হলো FFME ERP-এর **Inventory Verification Engine**।

এর মাধ্যমে—

* Physical Inventory Verification
* Variance Analysis
* Inventory Accuracy
* Audit Compliance
* Controlled Stock Adjustment

নিশ্চিত করা হবে।

FFME-তে Stock Take হলো—

**Plan → Count → Verify → Variance → Adjustment**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `07-Batch.md`
