@extends('layouts.back-office')

@section('breadcrum')
     Roles
@endsection

@section('main-content')
	<!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card col-md-8 just">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Roles</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="btn btn-primary text-light" href="{{ route('back-office.roles.create') }}">Add New Role</a>
                    </div>
                </div>
            </div>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                @can('edit-users')
                                    <a href="{{ route('back-office.roles.edit', $role->id) }}"><button type="button" class="btn btn-info float-left">Edit </button></a>
                                @endcan

                                @can('delete-users')
                                    <form action="{{ route('back-office.roles.destroy', $role->id) }}" method="post" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                @endcan
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
