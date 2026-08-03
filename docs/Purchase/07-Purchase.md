# Purchase Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase

---

# ১. Purpose

Purchase Module-এর উদ্দেশ্য হলো Goods Receive Note (GRN) এবং Supplier Invoice-এর ভিত্তিতে Purchase Transaction সম্পন্ন করা, Supplier Payable তৈরি করা, Inventory Cost Update করা এবং Financial Posting সম্পন্ন করা।

FFME-তে Purchase হলো Procurement Process-এর Financial Completion Stage।

---

# ২. Business Philosophy

Purchase Order মানে অর্ডার।

GRN মানে মাল এসেছে।

Purchase মানে Supplier-এর Bill গ্রহণ করে Financialভাবে Purchase সম্পন্ন করা।

---

# ৩. Purchase Workflow

```text id="pur001"
Purchase Order

↓

Goods Receive Note

↓

Supplier Invoice

↓

Purchase

↓

Accounts Payable

↓

Supplier Payment
```

---

# ৪. Purchase Definition

Purchase হলো Supplier-এর Invoice অনুযায়ী Product বা Service গ্রহণ করে Financial Transaction সম্পন্ন করা।

Purchase Confirm হওয়ার পরে—

* Supplier Payable তৈরি হবে
* Purchase Ledger Update হবে
* Cost Update হবে
* Tax গণনা হবে

---

# ৫. Purchase Sources

Purchase তৈরি হবে—

* Approved GRN
* Supplier Invoice
* Import Purchase
* Service Purchase
* Emergency Purchase

---

# ৬. Purchase Profile

## Basic Information

* Purchase Number
* Purchase Date
* Supplier
* Invoice Number
* Invoice Date
* Currency

---

## Reference

* Purchase Order
* GRN
* Supplier Invoice

---

## Financial Information

* Gross Amount
* Discount
* Freight
* Insurance
* Tax
* Other Charges
* Net Amount

---

# ৭. Product Information

প্রতিটি Line-এ থাকবে—

* Product
* Quantity
* UOM
* Unit Cost
* Discount
* Tax
* Net Cost

---

# ৮. Purchase Cost Calculation

Purchase Cost-এর মধ্যে অন্তর্ভুক্ত হতে পারে—

* Product Price
* Freight
* Insurance
* Loading
* Unloading
* Customs Duty
* Clearing Charge
* Other Landed Cost

---

# ৯. Landed Cost Allocation

যদি Freight পুরো Invoice-এর জন্য হয়—

System Product অনুযায়ী Landed Cost ভাগ করবে।

Allocation Method

* Quantity Wise
* Value Wise
* Weight Wise
* Volume Wise

---

# ১০. Inventory Cost Update

Purchase Confirm হলে—

Inventory Value Update হবে।

Costing Method অনুযায়ী—

* FIFO
* Weighted Average
* Standard Cost

---

# ১১. Accounts Payable

Purchase Confirm হলে Supplier Payable তৈরি হবে।

```text id="pur002"
Purchase

↓

Accounts Payable

↓

Supplier Ledger
```

---

# ১২. Tax Integration

Purchase Tax Support

* VAT
* AIT
* Import Duty
* Supplementary Duty
* Other Local Taxes

---

# ১৩. Multi Currency

বিদেশি Supplier-এর ক্ষেত্রে—

* Purchase Currency
* Exchange Rate
* Base Currency

সংরক্ষণ হবে।

---

# ১৪. Service Purchase

যেসব Purchase-এ Stock আসবে না—

যেমন—

* Transport
* Consultancy
* Repair
* Electricity

সেগুলো Inventory Update করবে না।

---

# ১৫. Purchase Completion

Purchase Complete হবে যখন—

* GRN সম্পন্ন
* Supplier Invoice গ্রহণ
* Financial Approval সম্পন্ন

---

# ১৬. Status

সম্ভাব্য Status

* Draft
* Under Verification
* Approved
* Posted
* Partially Paid
* Fully Paid
* Closed
* Cancelled

---

# ১৭. Business Rules

### Rule PU-001

Purchase অবশ্যই GRN অথবা Approved Service-এর উপর ভিত্তি করে হবে।

---

### Rule PU-002

Purchase Confirm হলে Supplier Payable তৈরি হবে।

---

### Rule PU-003

Purchase Delete করা যাবে না।

Cancelled করতে হবে।

---

### Rule PU-004

Inventory Cost Purchase Confirm হওয়ার পরে Update হবে।

---

### Rule PU-005

Purchase Return হলে Purchase Value পুনঃসমন্বয় হবে।

---

### Rule PU-006

Supplier Invoice Number Duplicate হতে পারবে না (একই Supplier-এর ক্ষেত্রে)।

---

### Rule PU-007

Purchase Accounting Auto Posting হবে।

---

# ১৮. Accounting Entries

Example

```text id="pur003"
Inventory Dr

VAT Receivable Dr (যদি প্রযোজ্য)

Accounts Payable Cr
```

Service Purchase-এর ক্ষেত্রে Inventory Account-এর পরিবর্তে Expense Account Debit হবে।

---

# ১৯. Reports

* Purchase Register
* Supplier Purchase Report
* Purchase by Product
* Purchase by Category
* Purchase by Warehouse
* Purchase Cost Report
* Landed Cost Report
* Purchase Tax Report
* Supplier Outstanding

---

# ২০. Audit Trail

সংরক্ষণ হবে—

* Purchase Created
* Purchase Approved
* Invoice Verified
* Accounting Posted
* Purchase Cancelled
* Purchase Returned

---

# ২১. Future Expansion

* OCR Invoice Capture
* E-Invoice
* Three-Way Matching (PO + GRN + Invoice)
* AI Invoice Verification
* Automatic Duplicate Invoice Detection

---

# ২২. Notes

FFME Purchase Model

```text id="pur004"
Purchase Order

↓

Goods Receive Note

↓

Supplier Invoice

↓

Purchase

↓

Accounts Payable

↓

Payment
```

Purchase হলো Procurement Process-এর Financial Posting Stage।

---

# ২৩. Related Documents

* Purchase Order
* Goods Receive Note
* Purchase Return
* Supplier
* Accounts Payable
* Payment
* Inventory
* Finance
* Warehouse

---

# ২৪. Conclusion

Purchase Module হলো FFME ERP-এর Procurement Financial Engine।

এর মাধ্যমে—

* Purchase Cost
* Supplier Liability
* Inventory Valuation
* Tax Calculation
* Financial Posting

সঠিকভাবে সম্পন্ন হবে।

FFME-তে Purchase হলো:

**Goods Received + Supplier Invoice = Purchase Transaction**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `08-Purchase-Return.md`
