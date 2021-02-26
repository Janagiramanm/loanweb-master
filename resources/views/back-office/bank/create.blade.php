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
                                <label for="cust_phone">FOIR</label>
                                <input type="text" class="form-control @error('foir') is-invalid @enderror" id="foir" name="foir" required value="{{ old("foir") }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ltv1">LTV1</label>
                                <input type="num" class="form-control" id="ltv1" name="ltv1" required value="{{ old('ltv1') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ltv2">LTV2</label>
                                <input type="num" class="form-control" id="ltv2" name="ltv2" required value="{{ old('ltv2') }}">
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ltv3">LTV3</label>
                                <input type="num" class="form-control" id="ltv3" name="ltv3" required value="{{ old('ltv3') }}">
                               
                            </div>
                        </div>

                        <div class="cibil-for-occupation">
                           <div class="field-group">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label for="secondary_occupation_id">Occupation</label>
                                            <select name="secondary_occupation_id[]" id="occupation_id" class="form-control" required>
                                                <option value="">Select Occupation</option>
                                                @foreach ($occupations as $occupation)
                                                        <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    

                                </div>
                                <div class="form-row">
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <th>LTV1</th>
                                                <th>LTV2</th>
                                                <th>LTV3</th>
                                            </tr>
                                            <tr>
                                                <td>FOIR</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>CIBIL1</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>min roi (cibil 1)</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>max roi (cibil 1)</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>CIBIL2</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>min roi (cibil 1)</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>max roi (cibil 1)</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>CIBIL3</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>min roi (cibil 1)</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                            <tr>
                                                <td>max roi (cibil 1)</td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                                <td><input type="text" name="ltv1"  /></td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                        <div class="field_wrapper" id="add-group"></div>
                        <div class="form-row add-more-lnk-sec">
                                <a href="#" class="add-more-link" id="add-more"> <i class="fa fa-plus" aria-hidden="true"></i> Add Other Occupation</a>
                                <!-- <input type="button" id="add-more" value="Add More Applicant" class="form-control" /> -->
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    var wrapper = $('.field_wrapper');
    $("#add-more").click(function(e){
        e.preventDefault();
        var maxField = 10; //Input fields increment limitation
        var fieldHTML = $(".cibil-for-occupation .field-group").clone().append('<div class="remove-sec"><a href="javascript:void(0);" class="remove_button">Remove</a></div>');
        fieldHTML.find('input').val('');
        fieldHTML.find('textarea').val('');
        var x = 1; 
        $(wrapper).append(fieldHTML);

       

    })
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
       
        $(this).parent().parent('div').remove();
        $(this).remove(); //Remove field html
        x--; //Decrement field counter
    });
})
</script>
<style>
.form-row.add-more-lnk-sec {
    float: right;
    
    text-decoration: none;
    background-color: antiquewhite;
    padding: 2px;
    border-radius: 18px;
    padding: 2px 10px;
    
}
.form-row.add-more-lnk-sec a{
    color: green !important;
}
a.remove_button, .remove_button_edit {
    color: red;
    background-color: antiquewhite;
    padding: 2px 5px;
    border-radius: 14px;
   
}
.remove-sec {
    text-align: center;
    
}
</style>

@endsection

@section('custom-script')

@endsection
