# Routes

## Overview
Authenticated web routes define the entrypoints for dashboards, CRUD workflows, and reporting pages. They bind HTTP verbs and URIs to controller actions and enforce session-based access.

## Key Components
- **Dashboard & profile** – Redirect root traffic to `/dashboard` and expose profile/password updates.
- **Operations** – Chicken intake and daily logs, feed stock, medicine distribution, sales capture.
- **Finance** – Expense, petty cash, and house lookups for accurate cost attribution.
- **HR** – Employee, leave, and payroll screens.
- **Settings** – Master data management for users, farms, houses, flocks, expense metadata, bonuses, designations, and standards.
- **Reports** – Mortality, rejection, weight, feed, sales, expense, and general summaries by flock, farm, house, or date.

## Usage
Routes in `web.php` sit inside the `web` and `auth` middleware group to ensure only authenticated users can access the application. Controller methods render Blade views with the datasets required for each workflow.
