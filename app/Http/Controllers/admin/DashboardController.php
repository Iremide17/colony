<?php

namespace App\Http\Controllers\admin;

use App\Models\Job;
use App\Models\Agent;
use App\Models\Ticket;
use App\Models\Booking;
use App\Models\Property;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'superAdmin', 'verified']);
    }

    public function index()
    {
        $properties     = Property::all();
        $agents         = Agent::all();
        $freelancers    = Freelancer::all();
        $jobs           = Job::all();
        $tickets        = Ticket::all();
        $bookings       = Booking::all();
        
       return view('admin.dashboard',[
           'properties' => $properties,
           'agents' => $agents,
           'freelancers' => $freelancers,
           'jobs' => $jobs,
           'tickets'   => $tickets,
           'bookings'   => $bookings, 
       ]);
    }

    public function transaction()
    {
        return view('admin.transaction');
    }

    public function setting()
    {
        return view('admin.setting');
    }
}