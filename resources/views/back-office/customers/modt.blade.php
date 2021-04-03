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
                        <!-- <a type="button" class="btn btn-primary text-light" href="{{ route('back-office.customers.modt') }}" >Export CSV</a> -->
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
                </tr>
                </thead>
                <tbody>
                @if($result)
                    @php 
                      $i = 1;
                    @endphp
                    @foreach($result as $key =>  $res)
                       <tr>
                         <td>{{ $i }}</td>
                        @foreach($res as $type => $value)
                           @if($type == 'drop')
                             <td>{{ $value->customer->cust_name }}</td>
                             <td>{{ $value->customer->bank['bank_name'] }}</td>
                             <td>{{ $value->modt_amount }}</td>
                             <td>{{ $value->customer->telecallername }}</td>
                             <td>{{ $value->user->name }}</td>
                             <td>{{ $value->timeslot->time_slot }}</td>
                           @else
                              <td> {{ $value->customer->telecallername ? $value->customer->telecallername : '---'  }}</td>
                              <td>{{ $value->user->name ? $value->user->name : '---' }}</td>
                              <td>{{ $value->timeslot->time_slot ? $value->timeslot->time_slot : '---'  }}</td>
                              <td>{{ $value->customer->loan_amount ? $value->customer->loan_amount : '---'  }}</td>
                              <td>{{ $value->customer->file_no ? $value->customer->file_no : '---'  }}</td>
                              <td>
                                     <input type="text" name="modt_paid" id="modt_paid" />
                              </td>
                              <td>
                                     <input type="text" name="modt_mode" id="modt_mode" />
                              </td>

                           @endif
                        @endforeach
                        </tr>
                        @php 
                          $i++;
                        @endphp
                    @endforeach
                @endif
               
                
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
