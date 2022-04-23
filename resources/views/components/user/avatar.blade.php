@isset($user)
@php
$classes = 'img-fluid avater';
@endphp

<a href="#">
    <img {{ $attributes->merge(['class' => $classes]) }} src="{{ $user->profile_photo_url }}" alt="{{ $user->name() }}">
</a>
@endisset
