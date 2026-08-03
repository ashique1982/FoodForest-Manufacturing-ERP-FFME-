# Capacity Planning

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Capacity Planning

---

# ১. Purpose

Capacity Planning Module-এর উদ্দেশ্য হলো নির্ধারণ করা যে **Factory-এর বর্তমান উৎপাদন সক্ষমতা (Capacity) পরিকল্পিত উৎপাদন সম্পন্ন করার জন্য যথেষ্ট কিনা।**

এটি উৎপাদন করে না।

এটি শুধু বিশ্লেষণ (Analysis) করে এবং পরিকল্পনা (Planning) করতে সাহায্য করে।

---

# ২. এটা কী?

সহজ ভাষায়,

> **Capacity Planning বলে – Factory আসলেই এই উৎপাদন করতে পারবে কিনা।**

---

# ৩. কেন দরকার?

ধরুন—

আপনি আগামীকাল

৫০,০০০ প্যাকেট উৎপাদনের পরিকল্পনা করলেন।

কিন্তু—

* Machine মাত্র ২০,০০০ প্যাকেট উৎপাদন করতে পারে।
* Operator মাত্র ২টি Shift কাজ করবে।
* Packing Line মাত্র ৩০,০০০ প্যাকেট করতে পারবে।

তাহলে System আগে থেকেই Warning দেবে।

---

# ৪. Capacity Planning Flow

```text id="cap001"
Production Demand
        │
        ▼
Work Center Capacity
        │
        ▼
Machine Capacity
        │
        ▼
Shift Capacity
        │
        ▼
Operator Capacity
        │
        ▼
Available Capacity
        │
        ▼
Capacity Analysis
```

---

# ৫. Capacity Sources

System Capacity হিসাব করবে—

* Work Center
* Machine
* Shift
* Operator (ঐচ্ছিক)
* Production Calendar

---

# ৬. Capacity Types

FFME সমর্থন করবে—

* Hourly Capacity
* Daily Capacity
* Weekly Capacity
* Monthly Capacity
* Batch Capacity
* Custom Capacity

---

# ৭. Work Center Capacity

উদাহরণ

Grinding Room

Capacity

1000 kg/day

---

# ৮. Machine Capacity

উদাহরণ

Grinder-01

Capacity

500 kg/hour

---

# ৯. Shift Capacity

উদাহরণ

Morning Shift

8 Hours

↓

Machine

500 kg/hour

↓

Shift Capacity

4000 kg

---

# ১০. Calendar Capacity

Capacity Planning বিবেচনা করবে—

* Working Days
* Weekly Holiday
* National Holiday
* Maintenance Day
* Shutdown Day

---

# ১১. Utilization

System হিসাব করবে—

```text id="cap002"
Utilization %

=

Actual Load

÷

Available Capacity

×100
```

---

উদাহরণ

Available Capacity

1000 kg

Planned Production

850 kg

Utilization

85%

---

# ১২. Overload Detection

যদি Planned Production

Available Capacity-এর বেশি হয়,

System Warning দেবে।

উদাহরণ

```text id="cap003"
Available

1000 kg

Planned

1200 kg

Overload

200 kg
```

---

# ১৩. Under Utilization

যদি Capacity কম ব্যবহার হয়,

System সেটিও দেখাবে।

উদাহরণ

Capacity

1000 kg

Production

300 kg

Utilization

30%

---

# ১৪. Capacity Suggestions

System Suggest করতে পারবে—

* অতিরিক্ত Shift
* অন্য Machine ব্যবহার
* অন্য Work Center ব্যবহার
* অন্য Production Date
* Partial Production

---

# ১৫. Multi Factory Support

একাধিক Factory থাকলে

System Factory অনুযায়ী Capacity দেখাবে।

---

# ১৬. Multi Branch Support

একাধিক Branch থাকলে

Branch অনুযায়ী Capacity Planning করা যাবে।

---

# ১৭. Business Rules

### Rule CAP-001

Inactive Machine Capacity-তে গণনা হবে না।

---

### Rule CAP-002

Maintenance থাকা Machine Available Capacity-তে থাকবে না।

---

### Rule CAP-003

Holiday-তে Capacity শূন্য ধরা হবে (Configuration অনুযায়ী ব্যতিক্রম সম্ভব)।

---

### Rule CAP-004

Capacity Planning কোনো Production Order তৈরি করবে না।

---

### Rule CAP-005

Capacity Planning Inventory পরিবর্তন করবে না।

---

# ১৮. Dashboard

Dashboard-এ দেখা যাবে—

* Total Capacity
* Available Capacity
* Used Capacity
* Remaining Capacity
* Overloaded Work Centers
* Under Utilized Work Centers
* Machine Utilization

---

# ১৯. Reports

* Capacity Planning Report
* Work Center Capacity Report
* Machine Capacity Report
* Shift Capacity Report
* Utilization Report
* Overload Report
* Under Utilization Report
* Capacity Trend Report

---

# ২০. সাধারণ ভুল

❌ Capacity Planning-কে Production Planning মনে করবেন না।

❌ Capacity Planning Inventory দেখে না।

❌ Capacity Planning Material Requirement হিসাব করে না।

---

# ২১. Business Tip

Production শুরু করার আগে—

* MRP চালান
* Capacity Planning চালান

তারপর Production Planning করুন।

এতে Production Delay, Machine Bottleneck এবং Delivery Failure অনেক কমে যাবে।

---

# ২২. Related Modules

* Material Requirement Planning
* Production Planning
* Routing
* Work Center
* Machine
* Production Scheduling
* Production Order
* Manufacturing Calendar

---

# ২৩. Conclusion

Capacity Planning হলো FFME ERP-এর **Resource Capacity Analysis Engine**।

এটি নির্ধারণ করে—

* Factory-এর উৎপাদন সক্ষমতা
* Machine Load
* Work Center Load
* Shift Load
* Available Capacity
* Over Capacity

এর মূল উদ্দেশ্য হলো **Factory-এর বিদ্যমান সক্ষমতার সর্বোচ্চ এবং ভারসাম্যপূর্ণ ব্যবহার নিশ্চিত করা।**

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `10-Production-Planning.md`
