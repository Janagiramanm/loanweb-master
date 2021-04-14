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
                                 
                                </tr>
                            @endforeach
						</tbody>
					</table>
				</div>
				<!-- /pagination types -->
            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
@endsection


@section('custom-script')
<script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
<!-- <script src="http://maps.google.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script> -->
<!-- <script type="text/javascript">


    var locations = <?php //print_r(json_encode($locations)) ?>;
   
    var mymap = new GMaps({
      el: '#mymap',
      lat: 12.9251281,
      lng: 77.6157007,
      zoom:7
    });


    $.each( locations, function( index, value ){
	    mymap.addMarker({
	      lat: value.lat,
	      lng: value.long,
	      title: 'Customer Name - ' + value.cust_name ,
	      click: function(e) {
	        alert('Customer Name - '+value.cust_name+' ');
	      }
	    });
   });


  </script> -->
  <style>
   #mymap{
       width:100%;
       height:600px;
   }
   
  </style>
@endsection
