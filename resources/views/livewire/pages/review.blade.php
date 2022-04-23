<div>

    @push('styles')
        <style>
            .wrapper {
            display: inline-block;
            }
            .wrapper * {
            float: right;
            }
            input[type:radio] {
                display: none;
            }
            label {
                font-size: 30px;
            }

            input:checked ~ label {
            color: yellow;
            }
        </style>
    @endpush

    <div class="row">
        <div class="col-md-12 text-center">
           
            <button wire:click="addReview" type="button" name="add_review" id="add_review" class="btn btn-theme">Review</button>
    
            <div class="modal fade" id="review_modal" tabindex="-1" role="dialog"
                aria-labelledby="authomessage" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered login-pop-form"
                    role="document">
                    <div class="modal-content" id="authomessage">
                        <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i
                                class="ti-close"></i></span>
                        <div class="modal-body">
                            <h4 class="modal-header-title">Submit review</h4>
                            <div class="login-form">
                                <form wire:submit.prevent='reviewForm'>
                                    <div class="wrapper">
                                        <input type="radio" id="r1" value="5" wire:model.defer="rating">
                                        <label for="r1"><i class="fas fa-star star-light"></i></label>
                                        <input type="radio" id="r2" value="4" wire:model.defer="rating">
                                        <label for="r2"><i class="fas fa-star star-light"></i></label>
                                        <input type="radio" id="r3" value="3" wire:model.defer="rating">
                                        <label for="r3"><i class="fas fa-star star-light"></i></label>
                                        <input type="radio" id="r4" value="2" wire:model.defer="rating">
                                        <label for="r4"><i class="fas fa-star star-light"></i></label>
                                        <input type="radio" id="r5" value="1" wire:model.defer="rating">
                                        <label for="r5"><i class="fas fa-star star-light"></i></label>
                                    </div>
        
                                    <div class="form-group col-lg-12 col-md-12">
                                        <textarea wire:model.defer='userReview' class="form-control h-120" placeholder="Type your review here..."></textarea>
                                        <x-form.error for="userReview" />
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-theme" type="submit">Submit review</button>
                                    </div>
        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
   
</div>
