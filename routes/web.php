<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::group(['prefix'=>'user'],function(){
    Route::get('userList', [UserController::class, 'userList'])->name('user#list');
});

Route::prefix('services')->group(function () {
    Route::get('servicesList', [AdditionalServicesController::class, 'servicesList'])->name('services#list');
    Route::get('addService', [AdditionalServicesController::class, 'addService'])->name('service#add');
    Route::post('createService', [AdditionalServicesController::class, 'createService'])->name('services#create');
    Route::get('editService/{id}', [AdditionalServicesController::class, 'editService'])->name('services#edit');
    Route::post('updateService', [AdditionalServicesController::class, 'updateService'])->name('services#update');
    Route::get('deleteService/{id}', [AdditionalServicesController::class, 'deleteService'])->name('service#delete');
});
