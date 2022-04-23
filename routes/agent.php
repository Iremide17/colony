<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Agent\DashboardController;


Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::get('/', [PropertyController::class, 'index'])->name('index');
        Route::get('/create', [PropertyController::class, 'create'])->name('create');
        Route::post('/', [PropertyController::class, 'store'])->name('store');
        Route::get('{property}', [PropertyController::class, 'show'])->name('show');
        Route::get('/edit/{property}', [PropertyController::class, 'edit'])->name('edit');
        Route::put('/{property}', [PropertyController::class, 'update'])->name('update');
    }); 

});
