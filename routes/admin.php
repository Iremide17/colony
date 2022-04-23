<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FreelancerController;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/setting', [DashboardController::class, 'setting'])->name('application');


    Route::get('/transactions', [DashboardController::class, 'transaction'])->name('transaction.index');

    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::get('/', [PropertyController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'freelancer', 'as' => 'freelancer.'], function () {
        Route::get('/', [FreelancerController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
        Route::get('/', [AgentController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('{ticket}', [TicketController::class, 'show'])->name('show');
        Route::post('/', [TicketController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'job', 'as' => 'job.'], function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('{ticket}', [TicketController::class, 'show'])->name('show');
        Route::post('/', [TicketController::class, 'store'])->name('store');
    });

});