@extends('layouts.back-office')

@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
          <div class="card-header header-elements-inline">
                <h5 class="card-title">Cibil Info</h5>
                <div class="header-elements">
                    <div class="list-icons">
                       <a class="btn btn-primary text-light" href="{{ route('back-office.cibil.create') }}">Add New  </a>
                    </div>
                </div>
            </div>
            <table class="table datatable-basic">
                <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>LTV1</th>
                    <th>LTV2</th>
                    <th>LTV3</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($cibil as $cibi)
                       <tr>
                           <td>{{ $cibil->name }}</td>
                           <td>{{ $cibil->ltv1 }}</td>
                           <td>{{ $cibil->ltv2 }}</td>
                           <td>{{ $cibil->ltv3 }}</td>
                           
                       </tr>
                    @endforeach
                   
                </tbody>

            </table>

        </div>
       


    </div>
    <!-- /content area -->

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
@endsection
