# Landed Cost Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Inventory Management

**Module:** Landed Cost Management

---

# ১. Purpose

Landed Cost Management Module-এর উদ্দেশ্য হলো কোনো Product বা Material Warehouse-এ পৌঁছানো পর্যন্ত সংঘটিত সকল অতিরিক্ত ব্যয় (Additional Acquisition Cost) Inventory Value-এর সাথে যুক্ত করা।

Landed Cost যুক্ত করার মাধ্যমে Inventory-এর প্রকৃত Cost নির্ধারণ করা হবে।

---

# ২. Business Philosophy

Purchase Price কখনোই Product-এর প্রকৃত Cost নয়।

প্রকৃত Cost হবে—

```text id="lc001"
Purchase Cost

+

Transportation

+

Loading

+

Unloading

+

Insurance

+

Duty

+

Clearing

+

Other Costs

=

Landed Cost
```

---

# ৩. Objectives

Landed Cost Module-এর মাধ্যমে—

* প্রকৃত Inventory Cost নির্ধারণ
* Accurate Manufacturing Cost
* Accurate COGS
* Accurate Profit Calculation
* Financial Compliance

নিশ্চিত করা হবে।

---

# ৪. Landed Cost Sources

Landed Cost তৈরি হতে পারে—

## Local Purchase

* Truck Fare
* Pickup Fare
* Delivery Charge
* Loading
* Unloading
* Labour Cost
* Packaging Cost
* Local Insurance
* Other Charges

---

## Import Purchase

* Freight
* Ocean Freight
* Air Freight
* Customs Duty
* Clearing & Forwarding
* Port Charges
* Insurance
* Handling Charge
* Bank Charge
* Documentation Cost
* Import VAT (যদি Capitalized হয়)
* Other Import Charges

---

## Internal Transfer (Optional)

Configuration অনুযায়ী—

Warehouse Transfer Cost-ও Landed Cost হিসেবে যোগ করা যেতে পারে।

---

# ৫. Landed Cost Workflow

```text id="lc002"
Purchase

↓

Goods Receive

↓

Additional Cost Entry

↓

Allocation

↓

Approval

↓

Inventory Revaluation
```

---

# ৬. Landed Cost Document

প্রতিটি Document-এ থাকবে—

* Document Number
* Purchase Reference
* Supplier
* Currency
* Warehouse
* Total Additional Cost
* Status

---

# ৭. Cost Categories

System Default Categories—

* Freight
* Loading
* Unloading
* Insurance
* Customs Duty
* Clearing Charge
* Port Charge
* Labour
* Fuel
* Bank Charge
* Documentation
* Other Expenses

Custom Category Configuration থেকেও যোগ করা যাবে।

---

# ৮. Allocation Methods

Landed Cost বিভিন্নভাবে Allocate করা যাবে।

## By Quantity

Quantity অনুযায়ী ভাগ হবে।

---

## By Weight

ওজন অনুযায়ী ভাগ হবে।

---

## By Volume

আয়তন অনুযায়ী ভাগ হবে।

---

## By Purchase Value

Purchase Value অনুযায়ী ভাগ হবে।

---

## Manual Allocation

User নিজে Allocate করবেন।

---

# ৯. Multiple Products

একটি Purchase-এ একাধিক Product থাকলে—

Landed Cost নির্বাচিত Allocation Method অনুযায়ী প্রতিটি Product-এ ভাগ হবে।

---

# ১০. Currency Support

Import-এর ক্ষেত্রে—

Foreign Currency থেকে Base Currency Conversion হবে।

Exchange Rate সংরক্ষিত থাকবে।

---

# ১১. Cost Revaluation

Allocation Approval-এর পরে—

Inventory Value Update হবে।

Quantity অপরিবর্তিত থাকবে।

---

# ১২. Accounting Impact

Approval-এর পরে—

Finance Module-এ Journal Entry হবে।

উদাহরণ

```text id="lc003"
Additional Expense

↓

Inventory Asset

↓

General Ledger
```

---

# ১৩. Manufacturing Impact

Raw Material-এর Landed Cost বৃদ্ধি পেলে—

Production Cost স্বয়ংক্রিয়ভাবে প্রভাবিত হবে।

ফলে—

Finished Goods Cost-ও পরিবর্তিত হবে।

---

# ১৪. Business Rules

### Rule LC-001

Approved Purchase ছাড়া Landed Cost তৈরি করা যাবে না।

---

### Rule LC-002

Allocation Method বাধ্যতামূলক।

---

### Rule LC-003

Approved Landed Cost Inventory Value Update করবে।

---

### Rule LC-004

Inventory Quantity পরিবর্তন হবে না।

---

### Rule LC-005

Financial Period Close হওয়ার পরে Landed Cost Edit করা যাবে না (বিশেষ Permission ব্যতীত)।

---

### Rule LC-006

সব Landed Cost Audit Trail-এ সংরক্ষিত হবে।

---

### Rule LC-007

একই Purchase-এর জন্য একাধিক Landed Cost Document সমর্থিত হবে।

---

# ১৫. Dashboard

Dashboard-এ দেখা যাবে—

* Pending Landed Cost
* Allocated Cost
* Import Cost Summary
* Local Transport Cost
* Average Landed Cost
* Inventory Cost Increase

---

# ১৬. Reports

* Landed Cost Register
* Purchase Wise Landed Cost
* Product Wise Landed Cost
* Import Cost Report
* Local Cost Report
* Allocation Report
* Cost Revaluation Report

---

# ১৭. Integration

Landed Cost Module তথ্য গ্রহণ করবে—

* Purchase
* Goods Receive Note
* Import Purchase
* Warehouse
* Finance

এবং তথ্য প্রদান করবে—

* Inventory Valuation
* Manufacturing Cost
* General Ledger
* Inventory Analytics

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Created
* Allocated
* Approved
* Posted
* Reversed

Delete অনুমোদিত নয়।

---

# ১৯. Future Expansion

* Automatic Freight Allocation
* GPS Transport Cost
* AI Cost Allocation
* Container Cost Allocation
* Multi-Stage Import Cost
* Shipping API Integration

---

# ২০. Notes

Landed Cost Relationship

```text id="lc004"
Purchase

↓

Goods Receive

↓

Additional Costs

↓

Allocation

↓

Inventory Valuation

↓

Manufacturing / Sales
```

Landed Cost Inventory-এর প্রকৃত মূল্য নির্ধারণের একটি গুরুত্বপূর্ণ অংশ।

---

# ২১. Related Documents

* Purchase
* Goods Receive Note
* Inventory Valuation
* Manufacturing
* Finance
* General Ledger
* Inventory Ledger

---

# ২২. Conclusion

Landed Cost Module হলো FFME ERP-এর **True Inventory Cost Calculation Engine**।

এর মাধ্যমে—

* Local ও Import উভয় ধরনের অতিরিক্ত ব্যয়
* Accurate Inventory Value
* Accurate Manufacturing Cost
* Accurate COGS
* Accurate Financial Reporting

নিশ্চিত করা হবে।

FFME-তে Landed Cost হলো—

**Purchase Cost + All Acquisition Costs = True Inventory Cost**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `13-Inventory-Ledger.md`
