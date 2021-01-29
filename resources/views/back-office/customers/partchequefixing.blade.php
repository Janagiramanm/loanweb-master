@extends('layouts.back-office')

@section('breadcrum')
   Part Cheque Fixing Processing Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">
        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Part Cheque Fixing Processing Customers Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.exportsanctioned') }}" >Export CSV</a>
                    </div>
                </div>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->cust_id }}</td>
                        <td><img src="{{ asset('client/images/user-pic-1.jpg') }}" style="height:80px; width: 80px; border-radius: 40px;"></td>
                        <td>{{ $customer->cust_name }}</td>
                        <td>{{ $customer->cust_email }}</td>
                        <td>{{ $customer->cust_phone }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.customers.editpartchequefixing', $customer->cust_id) }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>
                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->cust_id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a>
                                        <form id="delete-form-{{ $customer->cust_id }}" action="{{ route('back-office.customers.destroy') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="cust_id" value="{{ $customer->cust_id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /page length options -->


    </div>
    <!-- /content area -->



@endsection

@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>

@endsection
