@extends('layouts.back-office')
@section('breadcrum')
     Employees
@stop
@section('main-content')
    {{-- {{ dd($warning) }} --}}
	<!-- Content area -->
    <div class="content">
        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Employee Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="btn btn-primary text-light" href="{{ route('back-office.users.create') }}">Add New Employee</a>
                    </div>
                </div>
            </div>

            @if(Session::has('warning'))
                <div class="alert alert-warning alert-styled-left alert-dismissible ml-3 mr-3">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">Warning!</span> {{ Session::get('warning') }}
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible ml-3 mr-3">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">Success!</span> {{ Session::get('success') }}.
                </div>
            @endif

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roles</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.users.edit', $user->id) }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>
                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('back-office.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /page length options -->
    </div>
    <!-- /content area -->
@endsection

@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
@endsection
