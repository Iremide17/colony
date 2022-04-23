<div class="flex flex-wrap gap-3">

    {{-- Facebook --}}
    <x-buttons.social href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank" class="bg-blue-500">
        <i class="fa fa-share"></i>
        <i class="fab fa-facebook" style="color: blue"></i>
    </x-buttons.social>

    {{-- Twitter --}}
    <x-buttons.social href="https://twitter.com/intent/tweet?url={{ $url }}text={{ $property->title() }}" target="_blank" class="bg-blue-200">
        <i class="fa fa-share"></i>
        <i class="fab fa-twitter" style="color: rgb(56, 120, 238)"></i>
    </x-buttons.social>

    {{-- Whatsapp --}}
    <x-buttons.social href="https://wa.me/?text={{ $property->title() }} {{ $url }}" target="_blank" class="bg-green-500">
        <i class="fa fa-share"></i>
        <i class="fab fa-whatsapp" style="color: green"></i>
    </x-buttons.social>

    {{-- Telegram --}}
    <x-buttons.social href="https://telegram.me/share/url?url={{ $url }}&text={{ $property->title() }}" target="_blank" class="bg-blue-300">
        <i class="fa fa-share"></i>
        <i class="fab fa-telegram" style="color: rgb(37, 180, 247)"></i>
    </x-buttons.social>

</div>
