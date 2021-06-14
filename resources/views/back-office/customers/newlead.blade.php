@extends('layouts.back-office')

@section('breadcrum')
    New Leads
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
                <h5 class="card-title">Customers Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <button type="button" class="btn btn-primary text-light" data-toggle="modal" id="importBtn"  data-target="#modal_form_inline">Import CSV</button>
                        <a class="btn btn-primary text-light" href="{{ route('back-office.customers.addnewlead') }}">Add New Customer</a>
                    </div>
                </div>
            </div>

            <table class="table datatable-show-all">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th>Project Name</th>
                    <th>Telecaller</th>
                    <th>Date Created</th>
                    <th>Source</th>
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
                        <td>
                             @php
                             $project = App\Model\Builder::where('id','=',$customer->project_name)->first();
                             if(isset($project->project_name)){
                                echo $project->project_name;    
                             }
                           
                             @endphp
                             </td>
                        <td>{{ $customer->telecallername }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>Dashboard</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.customers.editnewcustomer', $customer->cust_id) }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>
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
    <div id="modal_form_inline" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Data Upload</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{ route('back-office.customers.importnewCustomer') }}" class="modal-body form-inline justify-content-center"  method="POST" id="submit_exce_form" enctype="multipart/form-data">
                    @csrf
                    <label>Import Excel File of Data</label>
                    <input name="customersheet" type="file" id="customersheet" value="" placeholder="Upload csv, xlxs, etc.," class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">
                    <button  type="button" id="submit_exce_form_btn" class="btn bg-primary ml-sm-2 mb-sm-0">Import Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /inline form modal -->

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
    <!-- /inline form modal -->

@endsection


@section('custom-script')

    <script>
    $(document).ready(function() {
        $("#submit_exce_form_btn").on("click",function() {
            var files = $("input[name='customersheet']").val();
            if(files){
                $("#submit_exce_form").submit();
            }else{
                alert("please select file");
            }
        });

        // $("#submit_delete_form_btn").click(function(){
        //     var cust_id = $('input[name="cust_id"]').val();
        //     $("#hidden_cust_id").val(cust_id);
        //     $("#submit_delte_form").submit();
        // })
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
