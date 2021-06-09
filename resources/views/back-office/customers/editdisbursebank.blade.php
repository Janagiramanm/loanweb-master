@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> Disburse Bank </a>
@endsection

@section('breadcrum')
    Disburse Bank ( {{ $customer->cust_name }} )
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
                    <form action="{{ route('back-office.customers.updatedisbursebank', $customer->cust_id) }}" method="post" id="edit_new_cust_form">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="cust_id" id="cust_id" value="{{ $customer->cust_id }}">
                        <div class="form-group col">
                            <h1>* List of documents shall be displayed here</h1>
                            <?php
                            // dd( $customer->docs_ids );
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
                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input"  type="checkbox" id="pendingDisDoc" name="pendingDisDoc" value="{{ old('pendingDisDoc') ?? 1 }}">
                                    <label class="form-check-label" for="pendingDisDoc">
                                        Assign New Appointment for collecting pending docs for Disbursement
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
                                        <option value="6">Pending Disbursement Doc Collection</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                        </div>


                        <span>If all documents are correct for disbursement proceed for check fixing.</span>
                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sentToBank" name="sentToBank" value="{{ old('sentToBank') ?? 1 }}">
                                    <label class="form-check-label" for="sentToBank">
                                        Cheque Fixing
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br/>
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
$("#pendingDisDoc").click(function(){
        if ($('#pendingDisDoc').is(":checked")) {
            $("#sentToBank").attr('disabled', true);
        } else {
            $("#sentToBank").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });
    $("#sentToBank").click(function(){
        if ($('#sentToBank').is(":checked")) {
            $("#pendingDisDoc").attr('disabled', true);
        } else {
            $("#pendingDisDoc").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });
    $(document).ready(function(){
        if ($('#pendingDisDoc').is(":checked")) {
            $("#appointment-section").show();
        } else {
            $("#appointment-section").hide();
        }
        $("#pendingDisDoc").click(function () {
            if ($(this).is(":checked")) {
                $("#appointment-section").show();
            } else {
                $("#appointment-section").hide();
            }
        });
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
                    var selectOptions = '';
                    $.each(data, function( key, value ) {
                        selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                    });
                    $("#appointment_agent").html(selectOptions);
                }
            });
        }
    });

</script>

@endsection
