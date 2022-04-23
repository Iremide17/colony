<div>
    <div class="frm_submit_block">	
        <h4>My Account</h4>
        <div class="frm_submit_wrap">
            <form wire:submit.prevent="updateProfileInformation" enctype="multipart/form-data">

                <div class="row d-flex align-items-center justify-content-center">
                    <div class="dash_user_avater" x-data="{ imagePreview: '{{ Auth::user()->profile_photo_url }}' }" title="Click on the image to update your profile picture">
                        <input wire:model="photo" type="file" class="d-none" x-ref="photo"
                            x-on:change="
                            reader = new FileReader();
                                reader.onload = (event) => {
                                imagePreview = event.target.result;
                                document.getElementById('userImage').src = `${imagePreview}`;
                            };
                                reader.readAsDataURL($refs.photo.files[0]);  
                            "
                        >
                        <img x-on:click="$refs.photo.click()" src="{{ application('image') ? Auth::user()->profile_photo_url : asset('default.png')}}" class="img-fluid avater"
                            alt="{{ auth()->user()->name() }}">
                    </div>
                </div>

                <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model="details.name">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model="details.email">
                        </div>

                        <div class="form-group col-lg-12 col-md-12 mt-4">
                            <button class="btn btn-theme btn-sm float-right" type="submit">Save Changes</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
    
    @agent
        <div class="frm_submit_block">	
            <h4>Agent</h4>
            <div class="frm_submit_wrap">
                <div class="form-row">
                
                    <div class="form-group col-md-6">
                        <label>Facebook</label>
                        <input type="text" class="form-control" value="https://facebook.com/">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Twitter</label>
                        <input type="email" class="form-control" value="https://twitter.com/">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Google Plus</label>
                        <input type="text" class="form-control" value="https://googleplus.com/">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>LinkedIn</label>
                        <input type="text" class="form-control" value="https://linkedin.com/">
                    </div>
                    
                    <div class="form-group col-lg-12 col-md-12 mt-4">
                        <button class="btn btn-theme btn-sm float-right" type="submit">Save Changes</button>
                    </div>
                    
                </div>
            </div>
        </div>
    @endagent

    @freelancer
        <div class="frm_submit_block">	
            <h4>Freelancer</h4>
            <div class="frm_submit_wrap">
                <div class="form-row">
                
                    <div class="form-group col-md-6">
                        <label>Facebook</label>
                        <input type="text" class="form-control" value="https://facebook.com/">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Twitter</label>
                        <input type="email" class="form-control" value="https://twitter.com/">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Google Plus</label>
                        <input type="text" class="form-control" value="https://googleplus.com/">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>LinkedIn</label>
                        <input type="text" class="form-control" value="https://linkedin.com/">
                    </div>
                    
                    <div class="form-group col-lg-12 col-md-12 mt-4">
                        <button class="btn btn-theme btn-sm float-right" type="submit">Save Changes</button>
                    </div>
                    
                </div>
            </div>
        </div>
    @endfreelancer
    
</div>
