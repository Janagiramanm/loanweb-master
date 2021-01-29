@extends('layouts.back-office')

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add New Status
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.applicationstatus.store') }}" method="POST" >
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Status Name</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required value="{{ old("status") }}">
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
