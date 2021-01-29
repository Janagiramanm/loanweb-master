@extends('layouts.back-office')

@section('breadcrum')
    Profession Self Employee Details
@stop

@section('main-content')
<div class="content">
    <form action="{{ url('back-office/eligibilities/selfemployeeProfessional') }}" method="post">
        @csrf
        @if ($input['noOfApplicants'] == 1)
            <div class="content">
                <!-- Input formatter -->
                <input type="hidden" name="applicant1" id="" value="1">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">APPLICANT 1</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Product</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select" name="product">
                                            <option value="Home Loan">Home Loan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Profession</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="profession1">
                                            <option value="D">Doctors -  MBBS , MD ,BDS ,MS (D)</option>
                                            <option value="P">Ohters - BAMS / BHMS /CA/CS/Architect / Engineer (P)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Total Experience (Min Exp. 3 years)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience1" class="form-control" placeholder="Total Experience (Min Exp. 3 years)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Latest Financial Year Gross Receipts</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="latestFinancial1" class="form-control" placeholder="Latest Financial Year Gross Receipts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Previous Financial Year Gross Receipts </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="previousFinancial1" class="form-control" placeholder="Previous Financial Year Gross Receipts ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">POS of Existing Loans</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="posOfExistingLoan1" class="form-control" placeholder="POS of Existing Loans ">
                                    </div>
                                </div>
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
                            <div class="col-md-12">
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Product</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select" name="product">
                                            <option value="Home Loan">Home Loan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Profession</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="profession1">
                                            <option value="D">Doctors -  MBBS , MD ,BDS ,MS (D)</option>
                                            <option value="P">Ohters - BAMS / BHMS /CA/CS/Architect / Engineer (P)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Total Experience (Min Exp. 3 years)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience1" class="form-control" placeholder="Total Experience (Min Exp. 3 years)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Latest Financial Year Gross Receipts</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="latestFinancial1" class="form-control" placeholder="Latest Financial Year Gross Receipts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Previous Financial Year Gross Receipts </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="previousFinancial1" class="form-control" placeholder="Previous Financial Year Gross Receipts ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">POS of Existing Loans</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="posOfExistingLoan1" class="form-control" placeholder="POS of Existing Loans ">
                                    </div>
                                </div>
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
                            <div class="col-md-12">
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Profession</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="profession2">
                                            <option value="D">Doctors -  MBBS , MD ,BDS ,MS (D)</option>
                                            <option value="P">Ohters - BAMS / BHMS /CA/CS/Architect / Engineer (P)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Total Experience (Min Exp. 3 years)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience2" class="form-control" placeholder="Total Experience (Min Exp. 3 years)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Latest Financial Year Gross Receipts</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="latestFinancial2" class="form-control" placeholder="Latest Financial Year Gross Receipts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Previous Financial Year Gross Receipts </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="previousFinancial2" class="form-control" placeholder="Previous Financial Year Gross Receipts ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">POS of Existing Loans</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="posOfExistingLoan2" class="form-control" placeholder="POS of Existing Loans ">
                                    </div>
                                </div>
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
                            <div class="col-md-12">
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Product</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select" name="product">
                                            <option value="Home Loan">Home Loan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Profession</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="profession1">
                                            <option value="D">Doctors -  MBBS , MD ,BDS ,MS (D)</option>
                                            <option value="P">Ohters - BAMS / BHMS /CA/CS/Architect / Engineer (P)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Total Experience (Min Exp. 3 years)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience1" class="form-control" placeholder="Total Experience (Min Exp. 3 years)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Latest Financial Year Gross Receipts</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="latestFinancial1" class="form-control" placeholder="Latest Financial Year Gross Receipts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Previous Financial Year Gross Receipts </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="previousFinancial1" class="form-control" placeholder="Previous Financial Year Gross Receipts ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">POS of Existing Loans</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="posOfExistingLoan1" class="form-control" placeholder="POS of Existing Loans ">
                                    </div>
                                </div>
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
                            <div class="col-md-12">
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Profession</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="profession2">
                                            <option value="D">Doctors -  MBBS , MD ,BDS ,MS (D)</option>
                                            <option value="P">Ohters - BAMS / BHMS /CA/CS/Architect / Engineer (P)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Total Experience (Min Exp. 3 years)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience2" class="form-control" placeholder="Total Experience (Min Exp. 3 years)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Latest Financial Year Gross Receipts</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="latestFinancial2" class="form-control" placeholder="Latest Financial Year Gross Receipts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Previous Financial Year Gross Receipts </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="previousFinancial2" class="form-control" placeholder="Previous Financial Year Gross Receipts ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">POS of Existing Loans</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="posOfExistingLoan2" class="form-control" placeholder="POS of Existing Loans ">
                                    </div>
                                </div>
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
                            <div class="col-md-12">
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Income details</legend>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Select Profession</label>
                                    <div class="col-lg-9">
                                        <select class="form-control form-control-select2" name="profession3">
                                            <option value="D">Doctors -  MBBS , MD ,BDS ,MS (D)</option>
                                            <option value="P">Ohters - BAMS / BHMS /CA/CS/Architect / Engineer (P)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Total Experience (Min Exp. 3 years)</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="experience3" class="form-control" placeholder="Total Experience (Min Exp. 3 years)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Latest Financial Year Gross Receipts</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="latestFinancial3" class="form-control" placeholder="Latest Financial Year Gross Receipts">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Previous Financial Year Gross Receipts </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="previousFinancial3" class="form-control" placeholder="Previous Financial Year Gross Receipts ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">POS of Existing Loans</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="posOfExistingLoan3" class="form-control" placeholder="POS of Existing Loans ">
                                    </div>
                                </div>
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
                                    <label class="col-lg-3 col-form-label">Rate Of Intrest</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="rateOfIntrest" value="8.00"  class="form-control" placeholder="Rate Of Intrest">
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
</div>
@endsection

