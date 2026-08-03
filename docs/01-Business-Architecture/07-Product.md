# Product

**Document:** Business Architecture

**Version:** 1.0.0 (Draft)

**Status:** Draft

**Owner:** FFME Core Team

**Parent Entity:** Company

**Module:** Product Management (Item Master)

---

# ১. উদ্দেশ্য (Purpose)

Product Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের সকল ধরনের বিক্রয়যোগ্য পণ্য, কাঁচামাল, উৎপাদিত পণ্য, প্যাকেজিং উপকরণ, সার্ভিস এবং অন্যান্য Inventory Item-কে একটি কেন্দ্রীয় Master Data হিসেবে পরিচালনা করা।

FFME-তে Product শুধুমাত্র বিক্রির পণ্য নয়, বরং এটি Inventory, Manufacturing, Purchase, Sales এবং Finance-এর মূল ভিত্তি।

---

# ২. সংজ্ঞা (Definition)

Product হলো এমন একটি Item যা প্রতিষ্ঠানের ব্যবসায়িক কার্যক্রমে ব্যবহৃত হয়।

এটি হতে পারে—

* Raw Material
* Packaging Material
* Finished Product
* Semi Finished Product
* Trading Product
* Service
* Spare Part
* Asset Item (Future)

---

# ৩. Product Types

FFME নিম্নলিখিত Product Type সমর্থন করবে।

## Raw Material

উৎপাদনের জন্য ব্যবহৃত কাঁচামাল।

উদাহরণ:

* শুকনা মরিচ
* হলুদ
* ধনিয়া
* জিরা

---

## Packaging Material

উৎপাদনে ব্যবহৃত প্যাকেজিং।

উদাহরণ:

* পাউচ
* জার
* লেবেল
* কার্টন

---

## Finished Product

বিক্রির জন্য প্রস্তুত পণ্য।

উদাহরণ:

* FoodForest মরিচ গুঁড়া ২০০ গ্রাম

---

## Semi Finished Product

যা এখনও উৎপাদন সম্পূর্ণ হয়নি।

---

## Trading Product

যে পণ্য কিনে বিক্রি করা হয়।

---

## Service

যে Item Stock হয় না।

উদাহরণ:

* Installation
* Repair
* Delivery Charge

---

# ৪. Product Profile

প্রতিটি Product-এর থাকবে—

## Basic Information

* Product Name
* Short Name
* Product Code
* SKU
* Barcode
* QR Code

---

## Classification

* Category
* Sub Category
* Brand
* Product Type

---

## Status

* Active
* Inactive
* Discontinued

---

# ৫. Unit of Measure (UOM)

একটি Product-এর একাধিক Unit থাকতে পারে।

উদাহরণ:

Primary Unit

* Kg

Secondary Unit

* Gram

Packaging Unit

* Packet

Carton Unit

* Carton

---

## Unit Conversion

উদাহরণ

```text
১ Carton = ২৪ Packet

১ Packet = ২০০ Gram

১০০০ Gram = ১ Kg
```

System স্বয়ংক্রিয়ভাবে Conversion করবে।

---

# ৬. Product Variant

একই Product-এর একাধিক Variant থাকতে পারে।

উদাহরণ

FoodForest মরিচ গুঁড়া

* ৫০ গ্রাম
* ১০০ গ্রাম
* ২০০ গ্রাম
* ৫০০ গ্রাম
* ১ কেজি

সব Variant একই Parent Product-এর অধীনে থাকবে।

---

# ৭. Batch Management

Batch ভিত্তিক Product সমর্থন করবে।

প্রতিটি Batch-এর থাকবে—

* Batch Number
* Manufacturing Date
* Expiry Date
* Quantity
* Cost

---

# ৮. Expiry Management

বিশেষ করে—

* Food
* Medicine
* Cosmetic

এর জন্য।

System Alert দিবে—

* Near Expiry
* Expired Stock

---

# ৯. Pricing

একটি Product-এর একাধিক Price থাকবে।

* Purchase Price
* Cost Price
* Distributor Price
* Wholesale Price
* Retail Price
* Promotional Price

---

# ১০. Product Costing

System Costing সমর্থন করবে।

* Standard Cost
* Average Cost
* FIFO
* Weighted Average

(FIFO ও Weighted Average ভবিষ্যৎ সংস্করণে)

---

# ১১. Manufacturing Information

যদি Product উৎপাদিত হয়—

তাহলে থাকবে—

* Recipe / BOM
* Yield
* Production Time
* Quality Standard

---

# ১২. Inventory Rules

প্রতিটি Product-এর জন্য নির্ধারণ করা যাবে—

* Minimum Stock
* Maximum Stock
* Reorder Level
* Safety Stock

---

# ১৩. Tax Information

Product অনুযায়ী—

* VAT
* Tax
* Tax Exempt

নির্ধারণ করা যাবে।

---

# ১৪. Financial Information

প্রতিটি Product-এর সাথে Accounting Mapping থাকবে।

* Inventory Asset Account
* COGS Account
* Sales Account
* Purchase Account

---

# ১৫. Warehouse Relationship

একটি Product একাধিক Warehouse-এ থাকতে পারে।

Warehouse অনুযায়ী দেখা যাবে—

* Quantity
* Value
* Reserved Quantity
* Available Quantity

---

# ১৬. Reports

* Product List
* Category Report
* Brand Report
* Stock Report
* Batch Report
* Expiry Report
* Slow Moving Product
* Fast Moving Product

---

# ১৭. Business Rules

### Rule 001

প্রতিটি Product-এর একটি Primary Unit থাকতে হবে।

### Rule 002

একটি Product একাধিক Warehouse-এ থাকতে পারবে।

### Rule 003

একটি Product-এর Product Code ও SKU Unique হবে।

### Rule 004

Inactive Product নতুন Transaction-এ ব্যবহার করা যাবে না।

### Rule 005

Batch Required Product Batch ছাড়া Receive বা Sale করা যাবে না।

---

# ১৮. Future Expansion

* Serial Number Tracking
* Color & Size Matrix
* Product Image Gallery
* AI Demand Forecast
* GS1 Barcode
* RFID Support
* Nutritional Information
* Multi Language Product

---

# ১৯. উপসংহার

Product Module হলো FFME-এর Master Data-এর অন্যতম গুরুত্বপূর্ণ অংশ।

Manufacturing, Inventory, Sales, Purchase এবং Finance—সব Module এই Product Architecture-এর উপর নির্ভর করবে।

এই Architecture এমনভাবে ডিজাইন করা হয়েছে যাতে একই Product Engine ব্যবহার করে Manufacturing, Wholesale, Distribution, Retail এবং Service Business পরিচালনা করা যায়।

---

**Document Status:** Draft v1.0

**Next Document:** `07-Customer.md`
