@php
$classes = 'btn btn-theme-2 btn-sm'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
