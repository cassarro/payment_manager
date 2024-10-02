<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\EventPaymentController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PaymentProviderRequestController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CompanyController;


Route::get('/events', [EventPaymentController::class, 'index']);
Route::post('/event-payments', [EventPaymentController::class, 'store'])->name('eventPayments.store');
Route::get('/event-payments/create', [EventPaymentController::class, 'create'])->name('eventPayments.create');
Route::get('/payment-methods', [PaymentMethodController::class, 'index']);
Route::get('/payment-provider-requests', [PaymentProviderRequestController::class, 'index']);
Route::post('/payment-provider-requests', [PaymentProviderRequestController::class, 'store']);
Route::get('/payment-provider-requests', [PaymentProviderRequestController::class, 'index'])->name('paymentProviderRequests.index');
Route::put('/payment-provider-requests/{id}', [PaymentProviderRequestController::class, 'updateStatus']);
Route::get('event-payments/{id}/edit', [EventPaymentController::class, 'edit'])->name('eventPayments.edit');
Route::get('/companies', [App\Http\Controllers\FinanceController::class, 'listCompanies'])->name('listCompanies');
Route::resource('paymentProviderRequests', App\Http\Controllers\PaymentProviderRequestController::class);

