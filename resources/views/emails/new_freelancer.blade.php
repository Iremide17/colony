@component('mail::message')
**Hello Administrator!

@component('mail::panel')
User: {{  $freelancer->user()->name() }},  has just submitted an application
**Please visit your dashboard to view the application and approve as desired after verification.
@endcomponent

@component('mail::button', ['url' => route('admin.freelancer.index' )])
    <i class="fa fa-eye" aria-hidden="true"></i> View Freelancers
@endcomponent

Thanks,
Team {{ application('name') }}, {{ date('Y') }}.
@endcomponent
