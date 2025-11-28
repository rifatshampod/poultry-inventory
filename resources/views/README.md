# Views

## Overview
Blade templates in this directory render dashboards, data entry forms, and reports for the poultry inventory system. Components such as `x-assets` and `x-header` standardize shared assets and navigation.

## Key Components
- **admin/dashboard.blade.php** – Displays KPI cards for stock, expenses, cash, and feed consumption, plus farm/fleet summaries.
- **auth/** – Login, registration, and verification templates provided by Laravel UI for authentication flows.
- **manager/** – Manager-specific dashboard shell.
- **components/** – Shared partials for asset loading and headers.
- **profile.blade.php, modelpage.blade.php** – User profile management and modal-driven interactions used across CRUD pages.

## Usage
Controllers pass aggregated metrics and dataset collections to these views (e.g., via `view('admin/dashboard')`). Extend or compose these templates to add new widgets, tables, or forms without duplicating layout boilerplate.
