# Work Center

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Work Center

---

# ১. Purpose

Work Center হলো Factory-এর এমন একটি **কাজের স্থান (Production Area)** যেখানে নির্দিষ্ট ধরনের উৎপাদন কার্যক্রম সম্পন্ন হয়।

Work Center একটি Machine নয়।

Work Center একটি বিভাগ, লাইন, কক্ষ, সেল, স্টেশন বা উৎপাদন এলাকা হতে পারে।

---

# ২. এটা কী?

সহজ ভাষায়,

> **Work Center হলো যেখানে কাজ হয়।**

Machine হলো **কিসের মাধ্যমে কাজ হয়।**

---

# ৩. বাস্তব উদাহরণ

একটি Factory-তে থাকতে পারে—

| Work Center              |
| ------------------------ |
| Raw Material Store       |
| Cleaning Area            |
| Mixing Room              |
| Grinding Room            |
| Production Line-01       |
| Packing Line             |
| Quality Control Lab      |
| Finished Goods Warehouse |

---

# ৪. Machine এবং Work Center-এর পার্থক্য

## Work Center

Grinding Room

↓

Machine

Grinder-01

Grinder-02

Grinder-03

---

আরেকটি উদাহরণ

Packing Line

↓

Machine

Packing Machine-01

Sealing Machine-01

Labeling Machine-01

---

অর্থাৎ

একটি Work Center-এর অধীনে একাধিক Machine থাকতে পারে।

---

# ৫. কেন দরকার?

একটি ERP-তে শুধু Machine জানলেই যথেষ্ট নয়।

জানতে হবে—

* কোন বিভাগে কাজ হয়েছে
* কোন লাইনে কাজ হয়েছে
* কোন Production Area ব্যবহার হয়েছে

---

# ৬. Work Center Structure

প্রতিটি Work Center-এ থাকবে—

* Work Center Code
* Work Center Name
* Department
* Factory
* Branch
* Description
* Status

---

# ৭. Work Center Category

FFME-তে User নিজের Category তৈরি করতে পারবে।

উদাহরণ

* Production
* Packing
* Mixing
* Quality Control
* Warehouse
* Assembly
* Maintenance

Hardcode থাকবে না।

---

# ৮. Capacity

প্রতিটি Work Center-এর Capacity সংরক্ষণ করা যাবে।

উদাহরণ

* প্রতি ঘণ্টায় 500 kg
* প্রতি দিনে 10,000 Packet
* প্রতি শিফটে 50 Batch

User নিজের Unit ব্যবহার করতে পারবে।

---

# ৯. Shift

প্রতিটি Work Center-এর Shift নির্ধারণ করা যাবে।

উদাহরণ

* Morning
* Evening
* Night

অথবা User নিজের Shift তৈরি করতে পারবে।

---

# ১০. Working Calendar

Work Center অনুযায়ী থাকবে—

* Weekly Holiday
* Working Days
* Working Hours
* Overtime
* Maintenance Day

---

# ১১. Routing Integration

Routing শুধুমাত্র Work Center নির্বাচন করবে।

উদাহরণ

| Operation | Work Center   |
| --------- | ------------- |
| Grinding  | Grinding Room |
| Packing   | Packing Line  |
| QC        | QC Lab        |

---

# ১২. Machine Integration

একটি Work Center-এর অধীনে একাধিক Machine থাকতে পারে।

উদাহরণ

Grinding Room

↓

* Grinder-01
* Grinder-02
* Grinder-03

Production-এর সময় User নির্ধারণ করবে কোন Machine ব্যবহার হবে।

---

# ১৩. Operator Integration

একটি Work Center-এ একাধিক Operator কাজ করতে পারে।

উদাহরণ

Packing Line

↓

* Operator A
* Operator B
* Operator C

---

# ১৪. Production Integration

Production Entry-তে সংরক্ষিত হবে—

* কোন Work Center ব্যবহৃত হয়েছে
* কত সময় ব্যবহৃত হয়েছে
* কোন Shift-এ ব্যবহৃত হয়েছে

---

# ১৫. Capacity Planning

System Capacity Analysis করতে পারবে।

উদাহরণ

Grinding Room

Capacity

1000 kg/day

আজ Production

850 kg

Utilization

85%

---

# ১৬. Business Rules

### Rule WC-001

একটি Factory-এর একাধিক Work Center থাকতে পারে।

---

### Rule WC-002

একটি Work Center-এর একাধিক Machine থাকতে পারে।

---

### Rule WC-003

একটি Machine একই সময়ে একটির বেশি Active Production Order-এ ব্যবহার করা যাবে না (Configuration অনুযায়ী ব্যতিক্রম হতে পারে)।

---

### Rule WC-004

Inactive Work Center Routing-এ ব্যবহার করা যাবে না।

---

### Rule WC-005

Work Center Delete করা যাবে না।

Inactive বা Archived করতে হবে।

---

# ১৭. Dashboard

Dashboard-এ দেখা যাবে—

* Total Work Center
* Active Work Center
* Capacity Utilization
* Running Production
* Idle Work Center

---

# ১৮. Reports

* Work Center Register
* Capacity Report
* Utilization Report
* Production by Work Center
* Downtime Report
* Shift Report

---

# ১৯. সাধারণ ভুল

❌ Work Center-কে Machine মনে করবেন না।

❌ Work Center-এ Raw Material রাখবেন না।

❌ Work Center-এ Formula লিখবেন না।

---

# ২০. Business Tip

Factory ছোট হলেও প্রতিটি উৎপাদন এলাকা আলাদা Work Center হিসেবে তৈরি করুন।

এতে ভবিষ্যতে—

* Capacity Planning
* Machine Utilization
* Labour Analysis
* Production Analysis

অনেক সহজ হবে।

---

# ২১. Related Modules

* Routing
* Machine
* Operator
* Production Planning
* Production Order
* Manufacturing Ledger
* Maintenance

---

# ২২. Conclusion

Work Center হলো FFME ERP-এর **Production Location Management Module**।

এটি নির্ধারণ করে—

* কোথায় কাজ হবে
* কোন Production Area ব্যবহার হবে
* কোন Machine সেই Work Center-এর অধীনে কাজ করবে
* Capacity কত
* Utilization কত

Work Center কোনো Machine নয়, বরং Machine, Operator এবং Production Process-কে সংগঠিত করার একটি ব্যবসায়িক কাঠামো।

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team

**Next Document:** `07-Machine.md`
