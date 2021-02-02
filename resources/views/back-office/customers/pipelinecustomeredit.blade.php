@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> Pipeline Customers </a>
@endsection


@section('breadcrum')
    Edit customer ( {{ $customer->cust_name }} )
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="card card-table table-responsive shadow-0">
        <table class="table">
            <thead>
                <tr>
                    <th>Customer name</th>
                    <th>Agent Name</th>
                    <th>Appointment Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->customer_name }} </td>
                        <td>{{ $appointment->agent_name }}</td>
                        <td>{{ $appointment->appointment_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->time_slot }}</td>
                        <td>
                        <button type="button" class="btn btn-primary edit-app-id" data-toggle="modal" id="{{ $appointment->id }}" data-target="#appointmentModal">
                           Edit Appointment
                        </button>
                        <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-primary w-100">Re-Appointment</a> -->
                    </td>
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
                    <form action="{{ route('back-office.customers.updatepipelinecustomer', $customer->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Customer Name</label>
                                <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="cust_name" name="cust_name" required value="{{ $customer->cust_name }}">
                                @error('cust_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_phone">Phone Number</label>
                                <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="cust_phone" required value="{{ $customer->cust_phone }}">
                                @error('cust_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="cust_email">E-Mail</label>
                                <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="cust_email" name="cust_email" required value="{{ $customer->cust_email }}">
                                @error('cust_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cust_email">Project Name</label>
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ $customer->project_name }}">
                                @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_email">Builder Name</label>
                                <input type="text" class="form-control @error('builder_name') is-invalid @enderror" id="builder_name" name="builder_name" required value="{{  $customer->builder_name }}">
                                @error('builder_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_email">Buying Flat / Door no</label>
                                <input type="text" class="form-control @error('buying_door_no') is-invalid @enderror" id="buying_door_no" name="buying_door_no" required value="{{ $customer->buying_door_no }}">
                                @error('buying_door_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="property_cost">Total Cost(Property Cost)</label>
                                <input type="text" class="form-control"  name="property_cost" id="property_cost" required="required" value="{{ old('property_cost') ?? $customer->property_cost }} ">
                                @error('property_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_id">Bank</label>
                                <select name="bank_id" id="bank_id" class="form-control" required>
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        @if( $customer->bank_id  == $bank->id )
                                            <option value="{{ $bank->id }}" selected> {{ $bank->bank_name }} </option>
                                        @else
                                            <option value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mmr_payable">MMR Payable</label>
                                <input type="text" class="form-control" id="mmr_payable" name="mmr_payable"  value="{{ old('mmr_payable') ?? $customer->mmr_payable }}">
                                @error('mmr_payable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_pincode">MMR Paid</label>
                                <input type="text" class="form-control" id="mmr_paid" name="mmr_paid"  value="{{ old('mmr_paid') ?? $customer->mmr_paid }}">
                                @error('mmr_paid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="occupation_id">Customer Occupation</label>
                                <select name="occupation_id" id="occupation_id" class="form-control" required>
                                    <option value="">Select Occupation</option>
                                    @foreach ($occupations as $occupation)
                                        @if( $customer->occupation_id  == $occupation->id )
                                            <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                        @else
                                            <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="applied_loan_amount">Loan Amount Required</label>
                                <input type="text" class="form-control" id="applied_loan_amount" name="applied_loan_amount"  value="{{ old('applied_loan_amount') ?? $customer->applied_loan_amount }}">
                                @error('mmr_paid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cust_address">Customer Address</label>
                            <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="cust_address" required cols="30" rows="3">{{ old('cust_address') ?? $customer->cust_address }}</textarea>
                            @error('cust_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">City</label>
                                <input type="text" class="form-control" id="cust_city" name="cust_city" required value="{{ old('cust_city') ?? $customer->cust_city }}">
                                @error('cust_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_pincode">Pincode</label>
                                <input type="text" class="form-control" id="cust_pincode" name="cust_pincode" required value="{{ old('cust_pincode') ?? $customer->cust_pincode }}">
                                @error('cust_pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <h1>* List of documents shall be displayed here</h1>
                                <?php
                                    if(isset($customer->docs_ids)){
                                        $presentdocs = explode(",",$customer->docs_ids);
                                    }else{
                                        $presentdocs = array();
                                    }
                                ?>
                                <ul>
                                    @foreach ($documents as $doc)
                                        @if (in_array($doc->id, $presentdocs))
                                            <li><del>{{ $doc->type_of_doc }} -> {{ $doc->doc_name }}</del></li>
                                        @else
                                            <li>{{ $doc->type_of_doc }} -> {{ $doc->doc_name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                    <label class="form-check-label" for="interested">
                                        Assign New Appointment for collecting pending docs
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
                                        <option value="2">Pending Doc collection for Backoffice</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                        </div>


                        <span>If documents collection completed, then click on Sent to login process.</span>
                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sentToLoin" name="sentToLoin" value="{{ old('sentToLoin') ?? 1 }}">
                                    <label class="form-check-label" for="sentToLoin">
                                        Sent to loginProcess
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="sent_to_login">
                            <h4>Schedule an appointment To Drop the Application to bank</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="sent_to_bank_date" id="sent_to_bank_date" >
									</div>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="sent_to_bank_time">Time</label>
                                    <select name="sent_to_bank_time" id="sent_to_bank_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bank_appointment">Appointment Type</label>
                                    <select name="bank_appointment" id="bank_appointment" class="form-control">
                                        <option value="3">Bank visit to drop Application</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bank_appointment_agent">Agent Name</label>
                                    <select name="bank_appointment_agent" id="bank_appointment_agent" class="form-control"></select>
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
</div>
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="appointmentModalLabel">Change Appointment Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div class="form-group col-md-6">
                            <p>Date Of Appointment </p>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="appointment_date" id="datepicker_popup" >
                            </div>
                </div>
                <div class="form-group col-md-6">
                                    <label for="type_of_appointment">Appointment Type</label>
                                    <select name="type_of_appointment" id="type_of_appointment" class="form-control">
                                        <option value="">Select Appointment Type</option>
                                        @foreach ($typeofappointments as $type)
                                            <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
               
                <div class="form-group col-md-6">
                            <label for="appointment_time">Time</label>
                            <select name="appointment_time" id="appointment_time_edit" class="form-control">
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
                <div class="form-group col-md-6">
                            <p>Select Agent</p>
                            <div class="input-group">
                                    <select name="bank_appointment_agent" id="appointment_agent_edit" class="form-control">
                                       <option>Select Agent</option>
                                    </select>
                            </div>
                </div>
          
      </div>
      <div class="success-msg"></div>
        <div class="error-msg"></div>
      <div class="modal-footer">
       
        <input type="hidden" name="appointment_id" id="appointment_id" />
        <button type="button" class="btn btn-primary" id="change-appointment">Change Appointment</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

</div>


@endsection

@section('custom-script')


<script>
    $("#interested").click(function(){
        if ($('#interested').is(":checked")) {
            $("#sentToLoin").attr('disabled', true);
        } else {
            $("#sentToLoin").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });
    $("#sentToLoin").click(function(){
        if ($('#sentToLoin').is(":checked")) {
            $("#interested").attr('disabled', true);
        } else {
            $("#interested").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });



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

        if ($('#sentToLoin').is(":checked")) {
            $("#sent_to_login").show();
        } else {
            $("#sent_to_login").hide();
        }
        $("#sentToLoin").click(function () {
            if ($(this).is(":checked")) {
                $("#sent_to_login").show();
            } else {
                $("#sent_to_login").hide();
            }
        });
        // $("#datepicker").datepicker();
    });

    $(".edit-app-id").click(function(){
          $("#appointment_id").val($(this).attr('id'));
    });

    $("#change-appointment").click(function(){
        var date = $("#datepicker_popup").val();
        var time = $("#appointment_time_edit").val();
        var agent = $("#appointment_agent_edit").val();
        var appointmentId = $("#appointment_id").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "/back-office/change-agent-appointment",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time, agentid:agent, appointmentId:appointmentId}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    if(data.status == 1){
                        $(".success-msg").text(data.message);
                    }else{
                        $(".error-msg").text(data.message);
                    }
                    setTimeout(() => {
                        $(".close").click();
                        location.reload(true);
                    }, 1500);
                  
                    
                }
            })
        }

      
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
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent").html(selectOptions);
                    }
                }
            });
        }
    });

    $("#appointment_time_edit").change(function(){
        var date = $("#datepicker_popup").val();
        var time = $("#appointment_time_edit").val();
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
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent_edit").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent_edit").html(selectOptions);
                    }
                }
            });
        }
    });

    $("#sent_to_bank_time").change(function(){
        var date = $("#sent_to_bank_date").val();
        var time = $("#sent_to_bank_time").val();
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
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#bank_appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#bank_appointment_agent").html(selectOptions);
                    }
                }
            });
        }
    });
</script>
<style>
.success-msg {
    padding: 0 30px;
    color: green;
    font-size: 16px;
}
.error-msg {
    padding: 0 30px;
    color: red;
    font-size: 16px;
}
</style>

@endsection
