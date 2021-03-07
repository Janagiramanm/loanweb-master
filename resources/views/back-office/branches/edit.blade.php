@extends('layouts.back-office')
@section('parent_link')
    <a href="{{ route('back-office.branches.index') }}" class="breadcrumb-item"> Branches </a>
@endsection
@section('breadcrum')
    Add New Branch
@stop
@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Add New Branch 
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.branches.update', $branch->id) }}" method="post" >
                        @csrf
                        @method('PUT')
                     

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="cust_name">Bank Name</label>
                                    <select name="bank_id" id="bank_id" class="form-control" required>
                                        <option value="">Select Bank</option>
                                        @foreach ($banks as $bank)
                                                <option @if($branch->bank_id == $bank->id ) selected @endif value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                        @endforeach
                                    </select>
                                @error('bank_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="branch_name">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name" required value="{{ old('branch_name') ? old('branch_name') : $branch->branch_name  }}">
                                @error('branch_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                           
                        </div>

                        <div class="form-row">
                           
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <textarea  class="form-control" id="address" name="address" rows="5" required> {{ old('address') ? old('address') : $branch->address }} </textarea>
                                @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="locality">Locality</label>
                                        <input type="text" class="form-control" id="locality" name="locality" required value="{{ old('locality') ? old('locality') : $branch->locality }}">
                                        @error('locality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="pincode">Pincode</label>
                                        <input type="number" class="form-control" id="pincode" name="pincode" required value="{{ old('pincode') ? old('pincode') : $branch->pincode }}">
                                        @error('pincode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                    </div>
                                </div>
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
