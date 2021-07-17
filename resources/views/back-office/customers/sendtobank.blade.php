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
          
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Project Name</th>
                    <th>Flat No</th>
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
                        <td>
                            @php
                                $project = App\Model\Builder::where('id','=',$customer->project_name)->first();
                                if(isset($project->project_name)){
                                    echo $project->project_name;    
                                }
                            @endphp  
                        </td>
                        <td>{{ $customer->buying_door_no }}</td>
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
                                        <button type="button" class="dropdown-item modal_cust_destroy" data-toggle="modal" id="delete_btn" data-id="{{ $customer->cust_id }}" data-target="#modal_delete_from"><i class="icon-bin"></i><span>Remove</span></button>
                                       
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
<!-- Inline form modal -->
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
    <!-- /inline form modal -->
@endsection


@section('custom-script')
    
    <script>
    $(document).ready(function() {
       
        $(".modal_cust_destroy").click(function(){
            var cust_id = $(this).attr('data-id');
            $("#hidden_cust_id").val(cust_id);
            
        });
         $('#submit_delete_form_btn').click(function(){
            $("#submit_delte_form").submit();
         })

         $('.datatable-basic').DataTable();
    })

    </script>
@endsection
