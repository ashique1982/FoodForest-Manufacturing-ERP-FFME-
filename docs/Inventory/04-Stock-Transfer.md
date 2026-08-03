# Stock Transfer Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Stock Transfer

---

# ১. Purpose

Stock Transfer Module-এর উদ্দেশ্য হলো একই Company-এর বিভিন্ন Warehouse, Branch, Store, Bin অথবা Location-এর মধ্যে নিরাপদ ও নিয়ন্ত্রিতভাবে Stock স্থানান্তর (Transfer) করা।

Stock Transfer-এ Inventory-এর মোট পরিমাণ পরিবর্তন হবে না।

শুধুমাত্র Stock-এর অবস্থান (Location Ownership) পরিবর্তন হবে।

---

# ২. Business Philosophy

Stock Transfer কোনো Purchase নয়।

Stock Transfer কোনো Sales নয়।

এটি শুধুমাত্র একটি Internal Inventory Movement।

---

# ৩. Transfer Types

FFME নিম্নলিখিত Transfer সমর্থন করবে—

* Warehouse to Warehouse
* Branch to Branch
* Store to Store
* Factory to Distribution Center
* Distribution Center to Retail Store
* Bin to Bin
* Rack to Rack
* Production Store to Finished Goods Store
* Damage Store Transfer
* Quarantine Store Transfer

---

# ৪. Transfer Workflow

```text id="st001"
Transfer Request

↓

Approval

↓

Stock Issue

↓

In Transit

↓

Stock Receive

↓

Completed
```

---

# ৫. Transfer Document

প্রতিটি Transfer-এর থাকবে—

* Transfer Number
* Transfer Date
* Source Warehouse
* Destination Warehouse
* Requested By
* Approved By
* Transfer Type
* Status

---

# ৬. Transfer Lines

প্রতিটি Line-এ থাকবে—

* Product
* Batch
* Serial Number
* Quantity
* UOM
* Source Bin
* Destination Bin
* Remarks

---

# ৭. Transfer Status

সম্ভাব্য Status

* Draft
* Pending Approval
* Approved
* Issued
* In Transit
* Partially Received
* Received
* Completed
* Cancelled

---

# ৮. Transfer Request

Source Warehouse থেকে Transfer Request তৈরি হবে।

Destination Warehouse Request দেখতে পারবে।

---

# ৯. Approval

Configuration অনুযায়ী Approval লাগতে পারে।

উদাহরণ

* Same Warehouse Bin Transfer → Approval লাগবে না
* Branch Transfer → Approval লাগবে
* Factory Transfer → Manager Approval

---

# ১০. Stock Issue

Approval-এর পরে—

Source Warehouse থেকে Stock Issue হবে।

System—

* Source Stock কমাবে।
* Movement Record তৈরি করবে।
* Status = In Transit

---

# ১১. In Transit Stock

Receive হওয়ার আগ পর্যন্ত Stock থাকবে—

In Transit Status-এ।

এ সময়—

* Source Warehouse-এ থাকবে না।
* Destination Available Stock-এও থাকবে না।

---

# ১২. Stock Receive

Destination Warehouse Receive করলে—

* Available Stock বৃদ্ধি পাবে।
* Transfer Completed হবে।

---

# ১৩. Partial Receive

যদি সব Product Receive না হয়—

Status হবে

Partially Received

বাকি Quantity পরে Receive করা যাবে।

---

# ১৪. Short / Excess Receive

Receive-এর সময়—

* Short Quantity
* Excess Quantity
* Damage

রেকর্ড করা যাবে।

Manager Approval অনুযায়ী সমাধান হবে।

---

# ১৫. Batch Transfer

Batch Controlled Product-এর ক্ষেত্রে—

একই Batch Number বজায় থাকবে।

---

# ১৬. Serial Transfer

Serial Controlled Product-এর ক্ষেত্রে—

প্রতিটি Serial Number Transfer History সংরক্ষণ হবে।

---

# ১৭. Bin Transfer

একই Warehouse-এর ভিতরে—

Bin Change করা যাবে।

উদাহরণ

```text id="st002"
Warehouse-A

Bin-01

↓

Bin-15
```

---

# ১৮. Auto Transfer

Manufacturing Module থেকে—

Finished Goods Receive-এর সময়

Auto Warehouse Transfer হতে পারে।

---

# ১৯. Transfer Restrictions

Transfer Block হবে যদি—

* Available Stock না থাকে।
* Batch Blocked হয়।
* Serial Sold হয়ে যায়।
* Warehouse Locked থাকে।
* Audit চলমান থাকে।

---

# ২০. Business Rules

### Rule STF-001

Transfer Stock Quantity পরিবর্তন করবে না।

---

### Rule STF-002

Transfer দুইটি Inventory Movement তৈরি করবে।

* OUT
* IN

---

### Rule STF-003

Receive হওয়ার আগে Stock In Transit থাকবে।

---

### Rule STF-004

Cancelled Transfer কোনো Stock পরিবর্তন করবে না।

---

### Rule STF-005

Batch ও Serial Product-এর ক্ষেত্রে পূর্ণ Traceability বাধ্যতামূলক।

---

### Rule STF-006

Partial Receive সমর্থিত হবে।

---

### Rule STF-007

Negative Stock Allow হলে তবেই Stock Short অবস্থায় Transfer সম্ভব হবে।

---

# ২১. Dashboard

Dashboard-এ দেখা যাবে—

* Pending Transfer
* In Transit Stock
* Today's Transfer
* Delayed Receive
* Completed Transfer
* Warehouse Wise Transfer

---

# ২২. Reports

* Stock Transfer Register
* Warehouse Transfer Report
* Branch Transfer Report
* In Transit Stock Report
* Pending Transfer Report
* Partial Receive Report
* Product Transfer History
* Batch Transfer Report
* Serial Transfer Report

---

# ২৩. Integration

Stock Transfer Module তথ্য গ্রহণ করবে—

* Inventory
* Warehouse
* Batch
* Serial Number
* Production

এবং তথ্য প্রদান করবে—

* Inventory Ledger
* Stock
* Inventory Analytics
* Finance (যদি Internal Cost Allocation থাকে)

---

# ২৪. Audit Trail

সংরক্ষণ হবে—

* Request Created
* Approved
* Issued
* In Transit
* Received
* Partially Received
* Completed
* Cancelled

---

# ২৫. Future Expansion

* Barcode Transfer
* QR Transfer
* RFID Transfer
* Mobile Warehouse Transfer
* GPS Vehicle Tracking
* Driver Acknowledgement
* Electronic Proof of Delivery (ePOD)

---

# ২৬. Notes

Stock Transfer Architecture

```text id="st003"
Source Warehouse

↓

Issue

↓

In Transit

↓

Receive

↓

Destination Warehouse
```

একটি Transfer কখনো Inventory Quantity পরিবর্তন করে না।

শুধু Inventory Ownership এবং Location পরিবর্তন করে।

---

# ২৭. Related Documents

* Stock
* Stock Movement
* Warehouse
* Bin Location
* Inventory Ledger
* Inventory Audit
* Manufacturing

---

# ২৮. Conclusion

Stock Transfer Module হলো FFME ERP-এর **Internal Inventory Logistics Engine**।

এর মাধ্যমে—

* Warehouse Control
* Branch Transfer
* Bin Management
* In Transit Tracking
* Complete Traceability

নিশ্চিত করা হবে।

FFME-তে Stock Transfer হলো—

**Internal Movement → In Transit → Destination Receive → Inventory Update**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `05-Stock-Adjustment.md`

