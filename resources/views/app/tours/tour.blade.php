@extends('layouts.site')

@section('css')
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/revolution_slider/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    
@endsection

@section('content')
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">{{ $tour->name}}</h2>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="container tour-detail-page">
            <div class="row">
                <div id="main" class="col-md-9">
                    <div class="featured-gallery image-box">
                        <div class="flexslider photo-gallery style1" id="post-slideshow1" data-sync="#post-carousel1" data-func-on-start="showTourDetailedDiscount">
                            <ul class="slides">
                                @foreach ($tour->gallery as $image)
                                    <li><a href="pages-blog-read.html"><img src="{{ asset('images/tours/'.$image->file_path) }}" alt=""></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="flexslider image-carousel style1" id="post-carousel1"  data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#post-slideshow1">
                            <ul class="slides">
                                @foreach ($tour->gallery as $image)
                                    <li><img src="{{ asset('images/tours/'.$image->file_path) }}" alt="" /></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div id="tour-details" class="travelo-box">
                        <div class="intro small-box table-wrapper full-width hidden-table-sms">
                            <div class="col-sm-4 table-cell travelo-box">
                                <dl class="term-description">
                                    <dt class="my-1">Location:</dt>
                                    <dd>
                                        @foreach ($tour->routes as $location)
                                            <p style="margin-bottom: 5px;"><i class="fa fa-map-marker"></i> {{ $location->name }} </p>
                                        @endforeach
                                    </dd><br>
                                    <dt>Category:</dt><dd>{{ $tour->category->name }}</dd>
                                    <dt>Duration:</dt><dd>{{ $tour->duration }}</dd>
                                    @if ($tour->duration=='Overnight')
                                        <dt>Days:</dt><dd>{{ $tour->days }}</dd>
                                        <dt>Nights:</dt><dd>{{ $tour->nights }}</dd>
                                    @endif
                                </dl>
                            </div>
                            <div class="col-sm-8 table-cell">
                                <div class="detailed-features">
                                    <div class="price-section clearfix">
                                        <div class="details">
                                            <h4 class="box-title">{{ $tour->name }}<small>{{ $tour->days }} days tour</small></h4>
                                        </div>
                                        <div class="details">
                                            <span class="price">${{ $tour->amount }}</span>
                                            <a href="{{ route('booking.tour',$tour->id) }}" class="button green btn-small uppercase">Book Tour</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <p>{{ $tour->description }}</p>

                    </div>
                    <div class="block">
                        <div class="tab-container full-width-style white-bg">
                            <ul class="tabs">
                                <li class="active"><a href="#first-tab" data-toggle="tab"><i class="soap-icon-plans circle"></i>Itineraries</a></li>
                                <li><a href="#second-tab" data-toggle="tab"><i class="soap-icon-baggage-status circle"></i>Includes</a></li>
                                <li><a href="#third-tab" data-toggle="tab"><i class="soap-icon-baggage-1 circle"></i>Excludes</a></li>
                                <li><a href="#forth-tab" data-toggle="tab"><i class="soap-icon-baggage-status circle"></i>Conditions</a></li>
                                <li><a href="#fifth-tab" data-toggle="tab"><i class="soap-icon-baggage-1 circle"></i>Hints</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="first-tab">
                                    <h2 class="tab-content-title"><i class="soap-icon-plans circle"></i><span>        Itineraries</span></h2>
                                    
                                        <div class="toggle-container box">
                                            @foreach ($tour->itineraries as $itinerary)
                                            <div class="panel style1">
                                                <h4 class="panel-title">
                                                    <a href="#{{ $itinerary->id}}" data-toggle="collapse">{{ $itinerary->title}}</a>
                                                </h4>
                                                <div class="panel-collapse collapse in" id="{{ $itinerary->id}}">
                                                    <div class="panel-content">
                                                        <p>{{ $itinerary->description}}</p>
                                                    </div><!-- end content -->
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                            
                                        </div>
                                   
                                </div>
                                
                                <div class="tab-pane fade  " id="second-tab">
                                    <h2 class="tab-content-title"><i class="soap-icon-plans circle"></i><span>        Includes</span></h2>
                                        <ul class="circle">
                                            @foreach ($tour->txt_details->where('detail_type',1) as $detail)
                                                <li type="none"><h4>{{$detail->text}}</h4></li>
                                            @endforeach
                                        </ul>
                                </div>
                                <div class="tab-pane fade  " id="third-tab">
                                    <h2 class="tab-content-title"><i class="soap-icon-plans circle"></i><span>        Excludes</span></h2>
                                        <ul class="circle">
                                            @foreach ($tour->txt_details->where('detail_type',2) as $detail)
                                                <li type="none"><h4>{{$detail->text}}</h4></li>
                                            @endforeach
                                        </ul>
                                </div>
                                <div class="tab-pane fade  " id="forth-tab">
                                    <h2 class="tab-content-title"><i class="soap-icon-plans circle"></i><span>        Conditions</span></h2>
                                        <ul class="circle">
                                            @foreach ($tour->txt_details->where('detail_type',3) as $detail)
                                                <li type="none"><h4>{{$detail->text}}</h4></li>
                                            @endforeach
                                        </ul>

                                        <h2 class="tab-content-title"><i class="soap-icon-plans circle"></i><span>        Cancellations</span></h2>
                                        <ul class="circle">
                                            @foreach ($tour->txt_details->where('detail_type',4) as $detail)
                                                <li type="none"><h4>{{$detail->text}}</h4></li>
                                            @endforeach
                                        </ul>
                                </div>
                                <div class="tab-pane fade  " id="fifth-tab">
                                    <h2 class="tab-content-title"><i class="soap-icon-plans circle"></i><span>   Hints</span></h2>
                                        <ul class="circle">
                                            @foreach ($tour->txt_details->where('detail_type',5) as $detail)
                                                <li type="none"><h4>{{$detail->text}}</h4></li>
                                            @endforeach
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-3">
                    <!--
                    <div class="travelo-box">
                        <h4 class="box-title">Last Minute Deals</h4>
                        <div class="image-box style14">
                            <article class="box">
                                <figure><a href="#" title=""><img width="63" height="59" src="http://placehold.it/63x60" alt=""></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="#">Plaza Tour Eiffel</a></h5>
                                    <label class="price-wrapper"><span class="price-per-unit">$170</span>avg/night</label>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a href="#" title=""><img width="63" height="59" src="http://placehold.it/63x60" alt=""></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="#">Ocean Park Tour</a></h5>
                                    <label class="price-wrapper"><span class="price-per-unit">$620</span>avg/night</label>
                                </div>
                            </article>
                            <article class="box">
                                <figure><a href="#" title=""><img width="63" height="59" src="http://placehold.it/63x60" alt=""></a></figure>
                                <div class="details">
                                    <h5 class="box-title"><a href="#">Dream World Trip</a></h5>
                                    <label class="price-wrapper"><span class="price-per-unit">$322</span>avg/night</label>
                                </div>
                            </article>
                        </div>
                    </div> -->
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