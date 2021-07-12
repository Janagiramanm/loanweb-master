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
            <table class="table datatable-pagination">
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
                                          
                                            <button type="button" class="dropdown-item modal_cust_destroy" data-toggle="modal" id="delete_btn" data-id="{{ $customer->id }}"  data-target="#modal_delete_from"><i class="icon-bin"></i><span>Remove</span></button>
                                            <!-- <form id="delete-form-{{ $customer->id }}" action="{{ route('back-office.customers.destroy') }}" method="POST" style="display: none;">
                                                @csrf @method('delete')

                                            </form> -->
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
          <!-- /page length options -->
          <div id="modal_delete_from" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Customer Delete Reason Form</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <form action="{{ route('back-office.customers.destroy') }}" class="modal-body form-inline justify-content-center"  method="POST" id="submit_delte_form" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <label>Reason for Delete</label>
                        <input type="hidden" name="hidden_cust_id" id="hidden_cust_id" value="">
                        <input name="reason" type="test" id="customersheet" value="" placeholder="Please enter reson for delete" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">
                        <button  type="button" id="submit_delete_form_btn" class="btn bg-danger ml-sm-2 mb-sm-0">Delete Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
    <!-- <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script> -->
    <script>
    $(document).ready(function() {
        $(".modal_cust_destroy").click(function(){
            var cust_id = $(this).attr('data-id');
            $("#hidden_cust_id").val(cust_id);
            
        });
         $('#submit_delete_form_btn').click(function(){
            $("#submit_delte_form").submit();
         })
       
    })

    </script>
@endsection
