<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'superAdmin']);
    }

    public function index()
    {
        return view('admin.Booking.index');
    }
}
