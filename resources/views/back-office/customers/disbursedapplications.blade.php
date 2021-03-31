@extends('layouts.back-office')
@section('breadcrum')
    Disbursed Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Disbursed Customers Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <button type="button" class="btn btn-primary text-light" data-toggle="modal" id="importBtn"  data-target="#modal_form_inline">Import CSV</button>
                        <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.exportdisbursed') }}" >Export CSV</a>
                    </div>
                </div>
            </div>


            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th class="text-center">View</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->cust_id }}</td>
                        <td>{{ $customer->cust_name }}</td>
                        <td>{{ $customer->cust_email }}</td>
                        <td>{{ $customer->cust_phone }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="{{ route('back-office.customers.viewapplication', $customer->cust_id)  }}" class="list-icons-item">
                                        <i class="icon-eye2 icon-2x"></i>
                                    </a>
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

    <!-- Inline form modal -->
    <div id="modal_form_inline" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Data Upload</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="{{ route('back-office.customers.importDisbursement') }}" class="modal-body form-inline justify-content-center"  method="POST" id="submit_exce_form" enctype="multipart/form-data">
                    @csrf
                    <label>Import Excel File of Data</label>
                    <input name="customersheet" type="file" id="customersheet" value="" placeholder="Upload csv, xlxs, etc.," class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">
                    <button  type="button" id="submit_exce_form_btn" class="btn bg-primary ml-sm-2 mb-sm-0">Import Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /inline form modal -->

@endsection


@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_advanced.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#submit_exce_form_btn").on("click",function() {
                var files = $("input[name='customersheet']").val();
                if(files){
                    $("#submit_exce_form").submit();
                }else{
                    alert("please select ile");
                }
            });

            $("#submit_delete_form_btn").click(function(){
                var cust_id = $('input[name="cust_id"]').val();
                $("#hidden_cust_id").val(cust_id);
                $("#submit_delte_form").submit();
            })
        })

        </script>
@endsection
