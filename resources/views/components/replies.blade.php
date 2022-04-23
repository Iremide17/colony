@foreach ($comments as $comment)

@php
$depth = ($comment->depth * 8)
@endphp

    <div class="dash-msg-content">
        @if($comment->depth > 0 )ml-{{ $depth }}@endif

        <div class="message-plunch @if(auth()->id() == $comment->user_id) me @endif">
            <div class="dash-msg-avatar">
                <img src="{{ $comment->user()->profile_photo_url }}" alt="{{ $comment->user()->name() }}">
            </div>
            <div class="dash-msg-text">
                <p>{{ $comment->body() }}</p>
            </div>
        </div>

    </div>
@if($comment->replies())
<x-replies :comments="$comment->replies()" :ticket=$ticket />
@endif

@endforeach

