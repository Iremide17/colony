<?php

namespace App\Http\Livewire\Pages\Property;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Property;
use App\Events\BookingMade;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Book extends Component
{

    public $state = [
        'checkin' => '',
        'checkout' => '',
        'adults' => '',
        'children' => ''
    ];
    
    public $property;
    public $subTotal;
    public $different_days;
    public bool $cleaning;

    public function mount(Property $property)
    {
        $this->property = $property;
        
    }

    public function updated($key, $value)
    {
        if (in_array($key, ['state.checkout'])) {
            $in = $this->state['checkin'];
            $out = $this->state['checkout'];

            $start = \Carbon\carbon::createFromFormat('Y-m-d', $in);
            $end = \Carbon\carbon::createFromFormat('Y-m-d', $out);
            $different_days = $start->diffInDays($end);
            
            $this->different_days = $different_days;
            $this->subTotal = $different_days * $this->property->price;
        }
    }

    public function userBooking()
    {
        $createBooking = Validator::make($this->state, [

            'checkin' => 'required',
            'checkout' => 'required',
            'adults' => 'nullable',
            'children' => 'nullable',
        ])->validate();

        $check = Booking::where('user_id',Auth::id())->where('property_id',$this->property->id())->first();

        if ($check) {
            $this->dispatchBrowserEvent('error', [
                'message'     => 'Sorry! property ' .$this->property->title(). ' has already been booked. Please wait for verification from the administrator. Thanks!',
            ]);
        }else{
            $booking = new Booking();
            $booking->checkin           = $createBooking['checkin'];
            $booking->checkout          = $createBooking['checkout'];
            $booking->adults            = $createBooking['adults'] ? $createBooking['adults'] : 0;
            $booking->children          = $createBooking['children'] ? $createBooking['children'] : 0;
            $booking->booking_id        = strtoupper(Str::random(10));
            $booking->days              = $this->different_days;
            $booking->total             = $this->subTotal + application('logistic') + application('cleaning');
            $booking->property()->associate($this->property);
            $booking->useredBy(Auth::user());
            $booking->save();

            $this->emit('propertyAdded');
            $this->dispatchBrowserEvent('success', ['message' => 'You have just successfully placed a booking on this property']);
            event(new BookingMade($booking));
            return redirect()->route('booking.index');
        }
            
    }

    public function book()
    {
        $check = Booking::where('user_id',Auth::id())->where('property_id',$this->property->id())->first();

        if ($check) {
            $this->dispatchBrowserEvent('error', [
                'message'     => 'Sorry! property ' .$this->property->name(). ' has already been booked. Please wait for confirmation from the administrator',
            ]);
        }
        else{

            $booking = new Booking();
            $booking->property()->associate($this->property);
            $booking->useredBy()->associate(Auth::user());
            $booking->checkin = 0; 
            $booking->checkout = 0; 
            $booking->adult = 0; 
            $booking->children = 0; 
            $booking->isVerified = 0; 
            $booking->save();

            event(new BookingWasCreated($booking));

            $this->dispatchBrowserEvent('alert', [
                'message'     => 'Property booked successfully',
            ]);

            $this->emit('book', booking::where('author_id',Auth::id())->count());

        }        
    }

    public function render()
    {
        return view('livewire.pages.property.book');
    }
}