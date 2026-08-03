# Stock Adjustment Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Stock Adjustment

---

# ১. Purpose

Stock Adjustment Module-এর উদ্দেশ্য হলো বাস্তব স্টক (Physical Stock) এবং System Stock-এর মধ্যে পার্থক্য সমন্বয় (Adjustment) করা।

Stock Adjustment একটি ব্যতিক্রমী (Exception) Transaction।

এটি শুধুমাত্র বিশেষ পরিস্থিতিতে ব্যবহার করা হবে।

---

# ২. Business Philosophy

Stock Adjustment কখনো নিয়মিত Stock Management-এর বিকল্প নয়।

যেখানে সম্ভব, Stock-এর পরিবর্তন অবশ্যই Purchase, Sales, Production অথবা Transfer-এর মাধ্যমে হবে।

শুধুমাত্র বাস্তব ও System Stock-এর অমিল হলে Adjustment ব্যবহার করা হবে।

---

# ৩. Adjustment Reasons

FFME-তে প্রতিটি Adjustment-এর একটি বাধ্যতামূলক Reason থাকবে।

উদাহরণ—

* Physical Count Difference
* Damage
* Breakage
* Evaporation / Shrinkage
* Loss
* Theft
* Expired Disposal
* Sample Usage
* Data Migration
* Opening Correction
* System Error Correction
* Management Approval

Custom Reason Configuration থেকেও যোগ করা যাবে।

---

# ৪. Adjustment Types

## Positive Adjustment

System Stock বৃদ্ধি পাবে।

উদাহরণ

System Stock = 95

Physical Stock = 100

Adjustment = +5

---

## Negative Adjustment

System Stock কমবে।

উদাহরণ

System Stock = 100

Physical Stock = 97

Adjustment = -3

---

## Value Adjustment

Quantity পরিবর্তন হবে না।

শুধুমাত্র Inventory Value পরিবর্তন হবে।

---

# ৫. Adjustment Workflow

```text id="adj001"
Adjustment Request

↓

Verification

↓

Approval

↓

Stock Adjustment

↓

Inventory Ledger

↓

Current Stock Update
```

---

# ৬. Adjustment Document

প্রতিটি Adjustment Document-এ থাকবে—

* Adjustment Number
* Adjustment Date
* Warehouse
* Adjustment Type
* Reason
* Requested By
* Approved By
* Status

---

# ৭. Adjustment Lines

প্রতিটি Product-এর জন্য থাকবে—

* Product
* Batch
* Serial Number
* System Quantity
* Physical Quantity
* Difference
* Adjustment Quantity
* Unit Cost
* Total Cost

---

# ৮. Batch Adjustment

Batch Controlled Product-এর ক্ষেত্রে—

Batch অনুযায়ী Adjustment হবে।

---

# ৯. Serial Adjustment

Serial Controlled Product-এর ক্ষেত্রে—

প্রতিটি Serial Number যাচাই করা হবে।

Missing বা Extra Serial আলাদাভাবে রেকর্ড হবে।

---

# ১০. Warehouse Adjustment

Warehouse অনুযায়ী Adjustment হবে।

এক Warehouse-এর Adjustment অন্য Warehouse-কে প্রভাবিত করবে না।

---

# ১১. Stock Freeze

Physical Count চলাকালীন Warehouse Freeze করা যেতে পারে।

Freeze অবস্থায়—

* Purchase Receive
* Sales Issue
* Transfer

Configuration অনুযায়ী সীমাবদ্ধ করা যাবে।

---

# ১২. Approval

সব Adjustment Approval-এর মাধ্যমে হবে।

উদাহরণ

| Adjustment Value | Approval             |
| ---------------: | -------------------- |
|              ছোট | Warehouse Manager    |
|           মাঝারি | Inventory Manager    |
|              বড় | Finance + Management |

Approval Matrix Configuration থেকে পরিবর্তনযোগ্য।

---

# ১৩. Financial Impact

Negative অথবা Positive Adjustment-এর ফলে Inventory Value পরিবর্তিত হলে—

Finance Module-এ স্বয়ংক্রিয় Journal Entry তৈরি হবে।

---

# ১৪. Adjustment Restrictions

Adjustment করা যাবে না যদি—

* Audit চলমান থাকে।
* Warehouse Locked থাকে।
* Product Blocked থাকে।
* Pending Transaction থাকে (Configuration অনুযায়ী)।

---

# ১৫. Reverse Adjustment

ভুল Adjustment Delete করা যাবে না।

Reverse Adjustment তৈরি হবে।

উদাহরণ

```text id="adj002"
+10

↓

Reverse

↓

-10
```

---

# ১৬. Business Rules

### Rule ADJ-001

Reason ছাড়া Adjustment করা যাবে না।

---

### Rule ADJ-002

Approved Adjustment ছাড়া Stock পরিবর্তন হবে না।

---

### Rule ADJ-003

সব Adjustment Inventory Ledger-এ সংরক্ষিত হবে।

---

### Rule ADJ-004

Adjustment Delete করা যাবে না।

---

### Rule ADJ-005

ভুল Adjustment শুধুমাত্র Reverse করা যাবে।

---

### Rule ADJ-006

Batch ও Serial Controlled Product-এর ক্ষেত্রে পূর্ণ Traceability বাধ্যতামূলক।

---

### Rule ADJ-007

বড় Value-এর Adjustment-এর জন্য Multi-Level Approval সমর্থিত হবে।

---

# ১৭. Dashboard

Dashboard-এ দেখা যাবে—

* Today's Adjustment
* Pending Approval
* Positive Adjustment
* Negative Adjustment
* Warehouse Adjustment
* High Value Adjustment

---

# ১৮. Reports

* Adjustment Register
* Product Adjustment Report
* Warehouse Adjustment Report
* Reason Wise Adjustment
* User Wise Adjustment
* Batch Adjustment Report
* Serial Adjustment Report
* Financial Impact Report

---

# ১৯. Integration

Stock Adjustment Module তথ্য গ্রহণ করবে—

* Inventory
* Warehouse
* Batch
* Serial Number
* Stock Take
* Finance

এবং তথ্য প্রদান করবে—

* Stock
* Inventory Ledger
* Inventory Analytics
* Finance Journal

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Created
* Verified
* Approved
* Posted
* Reversed
* Cancelled

Delete অনুমোদিত নয়।

---

# ২১. Future Expansion

* Mobile Adjustment
* Barcode Verification
* RFID Verification
* AI Shrinkage Analysis
* Image Attachment
* Voice Note Support

---

# ২২. Notes

Stock Adjustment Architecture

```text id="adj003"
Physical Count

↓

Difference Found

↓

Adjustment

↓

Inventory Ledger

↓

Current Stock
```

Stock Adjustment শুধুমাত্র বাস্তব ও System Stock-এর পার্থক্য সমন্বয়ের জন্য ব্যবহার হবে।

---

# ২৩. Related Documents

* Stock
* Stock Movement
* Stock Take
* Inventory Ledger
* Inventory Audit
* Warehouse
* Finance

---

# ২৪. Conclusion

Stock Adjustment Module হলো FFME ERP-এর **Inventory Correction & Reconciliation Engine**।

এর মাধ্যমে—

* Stock Difference Control
* Physical Verification
* Financial Accuracy
* Complete Audit Trail
* Controlled Inventory Correction

নিশ্চিত করা হবে।

FFME-তে Stock Adjustment হলো—

**Physical Verification → Difference → Approval → Inventory Correction**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `06-Stock-Take.md`
