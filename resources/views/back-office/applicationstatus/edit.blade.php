@extends('layouts.back-office')
@section('parent_link')
    <a href="{{ route('back-office.applicationstatus') }}" class="breadcrumb-item"> Application Status </a>
@endsection
@section('breadcrum')
    Edit Application Status
@stop
@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit Application Status
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.applicationstatus.update', $status->id) }}" method="POST" >
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Status Name</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required value="{{ $status->status }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('custom-script')

@endsection
