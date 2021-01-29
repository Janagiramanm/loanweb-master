@extends('layouts.clientapp')

@section('all-page')
<div class="page-header">
    <div class="container">
        <div class="row">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact us</li>
                    </ol>
                </div>
            </div>
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white pinside30">
                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                            <h1 class="page-title">Contact Us</h1>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-3 col-sm-12 col-12">
                            <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="btn-action"> <a href="#" class="btn btn-default">How To Apply</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sub-nav" id="sub-nav">
                   <ul class="nav nav-justified">
                        <li class="nav-item">
                            <a href="contact-us.html" class="nav-link">Give me call back</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Emi Caculator</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside40">
                    <div class="contact-form mb60">
                        <div class=" ">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="mb60  section-title text-center  ">
                                    <!-- section title start-->
                                    <h1>Get In Touch</h1>
                                    <p>Reach out to us &amp; we will respond as soon as we can.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                     <div class="bg-boxshadow pinside60 outline text-center mb30">
                                         <div class="mb40"><i class="icon-briefcase icon-2x icon-default"></i></div>
                                         <h2 class="capital-title">Branch Office</h2>
                                         <p>Hyderabad
                                             <br> Jersey City, CA 07304</p>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                     <div class="bg-boxshadow pinside60 outline text-center mb30">
                                         <div class="mb40"><i class="icon-phone-call icon-2x icon-default"></i></div>
                                         <h2 class="capital-title">Call us at </h2>
                                         <h1 class="text-big">800-123-456 / 789 </h1>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                     <div class="bg-boxshadow pinside60 outline text-center mb30">
                                         <div class="mb40"> <i class="icon-letter icon-2x icon-default"></i></div>
                                         <h2 class="capital-title">Email Address</h2>
                                         <p>lnfo@ldfsl.com</p>
                                     </div>
                                 </div>
                             </div>

                            </div>
                        </div>
                        <!-- /.section title start-->
                    </div>
                    <div class="map" id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->

@endsection
