<div>
    @push('styles')
        <style>
            .modal-background {
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.5);
                position: fixed;
                top: 0;
                left: 0;
                display: block;
                z-index: 9998;
            }
            .modal {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                display: block;	
                width: 500px;
                height: 200px;
                background-color: rgb(141, 243, 136);
                box-sizing: border-box;
                z-index: 9999;
            }
            .modal > modal-body {
                padding: 15px;
                margin: 0;
            }
            .modal-header {
                background-color: #f9f9f9;
                border-bottom: 1px solid #dddddd;
                box-sizing: border-box;
                height: 50px;
            }
            .modal-header h3 {
                margin: 0;
                box-sizing: border-box;
                padding-left: 15px;
                line-height: 50px;
                color: #4d4d4d;
                font-size: 16px;
                display: inline-block;
            }
            .modal-header label {
                box-sizing: border-box;
                border-left: 1px solid #dddddd;
                float: right;
                line-height: 50px;
                padding: 0 15px 0 15px;
                cursor: pointer;
            }
        </style>
    @endpush



    <x-modal wire:model="show">
        <div for="modal" class="modal-background" x-on:click="show = false"></div>
        
        <div class="modal">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h3 class="text-center">Create Skill</h3>

                <button type="button" x-on:click="show = false">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <div class="modal-body d-flex flex-row justify-content-center align-items-center">
                <h5 class="text-center" style="width: 40%"> Create a new skill out of the box</h5>

                <form wire:submit.prevent='save'>
                    <div class="form-row"> 
                        <div class="form-group col-md-12">
                            <x-form.input id="city" class="block w-full mt-3" type="text" wire:model="city" :value="old('city')" placeholder="Ondo city" autofocus />
                            <x-form.error for="city" />
                        </div>

                        <div class="form-group col-md-12 float-right">
                            <x-buttons.default type="submit">
                                Save skill
                            </x-buttons.default>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </x-modal>
</div>   