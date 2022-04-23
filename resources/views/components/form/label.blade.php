@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-xs text-blue-500 font-semibold uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>
{{-- <label {{ $attributes->merge(['class' => 'text-danger']) }}>
    {{ $value ?? $slot }}
    <a href="#" class="tip-topdata" data-tip=" {{ $value ?? $slot }}"><i class="ti-help"></i></a>
</label> --}}
