@extends('layouts.site')

@section('css')
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/revolution_slider/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    
@endsection

@section('content')

<section id="content">
    <div class="container flight-detail-page">
        <div class="row">
            <div id="main" class="col-md-9">
                <div class="featured-gallery image-box">
                    <div class="flexslider photo-gallery style1" id="post-slideshow1" data-sync="#post-carousel1" data-func-on-start="showTourDetailedDiscount">
                        <ul class="slides">
                            @foreach ($deal->gallery as $image)
                                <li><a href="pages-blog-read.html"><img src="{{ asset('images/deal/'.$image->file_path) }}" alt=""></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="flexslider image-carousel style1" id="post-carousel1"  data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#post-slideshow1">
                        <ul class="slides">
                            @foreach ($deal->gallery as $image)
                                <li><img src="{{ asset('images/deal/'.$image->file_path) }}" alt="" /></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div id="flight-features" class="tab-container">
                    <ul class="tabs">
                        <li class="active"><a href="#flight-details" data-toggle="tab">Flight Details</a></li>
                        <li><a href="#deal-rules" data-toggle="tab">Deal Rules</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="flight-details">
                            <div class="intro table-wrapper full-width hidden-table-sm box">
                                <div class="col-md-4 table-cell travelo-box">
                                    <dl class="term-description">
                                        <dt>Flight Type:</dt><dd>{{ $deal->class_type }}</dd>
                                        <dt>Cancellation:</dt><dd>${{ $deal->cancellation_fee }} / person</dd>
                                        <dt>Flight CHange:</dt><dd>${{ $deal->flight_change_fee }} / person</dd>
                                        <dt>Price:</dt><dd>${{ $deal->amount }}.00</dd>
                                    </dl>
                                </div>
                                <div class="col-md-8 table-cell">
                                    <div class="detailed-features booking-details">
                                        <div class="travelo-box">
                                            <a href="#" class="button btn-mini yellow pull-right">{{$deal->flightplans->count()-1}} STOP</a>
                                            <h4 class="box-title">{{ $deal->name}}<small>{{ $deal->flight_type}} flight</small></h4>
                                        </div>
                                        <div class="table-wrapper flights">
                                            @foreach ($deal->flightplans as $flightplan)
                                            <div class="table-row first-flight">
                                                <div class="table-cell timing-detail">
                                                    <div class="timing">
                                                        <div class="check-in">
                                                            <label>Take off</label>
                                                            <span>{{$flightplan->takeoff_airport}}</span>
                                                        </div>
                                                        <div class="duration text-center">
                                                            <i class="soap-icon-clock"></i>
                                                            <span>{{$flightplan->time_hours}}h {{$flightplan->time_min}}m</span>
                                                        </div>
                                                        <div class="check-out">
                                                            <label>landing</label>
                                                            <span>{{$flightplan->landing_airport}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="long-description">
                                <h2>About {{ $deal->name}}</h2>
                                <p>{{ $deal->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="deal-rules">
                            <h2>Features Style 01</h2>

                            <div class="toggle-container box">
                                @foreach ($deal->dealrules as $rule)
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a href="#{{ $rule->id}}" data-toggle="collapse">{{ $rule->title}}</a>
                                    </h4>
                                    <div class="panel-collapse collapse in" id="{{ $rule->id}}">
                                        <div class="panel-content">
                                            <p>{{ $rule->description}}</p>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                @endforeach
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-3">
                <article class="detailed-logo">
                    <img src="{{  asset('storage/'.$deal->airline->logo)}}" style="width: 100%" alt="">
                    <h2 class="box-title">{{ $deal->airline->name}}</h2>
                </article>
                <div class="travelo-box book-with-us-box">
                    <h4 class="box-title">Need HolidayAir Help?</h4>
                    <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                    <ul >
                        <li class="address">
                            <i class="soap-icon-address circle"></i>
                            <h5 class="title">Address</h5><p>130, <br>High Street, <br> Barnet  EN5 5XQ.</p>
                        </li>
                        <li class="phone">
                            <i class="soap-icon-phone circle"></i>
                            <h5 class="title">Phone</h5><p>Office: <span class="contact-phone">+44 (0)208 4400770 </span>
                            <br>Whats App: <span class="contact-phone">+44 (0)7534433111</span></p>
                        </li>
                        <li class="email">
                            <i class="soap-icon-message circle"></i>
                            <h5 class="title">Email</h5><p><a href="mailto:info@holidayair.com" class="contact-email">info@holidayair.com</a></p>
                        </li>
                    </ul>
                </div>
                <div class="travelo-box book-with-us-box">
                    <h4>Why Book with us?</h4>
                    <ul>
                        <li>
                            <i class="soap-icon-hotel-1 circle"></i>
                            <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                            <p>Nunc cursus libero pur congue arut nimspnty.</p>
                        </li>
                        <li>
                            <i class="soap-icon-savings circle"></i>
                            <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                            <p>Nunc cursus libero pur congue arut nimspnty.</p>
                        </li>
                        <li>
                            <i class="soap-icon-support circle"></i>
                            <h5 class="title"><a href="#">Excellent Support</a></h5>
                            <p>Nunc cursus libero pur congue arut nimspnty.</p>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="{{ asset('assets/components/revolution_slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="{{ asset('assets/components/jquery.bxslider/jquery.bxslider.min.js') }}"></script>

@endsection