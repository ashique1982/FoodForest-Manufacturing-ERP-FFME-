# Stock Movement

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Stock Movement

---

# ১. Purpose

Stock Movement Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের Inventory-এর প্রতিটি Movement বা চলাচলকে সঠিকভাবে রেকর্ড, ট্র্যাক এবং বিশ্লেষণ করা।

Stock Movement কোনো Stock Balance সংরক্ষণ করে না।

এটি শুধুমাত্র Stock কোথা থেকে কোথায়, কেন এবং কত পরিমাণ পরিবর্তিত হয়েছে তা সংরক্ষণ করে।

---

# ২. Business Philosophy

FFME-তে প্রতিটি Stock পরিবর্তনের একটি কারণ (Reason) এবং একটি Source Document থাকবে।

কোনো Stock Movement Source Document ছাড়া তৈরি করা যাবে না (বিশেষ Configuration ব্যতীত)।

---

# ৩. Stock Movement Definition

Stock Movement হলো—

> Inventory Quantity-এর যেকোনো বৃদ্ধি, হ্রাস অথবা অবস্থান পরিবর্তন।

---

# ৪. Stock Movement Types

## Stock In

Stock বৃদ্ধি

উৎস

* Opening Balance
* Purchase
* Production Output
* Sales Return
* Customer Return
* Stock Adjustment (+)
* Warehouse Transfer In
* Import Purchase
* Contract Purchase Receive

---

## Stock Out

Stock হ্রাস

উৎস

* Sales
* Production Consumption
* Purchase Return
* Supplier Return
* Damage
* Expired Disposal
* Stock Adjustment (-)
* Warehouse Transfer Out
* Sample Issue

---

## Stock Move

Quantity অপরিবর্তিত থাকবে।

শুধু Location পরিবর্তন হবে।

উদাহরণ

Warehouse-A

↓

Warehouse-B

---

# ৫. Source Transactions

Stock Movement তৈরি হবে—

* Purchase
* Goods Receive Note
* Sales
* Delivery
* Sales Return
* Purchase Return
* Production
* Stock Transfer
* Stock Adjustment
* Stock Take
* Import Purchase
* Contract Purchase

---

# ৬. Movement Information

প্রতিটি Movement-এ থাকবে—

* Movement Number
* Date & Time
* Company
* Branch
* Warehouse
* Product
* Batch
* Serial Number
* Quantity
* UOM
* Direction (IN / OUT / MOVE)
* Source Module
* Source Document
* Reference Number
* User
* Status

---

# ৭. Movement Direction

Possible Values

* IN
* OUT
* MOVE

---

# ৮. Warehouse Movement

এক Warehouse থেকে অন্য Warehouse-এ Movement হলে—

দুটি Movement তৈরি হবে।

Example

```text id="sm001"
Warehouse-A

OUT

↓

Warehouse-B

IN
```

---

# ৯. Batch Movement

যদি Product Batch Controlled হয়—

প্রতিটি Batch আলাদাভাবে Track হবে।

---

# ১০. Serial Movement

Serial Controlled Product-এর ক্ষেত্রে—

প্রতিটি Serial আলাদাভাবে Movement History সংরক্ষণ করবে।

---

# ১১. Expiry Movement

Expiry Product-এর ক্ষেত্রে—

Movement-এর সাথে Expiry Date সংরক্ষিত হবে।

---

# ১২. Cost Information

Movement Cost সংরক্ষণ হবে।

Fields

* Unit Cost
* Total Cost
* Landed Cost (যদি প্রযোজ্য)

---

# ১৩. Reference Documents

প্রতিটি Movement অবশ্যই একটি Reference বহন করবে।

উদাহরণ

* Purchase No
* Sales No
* Production No
* Transfer No
* Adjustment No

---

# ১৪. Movement Status

সম্ভাব্য Status

* Draft
* Pending Approval
* Approved
* Posted
* Cancelled
* Reversed

---

# ১৫. Reverse Movement

ভুল Movement হলে—

Original Movement পরিবর্তন করা যাবে না।

বরং একটি Reverse Movement তৈরি হবে।

উদাহরণ

```text id="sm002"
OUT

↓

Reverse

↓

IN
```

এতে Audit Trail অক্ষুণ্ণ থাকবে।

---

# ১৬. Business Rules

### Rule SM-001

Approved Transaction ছাড়া Stock Movement হবে না।

---

### Rule SM-002

Movement Delete করা যাবে না।

---

### Rule SM-003

ভুল Movement শুধুমাত্র Reverse করা যাবে।

---

### Rule SM-004

প্রতিটি Movement-এর একটি Source Document থাকতে হবে।

---

### Rule SM-005

Warehouse Transfer দুটি Movement তৈরি করবে।

---

### Rule SM-006

Batch এবং Serial Product-এর ক্ষেত্রে Movement History বাধ্যতামূলক।

---

### Rule SM-007

Cancelled Movement Stock Balance পরিবর্তন করবে না।

---

# ১৭. Dashboard

Dashboard-এ দেখা যাবে—

* Today's Stock In
* Today's Stock Out
* Warehouse Movement
* Adjustment Today
* Production Consumption
* Sales Issue

---

# ১৮. Reports

* Stock Movement Register
* Product Movement Report
* Warehouse Movement Report
* Batch Movement Report
* Serial Movement Report
* Daily Movement
* Monthly Movement
* User Wise Movement
* Source Wise Movement

---

# ১৯. Integration

Stock Movement তথ্য গ্রহণ করবে—

* Purchase
* Sales
* Manufacturing
* Warehouse
* Finance
* Inventory Adjustment
* Inventory Transfer

এবং তথ্য প্রদান করবে—

* Stock Module
* Inventory Ledger
* Inventory Analytics
* Inventory Dashboard

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Created
* Approved
* Posted
* Reversed
* Cancelled

কখনো Delete করা যাবে না।

---

# ২১. Future Expansion

* Barcode Movement
* RFID Movement
* Mobile Stock Issue
* GPS Based Warehouse Movement
* AI Movement Pattern Analysis

---

# ২২. Notes

Stock Movement Architecture

```text id="sm003"
Business Transaction

↓

Stock Movement

↓

Inventory Ledger

↓

Current Stock
```

Stock Movement হলো Inventory System-এর Event Layer।

---

# ২৩. Related Documents

* Stock
* Stock Transfer
* Stock Adjustment
* Inventory Ledger
* Warehouse
* Batch
* Serial Number
* Inventory Audit

---

# ২৪. Conclusion

Stock Movement Module হলো FFME ERP-এর **Inventory Transaction Engine**।

এটি প্রতিটি Stock পরিবর্তনের উৎস, কারণ, পরিমাণ, অবস্থান এবং ইতিহাস সংরক্ষণ করবে এবং Inventory-এর পূর্ণ Traceability নিশ্চিত করবে।

FFME-তে Stock Movement হলো—

**Business Transaction → Stock Movement → Inventory Ledger → Current Stock**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `04-Stock-Transfer.md`
