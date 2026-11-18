# Solutions Tech Hub — Inventory Management (Laravel 12)

This is a Laravel source project designed around the client's workbook sheets: `ITEMS`, `RAMS-HARDS`, `SCRAPED ALL`, and `Laptops detals`. The workbook's RAM/HDD and scrap item names and quantities are preloaded into `database/seeders/excel_items.json`. The `ITEMS` sheet has mostly blank item rows, so it cannot be safely imported as product data; enter those items in the UI.

## Features
- Dashboard: today's and current-month sales, stock cost value, low-stock alerts, customer credit and supplier due.
- Item/category management with buying/selling prices and current quantity.
- Daily sale entry with automatic stock deduction, partial payments and credit due.
- Purchase entry with automatic stock addition, partial supplier payment and remaining payable.
- Expenses and laptop condition/specification register.
- Date-range sales/purchase/expense reports and CSV export for sales and stock.
- First-admin setup page and session-based login.

## Requirements
PHP 8.2+, Composer, and PHP extensions required by Laravel 12. SQLite is configured by default; MySQL can be used by editing `.env`.

## Install locally
1. Extract this ZIP.
2. Run `composer install`.
3. Copy `.env.example` to `.env` (Windows: `copy .env.example .env`; macOS/Linux: `cp .env.example .env`).
4. Run `php artisan key:generate`.
5. For SQLite, create an empty file `database/database.sqlite`. On Windows PowerShell: `New-Item database/database.sqlite -ItemType File`.
6. Run `php artisan migrate --seed`.
7. Run `php artisan serve` and open `http://127.0.0.1:8000`.
8. Login with `admin@example.com` / `ChangeMe123!` (created by seeder), OR if you skip seeding users, open `/setup-admin` to create the first account. Change the seeded password immediately.

## MySQL
Set `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env`, create the database, then run `php artisan migrate --seed`.

## Important workflow notes
- Purchase and sale entry intentionally use one item per transaction to keep the interface simple. Multiple lines per invoice, supplier/customer directory screens, sale returns, and full XLSX import/export are not included in this starter version. CSV exports are included.
- Software sale records do not change physical stock; choose `Software` in the sale form. Create a Software category/item if you want software names/price suggestions.
- Opening quantities seeded from Excel are treated as the current opening stock; purchase/sale transactions after installation maintain it. Existing Excel values that were formulas or blank have not been invented.
- Use `/setup-admin` only for first account creation; after an account exists, the endpoint redirects to login.
- This source has been assembled as a project starter; run `composer install`, migrations and test the workflows in your environment before using it for live accounting. Take regular database backups.
