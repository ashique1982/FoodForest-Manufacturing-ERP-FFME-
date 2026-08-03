# Import Purchase Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Import Purchase

---

# ১. Purpose

Import Purchase Module-এর উদ্দেশ্য হলো বিদেশি Supplier থেকে পণ্য আমদানির সম্পূর্ণ প্রক্রিয়া পরিচালনা করা।

FFME-তে Import Purchase শুধুমাত্র Purchase নয়।

এটি Import Procurement Lifecycle Management।

---

# ২. Business Philosophy

একটি Local Purchase কয়েক ঘণ্টায় সম্পন্ন হতে পারে।

একটি Import Purchase সম্পন্ন হতে পারে—

* ৩০ দিন
* ৬০ দিন
* ৯০ দিন
* এমনকি ১৮০ দিনেও।

তাই Import Purchase-এর প্রতিটি ধাপ আলাদাভাবে Track করা হবে।

---

# ৩. Import Workflow

```text id="ip001"
Import Requisition

↓

RFQ

↓

Supplier Quotation

↓

Proforma Invoice (PI)

↓

Approval

↓

LC / Advance Payment

↓

Production

↓

Shipment

↓

Bill of Lading

↓

Customs Clearance

↓

Goods Receive Note

↓

Purchase

↓

Landed Cost

↓

Inventory
```

---

# ৪. Import Sources

Import হতে পারে—

* Raw Material
* Machinery
* Spare Parts
* Packaging Materials
* Finished Goods
* Capital Equipment

---

# ৫. Import Profile

## Basic Information

* Import Number
* Supplier
* Country
* Port of Loading
* Port of Destination
* Currency
* Incoterm

---

## Reference

* Purchase Order
* Proforma Invoice
* LC Number
* Bill of Lading
* Commercial Invoice

---

# ৬. Incoterms

System সমর্থন করবে—

* EXW
* FOB
* CFR
* CIF
* FCA
* CPT
* CIP
* DAP
* DDP

---

# ৭. Proforma Invoice

সংরক্ষণ হবে—

* PI Number
* PI Date
* Supplier
* Product
* Quantity
* Price
* Currency
* Validity

---

# ৮. Letter of Credit (LC)

LC Information

* LC Number
* LC Date
* Bank
* Amount
* Expiry Date
* Status

একটি Import Purchase-এ একাধিক LC সমর্থিত হতে পারে।

---

# ৯. Shipment

Shipment Information

* Shipment Number
* Vessel
* Container
* Departure Date
* Arrival Date
* Tracking Status

---

# ১০. Shipping Documents

সংরক্ষণ হবে—

* Bill of Lading (BL)
* Air Waybill (AWB)
* Packing List
* Commercial Invoice
* Certificate of Origin
* Insurance Certificate
* Fumigation Certificate (যদি প্রযোজ্য)

---

# ১১. Customs Clearance

দেখানো হবে—

* CNF Agent
* Bill of Entry
* Assessment
* Duty
* VAT
* AIT
* Port Charges
* Release Date

---

# ১২. Import Charges

Landed Cost-এ যুক্ত হবে—

* Freight
* Marine Insurance
* Customs Duty
* VAT
* AIT
* CNF Charge
* Port Charge
* Wharf Charge
* Demurrage
* Transport
* Other Charges

---

# ১৩. Landed Cost Allocation

সব Import Cost Product অনুযায়ী ভাগ হবে।

Allocation Method

* Quantity Wise
* Weight Wise
* Volume Wise
* Value Wise

---

# ১৪. Multi Currency

সংরক্ষণ হবে—

* Purchase Currency
* LC Currency
* Exchange Rate
* Base Currency

Exchange Gain/Loss Finance Module-এ পোস্ট হবে।

---

# ১৫. Goods Receive

Customs Release-এর পরে—

GRN তৈরি হবে।

এরপর Purchase Final হবে।

---

# ১৬. Import Cost Calculation

```text id="ip002"
Supplier Price

+

Freight

+

Insurance

+

Duty

+

VAT

+

CNF

+

Port Charge

+

Other Charges

=

Landed Cost

=

Inventory Cost
```

---

# ১৭. Status

সম্ভাব্য Status

* Draft
* PI Received
* Approved
* LC Opened
* Production
* Shipped
* In Transit
* Customs Clearance
* GRN Completed
* Purchase Completed
* Closed
* Cancelled

---

# ১৮. Business Rules

### Rule IP-001

Approved PI ছাড়া Import শুরু হবে না।

---

### Rule IP-002

GRN-এর আগে Import Purchase Final হবে না।

---

### Rule IP-003

Landed Cost ছাড়া Final Inventory Cost নির্ধারণ হবে না।

---

### Rule IP-004

সব Shipping Document বাধ্যতামূলক (Configuration অনুযায়ী)।

---

### Rule IP-005

Exchange Rate Historical হবে।

---

### Rule IP-006

সব Import Charge Landed Cost-এ যোগ হবে (Configuration অনুযায়ী)।

---

# ১৯. Reports

* Import Register
* PI Report
* LC Report
* Shipment Report
* Container Report
* Customs Report
* Import Cost Analysis
* Landed Cost Report
* Country Wise Import
* Supplier Wise Import

---

# ২০. Dashboard

Dashboard-এ দেখা যাবে—

* Shipment in Transit
* LC Expiry Alert
* Customs Pending
* Arrival This Week
* Import Cost
* Delayed Shipment

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* PI Created
* LC Opened
* Shipment Updated
* Customs Cleared
* GRN Completed
* Purchase Posted

---

# ২২. Future Expansion

* Shipping API Integration
* Container Tracking
* Bank LC Integration
* Customs API
* AI Import Cost Prediction
* Import Document OCR

---

# ২৩. Notes

FFME Import Flow

```text id="ip003"
PI

↓

LC

↓

Shipment

↓

Customs

↓

GRN

↓

Purchase

↓

Inventory
```

Import Purchase Module আন্তর্জাতিক ক্রয় ব্যবস্থাপনার সম্পূর্ণ নিয়ন্ত্রণ প্রদান করবে।

---

# ২৪. Related Documents

* Purchase
* Purchase Order
* Goods Receive Note
* Supplier
* Landed Cost
* Inventory
* Finance
* Warehouse

---

# ২৫. Conclusion

Import Purchase Module হলো FFME ERP-এর International Procurement Engine।

এর মাধ্যমে—

* Import Documentation
* LC Management
* Shipment Tracking
* Customs Clearance
* Landed Cost Calculation
* Inventory Valuation

নিশ্চিত করা হবে।

FFME-তে Import Purchase হলো:

**International Procurement → Import Cost → Inventory Value**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**End of Purchase Module Documentation**
