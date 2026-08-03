# Reorder Level Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Reorder Level Management

---

# ১. Purpose

Reorder Level Management Module-এর উদ্দেশ্য হলো কোনো পণ্যের Available Stock নির্ধারিত সীমার নিচে নেমে গেলে সময়মতো পুনরায় ক্রয় (Purchase), উৎপাদন (Production) অথবা Transfer-এর জন্য সতর্কবার্তা (Alert) এবং Replenishment Suggestion প্রদান করা।

এই Module-এর মূল লক্ষ্য—

* Stock Out প্রতিরোধ করা
* অতিরিক্ত Stock (Overstock) কমানো
* Working Capital দক্ষভাবে ব্যবহার করা
* উৎপাদন ও বিক্রয় সচল রাখা

---

# ২. Business Philosophy

Reorder Level মানে **কখন Order দিতে হবে**, কত Order দিতে হবে তা নয়।

FFME-তে Reorder Level শুধুমাত্র Alert তৈরি করবে। পরবর্তী পদক্ষেপ হবে—

* Purchase Requisition
* Production Order
* Stock Transfer Request

Business Rule অনুযায়ী।

---

# ৩. মূল ধারণা

প্রতিটি Product-এর জন্য নিম্নলিখিত মান নির্ধারণ করা যাবে—

* Minimum Stock
* Maximum Stock
* Reorder Level
* Safety Stock
* Reorder Quantity
* Lead Time

---

# ৪. Reorder Workflow

```text id="rol001"
Available Stock

↓

Reorder Level Check

↓

Alert

↓

Purchase / Production / Transfer Suggestion

↓

Approval

↓

Stock Replenishment
```

---

# ৫. Stock Threshold

## Minimum Stock

যার নিচে যাওয়া ঝুঁকিপূর্ণ।

---

## Reorder Level

যখন নতুন Stock সংগ্রহের প্রক্রিয়া শুরু করা উচিত।

---

## Maximum Stock

এর বেশি Stock রাখা উচিত নয়।

---

## Safety Stock

অপ্রত্যাশিত Demand বা Delay মোকাবিলার জন্য সংরক্ষিত Stock।

---

# ৬. Reorder Quantity

প্রতিটি Product-এর জন্য নির্ধারণ করা যাবে—

* Fixed Quantity
* Economic Order Quantity (EOQ)
* Supplier MOQ অনুযায়ী
* Production Batch Size অনুযায়ী

---

# ৭. Lead Time

Lead Time উৎসভেদে ভিন্ন হতে পারে।

উদাহরণ—

* Local Supplier = ৩ দিন
* Imported Material = ৪৫ দিন
* Internal Production = ২ দিন
* Warehouse Transfer = ১ দিন

---

# ৮. Replenishment Source

System নির্ধারণ করতে পারবে—

* Purchase
* Manufacturing
* Warehouse Transfer
* Import Purchase
* Contract Purchase

Product Configuration অনুযায়ী।

---

# ৯. Reorder Scope

Reorder Level নির্ধারণ করা যাবে—

* Company Wise
* Branch Wise
* Warehouse Wise
* Product Wise

প্রয়োজনে Bin Wise-ও ভবিষ্যতে সমর্থিত হবে।

---

# ১০. Alert Levels

System বিভিন্ন স্তরের Alert দেবে—

### Information

Stock কমছে।

---

### Warning

Reorder Level স্পর্শ করেছে।

---

### Critical

Minimum Stock-এর নিচে।

---

### Emergency

Stock Out।

---

# ১১. Automatic Suggestion

System Suggest করতে পারবে—

* Purchase Requisition তৈরি করুন।
* Production শুরু করুন।
* অন্য Warehouse থেকে Transfer করুন।

কিন্তু Auto Approval করবে না (Configuration ব্যতীত)।

---

# ১২. Demand Forecast (Future)

ভবিষ্যতে AI/Forecast Engine ব্যবহার করে—

* Seasonal Demand
* Sales Trend
* Production Trend

বিশ্লেষণ করে Reorder Suggestion আরও উন্নত করা যাবে।

---

# ১৩. Slow & Fast Moving Items

System Product Classification করবে—

* Fast Moving
* Medium Moving
* Slow Moving
* Non Moving

এর ভিত্তিতে Reorder Policy পরিবর্তন করা যাবে।

---

# ১৪. Overstock Management

Maximum Stock অতিক্রম করলে—

System Overstock Alert দেবে।

সম্ভাব্য পদক্ষেপ—

* Promotion
* Transfer
* Production Stop
* Purchase Hold

---

# ১৫. Business Rules

### Rule ROL-001

Available Stock ব্যবহার করে Reorder Check হবে।

Reserved Stock Available Stock-এর অংশ হিসেবে গণ্য হবে না।

---

### Rule ROL-002

Reorder Alert Approval ছাড়া Purchase Order তৈরি করবে না।

---

### Rule ROL-003

Warehouse Wise Reorder Level সমর্থিত হবে।

---

### Rule ROL-004

Negative Stock Reorder Calculation-এ বিবেচিত হবে।

---

### Rule ROL-005

Maximum Stock অতিক্রম করলে Overstock Alert তৈরি হবে।

---

### Rule ROL-006

Lead Time বিবেচনা করে Reorder Suggestion তৈরি হবে।

---

### Rule ROL-007

Safety Stock Reorder Calculation-এর অংশ হবে।

---

# ১৬. Dashboard

Dashboard-এ দেখা যাবে—

* Low Stock
* Reorder Due
* Critical Stock
* Overstock
* Safety Stock Status
* Replenishment Suggestions

---

# ১৭. Reports

* Low Stock Report
* Reorder Report
* Safety Stock Report
* Overstock Report
* Warehouse Wise Reorder Report
* Product Wise Reorder Report
* Lead Time Report
* Replenishment Report

---

# ১৮. Integration

Reorder Level Module তথ্য গ্রহণ করবে—

* Stock
* Sales
* Manufacturing
* Purchase
* Warehouse

এবং তথ্য প্রদান করবে—

* Purchase Requisition
* Production Planning
* Stock Transfer Request
* Inventory Analytics

---

# ১৯. Audit Trail

সংরক্ষণ হবে—

* Threshold Changed
* Reorder Alert Generated
* Alert Acknowledged
* Suggestion Created
* Configuration Updated

Delete অনুমোদিত নয়।

---

# ২০. Future Expansion

* AI Demand Forecast
* Seasonal Reorder Policy
* Vendor Lead Time Learning
* Automatic EOQ Calculation
* Dynamic Safety Stock
* Machine Learning Replenishment

---

# ২১. Notes

Reorder Decision Flow

```text id="rol002"
Available Stock

↓

Reorder Level

↓

Alert

↓

Purchase / Production / Transfer

↓

Inventory Replenishment
```

---

# ২২. Related Documents

* Stock
* Purchase Requisition
* Production Planning
* Warehouse
* Inventory Analytics
* Purchase
* Manufacturing

---

# ২৩. Conclusion

Reorder Level Management Module হলো FFME ERP-এর **Inventory Replenishment Decision Engine**।

এর মাধ্যমে—

* Stock Out প্রতিরোধ
* Overstock নিয়ন্ত্রণ
* সময়মতো Purchase
* সময়মতো Production
* সময়মতো Warehouse Replenishment

নিশ্চিত করা হবে।

FFME-তে Reorder Level হলো—

**Available Stock → Threshold Check → Alert → Replenishment Decision**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `11-Inventory-Valuation.md`
