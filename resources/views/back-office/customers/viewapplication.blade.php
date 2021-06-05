@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> View </a>
@endsection

@section('breadcrum')
    View ( {{ $customer->cust_name }} )
@endsection

@section('main-content')
<div class="container mt-2">
    <div class="card card-table table-responsive shadow-0">
        <h2 class="card-header">
            View customer ( {{ $customer->cust_name }} )
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
                    <td>
                        {{ $customer->branch_name }}
                    </td>
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
                    <th>Project Name:</th>
                    <td>{{ $customer->project_name }}</td>
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
                    <th>Demand Amount</th>
                    <th>Demand Date</th>
                    <th>Disbursement Type</th>
                    <th>Disbursement #</th>
                    <th>Disbursement Date</th>
                    <th>Disbursement Amount</th>
                    <th>Installment No</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disbursements as $disbursement)
                    <tr>
                        <td>{{ $disbursement->cust_name}}</td>
                        <td>@if($disbursement->neft_date !=''){{ $disbursement->neft_amount }}@else{{ $disbursement->cheque_amount }} @endif</td>
                        <td>@if($disbursement->neft_date !=''){{ $disbursement->neft_date }}@else{{ $disbursement->cheque_date }} @endif</td>
                        <td>@if($disbursement->neft_date !='') NEFT @else Cheque @endif</td>
                        <td>@if($disbursement->neft_date !=''){{ $disbursement->neft_urt_no }} @else {{ $disbursement->cheque_no }} @endif</td>
                        <td>{{ $disbursement->date_of_disbursement }}</td>
                        <td>{{ $disbursement->disbursement_amount }}</td>
                        <td>{{ $disbursement->installment_num }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @if ($customer->pending_amount != 0)
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('back-office.customers.sendtopartdisb', $customer->cust_id) }}" method="post" id="edit_new_cust_form">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="partdisb" value="{{ $customer->cust_id }}">
                            <button type="submit" class="btn btn-primary" id="update_newcustomer">Proceed For Next Disbursement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>


@endsection

@section('custom-script')
@endsection
