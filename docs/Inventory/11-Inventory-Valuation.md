# Inventory Valuation

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Inventory Valuation

---

# ১. Purpose

Inventory Valuation Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের Inventory-এর আর্থিক মূল্য (Financial Value) নির্ধারণ, সংরক্ষণ এবং Finance Module-এর জন্য সঠিক Inventory Asset Value প্রদান করা।

এই Module শুধুমাত্র Stock Quantity নয়, বরং প্রতিটি Inventory Item-এর Cost এবং Total Inventory Value নির্ধারণ করবে।

---

# ২. Business Philosophy

একই Product-এর দুইটি Quantity সমান হলেও তাদের Value এক নাও হতে পারে।

উদাহরণ—

| Batch   | Qty | Unit Cost |   Value |
| ------- | --: | --------: | ------: |
| B240701 | 100 |       ৳95 |  ৳9,500 |
| B240801 | 100 |      ৳110 | ৳11,000 |

অতএব Inventory-এর মূল্য নির্ভর করবে Quantity এবং Costing Method-এর উপর।

---

# ৩. Objectives

Inventory Valuation-এর মাধ্যমে—

* Inventory Asset Value নির্ধারণ
* Cost of Goods Sold (COGS) হিসাব
* Production Cost Calculation
* Gross Profit Calculation
* Financial Statement Support
* Audit Support

নিশ্চিত করা হবে।

---

# ৪. Valuation Scope

Inventory Valuation প্রযোজ্য হবে—

* Raw Material
* Packaging Material
* Work In Progress (WIP)
* Finished Goods
* Trading Goods
* Spare Parts

---

# ৫. Valuation Methods

FFME একাধিক Valuation Method সমর্থন করবে।

## FIFO (First In First Out)

প্রথমে কেনা বা উৎপাদিত Stock আগে Issue হবে।

এটি FMCG, Food এবং Pharmaceutical Industry-এর জন্য Recommended।

---

## Weighted Average Cost (Moving Average)

প্রতিবার Purchase বা Production-এর পরে নতুন Average Cost গণনা হবে।

এটি Manufacturing Industry-তে ব্যাপকভাবে ব্যবহৃত।

---

## Standard Cost

Product-এর পূর্বনির্ধারিত Cost ব্যবহার হবে।

Variance আলাদাভাবে হিসাব হবে।

---

## Specific Identification

প্রতিটি Batch বা Serial-এর প্রকৃত Cost ব্যবহার হবে।

মূলত—

* Vehicle
* Machinery
* Asset
* High Value Equipment

এর জন্য।

---

# ৬. Default Policy

FFME-এর Default Recommendation

* Raw Material → Weighted Average
* Packaging Material → Weighted Average
* Finished Goods → Weighted Average
* Trading Goods → FIFO
* Serial Controlled Items → Specific Identification

Configuration থেকে পরিবর্তনযোগ্য।

---

# ৭. Cost Components

একটি Product-এর Inventory Cost গঠিত হতে পারে—

* Purchase Cost
* Manufacturing Cost
* Freight
* Customs Duty
* VAT (যদি Capitalized হয়)
* Insurance
* Loading/Unloading
* Landed Cost
* Other Allocated Cost

---

# ৮. Manufacturing Cost

Manufacturing-এর ক্ষেত্রে Cost নির্ধারণ হবে—

* Raw Material
* Packaging Material
* Direct Labour
* Factory Overhead
* Utility Cost
* Machine Cost
* Quality Cost

এর সমন্বয়ে।

---

# ৯. Cost Update Events

Inventory Cost পরিবর্তিত হতে পারে—

* Purchase
* Goods Receive
* Production Completion
* Landed Cost Allocation
* Stock Adjustment (Value Adjustment)
* Cost Revaluation

---

# ১০. Cost Revaluation

Quantity অপরিবর্তিত রেখে—

Inventory Value পরিবর্তন করা যাবে।

উদাহরণ—

Supplier Price Correction

Audit Correction

Accounting Adjustment

এই ধরনের ক্ষেত্রে।

---

# ১১. Negative Stock Impact

Negative Stock থাকলে—

System Configuration অনুযায়ী—

* Warning
* Block
* Temporary Estimated Cost

ব্যবহার করা যাবে।

---

# ১২. Currency Support

Import Purchase-এর ক্ষেত্রে—

Foreign Currency থেকে Base Currency-তে Conversion হবে।

Exchange Rate History সংরক্ষিত থাকবে।

---

# ১৩. Financial Integration

Inventory Valuation সরাসরি Finance Module-এর সাথে যুক্ত থাকবে।

উদাহরণ—

```text id="val001"
Inventory Increase

↓

Inventory Asset

↓

General Ledger
```

Sales-এর সময়—

```text id="val002"
Inventory

↓

COGS

↓

Profit & Loss
```

---

# ১৪. Business Rules

### Rule VAL-001

প্রতিটি Product-এর একটি Default Valuation Method থাকবে।

---

### Rule VAL-002

Approved Transaction ছাড়া Inventory Value পরিবর্তন হবে না।

---

### Rule VAL-003

Inventory Quantity এবং Inventory Value আলাদা ধারণা।

---

### Rule VAL-004

Cost Revaluation Audit Trail ছাড়া করা যাবে না।

---

### Rule VAL-005

Financial Period Close হওয়ার পরে Valuation পরিবর্তন করা যাবে না (বিশেষ Permission ব্যতীত)।

---

### Rule VAL-006

Inventory Value সবসময় Finance Module-এর সাথে মিলতে হবে।

---

### Rule VAL-007

Batch এবং Serial Controlled Product-এর ক্ষেত্রে Valuation Method Configuration অনুযায়ী কাজ করবে।

---

# ১৫. Dashboard

Dashboard-এ দেখা যাবে—

* Total Inventory Value
* Warehouse Wise Value
* Product Wise Value
* Raw Material Value
* Finished Goods Value
* WIP Value
* Inventory Asset Trend

---

# ১৬. Reports

* Inventory Valuation Report
* Product Cost Report
* Warehouse Valuation Report
* Batch Cost Report
* COGS Report
* Inventory Asset Report
* Cost Revaluation Report
* Historical Valuation Report

---

# ১৭. Integration

Inventory Valuation Module তথ্য গ্রহণ করবে—

* Purchase
* Manufacturing
* Landed Cost
* Stock Adjustment
* Finance

এবং তথ্য প্রদান করবে—

* General Ledger
* Balance Sheet
* Profit & Loss
* Inventory Analytics

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Cost Changed
* Valuation Method Changed
* Cost Revaluation
* Currency Recalculation
* Financial Posting

Delete অনুমোদিত নয়।

---

# ১৯. Future Expansion

* Standard Cost Variance Analysis
* AI Cost Prediction
* Commodity Price Integration
* Dynamic Landed Cost Allocation
* Inflation Adjustment
* Multi-Currency Revaluation

---

# ২০. Notes

Inventory Valuation Relationship

```text id="val003"
Purchase / Production

↓

Inventory Cost

↓

Inventory Value

↓

Finance

↓

Financial Statements
```

Inventory Valuation হলো Inventory এবং Finance-এর সংযোগস্থল।

---

# ২১. Related Documents

* Landed Cost
* Stock
* Inventory Ledger
* Purchase
* Manufacturing
* Finance
* General Ledger

---

# ২২. Conclusion

Inventory Valuation Module হলো FFME ERP-এর **Inventory Financial Value Engine**।

এর মাধ্যমে—

* Accurate Inventory Cost
* Financial Inventory Value
* COGS Calculation
* Balance Sheet Accuracy
* Audit Compliance

নিশ্চিত করা হবে।

FFME-তে Inventory Valuation হলো—

**Inventory Quantity + Cost Method + Cost Components = Inventory Financial Value**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `12-Landed-Cost.md`
