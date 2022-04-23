<?php

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\UserController;
use App\Http\Controllers\Pages\TicketController;
use App\Http\Controllers\Pages\BookingController;
use App\Http\Controllers\Pages\CommentController;
use App\Http\Controllers\Pages\FurnishController;
use App\Http\Controllers\Pages\PaystackController;
use App\Http\Controllers\Pages\PropertyController;
use App\Http\Controllers\Freelancer\FreelancerController;
    

require 'admin.php';
require 'agent.php';
require 'freelancer.php';

Route::get('/', function () {
    $properties = Property::limit(3)->get();
    $categories = PropertyCategory::all();
    $types = PropertyType::all();
    return view('welcome', [
        'properties' => $properties,
        'categories' => $categories,
        'types'     => $types         
    ]);
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::group(['prefix' => 'market', 'as' => 'market.'], function () {
    Route::get('/', [PropertyController::class, 'index'])->name('index');
    Route::get('show/{property}', [PropertyController::class, 'show'])->name('show');
});


Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
    Route::get('/', [PropertyController::class, 'index'])->name('index');
    Route::get('show/{property}', [PropertyController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('{ticket}', [TicketController::class, 'show'])->name('show');
    Route::post('/', [TicketController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
    Route::post('/', [CommentController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'furnish', 'as' => 'furnish.'], function () {
    Route::get('/{booking}', [FurnishController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'freelancer', 'as' => 'freelancer.'], function () {
    Route::get('/', [FreelancerController::class, 'index'])->name('index');
    Route::get('/create', [FreelancerController::class, 'create'])->name('create');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/{user}', [UserController::class, 'profile'])->name('profile');
    Route::get('/{user}/jobs', [UserController::class, 'job'])->name('job');
    Route::get('/{user}/favourite', [UserController::class, 'favourite'])->name('favourite');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/pay', [PaystackController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaystackController::class, 'handleGatewayCallback']);