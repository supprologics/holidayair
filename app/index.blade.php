@extends('layouts.site')

@section('css')
    <!-- Current Page Styles -->
    
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
                            <li class="active"><a href="#hotels-tab" data-toggle="tab"><i class="soap-icon-hotel"></i><span>TOURS</span></a></li>
                            <li><a href="#flights-tab" data-toggle="tab"><i class="soap-icon-plane-right takeoff-effect"></i><span>FLIGHTS</span></a></li>
                            <li><a href="#flight-and-hotel-tab" data-toggle="tab"><i class="soap-icon-flight-hotel"></i><span>FLIGHT &amp; HOTELS</span></a></li>
                            <li class="advanced-search visible-lg"><a href="#advanced-search-tab" data-toggle="tab"><span>PLAN YOUR TRIP</span></a></li>
                        </ul>
                        <div class="visible-mobile">
                            <ul id="mobile-search-tabs" class="search-tabs clearfix">
                                <li class="active"><a href="#hotels-tab">TOURS</a></li>
                                <li><a href="#flights-tab">FLIGHTS</a></li>
                                <li><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>
                                <li><a href="#advanced-search-tab">PLAN YOUR TRIP</a></li>
                            </ul>
                        </div>
                        
                        <div class="search-tab-content">
                            <div class="tab-pane fade active in" id="hotels-tab">
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
                            <div class="tab-pane fade" id="flight-and-hotel-tab">
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
                            <div class="tab-pane fade" id="cars-tab">
                                <form action="car-list-view.html" method="post">
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Pick Up (city, distirct or specific airpot)" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Drop Off (city, distirct or specific airpot)" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <div class="datepicker-wrap">
                                                            <input type="text" name="date_from" class="input-text full-width" placeholder="Pick-Up Date / Time" />
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
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <div class="datepicker-wrap">
                                                            <input type="text" name="date_to" class="input-text full-width" placeholder="Drop-Off Date / Time" />
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
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">select a car type</option>
                                                            <option value="economy">Economy</option>
                                                            <option value="compact">Compact</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <button class="full-width">SERACH NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="cruises-tab">
                                <form action="cruise-list-view.html" method="post">
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="enter a destination or hotel name" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="Departure Date" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">select cruise length</option>
                                                            <option value="1">1-2 Nights</option>
                                                            <option value="2">3-4 Nights</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">select cruise line</option>
                                                            <option>Azamara Club Cruises</option>
                                                            <option>Carnival Cruise Lines</option>
                                                            <option>Celebrity Cruises</option>
                                                            <option>Costa Cruise Lines</option>
                                                            <option>Cruise &amp; Maritime Voyages</option>
                                                            <option>Crystal Cruises</option>
                                                            <option>Cunard Line Ltd.</option>
                                                            <option>Disney Cruise Line</option>
                                                            <option>Holland America Line</option>
                                                            <option>Hurtigruten Cruise Line</option>
                                                            <option>MSC Cruises</option>
                                                            <option>Norwegian Cruise Line</option>
                                                            <option>Oceania Cruises</option>
                                                            <option>Orion Expedition Cruises</option>
                                                            <option>P&amp;O Cruises</option>
                                                            <option>Paul Gauguin Cruises</option>
                                                            <option>Peter Deilmann Cruises</option>
                                                            <option>Princess Cruises</option>
                                                            <option>Regent Seven Seas Cruises</option>
                                                            <option>Royal Caribbean International</option>
                                                            <option>Seabourn Cruise Line</option>
                                                            <option>Silversea Cruises</option>
                                                            <option>Star Clippers</option>
                                                            <option>Swan Hellenic Cruises</option>
                                                            <option>Thomson Cruises</option>
                                                            <option>Viking River Cruises</option>
                                                            <option>Windstar Cruises</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <button class="full-width">SEARCH NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="flight-status-tab">
                                <form action="flight-list-view.html" method="post">
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <input type="text" class="input-text full-width" placeholder="Leaving From (enter a city or place name)" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="text" class="input-text full-width" placeholder="Going To (enter a city or place name)" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-6 col-md-2">
                                            <div class="form-group">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="Departure Date" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-6 col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="Flight Number" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="full-width">SEARCH NOW</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="online-checkin-tab">
                                <form>
                                    <h4 class="title">Where do you want to go?</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <input type="text" class="input-text full-width" placeholder="Leaving From (enter a city or place name)" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="text" class="input-text full-width" placeholder="Going To (enter a city or place name)" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-6 col-md-2">
                                            <div class="form-group">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width" placeholder="Departure Date" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-6 col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="input-text full-width" placeholder="enter your full name" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="full-width">SEARCH NOW</button>
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

    <section id="content">
        <div class="section">
            <div class="container" >


                <h2>Featured Flight Deals</h2>
                <div class="image-carousel style11 block" data-animation="slide" data-item-width="270" data-item-margin="30">
                    <ul class="slides image-box listing-style11 flight">
                        <div class="image-box style11 block">
                            <div class="row">
                                @foreach ($deals as $deal)
                                    <li>
                                        <div class="col-sm-4">
                                        <article class="box">
                                            <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.9">
                                                <a title="" href="{{ route('flightview',$deal->id)}}"><img alt="" src="{{ asset('/images/deal/'.$deal->gallery->first()->file_path )}}" style="height:200px;"></a>
                                                <figcaption>
                                                    <h3 class="caption-title">{{ $deal->country->name}}</h3>
                                                    <span>{{ $deal->airline->name}}</span>
                                                </figcaption>
                                            </figure>
                                            <div class="details">
                                                <span class="price">
                                                    <small>From</small>${{ $deal->amount}}
                                                </span>
                                                <div class="icon-box style11">
                                                    <div class="icon-wrapper">
                                                        <i class="soap-icon-plane-right takeoff-effect circle"></i>
                                                    </div>
                                                    <div class="details">
                                                        <h4 class="box-title">{{ $deal->name}}<small>{{ $deal->flight_type}} flight</small></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </div>
                
                <h2>First Class Air Tickets</h2>
                <div class="image-carousel style2 block" data-animation="slide" data-item-width="220" data-item-margin="10">
                    <ul class="slides image-box listing-style2 flight">
                        @foreach ($tickets1 as $ticket)
                            <li>
                                <article class="box">
                                    <figure>
                                        <span><img src="{{  asset('storage/'.$ticket->airline->logo)}}" alt="" style="width:250px; height:180px" /></span>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="flight-detailed.html" class="pull-right button btn-mini uppercase">select</a>
                                        <h4 class="box-title">{{ $ticket->name}}</h4>
                                        <h5 class="box-title">{{ $ticket->airline->name}}</h5>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">${{ $ticket->amount}}</span>{{ $ticket->flight_type}}
                                        </label>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            

                <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset('images/flight.jpg')}}'); " >
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

                
            <div class="container " style="margin-top: 100px">
                <div class="row ">
                    <div class="col-md-4">
                        <h2>Business Class Air Tickets</h2>
                        <div class="flight-routes image-box style13 block" style="
                        height: 400px;
                        overflow: auto;">
                            
                            @foreach ($tickets2 as $ticket)
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="{{  asset('storage/'.$ticket->airline->logo)}}" style="width:40px; height:30px" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <label class="price-wrapper"><span class="price-per-unit">${{ $ticket->amount}}</span>{{ $ticket->flight_type}} Flight</label>
                                        <a href="flight-booking.html" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">{{ $ticket->name}}</h5>
                                        <h6 class="box-title">{{ $ticket->airline->name}}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2>Economy Class Air Tickets</h2>
                        <div class="flight-routes image-box style13 block" style="
                        height: 400px;
                        overflow: auto;">
                            
                            @foreach ($tickets3 as $ticket)
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="{{  asset('storage/'.$ticket->airline->logo)}}" style="width:40px; height:30px" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <label class="price-wrapper"><span class="price-per-unit">${{ $ticket->amount}}</span>{{ $ticket->flight_type}} Flight</label>
                                        <a href="flight-booking.html" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">{{ $ticket->name}}</h5>
                                        <h6 class="box-title">{{ $ticket->airline->name}}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                        <h2>Get Travel Insurance</h2>
                        <div class="icon-box style7 border-bottom">
                            <i class="soap-icon-user yellow-bg"></i>
                            <div class="description">
                                <h4 class="box-title"><a href="#">Single Trip Plans</a></h4>
                                <ul class="circle">
                                    <li>Trip Protector</li>
                                    <li>Rental Car Damage Protector</li>
                                </ul>
                                <a class="view" href="#">View Single Trip Plan Options »</a>
                            </div>
                        </div>
                        <div class="icon-box style7">
                            <i class="soap-icon-friends yellow-bg"></i>
                            <div class="description">
                                <h4 class="box-title"><a href="#">Multi-Trip (Annual) Plans</a></h4>
                                <ul class="circle">
                                    <li>Best value for frequent travelers</li>
                                    <li>Coverage for non-award</li>
                                </ul>
                                <a class="view" href="#">View Annual Trip Plan Options »</a>
                            </div>
                        </div>
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
        


