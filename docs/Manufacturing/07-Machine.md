# Machine

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Machine

---

# ১. Purpose

Machine Module-এর উদ্দেশ্য হলো Factory-তে ব্যবহৃত সকল উৎপাদন মেশিন, যন্ত্রপাতি ও সরঞ্জামের তথ্য সংরক্ষণ, ব্যবহার, সক্ষমতা (Capacity), রক্ষণাবেক্ষণ (Maintenance) এবং কর্মক্ষমতা (Performance) পরিচালনা করা।

Machine Module Routing, Work Center, Production, Maintenance এবং Analytics-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. এটা কী?

সহজ ভাষায়,

> **Machine হলো সেই যন্ত্র যার মাধ্যমে উৎপাদনের কাজ সম্পন্ন হয়।**

---

# ৩. Machine বনাম Work Center

**Work Center**

কোথায় কাজ হবে।

**Machine**

কোন যন্ত্র দিয়ে কাজ হবে।

---

উদাহরণ

```text
Grinding Room (Work Center)

├── Grinder-01
├── Grinder-02
└── Grinder-03
```

---

# ৪. Machine-এর ব্যবহার

Machine ব্যবহার হবে—

* Production
* Capacity Planning
* Machine Utilization
* Maintenance
* Downtime Analysis
* Production Cost Analysis
* Loss Analysis

---

# ৫. Machine Master

প্রতিটি Machine-এর জন্য থাকবে—

* Machine Code
* Machine Name
* Machine Category
* Work Center
* Factory
* Branch
* Manufacturer
* Model
* Serial Number
* Installation Date
* Purchase Date
* Warranty Expiry
* Status

---

# ৬. Machine Category

User নিজের Category তৈরি করতে পারবেন।

উদাহরণ

* Grinder
* Mixer
* Oven
* Filling Machine
* Sealing Machine
* Labeling Machine
* CNC Machine
* Welding Machine
* Printing Machine

Hardcode থাকবে না।

---

# ৭. Machine Capacity

প্রতিটি Machine-এর Standard Capacity থাকবে।

উদাহরণ

* 500 kg/hour
* 2000 packet/hour
* 120 unit/hour

Unit User নির্ধারণ করতে পারবেন।

---

# ৮. Production Status

Machine-এর বর্তমান অবস্থা দেখা যাবে।

সম্ভাব্য Status

* Idle
* Running
* Maintenance
* Breakdown
* Reserved
* Inactive

---

# ৯. Machine Assignment

একটি Machine একাধিক Routing-এ ব্যবহার করা যেতে পারে।

কিন্তু একই সময়ে একাধিক Active Production Order-এ ব্যবহার করা যাবে না (Configuration অনুযায়ী ব্যতিক্রম হতে পারে)।

---

# ১০. Production Integration

Production Entry-তে সংরক্ষিত হবে—

* কোন Machine ব্যবহার হয়েছে
* কখন শুরু হয়েছে
* কখন শেষ হয়েছে
* কত Output হয়েছে

---

# ১১. Maintenance Integration

Machine-এর জন্য Maintenance Schedule থাকবে।

সম্ভাব্য Maintenance

* Daily
* Weekly
* Monthly
* Quarterly
* Half Yearly
* Yearly

অথবা User নিজের Schedule তৈরি করতে পারবেন।

---

# ১২. Breakdown History

প্রতিটি Breakdown সংরক্ষণ হবে।

তথ্য

* Date
* Reason
* Downtime
* Repair Cost
* Technician
* Remarks

---

# ১৩. Downtime

System Machine Downtime হিসাব করবে।

উদাহরণ

| Machine    |  Downtime |
| ---------- | --------: |
| Grinder-01 |    3 Hour |
| Grinder-02 | 45 Minute |

---

# ১৪. Machine Utilization

System দেখাবে—

Capacity

↓

Actual Usage

↓

Utilization %

উদাহরণ

Capacity

1000 kg/day

Actual

850 kg/day

Utilization

85%

---

# ১৫. Machine Cost

Machine-এর তথ্য

* Purchase Cost
* Current Book Value
* Depreciation Method (Finance Module-এর সাথে সমন্বিত)
* Running Cost (ঐচ্ছিক)
* Electricity Consumption (ঐচ্ছিক)

---

# ১৬. Production Efficiency

System হিসাব করতে পারবে—

* Expected Output
* Actual Output
* Efficiency %

উদাহরণ

Expected

1000 kg

Actual

950 kg

Efficiency

95%

---

# ১৭. Loss Analysis

Machine অনুযায়ী Loss Report তৈরি হবে।

উদাহরণ

| Machine    | Loss |
| ---------- | ---: |
| Grinder-01 | 2.5% |
| Grinder-02 | 5.2% |

এতে বোঝা যাবে কোন Machine-এ বেশি অপচয় হচ্ছে।

---

# ১৮. Business Rules

### Rule MAC-001

একটি Machine অবশ্যই একটি Work Center-এর অধীনে থাকবে।

---

### Rule MAC-002

Inactive Machine Production-এ ব্যবহার করা যাবে না।

---

### Rule MAC-003

Maintenance Status-এর Machine Production-এ Assign করা যাবে না (Override Permission ব্যতীত)।

---

### Rule MAC-004

Machine Delete করা যাবে না।

Inactive বা Archived করতে হবে।

---

### Rule MAC-005

Machine Breakdown History সংরক্ষিত থাকবে।

---

# ১৯. Dashboard

Dashboard-এ দেখা যাবে—

* Total Machine
* Active Machine
* Running Machine
* Idle Machine
* Maintenance Machine
* Breakdown Machine
* Capacity Utilization
* Machine Efficiency

---

# ২০. Reports

* Machine Register
* Machine Utilization Report
* Capacity Report
* Breakdown Report
* Maintenance Report
* Downtime Report
* Machine Efficiency Report
* Production by Machine
* Loss by Machine

---

# ২১. সাধারণ ভুল

❌ Machine-কে Work Center মনে করবেন না।

❌ একই Machine একই সময়ে দুইটি Production Order-এ ব্যবহার করবেন না।

❌ Machine Delete করবেন না।

---

# ২২. Business Tip

Machine-এর সব Maintenance এবং Breakdown Record সংরক্ষণ করুন।

এতে ভবিষ্যতে—

* Repair Cost Analysis
* Replacement Planning
* Production Delay Analysis
* Machine Performance Evaluation

খুব সহজ হবে।

---

# ২৩. Related Modules

* Work Center
* Routing
* Production Planning
* Production Order
* Maintenance
* Manufacturing Ledger
* Inventory
* Analytics

---

# ২৪. Conclusion

Machine Module হলো FFME ERP-এর **Equipment Management System**।

এটি নির্ধারণ করে—

* কোন Machine কোথায় আছে
* কোন Machine উৎপাদনে ব্যবহৃত হচ্ছে
* Capacity কত
* Efficiency কত
* Maintenance কবে হবে
* Breakdown কত হয়েছে

Machine Module Production, Maintenance এবং Analytics-এর জন্য একটি গুরুত্বপূর্ণ ভিত্তি তৈরি করে।

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `08-Production-Planning.md`
