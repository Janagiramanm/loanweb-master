@extends('layouts.back-office')

@section('breadcrum')
    Create New Employee
@stop

@section('main-content')
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <!-- Basic setup -->
                <div class="card">
                        <div class="card-header bg-white header-elements-inline">
                            <h6 class="card-title">Create New Employee</h6>
                        </div>
                        <form id="empdata" class=" m-5" method="POST" action="{{ route('back-office.users.store') }}" data-fouc>
                            @csrf

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee name:</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe" required>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email address:</label>
                                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="your@email.com" required>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone #:</label>
                                            <input type="text" name="phone" class="form-control" placeholder="+91-999-999-9999" data-mask="+91-999-999-9999" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="enter password" required>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" name="address" placeholder="Enter address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City:</label>
                                            <input type="text" name="city" placeholder="Enter City" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <input type="text" name="state" placeholder="Bachelor, Master etc." class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip Code:</label>
                                            <input type="text" name="zipcode" placeholder="Design, Development etc." class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <button class="btn btn-primary">Submit form <i class="icon-arrow-right14 ml-2" ></i></button>
                        </form>
                </div>
                <!-- /basic setup -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /content wrapper -->
    </div>
@endsection

@section('custom-script')

@endsection
