<div>
   
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Total Jobs
                <span class="pc-title theme-cl">
                    {{ $jobs->count() }}
                </span>
            </h4>
        </div>
    </div>

    <div class="card">
        <div class="row">
            <div class=" {{ $currenJob ? 'col-lg-8 col-md-8' : 'col-lg-12 col-md-12' }}">
                <div class="card-body p-0">
                    <div class="dashboard_property">
                        <div class="table-responsive">
                            <table class="table table-lg table-hover">

                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th>Booking</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                @forelse ($jobs as $key =>  $job)
                                    <tbody>

                                        <tr>
                                            <td>
                                                <p>({{ $key + 1 }}).</p>
                                            </td>
                                            <td>
                                                {{ $job->booking->code() }}
                                            </td>
                                            <td class="text-danger font-bold">
                                                {{ trans('global.naira') }} {{ $job->freelancer->rate() }} /
                                                <sup>hr</sup>
                                            </td>
                                            <td>
                                                @if ($job->status == 0)
                                                    <div class="_leads_status"><span
                                                            class="expire">{{ $job->status_badge }}</span>
                                                    </div>
                                                @else
                                                    <div class="_leads_status"><span
                                                            class="active">{{ $job->status_badge }}</span>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                <x-buttons.default wire:click='viewJob({{ $job->id() }})'>
                                                    View Job
                                                </x-buttons.default>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <div class="text-center m-5">
                                        <p class="text-info">
                                            No jobs available
                                        </p>
                                    </div>
                                @endforelse


                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if ($currenJob)
                <div class="col-lg-4 col-md-4">
                    <div class="row m-2 text-center">
                            <div class="col-md-6 float-left">
                                <livewire:pages.user.canceljob :job='$currenJob' :key="$currenJob->id()">
                            </div>
                            <div class="col-md-6 float-right">
                                <x-buttons.default wire:click="clearViewJob"><i class="fa fa-times" aria-hidden="true"></i> Close Job</x-buttons.default>
                            </div>                       
                    </div>
                    <div class="pricing packages_style_5">
                        <div class="comp_properties">
                            <div class="clp-img">
                                <img src="{{ asset('storage/'.$currenJob->booking->property->image) }}" class="img-fluid" alt="{{ $currenJob->booking->property->title }}">
                            </div>

                            <div class="clp-title">
                                <h5>Branch: {{ $currenJob->branch->name }}</h5>
                                <h5>Action/Service: {{ $currenJob->freelancer->title }}</h5>
                            </div>

                            <div class="sider_blocks_wrap">
                                <div class="side-booking-body">
                                    <div class="agent-_blocks_title">
                                    
                                        <div class="agent-_blocks_thumb"><img src="{{ asset('storage/'.$currenJob->freelancer->user()->profile_photo_path) }}" alt="{{ $currenJob->freelancer->user()->name }}"></div>
                                        <div class="agent-_blocks_caption">
                                            <h4><a href="#">{{ $currenJob->freelancer->user()->name }}</a></h4>
                                            <span class="approved-agent">{{ $currenJob->freelancer->address }}</span>
                                            <span class="approved-agent">{{ $currenJob->freelancer->user()->email }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                                                    
                                    <span id="number" data-last="+{{ $currenJob->freelancer->telephone }}">
                                        <span><a href="tel:+{{ $currenJob->freelancer->telephone }}">{{ $currenJob->freelancer->telephone }}</a></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 text-center d-lg-block d-md-none d-sm-none d-none">
                                <ul>
                                    <li>
                                        <span>Approved At</span>
                                    </li>
                                    <li>
                                        <span>Completed At</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-12 text-center">
                                <ul>
                                    <li>
                                        @if ($currenJob->approved_at)
                                            <div class="checkmark"></div>
                                            <span class="show-mb">{{ $currenJob->approvedDate() }}</span>
                                        @else
                                            <div class="crossmark"></div>
                                            <span class="show-mb">Not Approved</span>
                                        @endif
                                    </li>
                                    <li>
                                        @if ($currenJob->completed_at)
                                            <div class="checkmark"></div>
                                            <span class="show-mb">{{ $currenJob->completedDate() }}</span>
                                        @else
                                            <div class="crossmark"></div>
                                            <span class="show-mb">Not Completed</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
