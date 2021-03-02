@extends('layouts.back-office')
@section('breadcrum')
    Builders
@stop
@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Builders Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                       <a class="btn btn-primary text-light" href="{{ route('back-office.builders.create') }}">Add New Builder</a>
                    </div>
                </div>
            </div>


            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Builder Name</th>
                    <th>Project Name</th>
                    <th>Project Type</th>
                    <th>Project Type Name</th>
                    <th>Range</th>
                    <th>SPOC Name</th>
                    <th>SPOC Mobile</th>
                    <th>SPOC Email</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $k=1; ?>
                @foreach ($builders as $builder)
                    <tr>
                        <td>{{ $k }}</td>
                        <td>{{ $builder->builder_name }}</td>
                        <td>{{ $builder->project_name }}</td>
                        <td>{{ ($builder->project_type == 1 ? 'Apartment' : ($builder->project_type == 2 ? 'Plot' : 'Villa')) }}</td>
                        <td>{{ $builder->project_type_name }}</td>
                        <td>{{ $builder->range }}</td>
                        <td>{{ $builder->spoc_name }}</td>
                        <td>{{ $builder->spoc_mobile }}</td>
                        <td>{{ $builder->spoc_email }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.builders.edit', $builder->id) }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>

                                        <button type="button" class="dropdown-item remove-btn" data-toggle="modal" id="delete_btn" data-id="{{ $builder->id }}"  data-target="#modal_delete_from"><i class="icon-bin"></i><span>Remove</span></button>
                                        <form id="delete-form-{{ $builder->id }}" action="{{ route('back-office.builders.destroy', $builder->id) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $k++; ?>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /page length options -->
        <div id="modal_delete_from" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want to delete this builder ?</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                   <div class="row">
                     <button  type="button" id="no-btn" data-dismiss="modal" class="btn btn-danger modal-btn col-3">No</button>
                     <button  type="button" id="yes-btn" data-id="" class="btn btn-primary modal-btn col-3">Yes</button>
                   </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>

    <script>
    $(document).ready(function() {
        
        $(".remove-btn").click(function(){
            var builder_id = $(this).attr('data-id');
            $('#yes-btn').attr('data-id',builder_id);
            // $("#hidden_cust_id").val(builder_id);
            // $("#submit_delte_form").submit();
        })
        $('#yes-btn').click(function(){
            var builder_id = $(this).attr('data-id');
            $("#delete-form-"+builder_id).submit();
        })
    })

    </script>
    <style>
     #no-btn{
         float:left;
     }
     .modal-btn {
    margin-left: 10%;
    margin-bottom: 10px;
}
.modal-title {
    margin-bottom: 0;
    line-height: 1.5385;
    margin-left: 7%;
    padding-bottom: 11px;
}
    </style>
@endsection
