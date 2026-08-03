# Customer (Business Partner Role)

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Entity:** Business Partner

**Module:** Customer Management

---

# ১. Purpose

Customer Module-এর উদ্দেশ্য হলো Company-এর সাথে সম্পর্কিত সকল ক্রেতা, Buyer, Retailer, Wholesaler, Corporate এবং Institutional Customer-এর Sales Relationship, Credit Management, Collection, Outstanding এবং Customer Service একটি সমন্বিত ডিজিটাল কাঠামোর মাধ্যমে পরিচালনা করা।

FFME Architecture অনুযায়ী Customer কোনো Root Master Entity নয়।

Customer হলো একটি **Business Partner Role**।

---

# ২. Definition

Customer হলো এমন একজন ব্যক্তি, প্রতিষ্ঠান অথবা Business Partner, যিনি Company-এর Product বা Service গ্রহণ করেন এবং যার সাথে Company-এর Sales Relationship থাকে।

Customer হতে পারে—

* Individual Buyer
* Retail Shop
* Wholesale Buyer
* Corporate Customer
* Institutional Customer
* Government Organization

---

# ৩. Customer as Business Partner Role

FFME-তে Customer একটি Role।

Architecture:

```text
Business Partner

        │

        ├── Customer

        ├── Distributor

        ├── Supplier

        ├── Dealer

        └── Other Roles
```

একজন Business Partner একাধিক Role ধারণ করতে পারবেন।

উদাহরণ:

```text
Business Partner

Rahman Traders


Business Role

✓ Customer

✓ Distributor


Business Type

✓ Wholesaler

✓ Retailer
```

এক্ষেত্রে একই Business Partner-এর জন্য আলাদা Customer Record তৈরি হবে না।

---

# ৪. Scope

Customer Module পরিচালনা করবে—

* Customer Registration
* Customer Classification
* Sales Relationship
* Credit Management
* Pricing
* Order Management
* Collection
* Outstanding
* Customer History
* Customer Reports

---

# ৫. Customer Classification

Customer Role অনুযায়ী Classification থাকবে।

---

## Customer Type

* Retail Customer
* Wholesale Customer
* Corporate Customer
* Institutional Customer
* Government Customer
* Online Customer
* Export Customer

---

## Payment Type

* Cash Customer
* Credit Customer
* Advance Customer

---

## Sales Channel

* Direct Sales
* Distributor Sales
* Online Sales
* Retail Sales
* Corporate Sales

---

# ৬. Customer Profile

Customer Profile Business Partner Profile-এর উপর ভিত্তি করে তৈরি হবে।

---

## Basic Information

* Business Partner Code
* Customer Code
* Customer Name
* Contact Person
* Mobile Number
* Email
* Website

---

## Business Information

* Business Name
* Business Type
* Customer Category
* Registration Date
* Status

---

## Legal Information

প্রয়োজন অনুযায়ী—

* Trade License
* BIN
* TIN
* National ID
* Company Registration

---

# ৭. Customer Address & Territory

Customer-এর Address এবং Territory আলাদা Entity হিসেবে পরিচালিত হবে।

---

## Address

সংরক্ষণ করা হবে—

* Country
* Division
* District
* Upazila
* Area
* Full Address
* Location

---

## Territory Assignment

Customer একটি Territory-এর অধীনে থাকবে।

Territory ব্যবহার হবে—

* Sales Planning
* Sales Reporting
* Route Planning
* Customer Analysis

---

Example:

```text
Sylhet District

↓

Golapganj Territory

↓

Retail Customer
```

---

# ৮. Customer Contact Management

একজন Customer-এর একাধিক Contact Person থাকতে পারে।

---

## Contact Information

* Name
* Designation
* Mobile
* Email
* Preferred Contact Method

---

# ৯. Sales Relationship

Customer-এর সাথে Company-এর Sales Relationship সংরক্ষণ করা হবে।

---

## Sales Information

* Assigned Sales Representative
* Assigned Distributor
* Sales Territory
* Sales Route (যদি প্রযোজ্য)
* Customer Visit Schedule

---

## Customer Order Flow

```text
Customer

↓

Sales Order

↓

Approval

↓

Invoice

↓

Delivery

↓

Collection

↓

Ledger Update
```

---

# ১০. Customer Pricing

Customer অনুযায়ী Pricing Policy নির্ধারণ করা যাবে।

---

## Pricing Types

* Standard Price
* Distributor Price
* Wholesale Price
* Retail Price
* Special Contract Price

---

## Discount Policy

সমর্থিত হবে—

* Product Discount
* Quantity Discount
* Seasonal Discount
* Customer Specific Discount

---

# ১১. Credit Management

Credit Customer-এর জন্য Credit Policy থাকবে।

---

## Credit Information

* Credit Limit
* Credit Days
* Opening Balance
* Outstanding
* Payment History

---

## Credit Rules

System যাচাই করবে—

* Existing Outstanding
* Credit Limit
* Payment Delay

তারপর নতুন Order অনুমোদন হবে।

---

# ১২. Customer Ledger

প্রতিটি Customer-এর Financial Ledger থাকবে।

---

## Ledger Information

* Opening Balance
* Sales Invoice
* Payment Receive
* Return
* Adjustment
* Outstanding

---

## Outstanding Calculation

```text
Previous Outstanding

+

Current Invoice

-

Payment Receive

=

Current Outstanding
```

---

# ১৩. Payment & Collection

Customer Payment বিভিন্ন মাধ্যমে গ্রহণ করা যাবে।

---

## Payment Methods

* Cash
* Bank Transfer
* Cheque
* Mobile Banking
* Online Payment

---

## Collection Rules

* Receipt Generate হবে।
* Partial Payment সমর্থিত হবে।
* Advance Payment সমর্থিত হবে।
* Payment History সংরক্ষিত হবে।

---

# ১৪. Customer Return

Customer Product Return করতে পারবেন।

Workflow:

```text
Customer Return Request

↓

Product Receive

↓

Quality Check

↓

Stock Update

↓

Credit Adjustment
```

---

# ১৫. Customer Documents

সংরক্ষণ করা যাবে—

* Agreement
* Trade License
* Contract
* Payment Documents
* Other Attachments

---

# ১৬. Customer Dashboard

Customer Dashboard-এ থাকবে—

## Sales

* Total Sales
* Monthly Sales
* Order History

---

## Finance

* Outstanding
* Payment History
* Credit Status

---

## Service

* Complaint
* Return
* Support History

---

# ১৭. Reports

## Sales Reports

* Customer Wise Sales
* Territory Wise Sales
* Product Wise Sales
* Monthly Sales

---

## Financial Reports

* Outstanding Report
* Collection Report
* Credit Report
* Payment History

---

## Customer Reports

* Active Customer
* Inactive Customer
* New Customer
* Customer Growth

---

# ১৮. Business Rules

### Rule 001

Customer অবশ্যই একটি Business Partner Role হবে।

---

### Rule 002

একটি Business Partner একাধিক Role ধারণ করতে পারবে।

---

### Rule 003

Customer Code Unique হতে হবে।

---

### Rule 004

Credit Customer-এর Credit Limit নির্ধারিত থাকতে হবে।

---

### Rule 005

Sales Invoice ছাড়া Outstanding তৈরি হবে না।

---

### Rule 006

Customer Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 007

Customer Territory পরিবর্তনের History সংরক্ষণ করতে হবে।

---

### Rule 008

Customer Payment অবশ্যই Ledger Update করবে।

---

# ১৯. Audit Trail

Customer সম্পর্কিত সকল গুরুত্বপূর্ণ পরিবর্তন সংরক্ষণ হবে।

---

## Audit Events

* Customer Created
* Customer Updated
* Credit Limit Changed
* Territory Changed
* Price Policy Changed
* Status Changed
* Payment Updated

---

## Audit Information

* User
* Date & Time
* Old Value
* New Value
* Remarks

---

# ২০. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Customer Mobile App
* Customer Portal
* Loyalty Program
* Customer Ranking
* AI Customer Recommendation
* Automated Marketing
* CRM Integration
* Customer Behaviour Analysis

---

# ২১. Notes

FFME Architecture-এ—

| Entity           | Meaning                       |
| ---------------- | ----------------------------- |
| Business Partner | ব্যক্তি বা প্রতিষ্ঠান         |
| Customer Role    | Company-এর সাথে ক্রয় সম্পর্ক |
| Business Type    | Partner-এর ব্যবসার ধরন        |
| Territory        | ব্যবসায়িক এলাকা              |
| Route            | Sales Operation Area          |

Customer এবং Business Partner একই বিষয় নয়।

Customer হলো Business Partner-এর একটি Role।

---

# ২২. Related Documents

* Architecture.md
* ADR-0003 Shared Masters
* ADR-0004 Business Partner Roles
* ADR-0005 Territory Model
* ADR-0006 Multi-UOM
* Business Partner
* Distributor
* Supplier
* Sales
* Inventory
* Finance
* CRM

---

# ২৩. Conclusion

Customer Module FFME-এর Sales এবং Financial Relationship-এর একটি গুরুত্বপূর্ণ অংশ।

Business Partner Architecture ব্যবহার করার কারণে—

* Duplicate Customer তৈরি হবে না।
* Distributor এবং Customer Relationship একসাথে পরিচালনা করা যাবে।
* Sales History সংরক্ষিত থাকবে।
* Credit এবং Collection সহজ হবে।
* Future CRM Expansion সহজ হবে।

FFME-তে Customer হলো:

**Business Partner → Customer Role**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `09-Supplier.md`
