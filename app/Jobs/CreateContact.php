<?php

namespace App\Jobs;

use App\Models\Contact;
use App\Mail\UserContact;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $email;
    private $subject;
    private $message;


    public function __construct(
        string $name,
        string $email,
        string $subject,
        string $message
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public static function fromRequest(ContactRequest $request): self
    {
        return new static(
            $request->name(),
            $request->email(),
            $request->subject(),
            $request->message(),
        );
    }


    public function handle()
    {
        $contact = new Contact;
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $contact->save();

        Mail::to('' . application('email'))->send(new UserContact($contact));
    }
}