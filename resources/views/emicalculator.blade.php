@extends('layouts.clientapp')

@section('all-page')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Loan Calculator</li>
                    </ol>
                </div>
            </div>
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30">
                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                            <h1 class="page-title">Loan Calculator</h1>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-3 col-sm-12 col-12">
                            <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="btn-action"> <a href="#" class="btn btn-default">How To Apply</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sub-nav" id="sub-nav">
                    <ul class="nav nav-justified">
                        <li class="nav-item">
                            <a href="contact-us.html" class="nav-link">Give me call back</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Emi Caculator</a>
                        </li>
                    </ul>
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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bg-light pinside40 outline">
                                        <span>Loan Amount is </span>
                                        <input type="text" class="pull-right" id="la_value" value="100000" max="10000000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        <input name="slider_amount_value" type="range" min="100000" max="10000000" value="100000" class="slider" id="la" style="margin-top: 20px">

                                        <hr>

                                        <span>Tenure [Years]</span>
                                        <input type="text" class="pull-right" id="nm_value" value="20" max="30" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        <input name="slider_tenure_value" type="range" min="1" max="30" value="20" class="slider" id="nm" style="margin-top: 20px">

                                        <hr>

                                        <span>Rate of Interest [ROI] is  </span>
                                        <input type="text" class="pull-right" id="roi_value" value="8.00" max="16.00" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        <input name="slider_roi_value" type="range" min="6.00" max="16.00" value="8.00" class="slider" id="roi" style="margin-top: 20px">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="bg-light pinside30 outline">
                                                Monthly EMI
                                                <h2 id='emi' class="pull-right"></h2>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="bg-light pinside30 outline">
                                                Total Interest
                                                <h2 id='tbl_int' class="pull-right"></h2>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="bg-light pinside30 outline"> Payable Amount
                                                <h2 id='tbl_full' class="pull-right"></h2></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="bg-light pinside30 outline">
                                                Interest Percentage
                                                <h2 id='tbl_int_pge' class="pull-right"></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div id="loantable" class='table table-striped table-bordered loantable table-responsive'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- /.content end -->
@endsection

@section('scripts')
    {{-- <script src="{{ asset('client/js/calculator.js') }}"  type="text/javascript"></script> --}}
    <script>

$(document).ready(function(){
        $("#la_value").keyup(function(){
            var val = $("#la_value").val();
            if(val > 10000000){
                $('input[name="slider_amount_value"]').val(10000000);
                $("#la_value").val(10000000)
            }else {
                $('input[name="slider_amount_value"]').val(val);
            }
            calculateEMI();
        });
        $("#la").change(function(){
            var val = $('#la').val();
            $("#la_value").val(val);
            calculateEMI();
        });

        $("#nm_value").keyup(function(){
            var val = $("#nm_value").val();
            if(val > 30){
                $('input[name="slider_tenure_value"]').val(30);
                $("#nm_value").val(30)
            }else {
                $('input[name="slider_tenure_value"]').val(val);
            }
            calculateEMI();
        });
        $("#nm").change(function(){
            var val = $('#nm').val();
            $("#nm_value").val(val);
            calculateEMI();
        });

        $("#roi_value").keyup(function(){
            var val = $("#roi_value").val();
            if(val > 30){
                $('input[name="slider_roi_value"]').val(30);
                $("#roi_value").val(30)
            }else {
                $('input[name="slider_roi_value"]').val(val);
            }
            calculateEMI();
        });
        $("#roi").change(function(){
            var val = $('#roi').val();
            $("#roi_value").val(val);
            calculateEMI();
        });





        function calculateEMI(){
            var loanAmount = $("#la_value").val();
            var numberOfMonths = ($("#nm_value").val()) * 12;
            var rateOfInterest = $("#roi_value").val();
            var monthlyInterestRatio = (rateOfInterest/100)/12;

            var top = Math.pow((1+monthlyInterestRatio),numberOfMonths);
            var bottom = top -1;
            var sp = top / bottom;
            var emi = ((loanAmount * monthlyInterestRatio) * sp);
            var full = numberOfMonths * emi;
            var interest = full - loanAmount;
            var int_pge =  (interest / full) * 100;
            $("#tbl_int_pge").html(int_pge.toFixed(2)+" %");
            $("#tbl_loan_pge").html((100-int_pge.toFixed(2))+" %");

            var emi_str = emi.toFixed(2).toString().replace(/,/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
            var loanAmount_str = loanAmount.toString().replace(/,/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
            var full_str = full.toFixed(2).toString().replace(/,/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");
            var int_str = interest.toFixed(2).toString().replace(/,/g, "").replace(/\B(?=(?:(\d\d)+(\d)(?!\d))+(?!\d))/g, ",");

            $("#emi").html(emi_str);
            $("#tbl_emi").html(emi_str);
            $("#tbl_la").html(loanAmount_str);
            $("#tbl_nm").html(numberOfMonths);
            $("#tbl_roi").html(rateOfInterest);
            $("#tbl_full").html(full_str);
            $("#tbl_int").html(int_str);
            var detailDesc = "<thead><tr class='table-head'><th>Payment No.</th><th>Begining Balance</th><th>EMI</th><th>Principal</th><th>Interest</th><th>Ending Balance</th></thead><tbody>";
            var bb=parseInt(loanAmount);
            var int_dd =0;var pre_dd=0;var end_dd=0;
            for (var j=1;j<=numberOfMonths;j++){
                int_dd = bb * ((rateOfInterest/100)/12);
                pre_dd = emi.toFixed(2) - int_dd.toFixed(2);
                end_dd = bb - pre_dd.toFixed(2);
                if(end_dd < 0){
                    end_dd = 0.00;
                }
                detailDesc += "<tr><td>"+j+"</td><td>"+bb.toFixed(2)+"</td><td>"+emi.toFixed(2)+"</td><td>"+pre_dd.toFixed(2)+"</td><td>"+int_dd.toFixed(2)+"</td><td>"+end_dd.toFixed(2)+"</td></tr>";
                bb = bb - pre_dd.toFixed(2);
            }
                detailDesc += "</tbody>";
                $("#loantable").html(detailDesc);

        }
        calculateEMI();

});
</script>
@endsection
