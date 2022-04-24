@component('mail::message')
**Hello Administrator!

@component('mail::panel')
# A new Contact message from your website!

Name: {{$contact->username}}<br>
Email: {{$contact->email}}<br>
Phone Number: {{$contact->phone}}<br>
Message: {{$contact->message}}

@endcomponent

@component('mail::button', ['url' => route('admin.dashboard' )])
<i class="fa fa-eye" aria-hidden="true"></i> Goto Dashboard
@endcomponent

Thanks,
Team {{ application('name') }}, {{ date('Y') }}.
@endcomponent
