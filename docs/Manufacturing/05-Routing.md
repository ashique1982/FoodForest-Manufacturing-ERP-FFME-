# Routing

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Routing

---

# ১. Purpose

Routing হলো একটি Product তৈরির **ধাপে ধাপে উৎপাদন প্রক্রিয়া (Manufacturing Process)**।

এখানে নির্ধারণ করা হয়—

* কোন ধাপে কী কাজ হবে
* কোন Work Center ব্যবহার হবে
* কোন Machine ব্যবহার হবে
* কোন Operator কাজ করবে (ঐচ্ছিক)
* কত সময় লাগবে
* কোথায় Quality Check হবে
* কোন ধাপে Expected Loss হতে পারে

Routing উৎপাদনের **Road Map**।

---

# ২. এটা কী?

সহজ ভাষায়,

> **Routing হলো একটি পণ্য তৈরির ধাপে ধাপে কাজের তালিকা।**

---

# ৩. কখন ব্যবহার করবেন?

যখন একটি Product একাধিক ধাপে তৈরি হয়।

উদাহরণ

* মরিচ গুঁড়া
* হলুদ গুঁড়া
* জিরা গুঁড়া
* মসলা মিক্স
* বিস্কুট
* সাবান
* তেল

---

# ৪. বাস্তব উদাহরণ

## FoodForest মরিচ গুঁড়া

```text
Raw Chili
    │
Cleaning
    │
Sorting
    │
Grinding
    │
Sieving
    │
Quality Check
    │
Packing
    │
Labeling
    │
Finished Goods Warehouse
```

---

# ৫. Routing-এর কাজ

Routing নির্ধারণ করবে—

* Production Sequence
* Work Center
* Machine
* Standard Time
* QC Point
* Expected Output
* Expected Loss (ঐচ্ছিক)

---

# ৬. Routing Structure

প্রতিটি Routing-এ থাকবে—

* Routing Code
* Routing Name
* Product
* Recipe
* Version
* Status
* Effective Date

---

# ৭. Operation List

প্রতিটি Routing-এর একাধিক Operation থাকবে।

উদাহরণ

| Step | Operation |
| ---- | --------- |
| 10   | Cleaning  |
| 20   | Sorting   |
| 30   | Grinding  |
| 40   | Sieving   |
| 50   | Packing   |
| 60   | Labeling  |

Step Number পরে নতুন ধাপ যোগ করার সুবিধার জন্য 10, 20, 30... রাখা হবে।

---

# ৮. প্রতিটি Operation-এ থাকবে

* Operation Name
* Work Center
* Machine
* Standard Setup Time
* Standard Run Time
* Standard Labour Time
* QC Required (Yes/No)
* Notes

---

# ৯. Work Center

উদাহরণ

* Grinding Room
* Packing Line
* Labeling Line
* Mixing Room
* QC Lab

---

# ১০. Machine

উদাহরণ

* Grinder-01
* Grinder-02
* Mixer-01
* Packing Machine-01
* Sealing Machine

---

# ১১. Quality Control

যে Operation-এর পরে QC দরকার হবে সেখানে QC বাধ্যতামূলক করা যাবে।

উদাহরণ

Grinding

↓

QC

↓

Packing

---

# ১২. Expected Time

প্রতিটি ধাপের Standard Time থাকবে।

| Operation | Time   |
| --------- | ------ |
| Cleaning  | 20 min |
| Grinding  | 45 min |
| Packing   | 60 min |

System পরে Actual Time-এর সাথে তুলনা করবে।

---

# ১৩. Expected Loss (ঐচ্ছিক)

Routing-এ চাইলে প্রতিটি Operation-এর Expected Loss নির্ধারণ করা যাবে।

উদাহরণ

| Operation | Expected Loss |
| --------- | ------------: |
| Cleaning  |          1 kg |
| Grinding  |          7 kg |
| Sieving   |          2 kg |

এটি শুধু Standard।

Actual Loss Production-এর সময় সংরক্ষণ হবে।

---

# ১৪. Production Flow

```text
Recipe
      │
Formula
      │
BOM
      │
Routing
      │
Production Order
```

---

# ১৫. Business Rules

### Rule ROUT-001

Approved Routing ছাড়া Production করা যাবে না (Configuration অনুযায়ী ব্যতিক্রম হতে পারে)।

---

### Rule ROUT-002

একটি Product-এর একাধিক Routing থাকতে পারে।

---

### Rule ROUT-003

Routing পরিবর্তন করলে নতুন Version তৈরি হবে।

---

### Rule ROUT-004

Routing Delete করা যাবে না।

Archived করতে হবে।

---

### Rule ROUT-005

Production চলাকালে সব Operation Manufacturing Ledger-এ সংরক্ষিত হবে।

---

# ১৬. Dashboard

Dashboard-এ দেখা যাবে—

* Total Routing
* Active Routing
* Pending Approval
* Latest Version
* Average Production Time

---

# ১৭. Reports

* Routing Register
* Routing Version History
* Operation List
* Machine Utilization
* Work Center Utilization
* Production Time Analysis
* Routing Comparison

---

# ১৮. সাধারণ ভুল

❌ Routing-এ Raw Material লিখবেন না।

❌ Routing-এ Cost লিখবেন না।

❌ Routing-এ Inventory Quantity লিখবেন না।

এসব BOM, Inventory এবং Costing Module-এর কাজ।

---

# ১৯. Business Tip

যদি একই Product দুইটি আলাদা Machine-এ তৈরি হয়, তাহলে দুইটি আলাদা Routing তৈরি করুন।

এতে Machine Efficiency এবং Production Cost সহজে বিশ্লেষণ করা যাবে।

---

# ২০. Related Modules

* Recipe
* Formula
* BOM
* Work Center
* Machine
* Production Planning
* Production Order
* Manufacturing Ledger
* Quality Control

---

# ২১. Conclusion

Routing হলো FFME ERP-এর **Production Process Engine**।

এটি নির্ধারণ করে—

* কোন ধাপে উৎপাদন হবে
* কোন Machine ব্যবহার হবে
* কোন Work Center ব্যবহার হবে
* কোথায় Quality Check হবে
* উৎপাদনের Standard Flow কী হবে

Routing Inventory, Cost বা Accounting পরিচালনা করে না; এটি শুধুমাত্র **উৎপাদন প্রক্রিয়ার মানক (Standard Process)** নির্ধারণ করে।

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `06-Work-Center.md`
