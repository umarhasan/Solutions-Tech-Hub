<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, DashboardController, ItemController, CategoryController, SaleController, PurchaseController, ExpenseController, LaptopController, ReportController};

Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/setup-admin', [AuthController::class, 'setup']);
Route::post('/setup-admin', [AuthController::class, 'createAdmin']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('items', ItemController::class)->except('show');
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    Route::get('/sales', [SaleController::class, 'index']);
    Route::get('/sales/create', [SaleController::class, 'create']);
    Route::post('/sales', [SaleController::class, 'store']);
    Route::get('/sales/{sale}', [SaleController::class, 'show']);
    Route::post('/sales/{sale}/payment', [SaleController::class, 'payment']);
    Route::get('/purchases', [PurchaseController::class, 'index']);
    Route::get('/purchases/create', [PurchaseController::class, 'create']);
    Route::post('/purchases', [PurchaseController::class, 'store']);
    Route::post('/purchases/{purchase}/payment', [PurchaseController::class, 'payment']);
    Route::get('/expenses', [ExpenseController::class, 'index']);
    Route::post('/expenses', [ExpenseController::class, 'store']);
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy']);
    Route::get('/laptops', [LaptopController::class, 'index']);
    Route::post('/laptops', [LaptopController::class, 'store']);
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/reports/stock.csv', [ReportController::class, 'stockCsv']);
    Route::get('/reports/sales.csv', [ReportController::class, 'salesCsv']);
});
