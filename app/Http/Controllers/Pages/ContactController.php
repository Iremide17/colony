<?php

namespace App\Http\Controllers\Pages;

use App\Jobs\CreateContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $this->dispatchSync(CreateContact::fromRequest($request));
        $notification  = array(
            'message'       => 'Thanks for contacting ' . application('name') . ' Customer care representative. We will get back to you shortly.',
            'button'        => 'Okay',
            'alert-type'    => 'success',
            'title'         => 'Message Sent!'
        );
        return redirect()->back()->with($notification);
    }
}