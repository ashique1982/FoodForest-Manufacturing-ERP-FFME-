# Sales Commission Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Sales Commission Management

---

# ১. Purpose

Sales Commission Module-এর উদ্দেশ্য হলো Sales Representative, Sales Officer, Area Manager, Distributor, Dealer অথবা অন্যান্য Business Partner-এর জন্য Commission, Incentive, Bonus এবং Reward স্বয়ংক্রিয়ভাবে গণনা ও পরিচালনা করা।

FFME-তে Commission শুধুমাত্র Sales Amount-এর উপর নির্ভর করবে না; এটি Primary Sales, Secondary Sales, Collection, Target Achievement এবং Business Rules-এর সমন্বয়ে নির্ধারিত হবে।

---

# ২. Definition

Sales Commission হলো পূর্বনির্ধারিত Business Rules অনুযায়ী Sales Performance-এর ভিত্তিতে প্রদেয় আর্থিক বা অ-আর্থিক প্রণোদনা (Incentive)।

Commission Salary-এর অংশ নয়।

এটি Performance Based Reward।

---

# ৩. Commission Philosophy

FFME-তে Commission-এর ভিত্তি হতে পারে—

* Primary Sales
* Secondary Sales
* Collection
* Target Achievement
* Product Mix
* Brand Focus
* New Customer
* New Outlet
* Special Campaign

---

# ৪. Commission Architecture

```text id="com001"
Sales Target

+

Sales Achievement

+

Collection

+

Business Rules

↓

Commission Engine

↓

Approval

↓

Payroll / Payment
```

---

# ৫. Commission Beneficiaries

Commission পেতে পারে—

* Sales Representative
* Sales Officer
* Territory Officer
* Area Manager
* Regional Manager
* Distributor
* Dealer
* Business Partner

---

# ৬. Commission Types

## ৬.১ Primary Sales Commission

Company → Distributor Sales-এর উপর ভিত্তি করে।

---

## ৬.২ Secondary Sales Commission

Distributor → Retailer Sales-এর উপর ভিত্তি করে।

---

## ৬.৩ Collection Commission

Due Collection-এর উপর ভিত্তি করে।

---

## ৬.৪ Target Achievement Bonus

Target পূরণ বা অতিক্রম করলে।

---

## ৬.৫ Product Commission

নির্দিষ্ট Product বিক্রির জন্য।

---

## ৬.৬ Brand Commission

নির্দিষ্ট Brand-এর জন্য।

---

## ৬.৭ Campaign Commission

নির্দিষ্ট Promotion বা Campaign-এর জন্য।

---

# ৭. Commission Calculation Methods

Commission হতে পারে—

### Fixed Amount

উদাহরণ:

প্রতি Carton = ২০ টাকা

---

### Percentage

উদাহরণ:

Primary Sales-এর ২%

---

### Slab Based

| Achievement | Commission |
| ----------- | ---------: |
| 0–79%       |         0% |
| 80–99%      |         1% |
| 100–119%    |         2% |
| 120%+       |         3% |

---

### Mixed Formula

* Fixed + Percentage
* Percentage + Bonus
* Slab + Fixed

---

# ৮. Target Achievement Commission

উদাহরণ:

Target

20,00,000 টাকা

Actual Sales

22,00,000 টাকা

Achievement

110%

Commission Rule

2%

Commission

44,000 টাকা

---

# ৯. Collection Commission

Collection Target:

10,00,000 টাকা

Actual Collection:

9,50,000 টাকা

Achievement:

95%

Rule অনুযায়ী Collection Incentive গণনা হবে।

---

# ১০. Product Based Commission

Example:

Product A

Commission

২%

Product B

Commission

৫%

Product C

কোন Commission নেই।

---

# ১১. Brand Based Commission

নির্দিষ্ট Brand Promotion-এর জন্য অতিরিক্ত Incentive।

---

# ১২. New Customer Incentive

প্রতি নতুন Active Customer-এর জন্য Commission নির্ধারণ করা যাবে।

---

# ১৩. New Outlet Incentive

প্রতি নতুন Retail Outlet-এর জন্য Bonus নির্ধারণ করা যাবে।

---

# ১৪. Commission Approval Workflow

```text id="com002"
Calculated

↓

Reviewed

↓

Approved

↓

Posted

↓

Paid
```

---

# ১৫. Payroll Integration

Employee Commission Payroll Module-এ পাঠানো যাবে।

---

# ১৬. Distributor Settlement

Distributor Commission হতে পারে—

* Rebate
* Credit Note
* Cash Settlement
* Future Invoice Adjustment

---

# ১৭. Commission Hold Rules

Commission Hold হতে পারে যদি—

* Customer Payment Overdue
* Sales Return Pending
* Fake Sales
* Fraud Detection
* Target Manipulation

---

# ১৮. Adjustment Rules

Commission পুনর্গণনা হবে যদি—

* Sales Return হয়
* Invoice Cancel হয়
* Collection Reverse হয়
* Credit Note ইস্যু হয়

---

# ১৯. Reports

## Commission Register

* Employee Wise
* Distributor Wise

---

## Commission Analysis

* Monthly
* Quarterly
* Yearly

---

## Target vs Commission

Achievement অনুযায়ী।

---

## Collection Incentive Report

---

## Product Incentive Report

---

## Campaign Incentive Report

---

# ২০. Business Rules

### Rule SC-001

Commission শুধুমাত্র Approved Transaction-এর উপর গণনা হবে।

---

### Rule SC-002

Cancelled Sales-এর উপর Commission হবে না।

---

### Rule SC-003

Sales Return হলে Commission পুনঃগণনা হবে।

---

### Rule SC-004

Commission Formula Role অনুযায়ী আলাদা হতে পারে।

---

### Rule SC-005

Commission Approval ছাড়া Payment করা যাবে না।

---

### Rule SC-006

একই Transaction-এর জন্য Duplicate Commission হবে না।

---

### Rule SC-007

Commission Rule-এর Version History সংরক্ষণ হবে।

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Commission Calculated
* Rule Applied
* Approved
* Adjusted
* Paid
* Reversed

---

# ২২. Future Expansion

* AI Performance Incentive
* Dynamic Commission
* Team Commission
* Territory Bonus
* Loyalty Reward
* Annual Performance Bonus
* KPI Based Commission

---

# ২৩. Notes

FFME Commission Engine:

```text id="com003"
Sales

+

Collection

+

Target

+

Business Rules

↓

Commission

↓

Payment
```

Commission শুধুমাত্র Sales Amount-এর উপর নির্ভর করবে না।

এটি সম্পূর্ণ Performance Driven Engine।

---

# ২৪. Related Documents

* Sales Target
* Sales
* Collection
* Pricing
* Discount
* Promotion
* Customer
* Distributor
* Employee
* Payroll
* Ledger
* Dashboard

---

# ২৫. Conclusion

Sales Commission Module FFME ERP-এর Performance Reward Engine।

এর মাধ্যমে—

* Fair Commission
* Target Based Incentive
* Collection Reward
* Distributor Incentive
* Sales Force Motivation

নিশ্চিত করা হবে।

FFME-তে Commission হলো:

**Performance → Achievement → Commission → Reward**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `15-Sales-Analytics.md`
