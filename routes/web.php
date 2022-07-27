<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdditionalServicesController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect()->route('admin#index');
    })->name('dashboard');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin#index');
});


Route::prefix('user')->group(function () {
    Route::get('userList', [UserController::class, 'userList'])->name('user#list');
    Route::get('editUser/{id}', [UserController::class, 'editUser'])->name('user#edit');
    Route::post('updateUser', [UserController::class, 'updateUser'])->name('user#update');
    Route::get('deleteUser/{id}', [UserController::class, 'deleteUser'])->name('user#delete');
});

Route::prefix('services')->group(function () {
    Route::get('servicesList', [AdditionalServicesController::class, 'servicesList'])->name('services#list');
    Route::get('addService', [AdditionalServicesController::class, 'addService'])->name('service#add');
    Route::post('createService', [AdditionalServicesController::class, 'createService'])->name('services#create');
    Route::get('editService/{id}', [AdditionalServicesController::class, 'editService'])->name('services#edit');
    Route::post('updateService', [AdditionalServicesController::class, 'updateService'])->name('services#update');
    Route::get('deleteService/{id}', [AdditionalServicesController::class, 'deleteService'])->name('service#delete');
});

Route::prefix('customer')->group(function () {
    Route::get('customerList', [CustomerController::class, 'customerList'])->name('customer#list');
    Route::get('addCustomer', [CustomerController::class, 'addCustomer'])->name('customer#add');
    Route::post('createCustomer', [CustomerController::class, 'createCustomer'])->name('customer#create');
    Route::get('editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('customer#edit');
    Route::post('updateCustomer', [CustomerController::class, 'updateCustomer'])->name('customer#update');
    Route::get('deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('customer#delete');
    Route::get('searchCustomer', [CustomerController::class, 'searchCustomer'])->name('customer#search');
});
