# Vehicle Tax Token Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Fleet Management

**Module:** Vehicle Tax Token Management

---

# ১. Purpose

Vehicle Tax Token Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের সকল Vehicle-এর Road Tax, Tax Token, Renewal, Validity, Payment এবং Compliance ডিজিটালভাবে পরিচালনা করা।

এই Module Fleet Management, Finance, Accounting, Compliance এবং Notification Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Tax Token হলো সরকার কর্তৃক নির্ধারিত সড়ক কর (Road Tax) পরিশোধের প্রমাণপত্র, যা একটি Vehicle-কে আইনগতভাবে সড়কে চলাচলের অনুমতি প্রদান করে।

---

# ৩. Tax Token Philosophy

FFME-তে Tax Token একটি **Legal Compliance Entity**।

প্রতিটি Vehicle-এর Tax Token-এর সম্পূর্ণ History সংরক্ষণ করা হবে এবং Renewal কখনো পূর্বের Record Overwrite করবে না।

---

# ৪. Tax Token Architecture

```text id="tax001"
Vehicle

↓

Tax Token

↓

Payment

↓

Renewal

↓

Expiry

↓

Compliance
```

---

# ৫. Tax Token Profile

প্রতিটি Tax Token Record-এর থাকবে—

## Basic Information

* Tax Token Number
* Receipt Number
* Status

---

## Vehicle Information

* Vehicle
* Registration Number
* Vehicle Model

---

## Validity Information

* Issue Date
* Effective Date
* Expiry Date
* Renewal Due Date

---

## Financial Information

* Tax Amount
* Penalty (Optional)
* Total Paid
* Payment Date
* Payment Method
* Ledger Reference

---

# ৬. Tax Token Status

সম্ভাব্য Status—

* Draft
* Active
* Expiring
* Expired
* Renewed
* Cancelled

---

# ৭. Renewal

Renewal-এর সময়—

* নতুন Receipt Number
* নতুন Expiry Date
* Payment Information

সংরক্ষণ হবে।

পুরনো Record Archive হবে।

---

# ৮. Notification

System Reminder প্রদান করবে—

* 90 Days Before Expiry
* 30 Days Before Expiry
* 7 Days Before Expiry
* Expired Alert

Notification যেতে পারে—

* Dashboard
* Email
* SMS (Future)
* Mobile App (Future)

---

# ৯. Operational Restriction

Company Policy অনুযায়ী—

Expired Tax Token থাকা Vehicle—

* নতুন Trip Assign করা যাবে না
* Compliance Warning দেখাবে
* Fleet Dashboard-এ Highlight হবে

---

# ১০. Accounting Integration

Tax Token Payment Expense হিসেবে Accounting Module-এ Journal Entry-এর মাধ্যমে Post হবে।

Penalty থাকলে সেটিও আলাদাভাবে Expense হিসেবে সংরক্ষণ করা যাবে।

---

# ১১. Reports

## Tax Token Register

* Active
* Expired
* Renewed

---

## Expiry Report

* Upcoming Expiry
* Expired Vehicles

---

## Payment Report

* Paid Tax
* Penalty Paid
* Annual Tax Cost

---

## Compliance Report

* Vehicles without Valid Tax Token
* Vehicles Due for Renewal

---

# ১২. Business Rules

### Rule 001

Tax Token Number অথবা Receipt Number Unique হবে।

---

### Rule 002

Tax Token অবশ্যই একটি Vehicle-এর সাথে সম্পর্কিত হবে।

---

### Rule 003

Expired Tax Token-এর জন্য System Reminder বাধ্যতামূলক।

---

### Rule 004

Tax Token Record Delete করা যাবে না।

Cancelled করা যাবে।

---

### Rule 005

Renewal করলে পূর্বের Record History হিসেবে সংরক্ষিত থাকবে।

---

### Rule 006

Tax Payment Accounting Module-এর মাধ্যমে Ledger-এ Post হবে।

---

# ১৩. Audit Trail

সংরক্ষণ হবে—

* Tax Token Created
* Tax Payment Recorded
* Renewal Completed
* Status Changed
* Expiry Alert Generated

---

# ১৪. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Government BRTA API Verification
* Online Tax Payment Integration
* QR Code Verification
* Digital Tax Token Storage
* Automatic Renewal Reminder

---

# ১৫. Notes

FFME Fleet Structure:

| Entity       | Purpose             |
| ------------ | ------------------- |
| Vehicle      | Tax Holder          |
| Tax Token    | Road Tax Compliance |
| Ledger       | Tax Expense         |
| Payment      | Tax Payment Record  |
| Notification | Renewal Reminder    |

Tax Token Module Fleet Compliance Framework-এর একটি গুরুত্বপূর্ণ অংশ।

---

# ১৬. Related Documents

* Architecture.md
* Vehicle
* Insurance
* Fitness
* Permit
* Ledger
* Journal
* Payment Method
* Notification (Future)

---

# ১৭. Conclusion

Tax Token Module FFME ERP-এর Fleet Legal Compliance Framework-এর একটি অপরিহার্য অংশ।

এর মাধ্যমে—

* Tax Token Management
* Renewal Tracking
* Payment Management
* Expiry Monitoring
* Compliance Control
* Financial Integration

একটি Enterprise Grade Vehicle Tax Compliance System গঠন করা সম্ভব।

FFME-তে Tax Token হলো:

**Road Tax Payment → Legal Compliance → Continuous Fleet Operation**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `12-Permit.md`
