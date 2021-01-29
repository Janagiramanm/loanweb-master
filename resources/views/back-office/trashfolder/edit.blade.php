@extends('layouts.back-office')

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit customer {{ $customer->name }}
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.customers.update', $customer->id) }}" method="post">
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_phone">Phone Number</label>
                                <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="cust_phone" required value="{{ $customer->cust_phone }}">
                                @error('cust_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_email">E-Mail</label>
                                <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="cust_email" name="cust_email" required value="{{ $customer->cust_email }}">
                                @error('cust_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cust_address">Address</label>
                            <input type="text" class="form-control" id="cust_address" placeholder="1234 Main St" name="cust_address" required value="{{ old('cust_address') ?? $customer->cust_address }}">
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
                            <div class="form-group col-md-4">
                                <label for="cust_state">State</label>
                                <input type="text" class="form-control" id="cust_state" name="cust_state" required value="{{ old('cust_state') ?? $customer->cust_state }}">
                                @error('cust_state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
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
                                <div class="form-check">
                                    <input class="form-check-input" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                    <label class="form-check-label" for="interested">
                                        Interested in loan
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
                                <div class="form-group col-md-3">
									<label for="appointment_date">Date</label>
									<div class="input-group">
										<input type="date" class="form-control" name="appointment_date" id="datepicker" required = "required" >
									</div>
								</div>
                                <div class="form-group col-md-3">
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
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control"></select>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
