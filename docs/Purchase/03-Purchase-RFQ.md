# Request for Quotation (RFQ) Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Request for Quotation (RFQ)

---

# ১. Purpose

Request for Quotation (RFQ) Module-এর উদ্দেশ্য হলো Approved Purchase Requisition-এর ভিত্তিতে এক বা একাধিক Supplier-এর কাছ থেকে Price, Delivery Time, Payment Terms, Quality এবং অন্যান্য Commercial Information সংগ্রহ করা।

RFQ কোনো Purchase Order নয়।

RFQ শুধুমাত্র Supplier-এর কাছ থেকে Quotation চাওয়ার একটি আনুষ্ঠানিক অনুরোধ।

---

# ২. Business Philosophy

FFME-তে বড় বা নিয়মিত Purchase-এর ক্ষেত্রে সরাসরি Purchase Order করা হবে না।

প্রথমে Supplier-এর কাছ থেকে Quotation সংগ্রহ করা হবে।

```text id="rfq001"
Purchase Requisition

↓

RFQ

↓

Supplier Quotation

↓

Quotation Comparison

↓

Purchase Order
```

---

# ৩. RFQ Definition

RFQ (Request for Quotation) হলো Supplier-কে পাঠানো একটি Request, যেখানে প্রতিষ্ঠানের প্রয়োজনীয় Product বা Service-এর জন্য মূল্য ও অন্যান্য শর্ত জানতে চাওয়া হয়।

---

# ৪. RFQ Architecture

```text id="rfq002"
Approved Purchase Requisition

↓

RFQ

↓

Supplier

↓

Quotation

↓

Comparison

↓

Purchase Order
```

---

# ৫. RFQ Sources

RFQ তৈরি হবে—

* Approved Purchase Requisition
* Manual Purchase Requirement
* Annual Procurement Plan
* Tender Process

---

# ৬. RFQ Profile

## Basic Information

* RFQ Number
* RFQ Date
* RFQ Type
* Status

---

## Reference Information

* Purchase Requisition Number
* Department
* Branch
* Warehouse

---

## Supplier Information

একটি RFQ একাধিক Supplier-এর কাছে পাঠানো যাবে।

উদাহরণ:

* Supplier A
* Supplier B
* Supplier C

---

## Product Information

প্রতিটি Line-এ থাকবে—

* Product
* Specification
* UOM
* Quantity
* Required Delivery Date
* Remarks

---

# ৭. RFQ Types

FFME সমর্থন করবে—

### Standard RFQ

---

### Urgent RFQ

---

### Service RFQ

---

### Import RFQ

---

### Tender RFQ

---

### Annual Contract RFQ

---

# ৮. Multi Supplier RFQ

একটি RFQ থেকে একাধিক Supplier-এর কাছে Quotation Request পাঠানো যাবে।

```text id="rfq003"
RFQ

↓

Supplier A

Supplier B

Supplier C

↓

Multiple Quotations
```

---

# ৯. Supplier Response

Supplier নিম্নলিখিত তথ্য প্রদান করতে পারবে—

* Unit Price
* Discount
* Tax
* Delivery Time
* Payment Terms
* Warranty
* Validity Period
* MOQ (Minimum Order Quantity)
* Lead Time
* Remarks

---

# ১০. Quotation Validity

প্রতিটি Quotation-এর জন্য Valid Until Date থাকবে।

Validity শেষ হলে সেই Quotation নির্বাচন করা যাবে না (Permission ছাড়া)।

---

# ১১. Quotation Comparison

System Supplier অনুযায়ী Comparison তৈরি করবে।

তুলনা করা যাবে—

* Unit Price
* Total Price
* Delivery Time
* Discount
* Tax
* Payment Terms
* Supplier Rating
* Previous Purchase History

---

# ১২. Supplier Rating Integration

Quotation Comparison-এ Supplier-এর Historical Performance দেখা যাবে।

যেমন—

* On Time Delivery
* Product Quality
* Return Rate
* Complaint Rate
* Average Rating

---

# ১৩. Approval Workflow

```text id="rfq004"
Draft

↓

Submitted

↓

Reviewed

↓

Sent to Suppliers

↓

Quotation Received

↓

Comparison

↓

Purchase Approval
```

---

# ১৪. Status

সম্ভাব্য Status—

* Draft
* Submitted
* Sent
* Partially Responded
* Fully Responded
* Under Comparison
* Closed
* Cancelled

---

# ১৫. Conversion Flow

```text id="rfq005"
Purchase Requisition

↓

RFQ

↓

Supplier Quotation

↓

Selected Supplier

↓

Purchase Order
```

---

# ১৬. Business Rules

### Rule RFQ-001

Approved Purchase Requisition ছাড়া সাধারণ RFQ তৈরি করা যাবে না (Manual RFQ ব্যতীত)।

---

### Rule RFQ-002

একটি RFQ একাধিক Supplier-এর কাছে পাঠানো যাবে।

---

### Rule RFQ-003

Supplier Quotation Validity শেষ হলে Purchase Order তৈরি করা যাবে না (Permission ব্যতীত)।

---

### Rule RFQ-004

Cancelled RFQ পুনরায় ব্যবহার করা যাবে না।

---

### Rule RFQ-005

RFQ Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule RFQ-006

সব Supplier-এর Response না এলেও RFQ থেকে Purchase Order তৈরি করা যাবে।

---

# ১৭. Reports

* RFQ Register
* Pending RFQ
* Supplier Response Report
* Quotation Comparison Report
* RFQ by Department
* RFQ by Warehouse
* RFQ Trend
* Response Time Report

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* RFQ Created
* RFQ Sent
* Supplier Added
* Supplier Response Received
* RFQ Closed
* RFQ Cancelled

---

# ১৯. Future Expansion

* Supplier Portal
* Email RFQ
* PDF RFQ
* Online Quotation Submission
* E-Tender
* Reverse Auction
* AI Supplier Recommendation

---

# ২০. Notes

FFME Procurement Process

```text id="rfq006"
Requirement

↓

Purchase Requisition

↓

RFQ

↓

Quotation

↓

Purchase Order
```

RFQ-এর উদ্দেশ্য হলো সর্বোত্তম Supplier নির্বাচন করা, শুধুমাত্র সর্বনিম্ন Price নির্বাচন করা নয়।

---

# ২১. Related Documents

* Purchase Overview
* Purchase Requisition
* Supplier
* Purchase Quotation
* Purchase Order
* Product
* Warehouse
* Budget

---

# ২২. Conclusion

RFQ Module হলো FFME ERP-এর Supplier Sourcing Engine।

এর মাধ্যমে—

* Multiple Supplier Inquiry
* Competitive Pricing
* Supplier Evaluation
* Better Procurement Decision

নিশ্চিত করা হবে।

FFME-তে RFQ হলো:

**Approved Requirement → Supplier Inquiry → Best Commercial Offer Selection**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `04-Purchase-Quotation.md`
