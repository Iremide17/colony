<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'superAdmin']);
    }
    
    public function index()
    {
        return view('admin.freelancer.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function show(Freelancer $freelancer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function edit(Freelancer $freelancer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freelancer $freelancer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freelancer $freelancer)
    {
        //
    }
}