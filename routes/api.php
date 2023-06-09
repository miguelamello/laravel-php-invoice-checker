<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//use App\Infrastructure\Providers\AppServiceProvider;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

Route::get('/invoice/list', [InvoiceController::class, 'list']);
Route::get('/invoice/list/{status}', [InvoiceController::class, 'listByStatus']);
Route::get('/invoice/{id}', [InvoiceController::class, 'getInvoice']);
Route::get('/invoice/approve/{id}', [InvoiceController::class, 'approve']);
Route::get('/invoice/reject/{id}', [InvoiceController::class, 'reject']);

Route::get('/company/list', [CompanyController::class, 'list']);
Route::get('/company/list/{name}', [CompanyController::class, 'listByName']);
Route::get('/company/{id}', [CompanyController::class, 'getCompany']);

Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/list/{name}', [ProductController::class, 'listByName']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);

// Fallback route for undefined routes
Route::fallback(function () {
  return response()->json(['error' => 'Route not found'], 404);
});