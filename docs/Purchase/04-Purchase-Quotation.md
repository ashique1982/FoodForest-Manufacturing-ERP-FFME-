# Purchase Quotation Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Quotation

---

# ১. Purpose

Purchase Quotation Module-এর উদ্দেশ্য হলো Supplier কর্তৃক RFQ-এর বিপরীতে প্রদত্ত Commercial Offer গ্রহণ, সংরক্ষণ, তুলনা, মূল্যায়ন এবং সর্বোত্তম Supplier নির্বাচন করা।

Purchase Quotation কোনো Purchase নয়।

এটি Supplier-এর একটি Commercial Proposal।

---

# ২. Business Philosophy

Purchase Quotation সবসময় Supplier তৈরি করবে।

Buyer শুধুমাত্র—

* গ্রহণ করবে
* যাচাই করবে
* তুলনা করবে
* অনুমোদন করবে
* নির্বাচিত Quotation থেকে Purchase Order তৈরি করবে।

---

# ৩. Purchase Flow

```text id="pq001"
Purchase Requisition

↓

RFQ

↓

Supplier

↓

Purchase Quotation

↓

Quotation Comparison

↓

Quotation Selection

↓

Purchase Order
```

---

# ৪. Purchase Quotation Definition

Purchase Quotation হলো Supplier-এর পক্ষ থেকে Buyer-এর RFQ-এর উত্তর।

এতে Supplier জানাবে—

* Price
* Delivery Time
* Discount
* Tax
* Payment Terms
* Warranty
* Validity

---

# ৫. Purchase Quotation Sources

Quotation আসতে পারে—

* RFQ Response
* Supplier Portal
* Email
* Manual Entry
* Tender Submission
* Import Supplier

---

# ৬. Quotation Profile

## Basic Information

* Quotation Number
* Quotation Date
* Supplier
* RFQ Number
* Currency

---

## Commercial Information

* Unit Price
* Discount
* Tax
* Freight
* Insurance
* Other Charges

---

## Delivery Information

* Lead Time
* Delivery Date
* Delivery Location

---

## Payment Information

* Payment Terms
* Credit Days
* Advance Required

---

## Validity

* Valid From
* Valid Until

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
* Total Price

---

# ৮. Multiple Quotations

একটি RFQ-এর বিপরীতে একাধিক Supplier Quotation দিতে পারবে।

Example

```text id="pq002"
RFQ

↓

Supplier A

↓

Quotation A

Supplier B

↓

Quotation B

Supplier C

↓

Quotation C
```

---

# ৯. Quotation Revision

Supplier Quotation পরিবর্তন করতে পারবে যতক্ষণ পর্যন্ত Buyer সেটি Select না করে।

Revision History সংরক্ষণ হবে।

---

# ১০. Quotation Comparison

System নিম্নলিখিত বিষয় তুলনা করবে—

* Unit Price
* Total Price
* Discount
* Tax
* Freight
* Delivery Time
* Payment Terms
* Supplier Rating
* Previous Purchase History

---

# ১১. Supplier Evaluation

Quotation নির্বাচন শুধুমাত্র Lowest Price-এর ভিত্তিতে হবে না।

Evaluation Criteria

* Price
* Quality
* Delivery Performance
* Supplier Rating
* Warranty
* Payment Terms
* Lead Time

---

# ১২. Negotiation

Buyer Supplier-এর সাথে Price Negotiation করতে পারবে।

Example

Supplier Price

105 টাকা

↓

Negotiated

100 টাকা

↓

Final Quotation

---

# ১৩. Quotation Selection

Buyer একটি অথবা একাধিক Quotation নির্বাচন করতে পারবে।

Example

Product A

Supplier A

Product B

Supplier B

---

# ১৪. Partial Selection

একটি Quotation-এর আংশিক Quantity নির্বাচন করা যাবে।

Example

Supplier Offer

1000 Kg

Buyer Purchase

700 Kg

---

# ১৫. Purchase Order Conversion

Approved Quotation থেকে Purchase Order তৈরি হবে।

```text id="pq003"
Approved Quotation

↓

Purchase Order
```

---

# ১৬. Status

সম্ভাব্য Status

* Draft
* Submitted
* Under Review
* Negotiation
* Approved
* Partially Approved
* Rejected
* Converted to Purchase Order
* Expired
* Cancelled

---

# ১৭. Business Rules

### Rule PQ-001

Purchase Quotation Supplier-এর Commercial Proposal।

---

### Rule PQ-002

Approved Quotation সরাসরি Purchase হবে না।

Approved Quotation থেকে Purchase Order তৈরি হবে।

---

### Rule PQ-003

Expired Quotation থেকে Purchase Order করা যাবে না (Permission ব্যতীত)।

---

### Rule PQ-004

একটি RFQ-তে একাধিক Supplier অংশগ্রহণ করতে পারবে।

---

### Rule PQ-005

একটি Purchase Order এক বা একাধিক Quotation থেকে তৈরি হতে পারবে।

---

### Rule PQ-006

Quotation নির্বাচন করার পরও Purchase Order Quantity কমানো যেতে পারে।

---

### Rule PQ-007

Approved Quotation পরিবর্তন করা যাবে না।

---

# ১৮. Reports

* Quotation Register
* Supplier Wise Quotation
* RFQ Wise Quotation
* Price Comparison
* Negotiation Report
* Expired Quotation
* Selected Supplier Report

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* Quotation Submitted
* Quotation Revised
* Negotiation
* Approval
* Selection
* Purchase Order Conversion

---

# ২০. Future Expansion

* Supplier Portal
* Digital Signature
* Online Negotiation
* Reverse Auction
* AI Supplier Evaluation
* Auto Commercial Scoring
* Vendor Collaboration

---

# ২১. Notes

FFME Procurement Model

```text id="pq004"
RFQ

↓

Supplier Quotation

↓

Commercial Evaluation

↓

Purchase Order
```

Quotation হলো Supplier-এর Offer।

Purchase Order হলো Buyer-এর Commitment।

এই দুইটি কখনও একই Document নয়।

---

# ২২. Related Documents

* Purchase Overview
* Purchase Requisition
* RFQ
* Purchase Order
* Supplier
* Product
* Goods Receive Note
* Purchase Payment

---

# ২৩. Conclusion

Purchase Quotation Module FFME ERP-এর Commercial Evaluation Engine।

এর মাধ্যমে—

* Multiple Supplier Offer
* Price Comparison
* Commercial Negotiation
* Supplier Evaluation
* Best Supplier Selection

নিয়ন্ত্রিত হবে।

FFME-তে Purchase Quotation হলো:

**Supplier Offer → Commercial Evaluation → Purchase Order Decision**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `05-Purchase-Order.md`
