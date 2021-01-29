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
<div class="">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside40">
                    <div class="contact-form mb60">
                        <div class="">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="mb60  section-title text-center  ">
                                    <!-- section title start-->
                                    <h1>Apply For loan</h1>
                                    <p>Reach out to us &amp; we will respond as soon as we can.</p>
                                </div>
                            </div>
                            <form  action="{{ route('banklist') }}" method="post" id="formSubmit">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <label class="control-label" for="exampleFormControlSelect1">Occupation<span style="color: red">*</span></label>
                                            <div class="">
                                                <select class="form-control input-md" name="occupation_id" required id="occupation_id">
                                                    <option>Select Occupation</option>
                                                    @foreach ($occupations as $occupation)
                                                        <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label class="control-label" for="exampleFormControlSelect1">Type of Loan <span style="color: red">*</span></label>
                                            <div class="">
                                                <select class="form-control input-md" name="type_of_loan" id="type_of_loan" required>
                                                    <option>Select Type Of Loans</option>
                                                    <option value="1">Home Loans</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label class="control-label" for="name">Applicant Name</label>
                                            <div class="">
                                                <input id="cust_name" name="cust_name" type="text" placeholder="Name As Per PAN card" class="form-control input-md" required>
                                                <span class="help-block"> </span> </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label class=" control-label" for="email">E-Mail</label>
                                            <div class="">
                                                <input id="cust_email" name="cust_email" type="email" placeholder="E-mail" class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-groupcol-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label class="control-label" for="cust_phone">Phone</label>
                                            <div class="">
                                                <input id="cust_phone" name="cust_phone" type="text"  placeholder="Phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label for="amount" class="control-label">Loan Amount Needed</label>
                                            <input type="number" id="loan_amount"  name="loan_amount" class="form-control" placeholder="Loan Amount needed" required>
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label for="amount" class="control-label">Address</label>
                                            <input type="text" id="cust_address" name="cust_address" class="form-control" placeholder="Enter address"  required>
                                        </div>
                                        <!-- Button -->

                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"  id="salaried">
                                            <label for="net_income" class="control-label">Net Monthly Income</label>
                                            <input type="number" id="net_income"  name="net_income" class="form-control" placeholder="Net Monthly Income">
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"  id="selfEmployeed">
                                            <label for="annual_profit" class="control-label">Annual Profit</label>
                                            <input type="number" id="annual_profit"  name="annual_profit" class="form-control" placeholder="Annual Profit" >
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" id="selfEmployeedProfessional">
                                            <label for="gross_income" class="control-label">Gross Annual Receipts(As Per ITR)</label>
                                            <input type="number" id="gross_income"  name="gross_income" class="form-control" placeholder="Gross Annual Receipts" >
                                        </div>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="">
                                            <button type="submit" id="get_quote" name="Submit" class="btn btn-primary btn-block">Get Quote</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                        </div>
                        <!-- /.section title start-->
                    </div>
                    <!-- SmartWizard html -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('client/js/loan-elgiblity.js')}}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#salaried").hide();
        $("#selfEmployeed").hide();
        $("#selfEmployeedProfessional").hide();
        $("#occupation_id").change(function(){
            var occu_id = $("#occupation_id").val();
            if(occu_id == 1){
                $("#salaried").show();
                $("#selfEmployeed").hide();
                $("#selfEmployeedProfessional").hide();
            }else if(occu_id == 2){
                $("#salaried").hide();
                $("#selfEmployeed").show();
                $("#selfEmployeedProfessional").hide();
            }else{
                $("#salaried").hide();
                $("#selfEmployeed").hide();
                $("#selfEmployeedProfessional").show();
            }
        });
    });

    // $("#get_quote").click(function(){
    //     $("#formSubmit").submit();
    // });


</script>

@endsection
