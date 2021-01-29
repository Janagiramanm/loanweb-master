@extends('layouts.clientapp')
@section('all-page')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Balance Transfer</li>
                    </ol>
                </div>
            </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30">
                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                            <h1 class="page-title">Balance Transfer</h1>
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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">     <div class="wrapper-content bg-white pinside40">
                <div class="loan-eligibility-block">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <h2 class="mb20">Current Loan</h2>
                             <div class="row">
                                <form action="#">

                                    <div class="form-group">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label for="input" class="control-label">Loan Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">₹</span>
                                            </div>
                                                <input type="number" class="form-control input-sm" id="loanamount" name="loanamount" placeholder="Enter Loan Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label for="input" class="control-label">Loan Tenure</label>
                                            <input type="number" class="form-control" id="tenure1" name="tenure1" placeholder="(in years)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label for="input" class="control-label">Rate of Interest</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                                <input type="number" class="form-control" id="int_rate1" value="9.5" name="int_rate1">
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="mb20">New Loan</h2>

                                    <div class="form-group">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label for="input" class="control-label">Proposed Loan Tenure</label>
                                            <input type="number" class="form-control" id="tenure2" name="tenure2" placeholder="(in years)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label for="input" class="control-label">Proposed Rate of Interest</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                                <input type="number" class="form-control" id="int_rate2" value="9.5" name="int_rate2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button type="button" class="btn btn-default" id="submit">Submit</button>
                                            <button type="reset" class="btn btn-primary">Reset All</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <h2 class="mb40">How much savings you can make?</h2>
                            <div class="loan-eligibility-info">
                                <div class="form-group" id="output"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                var loanamount = $("#loanamount").val();
                var tenure1 = $("#tenure1").val();
                var tenure2 = $("#tenure2").val();
                var int_rate2 = $("#int_rate2").val();
                var int_rate1 = $("#int_rate1").val();

                if(loanamount != "" && tenure1 != "" && tenure2 != "" && int_rate2 != "" && int_rate1 != ""){
                    var emi1 = loanamount * ((int_rate1/12)/100) * ((Math.pow((1 + ((int_rate1/12)/100)), (12 * tenure1)))/((Math.pow((1 + ((int_rate1/12)/100)), (12 * tenure1)))-1));
                    var emi2 = loanamount * ((int_rate2/12)/100) * ((Math.pow((1 + ((int_rate2/12)/100)), (12 * tenure2)))/((Math.pow((1 + ((int_rate2/12)/100)), (12 * tenure2)))-1));
                }
                var savingEmi = Math.round(emi1 - emi2);
                var overallSaving = savingEmi * (tenure2*12);
                $("#output").html ('<p>Savings in EMI: <span style="color: red; font-size: 35px"> ₹ '+savingEmi + ' </span></p><br/><p>Savings in EMI of entire loan for entire tenure: <br> <span style="color: red; font-size: 35px"> ₹ '+overallSaving + ' </span></p>');
            });
        })

    </script>
@endsection
