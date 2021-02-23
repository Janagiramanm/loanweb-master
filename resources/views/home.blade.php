@extends('layouts.clientapp')

@section('home-page')
<div class="slider" id="slider">
    <!-- slider -->
    <div class="slider-img"><img src="{{ asset('client/images/slider-1.jpg')}}" alt="Borrow - Loan Company Website Template" class="">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="slider-captions">
                        <!-- slider-captions -->
                        <h1 class="slider-title">Choose the Best Loan. Apply Now! </h1>
                        <p class="slider-text d-none d-xl-block d-lg-block d-sm-block">The low rate you need for the need you want! Call
                            <br>
                            <strong class="text-highlight">(1800) 123-4567</strong></p>
                        <a href="{{ route('loan.apply') }}" class="btn btn-default">Get Started Today</a> </div>
                    <!-- /.slider-captions -->
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="slider-img"><img src="{{ asset('client/images/slider-2.jpg') }}" alt="Borrow - Loan Company Website Template" class="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                            <h1 class="slider-title">Award winning Home loans with LDFSL </h1>
                            <p class="slider-text d-none d-xl-block d-lg-block d-sm-block">Award winning home loans with low fixed rates and no ongoing fees.</p>
                            <a href="{{ route('eligibility') }}" class="btn btn-default">Check Eligiblity</a> </div>
                        <!-- /.slider-captions -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="slider-img"><img src="{{ asset('client/images/slider-3.jpg') }}" alt="Borrow - Loan Company Website Template" class="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="slider-captions">
                            <!-- slider-captions -->
                            <h1 class="slider-title">Home Loans From LDFSL with low Rate Of Interest.</h1>
                            <p class="slider-text d-none d-xl-block d-lg-block d-sm-block">Home Loans from LDFSL At An Attractive Rate Of Interest. Apply Now!</p>
                            <a href="{{ route('emicalculator') }}" class="btn btn-default ">Emi Caluculator</a> </div>
                        <!-- /.slider-captions -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rate-table">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="rate-counter-block">
                    <div class="icon rate-icon  "> <img src="client/images/mortgage.svg" alt="Borrow - Loan Company Website Template" class="icon-svg-1x"></div>
                    <div class="rate-box">
                        <h1 class="loan-rate">8.74%</h1>
                        <small class="rate-title">Dynamic Interest</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="rate-counter-block">
                    <div class="icon rate-icon  "> <img src="client/images/loan.svg" alt="Borrow - Loan Company Website Template" class="icon-svg-1x"></div>
                    <div class="rate-box">
                        <h1 class="loan-rate">Easy</h1>
                        <small class="rate-title">Hassle Free</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="rate-counter-block">
                    <div class="icon rate-icon  "> <img src="client/images/car.svg" alt="Borrow - Loan Company Website Template" class="icon-svg-1x"></div>
                    <div class="rate-box">
                        <h1 class="loan-rate">Fastest</h1>
                        <small class="rate-title">Disburment</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="rate-counter-block">
                    <div class="icon rate-icon  "> <img src="{{ asset('client/images/digital.svg') }}" alt="Borrow - Loan Company Website Template" class="icon-svg-1x"></div>
                    <div class="rate-box">
                        <h1 class="loan-rate">Digital </h1>
                        <small class="rate-title">Process</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-space80">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb60 text-center section-title">
                    <!-- section title start-->
                    <h1>Let us help you find a loan</h1>
                    <p>We will match you with a loan program that meet your financial need.</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service-img-box mb30 text-center outline">
                    <div class="service-img">
                        <a href="personal-loan.html" class="imghover"><img src="{{ asset('client/images/blog-img.jpg') }}" alt="Borrow - Loan Company Website Template " class="img-fluid"></a>
                    </div>
                    <div class="service-content bg-white pinside20">
                        <h2><a href="personal-loan.html" class="title">Home Loan - New</a></h2>
                    </div>
                </div>
            </div>
           <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service-img-box mb30 text-center outline">
                    <div class="service-img">
                        <a href="home-loan.html" class="imghover"><img src="{{ asset('client/images/blog-img-1.jpg') }}" alt="Borrow - Loan Company Website Template " class="img-fluid"></a>
                    </div>
                    <div class="service-content bg-white pinside20">
                        <h2><a href="home-loan.html" class="title">Home Loan - Used</a></h2>
                    </div>
                </div>
            </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service-img-box mb30 text-center outline">
                    <div class="service-img">
                        <a href="education-loan.html" class="imghover"><img src="{{ asset('client/images/blog-img-2.jpg') }}" alt="Borrow - Loan Company Website Template " class="img-fluid"></a>
                    </div>
                    <div class="service-content bg-white pinside20">
                        <h2><a href="education-loan.html" class="title">Mortgage Loan</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="bg-white section-space80">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb100 text-center section-title">
                    <!-- section title start-->
                    <h1>Save, Fastest Loan & Grow</h1>
                    <p class="lead">We’re all about helping you reach your next financial goal—great rates, less fees, unprecedented service, and awesome loan help.</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="text-center">
                    <h1 class="big-title">150,000+</h1>
                    <div class="small-title">Customers Empowered</div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="text-center">
                    <h1 class="big-title">₹50 Crore+</h1>
                    <div class="small-title">Borrowed</div>
                </div>
            </div>
           <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="text-center">
                    <div class="icon icon-1x icon-primary"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                    <div class="small-title">Customer Rating</div>
                </div>
            </div>
        </div>

    </div>
</div>




<div class="cta">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12 ">
                <div class="mb60 text-center section-title text-white">
                    <!-- section title start-->
                    <h1 class="text-white">Why People Choose Us</h1>
                    <p>We understand how to effectively guide you through the home loan or refinance process and avoid potential problems along the way.</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="number-block text-white">
                    <div class="mb30"><i class="icon-command  icon-4x icon-white"></i></div>
                    <h3 class="text-white mb30">Dedicated Specialists</h3>
                    <p>Duis eget diam quis elit erdiet alidvolutp terdum tfanissim non intwesollis eu mauris.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="number-block text-white">
                    <div class="mb30"><i class="icon-calculator  icon-4x icon-white"></i></div>
                    <h3 class="text-white mb30">No Front Appraisal Fees!</h3>
                    <p>Integer faisis fringilla dolor ut luctus nisi volutpatIn terdum tferra dsim fermentum orci.</p>
                </div>
            </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="number-block text-white">
                    <div class="mb30"><i class="icon-dialog  icon-4x icon-white"></i></div>
                    <h3 class="text-white mb30">Success Stories Rating</h3>
                    <p>Integer facilisis fringilla dolor volutpatIn terdum tfanissim velitliquam at fermentum orci.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-space80">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb60 text-center section-title">
                    <!-- section title start-->
                    <h1>Learn Help &amp; Guide</h1>
                    <p>Our mission is to deliver reliable, latest news and opinions.</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="post-block mb30">
                    <div class="post-img">
                        <a href="blog-single.html" class="imghover"><img src="{{ asset('client/images/blog-post-1.jpg')}}" alt="Borrow - Loan Company Website Template" class="img-fluid"></a>
                    </div>
                    <div class="bg-white pinside40 outline">
                        <h3><a href="blog-single.html" class="title">Couples are Happy with Buying New Home Loan</a></h3>
                        <p class="meta"><span class="meta-date">Aug 25, 2017</span><span class="meta-author">By<a href="#"> Admin</a></span></p>
                    </div>
                </div>
            </div>
             <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="post-block mb30">
                    <div class="post-img">
                        <a href="blog-single.html" class="imghover"><img src="{{ asset('client/images/blog-post-2.jpg')}}" alt="Borrow - Loan Company Website Template" class="img-fluid"></a>
                    </div>
                    <div class="bg-white pinside50 outline">
                        <h3><a href="blog-single.html" class="title">Bigger Home Still The Goal</a></h3>
                        <p class="meta"><span class="meta-date">Aug 24, 2017</span><span class="meta-author">By<a href="#"> Admin</a></span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="post-block mb30">
                    <div class="post-img">
                        <a href="blog-single.html" class="imghover"><img src="{{ asset('client/images/blog-post-3.jpg')}}" alt="Borrow - Loan Company Website Templates" class="img-fluid"></a>
                    </div>
                    <div class="bg-white pinside40 outline">
                        <h3><a href="blog-single.html" class="title">Are you looking for a mortgage loan ?</a></h3>
                        <p class="meta"><span class="meta-date">Aug 24, 2017</span><span class="meta-author">By<a href="#"> Admin</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white section-space80">
    <div class="container">
        <div class="row">
             <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb60 text-center section-title">
                    <!-- section title start-->
                    <h1 class="title-dark">Our Client Testimonial</h1>
                    <p> See what our customers have to say about LDFSL products, people and services.</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 clearfix ">
                <div class="testimonial-block mb30">
                    <div class="bg-white pinside30 mb20">
                        <p class="testimonial-text"> “I loved the customer service you guys provided me. That was very nice and patient with questions I had. I would definitely like to come back here”</p>
                    </div>
                    <div class="testimonial-autor-box">
                        <div class="testimonial-img pull-left"> <img src="client/images/testimonial-img.jpg" alt="Borrow - Loan Company Website Template"> </div>
                        <div class="testimonial-autor pull-left">
                            <h4 class="testimonial-name">Donny J. Griffin</h4>
                            <span class="testimonial-meta">Home Loan</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 clearfix ">
                <div class="testimonial-block mb30">
                    <div class="bg-white pinside30 mb20">
                        <p class="testimonial-text"> “I had a good experience with Insight Loan Services. I am thankful to insight for the help you guys gave me. My loan was easy and fast. thank you Insigtht”</p>
                    </div>
                    <div class="testimonial-autor-box">
                        <div class="testimonial-img pull-left"> <img src="client/images/testimonial-img-1.jpg" alt="Borrow - Loan Company Website Template"> </div>
                        <div class="testimonial-autor pull-left">
                            <h4 class="testimonial-name">Mary O. Randle</h4>
                            <span class="testimonial-meta">Home Loan</span> </div>
                    </div>
                </div>
            </div>
           <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 clearfix ">
                <div class="testimonial-block mb30">
                    <div class="bg-white pinside30 mb20">
                        <p class="testimonial-text"> “We came out of their offices very happy with their service. They treated us very kind. Definite will come back here.”</p>
                    </div>
                    <div class="testimonial-autor-box">
                        <div class="testimonial-img pull-left"> <img src="client/images/testimonial-img-2.jpg" alt="Borrow - Loan Company Website Template"> </div>
                        <div class="testimonial-autor pull-left">
                            <h4 class="testimonial-name">Lindo E. Olson</h4>
                            <span class="testimonial-meta">Home Loan</span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-space80">
    <div class="container">
        <div class="row">
           <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb60 text-center section-title">
                    <!-- section title-->
                    <h1>We are Here to Help You</h1>
                    <p>Our mission is to deliver reliable, latest news and opinions.</p>
                </div>
                <!-- /.section title-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                    <div class="mb40"><i class="icon-calendar-3 icon-2x icon-default"></i></div>
                    <h2 class="capital-title">Apply For Loan</h2>
                    <p>Looking to buy a home loan? then apply for loan now.</p>
                    <a href="#" class="btn-link">Get Appointment</a> </div>
            </div>
             <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                    <div class="mb40"><i class="icon-phone-call icon-2x icon-default"></i></div>
                    <h2 class="capital-title">Call us at </h2>
                    <h1 class="text-big">91210 20085 </h1>
                    <p>lnfo@ldfsl.com</p>
                    <a href="#" class="btn-link">Contact us</a> </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="bg-white bg-boxshadow pinside40 outline text-center mb30">
                    <div class="mb40"> <i class="icon-users icon-2x icon-default"></i></div>
                    <h2 class="capital-title">Talk to Advisor</h2>
                    <p>Need to loan advise? Talk to our Loan advisors.</p>
                    <a href="#" class="btn-link">Meet The Advisor</a> </div>
            </div>
        </div>
    </div>
</div>

<div class="section-space40 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6"> <img src="client/images/logo-1.jpg" alt="Borrow - Loan Company Website Template"> </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6"> <img src="client/images/logo-2.jpg" alt="Borrow - Loan Company Website Template"> </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6"> <img src="client/images/logo-3.jpg" alt="Borrow - Loan Company Website Template"> </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6"> <img src="client/images/logo-4.jpg" alt="Borrow - Loan Company Website Template"> </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6"> <img src="client/images/logo-5.jpg" alt="Borrow - Loan Company Website Template"> </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6"> <img src="client/images/logo-1.jpg" alt="Borrow - Loan Company Website Template"> </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- slider script -->
    <script src="{{ asset('client/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/js/slider-carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/js/service-carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/js/customwizard.js') }}" type="text/javascript"></script>
@endsection