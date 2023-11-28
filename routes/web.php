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
Route::get('/categories/{providerId}', [InsuranceProviderController::class, 'getCategories'])->name('insurance.categories');
Route::get('/computation-rates/{providerId}/{categoryId}', [InsuranceProviderController::class, 'getComputationRates'])->name('insurance.computation_rates');




// Route::get('/insurance_category/{id}', [InsuranceProviderController::class, 'insuranceCategoryIndex'])->name('insurance.category.index');



Route::get('/partnered-insurance-categories', [QoutationController::class, 'providerCategory'])->name('partnered.categories');

Route::get('/qoutation', [QoutationController::class, 'qoutation'])->name('post.qoutation');


