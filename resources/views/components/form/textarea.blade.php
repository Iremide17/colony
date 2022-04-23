@php
$classes = 'form-control h-120';
@endphp

<textarea {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</textarea>
