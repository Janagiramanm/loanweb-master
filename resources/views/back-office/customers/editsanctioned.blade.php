@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> Sanctioned Customers </a>
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
                    <form action="{{ route('back-office.customers.updatesanctionedcustomer', $customer->cust_id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="cust_id" id="cust_id" value="{{ $customer->cust_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sanctioned_amount">Sanctioneed Amount:  </label>
                                <input type="text" class="form-control @error('sanctioned_amount') is-invalid @enderror" id="sanctioned_amount" name="sanctioned_amount" required value="{{ old('sanctioned_amount') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <p>Date Of Sanctioned </p>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" class="form-control pickadate" placeholder="Select Date" name="sanctioned_date" id="sanctioned_date" >
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
@endsection
