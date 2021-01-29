@extends('layouts.clientapp')

@section('all-page')
<div class="page-header">
    <div class="container">
        <div class="row">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Apply For Loan</li>
                    </ol>
                </div>
            </div>
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30">
                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                            <h1 class="page-title">Apply For Loan</h1>
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
                        <div class=" ">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="mb60  section-title text-center  ">
                                    <!-- section title start-->
                                    <h1>Apply For loan</h1>
                                    <p>Reach out to us &amp; we will respond as soon as we can.</p>
                                </div>
                            </div>
                            <form  action="{{ route('loan.submit') }}" method="post" id="formSubmit">
                                @csrf
                                <fieldset>
                                    <!-- Text input-->
                                    <div class="row">
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <label class="control-label" for="exampleFormControlSelect1">Type of Loan <span style="color: red">*</span></label>
                                            <div class="">
                                                <select class="form-control input-md" name="type_of_loan" required>
                                                    <option>Select Type Of Loans</option>
                                                    <option value="1">Home Loans</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <label class="control-label" for="name">Applicant Name</label>
                                        <div class="">
                                            <input id="name" name="cust_name" type="text" placeholder="Name" class="form-control input-md" required >
                                            <span class="help-block"> </span> </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <label class=" control-label" for="email">E-Mail</label>
                                        <div class="">
                                            <input id="email" name="cust_email" type="email" placeholder="E-mail" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-groupcol-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <label class="control-label" for="cust_phone">Phone</label>
                                        <div class="">
                                            <input id="phone" name="cust_phone" type="text"  placeholder="Phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <label for="amount" class="control-label">Loan Amount</label>
                                        <input type="number" id="loan_amount"  name="loan_amount" class="form-control" placeholder="Loan Amount" required>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <label for="amount" class="control-label">Address</label>
                                        <input type="text" id="cust_address" name="cust_address" class="form-control" placeholder="Enter address" required>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <label for="amount" class="control-label">City</label>
                                        <input type="text" id="cust_city" name="cust_city"  class="form-control" placeholder="City" required>
                                    </div>
                                    <!-- Button -->
                                </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="">
                                                <button id="Submit" name="Submit" class="btn btn-primary btn-block">Submit</button>
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
    <script type="text/javascript" src="{{ asset('client/js/jquery.smartWizard.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled');
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled');
                } else {
                    $("#prev-btn").removeClass('disabled');
                    $("#next-btn").removeClass('disabled');
                }
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'both', // both bottom
                    toolbarExtraButtons: []
                }
            });

            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });

            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });

            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });


            // Demo Button Events
            $("#got_to_step").on("change", function() {
                // Go to step
                var step_index = $(this).val() - 1;
                $('#smartwizard').smartWizard("goToStep", step_index);
                return true;
            });

            $("#is_justified").on("click", function() {
                // Change Justify
                var options = {
                  justified: $(this).prop("checked")
                };

                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });

            $("#animation").on("change", function() {
                // Change theme
                var options = {
                  transition: {
                      animation: $(this).val()
                  },
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });

            $("#theme_selector").on("change", function() {
                // Change theme
                var options = {
                  theme: $(this).val()
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });

        });
    </script>
@endsection
