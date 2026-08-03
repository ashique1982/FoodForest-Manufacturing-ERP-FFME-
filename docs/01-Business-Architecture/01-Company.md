# Company

**Document:** Business Architecture

**Version:** 1.0.0 (Draft)

**Status:** Draft

**Owner:** FFME Core Team

**Module:** Company Management

---

# ১. উদ্দেশ্য (Purpose)

Company হলো FFME-এর সর্বোচ্চ Business Entity।

FFME-এর প্রতিটি তথ্য, প্রতিটি ব্যবহারকারী, প্রতিটি লেনদেন, প্রতিটি রিপোর্ট এবং প্রতিটি Business Module কোনো না কোনো Company-এর অধীনে পরিচালিত হবে।

Company ছাড়া FFME-এর কোনো Business Operation শুরু হবে না।

---

# ২. সংজ্ঞা (Definition)

Company বলতে এমন একটি ব্যবসায়িক প্রতিষ্ঠানকে বোঝায় যার নিজস্ব—

* মালিকানা
* আর্থিক ব্যবস্থা
* ব্যবসায়িক নীতি
* কর্মচারী
* সম্পদ
* গ্রাহক
* সরবরাহকারী
* গুদাম
* পণ্য
* হিসাবরক্ষণ

থাকে এবং যা স্বাধীনভাবে ব্যবসা পরিচালনা করতে সক্ষম।

---

# ৩. FFME-তে Company-এর ভূমিকা

Company হলো পুরো সিস্টেমের মূল কেন্দ্র।

নিচের সকল Entity একটি Company-এর অধীনে থাকবে।

* Branch
* Warehouse
* Distributor
* Employee
* Customer
* Supplier
* Product
* Asset
* Vehicle
* Accounts
* Manufacturing
* Inventory
* Sales
* Finance

---

# ৪. Company-এর ধরন (Business Type)

একটি Company এক বা একাধিক Business Type নির্বাচন করতে পারবে।

উদাহরণ—

* Manufacturing
* Distribution
* Wholesale
* Retail
* Service
* Import
* Export
* Agriculture
* Food Processing
* E-commerce

একই Company একাধিক ব্যবসা পরিচালনা করতে পারবে।

---

# ৫. Company Profile

প্রতিটি Company-এর সাধারণ তথ্য থাকবে।

### পরিচিতি

* Company Name
* Short Name
* Logo
* Tagline
* Website
* Email
* Mobile
* Telephone

### আইনগত তথ্য

* Trade License
* BIN
* TIN
* VAT Registration
* Company Registration Number

### ঠিকানা

* Country
* Division / State
* District
* City
* Postal Code
* Address

---

# ৬. Company Settings

Company নিজেই তার ব্যবসার নিয়ম নির্ধারণ করতে পারবে।

যেমন—

* Financial Year
* Currency
* Time Zone
* Date Format
* Language
* Tax Mode
* VAT Enabled / Disabled
* Accounting Method
* Inventory Method
* POS Enabled
* Manufacturing Enabled
* Distribution Enabled

---

# ৭. Company Hierarchy

একটি Company-এর অধীনে একাধিক Branch থাকতে পারে।

প্রতিটি Branch-এর অধীনে থাকতে পারে—

* Warehouse
* Office
* Production Unit
* Sales Office
* Distribution Point

---

# ৮. Company Ownership

FFME দুই ধরনের ব্যবসা সমর্থন করবে।

## প্রথম

Company নিজেই উৎপাদন, ডিস্ট্রিবিউশন, বিক্রয় ও সংগ্রহ পরিচালনা করবে।

এই ক্ষেত্রে—

* Company Delivery Man
* Company Driver
* Company Store Keeper

সব Company-এর কর্মচারী।

---

## দ্বিতীয়

Company শুধুমাত্র উৎপাদন করবে।

Distribution করবে স্বাধীন Distributor।

এই ক্ষেত্রে—

Distributor নিজেই নিয়োগ দিতে পারবে—

* Delivery Man (Distributor)
* Driver (Distributor)
* Store Keeper (Distributor)

এদের বেতন, Bonus, TA/DA, Incentive Distributor নিজেই বহন করবে।

---

# ৯. Company Responsibility

Company-এর দায়িত্ব—

* Product Management
* Manufacturing
* Financial Management
* HR Management
* Business Policy
* Sales Policy
* Distribution Policy
* Security Policy

---

# ১০. Financial Relationship

Company-এর নিজস্ব থাকবে—

* Chart of Accounts
* Financial Year
* Cost Center
* Profit Center
* Bank Accounts
* Cash Accounts

সমস্ত আর্থিক লেনদেন Company-এর Financial Structure অনুসরণ করবে।

---

# ১১. Permission Relationship

Company-এর Permission Structure Role Based হবে।

উদাহরণ—

* Company Owner
* Super Admin
* Director
* General Manager
* Department Head
* Zonal Manager
* Area Manager
* Sales Representative
* Office Staff
* Factory Staff
* Distributor
* Customer Portal User

প্রতিটি Role-এর Permission আলাদা হবে।

---

# ১২. Company Dashboard

Company Dashboard-এ Real-time দেখা যাবে—

* Total Sales
* Total Collection
* Outstanding
* Stock Value
* Cash in Hand
* Bank Balance
* Production
* Orders
* Delivery Status
* Employee Attendance
* Profit Summary

---

# ১৩. Reports

Company পর্যায়ে নিম্নলিখিত রিপোর্ট পাওয়া যাবে—

* Sales Report
* Purchase Report
* Production Report
* Inventory Report
* Collection Report
* Outstanding Report
* Profit & Loss
* Balance Sheet
* Cash Flow
* Trial Balance
* VAT / Tax Report
* Employee Report

---

# ১৪. Business Rules

* একটি Company-এর সমস্ত তথ্য অন্য Company দেখতে পারবে না।
* Company Data সম্পূর্ণভাবে আলাদা থাকবে।
* Company-এর Financial Data আলাদা থাকবে।
* Company-এর User অন্য Company-তে Login করতে পারবে না (যদি Multi-company Permission না থাকে)।
* প্রতিটি Transaction Company-এর পরিচয় বহন করবে।

---

# ১৫. ভবিষ্যৎ সম্প্রসারণ (Future Enhancements)

ভবিষ্যতে Company Module-এ যুক্ত হতে পারে—

* Holding Company
* Group of Companies
* Franchise Management
* International Branch
* Multi-Currency Accounting
* Consolidated Financial Statements
* Inter-Company Transactions

---

# ১৬. উপসংহার

Company হলো FFME-এর কেন্দ্রবিন্দু।

এই Module-এর উপর ভিত্তি করেই Branch, Warehouse, Manufacturing, Distribution, Sales, Finance, HR এবং অন্যান্য সকল Module নির্মিত হবে।

এই Architecture পরিবর্তন না করেই ভবিষ্যতে শতাধিক Module যুক্ত করা সম্ভব হবে।
