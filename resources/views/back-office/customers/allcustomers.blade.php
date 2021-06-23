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
                        <th>Telecaller</th>
                        <th>Project Name</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->cust_name }}</td>
                            <td>{{ $customer->cust_email }}</td>
                            <td>{{ $customer->cust_phone }}</td>
                            <td>{{ $customer->telecallername }}</td>
                            <td>
                             @php
                             $project = App\Model\Builder::where('id','=',$customer->project_name)->first();
                             if(isset($project->project_name)){
                                echo $project->project_name;    
                             }
                           
                             @endphp
                             </td>
                            <td>{{ $customer_status[$customer->application_status] }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <a href=""  class="dropdown-item"><i class="icon-pencil"></i> Edit </a> -->


                                            <a class="dropdown-item" onclick="event.preventDefault();  document.getElementById('delete-form-{{ $customer->id }}').submit();">
                                                <i class="icon-bin"></i><span>Remove</span>
                                            </a>
                                            <form id="delete-form-{{ $customer->id }}" action="" method="POST" style="display: none;">
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
        <!-- /state saving -->
    </div>

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
