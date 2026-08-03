# Inventory Ledger

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Inventory Ledger

---

# ১. Purpose

Inventory Ledger Module-এর উদ্দেশ্য হলো Inventory-এর প্রতিটি আর্থিক (Financial) এবং পরিমাণগত (Quantity) পরিবর্তনের স্থায়ী ইতিহাস সংরক্ষণ করা।

Inventory Ledger হলো Inventory-এর **Accounting Book**।

যেমন Finance Module-এ General Ledger থাকে, তেমনি Inventory Module-এ Inventory Ledger থাকবে।

---

# ২. Business Philosophy

Inventory Ledger কখনো Edit বা Delete করা যাবে না।

Inventory-তে যা কিছু ঘটবে—

* Purchase
* Production
* Sales
* Transfer
* Return
* Adjustment
* Landed Cost
* Revaluation

সবকিছুর Ledger Entry তৈরি হবে।

---

# ৩. Ledger Concept

Inventory Ledger একটি Running History সংরক্ষণ করবে।

উদাহরণ

```text id="led001"
Opening

↓

Purchase

↓

Production

↓

Sales

↓

Return

↓

Adjustment

↓

Closing Balance
```

---

# ৪. Ledger Entry Sources

Inventory Ledger Entry তৈরি হবে—

* Opening Balance
* Purchase
* Goods Receive Note
* Production Receipt
* Production Consumption
* Sales
* Delivery
* Sales Return
* Purchase Return
* Stock Transfer
* Stock Adjustment
* Landed Cost
* Inventory Revaluation
* Stock Take Adjustment

---

# ৫. Ledger Entry Information

প্রতিটি Entry-তে থাকবে—

* Ledger Number
* Entry Date
* Transaction Date
* Company
* Branch
* Warehouse
* Product
* Batch
* Serial Number
* UOM
* Transaction Type
* Source Document
* Reference Number

---

# ৬. Quantity Information

প্রতিটি Entry-তে থাকবে—

* Opening Quantity
* IN Quantity
* OUT Quantity
* Closing Quantity

---

# ৭. Value Information

প্রতিটি Entry-তে থাকবে—

* Unit Cost
* Total Cost
* Opening Value
* IN Value
* OUT Value
* Closing Value

---

# ৮. Running Balance

প্রতিটি Ledger Entry-এর পরে—

Running Balance Update হবে।

Example

| Transaction | Qty |
| ----------- | --: |
| Opening     | 100 |
| Purchase    | +50 |
| Sales       | -20 |
| Closing     | 130 |

---

# ৯. Ledger Types

System সমর্থন করবে—

* Product Ledger
* Warehouse Ledger
* Batch Ledger
* Serial Ledger
* Value Ledger

---

# ১০. Batch Ledger

একটি Batch-এর সম্পূর্ণ ইতিহাস দেখা যাবে।

উদাহরণ

```text id="led002"
Batch Created

↓

Warehouse

↓

Sales

↓

Return

↓

Closed
```

---

# ১১. Serial Ledger

প্রতিটি Serial Number-এর জন্য আলাদা Ledger থাকবে।

উদাহরণ

Purchase

↓

Warehouse

↓

Customer

↓

Return

↓

Service

↓

Disposed

---

# ১২. Warehouse Ledger

প্রতিটি Warehouse-এর Stock History আলাদাভাবে সংরক্ষিত হবে।

---

# ১৩. Financial Integration

Inventory Ledger Finance Module-এর সাথে যুক্ত থাকবে।

Inventory Value পরিবর্তিত হলে—

General Ledger-এও Entry হবে।

---

# ১৪. Inventory Valuation

Ledger Entry-তে Valuation Method অনুযায়ী Cost সংরক্ষণ হবে।

সমর্থিত—

* FIFO
* Weighted Average
* Standard Cost
* Specific Identification

---

# ১৫. Reverse Entry

ভুল Transaction হলে—

Original Ledger পরিবর্তন হবে না।

বরং Reverse Entry তৈরি হবে।

উদাহরণ

```text id="led003"
Purchase +100

↓

Reverse

↓

-100
```

---

# ১৬. Period Closing

Financial Period Close হওয়ার পরে—

Ledger Lock হবে।

বিশেষ Permission ছাড়া নতুন Entry বা পরিবর্তন করা যাবে না।

---

# ১৭. Business Rules

### Rule LED-001

Ledger Entry Delete করা যাবে না।

---

### Rule LED-002

Ledger Entry Edit করা যাবে না।

---

### Rule LED-003

সব Correction Reverse Entry-এর মাধ্যমে হবে।

---

### Rule LED-004

প্রতিটি Inventory Transaction-এর Ledger Entry বাধ্যতামূলক।

---

### Rule LED-005

Running Balance সবসময় সঠিক থাকতে হবে।

---

### Rule LED-006

Inventory Ledger এবং General Ledger-এর Inventory Value মিলতে হবে।

---

### Rule LED-007

Batch ও Serial Controlled Product-এর আলাদা Ledger থাকবে।

---

# ১৮. Dashboard

Dashboard-এ দেখা যাবে—

* Today's Ledger Entries
* Inventory Value
* IN vs OUT
* Warehouse Ledger Summary
* Product Ledger Summary

---

# ১৯. Reports

* Inventory Ledger Register
* Product Ledger Report
* Warehouse Ledger Report
* Batch Ledger Report
* Serial Ledger Report
* Inventory Value Ledger
* Daily Ledger Report
* Monthly Ledger Report

---

# ২০. Integration

Inventory Ledger তথ্য গ্রহণ করবে—

* Purchase
* Manufacturing
* Sales
* Warehouse
* Finance
* Inventory Adjustment

এবং তথ্য প্রদান করবে—

* Inventory Analytics
* Financial Reports
* Audit
* Cost Analysis

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Entry Created
* Posted
* Reversed
* Locked
* Period Closed

Delete অনুমোদিত নয়।

---

# ২২. Future Expansion

* Multi-Currency Ledger
* Blockchain Inventory Ledger
* AI Ledger Analysis
* Live Inventory Timeline
* External Audit API

---

# ২৩. Notes

Inventory Ledger Relationship

```text id="led004"
Inventory Transaction

↓

Inventory Ledger

↓

Running Balance

↓

Inventory Value

↓

Finance
```

Inventory Ledger হলো Inventory-এর স্থায়ী হিসাব বই।

---

# ২৪. Related Documents

* Stock Movement
* Inventory Valuation
* Landed Cost
* Finance
* General Ledger
* Batch
* Serial Number

---

# ২৫. Conclusion

Inventory Ledger Module হলো FFME ERP-এর **Inventory Accounting Engine**।

এর মাধ্যমে—

* সম্পূর্ণ Transaction History
* Running Stock Balance
* Running Inventory Value
* Audit Compliance
* Finance Integration

নিশ্চিত করা হবে।

FFME-তে Inventory Ledger হলো—

**Inventory Transaction → Ledger Entry → Running Balance → Financial Value**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `18-Inventory-Analytics.md`
