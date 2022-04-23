<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use App\Models\Property;
use App\Jobs\CreateProperty;
use App\Jobs\UpdateProperty;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'agent', 'verified']);
    }
    
    public function index()
    {
        return view('agent.property.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $categories = PropertyCategory::all()->pluck('name', 'id')->prepend('Select Category');
        $types = PropertyType::all()->pluck('name', 'id')->prepend('Select Type');

        return view('agent.property.create',[
            'agents'        =>      $agents ,
            'categories'    => $categories,
            'types'         => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $this->dispatchSync(CreateProperty::fromRequest($request));

        $notification = array(
            'messege' => 'Property created successfully',
            'alert-type' => 'success',
            'title' => 'Successful!',
            'button' => 'Thanks, the operation was successful!',
        );

        if (!auth()->user()->isAdmin || !auth()->user()->isSuperAdmin) {
            return redirect()->route('agent.property.index')->with($notification);
        }
        else{
            return redirect()->route('admin.property.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('agent.property.edit', [
            'property' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $this->dispatchSync(UpdateProperty::fromRequest($property, $request));

        $notification = array(
            'messege' => 'Property updated successfully',
            'alert-type' => 'success',
            'title' => 'Successful!',
            'button' => 'Thanks, the operation was successful!',
        );

        return redirect()->route('agent.property.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}