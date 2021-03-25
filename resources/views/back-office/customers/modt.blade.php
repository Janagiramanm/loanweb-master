@extends('layouts.back-office')

@section('breadcrum')
    MODT Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">
        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"> MODT Customers Details</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.exportsanctioned') }}" >Export CSV</a>
                    </div>
                </div>
            </div>

            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th style="width:50px;">CUSTOMER</th>
                    <th>BANK</th>
                    <th>MODT AMOUNT <br> (0.5% OR 50k)</th>
                    <th>TELECALLER DROP</th>
                    <th>EXECUTIVE DROP</th>
                    <th>DROP TIME</th>
                    <th>TELECALLER ( PICKUP )</th>
                    <th>EXECUTIVE ( PICKUP )</th>
                    <th> PICKUP TIME</th>
                    <th>LOAN AMOUNT</th>
                    <th>FILE NO</th>
                    <th>MODT PAID</th>
                    <th>MODT MODE</th>
                    <th>Action</th>

                  
                </tr>
                
                </thead>
                <tbody>
                <tr>
                   <td>1</td>
                   <td>Charley Johnston</td>
                   <td>ICIC Bank</td>
                   <td>40000</td>
                   <td>Pending Doc collection for backoffice</td>
                   <td>Pending Doc collection for backoffice</td>
                   <td>4:30 PM</td>
                   <td>Pending Doc collection for Bank</td>
                   <td>Pending Doc collection for Bank</td>
                   <td>2:00 PM</td>
                   <td>9000000</td>
                   <td>ICIC0001241</td>
                   <td>400000</td>
                   <td>Active</td>
                   <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('back-office.customers.edit-modt') }}"  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>
                                        <button type="button" class="dropdown-item" data-toggle="modal" id="delete_btn"  data-target="#modal_delete_from"><i class="icon-bin"></i><span>Remove</span></button>
                                    </div>
                                </div>
                            </div>
                        </td>
                </tr>
                
                </tbody>
            </table>
        </div>
        <!-- /page length options -->


    </div>
    <!-- /content area -->
<style>
  .card{
      overflow-x:scroll;
  }
</style>


@endsection

@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>

@endsection
