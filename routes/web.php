<?php

use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // companies
    Route::get('companies/data', [CompanyController::class, 'data'])->name('companies.data');
    Route::get('company-employees/data', [CompanyController::class, 'companyEmployeesData'])->name('company.employees');
    Route::resource('companies', CompanyController::class);

    // employees
    Route::get('employees/data', [EmployeeController::class, 'data'])->name('employees.data');
    Route::resource('employees', EmployeeController::class);
});

require __DIR__ . '/auth.php';
