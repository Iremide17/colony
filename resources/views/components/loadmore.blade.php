<div class="flex justify-center my-16 p-2">
    {{-- @push('styles')
        <style>
            
            .Ids-ellipsis {
                display: inline-block;
                position: relative;
                width: 20px;
                height: 40px;
            }

            .Ids-ellipsis div {
                position: absolute;
                top: 33px;
                width: 13px;
                height: 13px;
                border-radius: 50%;
                background: rgb(240, 233, 19);
                animation-timing-function: cubic-bezier(0, 1, 1, 0);
            }

            .Ids-ellipsis div:nth-child(1) {
                left: 8px;
                animation: Ids-ellipsis1 0.6s infinite;
            }

            .Ids-ellipsis div:nth-child(2) {
                left: 8px;
                animation: Ids-ellipsis1 0.6s infinite;
            }
            .Ids-ellipsis div:nth-child(3) {
                left: 32px;
                animation: Ids-ellipsis2 0.6s infinite;
            }
            .Ids-ellipsis div:nth-child(4) {
                left: 56px; animation: Ids-ellipsis3 0.6s infinite; -webkit-animation: Ids-ellipsis3 0.6s infinite;
            }

            @keyframes Ids-ellipsis1 {
                0% {
                    transform: scale(0);
                }
                100% {
                    transform: scale(1);
                }
            }

            @keyframes Ids-ellipsis3 {
                0% {
                    transform: scale(1);
                }
                100% {
                    transform: scale(0);
                }
            }

            @keyframes Ids-ellipsis2 {
                0% {
                    transform: translate(0, 0);
                }
                100% {
                    transform: translate(24px, 0);
                }
            }
        </style>
    @endpush --}}
    @if ($models->hasMorePages())
        <x-buttons.default wire:click="loadMore">
            Load More
            <div wire:loading>
                <div class="Ids-ellipsis"><div></div><div></div><div></div>
            </div>
        </x-buttons.default>
    @endif
</div>