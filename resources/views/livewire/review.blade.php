
<div>
    <div class="property_block_wrap">
                        
        <div class="property_block_wrap_header">
            <h4 class="property_block_title">
                {{ $model->reviews()->count()}}
                {{ Illuminate\Support\Str::plural('Review', count($model->reviews())) }}
            </h4>
        </div>
    
        <div class="block-body">
            <div class="rating-overview">
                <div class="rating-overview-box">
                    <span class="rating-overview-box-total">4.8</span>
                    <span class="rating-overview-box-percent">out of 5.0</span>
                    <div class="star-rating" data-rating="5"><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star filled"></i><i class="fa fa-star-half filled"></i>
                    </div>
                </div>
    
                <div class="rating-bars text-center">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button wire:click="addReview" type="button" name="add_review" id="add_review" class="btn btn-theme">Click to leave a review</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="author-review">
                <div class="comment-list">
                    <ul>
                        @forelse ($reviews as $review)
                            <li class="article_comments_wrap">
                                <article>
                                    <div class="article_comments_thumb">
                                        <img src="{{ asset('storage/'.$review->user()->profile_photo_url) }}" alt="{{ $review->user()->name() }}">
                                    </div>
                                    <div class="comment-details">
                                        <div class="comment-meta">
                                            <div class="comment-left-meta">
                                                <h4 class="author-name">{{ $review->user()->name() }}</h4>
                                                <div class="comment-date">{{ $review->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <p>{{ $review->body }}.</p>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @empty
                            
                        @endforelse
                    </ul>
                </div>
            </div>
            <x-loadMore :models="$reviews"/>
        </div>
    </div>

    <div class="modal fade" id="review_modal" tabindex="-1" role="dialog"
        aria-labelledby="authomessage" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl modal-dialog-centered login-pop-form"
            role="document">
            <div class="modal-content" id="authomessage">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i
                        class="ti-close"></i></span>
                <div class="modal-body">
                    <h5 class="modal-header-title text-center">Submit review</h5>
                    <div class="login-form">
                        <form wire:submit.prevent='reviewForm'>
                            <div class="prt_saveed_12lk mb-2" style="display: flex; justify-content: center; align-items: center" wire:ignore.self>
                                <label class="toggler toggler-danger mr-1">
                                    <input type="checkbox" value="1" wire:model.debounce.350ms="rating">
                                    <i class="fas fa-heart"></i>
                                </label>
                                <label class="toggler toggler-danger mr-1">
                                    <input type="checkbox" value="2" wire:model.debounce.350ms="rating">
                                    <i class="fas fa-heart"></i>
                                </label>
                                <label class="toggler toggler-danger mr-1">
                                    <input type="checkbox" value="3" wire:model.debounce.350ms="rating">
                                    <i class="fas fa-heart"></i>
                                </label>
                                <label class="toggler toggler-danger mr-1">
                                    <input type="checkbox" value="4" wire:model.debounce.350ms="rating">
                                    <i class="fas fa-heart"></i>
                                </label>
                                <label class="toggler toggler-danger mr-1">
                                    <input type="checkbox" value="5" wire:model.debounce.350ms="rating">
                                    <i class="fas fa-heart"></i>
                                </label>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <textarea wire:model.defer='message' class="form-control h-120 @error('message')@enderror" placeholder="Type your review here..."></textarea>
                                <x-form.error for="message" />
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12">
                                <button class="btn btn-theme btn-sm float-right" type="submit">Submit review</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
