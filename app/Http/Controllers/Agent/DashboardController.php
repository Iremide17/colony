<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'agent', 'verified']);
    }

    public function index()
    {
       return view('agent.dashboard');
    }

}
