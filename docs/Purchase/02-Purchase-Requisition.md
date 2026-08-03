# Purchase Requisition Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Requisition (PR)

---

# ১. Purpose

Purchase Requisition (PR) Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের বিভিন্ন Department, Warehouse, Branch, Factory অথবা Business Unit থেকে Purchase-এর চাহিদা (Requirement) সংগ্রহ, যাচাই, অনুমোদন এবং Procurement Process শুরু করা।

Purchase Requisition কোনো Purchase নয়।

এটি শুধুমাত্র Purchase-এর জন্য একটি **Internal Request**।

---

# ২. Business Philosophy

FFME-তে কোনো Purchase সরাসরি শুরু হবে না।

প্রথম ধাপ হবে Purchase Requisition।

```text id="pr001"
Business Need

↓

Purchase Requisition

↓

Approval

↓

Procurement Process
```

---

# ৩. Purchase Requisition Definition

Purchase Requisition হলো প্রতিষ্ঠানের অভ্যন্তরীণ (Internal) Purchase Request।

এটি Supplier-এর জন্য নয়।

এটি শুধুমাত্র Procurement Team-এর জন্য।

---

# ৪. Purchase Requisition Architecture

```text id="pr002"
Department

↓

Purchase Requisition

↓

Approval

↓

Purchase Department

↓

RFQ / Purchase Order
```

---

# ৫. Purchase Requisition Sources

PR তৈরি করতে পারবে—

* Production Department
* Warehouse
* Inventory Controller
* Sales Department
* Administration
* Maintenance
* HR Department
* Accounts Department
* Branch Office
* Management

---

# ৬. Purchase Requisition Types

FFME সমর্থন করবে—

### Raw Material Requisition

---

### Packaging Material Requisition

---

### Trading Product Requisition

---

### Asset Purchase Requisition

---

### Office Supply Requisition

---

### Service Requisition

---

### Emergency Requisition

---

### Capital Expenditure (CAPEX)

---

### Operational Expenditure (OPEX)

---

# ৭. Purchase Requisition Profile

## Basic Information

* PR Number
* PR Date
* Request Type
* Priority
* Status

---

## Request Information

* Department
* Branch
* Warehouse
* Requested By
* Required Date

---

## Product Information

প্রতিটি Line-এ থাকবে—

* Product
* Specification
* UOM
* Requested Quantity
* Estimated Price (Optional)
* Purpose

---

## Approval Information

* Reviewer
* Approver
* Approval Date
* Remarks

---

# ৮. Priority Levels

PR Priority হতে পারে—

* Low
* Normal
* High
* Urgent
* Emergency

---

# ৯. Requisition Workflow

```text id="pr003"
Draft

↓

Submitted

↓

Department Approval

↓

Purchase Approval

↓

Approved

↓

RFQ / Purchase Order
```

---

# ১০. Inventory Check

PR Approved হওয়ার আগে System Stock যাচাই করবে।

```text id="pr004"
Stock Available

↓

No Purchase Needed

OR

Insufficient Stock

↓

Purchase Required
```

যদি পর্যাপ্ত Stock থাকে তবে Purchase Requisition Reject অথবা Close করা যেতে পারে।

---

# ১১. Manufacturing Integration

Production Planning অনুযায়ী Raw Material Shortage হলে System Auto PR তৈরি করতে পারবে।

Example:

```text id="pr005"
Production Plan

↓

Raw Material Shortage

↓

Auto Purchase Requisition
```

---

# ১২. Reorder Level Integration

যদি কোনো Product Reorder Level-এর নিচে নেমে যায়—

System Auto Requisition তৈরি করতে পারবে।

---

# ১৩. Budget Integration

Requisition Budget Check করবে।

Example:

Department Budget:

500,000

Requested:

650,000

↓

Budget Alert

---

# ১৪. Multi Warehouse Support

একাধিক Warehouse থেকে Requirement আসতে পারে।

Example:

* Factory Warehouse
* Raw Material Warehouse
* Packaging Warehouse
* Branch Warehouse

---

# ১৫. Purchase Department Actions

Approved PR-এর উপর ভিত্তি করে Procurement Team করতে পারবে—

* RFQ তৈরি
* Supplier নির্বাচন
* Quotation সংগ্রহ
* Purchase Order তৈরি

---

# ১৬. Status

সম্ভাব্য Status—

* Draft
* Submitted
* Under Review
* Approved
* Partially Approved
* Rejected
* Converted to RFQ
* Converted to Purchase Order
* Closed
* Cancelled

---

# ১৭. Business Rules

### Rule PR-001

Purchase Requisition কোনো Financial Transaction নয়।

---

### Rule PR-002

Approved PR ছাড়া সাধারণ Purchase শুরু করা যাবে না (Emergency ব্যতীত)।

---

### Rule PR-003

একটি PR থেকে একাধিক RFQ তৈরি করা যেতে পারে।

---

### Rule PR-004

একটি PR থেকে একাধিক Purchase Order তৈরি করা যেতে পারে (Partial Procurement)।

---

### Rule PR-005

Approved PR Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule PR-006

Closed PR পুনরায় Edit করা যাবে না।

---

### Rule PR-007

Auto Generated PR এবং Manual PR আলাদাভাবে চিহ্নিত থাকবে।

---

# ১৮. Reports

* Purchase Requisition Register
* Pending Approval
* Department Wise PR
* Warehouse Wise PR
* Product Wise PR
* Monthly PR Trend
* Budget vs Requisition
* Auto Generated PR
* Emergency PR

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* PR Created
* PR Modified
* PR Submitted
* PR Approved
* PR Rejected
* PR Converted
* PR Closed
* PR Cancelled

---

# ২০. Future Expansion

* Mobile PR Approval
* Email Approval
* AI Purchase Suggestion
* Auto Vendor Recommendation
* OCR Attachment
* Barcode Based Request
* IoT Based Auto Requisition

---

# ২১. Notes

FFME Procurement Entry Point

```text id="pr006"
Business Requirement

↓

Purchase Requisition

↓

Procurement

↓

Purchase
```

Purchase Requisition পুরো Procurement Process-এর প্রথম ধাপ।

---

# ২২. Related Documents

* Purchase Overview
* Product
* Warehouse
* Inventory
* Supplier
* Budget
* Manufacturing
* RFQ
* Purchase Order
* Goods Receive Note

---

# ২৩. Conclusion

Purchase Requisition Module হলো FFME ERP-এর Internal Procurement Request Engine।

এর মাধ্যমে—

* Department Requirement
* Stock Shortage
* Production Requirement
* Budget Control
* Approval Workflow

সুশৃঙ্খলভাবে পরিচালিত হবে।

FFME-তে Purchase Requisition হলো:

**Need Identification → Internal Approval → Procurement Initiation**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `03-Purchase-RFQ.md`
