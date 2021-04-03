@extends('layouts.back-office')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
@section('parent_link')
    <a href="{{ url('back-office/customers/newleads') }}" class="breadcrumb-item"> MODT Details </a>
@endsection


@section('breadcrum')
   MODT Schedule 
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    MODT Schedule
                </h2>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <div class="card-body">
                <form action="#" method="post">
                      <div class="drop-appointment">
                              <h3>Schedule an appointment for DROP</h3>
                              <hr>
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                     <label for="drop_customer_id">Select Customer</label>
                                     @if($droppedCustomers)
                                          <select class="form-control"  name="drop_customer_id" id="drop_customer_id">
                                               <option value="">Select Customer</option>
                                               @foreach($droppedCustomers as $customer)
                                                  <option value="{{ $customer->id }}">{{ $customer->cust_name }}</option>
                                                @endforeach
                                          </select>
                                     @endif
                                     <span class="error-lbl" id="drop_customer_error"></span>

                                 </div>
                                 <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="drop_appointment_date" id="drop_appointment_date" >
									</div>
                                    <span class="error-lbl" id="drop_appointment_date_error"></span>
								</div>
                              </div>
                              <div class="form-row">
                               
                                <div class="form-group col-md-6">
                                    <label for="drop_appointment_time">Time</label>
                                    <select name="drop_appointment_time" id="drop_appointment_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                    <span class="error-lbl" id="drop_appointment_time_error"></span>
                                   
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="drop_type_of_appointment">Appointment Type</label>
                                    <select name="drop_type_of_appointment" id="drop_type_of_appointment" class="form-control">
                                        <option value="">Select Appointment Type</option>
                                        @foreach ($typeofappointments as $type)
                                            <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="error-lbl" id="drop_type_of_appointment_error"></span>
                                </div>
                            </div>
                            <div  class="form-row">
                               
                                <div class="form-group col-md-6">
                                    <label for="drop_appointment_agent">Agent Name</label>
                                    <select name="drop_appointment_agent" id="drop_appointment_agent" class="form-control"></select>
                                    <span class="error-lbl" id="drop_appointment_agent_error"></span>
                                </div>
                             </div>
                            <button type="button" class="btn btn-primary appointment_submit" data-type="drop" id="drop_appointment_submit">Save Appointment</button>
                            <br> <div class="alert-success" id="drop-success"></div>
                      </div>
                      <hr>
                     <h3>Schedule an appointment for PICKUP</h3> 
                     <div class="form-row">
                                 <div class="form-group col-md-6">
                                     <label for="pickup_customer_id">Select Customer</label>
                                     @if($pickupCustomers)
                                          <select class="form-control"  name="pickup_customer_id" id="pickup_customer_id">
                                               <option value="">Select Customer</option>
                                               @foreach($pickupCustomers as $customer)
                                                  <option value="{{ $customer->id }}">{{ $customer->cust_name }}</option>
                                                @endforeach
                                          </select>
                                          
                                     @endif
                                     <span class="error-lbl" id="pickup_customer_error"></span>
                                 </div>
                                 <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="pickup_appointment_date" id="pickup_appointment_date" >
                                    </div>
                                    <span class="error-lbl" id="pickup_appointment_date_error"></span>
								</div>
                              </div>
                              <div class="form-row">
                               
                                <div class="form-group col-md-6">
                                    <label for="pickup_appointment_time">Time</label>
                                    <select name="pickup_appointment_time" id="pickup_appointment_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                    <span class="error-lbl" id="pickup_appointment_time_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pickup_type_of_appointment">Appointment Type</label>
                                    <select name="pickup_type_of_appointment" id="pickup_type_of_appointment" class="form-control">
                                        <option value="">Select Appointment Type</option>
                                        @foreach ($typeofappointments as $type)
                                            <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="error-lbl" id="pickup_type_of_appointment_error"></span>
                                </div>
                            </div>
                            <div  class="form-row">
                               
                                <div class="form-group col-md-6">
                                    <label for="pickup_appointment_agent">Agent Name</label>
                                    <select name="pickup_appointment_agent" id="pickup_appointment_agent" class="form-control"></select>
                                    <span class="error-lbl" id="pickup_appointment_agent_error"></span>
                                </div>
                             </div>
                            <button type="button" class="btn btn-primary appointment_submit" data-type="pickup" id="pickup_appointment_submit">Save Appointment</button>
                            <br> <div class="alert-success" id="pickup-success"></div>
                      </div>

                           

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

    $(".appointment_submit").click(function(){
        var modt_type = $(this).attr('data-type');
           $("#"+modt_type+"_customer_error").text('');
           $("#"+modt_type+"_appointment_date_error").text('');
           $("#"+modt_type+"_appointment_time_error").text('');
           $("#"+modt_type+"_type_of_appointment_error").text('');
           $("#"+modt_type+"_appointment_agent_error").text('');

            var customer_id =  $("#"+modt_type+"_customer_id option:selected" ).val();
            var appointment_date = $("#"+modt_type+"_appointment_date").val();
            var timeslot_id =  $("#"+modt_type+"_appointment_time option:selected" ).val();
            var appiontment_typeid = $("#"+modt_type+"_type_of_appointment option:selected" ).val();
            var agent_id = $("#"+modt_type+"_appointment_agent option:selected" ).val();
            var isValid = validateForm(modt_type,customer_id,appointment_date,timeslot_id,appiontment_typeid,agent_id);
        
           if(isValid==true){
            $.ajax({
                url : "<?php echo url('/back-office/customers/modt/savemodt'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({
                          type:modt_type, 
                          customer_id: customer_id,
                          appointment_date:appointment_date,
                          timeslot_id:timeslot_id,
                          appiontment_typeid:appiontment_typeid,
                          agent_id:agent_id
                    }),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(resp) {
                    if(resp.status == 1 ){                       
                       $("#"+modt_type+"-success").text('Appointment Successfully added')
                       $("#"+modt_type+"-success").show();
                       setTimeout(() => {
                        $("#"+modt_type+"-success").hide();
                        location.reload();
                       }, 3000);
                    }
                }
            });
           }
    })

    $("#drop_appointment_time").change(function(){
        var date = $("#drop_appointment_date").val();
        var time = $(this).val();
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
                        $("#drop_appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#drop_appointment_agent").html(selectOptions);
                    }

                }
            });
        }
   })   

   $("#pickup_appointment_time").change(function(){
        var date = $("#pickup_appointment_date").val();
       
        var time = $(this).val();
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
                        $("#pickup_appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#pickup_appointment_agent").html(selectOptions);
                    }

                }
            });
        }
   })  
});

function validateForm(modt_type,customer_id,appointment_date,timeslot_id,appiontment_typeid,agent_id){

      
        var validation = true;
        if(customer_id == ''){
            $("#"+modt_type+"_customer_error").text('Please select customer');
            validation = false;
        }
        if(appointment_date == ''){
            $("#"+modt_type+"_appointment_date_error").text('Please select date');
            validation = false;
        }
        if(timeslot_id == ''){
            $("#"+modt_type+"_appointment_time_error").text('Please select time');
            validation = false;
            
        }
        if(appiontment_typeid == ''){
            $("#"+modt_type+"_type_of_appointment_error").text('Please select appointment type');
            validation = false;
        }
        if(agent_id == ''){
            $("#"+modt_type+"_appointment_agent_error").text('Please select agent');
            validation = false;
        }
        if(validation == true){
            return true;
        }else{
            return false;
        }
} 
</script>
<style>
.error-lbl {
    color: #da0e0e;
}
.alert-success {
    color: #285b2a;
    background-color: #e2f2e3;
    border-color: #5ab55e;
    padding: 10px;
    margin-top: 5px;
    display:none;
}
</style>
@endsection
