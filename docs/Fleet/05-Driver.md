# Driver Management

**Document:** Business Architecture

**Version:** 2.0.0

**Status:** Final

**Owner:** FFME Core Team

**Parent Module:** Fleet Management

**Module:** Driver Management

---

# ১. Purpose

Driver Module-এর উদ্দেশ্য হলো প্রতিষ্ঠানের সকল Driver-এর তথ্য, লাইসেন্স, নিয়োগ, Vehicle Assignment, Trip History, Performance এবং Compliance একটি কেন্দ্রীয় কাঠামোর মাধ্যমে পরিচালনা করা।

এই Module Fleet, HR, Attendance, Trip, Vehicle, Route এবং Payroll Module-এর সাথে সমন্বিতভাবে কাজ করবে।

---

# ২. Definition

Driver হলো এমন একজন ব্যক্তি যিনি প্রতিষ্ঠানের Vehicle পরিচালনা করেন।

Driver হতে পারেন—

* Company Employee
* Contract Driver
* Distributor Driver
* Third-party Driver

---

# ৩. Driver Philosophy

FFME-তে Driver এবং Employee একই বিষয় নয়।

* সব Driver Employee হতে পারেন।
* কিন্তু সব Employee Driver নন।

যদি Driver একজন Employee হন, তাহলে Driver Profile Employee Profile-এর সাথে সংযুক্ত থাকবে।

---

# ৪. Driver Architecture

```text id="drv001"
Employee (Optional)

↓

Driver

↓

Vehicle Assignment

↓

Route Assignment

↓

Trip

↓

Performance
```

---

# ৫. Driver Profile

প্রতিটি Driver-এর থাকবে—

## Basic Information

* Driver Code
* Driver Name
* Photo (Optional)
* Mobile Number
* National ID / Passport
* Status

---

## Employment Information

* Driver Type
* Employee (Optional)
* Company
* Branch
* Department
* Joining Date

---

## License Information

* License Number
* License Class
* Issue Date
* Expiry Date
* Issuing Authority

---

## Operational Information

* Assigned Vehicle
* Default Route
* Current Status

---

# ৬. Driver Types

FFME নিম্নোক্ত Driver Types সমর্থন করবে—

* Company Driver
* Contract Driver
* Distributor Driver
* Temporary Driver
* Third-party Driver

---

# ৭. License Class

উদাহরণ—

| License Class | Allowed Vehicle  |
| ------------- | ---------------- |
| A             | Motorcycle       |
| B             | Car / Pickup     |
| C             | Light Commercial |
| Heavy         | Truck / Trailer  |

Company Policy অনুযায়ী License Validation করা যাবে।

---

# ৮. Vehicle Assignment

একজন Driver একটি Default Vehicle-এর সাথে যুক্ত থাকতে পারেন।

Assignment History সংরক্ষণ করা হবে।

```text id="drv002"
Driver

↓

Vehicle

↓

Assignment Date

↓

Release Date
```

---

# ৯. Route Assignment

Driver-এর জন্য Default Route নির্ধারণ করা যাবে।

তবে Trip অনুযায়ী Route পরিবর্তন হতে পারে।

---

# ১০. Attendance Integration

Driver Attendance HR Module দ্বারা পরিচালিত হবে।

সম্ভাব্য Attendance Point—

* Branch
* Warehouse
* Distributor Point
* Depot

---

# ১১. Trip Integration

প্রতিটি Trip Driver-এর সাথে যুক্ত থাকবে।

Trip History-তে থাকবে—

* Vehicle
* Route
* Start Time
* End Time
* Distance
* Fuel Used
* Delivery Count

---

# ১২. Performance

Driver Performance বিশ্লেষণ করা যাবে—

* Total Trips
* Total Distance
* Delivery Performance
* Fuel Efficiency
* Accident Count
* On-Time Delivery
* Customer Rating (Future)

---

# ১৩. Compliance

Driver-এর জন্য—

* License Expiry
* Medical Certificate (Optional)
* Training Record
* Safety Certification (Optional)

সংরক্ষণ করা যাবে।

---

# ১৪. Reports

## Driver Register

* Active Driver
* Inactive Driver

---

## License Report

* Expiring License
* Expired License

---

## Vehicle Assignment Report

* Current Vehicle
* Assignment History

---

## Performance Report

* Trip Count
* Distance Covered
* Delivery Performance

---

## Attendance Report

* Daily Attendance
* Monthly Attendance

---

# ১৫. Business Rules

### Rule 001

Driver Code Unique হবে।

---

### Rule 002

License Number Duplicate হওয়া উচিত নয়।

---

### Rule 003

Expired License থাকা Driver-কে নতুন Trip Assign করা যাবে না (Company Policy অনুযায়ী)।

---

### Rule 004

একজন Driver একই সময়ে একটি Default Vehicle-এর সাথে যুক্ত থাকবে।

---

### Rule 005

Driver Delete করা যাবে না।

Inactive করা যাবে।

---

### Rule 006

Vehicle Assignment History কখনো Delete করা যাবে না।

---

### Rule 007

Driver Company Employee নাও হতে পারেন।

---

# ১৬. Audit Trail

সংরক্ষণ হবে—

* Driver Registered
* Driver Updated
* Vehicle Assigned
* Vehicle Released
* License Updated
* Status Changed

---

# ১৭. Future Expansion

ভবিষ্যতে যুক্ত হতে পারে—

* Driver Mobile App
* GPS Check-in
* Driving Score
* Accident History
* Traffic Violation Record
* Biometric Verification
* Digital Driving License Verification

---

# ১৮. Notes

FFME Fleet Structure:

| Entity   | Purpose              |
| -------- | -------------------- |
| Driver   | Vehicle Operator     |
| Vehicle  | Fleet Asset          |
| Route    | Planned Journey      |
| Trip     | Operational Activity |
| Employee | HR Information       |

Driver Fleet Module-এর Business Entity।

HR তথ্য Employee Module-এ সংরক্ষিত থাকবে।

---

# ১৯. Related Documents

* Architecture.md
* Employee
* Vehicle
* Route
* Trip
* Attendance
* Payroll
* Fleet Management

---

# ২০. Conclusion

Driver Module FFME ERP-এর Fleet Operation-এর মানবসম্পদ (Operational Human Resource) অংশ।

এর মাধ্যমে—

* Driver Registration
* License Management
* Vehicle Assignment
* Performance Tracking
* Attendance Integration
* Compliance Monitoring

একটি Enterprise Grade Fleet Operation Framework গঠন করা সম্ভব।

FFME-তে Driver হলো:

**Qualified Operator → Vehicle Assignment → Safe Fleet Operation**

---

**Document Status:** Final

**Version:** 2.0.0

**Owner:** FFME Core Team

**Next Document:** `06-Trip.md`
