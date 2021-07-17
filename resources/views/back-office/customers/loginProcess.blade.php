@extends('layouts.back-office')

@section('breadcrum')
    Login Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Login Customer Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.exportloginProcess') }}" >Export CSV</a>
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
                    <th class="text-center">Update Status</th>
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
                            <form action="">
                                <input type="hidden" id="cust_id" name="cust_id" value="{{ $customer->cust_id }}">
                                <button type="button"  class="btn btn-success d-inline sanction_btn" data-id="{{ $customer->cust_id }}" id="{{ $customer->cust_id }}">Sanctioned</button>
                            </form>
                        </td>
                        <td>
                           <button class="btn btn-danger sanction_cancel" data-toggle="modal"  data-id="{{$customer->cust_id}}"  data-target="#modal_cancel_sanction_from" name="cancel" id="cancel_{{$customer->cust_id}}" class="cancel_sanction">Cancel</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /page length options -->
       
    </div>
    <!-- /content area -->
    <div id="modal_cancel_sanction_from" class="modal fade" >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Do you want to cancel this sanction ?</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                    <div class="row">
                        <button  type="button" id="no-btn" data-dismiss="modal" class="btn btn-danger modal-btn col-3">No</button>
                        <button  type="button" id="yes-btn" data-id="" class="btn btn-primary modal-btn col-3">Yes</button>
                    </div>

                    </div>
                </div>
        </div>
        <style>
   #no-btn{
        float:left;
    }
    .modal-btn {
        margin-left: 10%;
        margin-bottom: 10px;
    }
    .modal-title {
        margin-bottom: 0;
        line-height: 1.5385;
        margin-left: 7%;
        padding-bottom: 11px;
    }
    @media (min-width: 992px){
        .modal-lg, .modal-xl {
            max-width:300px;
            /* max-width: 900px; */
            /* min-height: 330px; */
        }
    }
  </style>
@endsection


@section('custom-script')
    <!-- <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script> -->
    <!-- <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
       $(document).ready(function(){
        $('.sanction_btn').on('click',function(){
            var cust_id = $(this).attr('data-id');
            $.ajax({
                url : "<?php echo url('/back-office/updatestatues'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({custId: cust_id, applicationStatus: 4}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    swal("success", data, "success");
                    setTimeout(function(){
                        // location.reload();
                        location.replace("<?php echo url('/back-office/customers/sanctioned'); ?>")
                    }, 3000);
                }
            });
        });

        $('.sanction_cancel').on('click',function(){
                 $('#yes-btn').attr('data-id',$(this).data('id'));
        });

        $('#yes-btn').on('click',function(){
            var cust_id = $(this).attr('data-id');
            $.ajax({
                url : "<?php echo url('/back-office/cancel-sanction'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({custId: cust_id, applicationStatus: 4}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    if(data.status==1){
                       // setTimeout(function(){
                        // location.reload();
                        location.replace("<?php echo url('/back-office/customers/sendtobank'); ?>");
                       // }, 1000);
                    }
                    

                }
            });
        });
       });       
    </script>
@endsection
