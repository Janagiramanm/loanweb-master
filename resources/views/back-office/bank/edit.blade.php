@extends('layouts.back-office')

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add Bank
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.bank.update', $bank_id->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Bank Name</label>
                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" required value="{{ $bank_id->bank_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_phone">Branch Name</label>
                                <input type="tel" class="form-control @error('bank_branch') is-invalid @enderror" id="bank_branch" name="bank_branch" required value="{{ $bank_id->bank_branch }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Rate of Interest</label>
                                <input type="number" min="3" max="100" maxlength="2" step="0.01" class="form-control" id="rate_of_interest" name="rate_of_interest" required value="{{ old("rate_of_interest") }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_address">Address</label>
                                <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="bank_address"  cols="30" rows="3">{{ $bank_id->bank_address }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">Bank Logo</label>
                                <input type="hidden" class="form-control" id="bank_logo_old" name="bank_logo_old" value="{{ $bank_id->bank_logo }}">
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
