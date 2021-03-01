@extends('layouts.back-office')

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add New Builder
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.bank.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="builder_name">Bank Name</label>
                                <input type="text" class="form-control @error('builder_name') is-invalid @enderror" id="builder_name" name="builder_name" required value="{{ old("builder_name") }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="project_name">Project Name</label>
                                <input type="tel" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ old("project_name") }}">
                            </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bank_address">Project Type</label>
                            <select class="form-control" name="project_type" id="project_type">
                                      <option value=""> Select Type</option>
                                      <option value="1">Apartment</option>
                                      <option value="2">Plot</option>
                                      <option value="3">Villa</option>
                            </select>
                            
                        </div>
                        <div class="form-group col-md-6">
                                <label for="cust_city">Project Type Name</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">Range</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_city">Spoc Name</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">Spoc Mobile</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_city">Spoc Email</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('custom-script')

@endsection
