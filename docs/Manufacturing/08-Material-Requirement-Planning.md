# Material Requirement Planning (MRP)

**Document:** Business Architecture

**Version:** 1.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Material Requirement Planning (MRP)

---

# ১. Purpose

Material Requirement Planning (MRP) Module-এর উদ্দেশ্য হলো উৎপাদনের জন্য **কোন কাঁচামাল, প্যাকেজিং উপকরণ, সেমি-ফিনিশড পণ্য বা অন্যান্য উপকরণ কত পরিমাণে, কখন এবং কোন Warehouse-এ প্রয়োজন হবে** তা নির্ধারণ করা।

MRP উৎপাদন করে না।

MRP শুধুমাত্র **Material Requirement নির্ধারণ করে।**

---

# ২. এটা কী?

সহজ ভাষায়,

> **MRP বলে – উৎপাদন শুরু করার আগে কী কী উপকরণ লাগবে এবং সেগুলো পর্যাপ্ত আছে কিনা।**

---

# ৩. কেন দরকার?

ধরুন আপনি আগামী সপ্তাহে

১০,০০০ প্যাকেট মরিচ গুঁড়া তৈরি করবেন।

MRP আগে হিসাব করবে—

* মরিচ কত লাগবে?
* পাউচ কত লাগবে?
* স্টিকার কত লাগবে?
* কার্টন কত লাগবে?

এরপর Inventory-এর সাথে মিলিয়ে দেখবে—

* কী আছে?
* কী কম আছে?
* কী কিনতে হবে?

---

# ৪. MRP Input

MRP নিম্নোক্ত Source থেকে তথ্য নেবে।

* Sales Order
* Sales Forecast
* Production Planning
* Minimum Stock
* Reorder Level
* Manual Demand

---

# ৫. MRP Calculation Flow

```text
Demand
      │
      ▼
Recipe
      │
      ▼
Formula
      │
      ▼
BOM
      │
      ▼
Inventory Check
      │
      ▼
Requirement Calculation
      │
      ▼
Shortage Report
```

---

# ৬. MRP কী হিসাব করবে?

System প্রতিটি Material-এর জন্য নির্ধারণ করবে—

* Required Quantity
* Available Quantity
* Reserved Quantity
* Incoming Quantity
* Shortage Quantity

---

# ৭. উদাহরণ

Production Target

১০০০ Packet

↓

System Calculate করল

| Item      | Required |
| --------- | -------: |
| তেজি মরিচ |    60 kg |
| দেশি মরিচ |    50 kg |
| পাউচ      | 1000 pcs |
| স্টিকার   | 1000 pcs |

---

Inventory

| Item      | Available |
| --------- | --------: |
| তেজি মরিচ |     40 kg |
| দেশি মরিচ |     80 kg |
| পাউচ      |  1200 pcs |
| স্টিকার   |   500 pcs |

---

MRP Result

| Item      | Shortage |
| --------- | -------: |
| তেজি মরিচ |    20 kg |
| স্টিকার   |  500 pcs |

---

# ৮. Material Status

প্রতিটি Material-এর Status থাকবে—

* Available
* Shortage
* Reserved
* Ordered
* Expected
* Substitute Available

---

# ৯. Purchase Suggestion

যদি Material কম থাকে,

System Purchase Module-এ Suggestion পাঠাতে পারবে।

উদাহরণ

```text
Purchase Suggestion

Teji Chili

20 kg

Sticker

500 pcs
```

---

# ১০. Warehouse Selection

একাধিক Warehouse থাকলে

MRP Warehouse অনুযায়ী Requirement দেখাবে।

---

# ১১. Alternative Material

যদি Primary Material না থাকে,

System Alternative Material Suggest করতে পারবে (Configuration অনুযায়ী)।

---

# ১২. Reservation Integration

যদি Planning Confirm হয়,

MRP Material Reserve করতে পারবে।

Reserved Stock অন্য Production বা Sales-এ ব্যবহার করা যাবে না।

---

# ১৩. Multi-Level MRP

FFME সমর্থন করবে—

* Raw Material
* Semi Finished Goods
* Packaging Material

উদাহরণ

```text
Finished Product

↓

Semi Finished

↓

Raw Material
```

---

# ১৪. Business Rules

### Rule MRP-001

Approved Recipe, Formula এবং BOM ছাড়া MRP চলবে না।

---

### Rule MRP-002

Inventory Ledger-ই Material Availability-এর একমাত্র উৎস (Single Source of Truth)।

---

### Rule MRP-003

MRP কোনো Stock পরিবর্তন করবে না।

শুধু হিসাব করবে।

---

### Rule MRP-004

MRP Production Order তৈরি করবে না।

MRP শুধু Requirement তৈরি করবে।

---

### Rule MRP-005

MRP Result পরিবর্তন করলে পুনরায় Calculation করতে হবে।

---

# ১৫. Dashboard

Dashboard-এ দেখা যাবে—

* Total Requirement
* Material Available
* Material Shortage
* Purchase Suggestion
* Reserved Material
* Upcoming Requirement

---

# ১৬. Reports

* Material Requirement Report
* Material Shortage Report
* Purchase Suggestion Report
* Reserved Material Report
* Warehouse Requirement Report
* Daily Requirement Report
* Monthly Requirement Report

---

# ১৭. সাধারণ ভুল

❌ MRP-কে Purchase Module মনে করবেন না।

❌ MRP-কে Production Module মনে করবেন না।

❌ MRP কোনো Inventory কমাবে বা বাড়াবে না।

---

# ১৮. Business Tip

Production শুরু করার আগে সবসময় MRP চালান।

এতে—

* Production Delay কমবে।
* জরুরি Purchase কম হবে।
* Stock Out কম হবে।
* অতিরিক্ত Inventory কমে যাবে।

---

# ১৯. Related Modules

* Inventory
* Purchase
* Recipe
* Formula
* BOM
* Production Planning
* Production Order
* Warehouse

---

# ২০. Conclusion

Material Requirement Planning (MRP) হলো FFME ERP-এর **Material Planning Engine**।

এটি নির্ধারণ করে—

* কী Material লাগবে
* কত লাগবে
* কোথায় লাগবে
* কী কম আছে
* কী কিনতে হবে

MRP-এর প্রধান কাজ হলো **উৎপাদন শুরু হওয়ার আগেই Material Availability নিশ্চিত করা।**

---

**Document Status:** Final

**Version:** 1.0.0

**Owner:** FFME Core Team**

**Next Document:** `09-Capacity-Planning.md`
