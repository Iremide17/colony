@component('mail::message')
**Hello Administrator!

@component('mail::panel')
User: {{  $property->agent->user()->name() }},  has just submitted a new property
**Please visit your dashboard to view the property and approve as desired after verification.
@endcomponent

@component('mail::button', ['url' => route('admin.property.index' )])
    <i class="fa fa-eye" aria-hidden="true"></i> Goto Dashboard
@endcomponent

Thanks,
Team {{ application('name') }}, {{ date('Y') }}.
@endcomponent
