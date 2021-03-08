@extends('layouts.back-office')

@section('breadcrum')
    Login Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Login Customer Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.exportloginProcess') }}" >Export CSV</a>
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
                    <th class="text-center">Update Status</th>
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
                            <form action="">
                                <input type="hidden" id="cust_id" name="cust_id" value="{{ $customer->cust_id }}">
                                <button type="button"  class="btn btn-success d-inline" id="updatestatus">Sanctioned</button>
                            </form>
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
    <script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).on('click', '#updatestatus', function(){
            var cust_id = $("#cust_id").val();
            $.ajax({
                url : "<?php echo url('/back-office/updatestatues'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({custId: cust_id, applicationStatus: 4}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    swal("success", data, "success");
                    setTimeout(function(){
                        // location.reload();
                        location.replace('/back-office/customers/sanctioned')
                    }, 3000);
                }
            });
        });
    </script>
@endsection
