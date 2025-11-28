# Database Migrations

## Overview
Migrations define the relational schema for poultry operations, finance, and HR data. They include foreign-key relationships that tie farms, houses, flocks, chickens, expenses, and staff records together.

## Key Components
- **Farms, Houses, Flocks** – Base topology tables created in `2022_12_04_*` and `2022_12_12_*` migrations.
- **Chickens & Daily_chickens** – Track batch intake, DOC counts, mortality, feed consumption, weight, and rejections.
- **Inventory** – Feed and medicine stock via `feeds`, `total_feeds`, `medicines`, and `farm_medicines` tables.
- **Finance** – Expense metadata, expenses, petty cash, and aggregate cash balances.
- **Sales** – Revenue captured in `sales` table with farm/house linkage.
- **HR & Standards** – Employees, leaves, designations, bonus types, and husbandry standards for compliance.

## Usage
Run `php artisan migrate` to apply the schema. When adding new business fields, create additional migrations and update related Eloquent models in `app/Models/` to keep relationships consistent.
