<div>
    <div class="row">
        <div class="col-lg-2"><button wire:click.prevent="acceptAll({{$model->id()}})" class="btn btn-theme btn-sm">Accept all</button></div>
        <div class="col-lg-2"><button wire:click.prevent="rejectAll({{$model->id()}})" class="btn btn-warning btn-sm">Reject all</button></div>
        <div class="col-lg-2"><button wire:click.prevent="deleteAll({{$model->id()}})" class="btn btn-danger' btn-sm">Delete All</button></div>
    </div>
</div>
