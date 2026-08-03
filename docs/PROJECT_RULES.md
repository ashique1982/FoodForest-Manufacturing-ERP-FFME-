# FFME PROJECT RULES

**FoodForest Manufacturing ERP (FFME)**

**Version:** 1.0.0 (Draft)

**Status:** Draft

**Document Type:** Development Rule Book

**Owner:** FFME Core Team

**Platform:** WordPress (Future Laravel Compatible)

**Last Updated:** 2026-07-31

---

# ১. উদ্দেশ্য (Purpose)

এই ডকুমেন্টের উদ্দেশ্য হলো FFME-এর সকল Development, Documentation, Database, Business Logic এবং Code-এর জন্য একটি একক (Single Source of Truth) নিয়ম নির্ধারণ করা।

FFME-তে কাজ করা প্রত্যেক Developer, Designer, Tester এবং Contributor এই নিয়ম অনুসরণ করবেন।

---

# ২. মূল নীতি (Golden Rule)

> **Think → Design → Document → Validate → Develop → Test → Release**

এই ধাপ কখনো পরিবর্তন করা যাবে না।

---

# ৩. Development Principles

## Rule 3.1

Business আগে।

Software পরে।

---

## Rule 3.2

Business Logic কখনো UI-এর ভিতরে লেখা যাবে না।

---

## Rule 3.3

Business Logic কখনো Helper Function-এর ভিতরে লেখা যাবে না।

---

## Rule 3.4

একটি তথ্য (Data) একবারই Entry হবে।

পুরো System সেই তথ্য পুনঃব্যবহার করবে।

---

## Rule 3.5

Hardcode করা নিষিদ্ধ।

সম্ভব হলে সবকিছু Configuration-এর মাধ্যমে নিয়ন্ত্রণযোগ্য হবে।

---

# ৪. Module Development Rules

প্রতিটি Module-এ নিম্নলিখিত বিষয় বাধ্যতামূলক—

* Business Purpose
* Workflow
* Actors
* Permissions
* Database Structure
* Financial Impact
* Reports
* Notifications
* Audit
* Future Enhancements

এই তথ্য ছাড়া কোনো Module Coding শুরু হবে না।

---

# ৫. Financial Rules

FFME-এর প্রতিটি Business Event Financial Engine-এ প্রভাব ফেলবে।

উদাহরণ:

* Purchase
* Sales
* Production
* Stock Transfer
* Collection
* Payment
* Return
* Payroll

যেখানে Financial Impact নেই, সেখানে স্পষ্টভাবে উল্লেখ করতে হবে: **No Financial Impact**।

---

# ৬. Documentation Rules

Documentation Coding-এর আগে তৈরি হবে।

Documentation ছাড়া কোনো নতুন Feature গ্রহণযোগ্য হবে না।

সমস্ত Documentation Markdown (.md) Format-এ সংরক্ষণ করা হবে।

---

# ৭. Database Rules

* Naming Convention অনুসরণ করতে হবে।
* Duplicate Data রাখা যাবে না।
* Foreign Key Relationship পরিকল্পনা অনুযায়ী হবে।
* Migration ব্যবহার করা হবে।
* Database Structure পরিবর্তনের আগে Documentation Update করতে হবে।

---

# ৮. Security Rules

* Role Based Access Control (RBAC) বাধ্যতামূলক।
* Permission ছাড়া কোনো Screen Access করা যাবে না।
* Audit Trail সংরক্ষণ করতে হবে।
* গুরুত্বপূর্ণ পরিবর্তনের Log রাখতে হবে।

---

# ৯. UI / UX Rules

FFME-এর Interface হবে—

* সহজ (Simple)
* দ্রুত (Fast)
* Responsive
* Mobile Friendly
* Consistent

সব Screen একই Design System অনুসরণ করবে।

---

# ১০. Performance Rules

* অপ্রয়োজনীয় Query করা যাবে না।
* Code Reuse করতে হবে।
* Cache Strategy ব্যবহার করতে হবে যেখানে প্রয়োজন।
* বড় Report Background Processing সমর্থন করবে।

---

# ১১. Offline Rules

যে Module-এ প্রয়োজন, সেখানে Offline কাজের ব্যবস্থা রাখতে হবে।

বিশেষ করে:

* POS
* Delivery
* Collection
* Order Taking

Offline Data পরবর্তীতে নিরাপদভাবে Sync হবে।

---

# ১২. Backup Rules

Business Data হলো ব্যবহারকারীর সম্পদ।

FFME অবশ্যই Backup ও Recovery Strategy সমর্থন করবে।

---

# ১৩. Customisation Rules

ব্যবহারকারী প্রয়োজনে—

* Custom Fields
* Custom Forms
* Custom Reports
* Custom Workflow

যোগ করতে পারবেন, তবে Core Code পরিবর্তন ছাড়াই।

---

# ১৪. Coding Rules

* PSR-4 অনুসরণ করতে হবে।
* Composer Autoload ব্যবহার করতে হবে।
* পরিষ্কার Namespace ব্যবহার করতে হবে।
* Meaningful Class ও Method Name ব্যবহার করতে হবে।
* Comment-এর পরিবর্তে পরিষ্কার Code লেখাকে অগ্রাধিকার দিতে হবে।

---

# ১৫. Git Rules

* প্রতিটি বড় পরিবর্তন আলাদা Commit হবে।
* স্পষ্ট Commit Message লিখতে হবে।
* Stable অবস্থায় Version Tag তৈরি করতে হবে।
* Main Branch সবসময় Stable থাকবে।

---

# ১৬. Versioning Rules

Semantic Versioning অনুসরণ করা হবে।

উদাহরণ:

* 0.1.0
* 0.2.0
* 1.0.0
* 1.1.0
* 2.0.0

---

# ১৭. Future Compatibility

FFME এমনভাবে তৈরি হবে যাতে ভবিষ্যতে—

* Laravel
* SaaS
* Mobile
* API Platform

সহজে যুক্ত করা যায়।

Business Logic WordPress-এর উপর নির্ভরশীল হবে না।

---
# ১৮. Rule
Architecture Approved না হওয়া পর্যন্ত কোনো নতুন Feature Core Module-এ যোগ করা যাবে না।

এতে Project Scope নিয়ন্ত্রণে থাকবে এবং বারবার Design বদলাতে হবে না।

# ১৯. Final Rule

FFME-এর প্রতিটি নতুন Feature-এর আগে নিম্নলিখিত প্রশ্নগুলোর উত্তর থাকতে হবে—

1. কেন এটি দরকার?
2. কারা ব্যবহার করবে?
3. Workflow কী?
4. Database কীভাবে পরিবর্তিত হবে?
5. Financial Impact কী?
6. Report কী হবে?
7. Permission কী হবে?
8. Audit কীভাবে হবে?
9. Offline কীভাবে কাজ করবে?
10. ভবিষ্যতে এটি সম্প্রসারণযোগ্য কি?

এই প্রশ্নগুলোর উত্তর ছাড়া কোনো Feature Development শুরু হবে না।

---

## FFME Development Promise

আমরা দ্রুত Software তৈরি করব না।

আমরা সঠিক Software তৈরি করব।

আমরা এমন একটি Platform তৈরি করব যা ছোট ব্যবসা থেকে Enterprise পর্যন্ত সবার জন্য নির্ভরযোগ্য, নিরাপদ এবং দীর্ঘমেয়াদে ব্যবহারযোগ্য হবে।

---

**Document Status:** Draft v1.0

**Next Document:** `docs/00-Constitution/01-Project-Overview.md`
