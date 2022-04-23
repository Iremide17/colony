<?php

namespace App\Http\Controllers\Pages;

use App\Models\Log;
use App\Models\Ticket;
use App\Jobs\TicketJob;
use App\Models\Booking;
use App\Models\Category;
use App\mailers\AppMailer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Pages\SMSController;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $tickets = auth()->user()->tickets;
        $categories = Category::all();
        
        return view('pages.ticket.index', [
            'tickets' =>  $tickets,
            'categories' => $categories
        ]);
    }

    public function store(TicketRequest $request, AppMailer $mailer, SMSController $sms)
    {
        $booking = Booking::findOrFail($request->booking);

        $check = Ticket::where('booking_id', $request->booking)->where('user_id', auth()->id())->where('status_id',1)->first();

        if ($check) {
            $notification = array(
                'messege' => 'You already raised a ticket. we will reply shortly!',
                'alert-type' => 'error',
                'title' => 'Unsuccessful!',
                'button' => 'Sorry, the operation was unsuccessful!',
            );
                    
            return redirect()->route('ticket.index')->with($notification);
        } else {
            $ticket =   $booking->property->ticketsRelation()->create([
                'title'     => $request->input('title'),
                'ticket_id' => strtoupper(Str::random(10)),
                'booking_id'  => $request->input('booking'),
                'category_id'  => $request->input('category'),
                'priority_id'  => $request->input('priority'),
                'status_id'  => 1,
                'user_id'   => auth()->id(),
                'message'   => $request->input('message'),
            ]);


            $smsMessage = "You just created a Ticket with an ID: $ticket->ticket_id";
            $userTelephone = Auth::user()->telephone;

            if (substr($userTelephone, 0, 1) == '0') {
                $userTelephone= substr($userTelephone, 1);
                $telephone = '+234' . $userTelephone;
            }

            $mailer->sendTicketInformation(Auth::user(), $ticket);

            $notification = array(
                'alert-type' => 'success',
                'messege' => 'A ticket with ID: #$ticket->ticket_id has been opened. SMS Not Sent!'
            );
                    
            return redirect()->route('ticket.index')->with($notification);

            $smsResponse = $sms->sendSMS($smsMessage, $telephone);

            if ($smsResponse == "200") {

                $mailer->sendTicketInformation(Auth::user(), $ticket);

                $notification = array(
                    'alert-type' => 'success',
                    'messege' => "A ticket with ID: #$ticket->ticket_id has been opened."
                );

                return redirect()->route('ticket.index')->with($notification);

            } else {
                $mailer->sendTicketInformation(Auth::user(), $ticket);
                
                $notification = array(
                    'alert-type' => 'success',
                    'messege' => "A ticket with ID: #$ticket->ticket_id has been opened. SMS Not Sent!"
                );

            $ticket->save();
                return redirect()->route('ticket.index')->with($notification);
            }
        }
    }

    public function show(Ticket $ticket)
    {
        $category = $ticket->category;
        return view('pages.ticket.show', [
            'ticket' => $ticket,
            'category' => $category
        ]);
    }

    public function ticketVisibilityPublic(Log $log, $ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->visibility = 'public';


        $action = "Changed Ticket Visibility";
        $description = "Changed Ticket with ID: ". $ticket_id . " visibility to Public";
        $userId = Auth::user()->id;

        $ticket->save();

        $log->store($action, $description, $userId);

        return redirect()->back()->with("status", "The Ticket visibility has been updated to Public.");
    }

    public function ticketVisibilityPrivate(Log $log, $ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $action = "Changed Ticket Visibility";
        $description = "Changed Ticket with ID: ". $ticket_id . " visibility to Private";
        $userId = Auth::user()->id;

        $ticket->visibility = 'private';

        $ticket->save();

        $log->store($action, $description, $userId);

        return redirect()->back()->with("status", "The Ticket visibility was changed back to Private.");
    }
}
