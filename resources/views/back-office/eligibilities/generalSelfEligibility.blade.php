@extends('layouts.back-office')

@section('breadcrum')
   General Self Employeed Eligibility Results
@stop

@section('main-content')
{{-- {{ dd($params) }} --}}
<div class="content">
    <!-- Simple statistics -->
    <div class="mb-3">
        <h6 class="mb-0 font-weight-semibold">
            Final Results
        </h6>
    </div>
    <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    @if (isset($params['apprisalIncome']))
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-cash2 icon-3x text-success-400"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$params['apprisalIncome']}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">APPRAISED INCOME</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    @if (isset($params['totaldeductions']))
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-credit-card2 icon-3x text-success-400"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$params['totaldeductions']}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        @if (isset($params['emi']))
                        <div class="mr-3 align-self-center">
                            <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $params['emi'] }}</h3>
                            <span class="text-uppercase font-size-sm text-muted">Emi Per Month / lach</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        @if (isset($params['foir']))
                        <div class="mr-3 align-self-center">
                            <i class="icon-percent icon-3x text-indigo-400"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{ $params['foir'] * 100 }} %</h3>
                            <span class="text-uppercase font-size-sm text-muted">FOIR</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        @if (isset($params['marginPaidInAmount']))
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{ $params['marginPaidInAmount'] }}</h3>
                                <span class="text-uppercase font-size-sm text-muted">Margin Paid in Amout</span>
                            </div>
                            <div class="ml-3 align-self-center">
                                <i class="icon-home5 icon-3x text-blue-400"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        @if (isset($params['eligibleLoanAsPerProperty']))
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{ $params['eligibleLoanAsPerProperty'] }}</h3>
                                <span class="text-uppercase font-size-sm text-muted">ELIGIBLE LOAN AMOUNT AS PER PROPERTY (A)</span>
                            </div>
                            <div class="ml-3 align-self-center">
                                <i class="icon-home5 icon-3x text-blue-400"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        @if (isset($params['eligibilityAsPerIncome']))
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{ $params['eligibilityAsPerIncome'] }}</h3>
                                <span class="text-uppercase font-size-sm text-muted">ELIGIBLE LOAN AMOUNT AS PER INCOME (B)</span>
                            </div>
                            <div class="ml-3 align-self-center">
                                <i class="icon-cash3 icon-3x text-blue-400"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-danger-400 has-bg-image">
                    <div class="media">
                        @if (isset($params['finalEligibility']))
                            <div class="ml-3 align-self-center">
                                <i class="icon-cash icon-3x opacity-75"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$params['finalEligibility']}}</h3>
                                <span class="text-uppercase font-size-xs">FINAL ELIGIBILITY (WHICHEVER IS LOWER OF A/B)</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>



</div>
@endsection
