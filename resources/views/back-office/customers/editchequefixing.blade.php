@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> Check Fixing</a>
@endsection

@section('breadcrum')
    Check Fixing  ( {{ $customer->cust_name }} )
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="card card-table table-responsive shadow-0">
        <table class="table">
            <tbody>
                <tr>
                    <th>Customer name:</th>
                    <td>{{ $customer->cust_name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $customer->cust_email }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $customer->cust_phone }}</td>
                </tr>
                <tr>
                    <th>Bank Name:</th>
                    <td>{{ $customer->bank_name }}</td>
                </tr>
                <tr>
                    <th>Bank Branch:</th>
                    <td>{{ $customer->branch_name }}</td>
                </tr>
                <tr>
                    <th>Door No:</th>
                    <td>{{ $customer->buying_door_no }}</td>
                </tr>
                <tr>
                    <th>Project Name:</th>
                    <td>{{ $customer->project_name }}</td>
                </tr>
                <tr>
                    <th>Property Cost:</th>
                    <td>{{ $customer->property_cost }}</td>
                </tr>
                <tr>
                    <th>MMR Payable:</th>
                    <td>{{ $customer->mmr_payable }}</td>
                </tr>
                <tr>
                    <th>MMR Paid: </th>
                    <td>{{ $customer->mmr_paid }}</td>
                </tr>
                <tr>
                    <th>Loan Applied For:</th>
                    <td>{{ $customer->applied_loan_amount }}</td>
                </tr>
                <tr>
                    <th>Sanctioned Amount</th>
                    <td>{{ $customer->sanctioned_amount }}</td>
                </tr>
                <tr>
                    <th>Sanctioned Date</th>
                    <td>{{ $customer->sanctioned_date }}</td>
                </tr>
                <tr>
                    <th>Pending Amount</th>
                    <td>{{ $customer->pending_amount }}</td>
                </tr>
                <tr>
                    <th>Installment Number</th>
                    <td>{{ $customer->installment_num }}</td>
                </tr>

            </tbody>
        </table>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit customer ( {{ $customer->cust_name }} )
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.customers.updatechequefixing', $customer->cust_id) }}" method="post" id="edit_new_cust_form">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="cust_id" id="cust_id" value="{{ $customer->cust_id }}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cheque" name="cheque" value="{{ old('cheque') ?? 1 }}">
                                    <label class="form-check-label" for="cheque">
                                        Cheque
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="neft" name="neft" value="{{ old('neft') ?? 1 }}">
                                    <label class="form-check-label" for="neft">
                                        Neft
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div id="cheque_section">
                            <h4>Cheque Details of Disbursement</h4>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cheque_amount">Cheque Amount</label>
                                   <input type="number" class="form-control" name="cheque_amount" id="cheque_amount" value="{{ $customer->disburdsment_amount }}" max="{{ $customer->disburdsment_amount }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cheque_num ">Cheque Number</label>
                                   <input type="text" class="form-control" name="cheque_num" id="cheque_num">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Cheque Issuing date</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="cheque_date" id="cheque_date" >
									</div>
								</div>
                            </div>
                        </div>

                        <div id="neft_section">
                            <h4>Neft Details of Disbursement</h4>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="neft_amount">Neft Amount</label>
                                   <input type="number" class="form-control" name="neft_amount" id="neft_amount" value="{{ $customer->disburdsment_amount }}" max="{{ $customer->disburdsment_amount }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="neft_utr_no">Neft UTR Number</label>
                                   <input type="text" class="form-control" name="neft_utr_no" id="neft_utr_no">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Neft transfer date</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="neft_date" id="neft_date" >
									</div>
								</div>
                            </div>
                        </div>
                        <br/>
                        <button type="button" class="btn btn-primary" id="update_newcustomer">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('custom-script')
<script src="{{ asset('admin/global_assets/js/demo_pages/form_checkboxes_radios.js') }}"></script>


<script>
$(document).ready(function(){
    $("#cheque_section").hide();
    $("#neft_section").hide();
    $("#cheque").click(function(){
        if ($('#cheque').is(":checked")) {
            $("#cheque_section").show();
            $("#neft").attr('disabled', true);
        } else {
            $("#cheque_section").hide();
            $("#neft").attr('disabled', false);
        }
    });

    $("#neft").click(function(){
        if ($('#neft').is(":checked")) {
            $("#neft_section").show();
            $("#cheque").attr('disabled', true);
        } else {
            $("#neft_section").hide();
            $("#cheque").attr('disabled', false);
        }
    });
});

    $("#update_newcustomer").click(function(){
        if ($('#cheque').is(":checked")) {
            var cheque_amt  = $("#cheque_amount").val();
            var cheque_no   = $("#cheque_num").val();
            var cheque_date = $("#cheque_date").val();

            if (cheque_amt == "") {
                alert("Cheque Amount is required");
            }

            if (cheque_no == "") {
                alert("Cheque Number is required");
            }
            if (cheque_date == "") {
                alert("Cheque issue date is required");
            }

            if(cheque_amt != "" && cheque_no != "" && cheque_date != "" ) {
                $("#edit_new_cust_form").submit();
            }
        }

        if ($("#neft").is(":checked")) {
            var neft_amt        = $("#neft_amount").val();
            var neft_utr_no     = $("#neft_utr_no").val();
            var neft_date       = $("#neft_date").val();

            if(neft_amt == ""){
                alert("Neft Amount is required");
            }
            if(neft_utr_no == ""){
                alert("Neft UTR Number is required");
            }
            if(neft_date == ""){
                alert("Neft issue date is required");
            }

            if(neft_amt != "" && neft_utr_no != "" && neft_date != "" ){
                $("#edit_new_cust_form").submit();
            }
        }

    });

</script>

@endsection
