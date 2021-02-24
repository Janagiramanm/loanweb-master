@extends('layouts.back-office')
@section('parent_link')
    <a href="{{ route('back-office.banks') }}" class="breadcrumb-item"> Banks </a>
@endsection
@section('breadcrum')
    Add Bank
@stop
@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add Bank
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.bank.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Bank Name</label>
                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" required value="{{ old("bank_name") }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_phone">Branch Name</label>
                                <input type="tel" class="form-control @error('bank_branch') is-invalid @enderror" id="bank_branch" name="bank_branch" required value="{{ old("bank_branch") }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Rate of Interest</label>
                                <input type="num" class="form-control" id="rate_of_interest" name="rate_of_interest" required value="{{ old("rate_of_interest") }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_address">Address</label>
                                <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="bank_address"  cols="30" rows="3">{{ old('bank_address') }}</textarea>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="bank_address">Address</label>
                            <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="bank_address"  cols="30" rows="3">{{ old('bank_address') }}</textarea>
                        </div> --}}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">Bank Logo</label>
                                <input type="file" class="form-control" id="bank_logo" name="bank_logo" >
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
