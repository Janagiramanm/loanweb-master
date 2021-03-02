@extends('layouts.back-office')
@section('breadcrum')
     Banks
@stop
@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
       
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Banks Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                       <a class="btn btn-primary text-light" href="{{ route('back-office.bank.create') }}">Add New Bank</a>
                    </div>
                </div>
            </div>


            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Bank Name</th>
                    <th>FOIR</th>
                    <th>LTV1</th>
                    <th>LTV2</th>
                    <th>LTV3</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $k=1; ?>
                @foreach ($banks as $bank)
                    <tr>
                        <td>{{ $k }}</td>
                       
                        <td>{{ $bank->bank_name }}</td>
                        <td>{{ $bank->foir }}</td>
                        <td>{{ $bank->ltv1 }}</td>
                        <td>{{ $bank->ltv2 }}</td>
                        <td>{{ $bank->ltv3 }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.bank.edit', $bank->id) }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>

                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $bank->id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a>
                                        <form id="delete-form-{{ $bank->id }}" action="{{ route('back-office.bank.destroy', $bank->id) }}" method="POST" style="display: none;">
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


    </div>
    <!-- /content area -->

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
@endsection
