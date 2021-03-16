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
            </ul>
        </div>
    </div>
    <div class="container" >
        <div id="main">
            <h1 class="page-title">Fly with us in Comfort!</h1>
            <h2 class="page-description col-md-6 no-float no-padding">We're bringing you a modern, comfortable and connected flight experience.</h2>
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
                            <li ><a href="#advanced-search-tab">Advanced Search</a></li>
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
                            <form action="{{ route('search.hotel')}}" method="post">
                                {{ csrf_field() }}
                                <h4 class="title">Where do you want to go?</h4>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-3">
                                        <div class="selector">
                                            <select class="full-width" name="country" id="country">
                                                <option value="">Select country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                                    <select class="full-width"  name="rooms_count" id="rooms_count">
                                                        <option value="1">1 Room</option>
                                                        <option value="2">2 Rooms</option>
                                                        <option value="3">3 Rooms</option>
                                                        <option value="4">4 Rooms</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="selector">
                                                    <select class="full-width" name="room_capacity" id="room_capacity">
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
                            <form action="{{ route('search.flight')}}" method="post">
                                {{ csrf_field() }}
                                <h4 class="title">Where do you want to go?</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="selector">
                                                <select class="full-width" name="deal" id="deal">
                                                    <option value="">Select deal</option>
                                                    @foreach ($deals as $deal)
                                                        <option value="{{ $deal->name }}">{{$deal->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                                    <select class="full-width" name="flight_type">
                                                        <option value="One Way">One Way</option>
                                                        <option value="Return">Return</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5">
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
                                            <div class="col-xs-3">
                                                <button type="submit" class="full-width">SERACH NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="advanced-search-tab[REMOVE]">
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