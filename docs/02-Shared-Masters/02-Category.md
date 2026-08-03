# Category Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Shared Master Architecture

**Module:** Category Management

---

# ১. Purpose

Category Module-এর উদ্দেশ্য হলো FFME ERP-তে সকল Product, Service, Asset, Business Partner এবং অন্যান্য Master Data-কে একটি সংগঠিত Classification Structure-এর মাধ্যমে পরিচালনা করা।

Category ব্যবহার করে—

* Product Organization
* Inventory Control
* Purchase Planning
* Sales Analysis
* Manufacturing Planning
* Reporting
* Business Intelligence

সহজ করা হবে।

---

# ২. Definition

Category হলো একটি Classification Framework যার মাধ্যমে একই ধরনের Item বা Entity-কে একটি Group-এর অধীনে পরিচালনা করা হয়।

FFME-তে Category একটি Shared Master Entity।

---

# ৩. Category Architecture

```text id="cat001"
Category Master

        │

        ├── Product Category

        ├── Raw Material Category

        ├── Service Category

        ├── Asset Category

        ├── Expense Category

        └── Business Category
```

---

# ৪. Category Hierarchy

FFME Multi-Level Category Support করবে।

Structure:

```text id="cat002"
Main Category

        ↓

Sub Category

        ↓

Child Category

        ↓

Item
```

---

## Example: Spice Product

```text id="cat003"
Food Product

        ↓

Spice

        ↓

Powder Spice

        ↓

Turmeric Powder
```

---

# ৫. Category Types

FFME বিভিন্ন ধরনের Category পরিচালনা করবে।

---

# ৫.১ Product Category

Product Classification-এর জন্য।

Example:

```text id="cat004"
Food Product

├── Spice

│     ├── Turmeric

│     ├── Chili

│     └── Coriander

│

└── Grocery

      ├── Rice

      └── Oil
```

---

# ৫.২ Raw Material Category

Manufacturing Input Classification।

Example:

* Raw Spice
* Packaging Material
* Chemical
* Additive

---

# ৫.৩ Finished Goods Category

Production Output Classification।

Example:

* Branded Spice
* Packaged Food
* Ready Product

---

# ৫.৪ Service Category

Service Classification।

Example:

* Transport Service
* Maintenance Service
* Consultancy

---

# ৫.৫ Asset Category

Fixed Asset Classification।

Example:

```text id="cat005"
Asset

├── Machine

├── Vehicle

├── Computer

└── Furniture
```

---

# ৫.৬ Expense Category

Expense Control-এর জন্য।

Example:

```text id="cat006"
Expense

├── Salary

├── Rent

├── Transport

├── Marketing

└── Utility
```

---

# ৫.৭ Business Category

Business Partner Classification-এর জন্য।

Example:

* Retail Business
* Wholesale Business
* Manufacturing Business
* Service Business

---

# ৬. Category Attributes

প্রতিটি Category-এর থাকবে—

---

## Basic Information

* Category Code
* Category Name
* Description
* Category Type
* Parent Category
* Status

---

## Control Information

* Level
* Sort Order
* Default Unit
* Applicable Module

---

# ৭. Category Relationship

Category বিভিন্ন Module-এর সাথে সম্পর্কিত হবে।

---

## Product

```text id="cat007"
Category

↓

Product

↓

Inventory

↓

Sales
```

---

## Purchase

```text id="cat008"
Category

↓

Raw Material

↓

Supplier

↓

Purchase
```

---

## Manufacturing

```text id="cat009"
Category

↓

Raw Material

↓

BOM

↓

Production
```

---

# ৮. Category and Multi-UOM

Category অনুযায়ী Default UOM নির্ধারণ করা যাবে।

Example:

```text id="cat010"
Raw Material

Spice

↓

Purchase UOM

Kg


Stock UOM

Gram
```

---

# ৯. Category and Pricing

Category অনুযায়ী Pricing Policy ব্যবহার করা যাবে।

Example:

```text id="cat011"
Category

Premium Spice


Pricing

Premium Price Level
```

---

# ১০. Category and Reporting

Category ভিত্তিক রিপোর্ট তৈরি করা যাবে।

---

## Sales Analysis

* Category Wise Sales
* Category Growth
* Category Profit

---

## Inventory Analysis

* Category Wise Stock
* Stock Value
* Slow Moving Item

---

## Purchase Analysis

* Category Wise Purchase
* Supplier Performance

---

# ১১. Category Rules

### Rule 001

প্রতিটি Item অবশ্যই একটি Category-এর অধীনে থাকবে।

---

### Rule 002

Category Hierarchy Maintain করতে হবে।

---

### Rule 003

Category Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 004

Parent Category পরিবর্তনের History সংরক্ষণ করতে হবে।

---

### Rule 005

একই Level-এ Duplicate Category Name অনুমোদিত নয়।

---

### Rule 006

Category বিভিন্ন Module Share করতে পারবে।

---

# ১২. Category Status

Category Status:

* Active
* Inactive

---

Inactive Category:

* নতুন Item-এর জন্য ব্যবহার করা যাবে না।
* পুরাতন Transaction-এ দেখা যাবে।

---

# ১৩. Audit Trail

Category সম্পর্কিত সকল পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Category Created
* Category Updated
* Parent Changed
* Status Changed

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ১৪. Reports

## Category Reports

* Category Tree Report
* Item Count By Category
* Sales By Category
* Purchase By Category
* Stock By Category

---

# ১৫. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* AI Category Suggestion
* Automatic Product Classification
* Industry Standard Category Mapping
* Barcode Category Mapping
* Category Profit Analysis

---

# ১৬. Notes

FFME Architecture-এ—

| Entity        | Purpose               |
| ------------- | --------------------- |
| Category      | Classification        |
| Product       | Sell/Produce Item     |
| Business Type | Business Nature       |
| Business Role | Business Relationship |
| UOM           | Measurement           |
| Territory     | Geographic Control    |

Category এবং Product একই বিষয় নয়।

Product Category-এর অধীনে থাকে।

---

# ১৭. Related Documents

* Architecture.md
* ADR-0003 Shared Masters
* ADR-0006 Multi-UOM
* Business Type
* Product
* Inventory
* Purchase
* Sales
* Manufacturing
* Asset

---

# ১৮. Conclusion

Category Module FFME ERP-এর Classification Backbone।

এর মাধ্যমে—

* Product Management
* Inventory Control
* Manufacturing Planning
* Purchase Analysis
* Sales Reporting

একটি Standard Structure-এর মাধ্যমে পরিচালনা করা যাবে।

FFME-তে Category হলো:

**Master Data → Classification → Business Intelligence**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `03-UOM.md`
