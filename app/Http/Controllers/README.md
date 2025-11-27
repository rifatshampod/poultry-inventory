# Controllers

## Overview
This directory hosts the Laravel controllers that orchestrate poultry operations, finance, HR, inventory, and reporting flows. Each controller receives requests from the authenticated web routes and coordinates validation, Eloquent data access, and Blade view rendering.

## Key Components
- **HomeController** – Builds the dashboard metrics (mortality, feed, expense, cash) and profile management.
- **chickenController** – Manages DOC intake, daily flock updates, and mortality/weight logging.
- **feedController & medicineController** – Track feed stock, restocking, distribution, and farm-level medicine usage.
- **accountController** – Handles expenses and petty cash tied to farms and houses.
- **saleController** – Records poultry sales and daily sales summaries.
- **hrController** – Captures employee records, leave requests, and payroll preparation.
- **settingsController** – Administers master data (users, farms, houses, flocks, expense metadata, bonus types, standards).
- **ReportController** – Generates reports segmented by flock, farm, house, or date across mortality, rejection, weight, feed, sales, expenses, and general metrics.
- **farmDependency** – Provides helper lookups (e.g., houses by farm) to support dependent dropdowns in forms.

## Usage
Routes in `routes/web.php` map authenticated endpoints to these controllers, ensuring only signed-in users can access operational workflows. Views in `resources/views/` consume the data prepared here to render dashboards, CRUD forms, and reports.
