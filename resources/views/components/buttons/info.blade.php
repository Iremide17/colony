<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-info btn-sm']) }}>
    {{ $slot }}
</button>
