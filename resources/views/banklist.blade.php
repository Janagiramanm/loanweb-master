@extends('layouts.clientapp')

@section('all-page')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Loan Eligibility Calculator</li>
                    </ol>
                </div>
            </div>
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="bg-white pinside30">
                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                            <h1 class="page-title">Loan Eligibility</h1>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-3 col-sm-12 col-12">
                            <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="btn-action"> <a href="{{ route('loan.apply') }}" class="btn btn-default">How To Apply</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- content start -->
 <div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="wrapper-content bg-white pinside40">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mb60">
                            <p class="lead">Compare Interest Rates, EMI &amp; other details and choose the best Loan.</p>
                        </div>
                    </div>
                </div>
                @foreach ($eligibilities as $eligibility)
                    <div class="compare-block mb30">
                        <div class="compare-title bg-primary pinside20">
                            <h3 class="mb0">{{ $eligibility['bank_name'] }}</h3>
                        </div>
                        <div class="compare-row outline pinside30">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                    <img src="{{ asset($eligibility['bank_logo']) }}" alt="Borrow - Loan Company Website Template">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                                    <div class="text-center">
                                        <h3 class="rate">{{ $eligibility['roi'] }}%</h3>
                                        <small>Rate of Interest</small>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                                    <div class="text-center">
                                        <h3 class="fees">₹120</h3>
                                        <small>Processing Fee</small>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="text-center">
                                        <h3 class="repayment">₹{{ (int)$eligibility['eligibility'] }}</h3>
                                        <small>Eligibility</small>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="text-center comapre-action"> <a href="#" class="btn btn-default btn-sm">Go to Site</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

