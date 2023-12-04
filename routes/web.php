<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\InsuranceProviderController;
use App\Http\Controllers\QoutationController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/forms', [ViewController::class, 'formIndex']);
Route::get('/landing-page', [ViewController::class, 'landingPage']);

// Route::get('/providers', [InsuranceProviderController::class, 'index']);
Route::get('/providers', [InsuranceProviderController::class, 'getProviders'])->name('insurance.providers.index');
Route::get('/products/{providerId}', [InsuranceProviderController::class, 'getProducts'])->name('insurance.products');
Route::get('/computation-rates/{providerId}/{productId}', [InsuranceProviderController::class, 'getComputationRates'])->name('insurance.computation_rates');




// Route::get('/insurance_category/{id}', [InsuranceProviderController::class, 'insuranceCategoryIndex'])->name('insurance.category.index');



Route::get('/partnered-insurance-products', [QoutationController::class, 'providerCategory'])->name('partnered.products');

Route::get('/qoutation', [QoutationController::class, 'qoutation'])->name('post.qoutation');


