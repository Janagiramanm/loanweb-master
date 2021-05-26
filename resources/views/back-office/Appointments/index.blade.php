@extends('layouts.back-office')
@section('breadcrum')
    Dashboard
@stop

@section('main-content')
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content" >
              
                <!-- Pagination types -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Appointments</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	</div>
	                	</div>
					</div>

                    <div id="mymap"> {!! Mapper::render() !!} </div>

					<table class="table datatable-pagination">
						<thead>
							<tr>
								<th>Agent Name</th>
                                <th>Customer Name</th>
                                <th>Customer Type</th>
                                <th>Appointment Type</th>
                                <th>Telecaller</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th></th>
                               
                                
							</tr>
						</thead>
						<tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->agent_name }}</td>
                                    <td>{{ $appointment->customer_name }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td>{{ $appointment->appointment_name }}</td>
                                    <td>{{ $appointment->telecallername }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->time_slot }}</td>
                                    <td>
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <button type="button" class="dropdown-item remove-btn" data-toggle="modal" id="delete_btn" data-id="{{ $appointment->id }}"  data-target="#modal_delete_from"><i class="icon-bin"></i><span>Cancel</span></button>
                                                    <form id="delete-form-{{ $appointment->id }}" action="{{ route('back-office.appointments.destroy', $appointment->id) }}" method="POST" style="display: none;">
                                                        @csrf @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
        </tr>
                                    
                                 
                                </tr>
                            @endforeach
						</tbody>
					</table>
				</div>
                
        </div>
				<!-- /pagination types -->
            </div>
            <!-- /content area -->
            <div id="modal_delete_from" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Do you want to cancel this appointment ?</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                    <div class="row">
                        <button  type="button" id="no-btn" data-dismiss="modal" class="btn btn-danger modal-btn col-3">No</button>
                        <button  type="button" id="yes-btn" data-id="" class="btn btn-primary modal-btn col-3">Yes</button>
                    </div>

                    </div>
                </div>
           
       
    

@endsection


@section('custom-script')
<script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>

  <style>
   #mymap{
       width:100%;
       height:600px;
   }
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
            max-width:500px;
            /* max-width: 900px; */
            /* min-height: 330px; */
        }
    }
  </style>
    <script>
    $(document).ready(function() {
     
   // your code goes here
   $(".remove-btn").click(function(){
            var appointment_id = $(this).attr('data-id');
            $('#yes-btn').attr('data-id',appointment_id);
            // $("#hidden_cust_id").val(builder_id);
            // $("#submit_delte_form").submit();
        })
        $('#yes-btn').click(function(){
            var branch_id = $(this).attr('data-id');
            $("#delete-form-"+branch_id).submit();
        })
});
       
    

    </script>
@endsection
