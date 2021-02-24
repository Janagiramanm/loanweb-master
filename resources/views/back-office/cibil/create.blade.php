@extends('layouts.back-office')
@section('parent_link')
    <a href="{{ route('back-office.cibil.index') }}" class="breadcrumb-item"> Cibil Settings </a>
@endsection
@section('breadcrum')
    Add Cibil Settings
@stop

@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add Cibil 
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.cibil.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Bank Name</label>
                                <select class="form-control" name="bank" id="">
                                    <option value="">Select Bank</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_phone">LTV1</label>
                                <input type="tel" class="form-control @error('ltv1') is-invalid @enderror" id="ltv1" name="ltv1" required value="{{ old("ltv1") }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">LTV2</label>
                                <input type="num" class="form-control" id="ltv2" name="ltv2" required value="{{ old("ltv2") }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_address">LTV3</label>
                                <input type="text" class="form-control" id="ltv3"  name="ltv3"  cols="30" rows="3">{{ old('ltv3') }}</textarea>
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
