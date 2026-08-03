# Goods Receive Note (GRN) Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Goods Receive Note (GRN)

---

# ১. Purpose

Goods Receive Note (GRN) Module-এর উদ্দেশ্য হলো Supplier কর্তৃক সরবরাহকৃত পণ্য বাস্তবে Warehouse-এ গ্রহণ, যাচাই, পরিমাণ নিশ্চিতকরণ, Quality Inspection এবং Inventory-তে গ্রহণের পূর্ববর্তী ধাপ পরিচালনা করা।

GRN হলো Buyer-এর পক্ষ থেকে একটি **Receiving Confirmation**।

এটি Supplier Invoice নয় এবং Purchase সম্পন্ন হওয়ারও শেষ ধাপ নয়।

---

# ২. Business Philosophy

Purchase Order মানে Supplier-কে অর্ডার দেওয়া হয়েছে।

GRN মানে বাস্তবে মাল এসে পৌঁছেছে।

FFME-তে মাল না আসা পর্যন্ত Purchase সম্পূর্ণ হবে না।

---

# ৩. Business Flow

```text id="grn001"
Purchase Order

↓

Supplier Delivery

↓

Goods Receive Note (GRN)

↓

Quality Inspection

↓

Accepted Stock

↓

Purchase Invoice

↓

Supplier Payment
```

---

# ৪. GRN Definition

Goods Receive Note হলো Warehouse বা Receiving Department কর্তৃক প্রস্তুতকৃত একটি Document, যা নিশ্চিত করে—

* মাল এসেছে
* কত এসেছে
* কী অবস্থায় এসেছে
* কোথায় সংরক্ষণ করা হয়েছে

---

# ৫. GRN Sources

GRN তৈরি হতে পারে—

* Purchase Order
* Import Shipment
* Transfer Receiving
* Contract Purchase
* Emergency Purchase (Permission Required)

---

# ৬. GRN Profile

## Basic Information

* GRN Number
* GRN Date
* Purchase Order
* Supplier
* Warehouse

---

## Delivery Information

* Delivery Challan No
* Vehicle Number
* Driver
* Delivery Date
* Receiving Date

---

## Receiver Information

* Received By
* Checked By
* Approved By

---

# ৭. Product Information

প্রতিটি Line-এ থাকবে—

* Product
* Ordered Quantity
* Delivered Quantity
* Accepted Quantity
* Rejected Quantity
* UOM
* Batch/Lot
* Expiry Date (যদি প্রযোজ্য)

---

# ৮. Partial Receiving

একটি Purchase Order একাধিক GRN-এ Receive করা যাবে।

Example

PO

1000 Kg

↓

GRN-1

300 Kg

↓

GRN-2

400 Kg

↓

GRN-3

300 Kg

↓

PO Completed

---

# ৯. Over Delivery

Supplier যদি PO-এর চেয়ে বেশি Product পাঠায়—

System Permission অনুযায়ী—

* Accept
* Reject
* Pending Approval

করবে।

---

# ১০. Short Delivery

যদি কম Product আসে—

Remaining Quantity Purchase Order-এ Pending থাকবে।

---

# ১১. Quality Inspection

GRN-এর পরে Quality Inspection হতে পারে।

Result

* Accepted
* Partially Accepted
* Rejected
* Hold

---

# ১২. Damage Handling

Receive করার সময় Damage পাওয়া গেলে—

প্রতিটি Product-এর জন্য Damage Quantity সংরক্ষণ হবে।

Damage Reason

* Broken
* Wet
* Expired
* Wrong Product
* Packaging Damage
* Quality Issue

---

# ১৩. Batch & Lot Tracking

যেসব Product Batch ভিত্তিক—

GRN-এ Batch Number সংরক্ষণ বাধ্যতামূলক।

---

# ১৪. Expiry Management

যেসব Product Expiry ভিত্তিক—

GRN-এ Expiry Date সংরক্ষণ হবে।

---

# ১৫. Warehouse Allocation

একটি GRN-এর Product এক বা একাধিক Warehouse Bin-এ সংরক্ষণ করা যাবে।

---

# ১৬. Inventory Integration

গুরুত্বপূর্ণ Business Rule

Accepted Quantity-ই Inventory বৃদ্ধি করবে।

Rejected Quantity Inventory-তে যোগ হবে না।

---

# ১৭. Purchase Integration

GRN Purchase সম্পূর্ণ করবে না।

Purchase তখনই সম্পূর্ণ হবে যখন—

* GRN Complete
* Supplier Invoice Received
* Purchase Confirmed

---

# ১৮. Finance Integration

Accounting Policy অনুযায়ী—

GRN থেকে Stock Value Update হতে পারে।

কিন্তু Supplier Payable তৈরি হবে Supplier Invoice থেকে।

---

# ১৯. Manufacturing Integration

Raw Material Accepted হওয়ার পর Production Planning-এ Available হবে।

Rejected Material Production-এ ব্যবহার করা যাবে না।

---

# ২০. Status

সম্ভাব্য Status

* Draft
* Receiving
* Partially Received
* Fully Received
* Under Inspection
* Accepted
* Rejected
* Closed
* Cancelled

---

# ২১. Business Rules

### Rule GRN-001

Approved Purchase Order ছাড়া সাধারণ GRN তৈরি করা যাবে না (Emergency ব্যতীত)।

---

### Rule GRN-002

Accepted Quantity Inventory-তে যোগ হবে।

---

### Rule GRN-003

Rejected Quantity Inventory-তে যোগ হবে না।

---

### Rule GRN-004

একটি PO থেকে একাধিক GRN তৈরি করা যাবে।

---

### Rule GRN-005

GRN Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule GRN-006

Quality Inspection Required হলে Inspection Complete না হওয়া পর্যন্ত Product Production-এ ব্যবহার করা যাবে না।

---

### Rule GRN-007

Batch ও Expiry ভিত্তিক Product-এর ক্ষেত্রে Batch Information বাধ্যতামূলক।

---

# ২২. Reports

* GRN Register
* Pending GRN
* Partial Receiving Report
* Damage Report
* Rejected Product Report
* Supplier Delivery Report
* Warehouse Receiving Report
* Batch Receiving Report

---

# ২৩. Audit Trail

সংরক্ষণ হবে—

* GRN Created
* Product Received
* Quantity Updated
* Quality Inspection
* Accepted
* Rejected
* Warehouse Allocation
* GRN Closed

---

# ২৪. Future Expansion

* Barcode Receiving
* QR Receiving
* Mobile GRN
* IoT Warehouse Integration
* RFID Receiving
* Photo Attachment
* Electronic Signature

---

# ২৫. Notes

FFME Receiving Model

```text id="grn002"
Purchase Order

↓

Goods Receive Note

↓

Quality Inspection

↓

Inventory

↓

Purchase Invoice
```

GRN হলো Warehouse-এর Confirmation।

এটি Purchase Order এবং Purchase Invoice-এর মধ্যে সংযোগকারী Document।

---

# ২৬. Related Documents

* Purchase Order
* Purchase
* Supplier
* Warehouse
* Inventory
* Quality Control
* Batch
* Purchase Invoice
* Purchase Return

---

# ২৭. Conclusion

GRN Module হলো FFME ERP-এর Warehouse Receiving Engine।

এর মাধ্যমে—

* Accurate Receiving
* Inventory Accuracy
* Quality Control
* Batch Tracking
* Damage Recording

নিশ্চিত করা হবে।

FFME-তে GRN হলো:

**Supplier Delivery → Warehouse Verification → Inventory Acceptance**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `07-Purchase.md`
