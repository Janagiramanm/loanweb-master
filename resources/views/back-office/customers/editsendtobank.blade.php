@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> Pipeline Customers </a>
@endsection


@section('breadcrum')
    Edit Send to Bank customer ( {{ $customer->cust_name }} )
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
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->customer_name}}</td>
                        <td>{{ $appointment->agent_name }}</td>
                        <td>{{ $appointment->appointment_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->time_slot }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit Send to Bank customer ( {{ $customer->cust_name }} )
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.customers.updatesendtobank', $customer->id) }}" method="post">
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
                                <label for="cust_email">Builder Name</label>
                                <select class="form-control" name="builder_name" id="builder_name" required>
                                        <option value="">Select Builder</option>
                                        @foreach($builders as $builder)
                                            <option @if( $customer->builder_name == $builder->id) selected @endif  value="{{ $builder->id }}"> {{ $builder->builder_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('builder_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="cust_email">Project Name</label>
                                <select class="form-control" name="project_name" id="project_name" required>
                                <option value="">Select Project</option>
                                @if($projects)
                                    @foreach($projects as $project)
                                       <option @if( $customer->project_name == $project->id) selected @endif value="{{ $project->id }} "> {{ $project->project_type_name }} </option>
                                    @endforeach
                                @endif
                                </select>
                                <!-- <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ $customer->project_name }}"> -->
                                @error('project_name')
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
                            <!-- <div class="form-group col-md-6">
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
                            </div> -->
                            
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
                                <div class="form-group col-md-6">
                                <!-- @foreach ($branches as $branch)
                                        @php
                                          echo '<pre>';
                                          print_r($branch);
                                    @endphp
                                    @endforeach -->
                                    <label for="branch_name">Branch</label>
                                    <select name="branch_name" id="branch_name" class="form-control" required>
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $branch)
                                        @php
                                          echo '<pre>';
                                          print_r($branch);
                                    @endphp
                                        <option @if($customer->bank_branch == $branch->id) selected @endif value="{{ $branch->id }}"> {{ $branch->branch_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                           
                        

                        
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
                      
                        <div class="form-group col-md-6">
                            <label for="cust_address">Customer Address</label>
                            <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="cust_address" required cols="30" rows="3">{{ old('cust_address') ?? $customer->cust_address }}</textarea>
                            @error('cust_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       
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
                            <div class="form-group col-md-6">
                                <label for="file_number">File Number</label>
                                <input type="text" class="form-control" id="file_number" name="file_number" required value="{{ old('cust_pincode') ?? $customer->cust_pincode }}">
                                @error('file_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <h1>* List of documents shall be displayed here</h1>
                                <ul>
                                    @foreach ($extradocs as $doc)
                                        <li>{{ $doc->doc_name }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"> Add New Doc <i class="icon-play3 ml-2"></i></button>
                                {{-- <button type="button" class="btn btn-primary"><span style="font-size: 17px ">+</span></button> --}}
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
                                        <option value="4">Pending Doc collection for Bank</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                        </div>


                        <span>If documents collection completed, then click on Successfully send to Bank.</span>
                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sentToBank" name="sentToBank" value="{{ old('sentToBank') ?? 1 }}">
                                    <label class="form-check-label" for="sentToBank">
                                        Successfully send to Bank
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Documnet</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                                <label>First name</label>
                                <input type="text" id="adddocment" name="adddocment" placeholder="New Doc required for Bank" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="save_btn" class="btn bg-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->


@endsection

@section('custom-script')


<script>
    $("#interested").click(function(){
        if ($('#interested').is(":checked")) {
            $("#sentToBank").attr('disabled', true);
        } else {
            $("#sentToBank").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });
    $("#sentToBank").click(function(){
        if ($('#sentToBank').is(":checked")) {
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
                    var selectOptions = '<option value=""> Select Agent</option>';
                    $.each(data, function( key, value ) {
                        selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                    });
                    $("#appointment_agent").html(selectOptions);
                }
            });
        }
    });


    $("#save_btn").click(function(){
        var doc = $("#adddocment").val();
        var cusId = '{{ $customer->id }}';
        if(doc == ""){
            alert("Please enter the new doc or you can close the modal and proceed");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/addnewbankdoc'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({docName:doc, cust_id: cusId}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    location.reload();
                }
            });
        }
    })

    $("#builder_name").change(function(){
        var id = $(this).val();
        $.ajax({
                url : "<?php echo url('/back-office/fetchProjects'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({builder_id:id}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(response) {
                    $("#project_name").html(response.data);
                }
            });
      
    });
</script>

@endsection
