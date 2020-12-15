@extends('layouts.site')

@section('css')

    <style>
        section#content {  min-height: 1000px; padding: 0; position: relative; overflow: hidden; }
        #main { padding-top: 200px; }
        .page-title, .page-description { color: #fff; }
        .page-title { font-size: 4.1667em; font-weight: bold; }
        .page-description { font-size: 2.5em; margin-bottom: 50px; }
        .featured { position: absolute; right: 50px; bottom: 50px; z-index: 9; margin-bottom: 0;  text-align: right; }
        .featured figure a { border: 2px solid #fff; }
        .featured .details { margin-right: 10px; }
        .featured .details > * { color: #fff; line-height: 1.25em; margin: 0; font-weight: bold; text-shadow: 2px -2px rgba(0, 0, 0, 0.2); }
    </style>
@endsection

@section('content')
    <section id="content" class="slideshow-bg">
        


        <div id="slideshow">
            <div class="flexslider">
                <ul class="slides">
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 0; display: block; z-index: 1;" class="d-flex">
                    <div class="slidebg" style="background-image:url({{ asset('/images/covers/1.jpg')}})">
                    </div>
                    </li>
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 0; display: block; z-index: 1;" class="d-flex">
                        <div class="slidebg" style="background-image:url({{ asset('/images/covers/2.jpg')}})">
                        </div>
                    </li>
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 0; display: block; z-index: 1;" class="d-flex">
                        <div class="slidebg" style="background-image:url({{ asset('/images/covers/3.jpg')}})">
                        </div>
                    </li>
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 1; display: block; z-index: 2;" class="d-flexflex-active-slide">
                        <div class="slidebg" style="background-image:url({{ asset('/images/covers/4.jpg')}})">
                        </div>
                    </li>
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 0; display: block; z-index: 1;" class="d-flex">
                        <div class="slidebg" style="background-image:url({{ asset('/images/covers/5.jpg')}})">
                        </div>
                    </li>
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 0; display: block; z-index: 1;" class="d-flex">
                        <div class="slidebg" style="background-image:url(https://webadmin.holidayair.com/images/sliders/slider_image_20200515203349.jpg)">
                            <div class="slider-caption container " style="margin-top: 10%" >
                                <h1 class="page-title title">Sri Lanka is Safe</h1>
                                <h2 class="page-description sub-title">Sri Lanka is Open</h2>
                                <h3 class="page-description sub-title">Sri Lanka needs your Support </h3>
                            </div>
                        </div>
                    </li>
                    <li style="width: 100%; float: left; margin-right: -100%;  opacity: 0; display: block; z-index: 1;" class="d-flex">
                        <div class="slidebg" style="background-image:url(https://webadmin.holidayair.com/images/sliders/slider_image_20200528203629.jpg)">
                            <div class="slider-caption container " style="margin-top: 10%" >
                                <h1 class="page-title title">12 years of tailored experiences</h1>
                                <h2 class="page-description sub-title">AWARD WINNING TAILOR-MADE HOLIDAYS IN SRI LANKA</h2>
                                <h3 class="page-description sub-title">Luxury for less</h3>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container" >
            <div id="main" >
                <div class="search-box-wrapper style2">
                    <div class="search-box">
                        <ul class="search-tabs clearfix">
                            <li class="active"><a href="#flight-and-hotel-tab" data-toggle="tab"><i class="soap-icon-flight-hotel"></i><span>TOURS</span></a></li>
                            <li><a href="#hotels-tab" data-toggle="tab"><i class="soap-icon-hotel"></i><span>HOTELS</span></a></li>
                            <li><a href="#flights-tab" data-toggle="tab"><i class="soap-icon-plane-right takeoff-effect"></i><span>FLIGHTS</span></a></li>
                            <li class="advanced-search visible-lg"><a href="#advanced-search-tab" data-toggle="tab"><span>Advanced Search</span></a></li>
                        </ul>
                        <div class="visible-mobile">
                            <ul id="mobile-search-tabs" class="search-tabs clearfix">
                                <li class="active"><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>
                                <li><a href="#hotels-tab">HOTELS</a></li>
                                <li><a href="#flights-tab">FLIGHTS</a></li>
                                <li><a href="#advanced-search-tab">Advanced Search</a></li>
                            </ul>
                        </div>
                        
                        <div class="search-tab-content">
                            <div class="tab-pane fade active in" id="flight-and-hotel-tab">
                                <form action="{{ route('search.tour')}}" method="post">
                                    {{ csrf_field() }}
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="selector">
                                                    <select class="full-width" name="country" id="country">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-12">
                                                    <div class="selector">
                                                        <select class="full-width" name="category" id="category">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width" name="duration" id="duration">
                                                            <option value="">Select Duration</option>
                                                            <option value="FullDay">FULLDAY</option>
                                                            <option value="HalfDay">HALFDAY</option>
                                                            <option value="Overnight">OVERNIGHT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 pull-right">
                                                    <button class="full-width" type="submit">SERACH NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="hotels-tab">
                                <form action="hotel-list-view.html" method="post">
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-3">
                                            <input type="text" class="input-text full-width" placeholder="Rome, Paris, New York..." />
                                        </div>
                                        <div class="form-group col-sm-6 col-md-4">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_from" class="input-text full-width" placeholder="Check In" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_to" class="input-text full-width" placeholder="Check Out" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">1 Room</option>
                                                            <option value="2">2 Rooms</option>
                                                            <option value="3">3 Rooms</option>
                                                            <option value="4">4 Rooms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">1 Guest</option>
                                                            <option value="2">2 Guests</option>
                                                            <option value="3">3 Guests</option>
                                                            <option value="4">4 Guests</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <button type="submit" class="full-width">SEARCH NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="flights-tab">
                                <form action="flight-list-view.html" method="post">
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Leaving From (city, distirct or specific airpot)" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Going To (city, distirct or specific airpot)" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_from" class="input-text full-width" placeholder="Departing On" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">anytime</option>
                                                            <option value="2">morning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="date_to" class="input-text full-width" placeholder="Arriving On" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">anytime</option>
                                                            <option value="2">morning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-3">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Adults</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Kids</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="text" class="input-text full-width" placeholder="Promo Code" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-3">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Infants</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 pull-right">
                                                    <button class="full-width">SERACH NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="advanced-search-tab">
                                <form>
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Leaving From (city, distirct or specific airpot)" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Going To (city, distirct or specific airpot)" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="Departing On" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">anytime</option>
                                                            <option value="2">morning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="Arriving On" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="1">anytime</option>
                                                            <option value="2">morning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-3">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Adults</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Kids</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="text" class="input-text full-width" placeholder="Promo Code" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-3">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Infants</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                            <option value="4">04</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 pull-right">
                                                    <button class="full-width">SERACH NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured image-box">
            <div class="details pull-left">
                <h3>Tropical Beach,<br/>Hotel and Resorts</h3>
                <h5>THAILAND</h5>
            </div>
            <figure class="pull-left">
                <a class="badge-container" href="#">
                    <span class="badge-content right-side">From $200</span>
                    <img width="64" height="64" alt="" src="http://placehold.it/64x64" class="">
                </a>
            </figure>
        </div>
    </section>

    
    <section id="content" class="tour">

        
        <div class="section">
            <div class="container">

                <h2>Travelers Choice of Hotels</h2>
                <div class="block image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
                    <ul class="slides image-box listing-style2">
                        @foreach ($travelerchoices as $hotel)
                        <li>
                            <article class="box">
                                <figure>
                                    <a href="{{ route('hotelview',$hotel->id) }}" class="hover-effect "><img style="width: 270px; height:180px" alt="" src="{{ asset('/images/hotel/'.$hotel->gallery->first()->file_path )}}"></a>
                                    
                                </figure>
                                <div class="details">
                                    <a title="View all" href="{{ route('hotelview',$hotel->id) }}" class="pull-right button uppercase">select</a>
                                <h4 class="box-title">{{ $hotel->name }}</h4>
                                    <label class="price-wrapper">
                                        <span class="">{{ $hotel->country->name }}</span>   |   {{ $hotel->city }}
                                    </label>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="block row">
                    <h2>Hot Hotel Rooms</h2>
                    <div class="col-md-6">
                        <div class="tab-container style1 box">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" style=" height:200px; overflow: auto;">
                                    @foreach ($bestrooms as $room)
                                        <div class="row">
                                            
                                            <div class="col-xs-2">
                                                <img class="full-width"src="{{ asset('storage/'.$room->image)}}" alt="" style="width: 63px; height:63px" />
                                            </div>
                                            <div class="col-xs-8">
                                                <h5 class="box-title">{{ $room->name }}<small>{{ $room->hotel->name }}</small></h5>
                                                <p class="no-margin">{{ substr($room->description,0,30) }}</p>
                                            </div>
                                            <div class="col-xs-2">
                                                <span class="price"><small>per/night</small>${{ $room->amount }}</span>
                                                <br /><br />
                                                <a class="button green-bg pull-right" href="hotel-detailed.html">SELECT</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>

                        
                    <div class="col-md-6">
                        <div class="tab-container style1 box">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" style=" height:200px; overflow: auto;">
                                    @foreach ($bestrooms->reverse() as $room)
                                        <div class="row">
                                            <div class="col-xs-2">
                                                <img class="full-width"src="{{ asset('storage/'.$room->image)}}" alt="" style="width: 63px; height:63px" />
                                            </div>
                                            <div class="col-xs-8">
                                                <h5 class="box-title">{{ $room->name }}<small>{{ $room->hotel->name }}</small></h5>
                                                <p class="no-margin">{{ substr($room->description,0,30) }}</p>
                                            </div>
                                            <div class="col-xs-2">
                                                <span class="price"><small>per/night</small>${{ $room->amount }}</span>
                                                <br /><br />
                                                <a class="button green-bg pull-right" href="hotel-detailed.html">SELECT</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <h2>Recommended Hotels</h2>
                <div class="tour-guide image-carousel style2 flexslider animated " data-animation="slide" data-item-width="270" data-item-margin="30" data-animation-type="fadeInUp" style="margin-bottom: 20px">
                    <ul class="slides image-box">
                        @foreach ($recommendeds as $hotel)
                            <li>
                                <article class="box">
                                    <a href="{{ route('hotelview',$hotel->id) }}" class="hover-effect"><img style="width: 270px; height:180px" alt="" src="{{ asset('/images/hotel/'.$hotel->gallery->first()->file_path )}}"></a>
                                    
                                    <div class="details">
                                        <h4 class="box-title" >{{ $hotel->name }}<small>{{ $hotel->duration }}</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">270 reviews</span>
                                        </div>
                                        <p class="description">{{ substr($hotel->description,0,150) }}</p>
                                        <div class="action">
                                            <a class="button btn-small full-width" href="#">BOOK NOW</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </section>

        <div class="global-map-area promo-box no-margin parallax img-fluid" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset('images/tours.jpg')}}'); background-repeat: no-repeat;
        background-size: cover;" >
            <div class="container">
                <div class="content-section description pull-right col-sm-12">
                    
                    <div class="table-wrapper hidden-table-sm">
                        <div class="table-cell">
                            <h2 class="m-title">
                                Comfortable and modern flight experience.<br /><em>400+ Airlines to Travel The World!</em>
                            </h2>
                        </div>
                        <div class="table-cell action-section col-md-4 no-float">
                            <form method="post" action="flight-list-view.html">
                                <div class="row">
                                    <div class="col-xs-6 col-md-12">
                                        <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                                    </div>
                                    <div class="col-xs-6 col-md-12">
                                        <button class="full-width btn-large">search flights</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section  class="tour">

        
            <div class="section">
                <div class="container">
    
                    <h2>Holiday Air Hotels</h2>
                    <div class="tour-guide image-carousel style2 flexslider animated " data-animation="slide" data-item-width="270" data-item-margin="30" data-animation-type="fadeInUp" style="margin-bottom: 20px">
                        <ul class="slides image-box">
                            @foreach ($recommendeds as $hotel)
                                <li>
                                    <article class="box">
                                        <a href="{{ route('hotelview',$hotel->id) }}" class="hover-effect"><img style="width: 270px; height:180px" alt="" src="{{ asset('/images/hotel/'.$hotel->gallery->first()->file_path )}}"></a>
                                        
                                        <div class="details">
                                            <h4 class="box-title" >{{ $hotel->name }}<small>{{ $hotel->duration }}</small></h4>
                                            <div class="feedback">
                                                <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                                <span class="review">270 reviews</span>
                                            </div>
                                            <p class="description">{{ substr($hotel->description,0,150) }}</p>
                                            <div class="action">
                                                <a class="button btn-small full-width" href="#">BOOK NOW</a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
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
        


