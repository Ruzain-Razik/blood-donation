<?php

use App\Http\Controllers\BloodDonationController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\HospitalAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/donor/register', [DonorController::class, 'showRegistrationForm'])->name('donor.register');
Route::post('/donor/register', [DonorController::class, 'store'])->name('donations.store');

Route::get('/donor-blood-donations/create', [BloodDonationController::class, 'donorRequestForm'])->name('donor-blood-donations.create');
Route::post('/donor-blood-donations/store', [BloodDonationController::class, 'donorDonationStore'])->name('donor-blood-donations.store');



Route::get('/hospital/register', [HospitalAuthController::class, 'showRegistrationForm'])->name('hospital.register');
Route::post('/hospital/register', [HospitalAuthController::class, 'register'])->name('hospital.register.store');

Route::get('/blood-donations/create', [BloodDonationController::class, 'create'])->name('blood-donations.create');
Route::post('/blood-donations', [BloodDonationController::class, 'store'])->name('blood-donations.store');

Route::get('/blood-request/create', [BloodRequestController::class, 'create'])->name('blood-request.create');
Route::post('/blood-request', [BloodRequestController::class, 'hospitalStoreBloodRequest'])->name('blood-request.store');
