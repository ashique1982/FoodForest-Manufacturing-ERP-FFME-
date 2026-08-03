# Bill of Materials (BOM)

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Manufacturing

**Module:** Bill of Materials (BOM)

---

# ১. Purpose

Bill of Materials (BOM) হলো একটি Recipe অনুযায়ী উৎপাদনের সময় **Inventory থেকে কোন কোন Item কত পরিমাণে ব্যবহার হবে এবং উৎপাদনের পরে কোন কোন Item তৈরি হবে**, তার Standard Definition।

BOM হলো Inventory এবং Manufacturing-এর মধ্যে সংযোগকারী (Bridge)।

---

# ২. এটা কী?

সহজ ভাষায়,

> **BOM বলে দেয় উৎপাদনের সময় Warehouse থেকে কী কী বের হবে এবং উৎপাদনের পরে Warehouse-এ কী কী যোগ হবে।**

---

# ৩. কখন ব্যবহার করবেন?

যখন একটি Product উৎপাদনের জন্য Raw Material, Packaging Material এবং অন্যান্য Inventory Item নির্ধারণ করতে হবে।

---

# ৪. বাস্তব উদাহরণ

Product

**FoodForest মরিচ গুঁড়া 100g**

Recipe

**Fresh**

Production Quantity

**1000 Packet (100kg)**

---

Inventory থেকে বের হবে

| Item      |      Qty |
| --------- | -------: |
| তেজি মরিচ |    60 kg |
| দেশি মরিচ |    50 kg |
| 100g পাউচ | 1000 pcs |
| স্টিকার   | 1000 pcs |

---

Inventory-তে যোগ হবে

| Item        |    Qty |
| ----------- | -----: |
| মরিচ গুঁড়া | 100 kg |

---

Manufacturing Result

| Type          |   Qty |
| ------------- | ----: |
| Grinding Loss | 10 kg |

---

# ৫. BOM-এর কাজ

BOM নির্ধারণ করবে—

* কোন Inventory Item ব্যবহার হবে
* কত পরিমাণ ব্যবহার হবে
* কোন UOM হবে
* Expected Output
* Expected Loss
* Packaging Item
* Alternative Material

---

# ৬. BOM Structure

প্রতিটি BOM-এ থাকবে—

* BOM Code
* BOM Name
* Product
* Recipe
* Version
* Status
* Effective Date

---

# ৭. BOM Components

প্রতিটি Component-এর জন্য থাকবে—

* Inventory Item
* Warehouse
* Quantity
* UOM
* Material Type
* Mandatory / Optional
* Alternative Item
* Remarks

---

# ৮. Material Types

System নিম্নলিখিত Material Type সমর্থন করবে—

* Raw Material
* Packaging Material
* Semi Finished Goods
* Consumables
* Chemicals
* Labels
* Cartons
* Others

---

# ৯. BOM Outputs

প্রতিটি BOM-এর Output থাকবে—

* Finished Goods
* Semi Finished Goods (যদি থাকে)

---

# ১০. Expected Manufacturing Result

প্রতিটি BOM-এ Expected Result নির্ধারণ করা যাবে।

উদাহরণ

| Result         |    Qty |
| -------------- | -----: |
| Finished Goods | 100 kg |
| Expected Loss  |  10 kg |

---

# ১১. Alternative Material

যদি Primary Material না থাকে,

Alternative Material ব্যবহার করা যাবে (Permission অনুযায়ী)।

উদাহরণ

Primary

Teji Chili Grade A

Alternative

Teji Chili Grade B

---

# ১২. Recipe Integration

Flow

```text id="bom001"
Product

↓

Recipe

↓

Formula

↓

BOM
```

Recipe নির্বাচন করলে সেই Recipe-এর BOM ব্যবহার হবে।

---

# ১৩. Formula Integration

Formula নির্ধারণ করবে—

* Ratio
* Percentage

BOM নির্ধারণ করবে—

* Inventory Item
* Quantity

---

# ১৪. Production Integration

Production Order তৈরির সময়—

System BOM থেকে

* Material Issue
* Packaging Issue
* Inventory Consumption

তৈরি করবে।

---

# ১৫. Inventory Integration

Production শুরু হলে

Inventory থেকে

Raw Material কমবে।

Production শেষ হলে

Finished Goods Inventory বাড়বে।

---

# ১৬. Business Rules

### Rule BOM-001

Approved BOM ছাড়া Production করা যাবে না।

---

### Rule BOM-002

একটি Recipe-এর একাধিক BOM Version থাকতে পারে।

---

### Rule BOM-003

BOM Delete করা যাবে না।

Archived করতে হবে।

---

### Rule BOM-004

সব Component Inventory Item হতে হবে।

---

### Rule BOM-005

সব Material Issue Inventory Ledger-এ সংরক্ষিত হবে।

---

### Rule BOM-006

সব Finished Goods Inventory-তে Receive হবে।

---

# ১৭. সাধারণ ভুল

❌ BOM-এ Raw Material-এর বাজারদর লিখবেন না।

❌ BOM-এ Profit লিখবেন না।

❌ BOM-এ Sales Price লিখবেন না।

এসব Finance Module-এর কাজ।

---

# ১৮. Business Tip

একই Product-এর Organic, Fresh এবং Normal Recipe থাকলে প্রতিটির জন্য আলাদা BOM ব্যবহার করুন।

এতে Material Planning, Costing এবং Inventory অনেক সহজ হবে।

---

# ১৯. Dashboard

Dashboard-এ দেখা যাবে—

* Total BOM
* Active BOM
* Pending Approval
* Latest Version
* Material Count

---

# ২০. Reports

* BOM Register
* Material Requirement
* Component List
* Packaging Requirement
* BOM Version Report
* BOM History

---

# ২১. Related Modules

* Inventory
* Recipe
* Formula
* Production Order
* Manufacturing Ledger
* Costing

---

# ২২. Conclusion

BOM হলো FFME ERP-এর **Production Material Definition Engine**।

এটি নির্ধারণ করে—

* Warehouse থেকে কী বের হবে
* Warehouse-এ কী যোগ হবে
* কোন Inventory Item ব্যবহার হবে
* কত Material লাগবে

BOM নিজে Profit বা Cost নির্ধারণ করে না।

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `03-Recipe.md`
