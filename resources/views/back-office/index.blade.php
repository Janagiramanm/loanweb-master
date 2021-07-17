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
            <div class="content">
                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Quick stats boxes -->
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.allcustomers') }}">
                                <div class="card bg-pink-800">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['all'] }}</h3>
                                        </div>
                                        <div>
                                            All Customers
                                        </div>
                                    </div>
                                </div></a>
                            </div>

                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.newleads') }}">
                                <div class="card bg-teal-300">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['newleads'] }}</h3>
                                        </div>
                                        <div>
                                            New Customers
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.customers') }}">
                                <div class="card bg-pink-300">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['pipeline'] }}</h3>
                                        </div>
                                        <div>
                                            Pipelined Customers
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.loginProcess') }}">
                                <div class="card bg-blue-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['login'] }}</h3>
                                        </div>
                                        <div>
                                            Login Customers
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.sanctioned') }}">
                                <div class="card bg-success-400 has-bg-image">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['sanction'] }}</h3>
                                        </div>
                                        <div>
                                            Sanctioned Customers
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.disbursedapplications') }}">
                                <div class="card bg-blue-800">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['disbursed'] }}</h3>
                                        </div>
                                        <div>
                                            Disbursed Customers
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-lg-3">
                                <a href="{{ route('back-office.customers.droppedcustomers') }}">
                                <div class="card bg-teal-800">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">{{ $data['trash'] }}</h3>
                                        </div>
                                        <div>
                                            Dropped Customers
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /content area -->

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

					<table class="table datatable-pagination">
						<thead>
							<tr>
								<th>Agent Name</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Appointment Type</th>
                                <th>Telecaller</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Time</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->agent_name }}</td>
                                    <td>{{ $appointment->customer_name }}</td>
                                    <td>{{ $appointment->cust_address }}</td>
                                    <td>{{ $appointment->appointment_name }}</td>
                                    <td>{{ $appointment->telecallername }}</td>
                                    <td>{{ $appointment->comments }}</td>
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



