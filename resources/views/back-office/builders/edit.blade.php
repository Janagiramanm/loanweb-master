@extends('layouts.back-office')
@section('parent_link')
    <a href="{{ route('back-office.builders.index') }}" class="breadcrumb-item"> Builders </a>
@endsection
@section('breadcrum')
    Edit Builder
@stop
@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit Builder
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.builders.update', $builder->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="builder_name">Builder Name</label>
                                <input type="text" class="form-control @error('builder_name') is-invalid @enderror" id="builder_name" name="builder_name" required value="{{ $builder->builder_name  }}">
                                @error('builder_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="project_name">Project Name</label>
                                <input type="tel" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ $builder->project_name }}">
                                @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="field_wrapper" id="add-group">
                        @php 
                          $k = 1;
                        @endphp
                        <div class="add-more-project-type">
                        @foreach($builder->builderDetails as $detail)
                            <input type="hidden" name="old_project_type[]" value="{{$detail->project_type}}"  />
                              @if($k == 1)
                                 <div class="add-more-project-type-edit">
                              @endif
                                        <div class="field-group">
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="bank_address">Project Type</label>

                                                <select class="form-control" name="project_type[]" id="project_type_{{$k}}" required>
                                                        <option value=""> Select Type</option>
                                                        <option value="1" @if($detail->project_type == 1) selected @endif>Apartment</option>
                                                        <option value="2" @if($detail->project_type == 2) selected @endif>Plot</option>
                                                        <option value="3" @if($detail->project_type == 3) selected @endif>Villa</option>
                                                </select>
                                                @error('project_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <label for="cust_city">Project Type Name</label>
                                                    <input type="text" class="form-control" id="type_name_{{$k}}" name="type_name[]" value="{{ $detail->project_type_name }}" required >
                                                    @error('type_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="cust_city">Range</label>
                                                    <input type="number" class="form-control" id="range_{{$k}}" name="range[]" value="{{ $detail->range }}" required >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="cust_city">Spoc Name</label>
                                                    <input type="text" class="form-control" id="spoc_name_{{$k}}" name="spoc_name[]" value="{{ $detail->spoc_name }}" required >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="cust_city">Spoc Mobile</label>
                                                    <input type="number" class="form-control" id="spoc_mobile_{{$k}}" name="spoc_mobile[]" value="{{ $detail->spoc_mobile }}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="cust_city">Spoc Email</label>
                                                    <input type="email" class="form-control" id="spoc_email_{{$k}}" name="spoc_email[]" value="{{ $detail->spoc_email }}" required>
                                                </div>
                                              
                                                <input type="hidden" name="detail_id[]" value="{{$detail->id}}"  />  
                                            </div>
                                        
                                            @if($k != 1)
                                                 <div class="remove-sec"><a href="javascript:void(0);" class="remove_button">Remove</a></div>
                                            @endif 
                                        </div>

                            @if($k == 1)
                                </div>
                            @endif
                            @php 
                                $k++;
                            @endphp   
                           
                        @endforeach
                        </div>
                        </div>
                        <!-- <div class="field_wrapper" id="add-group"></div> -->
                        <div class="form-row add-more-lnk-sec">
                                <a href="#" class="add-more-link" id="add-more"> <i class="fa fa-plus" aria-hidden="true"></i> Add More Project Type</a>
                                <!-- <input type="button" id="add-more" value="Add More Applicant" class="form-control" /> -->
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
<script>
    $(document).ready(function(){
            var wrapper = $('.field_wrapper');
            $("#add-more").click(function(e){
                e.preventDefault();
                var maxField = 10; //Input fields increment limitation
                var fieldHTML = $(".add-more-project-type-edit .field-group").clone().prepend('<hr>').append('<div class="remove-sec"><a href="javascript:void(0);" class="remove_button">Remove</a></div>');
            
                fieldHTML.find('input').val('');
                fieldHTML.find('textarea').val('');
                var x = 1; 
                $(wrapper).append(fieldHTML);

            

            })
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
            
                $(this).parent().parent().remove();
                $(this).remove(); //Remove field html
                x--; //Decrement field counter
            });
    });
</script>
<style>

.form-row.add-more-lnk-sec {
    float: right;
    
    text-decoration: none;
    background-color: antiquewhite;
    padding: 2px;
    border-radius: 18px;
    padding: 2px 10px;
    /* margin-top: -30px; */
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
    /* margin-top: -19px; */
}
</style>

@endsection
