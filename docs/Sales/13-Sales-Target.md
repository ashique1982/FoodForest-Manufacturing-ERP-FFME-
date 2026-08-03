# Sales Target Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Sales Management

**Module:** Sales Target Management

---

# ১. Purpose

Sales Target Module-এর উদ্দেশ্য হলো FFME ERP-তে Company, Distributor, Sales Representative, Territory, Branch এবং অন্যান্য Business Entity-এর জন্য বিভিন্ন ধরনের Sales Target নির্ধারণ, Achievement পরিমাপ এবং Performance Analysis করা।

FFME-তে Sales Target শুধুমাত্র Invoice ভিত্তিক নয়; Distribution Business-এর বাস্তব Workflow অনুযায়ী Primary Sales, Secondary Sales এবং Lifting আলাদাভাবে বিশ্লেষণ করা হবে।

---

# ২. Definition

Sales Target হলো নির্দিষ্ট সময়ের মধ্যে নির্ধারিত Business Goal।

Target হতে পারে—

* Sales Amount
* Sales Quantity
* Primary Sales
* Secondary Sales
* Collection
* New Customer
* New Outlet
* Product
* Brand

---

# ৩. Sales Hierarchy

FFME Distribution Model

```text id="st001"
Company

↓

Primary Sales

↓

Distributor

↓

Secondary Sales

↓

Retailer

↓

Consumer
```

---

# ৪. Sales Definition

## Primary Sales

Company → Distributor

এটি কোম্পানির Revenue।

Company-এর Profit এই Sales থেকে গণনা হবে।

---

## Secondary Sales

Distributor → Retailer

এটি Distributor-এর Revenue।

Distributor-এর Profit এই Sales থেকে গণনা হবে।

Company এটি Market Intelligence হিসেবে ব্যবহার করবে।

---

## Lifting

Distributor কোম্পানি থেকে যত টাকার Product গ্রহণ করেছে তাকে Lifting বলা হবে।

FFME-তে Lifting = Primary Sales।

---

# ৫. Business Philosophy

একই Transaction দুই প্রতিষ্ঠানের কাছে দুইভাবে গণনা হবে।

## Company View

Distributor-এর কাছে Sales

↓

Primary Sales

↓

Company Revenue

---

## Distributor View

Company থেকে Purchase

↓

নিজের Stock

↓

Retail Market Sales

↓

Distributor Revenue

---

# ৬. Sales Target Types

## Primary Sales Target

Company-এর Target।

Example:

Sales Representative

↓

20,00,000 BDT

---

## Secondary Sales Target

Distributor-এর Market Sales Target।

---

## Collection Target

Customer Collection।

---

## Quantity Target

Carton

Packet

Piece

Kg

---

## Product Target

নির্দিষ্ট Product।

---

## Brand Target

Brand Wise।

---

## Customer Target

New Customer

Active Customer

---

## Outlet Target

নতুন দোকান

Active দোকান

---

# ৭. Target Assignment

Target দেওয়া যাবে—

* Company
* Branch
* Territory
* Distributor
* Sales Manager
* Sales Representative
* Delivery Representative

---

# ৮. Sales Representative Target

Example:

```text id="st002"
Target

20,00,000
```

Distributor Demand

```text id="st003"
15,00,000
```

Demand Approved

↓

Distributor Lifted

15,00,000

Sales Representative Achievement

=

15,00,000

Achievement %

=

75%

````

---

# ৯. Demand Editing Rule

যদি Distributor Demand পরিবর্তন করা হয়—

Example

Demand

15,00,000

↓

Approved Sales

14,20,000

তাহলে Achievement হবে

14,20,000

অর্থাৎ Final Company Sales Value-ই Achievement হবে।

---

# ১০. Lifting Rule

FFME-তে Company Sales নির্ধারণ হবে Distributor Lifting দ্বারা।

Formula

```text id="st004"
Company Sales

=

Distributor Lifting
````

এটাই Company Revenue।

---

# ১১. Secondary Sales Rule

Distributor Market-এ বিক্রি করলে—

Example

```text id="st005"
Distributor Purchase

15,00,000

↓

Retail Sales

19,50,000
```

Company View

Primary Sales

15,00,000

Distributor View

Secondary Sales

19,50,000

---

# ১২. Profit Perspective

## Company Profit

```text id="st006"
Primary Sales

-

Production Cost

=

Company Profit
```

---

## Distributor Profit

```text id="st007"
Secondary Sales

-

Distributor Purchase Cost

=

Distributor Profit
```

---

# ১৩. Achievement Formula

```text id="st008"
Achievement %

=

Actual Sales

÷

Target

×

100
```

---

# ১৪. KPI

FFME KPI

* Target
* Achievement
* Achievement %
* Growth %
* Lifting
* Secondary Sales
* Collection
* Outstanding
* Active Customer
* New Customer

---

# ১৫. Dashboard

## Company Dashboard

* Primary Sales
* Lifting
* Company Profit
* Collection
* Outstanding
* Territory Performance

---

## Distributor Dashboard

* Purchase From Company
* Secondary Sales
* Market Collection
* Gross Profit
* Outstanding Retailers

---

## Sales Representative Dashboard

* Target
* Achievement
* Target %
* Active Outlet
* New Outlet
* Collection
* Visit Performance

---

# ১৬. Reports

## Target vs Achievement

Salesperson Wise

---

## Territory Performance

---

## Distributor Performance

Primary Sales

Secondary Sales

---

## Product Target Report

---

## Brand Target Report

---

## Monthly Trend

---

## Quarterly Trend

---

## Yearly Performance

---

# ১৭. Business Rules

### Rule ST-001

Primary Sales এবং Secondary Sales আলাদা Transaction।

---

### Rule ST-002

Company Revenue শুধুমাত্র Primary Sales থেকে তৈরি হবে।

---

### Rule ST-003

Distributor Revenue Secondary Sales থেকে তৈরি হবে।

---

### Rule ST-004

Company Profit Primary Sales ভিত্তিক হবে।

---

### Rule ST-005

Distributor Profit Secondary Sales ভিত্তিক হবে।

---

### Rule ST-006

Sales Representative Achievement Final Approved Company Sales অনুযায়ী গণনা হবে।

---

### Rule ST-007

Cancelled Sales Achievement থেকে বাদ যাবে।

---

### Rule ST-008

Sales Return হলে Achievement ও Revenue পুনঃসমন্বয় হবে।

---

### Rule ST-009

Target Period হতে পারে—

* Daily
* Weekly
* Monthly
* Quarterly
* Half-Yearly
* Yearly

---

# ১৮. Audit Trail

সংরক্ষণ হবে—

* Target Created
* Target Modified
* Target Approved
* Achievement Updated
* Manual Adjustment
* Target Closed

---

# ১৯. Future Expansion

* AI Target Recommendation
* Predictive Sales Target
* Seasonal Target Planning
* Territory Potential Analysis
* Sales Forecast
* Incentive Calculation
* Commission Automation

---

# ২০. Notes

FFME Sales Performance Model

```text id="st009"
Company

↓

Primary Sales

↓

Distributor

↓

Secondary Sales

↓

Retailer

↓

Consumer
```

একই Product-এর জন্য দুইটি Sales Layer থাকবে—

* Company Business Layer
* Distributor Business Layer

উভয় প্রতিষ্ঠানের Profit & Loss পৃথকভাবে গণনা করা হবে।

---

# ২১. Related Documents

* Sales Overview
* Demand
* Sales Order
* Sales
* Collection
* Pricing
* Promotion
* Customer
* Distributor
* Territory
* Product
* Brand
* Ledger
* Dashboard

---

# ২২. Conclusion

Sales Target Module শুধুমাত্র Target Tracking নয়; এটি FFME ERP-এর Performance Intelligence Engine।

এই Module-এর মাধ্যমে—

* Company Primary Sales
* Distributor Secondary Sales
* Sales Representative Achievement
* Territory Performance
* Profit Layer Analysis
* Business Growth Measurement

একই Framework-এর মধ্যে পরিচালিত হবে।

FFME-তে Sales Target হলো:

**Target → Lifting → Primary Sales → Secondary Sales → Achievement → Profit Analysis**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `14-Sales-Commission.md`
