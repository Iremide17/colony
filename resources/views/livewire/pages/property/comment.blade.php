<div class="author-review">
    <div class="comment-list">
        <ul>
            @forelse ($comments as $comment)
                <li class="article_comments_wrap">
                    <article>
                        <div class="article_comments_thumb">
                            <img src="{{ $comment->user()->profile_photo_url }}" alt="{{ $comment->user()->name() }}">
                        </div>
                        <div class="comment-details">
                            <div class="comment-meta">
                                <div class="comment-left-meta">
                                    <h4 class="author-name">{{ $comment->user()->name() }}</h4>
                                    <div class="comment-date">{{ $comment->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            <div class="comment-text">
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                    </article>
                </li>
            @empty
                <div class="text-center">
                    <p>No comments yet</p>
                </div>
            @endforelse
        </ul>
    </div>

        <x-loadmore :models="$comments"/>
</div>