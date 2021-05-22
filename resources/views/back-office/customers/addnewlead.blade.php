@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/newleads') }}" class="breadcrumb-item"> New Leads </a>
@endsection
@section('breadcrum')
    Add New Customer
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add New Customer
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.customers.storecustomer') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Customer Name</label>
                                <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="cust_name" name="cust_name" required value="{{ old('cust_name') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_phone">Phone Number</label>
                                <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="cust_phone" required value="{{ old('cust_phone') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_email">E-Mail</label>
                                <input type="email" class="form-control @error('cust_email') is-invalid @enderror" id="cust_email" name="cust_email" required value="{{ old('cust_email') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_email">Buying Flat / Door no</label>
                                <input type="text" class="form-control @error('buying_door_no') is-invalid @enderror" id="buying_door_no" name="buying_door_no" required value="{{ old('buying_door_no') }}">
                            </div>
                           
                        </div>
                       
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">City</label>
                                <input type="text" class="form-control" id="cust_city" name="cust_city" required value="{{ old('cust_city')  }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_pincode">Pincode</label>
                                <input type="text" class="form-control" id="cust_pincode" name="cust_pincode" required maxlength="6" value="{{ old('cust_pincode') }}">
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="cust_address">Customer Address</label>
                                <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="cust_address" required cols="30" rows="3">{{ old('cust_address')  }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="builder_name">Builder Name</label>
                                    <select class="form-control @error('builder_name') is-invalid @enderror" name="builder_name" id="builder_name" required>
                                        <option value="">Select Builder</option>
                                        @foreach($builders as $builder)
                                            <option   value="{{ $builder->id }}"> {{ $builder->builder_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="cust_email">Project Name</label>
                                    <select class="form-control @error('project_name') is-invalid @enderror" name="project_name" id="project_name" required>
                                        <option value="">Select Project</option>
                                        @foreach($builders as $builder)
                                            <option   value="{{ $builder->id }}"> {{ $builder->builder_name}}</option>
                                        @endforeach
                                    </select>
                                  <!-- <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ old('project_name') }}"> -->
                            </div>
                           
                        </div>
                        <div class="form-row">
                           
                            <div class="form-group col-md-6">
                                <label for="bank_id">Bank</label>
                                <select name="bank_id" id="bank_id" class="form-control" >
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="branch_name">Branch</label>
                                    <select name="bank_branch" id="branch_name" class="form-control" >
                                        <option value="">Select Branch</option>
                                    </select>
                                </div>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Create Customer</button>
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

        $("#builder_name").change(function(){
            
            var builder_id = $(this).val();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
              
              url: "/back-office/fetchProjects" ,
              type: "POST",
              data: { builder_id: builder_id },
              success: function( response ) {
                  if(response.status == 1){
                    $("#project_name").html(response.data);
                    
                  }
              }
            });
           
        });

        $("#bank_id").change(function(){
      
            var bank_id = $(this).val();
            $.ajax({
                url : "<?php echo url('/back-office/bank/get-branches'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({bank_id:bank_id}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(response) {
                    if(response.status==1){
                        $("#branch_name").html(response.data);
                    }

                }
                });
       });

    });

</script>

@endsection
