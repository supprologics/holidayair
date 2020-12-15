<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html class=""> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>Travelo - Travel, Tour Booking HTML5 Template</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Travelo - Travel, Tour Booking HTML5 Template">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,200,300,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Updated Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/updates.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    
    <!-- CSS for IE -->

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body class="coming-soon-page style1 body-blank">
    <div id="page-wrapper" class="wrapper-blank">
        <div class="wrapper">
            <section id="content">
                <div class="container">
                    <div id="main">
                        <h1 class="logo block">
                            <a href="index.html" title="Travelo - home">
                                <img src="images/logo2.png" alt="Travelo HTML5 Template" />
                            </a>
                        </h1>
                        <div class="text-center yellow-color box" style="font-size: 4em; font-weight: 300; line-height: 1em;">We’ll be <i>live</i> soon!</div>
                        <p class="light-blue-color block" style="font-size: 1.3333em;">We are currently working on an awesome new site for you!</p>
                        <div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">
                            <ul class="clock block clearfix">
                                <li>
                                    <span class="remaining-days">00</span>
                                    <label>Days</label>
                                </li>
                                <li class="sep">:</li>
                                <li>
                                    <span class="remaining-hours">00</span>
                                    <label>hours</label>
                                </li>
                                <li class="sep">:</li>
                                <li>
                                    <span class="remaining-minutes">00</span>
                                    <label>minutes</label>
                                </li>
                                <li class="sep">:</li>
                                <li>
                                    <span class="remaining-seconds">00</span>
                                    <label>seconds</label>
                                </li>
                            </ul>
                            <form class="block">
                                <div class="with-icon email-notify input-large full-width">
                                    <input type="text" class="input-text full-width input-large" placeholder="enter your email to get notified">
                                    <button class="icon"><i class="soap-icon-check"></i></button>
                                </div>
                            </form>
                            <ul class="social-icons clearfix inline-block box">
                                <li><a href="#" title="Twitter" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                <li><a href="#" title="GooglePlus" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                <li><a href="#" title="Facebook" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                <li><a href="#" title="Linkedin" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                <li><a href="#" title="Vimeo" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                                <li><a href="#" title="Dribble" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>
                                <li><a href="#" title="Flickr" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                            </ul>
                            <div class="copyright">
                                <p>&copy; 2014 Travelo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.noconflict.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr.2.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.placeholder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.1.10.4.min.js') }}"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="{{ asset('js/theme-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

    <script type="text/javascript">
        function cacluateLaunchTime() {
            var launchDateStr = "2014/10/22 00:00:00"; // timezone must be UTC + 0
            var launchDate = new Date(launchDateStr);
            launchDate.setTime( launchDate.getTime() - launchDate.getTimezoneOffset()*60*1000 );
            
            var currentDate = new Date();
            var diff = new Date(launchDate.getTime() - currentDate.getTime());
            
            if (diff > 0) {
                var milliseconds, seconds, minutes, hours, days;
                diff = Math.abs(diff);
                diff = (diff - (milliseconds = diff % 1000)) / 1000;
                diff = (diff - (seconds = diff % 60)) / 60;
                diff = (diff - (minutes = diff % 60)) / 60;
                days = (diff - (hours = diff % 24)) / 24;
                tjq(".clock .remaining-days").html((days + "").lpad("0", 2));
                tjq(".clock .remaining-hours").html((hours + "").lpad("0", 2));
                tjq(".clock .remaining-minutes").html((minutes + "").lpad("0", 2));
                tjq(".clock .remaining-seconds").html((seconds + "").lpad("0", 2));
            }
        }
        var calcLaunchTimeInterval = setInterval(cacluateLaunchTime, 1000);
    </script>
</body>
</html>
