# Purchase Dashboard

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Dashboard

---

# ১. Purpose

Purchase Dashboard হলো Purchase Department-এর Real-Time Operational Control Center।

এখান থেকে Purchase Manager, Procurement Officer এবং Management বর্তমান Purchase কার্যক্রম পর্যবেক্ষণ, অগ্রাধিকার নির্ধারণ এবং দ্রুত সিদ্ধান্ত গ্রহণ করতে পারবেন।

---

# ২. Business Philosophy

Dashboard শুধুমাত্র Report নয়।

এটি Action-Oriented হবে।

প্রতিটি Widget থেকে সংশ্লিষ্ট Screen-এ সরাসরি যাওয়া যাবে।

---

# ৩. Dashboard Users

Role অনুযায়ী Dashboard পরিবর্তিত হবে।

* Purchase Officer
* Purchase Manager
* Procurement Head
* Factory Manager
* Finance Manager
* Director
* Super Admin

প্রত্যেকে নিজের প্রয়োজনীয় তথ্যই দেখবে।

---

# ৪. Dashboard Layout

## Header

* Current Company
* Branch
* Warehouse
* Financial Year
* Date Filter

---

## KPI Cards

* Today's Purchase
* Today's GRN
* Pending PO
* Pending GRN
* Pending Supplier Invoice
* Pending Payment
* Purchase Return Today
* Supplier Outstanding

---

# ৫. Purchase Pipeline

Live Status

```text id="pd001"
Requisition

↓

RFQ

↓

Quotation

↓

Purchase Order

↓

GRN

↓

Purchase

↓

Payment
```

প্রতিটি Stage-এ Pending সংখ্যা দেখাবে।

---

# ৬. Purchase Alerts

আজকের গুরুত্বপূর্ণ Notification

* PO Expiring
* Contract Expiring
* Supplier Delay
* Price Increase
* Pending Approval
* Low Stock Purchase Required
* Overdue Payment

---

# ৭. Pending Approval

Widget

* Requisition Approval
* RFQ Approval
* Quotation Approval
* PO Approval
* Purchase Approval
* Payment Approval

এক ক্লিকে Approval Screen-এ যাওয়া যাবে।

---

# ৮. Top Suppliers

দেখাবে

* Supplier Name
* Purchase Value
* Delivery Performance
* Quality Score

---

# ৯. Purchase Value Chart

চার্ট

* Daily
* Weekly
* Monthly
* Yearly

---

# ১০. Purchase Cost Trend

Graph

* Average Purchase Cost
* Highest Cost
* Lowest Cost
* Landed Cost

---

# ১১. Pending Deliveries

Widget

| PO | Supplier | Due Date | Status |
| -- | -------- | -------- | ------ |

---

# ১২. Low Stock Purchase Alert

Inventory Module থেকে আসবে।

দেখাবে—

* Product
* Current Stock
* Reorder Quantity
* Expected Stockout Date

---

# ১৩. Production Purchase Alert

Manufacturing Module থেকে।

দেখাবে—

* Production Order
* Missing Raw Material
* Required Date

---

# ১৪. Supplier Performance

Top 10 Suppliers

* Delivery
* Quality
* Price
* Return Rate
* Overall Score

---

# ১৫. Payment Summary

* Due Today
* Due This Week
* Due This Month
* Overdue Payment

---

# ১৬. Purchase Return Summary

* Today
* This Month
* Return Value
* Top Returned Products

---

# ১৭. Quick Actions

Buttons

* New Purchase Requisition
* New RFQ
* New Purchase Order
* New GRN
* New Purchase
* New Payment

---

# ১৮. Purchase Calendar

Calendar View

* Delivery Schedule
* Payment Due
* Contract Expiry
* Supplier Visit
* Purchase Plan

---

# ১৯. Dashboard Filters

সব Widget Filter হবে—

* Company
* Branch
* Warehouse
* Supplier
* Category
* Product
* Purchase Officer
* Date Range

---

# ২০. Personal Dashboard

Purchase Officer দেখবে—

* নিজের Pending PO
* নিজের Supplier
* নিজের Approval
* নিজের Purchase Value

Purchase Manager পুরো Department দেখবে।

---

# ২১. Mobile Dashboard

মোবাইলে দেখাবে—

* KPI Cards
* Pending Approvals
* Purchase Alerts
* Due Payments

---

# ২২. Business Rules

### Rule PDB-001

Dashboard শুধুমাত্র Live Approved Data দেখাবে।

---

### Rule PDB-002

Role অনুযায়ী Widget দৃশ্যমান হবে।

---

### Rule PDB-003

Dashboard থেকে Transaction Delete করা যাবে না।

---

### Rule PDB-004

সব Alert Configuration অনুযায়ী তৈরি হবে।

---

### Rule PDB-005

প্রতিটি Widget Click করলে সংশ্লিষ্ট Module খুলবে।

---

# ২৩. Performance

Dashboard ৫ সেকেন্ডের কম সময়ে Load হওয়া উচিত।

Heavy Analytics Background Cache ব্যবহার করবে।

---

# ২৪. Future Expansion

* AI Purchase Assistant
* Voice Dashboard
* Predictive Alerts
* Smart Procurement Suggestions
* Supplier Risk Indicator
* Executive Dashboard TV Mode

---

# ২৫. Notes

Dashboard Architecture

```text id="pd002"
Purchase

+

Inventory

+

Manufacturing

+

Finance

↓

Live Dashboard

↓

Action
```

Dashboard-এর উদ্দেশ্য Report পড়া নয়।

Dashboard-এর উদ্দেশ্য দ্রুত সিদ্ধান্ত নেওয়া।

---

# ২৬. Related Documents

* Purchase Analytics
* Purchase
* Purchase Order
* Supplier
* Inventory
* Manufacturing
* Finance

---

# ২৭. Conclusion

Purchase Dashboard হলো FFME ERP-এর Procurement Command Center।

এটি Purchase Department-এর প্রতিদিনের কাজ পরিচালনার জন্য Real-Time Control Panel হিসেবে কাজ করবে।

FFME-তে Purchase Dashboard হলো:

**Live Procurement Data → Alerts → Decisions → Actions**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**End of Purchase Dashboard Documentation**
