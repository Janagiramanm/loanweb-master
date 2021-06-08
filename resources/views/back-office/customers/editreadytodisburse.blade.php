@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/readytodisburse') }}" class="breadcrumb-item"> Ready To Disbursement </a>
@endsection

@section('breadcrum')
    Edit customer ( {{ $customer->cust_name }} )
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
                    <form action="{{ route('back-office.customers.updatereadytodisburse', $customer->cust_id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="cust_id" id="cust_id" value="{{ $customer->cust_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="disbursement_amount">Demand Amount </label>
                                <input type="text" class="form-control @error('disbursement_amount') is-invalid @enderror" id="disbursement_amount" name="disbursement_amount" required value="{{ old('disbursement_amount') }}">
                                <label for="disbursement_amount_txt" id="disbursement_amount_txt"> </label>
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

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                    <label class="form-check-label" for="interested">
                                        Interested for Disbursement
                                    </label>
                                </div>
                                @error('cust_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                        <option value="5">Disbursement Doc Collection</option>
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

    $(document).ready(function(){
        if ($('#interested').is(":checked")) {
            $("#appointment-section").show();
        } else {
            $("#appointment-section").hide();
        }
        $("#interested").click(function () {
            if ($(this).is(":checked")) {
                $("#appointment-section").show();
            } else {
                $("#appointment-section").hide();
            }
        });

        $("#disbursement_amount").on('keyup',function(){
                var textVal = convertNumberToWords($(this).val());
                $("#disbursement_amount_txt").text(textVal);
        }) 
        // $("#datepicker").datepicker();
    });



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

</script>

@endsection
