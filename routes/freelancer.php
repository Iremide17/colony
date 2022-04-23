<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Freelancer\DashboardController;


Route::group(['prefix' => 'freelancer', 'as' => 'freelancer.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});