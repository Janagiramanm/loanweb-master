@extends('layouts.back-office')

@section('breadcrum')
    Dropped Customers
@endsection

@section('main-content')
    <!-- Content area -->
    <div class="content">

        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Customers Data</h5>
                <div class="header-elements">
                    <div class="list-icons">
                       <a class="btn btn-primary text-light" href="">Add New Customer</a>
                    </div>
                </div>
            </div>


            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->cust_id }}</td>
                        <td><img src="{{ asset('client/images/user-pic-1.jpg') }}" style="height:80px; width: 80px; border-radius: 40px;"></td>
                        <td>{{ $customer->cust_name }}</td>
                        <td>{{ $customer->cust_email }}</td>
                        <td>{{ $customer->cust_phone }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <div>
                                            <input class="form-check-input drop-up-checkbox" type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                            <label class="form-check-label drop-up-label" for="interested">
                                                Interested Customer
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input drop-up-checkbox" type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                            <label class="form-check-label drop-up-label" for="interested">
                                                Self Funding
                                            </label>
                                        </div>
                                        <button type="button" class="btn btn-primary drop-up-btn"> Update </button>
                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->cust_id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a>
                                        
                                        <!-- <a href=""  class="dropdown-item"><i class="icon-pencil"></i> Edit </a>

                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->cust_id }}').submit();">
                                            <i class="icon-bin"></i><span>Remove</span>
                                        </a> -->
                                        <form id="delete-form-{{ $customer->cust_id }}" action="" method="POST" style="display: none;">
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
    <script type="text/javascript">
	$(document).on('click', '#province-delete', function(e) {
	  e.preventDefault();

	    swal({
	        title         : "Are You Sure",
	        icon          : "warning",
	        buttons       : true,
	        dangerMode    : true,
	    })
	    .then((willDelete) => {
	        if (willDelete) {
	          $.ajax({
	              url         : $(this).attr("href"),
	              method      : 'POST',
	              dataType    : "json",
	              success     : function(response) {
	                  if (response.success == 200) {

	                    swal(response.message, {
	                      icon: "success",
	                      buttons: {
	                        confirm: {
	                          text: "OK",
	                          value: true,
	                          visible: true,
	                          className: "btn-orange",
	                          closeModal: true
	                        }
	                      }
	                    });

	                   window.location.href = "{{url('admin/provinces')}}"

	                  } // end success if
	              } // end success function.
	          }); // end ajax .
	        } else {
	          // Write something here.
	        }
	    }); // End then.
	}); // end Document.
</script>
    <style>
    input.drop-up-checkbox {
         margin-left: 0.595rem;
    }
    .drop-up-label{
         margin-left: 30px;
    }
    
    </style>
@endsection
