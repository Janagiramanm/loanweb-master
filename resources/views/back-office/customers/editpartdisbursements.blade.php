@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/partdisbursements') }}" class="breadcrumb-item"> Edit PartDisbursement </a>
@endsection

@section('breadcrum')
    Edit PartDisbursement ( {{ $customer->cust_name }} )
@endsection

@section('main-content')
<div class="container mt-2">
    <div class="card card-table table-responsive shadow-0">
        <h2 class="card-header">
            Edit PartDisbursement customer ( {{ $customer->cust_name }} )
        </h2>
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
                    <th>Builder Name:</th>
                    <td>{{ $project->builder_name }}</td>
                </tr>
                <tr>
                    <th>Project Name:</th>
                    <td>{{ $project->project_name }}</td>
                </tr>
                <tr>
                    <th>Door No:</th>
                    <td>{{ $customer->buying_door_no }}</td>
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

        <table class="table bg-dark" >
            <thead>
                <tr>
                    <th>Customer name</th>
                    <th>Disbursement Amount</th>
                    <th>Applied Date</th>
                    <th>Installment No</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disbursements as $disbursement)
                    <tr>
                        <td>{{ $disbursement->cust_name}}</td>
                        <td>{{ $disbursement->disbursement_amount }}</td>
                        <td>{{ $disbursement->date_of_disbursement }}</td>
                        <td>{{ $disbursement->installment_num }}</td>
                    </tr>
                @endforeach
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
                    <form action="{{ route('back-office.customers.updatepartdisbursements', $customer->cust_id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="cust_id" id="cust_id" value="{{ $customer->cust_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="disbursement_amount">Demand Amount </label>
                                <input type="number" class="form-control @error('disbursement_amount') is-invalid @enderror" id="disbursement_amount" name="disbursement_amount" required value="{{ old('disbursement_amount') }}" autocomplete="no-fill" >
                                <label for="disbursement_amount_txt" id="disbursement_amount_txt"></label>
                            </div>
                            <div class="form-group col-md-6">
                                <p>Date Of Demand</p>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control pickadate" placeholder="Select Date" name="disbursement_date" id="disbursement_date" >
                                </div>
                            </div>
                        </div>

                        <div id="appointment-section">
                            <h4>Schedule an appointment</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="appointment_date" id="datepicker" >
									</div>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_time">Time</label>
                                    <select name="appointment_time" id="appointment_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                    @error('appointment_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type_of_appointment">Appointment Type</label>
                                    <select name="type_of_appointment" id="type_of_appointment" class="form-control">
                                        <option value="7">Submitting Demand letter to bank</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('custom-script')
<script>
    $("#appointment_time").change(function(){
        var date = $("#datepicker").val();
        var time = $("#appointment_time").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data.length);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent").html(selectOptions);
                    } else {
                        
                        var selectOptions = '<option value=""> Select Agent</option>';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent").html(selectOptions);
                    }

                }
            });
        }
    });

    $("#update_newcustomer").click(function(){

        if ($('#interested').is(":checked")) {
            var date = $("#datepicker").val();
            var time = $("#appointment_time").val();
            var appoint_type = $("#type_of_appointment").val();
            var agent = $("#appointment_agent").val();

            if(date == ""){
                alert("Select Date");
            }
            if(time == ""){
                alert("Select Time");
            }
            if(appoint_type == ""){
                alert("Select Appointment Type");
            }
            if (agent == "") {
                alert("Select Agent to assign");
            }

            if(date != "" && time != "" && appoint_type != "" && agent != ""){
                $("#edit_new_cust_form").submit();
            }
        } else {
            $("#edit_new_cust_form").submit();
        }

    })
    $("#disbursement_amount").on('keyup',function(){
         var textVal = convertNumberToWords($(this).val());
         $("#disbursement_amount_txt").text(textVal);
        
     })
    $('input[type="text"]').prop('autocomplete',"no-fill");
</script>
@endsection
