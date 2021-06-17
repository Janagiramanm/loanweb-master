@extends('layouts.back-office')

@section('breadcrum')
    General Self Employeed Applicant Details
@stop

@section('main-content')
<div class="content">
    <form action="{{ url('back-office/eligibilities/selfemployeeGeneral') }}" method="post">
        @csrf
        <input type="hidden" name="" id="" value="{{ $input['employmentType'] }}">
        @if ($input['noOfApplicants'] == 1)
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 1</h5>
                    </div>
                    <input type="hidden" name="applicant1" id="" value="1">
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">NET PROFIT  </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="netProfit1" class="form-control" placeholder="Gross Income">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">DEPRICIATION </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="depriciation1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ONE TIME EXPENSES </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="onetimeExpenses1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">TOTAL REMUNERATION / SHARE OF PROFIT / SALARY </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="totalRemuneration1" class="form-control" placeholder="VTOTAL REMUNERATION / SHARE OF PROFIT / SALARY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincome1" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincomenotshow1" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="incomeOfInterest1" class="form-control" placeholder="INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriIncome1" class="form-control" placeholder="AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50percent1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100percent1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS)" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherIncome1" class="form-control" placeholder="ANY OTHER INCOME ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">INCOME TAX PAID / PAYABLE - 100%</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="incometax1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills1" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
        @elseif ($input['noOfApplicants'] == 2)
            <input type="hidden" name="applicant2" id="" value="2">
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 1</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">NET PROFIT  </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="netProfit1" class="form-control" placeholder="Gross Income">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">DEPRICIATION </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="depriciation1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ONE TIME EXPENSES </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="onetimeExpenses1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">TOTAL REMUNERATION / SHARE OF PROFIT / SALARY </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="totalRemuneration1" class="form-control" placeholder="VTOTAL REMUNERATION / SHARE OF PROFIT / SALARY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincome1" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincomenotshow1" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="incomeOfInterest1" class="form-control" placeholder="INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriIncome1" class="form-control" placeholder="AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50percent1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100percent1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS)" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherIncome1" class="form-control" placeholder="ANY OTHER INCOME ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">INCOME TAX PAID / PAYABLE - 100%</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="incometax1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills1" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 2</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">NET PROFIT  </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="netProfit2" class="form-control" placeholder="Gross Income">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">DEPRICIATION </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="depriciation2" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ONE TIME EXPENSES </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="onetimeExpenses2" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">TOTAL REMUNERATION / SHARE OF PROFIT / SALARY </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="totalRemuneration2" class="form-control" placeholder="VTOTAL REMUNERATION / SHARE OF PROFIT / SALARY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincome2" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincomenotshow2" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="incomeOfInterest2" class="form-control" placeholder="INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriIncome2" class="form-control" placeholder="AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50percent2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100percent2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS)" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherIncome2" class="form-control" placeholder="ANY OTHER INCOME ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">INCOME TAX PAID / PAYABLE - 100%</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="incometax2" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans2" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills2" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
        @else
            <input type="hidden" name="applicant3" id="" value="3">
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 1</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">NET PROFIT  </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="netProfit1" class="form-control" placeholder="Gross Income">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">DEPRICIATION </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="depriciation1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ONE TIME EXPENSES </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="onetimeExpenses1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">TOTAL REMUNERATION / SHARE OF PROFIT / SALARY </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="totalRemuneration1" class="form-control" placeholder="VTOTAL REMUNERATION / SHARE OF PROFIT / SALARY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincome1" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincomenotshow1" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="incomeOfInterest1" class="form-control" placeholder="INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriIncome1" class="form-control" placeholder="AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50percent1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100percent1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS)" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherIncome1" class="form-control" placeholder="ANY OTHER INCOME ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">INCOME TAX PAID / PAYABLE - 100%</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="incometax1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans1" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills1" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 2</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">NET PROFIT  </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="netProfit2" class="form-control" placeholder="Gross Income">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">DEPRICIATION </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="depriciation2" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ONE TIME EXPENSES </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="onetimeExpenses2" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">TOTAL REMUNERATION / SHARE OF PROFIT / SALARY </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="totalRemuneration2" class="form-control" placeholder="VTOTAL REMUNERATION / SHARE OF PROFIT / SALARY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincome2" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincomenotshow2" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="incomeOfInterest2" class="form-control" placeholder="INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriIncome2" class="form-control" placeholder="AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50percent2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100percent2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS)" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherIncome2" class="form-control" placeholder="ANY OTHER INCOME ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">INCOME TAX PAID / PAYABLE - 100%</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="incometax2" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans2" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills2" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 3</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">NET PROFIT  </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="netProfit3" class="form-control" placeholder="Gross Income">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">DEPRICIATION </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="depriciation3" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ONE TIME EXPENSES </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="onetimeExpenses3" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">TOTAL REMUNERATION / SHARE OF PROFIT / SALARY </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="totalRemuneration3" class="form-control" placeholder="VTOTAL REMUNERATION / SHARE OF PROFIT / SALARY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincome3" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE SHOWN IN ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalincomenotshow3" class="form-control" placeholder="RENTAL INCOME (BANK / RENAL DEEDS AVAILABLE NOT SHOWN IN ITRS) ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="incomeOfInterest3" class="form-control" placeholder="INCOME FROM  INTEREST / DIVIDEND (50% OF LAST 2 YEARS AVERAGE / 12) (SHOWN IN ITRS)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriIncome3" class="form-control" placeholder="AGRICULTURAL INCOME - (SHOWN IN ITRS 100% OF AVERAGE OF LAST 2 YEARS /12)">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50percent3" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (50% NEW BUSINESS /12) (AS PER ITRS)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS) </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100percent3" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - (100% OF RENEWAL BUSINESS)/12 (AS PER ITRS)" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherIncome3" class="form-control" placeholder="ANY OTHER INCOME ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">INCOME TAX PAID / PAYABLE - 100%</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="incometax3" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CAR LOAN / HOME LOAN / PL /OTHER EXISTING EMIS</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="allLoans3" class="form-control" placeholder="Any loans">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CREDIT CARD PAYMENTS  (ALL CREDIT CARD OUTSTANDING AMOUNT)</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="creditCardBills3" class="form-control" placeholder="Credit Card Emi">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
        @endif
            <div class="content">
                <!-- Input formatter -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Other Details</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Other Details </legend>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Rate Of Interest</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rateOfInterest" value="8.00"  class="form-control" placeholder="Rate Of Interest">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Loan Tenure</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="loanTenure" class="form-control" placeholder="Loan Tenure">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Cost Of The Property</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="costOfProperty" class="form-control" placeholder="Cost Of The Property">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Loan Amount Requested</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="loanRequested" class="form-control" placeholder="Loan Amount Requested">
                                    </div>
                                </div>

                            </fieldset>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Proceed <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /input formatter -->
            </div>
    </form>
    <button class="btn btn-secondary" onclick="window.history.back();">Go Back</button>

</div>
@endsection

