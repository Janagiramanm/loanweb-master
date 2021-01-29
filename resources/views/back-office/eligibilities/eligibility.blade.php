@extends('layouts.back-office')

@section('breadcrum')
    Eligibility Results
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
    @if ($params['applicants'] == 1)
        @if (isset($params['company']))
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
                        @if (isset($params['totalLiabilityes1']))
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-credit-card2 icon-3x text-success-400"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="font-weight-semibold mb-0">{{$params['totalLiabilityes1']}}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="card card-body">
                        <div class="media">
                            @if (isset($params['primaryEmi']))
                            <div class="mr-3 align-self-center">
                                <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{ $params['primaryEmi'] }}</h3>
                                <span class="text-uppercase font-size-sm text-muted">Primary Emi Per Month / lakh</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="card card-body">
                        <div class="media">
                            @if (isset($params['secondaryEmi']))
                            <div class="mr-3 align-self-center">
                                <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{ $params['secondaryEmi'] }}</h3>
                                <span class="text-uppercase font-size-sm text-muted">Primary Emi Per Month / lakh</span>
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
                    <div class="card card-body">
                        <div class="media">
                            @if (isset($params['eligibityForStepUp']))
                                <div class="media-body">
                                    <h3 class="font-weight-semibold mb-0">{{ $params['eligibityForStepUp'] }}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">ELIGIBLE LOAN AMOUNT AS PER INCOME(C)</span>
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
                                    <span class="text-uppercase font-size-xs">FINAL ELIGIBILITY (WHICHEVER IS LOWER OF A/B/C)</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
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
                        @if (isset($params['totalLiabilityes1']))
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-credit-card2 icon-3x text-success-400"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="font-weight-semibold mb-0">{{$params['totalLiabilityes1']}}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="card card-body">
                        <div class="media">
                            @if (isset($params['primaryEmi']))
                            <div class="mr-3 align-self-center">
                                <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{ $params['primaryEmi'] }}</h3>
                                <span class="text-uppercase font-size-sm text-muted">Emi Per Month / lakh</span>
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
        @endif
    @elseif($params['applicants'] == 2)

            @if ($params['tenure1'] == $params['tenure2'])
                @if (isset($params['company']))
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
                                    @if (isset($params['totalLiabilityes1']))
                                        <div class="media">
                                            <div class="mr-3 align-self-center">
                                                <i class="icon-credit-card2 icon-3x text-success-400"></i>
                                            </div>

                                            <div class="media-body text-right">
                                                <h3 class="font-weight-semibold mb-0">{{$params['totalLiabilityes1']}}</h3>
                                                <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="card card-body">
                                    <div class="media">
                                        @if (isset($params['primaryEmi']))
                                        <div class="mr-3 align-self-center">
                                            <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3 class="font-weight-semibold mb-0">{{ $params['primaryEmi'] }}</h3>
                                            <span class="text-uppercase font-size-sm text-muted">Primary Emi Per Month / lakh</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="card card-body">
                                    <div class="media">
                                        @if (isset($params['secondaryEmi']))
                                        <div class="mr-3 align-self-center">
                                            <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3 class="font-weight-semibold mb-0">{{ $params['secondaryEmi'] }}</h3>
                                            <span class="text-uppercase font-size-sm text-muted">Primary Emi Per Month / lakh</span>
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
                                <div class="card card-body">
                                    <div class="media">
                                        @if (isset($params['eligibityForStepUp']))
                                            <div class="media-body">
                                                <h3 class="font-weight-semibold mb-0">{{ $params['eligibityForStepUp'] }}</h3>
                                                <span class="text-uppercase font-size-sm text-muted">ELIGIBLE LOAN AMOUNT AS PER INCOME(C)</span>
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
                                                <span class="text-uppercase font-size-xs">FINAL ELIGIBILITY (WHICHEVER IS LOWER OF A/B/C)</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                @else
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
                                    @if (isset($params['totalLiabilityes1']))
                                        <div class="media">
                                            <div class="mr-3 align-self-center">
                                                <i class="icon-credit-card2 icon-3x text-success-400"></i>
                                            </div>

                                            <div class="media-body text-right">
                                                <h3 class="font-weight-semibold mb-0">{{$params['totalLiabilityes1']}}</h3>
                                                <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-4">
                                <div class="card card-body">
                                    <div class="media">
                                        @if (isset($params['primaryEmi']))
                                        <div class="mr-3 align-self-center">
                                            <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3 class="font-weight-semibold mb-0">{{ $params['primaryEmi'] }}</h3>
                                            <span class="text-uppercase font-size-sm text-muted">Emi Per Month / lakh</span>
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
                @endif
            @else
                <div class="row">
                    <div class="col-md-6">
                        <!-- Daily sales -->
                        <div class="card">
                            <div class="card-header header-elements-inline bg-warning">
                                <h6 class="card-title">Primary Applicant Details</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <tbody>
                                        @if (isset($params['apprisalIncome1']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Apprisal Income</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['apprisalIncome1'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (isset($params['totalObligations1']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Total Obligations</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['totalObligations1'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (isset($params['emi1']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">EMI Per Lakh</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['emi1'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (isset($params['eligibilityAsPerIncome1']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">ELIGIBLE LOAN AMOUNT AS PER INCOME (B)</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['eligibilityAsPerIncome1'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /daily sales -->
                    </div>
                    <div class="col-md-6">
                        <!-- Daily sales -->
                            <div class="card">
                                <div class="card-header header-elements-inline bg-primary">
                                    <h6 class="card-title">Secondary Applicant Details</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <tbody>
                                            @if (isset($params['apprisalIncome2']))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="#" class="text-default font-weight-semibold letter-icon-title">Apprisal Income</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="font-weight-semibold mb-0">{{ $params['apprisalIncome2'] }}</h6>
                                                </td>
                                            </tr>
                                            @endif

                                            @if (isset($params['totalObligations2']))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="#" class="text-default font-weight-semibold letter-icon-title">Total Obligations</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="font-weight-semibold mb-0">{{ $params['totalObligations2'] }}</h6>
                                                </td>
                                            </tr>
                                            @endif

                                            @if (isset($params['emi2']))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="#" class="text-default font-weight-semibold letter-icon-title">EMI Per Lakh</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="font-weight-semibold mb-0">{{ $params['emi2'] }}</h6>
                                                </td>
                                            </tr>
                                            @endif

                                            @if (isset($params['eligibilityAsPerIncome2']))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="#" class="text-default font-weight-semibold letter-icon-title">ELIGIBLE LOAN AMOUNT AS PER INCOME (B)</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="font-weight-semibold mb-0">{{ $params['eligibilityAsPerIncome2'] }}</h6>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /daily sales -->
                        </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Foir</td>
                                        <td>60%</td>
                                    </tr>
                                    @if (isset($params['eligibleLoanAsPerProperty']))
                                    <tr>
                                        <td>ELIGIBLE LOAN AMOUNT AS PER PROPERTY (A)</td>
                                        <td>{{ $params['eligibleLoanAsPerProperty'] }}</td>
                                    </tr>
                                    @endif

                                    @if (isset($params['totalEligibility']))
                                        <tr>
                                            <td>TOTAL ELIGIBILITY BASED ON INCOME</td>
                                            <td>{{ $params['totalEligibility'] }}</td>
                                        </tr>
                                    @endif
                                        @if (isset($params['finalEligibility']))
                                            <tr class="bg-danger">
                                                <td>FINAL ELIGIBILITY (WHICHEVER IS LOW OF A & B)</td>
                                                <td style="font-size: 25px"><b>{{ $params['finalEligibility'] }}</b></td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>

                                        @if (isset($params['firstEmi']) && isset($params['tenure1']))
                                        <tr>
                                            <td>INITIAL EMI FOR YEARS</td>
                                            <td>{{ $params['tenure1'] }}</td>
                                            <td>{{ $params['firstEmi'] }}</td>
                                        </tr>
                                        @endif

                                        @if (isset($params['secondEmi']) && isset($params['tenure2']) && isset($params['tenure1']) )
                                            <tr>
                                                <td>EMI FOR NEXT YEARS</td>
                                                <td>{{ $params['tenure2'] - $params['tenure1'] }}</td>
                                                <td>{{ $params['secondEmi'] }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif
    @else
        @if ($params['tenure1'] == $params['tenure2'] && $params['tenure2'] == $params['tenure3'])
            {{-- @if (isset($params['company']))
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
                                @if (isset($params['totalLiabilityes1']))
                                    <div class="media">
                                        <div class="mr-3 align-self-center">
                                            <i class="icon-credit-card2 icon-3x text-success-400"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h3 class="font-weight-semibold mb-0">{{$params['totalLiabilityes1']}}</h3>
                                            <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="card card-body">
                                <div class="media">
                                    @if (isset($params['primaryEmi']))
                                    <div class="mr-3 align-self-center">
                                        <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="font-weight-semibold mb-0">{{ $params['primaryEmi'] }}</h3>
                                        <span class="text-uppercase font-size-sm text-muted">Primary Emi Per Month / lakh</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="card card-body">
                                <div class="media">
                                    @if (isset($params['secondaryEmi']))
                                    <div class="mr-3 align-self-center">
                                        <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="font-weight-semibold mb-0">{{ $params['secondaryEmi'] }}</h3>
                                        <span class="text-uppercase font-size-sm text-muted">Primary Emi Per Month / lakh</span>
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
                            <div class="card card-body">
                                <div class="media">
                                    @if (isset($params['eligibityForStepUp']))
                                        <div class="media-body">
                                            <h3 class="font-weight-semibold mb-0">{{ $params['eligibityForStepUp'] }}</h3>
                                            <span class="text-uppercase font-size-sm text-muted">ELIGIBLE LOAN AMOUNT AS PER INCOME(C)</span>
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
                                            <span class="text-uppercase font-size-xs">FINAL ELIGIBILITY (WHICHEVER IS LOWER OF A/B/C)</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            @else
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
                                @if (isset($params['totalLiabilityes1']))
                                    <div class="media">
                                        <div class="mr-3 align-self-center">
                                            <i class="icon-credit-card2 icon-3x text-success-400"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h3 class="font-weight-semibold mb-0">{{$params['totalLiabilityes1']}}</h3>
                                            <span class="text-uppercase font-size-sm text-muted">TOTAL OBLIGATIONS</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="card card-body">
                                <div class="media">
                                    @if (isset($params['primaryEmi']))
                                    <div class="mr-3 align-self-center">
                                        <i class="icon-piggy-bank icon-3x text-indigo-400"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="font-weight-semibold mb-0">{{ $params['primaryEmi'] }}</h3>
                                        <span class="text-uppercase font-size-sm text-muted">Emi Per Month / lakh</span>
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
            @endif --}}
            <h1>No data available</h1>
        @else
            <div class="row">
                <div class="col-md-6">
                    <!-- Daily sales -->
                    <div class="card">
                        <div class="card-header header-elements-inline bg-warning">
                            <h6 class="card-title">Primary Applicant Details</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <tbody>
                                    @if (isset($params['apprisalIncome1']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">Apprisal Income</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['apprisalIncome1'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif

                                    @if (isset($params['totalObligations1']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">Total Obligations</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['totalObligations1'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif

                                    @if (isset($params['emi1']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">EMI Per Lakh</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['emi1'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif

                                    @if (isset($params['eligibilityAsPerIncome1']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">ELIGIBLE LOAN AMOUNT AS PER INCOME (B)</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['eligibilityAsPerIncome1'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /daily sales -->
                </div>
                <div class="col-md-6">
                    <!-- Daily sales -->
                        <div class="card">
                            <div class="card-header header-elements-inline bg-primary">
                                <h6 class="card-title">Secondary Applicant Details</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <tbody>
                                        @if (isset($params['apprisalIncome2']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Apprisal Income</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['apprisalIncome2'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (isset($params['totalObligations2']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Total Obligations</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['totalObligations2'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (isset($params['emi2']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">EMI Per Lakh</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['emi2'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif

                                        @if (isset($params['eligibilityAsPerIncome2']))
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">ELIGIBLE LOAN AMOUNT AS PER INCOME (B)</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-semibold mb-0">{{ $params['eligibilityAsPerIncome2'] }}</h6>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /daily sales -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Daily sales -->
                    <div class="card">
                        <div class="card-header header-elements-inline bg-dark">
                            <h6 class="card-title">Primary Applicant Details</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <tbody>
                                    @if (isset($params['apprisalIncome3']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">Apprisal Income</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['apprisalIncome3'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif

                                    @if (isset($params['totalObligations3']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">Total Obligations</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['totalObligations3'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif

                                    @if (isset($params['emi3']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">EMI Per Lakh</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['emi3'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif

                                    @if (isset($params['eligibilityAsPerIncome3']))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">ELIGIBLE LOAN AMOUNT AS PER INCOME (B)</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-semibold mb-0">{{ $params['eligibilityAsPerIncome3'] }}</h6>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /daily sales -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Foir</td>
                                    <td>60%</td>
                                </tr>
                                @if (isset($params['eligibleLoanAsPerProperty']))
                                <tr>
                                    <td>ELIGIBLE LOAN AMOUNT AS PER PROPERTY (A)</td>
                                    <td>{{ $params['eligibleLoanAsPerProperty'] }}</td>
                                </tr>
                                @endif

                                @if (isset($params['totalEligibility']))
                                    <tr>
                                        <td>TOTAL ELIGIBILITY BASED ON INCOME</td>
                                        <td>{{ $params['totalEligibility'] }}</td>
                                    </tr>
                                @endif
                                    @if (isset($params['finalEligibility']))
                                        <tr class="bg-danger">
                                            <td>FINAL ELIGIBILITY (WHICHEVER IS LOW OF A & B)</td>
                                            <td style="font-size: 25px"><b>{{ $params['finalEligibility'] }}</b></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>

                            @if (isset($params['firstEmi']) && isset($params['tenure1']))
                            <tr>
                                <td>INITIAL EMI FOR YEARS</td>
                                <td>{{ $params['tenure1'] }}</td>
                                <td>{{ $params['firstEmi'] }}</td>
                            </tr>
                            @endif

                            @if (isset($params['secondEmi']) && isset($params['tenure2']) && isset($params['tenure1']) )
                                <tr>
                                    <td>EMI FOR NEXT YEARS</td>
                                    <td>{{ $params['tenure2'] - $params['tenure1'] }}</td>
                                    <td>{{ $params['secondEmi'] }}</td>
                                </tr>
                            @endif

                            @if (isset($params['secondEmi']) && isset($params['tenure2']) && isset($params['tenure1']) && isset($params['tenure3'])  )
                                <tr>
                                    <td>EMI FOR NEXT YEARS</td>
                                    <td>{{ $params['tenure3'] - $params['tenure1'] - ($params['tenure2'] - $params['tenure1']) }}</td>
                                    <td>{{ $params['thirdEmi'] }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    @endif

</div>
@endsection
