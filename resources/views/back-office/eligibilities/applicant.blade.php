@extends('layouts.back-office')

@section('breadcrum')
    Applicant Details

@stop

@section('main-content')
<div class="content">
{{-- {{ dd($input) }} --}}
    <form action="{{ url('back-office/eligibilities/eligibility') }}" method="post">
        @csrf
        <input type="hidden" name="companyType"  value="{{ $input['company'] }}">
        <input type="hidden" name="cibilScore"  value="{{ $input['cibilScore'] }}">
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

                               

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross / Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome1" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome1" class="form-control" placeholder="Net Income">
                                        </div>
                                    </div>
                                @endif --}}


                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT1" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat1" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear1" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Intrest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend1" class="form-control" placeholder="Income from Intrest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant1" class="form-control" placeholder="Age of applicant" value="{{ $input['age'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome1" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources1" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

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
                        <h5 class="card-title">Aplicant 1</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome1" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome1" class="form-control" placeholder="Net Income">
                                        </div>
                                    </div>
                                @endif --}}


                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT1" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat1" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear1" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Intrest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend1" class="form-control" placeholder="Income from Intrest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant1" class="form-control" placeholder="Age of applicant" value="{{ $input['age'] }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome1" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources1" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

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
                        <h5 class="card-title">Aplicant 2</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                @endif --}}

                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr2" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr2" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT2" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat2" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear2" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Intrest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend2" class="form-control" placeholder="Income from Intrest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant2" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome2" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources2" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

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
                        <h5 class="card-title">Aplicant 1</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome1" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome1" class="form-control" placeholder="Net Income">
                                        </div>
                                    </div>
                                @endif --}}


                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr1" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr1" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT1" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat1" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf1" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear1" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Intrest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend1" class="form-control" placeholder="Income from Intrest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant1" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome1" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew1" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources1" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

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
                        <h5 class="card-title">Aplicant 2</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome2" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                @endif --}}

                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr2" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr2" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT2" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat2" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf2" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear2" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Intrest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend2" class="form-control" placeholder="Income from Intrest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant2" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome2" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew2" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources2" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

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
                        <h5 class="card-title">Aplicant 3</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                            <div class="col-md-4">

                                {{-- @if ($input['bank'] == "SBI" || $input['bank'] == "HDFC") --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Gross Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="grossIncome3" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                {{-- @else
                                    <div class="form-group ">
                                        <label class="col-form-label">Net Salary </label>
                                        <div class="col-lg-9">
                                            <input type="text" name="netIncome3" class="form-control" placeholder="Gross Income">
                                        </div>
                                    </div>
                                @endif --}}

                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income Decleared In 3ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalItr3" class="form-control" placeholder="Rental Income">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Rental Income 2 Not shown In ITRs</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rentalNonItr3" class="form-control" placeholder="Rental Income 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Variable Overtime</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableOT3" class="form-control" placeholder="Variable Overtime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">FIXED INCENTIVES QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="fixedIncentivesQuat3" class="form-control" placeholder="FIXED INCENTIVES QUARTERLY">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS QUARTERLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesQuat3" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS QUARTERLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / BONUS HALF YEARLY</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesHalf3" class="form-control" placeholder="VARIABLE INCENTIVES / BONUS HALF YEARLY">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">VARIABLE INCENTIVES / Bonus Yearly</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="variableIncentivesYear3" class="form-control" placeholder="VARIABLE INCENTIVES / Bonus Yearly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">Income from Intrest / Dividend</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="interestDividend3" class="form-control" placeholder="Income from Intrest / Dividend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">Age of Applicant </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ageOfApplicant3" class="form-control" placeholder="Age of applicant" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group row">
                                    <label class="col-form-label">AGRICULTURAL INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="agriculturalIncome3" class="form-control" placeholder="AGRICULTURAL INCOME">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - NEW BUSINESS  AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic50New3" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="lic100Renew3" class="form-control" placeholder="LIC / BROKER COMISSION /NSC / KVP/IVP/POSTAL SAVINGS COMISSION - 100% OF RENEWAL BUSINESS AS PER ITRS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label">ANY OTHER INCOME</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="otherSources3" class="form-control" placeholder="Other Income">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Laibilities </legend>

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

                                @if ($input['cibilScore'] > 800 || $input['company'] != '' || $input['buyCompany'] != '')

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rate Of Intrest</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="rateOfIntrest" value="{{$input['interest']}}"  class="form-control" placeholder="Rate Of Intrest">
                                        </div>
                                    </div>

                                @else

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Rate Of Interest</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="rateOfIntrest" value="9.15"  class="form-control" placeholder="Rate Of Intrest">
                                        </div>
                                    </div>

                                @endif


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

