# Expiry Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Expiry Management

---

# ১. Purpose

Expiry Management Module-এর উদ্দেশ্য হলো যেসব পণ্যের নির্দিষ্ট মেয়াদ (Shelf Life) রয়েছে, সেগুলোর উৎপাদনের তারিখ, Best Before Date, Expiry Date এবং অবশিষ্ট Shelf Life সম্পূর্ণভাবে নিয়ন্ত্রণ করা।

এই Module মূলত—

* Food
* Beverage
* Medicine
* Cosmetics
* Chemical
* Fertilizer
* Seed
* Dairy
* Frozen Food

জাতীয় পণ্যের জন্য অত্যন্ত গুরুত্বপূর্ণ।

---

# ২. Business Philosophy

Expiry Date কখনো Product-এর নয়।

**Expiry Date সবসময় Batch-এর বৈশিষ্ট্য।**

অর্থাৎ—

একই Product-এর বিভিন্ন Batch-এর Expiry Date ভিন্ন হতে পারে।

Example

```text id="exp001"
FoodForest Turmeric Powder

Batch-240701

Expiry = 2027-07-01

----------------------

Batch-240801

Expiry = 2027-08-01
```

---

# ৩. Expiry Information

প্রতিটি Expiry Controlled Batch-এর থাকবে—

* Manufacturing Date
* Packing Date
* Best Before Date
* Expiry Date
* Shelf Life
* Remaining Days

---

# ৪. Shelf Life

Shelf Life নির্ধারণ করা যাবে—

### Product Wise

যেমন—

Turmeric Powder

Shelf Life = 24 Months

---

### Batch Wise

বিশেষ ক্ষেত্রে Batch অনুযায়ী পরিবর্তন করা যাবে।

---

# ৫. Product Categories

Expiry Management সমর্থন করবে—

* Raw Material
* Packaging Material (যদি প্রযোজ্য)
* Finished Goods
* Trading Goods

সব Product-এর Expiry বাধ্যতামূলক নয়।

---

# ৬. Expiry Status

System স্বয়ংক্রিয়ভাবে Status নির্ধারণ করবে।

সম্ভাব্য Status—

* Fresh
* Normal
* Near Expiry
* Expired
* Blocked
* Disposed

---

# ৭. Near Expiry

Configuration অনুযায়ী—

Expiry-এর নির্দিষ্ট দিন আগে System Warning দেবে।

উদাহরণ

```text id="exp002"
Expiry

=

30 Days Remaining

↓

Near Expiry
```

এই Limit Product অনুযায়ী পরিবর্তনযোগ্য হবে।

---

# ৮. Expired Stock

Expired Batch-এর ক্ষেত্রে Configuration অনুযায়ী—

* Sales Block
* Production Block
* Transfer Block

করা যাবে।

---

# ৯. FEFO

Expiry Controlled Product-এর Default Issue Policy হবে—

**FEFO (First Expired First Out)**

অর্থাৎ—

যে Batch আগে Expire হবে,

System সেটিই আগে Issue করার পরামর্শ দেবে।

Configuration অনুযায়ী—

FIFO

সমর্থিত হবে।

---

# ১০. Expiry Alerts

System Alert পাঠাবে—

* Dashboard
* Notification
* Email
* Mobile App (Future)

---

# ১১. Expiry Workflow

```text id="exp003"
Manufacturing

↓

Warehouse

↓

Available

↓

Near Expiry

↓

Expired

↓

Dispose / Return
```

---

# ১২. Discount Before Expiry

Configuration অনুযায়ী—

Near Expiry Product-এর জন্য

Promotion বা Discount চালু করা যাবে।

এটি Pricing ও Promotion Module-এর সাথে Integrated থাকবে।

---

# ১৩. Expired Product Disposal

Expired Product-এর জন্য—

* Destroy
* Return to Supplier
* Reprocess
* Donation (Policy অনুযায়ী)
* Write-off

সমর্থিত হবে।

---

# ১৪. Quality Control

Quality Module কোনো Batch Reject করলে—

সেটি Quarantine-এ যাবে।

Expiry Management সেই Batch-ও পর্যবেক্ষণ করবে।

---

# ১৫. Business Rules

### Rule EXP-001

Expiry Date Batch ভিত্তিক হবে।

---

### Rule EXP-002

Expired Batch Default অবস্থায় Sales করা যাবে না।

---

### Rule EXP-003

Near Expiry Alert Configuration অনুযায়ী হবে।

---

### Rule EXP-004

FEFO হবে Default Issue Strategy।

---

### Rule EXP-005

Expired Stock Delete করা যাবে না।

---

### Rule EXP-006

Expired Stock Disposal Transaction বাধ্যতামূলক।

---

### Rule EXP-007

Expiry Date পরিবর্তন করার জন্য বিশেষ Permission লাগবে।

---

# ১৬. Dashboard

Dashboard-এ দেখা যাবে—

* Near Expiry Products
* Expired Products
* Expiry This Month
* Expiry Next Month
* Warehouse Wise Expiry
* Batch Wise Expiry

---

# ১৭. Reports

* Expiry Register
* Near Expiry Report
* Expired Stock Report
* Product Expiry Report
* Batch Expiry Report
* Warehouse Expiry Report
* Disposal Report

---

# ১৮. Integration

Expiry Module তথ্য গ্রহণ করবে—

* Batch
* Inventory
* Warehouse
* Manufacturing
* Purchase

এবং তথ্য প্রদান করবে—

* Sales
* Production
* Promotion
* Pricing
* Inventory Analytics
* Quality Control

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* Batch Created
* Expiry Updated
* Near Expiry Alert
* Expired
* Blocked
* Disposed
* Returned

Delete অনুমোদিত নয়।

---

# ২০. Future Expansion

* AI Shelf Life Prediction
* Temperature-Based Expiry
* IoT Cold Storage Monitoring
* Smart Expiry Notification
* Dynamic FEFO Optimization

---

# ২১. Notes

Expiry Relationship

```text id="exp004"
Product

↓

Batch

↓

Manufacturing Date

↓

Expiry Date

↓

FEFO

↓

Sales / Disposal
```

Expiry সবসময় Batch-এর বৈশিষ্ট্য।

---

# ২২. Related Documents

* Batch
* Stock
* Stock Movement
* Warehouse
* Promotion
* Pricing
* Quality Control
* Inventory Ledger

---

# ২৩. Conclusion

Expiry Management Module হলো FFME ERP-এর **Shelf Life & Product Freshness Control Engine**।

এর মাধ্যমে—

* Batch Expiry Tracking
* FEFO Inventory Control
* Near Expiry Alerts
* Expired Stock Blocking
* Safe Product Distribution

নিশ্চিত করা হবে।

FFME-তে Expiry Management হলো—

**Manufacture → Batch → Shelf Life → FEFO → Expiry → Disposal**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `10-Reorder-Level.md`
