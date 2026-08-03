# Purchase Pricing Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Purchase Management

**Module:** Purchase Pricing

---

# ১. Purpose

Purchase Pricing Module-এর উদ্দেশ্য হলো Supplier অনুযায়ী Purchase Price, Historical Price, Contract Price, Import Cost, Landed Cost এবং Cost Calculation পরিচালনা করা।

FFME-তে Purchase Price শুধু Supplier-এর দেওয়া Unit Price নয়।

চূড়ান্ত Cost নির্ধারিত হবে Landed Cost সহ।

---

# ২. Business Philosophy

একই Product-এর একাধিক Purchase Price থাকতে পারে।

উদাহরণ

* Supplier A → 95 টাকা
* Supplier B → 98 টাকা
* Supplier C → 101 টাকা

আবার একই Supplier-এর কাছ থেকেও—

* ভিন্ন সময়ে
* ভিন্ন Quantity-তে
* ভিন্ন Currency-তে
* ভিন্ন Contract-এ

ভিন্ন Price হতে পারে।

FFME কোনো Price Overwrite করবে না।

সব Historical Price সংরক্ষণ করবে।

---

# ৩. Purchase Pricing Workflow

```text id="ppc001"
Supplier

↓

Quotation

↓

Purchase Order

↓

Purchase Invoice

↓

Purchase Price

↓

Landed Cost

↓

Inventory Cost
```

---

# ৪. Purchase Price Sources

Price আসতে পারে—

* Supplier Quotation
* Purchase Order
* Purchase Invoice
* Contract Purchase
* Import Purchase
* Manual Entry (Permission Required)

---

# ৫. Price Types

FFME নিম্নলিখিত Price সমর্থন করবে।

## Standard Purchase Price

সাধারণ Purchase Price।

---

## Contract Price

দীর্ঘমেয়াদী চুক্তিভিত্তিক Price।

---

## Last Purchase Price

সর্বশেষ Purchase Price।

---

## Average Purchase Price

Historical Average।

---

## Import Price

বিদেশি Purchase Price।

---

## Promotional Price

নির্দিষ্ট সময়ের জন্য বিশেষ Purchase Price।

---

## Emergency Purchase Price

জরুরি Purchase-এর বিশেষ মূল্য।

---

## Spot Price

এককালীন Price।

---

# ৬. Price Profile

* Product
* Supplier
* Currency
* Price Type
* Unit Price
* UOM
* Effective From
* Effective To
* Status

---

# ৭. Quantity Based Pricing

Quantity অনুযায়ী Price পরিবর্তন হতে পারে।

Example

|    Quantity | Unit Price |
| ----------: | ---------: |
|    1–100 Kg |        100 |
|  101–500 Kg |         98 |
| 501–1000 Kg |         95 |
|    1000+ Kg |         92 |

System স্বয়ংক্রিয়ভাবে প্রযোজ্য Price নির্বাচন করবে।

---

# ৮. Supplier Wise Pricing

একই Product-এর বিভিন্ন Supplier-এর Price আলাদা থাকবে।

Example

| Supplier   | Price |
| ---------- | ----: |
| Supplier A |    95 |
| Supplier B |    96 |
| Supplier C |   101 |

---

# ৯. Currency Wise Pricing

বিদেশি Supplier-এর ক্ষেত্রে—

* Purchase Currency
* Exchange Rate
* Base Currency Cost

সংরক্ষণ হবে।

---

# ১০. Landed Cost

Purchase Price-এর সাথে নিম্নলিখিত Cost যোগ হতে পারে—

* Freight
* Insurance
* Customs Duty
* VAT
* AIT
* Port Charge
* Clearing Charge
* Transport
* Loading
* Unloading
* Other Expenses

Inventory Cost হবে—

```text id="ppc002"
Purchase Price

+

Landed Cost

=

Inventory Cost
```

---

# ১১. Contract Pricing

একটি Supplier-এর সাথে নির্দিষ্ট সময়ের জন্য Contract Price সংরক্ষণ করা যাবে।

উদাহরণ

From

01-Jan-2027

To

31-Dec-2027

Unit Price

95 টাকা

Contract শেষ হলে Price স্বয়ংক্রিয়ভাবে অকার্যকর হবে।

---

# ১২. Historical Pricing

প্রতিটি Purchase Price History সংরক্ষণ হবে।

উদাহরণ

| Date | Supplier | Price |
| ---- | -------- | ----: |
| Jan  | A        |    92 |
| Mar  | A        |    94 |
| Jul  | A        |    96 |

পুরনো Price কখনও মুছে ফেলা হবে না।

---

# ১৩. Price Comparison

System দেখাবে—

* Lowest Price
* Highest Price
* Average Price
* Last Purchase Price
* Contract Price

---

# ১৪. Purchase Price Approval

Manual Price Override করলে Approval লাগতে পারে।

Workflow

```text id="ppc003"
Price Change

↓

Approval

↓

Effective
```

---

# ১৫. Price Validity

প্রতিটি Price-এর জন্য থাকবে—

* Effective Date
* Expiry Date

Expired Price নতুন Purchase-এ ব্যবহার করা যাবে না।

---

# ১৬. Manufacturing Integration

Raw Material Cost পরিবর্তিত হলে—

Finished Goods Cost Calculation-এ নতুন Cost ব্যবহার করা হবে।

Cost Rollup Manufacturing Module দ্বারা সম্পন্ন হবে।

---

# ১৭. Inventory Integration

Purchase Pricing Inventory Valuation-এর ভিত্তি হবে।

সমর্থিত Costing Method—

* FIFO
* Weighted Average
* Standard Cost

---

# ১৮. Status

সম্ভাব্য Status

* Draft
* Active
* Expired
* Suspended
* Cancelled

---

# ১৯. Business Rules

### Rule PPC-001

একই Product-এর একাধিক Purchase Price থাকতে পারবে।

---

### Rule PPC-002

Supplier অনুযায়ী আলাদা Price থাকবে।

---

### Rule PPC-003

Historical Price কখনও Delete হবে না।

---

### Rule PPC-004

Expired Price নতুন Purchase-এ ব্যবহার করা যাবে না।

---

### Rule PPC-005

Landed Cost Inventory Cost-এ অন্তর্ভুক্ত হবে।

---

### Rule PPC-006

Manual Price Override Role Permission অনুযায়ী হবে।

---

### Rule PPC-007

Contract Price থাকলে সেটি সাধারণ Price-এর উপর অগ্রাধিকার পাবে (Validity Period-এর মধ্যে)।

---

# ২০. Reports

* Purchase Price List
* Supplier Wise Price
* Historical Price
* Contract Price Report
* Lowest Supplier Price
* Landed Cost Report
* Price Trend Analysis
* Currency Wise Purchase Price

---

# ২১. Audit Trail

সংরক্ষণ হবে—

* Price Created
* Price Updated
* Price Approved
* Contract Activated
* Contract Expired
* Manual Override

---

# ২২. Future Expansion

* AI Price Prediction
* Commodity Market Integration
* Auto Supplier Recommendation
* Seasonal Price Analysis
* Live Exchange Rate
* Price Alert

---

# ২৩. Notes

FFME Purchase Cost Model

```text id="ppc004"
Supplier Price

+

Landed Cost

=

Inventory Cost
```

Purchase Pricing Module Inventory Cost নির্ধারণের ভিত্তি।

Sales Price এই Module থেকে নিয়ন্ত্রিত হবে না।

---

# ২৪. Related Documents

* Purchase Quotation
* Purchase Order
* Purchase
* Supplier
* Inventory
* Manufacturing
* Costing
* Finance

---

# ২৫. Conclusion

Purchase Pricing Module হলো FFME ERP-এর Purchase Cost Engine।

এর মাধ্যমে—

* Supplier Wise Price
* Historical Price
* Contract Price
* Landed Cost
* Inventory Valuation

সঠিকভাবে পরিচালিত হবে।

FFME-তে Purchase Pricing হলো:

**Supplier Offer → Purchase Cost → Inventory Valuation**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**End of Purchase Module Documentation**
