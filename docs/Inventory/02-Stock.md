# Stock Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Stock

---

# ১. Purpose

Stock Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের প্রতিটি Inventory Item-এর বর্তমান অবস্থা (Current Stock Position) সংরক্ষণ ও প্রদর্শন করা।

Stock Module কোনো Transaction তৈরি করবে না।

এটি শুধুমাত্র Approved Business Transaction-এর ফলাফল (Current Inventory Position) উপস্থাপন করবে।

---

# ২. Business Philosophy

FFME-তে **Stock** এবং **Inventory Ledger** এক জিনিস নয়।

* **Stock** = বর্তমান অবশিষ্ট (Current Balance)
* **Inventory Ledger** = কীভাবে এই Stock তৈরি হয়েছে তার সম্পূর্ণ ইতিহাস

উদাহরণ

```text id="stk001"
Purchase        +100

Sales           -25

Production      -30

Adjustment      +5

--------------------

Current Stock    50
```

Stock Module শুধু **50** দেখাবে।

Ledger Module উপরের সব Transaction দেখাবে।

---

# ৩. Stock Definition

একটি Stock Record নির্ধারিত হবে নিম্নোক্ত উপাদানের সমন্বয়ে—

* Company
* Branch
* Warehouse
* Bin (যদি থাকে)
* Product
* Batch (যদি থাকে)
* Serial Number (যদি থাকে)
* UOM

এই Combination-ই একটি Unique Stock Position।

---

# ৪. Stock Types

FFME নিম্নলিখিত Stock সমর্থন করবে—

* Raw Material
* Packaging Material
* Finished Goods
* Trading Goods
* Work In Progress (WIP)
* Spare Parts
* Consumables
* Scrap
* Returned Stock

---

# ৫. Stock Status

একটি Stock-এর বিভিন্ন অবস্থা থাকতে পারে।

## Available

বিক্রয় বা উৎপাদনের জন্য প্রস্তুত।

---

## Reserved

Sales Order অথবা Production Order-এর জন্য সংরক্ষিত।

---

## Allocated

নির্দিষ্ট Order-এর জন্য বরাদ্দ করা হয়েছে।

---

## In Transit

Warehouse Transfer চলমান।

---

## In Production

Production-এ ব্যবহৃত হচ্ছে।

---

## Quarantine

Quality Check শেষ হয়নি।

---

## Damaged

ক্ষতিগ্রস্ত।

---

## Expired

মেয়াদোত্তীর্ণ।

---

## Blocked

ব্যবহার নিষিদ্ধ।

---

# ৬. Stock Information

প্রতিটি Stock Record-এ থাকবে—

* Product Code
* Product Name
* Warehouse
* Bin Location
* Batch Number
* Serial Number
* Quantity
* Reserved Quantity
* Available Quantity
* UOM
* Unit Cost
* Total Value
* Status

---

# ৭. Available Stock Formula

```text id="stk002"
Available Stock

=

Current Stock

-

Reserved Stock

-

Allocated Stock
```

Available Stock-ই Sales এবং Production ব্যবহার করবে।

---

# ৮. Negative Stock

System Configuration অনুযায়ী—

* Allow
* Warning
* Block

তিনটি Mode থাকবে।

Default Recommendation:

Negative Stock = Block

---

# ৯. Multi Warehouse Stock

একই Product একাধিক Warehouse-এ থাকতে পারবে।

Example

| Warehouse    | Stock |
| ------------ | ----: |
| Factory      |   500 |
| Distribution |   350 |
| Retail       |   120 |

---

# ১০. Batch Wise Stock

যদি Product Batch Controlled হয়—

Stock Batch অনুযায়ী বিভক্ত থাকবে।

Example

| Batch   | Qty |
| ------- | --: |
| B240701 | 120 |
| B240715 | 300 |

---

# ১১. Serial Controlled Stock

যদি Product Serial Controlled হয়—

প্রতিটি Unit আলাদাভাবে Track হবে।

Example

| Serial |
| ------ |
| SN0001 |
| SN0002 |
| SN0003 |

---

# ১২. Expiry Controlled Stock

Expiry Date অনুযায়ী Stock দেখা যাবে।

System FEFO (First Expired First Out) Strategy সমর্থন করবে।

---

# ১৩. Real-Time Stock

যে মুহূর্তে Transaction Approve হবে—

Stock Update হবে।

No Background Posting.

---

# ১৪. Warehouse Visibility

Role অনুযায়ী—

User নিজের Warehouse-এর Stock দেখতে পারবেন।

Super Admin সব Warehouse দেখতে পারবেন।

---

# ১৫. Stock Freeze

Stock Freeze করা যাবে—

* Audit-এর সময়
* Physical Count-এর সময়
* Year Closing-এর সময়

Freeze অবস্থায় Stock Transaction সীমাবদ্ধ থাকবে (Configuration অনুযায়ী)।

---

# ১৬. Stock Snapshot

System নির্দিষ্ট তারিখে Stock Snapshot সংরক্ষণ করতে পারবে।

Example

* Month End
* Year End
* Audit Date

---

# ১৭. Business Rules

### Rule STK-001

Stock Manual Edit করা যাবে না।

---

### Rule STK-002

Stock শুধুমাত্র Approved Transaction দ্বারা পরিবর্তিত হবে।

---

### Rule STK-003

Available Quantity কখনো Reserved Quantity-এর নিচে যাবে না।

---

### Rule STK-004

Negative Stock System Policy অনুযায়ী নিয়ন্ত্রিত হবে।

---

### Rule STK-005

Batch ও Serial Tracking Product Configuration অনুযায়ী বাধ্যতামূলক হবে।

---

### Rule STK-006

Warehouse অনুযায়ী Stock পৃথকভাবে সংরক্ষিত হবে।

---

### Rule STK-007

Stock Value Inventory Valuation Method অনুযায়ী নির্ধারিত হবে।

---

# ১৮. Dashboard

Dashboard-এ দেখা যাবে—

* Current Stock
* Available Stock
* Reserved Stock
* Damaged Stock
* Expired Stock
* Low Stock
* Overstock

---

# ১৯. Reports

* Current Stock Report
* Warehouse Stock Report
* Product Stock Report
* Batch Stock Report
* Serial Stock Report
* Available Stock Report
* Reserved Stock Report
* Expired Stock Report

---

# ২০. Integration

Stock Module তথ্য গ্রহণ করবে—

* Purchase
* Sales
* Manufacturing
* Warehouse
* Inventory Adjustment
* Inventory Transfer
* Inventory Ledger

নিজে কোনো Transaction তৈরি করবে না।

---

# ২১. Audit Trail

Stock নিজে Audit Record তৈরি করবে না।

সমস্ত Audit Inventory Ledger ও Transaction Module-এ সংরক্ষিত হবে।

---

# ২২. Future Expansion

* RFID Stock Tracking
* IoT Smart Shelf
* AI Stock Prediction
* Live Barcode Scanner
* Warehouse Robot Integration

---

# ২৩. Notes

Stock Relationship

```text id="stk003"
Inventory Ledger

↓

Stock Calculation

↓

Current Stock

↓

Sales / Production / Purchase
```

Stock হলো Inventory-এর বর্তমান অবস্থা, আর Inventory Ledger হলো তার ইতিহাস।

---

# ২৪. Related Documents

* Stock Movement
* Stock Transfer
* Stock Adjustment
* Inventory Ledger
* Warehouse
* Batch
* Serial Number
* Inventory Valuation

---

# ২৫. Conclusion

Stock Module হলো FFME ERP-এর **Real-Time Inventory Position Engine**।

এটি প্রতিষ্ঠানের প্রতিটি পণ্যের বর্তমান অবস্থান, পরিমাণ, মূল্য এবং ব্যবহারযোগ্য স্টক নির্ভুলভাবে প্রদর্শন করবে এবং Purchase, Manufacturing ও Sales Module-এর জন্য নির্ভরযোগ্য Stock Source হিসেবে কাজ করবে।

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `03-Stock-Movement.md`
