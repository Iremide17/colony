<div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="_prt_filt_dash">
                <div class="_prt_filt_dash_flex">
                    <div class="foot-news-last">
                        <div class="input-group">
                          <input wire:model="searchWord" type="text" class="form-control" placeholder="Transaction code/Reference code">
                            <div class="input-group-append">
                                <span type="button" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>i'
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="dashboard_property">
                <div class="table-responsive">
                    <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col" class="m2_hide">
                                    <input wire:model="selectPageRows" type="checkbox" class="" name="todo2"
                                    id="todoCheck2">
                                </th>
                                <th scope="col" class="m2_hide">Paid By</th>
                                <th scope="col" class="m2_hide">Property of Agent</th>
                                <th scope="col" class="m2_hide">Property</th>
                                <th scope="col" class="m2_hide">Transaction Code</th>
                                <th scope="col" class="m2_hide">Reference Code</th>
                                <th scope="col" class="m2_hide">Paid</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                        
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td class="m2_hide">
                                        <input wire:model="selectedRows" type="checkbox" value="{{ $transaction->id() }}"
                                        name="todo2" id="{{ $transaction->id() }}">
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_view"><h5 class="up">{{ $transaction->user()->name()}}</h5></div>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_view"><h5 class="up">{{ $transaction->property->agent->user()->name()}}</h5></div>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_view"><h5 class="up">{{ $transaction->property->title()}}</h5></div>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_view"><h5 class="up">{{ $transaction->tcode()}}</h5></div>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_view"><h5 class="up">{{ $transaction->rcode()}}</h5></div>
                                    </td>
                                    <td class="m2_hide">
                                        <div class="_leads_view"><h5 class="up">{{ trans('global.naira') }} {{ number_format($transaction->paidAmount(), 2)}}</h5></div>
                                        <div class="_leads_view_title"><span>{{ $transaction->paidDate()}}</span></div>
                                    </td>
                                    <td>
                                        <div class="_leads_status"><span class="active">{{ $transaction->verification_badge}}</span></div>
                                    </td>
                                    <td>
                                        <div class="_leads_action">
                                            <a href="#"><i class="fas fa-edit"></i></a>
                                            <a href="#"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center m-4">
                                    <p>No transactions available</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{ $transactions->links() }}
        </div>
    </div>
</div>
