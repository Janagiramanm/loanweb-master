<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Borrow - is the loan company, Business Website Template.">
    <meta name="keywords" content="Financial Website Template, Bootstrap Template, Loan Product, Personal Loan">
    <title>LDFSL</title>
    <!-- Bootstrap -->
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/fontello.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="{{ asset('client/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/owl.theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/simple-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/customwizard.css') }}">
    @section('custom-css')

    @show
</head>

<body>
    <div class="top-bar">
        <!-- top-bar -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 d-none d-xl-block d-lg-block d-md-block">
                    <p class="mail-text">Welcome to LDFSL LOAN WEBSITE</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 d-none d-xl-block d-lg-block d-md-block">
                    <p class="mail-text text-center">Call us at 1-800-123-4567</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 d-none d-xl-block d-lg-block d-md-block">
                    <p class="mail-text text-center">Mon to fri 10:00am - 06:00pm</p>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block d-md-block">
                    <p class="mail-text text-center"><a href="{{ route('emicalculator') }}" style="color:#83bcfa">EMI calculator</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.top-bar -->
    <div class="header-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <!-- logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('client/images/logo.png')}}" alt="Borrow - Loan Company Website Template"></a>
                    </div>
                </div>
                <!-- logo -->
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 text-right d-none d-xl-block d-lg-block ">
                    <div class="header-action">
                        <a href="{{ route('transfer') }}" class="btn btn-primary">Balance Transfer</a>
                        <a href="{{ route('loan.apply') }}" class="btn btn-default ">Apply For Loan</a></div>
                </div>
            </div>
        </div>
        <div class="navigation-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="navigation">
                            <!-- navigation start-->
                            <ul>
                                <li class="active"><a href="{{ route('home') }}" class="animsition-link">Home</a></li>
                                <li><a href="{{ route('about') }}" class="animsition-link">About us</a></li>
                                <li><a href="#" class="animsition-link">Products</a>
                                    <ul>
                                        <li><a href="{{ route('eligibility2') }}" title="Education Loan" class="animsition-link">Home Loan</a></li>
                                        <li><a href="{{ route('interestRate') }}" title="Personal Loan" class="animsition-link">Car Loan</a></li>
                                        <li><a href="{{ route('statuscheck') }}" title="Home Loan" class="animsition-link">Personal Loan</a></li>
                                        <li><a href="{{ route('eligibility') }}" title="Education Loan" class="animsition-link">Business Loan</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="animsition-link">Home Loan</a>
                                    <ul>
                                        <li><a href="{{ route('interestRate') }}" title="Personal Loan" class="animsition-link">Interst Rates</a></li>
                                        <li><a href="{{ route('statuscheck') }}" title="Home Loan" class="animsition-link">Status Check</a></li>
                                        <li><a href="{{ route('eligibility') }}" title="Education Loan" class="animsition-link">Eligibity Check</a></li>
                                        <li><a href="{{ route('eligibility2') }}" title="Education Loan" class="animsition-link">Eligibity Check secod</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('faq') }}" class="animsition-link">Faq</a></li>
                                <li><a href="{{ route('contact') }}" class="animsition-link">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- /.navigation start-->
                    </div>
                </div>
            </div>
        </div>
    </div>


        @section('home-page')

        @show

        @section('all-page')

        @show


    <div class="footer section-space100">
        <!-- footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-logo">
                        <!-- Footer Logo -->
                        <img src="{{ asset('client/images/ft-logo.png') }}" alt="Borrow - Loan Company Website Templates"> </div>
                    <!-- /.Footer Logo -->
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                        <h3 class="newsletter-title">Signup Our Newsletter</h3>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="newsletter-form">
                            <!-- Newsletter Form -->
                            <form action="https://jituchauhan.com/borrow/bootstrap-4/newsletter.php" method="post">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="newsletter" name="newsletter" placeholder="Write E-Mail Address" required>
                                    <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Go!</button>
                </span> </div>
                                <!-- /input-group -->
                            </form>
                        </div>
                        <!-- /.Newsletter Form -->
                    </div>
                </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
            <hr class="dark-line">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="widget-text mt40">
                        <!-- widget text -->
                        <p style="color: antiquewhite">Our goal at LDFSL is to provide access to Home loan, Mortgage loan and other loans at insight competitive interest rates.</p>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p class="address-text" style="color: antiquewhite"><span><i class="icon-placeholder-3 icon-1x"></i> </span>Banjara Hills, Hyderabad</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p class="call-text" style="color: antiquewhite"><span><i class="icon-phone-call icon-1x"></i></span>91210 20085</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget text -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="widget-footer mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Home Loan</a></li>
                            <li><a href="#">EMI Calculator</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="widget-footer mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#">Home Loan</a></li>
                            <li><a href="#">Car Loan</a></li>
                            <li><a href="#">Personal Loan</a></li>
                            <li><a href="#">Education Loan</a></li>
                            <li><a href="#">Business Loan</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="widget-social mt40">
                        <!-- widget footer -->
                        <ul class="listnone">
                            <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i>Linked In</a></li>
                        </ul>
                    </div>
                    <!-- /.widget footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.footer -->
    <div class="tiny-footer">
        <!-- tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <p>© Copyright 2016 | Borrow Loan Company</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                    <p>Terms of use | Privacy Policy</p>

                </div>
            </div>
        </div>
    </div>
    <!-- back to top icon -->
    <a href="#0" class="cd-top" title="Go to top">Top</a>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('client/js/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/menumaker.js') }}"></script>

    <!-- sticky header -->
    <script type="text/javascript" src="{{ asset('client/js/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/sticky-header.js') }}"></script>

    <!-- Back to top script -->
    <script src="{{ asset('client/js/back-to-top.js') }}" type="text/javascript"></script>

    @section('scripts')


    @show

</body>

</html>
