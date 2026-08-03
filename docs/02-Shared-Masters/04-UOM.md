# Unit of Measure (UOM)

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Shared Master Architecture

**Module:** Unit of Measure (UOM)

---

# ১. Purpose

Unit of Measure (UOM) Module-এর উদ্দেশ্য হলো FFME ERP-তে সকল Product, Raw Material, Finished Goods, Inventory, Purchase, Sales, Manufacturing এবং Logistics-এর Measurement System একটি Standard Framework-এর মাধ্যমে পরিচালনা করা।

FFME-এর প্রতিটি Quantity Transaction UOM-এর উপর ভিত্তি করে পরিচালিত হবে।

---

# ২. Definition

Unit of Measure (UOM) হলো কোনো Item-এর পরিমাপের একক।

উদাহরণ:

* Kg
* Gram
* Piece
* Packet
* Carton
* Bottle
* Liter

FFME-তে UOM একটি Shared Master Entity।

---

# ৩. UOM Architecture

```text id="uom001"
UOM Master

      │

      ├── Base UOM

      ├── Purchase UOM

      ├── Sales UOM

      ├── Manufacturing UOM

      └── Inventory UOM
```

---

# ৪. UOM Philosophy

FFME **Multi-UOM Architecture** অনুসরণ করবে।

প্রতিটি Product-এর একটি Base UOM থাকবে।

অন্যান্য সকল UOM Base UOM-এ Convert হবে।

উদাহরণ:

```text id="uom002"
Base UOM

Gram

↓

1000 Gram

=

1 Kg
```

---

# ৫. Standard UOM Types

## Weight

* Milligram (mg)
* Gram (g)
* Kilogram (kg)
* Metric Ton (MT)

---

## Volume

* Milliliter (ml)
* Liter (L)

---

## Quantity

* Piece (Pcs)
* Unit
* Pair
* Set

---

## Packaging

* Sachet
* Packet
* Box
* Carton
* Bag
* Drum
* Bottle
* Jar

---

## Length

* Millimeter
* Centimeter
* Meter
* Foot

---

## Area

* Square Foot
* Square Meter

---

# ৬. Base UOM

Base UOM হলো Inventory-এর মূল একক।

সমস্ত Stock Base UOM-এ সংরক্ষণ করা হবে।

উদাহরণ:

```text id="uom003"
Product

Turmeric Powder

Base UOM

Gram
```

Inventory সবসময় Gram-এ থাকবে, যদিও Purchase Kg-এ এবং Sales Packet-এ হতে পারে।

---

# ৭. Multi-UOM Structure

প্রতিটি Product-এর জন্য একাধিক UOM থাকতে পারে।

```text id="uom004"
Product

Turmeric Powder


Purchase UOM

Kg


Production UOM

Gram


Sales UOM

Packet


Inventory UOM

Gram
```

---

# ৮. UOM Conversion

প্রতিটি UOM Conversion Factor সংরক্ষণ করা হবে।

উদাহরণ:

| From     | To     | Conversion |
| -------- | ------ | ---------: |
| 1 Kg     | Gram   |       1000 |
| 1 Carton | Packet |         24 |
| 1 Packet | Gram   |        100 |
| 1 Bottle | Liter  |          1 |

---

# ৯. Product UOM

প্রতিটি Product-এর থাকবে—

* Base UOM
* Purchase UOM
* Sales UOM
* Production UOM (যদি প্রযোজ্য)

---

## Example

```text id="uom005"
Product

FoodForest Chili Powder


Purchase

25 Kg Bag


Inventory

Gram


Sales

100 Gram Packet
```

---

# ১০. Purchase UOM

Supplier যে এককে Product সরবরাহ করে।

উদাহরণ:

* Kg
* Bag
* Drum
* Carton

Purchase-এর সময় System Base UOM-এ Convert করবে।

---

# ১১. Sales UOM

Customer যে এককে Product ক্রয় করে।

উদাহরণ:

* Packet
* Piece
* Box
* Carton

Sales-এর সময় Stock Base UOM থেকে কমবে।

---

# ১২. Manufacturing UOM

Manufacturing-এর সময় Raw Material এবং Finished Goods-এর জন্য আলাদা UOM ব্যবহার করা যেতে পারে।

উদাহরণ:

```text id="uom006"
Raw Material

25 Kg


Production

25000 Gram


Finished Goods

250 Packet
```

---

# ১৩. Inventory UOM

Inventory সবসময় Base UOM-এ পরিচালিত হবে।

এটি Stock Accuracy নিশ্চিত করবে।

---

# ১৪. UOM Conversion Workflow

```text id="uom007"
Purchase

↓

Purchase UOM

↓

Conversion

↓

Base UOM

↓

Inventory

↓

Sales UOM

↓

Customer
```

---

# ১৫. Packaging Relationship

Packaging UOM Product-এর সাথে সম্পর্কিত থাকবে।

উদাহরণ:

```text id="uom008"
Product

Turmeric Powder


100 Gram Packet


20 Packet

=

1 Carton
```

---

# ১৬. UOM Attributes

প্রতিটি UOM-এর থাকবে—

## Basic Information

* UOM Code
* UOM Name
* Short Name
* Symbol
* Status

---

## Control Information

* Decimal Support
* Conversion Allowed
* Applicable Module

---

# ১৭. Business Rules

### Rule 001

প্রতিটি Product-এর একটি Base UOM বাধ্যতামূলক।

---

### Rule 002

সমস্ত Inventory Base UOM-এ সংরক্ষণ হবে।

---

### Rule 003

Purchase এবং Sales UOM আলাদা হতে পারবে।

---

### Rule 004

Conversion Factor অবশ্যই নির্ধারিত থাকতে হবে।

---

### Rule 005

UOM Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 006

একই Product-এর জন্য Duplicate Conversion অনুমোদিত নয়।

---

### Rule 007

Base UOM পরিবর্তন করলে System Recalculation করতে হবে।

---

# ১৮. Audit Trail

UOM সম্পর্কিত পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* UOM Created
* UOM Updated
* Conversion Changed
* Base UOM Changed
* Status Changed

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ১৯. Reports

## UOM Reports

* UOM List
* Conversion List
* Product UOM Mapping
* Invalid Conversion Report

---

# ২০. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Dynamic Conversion
* Industry Standard UOM Library
* GS1 Standard Integration
* Auto Conversion Engine
* Barcode Based UOM
* AI Conversion Validation

---

# ২১. Notes

FFME Architecture-এ—

| Entity            | Purpose            |
| ----------------- | ------------------ |
| UOM               | Measurement Unit   |
| Base UOM          | Inventory Standard |
| Purchase UOM      | Supplier Unit      |
| Sales UOM         | Customer Unit      |
| Manufacturing UOM | Production Unit    |
| Conversion        | Unit Relationship  |

Multi-UOM Architecture-এর মাধ্যমে একই Product বিভিন্ন এককে ক্রয়, উৎপাদন এবং বিক্রয় করা সম্ভব, কিন্তু Inventory সবসময় Base UOM-এ থাকবে।

---

# ২২. Related Documents

* Architecture.md
* ADR-0006 Multi-UOM
* Category
* Brand
* Product
* Purchase
* Sales
* Inventory
* Manufacturing
* Warehouse

---

# ২৩. Conclusion

UOM Module হলো FFME ERP-এর Measurement Backbone।

এই Module-এর মাধ্যমে—

* Multi-UOM Support
* Accurate Inventory
* Purchase & Sales Conversion
* Manufacturing Consistency
* Standard Reporting

একটি একীভূত ERP Framework-এর মাধ্যমে পরিচালিত হবে।

FFME-তে UOM হলো:

**Measurement Standard → Quantity Control → Inventory Accuracy**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `05-Currency.md`
