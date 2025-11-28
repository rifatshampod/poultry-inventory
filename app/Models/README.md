# Models

## Overview
Eloquent models in this folder describe the poultry domain: farms, houses, flocks, livestock, inventory, finance, and HR entities. They encapsulate table mappings, fillable attributes, and relationships used throughout controllers and reports.

## Key Components
- **Farm, House, Flock** – Core farm topology entities used as foreign keys across chickens, expenses, feeds, and reports.
- **Chicken & Daily_chicken** – Represent flock batches and day-to-day production metrics (mortality, weight, feed consumption).
- **Feed, Total_feed, Medicine, Farm_medicine** – Track stock levels, distributions, and aggregate feed balances.
- **Expense, Expense_type, Expense_sector, Pettycash, Total_cash** – Finance models covering operating expenses and on-hand cash.
- **Sale** – Captures revenue events from poultry sales.
- **Employee, Leave, Designation, Bonus_type, Standard** – HR metadata for staffing, leave schedules, role definitions, and husbandry standards.

## Usage
Relationships declared in these models (e.g., `belongsTo` for farm/house/flock, `hasMany` for daily chicken logs) power eager loading and report generation in controllers. Ensure new fields are added to `$fillable` and corresponding migrations to keep CRUD screens aligned.
