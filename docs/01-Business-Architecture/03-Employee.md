# Employee

**Document:** Business Architecture

**Version:** 1.0.0 (Draft)

**Status:** Draft

**Owner:** FFME Core Team

**Parent Entity:** Company / Business Owner

**Module:** Employee Management

---

# ১. উদ্দেশ্য (Purpose)

Employee হলো FFME-এর একটি গুরুত্বপূর্ণ Business Entity, যার মাধ্যমে একটি প্রতিষ্ঠানের সকল মানবসম্পদ ডিজিটালভাবে পরিচালিত হবে।

FFME-তে Employee Management শুধু কর্মীর তথ্য সংরক্ষণ করবে না, বরং—

* নিয়োগ
* পরিচয়
* দায়িত্ব
* বিভাগ
* কাজের এলাকা
* বেতন
* Incentive
* Attendance
* Performance
* Expense
* Permission

সম্পূর্ণভাবে পরিচালনা করবে।

---

# ২. সংজ্ঞা (Definition)

Employee বলতে এমন একজন ব্যক্তিকে বোঝায়, যিনি কোনো Company, Distributor অথবা Business Owner-এর অধীনে নির্দিষ্ট দায়িত্ব পালন করেন এবং যার কাজের জন্য প্রতিষ্ঠান আর্থিক বা প্রশাসনিক দায়িত্ব বহন করে।

---

# ৩. Employee Ownership Model

FFME-তে Employee-এর সবচেয়ে গুরুত্বপূর্ণ বিষয় হলো:

**কে কর্মী নিয়োগ দিয়েছে এবং কে তার দায়িত্ব বহন করছে।**

Employee দুই ধরনের হতে পারে।

---

# ৩.১ Company Employee

যে কর্মী সরাসরি Company নিয়োগ দেয় এবং নিয়ন্ত্রণ করে।

উদাহরণ:

* Factory Worker
* Production Manager
* Accountant
* Sales Officer
* Company Delivery Man
* Company Driver
* Store Keeper

এদের:

* Salary
* Bonus
* TA/DA
* Incentive
* Training Cost

Company বহন করবে।

---

# ৩.২ Distributor Employee

যে কর্মী Distributor নিজে নিয়োগ দেয় এবং নিয়ন্ত্রণ করে।

উদাহরণ:

* Delivery Man (Distributor)
* Driver (Distributor)
* Distributor Store Keeper
* Distributor Sales Person

এদের:

* Salary
* Bonus
* TA/DA
* Incentive
* Other Benefits

Distributor বহন করবে।

---

# ৪. Employee Employer Relationship

Structure:

```
Company

 |
 |
 ├── Company Employee
 |
 └── Distributor

          |
          └── Distributor Employee
```

একজন Distributor-এর Employee Company Employee হিসেবে গণ্য হবে না।

---

# ৫. Employee Types

FFME বিভিন্ন ধরনের Employee সমর্থন করবে।

## Management

* Owner
* Director
* Manager
* Department Head

---

## Sales

* Sales Manager
* Sales Representative
* Territory Officer
* Field Sales Officer

---

## Distribution

* Delivery Man (Company)
* Delivery Man (Distributor)
* Driver (Company)
* Driver (Distributor)

---

## Factory

* Production Worker
* Supervisor
* Quality Controller
* Technician

---

## Office

* Accountant
* HR Officer
* Admin Officer

---

# ৬. Employee Profile

প্রতিটি Employee-এর থাকবে:

## Personal Information

* Full Name
* Photo
* Date of Birth
* Gender
* Mobile Number
* Email
* Address
* Emergency Contact

---

## Identity Information

* National ID
* Passport
* Employee ID
* Joining Date

---

## Employment Information

* Employer Type
* Company
* Distributor
* Branch
* Department
* Designation
* Reporting Manager
* Employment Status

---

# ৭. Employee ID Card

FFME Digital Employee ID Card সমর্থন করবে।

ID Card-এ থাকবে:

* Employee Photo
* Name
* Employee ID
* Designation
* Company/Distributor Name
* Contact
* QR Code

QR Code দিয়ে:

* Employee Verification
* Attendance
* Profile Access

করা যাবে।

---

# ৮. Recruitment Workflow

```
Employee Requirement

        ↓

Application Form

        ↓

Approval

        ↓

Interview

        ↓

Selection

        ↓

Employee Profile Create

        ↓

ID Card Generate

        ↓

Employee Active
```

---

# ৯. Custom Employee Form

FFME Default Employee Form প্রদান করবে।

তবে User নিজের প্রয়োজন অনুযায়ী Custom Field তৈরি করতে পারবে।

উদাহরণ:

* Blood Group
* Skill
* Certificate
* Experience
* Previous Employer
* Driving License
* Bank Account

---

# ১০. Attendance Management

Employee Attendance:

* Present
* Absent
* Late
* Leave
* Holiday

সমর্থন করবে।

Attendance হতে পারে:

* Manual
* Mobile Check-in
* GPS Based
* Biometric Integration

---

# ১১. Salary & Compensation

Employee Compensation:

* Basic Salary
* Allowance
* Bonus
* Incentive
* Commission
* Deduction
* Overtime

সমর্থন করবে।

---

# ১২. TA/DA Management

বিশেষ করে Field Employee-এর জন্য:

* Travel Allowance
* Daily Allowance
* Fuel Cost
* Transport Cost

ডিজিটালি হিসাব হবে।

---

# ১৩. Incentive Management

Sales এবং Distribution Employee-এর জন্য:

* Target Based Incentive
* Sales Based Incentive
* Collection Based Incentive
* Product Based Incentive

সমর্থন করবে।

---

# ১৪. Employee Permission

Employee Access Role Based হবে।

উদাহরণ:

Sales Representative:

Access:

* Assigned Customer
* Order Entry
* Collection

Access থাকবে না:

* Financial Report
* Employee Data
* Admin Settings

---

# ১৫. Employee Dashboard

Employee অনুযায়ী Dashboard পরিবর্তিত হবে।

## Sales Person

* Today's Target
* Orders
* Collection
* Customer List

## Delivery Man

* Delivery List
* Route
* Completed Delivery

## Manager

* Team Performance
* Sales Report
* Approval

---

# ১৬. Financial Impact

Employee সম্পর্কিত Financial Transaction:

* Salary Expense
* Bonus Expense
* TA/DA Expense
* Incentive Expense

Finance Module-এর সাথে যুক্ত হবে।

---

# ১৭. Reports

## HR Report

* Employee List
* Department Report
* Joining Report

---

## Attendance Report

* Daily Attendance
* Monthly Attendance
* Leave Report

---

## Financial Report

* Salary Expense
* Incentive Report
* Employee Cost Report

---

# ১৮. Business Rules

### Rule 001

প্রতিটি Employee-এর একজন Employer থাকবে।

---

### Rule 002

Distributor Employee-এর খরচ Distributor-এর Business Expense হিসেবে গণ্য হবে।

---

### Rule 003

Company Employee-এর খরচ Company Expense হিসেবে গণ্য হবে।

---

### Rule 004

Employee Permission তার Role অনুযায়ী নির্ধারিত হবে।

---

### Rule 005

Employee Disable হলেও Historical Data সংরক্ষিত থাকবে।

---

# ১৯. Audit

Employee সম্পর্কিত সকল পরিবর্তন Log হবে।

যেমন:

* Created
* Updated
* Salary Changed
* Role Changed
* Status Changed

---

# ২০. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে:

* Employee Mobile App
* Performance Score
* AI Performance Analysis
* Training Management
* Recruitment Portal
* Payroll Automation

---

# ২১. উপসংহার

Employee Module FFME-এর মানবসম্পদ ব্যবস্থাপনার ভিত্তি।

এই Architecture-এর মাধ্যমে Company, Distributor এবং Business Owner সবাই নিজের নিয়ন্ত্রণাধীন কর্মীদের আলাদাভাবে পরিচালনা করতে পারবে এবং সঠিক Financial হিসাব বজায় থাকবে।

---

**Document Status:** Draft v1.0

**Next Document:** `04-Distributor.md`
