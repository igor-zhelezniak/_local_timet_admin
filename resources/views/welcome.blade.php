{{--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Timet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
	
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>

            </div>
        </div>
    </body>
</html>--}}

        <!DOCTYPE html>
<html>
<head>
    <title>BusyDayz</title>

    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/additional-styles.css">

    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.actual.min.js"></script>
</head>

<body>
<div id="wrapper">
    <div id="overlay-1">
        <section id= "navigation">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="ion-navicon"></span>
                        </button>
                        <a class="navbar-brand" href="#">BusyDayz</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#our_service">Service</a></li>
                            <li><a href="#price_table">Price Table</a></li>
                            <li><a href="#testimonial">Testimonials</a></li>
                            <li><a href="#contact">Contact us</a></li>
                        </ul>
                    </div>	<!-- collapse navbar-collapse -->
                </div>	<!-- container-fluid -->
            </nav>	<!-- navbar -->
        </section>	<!-- #navigation -->
        <section id="starting">
            <div class="text-center starting-text">
                <h1 class="rene">BusyDayz</h1>
                <h2>Welcome to your world</h2>
            </div>
        </section>
        <div id="bottom" class="bottom text-center">
            <a href="#about"><i class="ion-ios7-arrow-down"></i></a>
        </div>
    </div><!-- overlay-1 -->
</div>	<!-- wrapper -->

<!-- About Us -->
<section id="about">
    <div class="container">
        <div class="row text-center" id="heading">
            <div class="col-md-6 col-md-offset-3 wow animated zoomInDown" id="heading-text">
                <h3>About Us</h3>
                <p>We are here, Nothing to fear</p>
                <hr class="full">
                <br/>
            </div>
        </div>	<!-- row -->
        <div class="row about-us-text">
            <div class="col-md-8 col-md-offset-2">
                <p class="text-center">BusyDayz is the cloud based time tracking system. We makes the time your people spend on projects visible and available as simple and user friendly as possible. Our tracking software enables workers to either passively or manually track their time spent on projects, tasks, and other deliverables. BusyDayz is good for all kind of business.</p>
            </div>
        </div>	<!-- row -->
        <div class="row main_content">
            <div class="col-md-4 wow animated zoomIn" data-wow-delay="0.1s">
                <figure>
                    <img class="pro img-responsive center-block" src="img/manage-your-projects.png">
                </figure>
                <h5 class="text-center">Manage Your Projects</h5>

            </div>	<!-- col-md-4 -->

            <div class="col-md-4 wow animated zoomIn" data-wow-delay="0.1s">
                <figure>
                    <img class="pro img-responsive center-block" src="img/manage-your-workers.png">
                </figure>
                <h5 class="text-center">Manage Your Workers</h5>

            </div>	<!-- col-md-4 -->

            <div class="col-md-4 wow animated zoomIn" data-wow-delay="0.1s">
                <figure>
                    <img class="pro img-responsive center-block" src="img/save-your-time.png">
                </figure>
                <h5 class="text-center">Save your time</h5>

            </div>	<!-- col-md-4 -->
        </div><!-- row main_content -->
    </div>	<!-- container -->
</section>	<!-- about us -->

<!-- Our service -->
<section id="our_service">
    <div class="container">
        <div class="row text-center" id= "heading">
            <div class="col-md-6 col-md-offset-3 wow animated zoomInDown" id= "heading-text">
                <h3>Our Services</h3>
                <p>We are lucky to service people like you</p>
                <hr class= "full">
                <br/>
            </div>
        </div>
        <div class="main_content">
            <div class="services">
                <div class="row">
                    <div class="col-sm-4 service">
                        <div class="service-icon text-center">
                            <i class="fa fa-clock-o fa-5x"></i>
                        </div>
                        <div class="about-service">
                            <h3 class="text-center">Time Tracking</h3>
                            <p class="text-center">
                                Track your time anywhere from any devices
                            </p>
                        </div>
                    </div>	<!-- col-sm-4 -->
                    <div class="col-sm-4 service">
                        <div class="service-icon text-center">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="about-service">
                            <h3 class="text-center">User types</h3>
                            <p class="text-center">
                                Create different types of users and different departments
                            </p>
                        </div>
                    </div>	<!-- col-sm-4 -->
                    <div class="col-sm-4 service">
                        <div class="service-icon text-center">
                            <i class="fa fa-pencil-square-o fa-5x"></i>
                        </div>
                        <div class="about-service">
                            <h3 class="text-center">Manual time</h3>
                            <p class="text-center">
                                Track your time manually for each project and each category
                            </p>
                        </div>
                    </div>	<!-- col-sm-4 -->
                </div>	<!-- row -->
                <div class="row">
                    <div class="col-sm-4 service">
                        <div class="service-icon text-center">
                            <i class="fa fa-pie-chart fa-5x"></i>
                        </div>
                        <div class="about-service">
                            <h3 class="text-center">Online Reports</h3>
                            <p class="text-center">
                                Generate online reports using various filters
                            </p>
                        </div>
                    </div>	<!-- col-sm-4 -->
                    <div class="col-sm-4 service">
                        <div class="service-icon text-center">
                            <i class="fa fa-lightbulb-o fa-5x"></i>
                        </div>
                        <div class="about-service">
                            <h3 class="text-center">Multy Projects</h3>
                            <p class="text-center">
                                Create Unlimited projects and subprojects
                            </p>
                        </div>
                    </div>	<!-- col-sm-4 -->
                    <div class="col-sm-4 service">
                        <div class="service-icon text-center">
                            <i class="fa fa-life-ring fa-5x"></i>
                        </div>
                        <div class="about-service">
                            <h3 class="text-center">Customer Support</h3>
                            <p class="text-center">
                                Our customer support service ready to help you any time
                            </p>
                        </div>
                    </div>	<!-- col-sm-4 -->
                </div>	<!-- row -->
            </div>	<!-- services -->
        </div>	<!-- main_content -->
    </div>	<!-- container -->
</section>	<!-- our_service -->

<!-- Price-Table -->
<section id="price_table">
    <div class="container">
        <div class="row text-center" id="heading">
            <div class="col-md-6 col-md-offset-3 wow animated zoomInDown" id="heading-text">
                <h3>Price Table</h3>
                <p>So flexible, More comfortable</p>
                <hr class="full">
                <br/>
            </div>
        </div>	<!-- row -->
        <div class="row main_content">
            <ul class="price-table-chart">
                <!--
                    <li>
                        <a href="#">
                            <strong>Free</strong>
                            <span class="price_table-description">1 Website</span>
                            <span class="price_table-description">1 Year Updates</span>
                            <span class="price_table-description">No Email Support</span>
                            <big class="price_table-price">$0</big>
                            <span class="price_table-button">Buy Now</span>
                        </a>
                    </li>
                -->
                <li>
                    <a href="#">
                        <strong>Free</strong>
                        <span class="price_table-description">Unlimited Projects</span>
                        <span class="price_table-description">Unlimited Clients</span>
                        <span class="price_table-description">Unlimited Users</span>
                        <big class="price_table-price">$0</big>
                        <span class="price_table-button">Buy Now</span>
                    </a>
                </li>

                <!--
                <li>
                    <a href="#">
                        <strong>Premium</strong>
                        <span class="price_table-description">Unlimited Websites</span>
                        <span class="price_table-description">Lifetime Updates</span>
                        <span class="price_table-description">Lifetime Email Support</span>
                        <big class="price_table-price">$190</big>
                        <span class="price_table-button">Buy Now</span>
                    </a>
                </li>
                -->
            </ul>
        </div>	<!-- row main_content -->
    </div>	<!-- container -->
</section>	<!-- price_table -->

<!-- Clients -->
<section id= "testimonial">
    <div class= "container">
        <div class= "row text-center" id= "heading">
            <div class= "bg-image col-md-12">
                <div class= "col-md-6 col-md-offset-3 wow animated zoomInDown" id= "heading-text">
                    <h3>Testimonials</h3>
                    <p>Their satisfication, Our inspiration.</p>
                    <hr class= "full">
                    <br/>
                </div>
            </div>
        </div>
        <div class= "row main_content">
            <div class= "col-md-6 col-md-offset-3">
                <div id="client-speech" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class= "row">
                            <div class= "col-md-6 col-md-offset-3">
                                <img class= "img-circle img-responsive center-block" src="img/client1.png">
                            </div>
                            <div class= "col-md-12">
                                <p class= "client-comment text-center">
                                    I just wanted to say thank you for offering and supporting such a great application.I have used it only for a short time, but I LOVE it. It's the first application I have come across that is actually useful, smart, and designed really well.
                                </p>
                            </div>
                        </div>
                        <div class= "row text-center">
                            <p class= "client-name text-center"> ----- Noona Nuengthida Sophon</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class= "row">
                            <div class= "col-md-6 col-md-offset-3">
                                <img class= "img-circle img-responsive center-block" src="img/client2.jpg">
                            </div>
                            <div class= "col-md-12">
                                <p class= "client-comment text-center">
                                    BusyDayz provides multiple wonderful solutions for people like me with many different clients.
                                </p>
                            </div>
                        </div>
                        <div class= "row text-center">
                            <p class= "client-name">-----Md. Aminul Islam Bhuiyan</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class= "row">
                            <div class= "col-md-6 col-md-offset-3">
                                <img class= "img-circle img-responsive center-block" src="img/client3.png">
                            </div>
                            <div class= "col-md-12">
                                <p class= "client-comment text-center">
                                    Give them a try! It's unbelievably easy to use and the information you're able to gather will prove invaluable.
                                </p>
                            </div>
                        </div>
                        <div class= "row text-center">
                            <p class= "client-name">-----  Jenifar Pink</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>	<!-- clients -->

<!-- contact -->
<section id= "contact">
    <div class= "container">
        <div class="row text-center" id= "heading">
            <div class= "bg-image">
                <div class= "col-lg-6 col-lg-offset-3 share-text wow animated zoomInDown" id= "heading-text">
                    <h3 class= "text-center">Stay Connected</h3>
                    <p>We want to connect people like you.</p>
                    <hr class= "full">
                    <br/>
                </div>
            </div>
        </div>
        <div class= "row text-center main_content">
            <div class= "col-md-6 col-md-offset-3 text-center">
                <form method="post" name="sendEmail" action="#">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class= "form">
                        <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-user fa-fw"></i>
	  								</span>
                            <input class="form-control" name="name" type="text" placeholder="Name" required>
                        </div>
                        <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-envelope-o fa-fw"></i>
	  								</span>
                            <input class="form-control" type="email" name="email" placeholder="Email address" required>
                        </div>
                        <div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-tags fa-fw"></i>
	  								</span>
                            <input class="form-control" name="subject" type="text" placeholder="Subject">
                        </div>
                    </div>
                    <div class="input-group margin-bottom-sm">
									<span class="input-group-addon">
										<i class="fa fa-comment-o fa-fw"></i>
									</span>
                        <textarea class="form-control" name="message" rows="6" type= "text" placeholder="Your Message" required></textarea>
                    </div>
                    <input class="btn btn-primary send" type="submit" value="Send Message">
                </form>
            </div>
        </div>
        <!--
        <div class= "row">
            <div class= "col-md-6 col-md-offset-3 text-center">
                <ul class="socials-icons">
                    <li>
                        <a href="#" data-toggle="tooltip" title="Share in Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" title="Share in Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" title="Share in Google +" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" title="Share in Instagram" class="instagram"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" title="Share in Pinterest" class="pinterest"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" title="Connect with Skype" class="skype"><i class="fa fa-skype"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        -->
    </div>
</section>	<!-- contacts -->

<!-- footer -->
<section id= "footer" class= "main-footer">
    <div class= "row">
        <div class= "logo text-center">
            <h1>BusyDayz</h1>
        </div>
    </div>
    <div class= "row">
        <div class= "copyright text-center">
            <p> © 2017 BusyDayz. Designed and Developed by <a href="http://aspins.org"><span class= "theme">Aspins</span></a></p>
        </div>
    </div>
</section><!-- footer -->

<!-- js -->
<script>
    $(document).ready(function() {
        $("#client-speech").owlCarousel({
            autoPlay: 3000,
            navigation : false, // Show next and prev buttons
            slideSpeed : 700,
            paginationSpeed : 1000,
            singleItem:true
        });

        $('input[type=submit]').on('click', function (e) {
            e.preventDefault();
            $.post('/ajaxSendEmail', $('form[name=sendEmail]').serialize(), function (data) {
               console.log(data);
            });
        });

    });
</script>
<script>
    new WOW().init();
</script>
<script>
    $( function() {
        // init Isotope
        var $container = $('.isotope').isotope
        ({
            itemSelector: '.element-item',
            layoutMode: 'fitRows'
        });


        // bind filter button click
        $('#filters').on( 'click', 'button', function()
        {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            $container.isotope({ filter: filterValue });
        });

        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup )
        {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function()
            {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });

    });
</script>
<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/jquery.knob.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="js/dashboard.js"></script>

</body>
</html>
