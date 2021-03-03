@extends('layouts.back-office')

@section('breadcrum')
    All Customers
@endsection

@section('main-content')
    <div class="content">
        <!-- State saving -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Customers</h5>
                <div class="header-elements">
                    <div class="list-icons">
                       <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.allcustomersexport') }}" >Export CSV</a>
                    </div>
                </div>
            </div>
            <table class="table datatable-save-state">
                <thead>
                    <tr>
                        <th>#</th>
                        
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->cust_name }}</td>
                            <td>{{ $customer->cust_email }}</td>
                            <td>{{ $customer->cust_phone }}</td>
                            <td>{{ $customer_status[$customer->application_status] }}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /state saving -->
    </div>

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
