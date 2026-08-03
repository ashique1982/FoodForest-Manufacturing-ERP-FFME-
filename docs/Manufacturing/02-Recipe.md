# Recipe

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Recipe

---

# ১. Purpose

Recipe হলো একটি পণ্য **কোন মান (Quality/Grade)** অনুযায়ী উৎপাদন করা হবে, তার ব্যবসায়িক সংজ্ঞা।

একই Finished Product-এর জন্য একাধিক Recipe থাকতে পারে।

উদাহরণ:

* Organic
* Fresh
* Normal
* Premium
* Export

Recipe নিজে Raw Material-এর পরিমাণ নির্ধারণ করে না। Recipe শুধু বলে **কোন ধরনের উৎপাদন হবে**।

---

# ২. এটা কী?

সহজ ভাষায়,

> **Recipe হলো একই পণ্যের বিভিন্ন উৎপাদন পদ্ধতি বা মান (Grade)।**

---

# ৩. কখন ব্যবহার করবেন?

যখন একই পণ্য বিভিন্ন মান, বাজার বা গ্রাহকের জন্য তৈরি করা হয়।

উদাহরণ:

FoodForest মরিচ গুঁড়া

* Organic
* Fresh
* Normal

---

# ৪. বাস্তব উদাহরণ

Product

```text id="rec001"
FoodForest মরিচ গুঁড়া 100g
```

এর Recipe

| Recipe  | ব্যবহার            |
| ------- | ------------------ |
| Organic | অর্গানিক বাজার     |
| Fresh   | সাধারণ খুচরা বাজার |
| Normal  | কম দামের বাজার     |

সবগুলো একই Product।

কিন্তু উৎপাদনের মান আলাদা।

---

# ৫. Recipe-এর কাজ

Recipe নির্ধারণ করবে—

* Product Quality
* Production Standard
* Formula
* BOM
* Manufacturing Rules

---

# ৬. Recipe Structure

প্রতিটি Recipe-এ থাকবে—

* Recipe Code
* Recipe Name
* Product
* Category
* Version
* Status
* Effective Date
* Description

---

# ৭. একটি Product-এর একাধিক Recipe

FFME একটি Product-এর জন্য একাধিক Recipe সমর্থন করবে।

উদাহরণ

```text id="rec002"
FoodForest মরিচ গুঁড়া

├── Organic
├── Fresh
├── Normal
└── Export
```

---

# ৮. Recipe Version

একটি Recipe-এর একাধিক Version থাকতে পারে।

উদাহরণ

```text id="rec003"
Fresh

├── V1
├── V2
└── V3
```

পুরনো Version সংরক্ষিত থাকবে।

---

# ৯. Recipe Status

সম্ভাব্য Status

* Draft
* Pending Approval
* Active
* Inactive
* Archived

শুধুমাত্র Active Recipe Production-এ ব্যবহার করা যাবে।

---

# ১০. Recipe Flow

```text id="rec004"
Product

↓

Recipe

↓

Formula

↓

BOM

↓

Production Order
```

---

# ১১. Recipe এবং Formula-এর পার্থক্য

Recipe বলে

> কোন মানের পণ্য তৈরি হবে।

Formula বলে

> কোন কাঁচামাল কত পরিমাণে ব্যবহার হবে।

---

উদাহরণ

Recipe

```text id="rec005"
Fresh
```

Formula

```text id="rec006"
তেজি মরিচ

60%

দেশি মরিচ

40%
```

---

# ১২. Recipe এবং BOM-এর পার্থক্য

Recipe

↓

কোন ধরনের উৎপাদন হবে।

BOM

↓

কোন Inventory Item ব্যবহার হবে।

---

# ১৩. Business Rules

### Rule REC-001

একটি Product-এর একাধিক Recipe থাকতে পারে।

---

### Rule REC-002

একটি Recipe-এর একাধিক Version থাকতে পারে।

---

### Rule REC-003

Production Order-এ Recipe নির্বাচন বাধ্যতামূলক।

---

### Rule REC-004

Approved Recipe ছাড়া Production করা যাবে না (Configuration অনুযায়ী ব্যতিক্রম সম্ভব)।

---

### Rule REC-005

পুরনো Recipe Delete করা যাবে না।

Archived করতে হবে।

---

### Rule REC-006

Recipe পরিবর্তন করলে নতুন Version তৈরি হবে।

---

# ১৪. Dashboard

Dashboard-এ দেখা যাবে—

* Total Recipe
* Active Recipe
* Pending Approval
* Latest Version
* Archived Recipe

---

# ১৫. Reports

* Recipe Register
* Recipe Version History
* Product Recipe List
* Active Recipe Report
* Archived Recipe Report

---

# ১৬. Related Modules

Recipe Module সমন্বিতভাবে কাজ করবে—

* Formula
* BOM
* Production Planning
* Production Order
* Costing

---

# ১৭. সাধারণ ভুল

❌ Recipe-এর ভিতরে Raw Material-এর দাম লিখবেন না।

❌ Recipe-এর ভিতরে Inventory Item নির্বাচন করবেন না।

❌ Recipe-এর ভিতরে শতাংশ লিখবেন না।

এসব Formula এবং BOM Module-এর কাজ।

---

# ১৮. Business Tip

যদি একই Product বিভিন্ন দামে বিক্রি করেন (যেমন Organic, Fresh, Normal), তাহলে প্রতিটির জন্য আলাদা Recipe ব্যবহার করুন।

এতে Cost, Quality এবং Profit Analysis অনেক সহজ হবে।

---

# ১৯. Conclusion

Recipe Module হলো FFME ERP-এর **Product Manufacturing Standard Definition**।

Recipe নির্ধারণ করে—

* কোন মানের পণ্য তৈরি হবে
* কোন Formula ব্যবহার হবে
* কোন BOM ব্যবহার হবে

কিন্তু Recipe নিজে Raw Material-এর পরিমাণ বা Cost নির্ধারণ করে না।

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `04-Formula.md`
