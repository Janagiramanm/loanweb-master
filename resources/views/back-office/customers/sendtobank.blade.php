@extends('layouts.back-office')


@section('breadcrum')
   Send To Bank Customers
@endsection

@section('main-content')

    <!-- Content area -->
    <div class="content">

        @if(session()->has('message'))
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ session()->get('message') }}</span>
            </div>
        @endif
        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Send to Bank Customers Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.pipelineCustomers') }}" >Export CSV</a>
                    </div>
                </div>
            </div>
            <table class="table datatable-pagination">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                   $index = 1;
                @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $index++ }}</td>
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
                                        <a href="{{  route('back-office.customers.editsendtobank', $customer->cust_id)  }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>
                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->cust_id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a>
                                        <form id="delete-form-{{ $customer->cust_id }}" action="" method="POST" style="display: none;">
                                            @csrf @method('delete')
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
