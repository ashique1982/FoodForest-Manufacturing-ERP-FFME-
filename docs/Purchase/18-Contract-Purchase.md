# Contract Purchase Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Contract Purchase

---

# ১. Purpose

Contract Purchase Module-এর উদ্দেশ্য হলো Supplier-এর সাথে দীর্ঘমেয়াদী ক্রয় চুক্তি (Purchase Agreement) পরিচালনা করা, Contract অনুযায়ী একাধিক Purchase Order তৈরি করা এবং Contract-এর Quantity, Value ও মেয়াদ নিয়ন্ত্রণ করা।

FFME-তে Contract Purchase একটি Framework Agreement।

একটি Contract থেকে একাধিক Purchase Order তৈরি করা যাবে।

---

# ২. Business Philosophy

অনেক সময় একটি কোম্পানি Supplier-এর সাথে ১ বছরের জন্য চুক্তি করে।

উদাহরণ—

* ১ বছরে ৫০০ টন গম
* ১২ মাসে ১,০০,০০০ কার্টন
* প্রতি মাসে ১০,০০০ বোতল

একবার Contract হবে, কিন্তু Purchase অনেকবার হবে।

---

# ৩. Contract Workflow

```text id="cp001"
Contract Request

↓

Supplier Negotiation

↓

Agreement

↓

Approval

↓

Contract Active

↓

Purchase Order

↓

GRN

↓

Purchase

↓

Contract Balance Update
```

---

# ৪. Contract Types

FFME সমর্থন করবে—

* Quantity Contract
* Value Contract
* Time-Based Contract
* Blanket Purchase Agreement
* Annual Contract
* Framework Agreement
* Rate Contract

---

# ৫. Contract Profile

## Basic Information

* Contract Number
* Contract Name
* Supplier
* Company
* Branch
* Currency
* Status

---

## Validity

* Effective Date
* Expiry Date

---

## Financial

* Contract Value
* Currency
* Tax Rule

---

# ৬. Product Information

প্রতিটি Contract Line-এ থাকবে—

* Product
* UOM
* Contract Quantity
* Unit Price
* Discount
* Tax
* Remaining Quantity

---

# ৭. Purchase Price

Contract চলাকালীন—

Contract Price Default হবে।

তবে Role Permission অনুযায়ী Override করা যেতে পারে।

সব Override Audit Trail-এ সংরক্ষিত হবে।

---

# ৮. Quantity Tracking

Example

Contract Quantity

100,000 Kg

PO-1

20,000

Remaining

80,000

PO-2

30,000

Remaining

50,000

System সবসময় Balance Quantity দেখাবে।

---

# ৯. Value Tracking

Example

Contract Value

5,000,000

Purchased

3,200,000

Remaining

1,800,000

---

# ১০. Validity Tracking

Contract Expire হলে—

নতুন Purchase Order তৈরি করা যাবে না।

তবে Administrator প্রয়োজনে Extend করতে পারবেন।

---

# ১১. Contract Amendment

Contract পরিবর্তন করা যাবে—

* Quantity
* Price
* Validity
* Payment Terms
* Delivery Terms

প্রতিটি পরিবর্তন Version আকারে সংরক্ষণ হবে।

---

# ১২. Delivery Schedule

একটি Contract-এর অধীনে একাধিক Delivery Schedule থাকবে।

উদাহরণ—

* জানুয়ারি
* ফেব্রুয়ারি
* মার্চ

---

# ১৩. Payment Terms

Contract অনুযায়ী—

* Cash
* Credit
* Advance
* Installment
* LC

নির্ধারণ করা যাবে।

---

# ১৪. Penalty

Contract Violation হলে—

Penalty নির্ধারণ করা যাবে।

উদাহরণ—

* Late Delivery
* Wrong Quality
* Short Supply

---

# ১৫. Renewal

Contract Expiry-এর আগে—

System Reminder দেবে।

Contract—

* Renew
* Extend
* Close

করা যাবে।

---

# ১৬. Purchase Integration

Contract থেকে সরাসরি—

Purchase Order তৈরি হবে।

Contract Balance স্বয়ংক্রিয়ভাবে Update হবে।

---

# ১৭. Dashboard

দেখাবে—

* Active Contract
* Expiring Contract
* Completed Contract
* Contract Utilization %
* Remaining Quantity
* Remaining Value

---

# ১৮. Status

সম্ভাব্য Status

* Draft
* Under Negotiation
* Pending Approval
* Active
* Suspended
* Expired
* Completed
* Cancelled

---

# ১৯. Business Rules

### Rule CP-001

Approved Contract ছাড়া Contract PO তৈরি হবে না।

---

### Rule CP-002

Contract Quantity অতিক্রম করে Purchase করা যাবে না (Override Permission ব্যতীত)।

---

### Rule CP-003

Expired Contract থেকে নতুন PO তৈরি হবে না।

---

### Rule CP-004

Contract Price Default Price হবে।

---

### Rule CP-005

সব Amendment Version হিসেবে সংরক্ষিত হবে।

---

### Rule CP-006

Contract Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule CP-007

Contract Balance Real-Time Update হবে।

---

# ২০. Reports

* Contract Register
* Active Contract
* Expiring Contract
* Contract Utilization
* Supplier Contract
* Product Contract
* Contract Balance
* Amendment History

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Contract Created
* Approved
* Amended
* Extended
* Suspended
* Renewed
* Closed
* Cancelled

---

# ২২. Future Expansion

* Digital Signature
* E-Contract
* AI Contract Recommendation
* Supplier Portal
* Auto Renewal
* Contract Compliance Score

---

# ২৩. Notes

FFME Contract Flow

```text id="cp002"
Contract

↓

Purchase Order

↓

Purchase

↓

Contract Balance
```

একটি Contract বহু Purchase Order-এর ভিত্তি হিসেবে কাজ করবে।

---

# ২৪. Related Documents

* Purchase Order
* Purchase
* Purchase Pricing
* Supplier
* Purchase Approval
* Finance
* Inventory

---

# ২৫. Conclusion

Contract Purchase Module হলো FFME ERP-এর Long-Term Procurement Engine।

এর মাধ্যমে—

* Long-Term Agreement
* Contract Monitoring
* Quantity Control
* Value Control
* Supplier Commitment
* Purchase Automation

নিশ্চিত করা হবে।

FFME-তে Contract Purchase হলো:

**Purchase Agreement → Multiple Purchase Orders → Controlled Procurement**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**End of Purchase Module Documentation**
