# Purchase Order (PO) Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Order (PO)

---

# ১. Purpose

Purchase Order (PO) Module-এর উদ্দেশ্য হলো নির্বাচিত Supplier-এর নিকট আনুষ্ঠানিকভাবে পণ্য বা সেবা অর্ডার করা এবং Buyer ও Supplier-এর মধ্যে একটি বাণিজ্যিক (Commercial) ও আইনগত (Legal) প্রতিশ্রুতি তৈরি করা।

Purchase Order হলো Procurement Process-এর সবচেয়ে গুরুত্বপূর্ণ Document।

---

# ২. Business Philosophy

FFME-তে Purchase Order তৈরি হওয়ার অর্থ—

* Buyer নির্দিষ্ট Supplier নির্বাচন করেছে।
* Commercial Terms চূড়ান্ত হয়েছে।
* Supplier এখন Product Supply করার জন্য অনুমোদিত।

PO তৈরি হওয়ার পর Supplier Delivery Process শুরু করবে।

---

# ৩. Purchase Order Workflow

```text id="po001"
Purchase Requisition

↓

RFQ

↓

Purchase Quotation

↓

Quotation Selection

↓

Purchase Order

↓

Supplier Acceptance

↓

Product Delivery

↓

Goods Receive Note
```

---

# ৪. Purchase Order Definition

Purchase Order (PO) হলো Buyer কর্তৃক Supplier-এর নিকট পাঠানো একটি Official Order।

এতে নির্দিষ্ট থাকবে—

* কী Product
* কত Quantity
* কত Price
* কোথায় Deliver করতে হবে
* কবে Deliver করতে হবে
* Payment Terms

---

# ৫. Purchase Order Sources

PO তৈরি হতে পারে—

* Approved Purchase Quotation
* Approved Contract
* Annual Purchase Agreement
* Emergency Purchase (Permission Required)

---

# ৬. Purchase Order Profile

## Basic Information

* PO Number
* PO Date
* Supplier
* Currency
* Status

---

## Reference

* Purchase Requisition
* RFQ
* Purchase Quotation

---

## Delivery Information

* Delivery Warehouse
* Delivery Address
* Delivery Date
* Contact Person

---

## Commercial Information

* Payment Terms
* Credit Days
* Freight
* Insurance
* Tax
* Discount
* Incoterms (Import Purchase)

---

# ৭. Product Information

প্রতিটি Line-এ থাকবে—

* Product
* Specification
* Quantity
* UOM
* Unit Price
* Discount
* Tax
* Net Amount

---

# ৮. Supplier Confirmation

Supplier PO পাওয়ার পর—

* Accept
* Reject
* Request Modification

করতে পারবে (Supplier Portal বা Manual Confirmation-এর মাধ্যমে)।

---

# ৯. Partial Delivery

একটি PO একাধিক Delivery-তে সম্পন্ন হতে পারে।

Example

PO

1000 Kg

↓

Delivery 1

400 Kg

↓

Delivery 2

350 Kg

↓

Delivery 3

250 Kg

↓

PO Completed

---

# ১০. Back Order

Supplier সম্পূর্ণ Quantity সরবরাহ করতে না পারলে—

Remaining Quantity Back Order হিসেবে থাকবে।

---

# ১১. Purchase Order Revision

PO Approve হওয়ার আগে Edit করা যাবে।

Approve হওয়ার পরে—

Revision Number তৈরি হবে।

পুরনো Version সংরক্ষিত থাকবে।

---

# ১২. Purchase Order Approval

Approval Workflow

```text id="po002"
Draft

↓

Reviewed

↓

Approved

↓

Released

↓

Supplier
```

Approval Limit Role অনুযায়ী নির্ধারিত হবে।

---

# ১৩. Goods Receive Integration

Supplier Product পাঠানোর পরে—

Warehouse GRN তৈরি করবে।

```text id="po003"
Purchase Order

↓

Delivery

↓

GRN
```

---

# ১৪. Inventory Integration

PO Inventory বাড়াবে না।

Inventory বাড়বে শুধুমাত্র GRN Confirm হলে।

---

# ১৫. Finance Integration

PO কোনো Accounting Entry তৈরি করবে না।

Accounting Entry হবে—

* Purchase Invoice
* Goods Receipt (যদি কোম্পানির Accounting Policy অনুযায়ী প্রযোজ্য হয়)
* Supplier Payment

---

# ১৬. Manufacturing Integration

Raw Material Purchase Order সরাসরি Production Planning-এর সাথে সংযুক্ত থাকবে।

Example

Production Plan

↓

Need 5 MT Turmeric

↓

PO

↓

Supplier Delivery

↓

Production

---

# ১৭. Status

সম্ভাব্য Status

* Draft
* Submitted
* Approved
* Released
* Sent
* Supplier Accepted
* Partially Delivered
* Fully Delivered
* Closed
* Cancelled

---

# ১৮. Business Rules

### Rule PO-001

Approved Purchase Order ছাড়া Supplier Product Supply করবে না (Emergency Purchase ব্যতীত)।

---

### Rule PO-002

PO Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule PO-003

PO-এর Quantity একাধিক GRN-এর মাধ্যমে Receive করা যাবে।

---

### Rule PO-004

PO Approved হওয়ার পরে Revision Number তৈরি হবে।

---

### Rule PO-005

PO Inventory বৃদ্ধি করবে না।

---

### Rule PO-006

Supplier Delivery অবশ্যই PO Reference অনুযায়ী হবে।

---

### Rule PO-007

Closed PO পুনরায় Edit করা যাবে না।

---

# ১৯. Reports

* Purchase Order Register
* Pending PO
* Supplier Wise PO
* Product Wise PO
* Delivery Pending PO
* Partial Delivery Report
* Back Order Report
* Monthly PO Report

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* PO Created
* PO Approved
* PO Revised
* PO Sent
* Supplier Accepted
* Partial Delivery
* PO Closed
* PO Cancelled

---

# ২১. Future Expansion

* Supplier Portal
* Digital PO
* Email PO
* QR Code PO
* Barcode PO
* Electronic Signature
* Contract Purchase Integration

---

# ২২. Notes

FFME Procurement Model

```text id="po004"
Quotation

↓

Purchase Order

↓

Delivery

↓

GRN

↓

Purchase Invoice

↓

Payment
```

Purchase Order হলো Buyer-এর Commitment।

Product Receive না হওয়া পর্যন্ত Purchase সম্পূর্ণ হয় না।

---

# ২৩. Related Documents

* Purchase Requisition
* RFQ
* Purchase Quotation
* Supplier
* Goods Receive Note
* Purchase
* Purchase Payment
* Inventory
* Warehouse

---

# ২৪. Conclusion

Purchase Order Module হলো FFME ERP-এর Procurement Commitment Engine।

এর মাধ্যমে—

* Supplier Confirmation
* Controlled Procurement
* Delivery Tracking
* Commercial Compliance
* Procurement Audit

নিশ্চিত করা হবে।

FFME-তে Purchase Order হলো:

**Selected Supplier → Official Order → Controlled Delivery**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `06-Goods-Receive-Note.md`
