@extends('layouts.back-office')

@section('breadcrum')
    Self Funding Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Customers Data</h5>
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
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->cust_id }}</td>
                       
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
                            <button type="button" class="btn btn-primary edit-cust-status" data-toggle="modal" id="{{ $customer->cust_id }}" data-target="#custStatusChangeModal">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /page length options -->
        <div class="modal fade" id="custStatusChangeModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentModalLabel">Change Customer Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                        <div>
                                            <input class="form-check-input drop-up-checkbox" type="checkbox" id="interested" name="interested" value="1">
                                            <label class="form-check-label drop-up-label" for="interested">
                                                Interested Customer
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input drop-up-checkbox" type="checkbox" id="not_interested" name="not_interested" value="13">
                                            <label class="form-check-label drop-up-label" for="not_interested">
                                                Not Interested
                                            </label>
                                        </div>
                    
                </div>
                <div class="success-msg"></div>
                    <div class="error-msg"></div>
                <div class="modal-footer">
                
                    <input type="hidden" name="customer_id" id="customer_id" />
                    <button type="button" class="btn btn-primary" id="change-cust-status-btn">Update</button>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /content area -->

@endsection


@section('custom-script')
  
    <script >
        $(document).ready(function(){
            $('input[type="checkbox"]').on('change', function() {
            
                var current_id = $(this).attr('id');
                $('input[type="checkbox"]').each(function(){
                    
                    if(current_id != $(this).attr('id')){
                        $("."+$(this).attr('id')).hide();
                    }
                })
                
                $('input[type="checkbox"]').not(this).prop('checked', false);
            });
            $('.edit-cust-status').click(function(){
                $("#customer_id").val($(this).attr('id'));
            });
            $('#change-cust-status-btn').click(function(){
               // alert('hi');
                var cust_id = $("#customer_id").val();
                var cur_status = $('input[type="checkbox"]:checked').val();
               
                if(cur_status != ''){

                    $.ajax({
                    url : "<?php echo url('/back-office/change-customer-status'); ?>",
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                    },
                    data : JSON.stringify({ customer_id:cust_id, status: cur_status }),
                    type : 'POST',
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        
                        if(data.status == 1){ 
                            $(".success-msg").show();                            
                            $(".success-msg").text(data.message);
                        }else{
                            $(".error-msg").text(data.message);
                        }
                        setTimeout(() => {
                            $(".close").click();
                            location.reload(true);
                        }, 2000);
                    
                        
                    }
                })
                }
                
               

            })

           
          });
   </script>
   <style>
    input.drop-up-checkbox {
         margin-left: 0.595rem;
    }
    .drop-up-label{
         margin-left: 30px;
    }
    .drop-up-btn {
         margin: 10px;
    }
    .success-msg {
        display:none;
        padding-left: 5%;
        background: lightgreen;
        padding: 5px;
        margin: 20px;
}
    
    </style>
@endsection
