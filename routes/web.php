<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ReportController;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::middleware('authMiddleware:2')->group(function () {
        Route::get('dashboard', [Controller::class, 'dashboard'])->name('dashboard');
        Route::get('city', [Controller::class, 'city'])->name('admin.city');
        Route::get('addCity', [Controller::class, 'addCity'])->name('admin.add-city');
        Route::get('editCity/{id}', [Controller::class, 'editCity'])->name('admin.edit-city');

        Route::get('group', [Controller::class, 'group'])->name('admin.blood');
        Route::get('addGroup', [Controller::class, 'addGroup'])->name('admin.add-blood');
        Route::get('editGroup/{id}', [Controller::class, 'editGroup'])->name('admin.edit-blood');

        Route::get('donor', [Controller::class, 'donor'])->name('admin.donor');
        Route::get('addDonor', [DonorController::class, 'create'])->name('addDonor');
        Route::get('editDonor/{id}', [DonorController::class, 'editDonor'])->name('editDonor');

        Route::get('user', [Controller::class, 'user'])->name('admin.users');
        Route::get('report', [ReportController::class, 'report'])->name('admin.report');
        Route::get('reportInfo/{id}', [ReportController::class, 'reportInfo']);
        Route::get('groupPDF', [ReportController::class, 'groupPDF'])->name('groupPDF');
        Route::get('cityPDF', [CityController::class, 'cityPDF'])->name('cityPDF');
        Route::get('allgroupPDF', [GroupController::class, 'allgroupPDF'])->name('allgroupPDF');
        Route::get('userPDF', [Controller::class, 'userPDF'])->name('userPDF');
        Route::get('donorPDF',[DonorController::class,'donorPDF'])->name('donorPDF');
    });
    Route::get('contact/{id}', [FrontController::class, 'contact'])->name('contact');
    Route::get('contactInfo/{id}', [FrontController::class, 'contactInfo'])->name('contactInfo');
});
Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('search', [FrontController::class, 'search'])->name('search');
