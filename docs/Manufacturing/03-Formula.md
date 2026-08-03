# Formula

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Formula

---

# ১. Purpose

Formula হলো একটি Recipe-এর জন্য **কোন কোন উপাদান কত অনুপাতে (Ratio / Percentage / Quantity) ব্যবহার হবে**, তার সংজ্ঞা।

Formula Manufacturing-এর "রান্নার রেসিপি" নয়, বরং **Mixing Logic**।

একই Product এবং একই Recipe-এর একাধিক Formula Version থাকতে পারে।

---

# ২. এটা কী?

সহজ ভাষায়,

> **Formula বলে কোন কাঁচামাল কত শতাংশ বা কত পরিমাণে মিশবে।**

---

# ৩. কখন ব্যবহার করবেন?

যখন একই পণ্য বিভিন্ন মান (Quality), স্বাদ, বাজার বা কাঁচামালের দামের উপর ভিত্তি করে ভিন্ন অনুপাতে তৈরি করতে হবে।

---

# ৪. বাস্তব উদাহরণ

Product

FoodForest মরিচ গুঁড়া 100g

Recipe

Fresh

Formula

| Material  | Ratio |
| --------- | ----: |
| তেজি মরিচ |   60% |
| দেশি মরিচ |   40% |

---

আরেকটি Formula

| Material  | Ratio |
| --------- | ----: |
| তেজি মরিচ |   70% |
| দেশি মরিচ |   30% |

দুইটিই Fresh Recipe-এর Formula হতে পারে।

---

# ৫. Formula-এর কাজ

Formula নির্ধারণ করবে—

* কোন Ingredient ব্যবহার হবে
* কত শতাংশ ব্যবহার হবে
* কত অংশ ব্যবহার হবে
* Mixing Ratio
* Yield Basis

Formula Inventory Item নির্বাচন করে না।

সেটা BOM Module-এর কাজ।

---

# ৬. Formula Structure

প্রতিটি Formula-তে থাকবে—

* Formula Code
* Formula Name
* Product
* Recipe
* Version
* Status
* Effective Date

---

# ৭. Formula Types

FFME সমর্থন করবে—

* Percentage Formula
* Fixed Quantity Formula
* Ratio Formula

---

### Percentage Formula

| Material  |  % |
| --------- | -: |
| তেজি মরিচ | 60 |
| দেশি মরিচ | 40 |

---

### Ratio Formula

| Material  | Ratio |
| --------- | ----: |
| তেজি মরিচ |     6 |
| দেশি মরিচ |     4 |

---

### Fixed Quantity Formula

| Material  |   Qty |
| --------- | ----: |
| তেজি মরিচ | 60 kg |
| দেশি মরিচ | 40 kg |

---

# ৮. Formula Version

একটি Formula-এর একাধিক Version থাকতে পারে।

উদাহরণ

```text id="for001"
Fresh

↓

V1

60/40

↓

V2

55/45

↓

V3

70/30
```

পুরনো Version সংরক্ষিত থাকবে।

---

# ৯. Effective Date

Formula নির্দিষ্ট সময়ের জন্য কার্যকর করা যাবে।

* Effective From
* Effective To

---

# ১০. Formula Status

* Draft
* Pending Approval
* Active
* Inactive
* Archived

শুধুমাত্র Active Formula Production-এ ব্যবহার করা যাবে।

---

# ১১. Formula এবং Recipe

Recipe বলে—

> কোন মানের পণ্য তৈরি হবে।

Formula বলে—

> কোন উপাদান কত শতাংশে মিশবে।

---

# ১২. Formula এবং BOM

Formula

↓

Mixing Logic

BOM

↓

Inventory Item Mapping

---

Flow

```text id="for002"
Recipe

↓

Formula

↓

BOM

↓

Production Order
```

---

# ১৩. Production Integration

Production Quantity অনুযায়ী System Formula Calculate করবে।

উদাহরণ

Target Production

100 kg

Formula

```text id="for003"
60%

40%
```

System Calculate করবে

```text id="for004"
60 kg

40 kg
```

তারপর BOM Inventory Item অনুযায়ী Material Issue করবে।

---

# ১৪. Cost Analysis

Formula পরিবর্তন করলে—

* Raw Material Requirement পরিবর্তন হবে।
* Production Cost Estimate পরিবর্তন হবে।
* Expected Margin পরিবর্তন হতে পারে।

---

# ১৫. Business Rules

### Rule FOR-001

একটি Recipe-এর একাধিক Formula থাকতে পারে।

---

### Rule FOR-002

এক সময়ে একটি Formula Active থাকবে।

---

### Rule FOR-003

Approved Formula ছাড়া Production করা যাবে না (Configuration অনুযায়ী ব্যতিক্রম সম্ভব)।

---

### Rule FOR-004

Formula Delete করা যাবে না।

Archived করতে হবে।

---

### Rule FOR-005

Formula পরিবর্তন করলে নতুন Version তৈরি হবে।

---

# ১৬. Dashboard

Dashboard-এ দেখা যাবে—

* Total Formula
* Active Formula
* Pending Approval
* Latest Version
* Archived Formula

---

# ১৭. Reports

* Formula Register
* Formula Version History
* Formula Comparison
* Active Formula Report
* Formula Change History

---

# ১৮. সাধারণ ভুল

❌ Formula-তে Inventory Item নির্বাচন করবেন না।

❌ Formula-তে Raw Material-এর দাম লিখবেন না।

❌ Formula-তে Finished Goods Cost লিখবেন না।

এসব BOM এবং Costing Module-এর কাজ।

---

# ১৯. Business Tip

যদি বাজারে কাঁচামালের দাম পরিবর্তন হয়, নতুন Formula Version তৈরি করুন।

পুরনো Formula পরিবর্তন করবেন না।

এতে ভবিষ্যতে Cost Analysis এবং Product Traceability সহজ হবে।

---

# ২০. Related Modules

* Recipe
* BOM
* Inventory
* Production Order
* Manufacturing Ledger
* Costing

---

# ২১. Conclusion

Formula হলো FFME ERP-এর **Manufacturing Mixing Engine**।

এটি নির্ধারণ করে—

* কোন উপাদান ব্যবহার হবে
* কত শতাংশ বা কত পরিমাণে ব্যবহার হবে
* Recipe অনুযায়ী Mixing Logic কী হবে

Formula নিজে Inventory Issue বা Cost Posting করে না।

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `05-Production-Order.md`
