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
                                <label for="cust_email">Project Name</label>
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ old('project_name') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_email">Builder Name</label>
                                <input type="text" class="form-control @error('builder_name') is-invalid @enderror" id="builder_name" name="builder_name" required value="{{ old('builder_name') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_email">Buying Flat / Door no</label>
                                <input type="text" class="form-control @error('buying_door_no') is-invalid @enderror" id="buying_door_no" name="buying_door_no" required value="{{ old('buying_door_no') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_address">Customer Address</label>
                                <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="cust_address" required cols="30" rows="3">{{ old('cust_address')  }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_id">Bank</label>
                                <select name="bank_id" id="bank_id" class="form-control" required>
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">City</label>
                                <input type="text" class="form-control" id="cust_city" name="cust_city" required value="{{ old('cust_city')  }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_pincode">Pincode</label>
                                <input type="text" class="form-control" id="cust_pincode" name="cust_pincode" required value="{{ old('cust_pincode') }}">
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

@endsection
