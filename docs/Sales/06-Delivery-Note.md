# Delivery Note Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Delivery Note Management

---

# ১. Purpose

Delivery Note Module-এর উদ্দেশ্য হলো Sales থেকে Customer-এর কাছে Product পাঠানোর পূর্বে এবং পাঠানোর সময় একটি আনুষ্ঠানিক Shipment Document তৈরি, নিয়ন্ত্রণ এবং সংরক্ষণ করা।

Delivery Note Warehouse, Delivery এবং Customer Receiving Process-এর প্রধান Supporting Document।

---

# ২. Definition

Delivery Note (DN) হলো এমন একটি Document যা নিশ্চিত করে—

* কোন Customer-এর কাছে
* কোন Product
* কত Quantity
* কোন Warehouse থেকে
* কোন Delivery-এর মাধ্যমে

পাঠানো হয়েছে।

Delivery Note Financial Invoice নয়।

---

# ৩. Delivery Note Philosophy

FFME-তে:

| Document      | Purpose                        |
| ------------- | ------------------------------ |
| Sales         | Financial Transaction          |
| Delivery Note | Product Movement Authorization |
| Delivery      | Physical Delivery Execution    |
| Collection    | Payment Settlement             |

---

# ৪. Delivery Note Architecture

```text id="dn001"
Sales

↓

Delivery Note

↓

Warehouse Picking

↓

Dispatch

↓

Delivery

↓

Customer Receive
```

---

# ৫. Delivery Note Profile

## Basic Information

* Delivery Note Number
* Delivery Date
* Delivery Type
* Status

---

## Sales Reference

* Sales Number
* Sales Order Reference
* Customer
* Distributor

---

## Warehouse Information

* Warehouse
* Source Location
* Picking Status

---

## Product Information

প্রতিটি Line-এ থাকবে—

* Product
* SKU
* Batch Number
* UOM
* Quantity
* Remarks

---

## Logistics Information

* Vehicle
* Driver
* Route
* Delivery Person

---

# ৬. Delivery Note Types

FFME সমর্থন করবে—

* Customer Delivery Note
* Distributor Delivery Note
* Branch Transfer Note
* Sample Delivery Note
* Replacement Delivery Note
* Return Delivery Note

---

# ৭. Delivery Note Workflow

```text id="dn002"
Draft

↓

Approved

↓

Picking

↓

Packed

↓

Dispatched

↓

Delivered

↓

Closed
```

---

# ৮. Delivery Note Creation

Delivery Note তৈরি হতে পারে—

## From Sales

```text id="dn003"
Confirmed Sales

↓

Create Delivery Note
```

---

## From Partial Delivery

```text id="dn004"
Sales Quantity

↓

Partial Delivery Note

↓

Remaining Pending
```

---

# ৯. Warehouse Picking

Delivery Note Approved হলে—

Warehouse Team Product Pick করবে।

Picking Information:

* Picker
* Pick Date
* Location
* Quantity Verified

---

# ১০. Packing

Packing Process-এ থাকবে—

* Package Count
* Weight
* Packing Remarks
* Packed By

---

# ১১. Dispatch

Dispatch করার সময়—

সংরক্ষণ হবে—

* Dispatch Date
* Vehicle
* Driver
* Route
* Dispatch Person

---

# ১২. Inventory Integration

Delivery Note Default অবস্থায় Inventory কমাবে না।

Inventory Movement Policy:

## Option A

Sales Confirm → Stock Out

Delivery Note → Physical Confirmation

## Option B

Delivery Note Confirm → Stock Out

(Company Policy অনুযায়ী)

FFME Configuration দ্বারা নিয়ন্ত্রণ করা যাবে।

---

# ১৩. Batch Control

Batch Product হলে Delivery Note-এ থাকবে—

* Batch Selection
* Manufacturing Date
* Expiry Date
* FEFO Validation

---

# ১৪. Proof of Delivery (POD)

Future Extension হিসেবে—

সংরক্ষণ করা যাবে—

* Customer Signature
* Receiver Name
* Delivery Photo
* GPS Location
* Delivery Time

---

# ১৫. Failed Delivery

Delivery সম্পন্ন না হলে—

Reason নির্বাচন করা যাবে:

* Customer Closed
* Wrong Address
* Customer Refused
* Vehicle Problem
* Product Issue

---

# ১৬. Reports

## Delivery Note Register

* All Delivery Notes
* Status Wise

---

## Pending Delivery Report

* Pending Shipment
* Pending Quantity

---

## Warehouse Picking Report

* Product Picking Status

---

## Vehicle Delivery Report

* Vehicle Wise

---

## Customer Shipment Report

* Customer Wise

---

# ১৭. Business Rules

### Rule DN-001

Delivery Note অবশ্যই Sales অথবা Approved Transfer-এর Reference হবে।

---

### Rule DN-002

Delivery Note Quantity Sales Quantity-এর বেশি হতে পারবে না।

---

### Rule DN-003

একটি Sales-এর বিপরীতে একাধিক Delivery Note তৈরি করা যাবে।

---

### Rule DN-004

একটি Delivery Note শুধুমাত্র একটি Warehouse Source থেকে তৈরি হবে।

---

### Rule DN-005

Completed Delivery Note Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule DN-006

Batch Controlled Product-এর জন্য Batch বাধ্যতামূলক।

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Delivery Note Created
* Approved
* Picking Completed
* Packing Completed
* Vehicle Assigned
* Dispatched
* Delivered
* Cancelled

---

# ১৯. Future Expansion

* Barcode Picking
* QR Based Delivery
* Mobile Warehouse App
* Driver Delivery App
* GPS Proof of Delivery
* AI Delivery Scheduling
* Automated Customer Notification

---

# ২০. Notes

FFME Fulfillment Architecture:

```text id="dn005"
Sales

↓

Delivery Note

↓

Delivery

↓

Customer Receive

↓

Collection
```

Delivery Note হলো Sales এবং Delivery-এর মধ্যবর্তী Control Document।

---

# ২১. Related Documents

* Sales Overview
* Demand
* Sales Order
* Sales
* Delivery
* Warehouse
* Inventory
* Vehicle
* Driver
* Route
* Customer
* Collection
* Ledger

---

# ২২. Conclusion

Delivery Note Module FFME ERP-এর Shipment Control Layer।

এর মাধ্যমে—

* Product Dispatch Control
* Warehouse Coordination
* Delivery Accuracy
* Customer Receiving
* Audit Compliance

নিশ্চিত করা যায়।

FFME-তে Delivery Note হলো:

**Sales Authorization → Product Shipment Control → Delivery Execution**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `07-Sales-Return.md`
