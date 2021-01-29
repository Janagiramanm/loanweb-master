@extends('layouts.clientapp')

@section('all-page')

<div class=" ">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside60">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="error-ctn text-center">
                                <form action="" method="POST">
                                    <input class="form-control" type="text" placeholder="enter you application id" name="application_id" value="" id="application_id"> <br>
                                    <a type="button" id="status_check_btn" class="btn btn-default text-center" style="color: white">Check Status</a>
                                </form>
                            </div>
                            <div>
                                <h1 id="statusval">

                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#status_check_btn").click(function(){
            var ap_id = $("#application_id").val();
            $.ajax({
                    url : "<?php echo url('/ajaxstatuschecking'); ?>",
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                    },
                    data : JSON.stringify({apId:ap_id}),
                    type : 'POST',
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        if(data){
                            // alert(data);
                            $("#statusval").text(data);
                        }

                    }
                });
        });
    });
</script>
@endsection
