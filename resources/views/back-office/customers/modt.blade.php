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
                    <th>MODT RECEIPT</th>
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
                                <td>{{ $value->timeslot->time_slot }} </td>
                            @endif
                        @endforeach
                        @foreach($res as $type => $value) 
                        @if($type != 'drop' || $type == 'pickup'))
                                <td>@if($type == 'pickup') {{ $value->customer->telecallername ? $value->customer->telecallername : '---'  }} @endif</td>
                                <td>@if($type == 'pickup') {{ $value->user->name ? $value->user->name : '---' }} @endif</td>
                                <td>@if($type == 'pickup') {{ $value->timeslot->time_slot ? $value->timeslot->time_slot : '---'  }} @endif</td>
                                <td>@if($type == 'pickup') {{ $value->customer->loan_amount ? $value->customer->loan_amount : '---'  }} @endif</td>
                                <td>@if($type == 'pickup') {{ $value->customer->file_no ? $value->customer->file_no : '---'  }} @endif</td>
                        @endif
                        @endforeach   
                        @foreach($res as $type => $value) 
                              @if($type == 'drop')
                              <td>
                                     <input type="text" name="modt_paid" id="modt_paid_{{ $value->id }}" value="{{ $value->modt_paid }}"  />
                              </td>
                              <td>
                                     <input type="text" name="modt_mode" id="modt_mode_{{ $value->id }}" value="{{ $value->modt_mode }}" />
                              </td>
                              <td>
                                     <input type="text" name="modt_receipt" id="modt_receipt_{{ $value->id }}" value="{{ $value->modt_receipt }}" />
                              </td>
                              <td>
                                     <input class="btn btn-primary save-modt-btn" type="button" data-id="{{ $value->id }}" name="modt_btn" id="modt_btn" value="save" />
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
    <script>
        $(document).ready(function(){

            $('.save-modt-btn').on('click',function(){
                var appoint_id = $(this).attr('data-id');
                var modt_paid = $('#modt_paid_'+appoint_id).val();
                var modt_mode = $('#modt_mode_'+appoint_id).val();
                var modt_receipt = $('#modt_receipt_'+appoint_id).val();
                
                    $.ajax({
                        url : "<?php echo url('/back-office/updateModtValues'); ?>",
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                        },
                        data : JSON.stringify({appoint_id: appoint_id, modt_paid: modt_paid, modt_mode: modt_mode,modt_receipt: modt_receipt}),
                        type : 'POST',
                        contentType: "application/json",
                        dataType: 'json',
                        success: function(data) {
                          
                            setTimeout(function(){
                                 location.reload();
                             
                            }, 1000);
                        }
                    });
            })
           

         
        });
       
      
    </script>
@endsection

