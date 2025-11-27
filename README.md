<div align="center">
  
  # 🐔 Poultry Inventory
  **Data-driven poultry farm operations and performance dashboard**
  
  [![Tech Stack](https://img.shields.io/badge/Stack-Laravel%208%20%7C%20PHP%20%7C%20MySQL-orange?logo=laravel)](https://laravel.com/)
  [![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)
  [![Status](https://img.shields.io/badge/Status-Production-blue)](#)
  [![Version](https://img.shields.io/badge/Version-1.0.0-purple)](#)
</div>

## 📖 Introduction
Poultry Inventory is a Laravel 8 application for managing day-to-day poultry farm operations. It centralizes flock onboarding, daily production metrics, feed and medicine usage, workforce details, sales, and accounting so that farm managers can make faster, data-backed decisions.

## ✨ Features
- 🧭 **Role-aware dashboards** highlighting mortality, feed consumption, and cash across farms.
- 🐣 **Flock lifecycle tracking** from DOC intake through daily weight, mortality, and rejection logging.
- 🌾 **Feed & medicine stock** management with restocking, distribution, and consumption history.
- 💵 **Sales and expense** capture, including petty cash controls and house-level allocations.
- 🧑‍🌾 **HR workflows** for employees, leaves, and payroll oversight.
- 📊 **Operational reports** by flock, farm, house, or date for mortality, weight, feed, expenses, and sales.

## 🧠 Use Cases & Examples
- **Daily performance logging**: Supervisors record mortality, weight averages, and feed consumption per house to keep the dashboard up to date.
- **Cost traceability**: Accountants post expenses with farm and house context, then review consolidated cash positions before approving payouts.
- **Decision-ready reporting**: Managers export mortality or feed reports filtered by flock to identify underperforming houses.

**Example: Add a new expense entry**
```bash
# Submit a farm-specific expense (requires authentication middleware)
curl -X POST \
  -F "farm_id=2" \
  -F "house_id=5" \
  -F "expense_sector_id=3" \
  -F "amount=12500" \
  -F "description=Starter feed delivery" \
  http://localhost/add-expense-data
```

**Example: Log daily flock performance**
```bash
# Record mortality, rejection, and weight metrics for a house
curl -X POST \
  -F "chicken_id=18" \
  -F "mortality=4" \
  -F "rejection=1" \
  -F "feed_consumption=72" \
  -F "weight_avg=1.45" \
  -F "fcr=1.72" \
  http://localhost/add-daily-data
```

## 🧰 Tech Stack
- 🐘 PHP 7.3+ with **Laravel 8** framework (MVC, routing, validation, Eloquent ORM)
- 🗄️ **MySQL** or compatible relational database for operational data
- 🎨 **Blade + Bootstrap 5** UI with Laravel Mix asset pipeline
- 📦 **Composer** for PHP dependencies; **npm** for frontend tooling

## 🚀 Getting Started
### Prerequisites
- PHP 8.x or 7.3+ with Composer
- Node.js 14+ with npm
- MySQL (or MariaDB) instance

### Installation
```bash
# Clone and install PHP dependencies
composer install

# Install frontend tooling
npm install

# Copy environment template and set your secrets
cp .env.example .env
php artisan key:generate
```

### Configuration
Update database and app settings in `.env`:
```dotenv
APP_NAME="Poultry Inventory"
APP_URL=http://localhost
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=poultry_inventory
DB_USERNAME=root
DB_PASSWORD=secret
```

### Database & Assets
```bash
# Run schema migrations
php artisan migrate

# Build frontend assets (development)
npm run dev

# Start the application
php artisan serve
```

## 🗂️ Project Structure
```
app/
  Http/Controllers/    # Business flows for flocks, feed, medicine, HR, accounts, reporting
  Models/              # Eloquent models for farms, houses, flocks, chickens, finance, HR
routes/
  web.php              # Authenticated web routes and module entrypoints
resources/views/       # Blade templates for dashboards and CRUD screens
database/migrations/   # Schema definitions for operational and HR data
```

## 🤝 Contributing
Pull requests are welcome! Please fork the repository, create a feature branch, and open a PR that describes the change and any setup steps.

## 📜 License
This project is licensed under the MIT License.
