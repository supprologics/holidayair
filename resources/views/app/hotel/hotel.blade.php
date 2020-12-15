@extends('layouts.site')

@section('css')
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/revolution_slider/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/flexslider/flexslider.css') }}" media="screen" />
    
@endsection

@section('content')
    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">{{ $hotel->name}}</h2>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="container">
            <div class="row">
                <div id="main" class="col-md-9">
                    <div class="tab-container style1" id="hotel-main-content">
                        <ul class="tabs">
                            <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
                            <li><a data-toggle="tab" href="#map-tab">map</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="photos-tab" class="tab-pane fade in active">
                                <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                    <ul class="slides">
                                        
                                        @foreach ($hotel->gallery as $image)
                                            <li><img src="{{ asset('images/hotel/'.$image->file_path) }}" alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                    <ul class="slides">
                                        @foreach ($hotel->gallery as $image)
                                            <li><img src="{{ asset('images/hotel/'.$image->file_path) }}" alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div id="map-tab" class="tab-pane fade">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div id="hotel-features" class="tab-container">
                        <ul class="tabs">
                            <li class="active"><a href="#hotel-description" data-toggle="tab">Description</a></li>
                            <li><a href="#hotel-amenities" data-toggle="tab">Amenities</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="hotel-description">
                                <div class="intro table-wrapper full-width hidden-table-sms">
                                    <div class="col-sm-5 col-lg-4 features table-cell">
                                        <ul>
                                            <li><label>hotel type:</label>{{ $hotel->hotelcategory->name }}</li>
                                            <li><label>Minimum Stay:</label>{{ $hotel->minstay }} nights</li>
                                            <li><label>Country:</label>{{ $hotel->country->name }}</li>
                                            <li><label>City:</label>{{ $hotel->city }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="long-description">
                                    <h2>About {{ $hotel->name}}</h2>
                                    <p>
                                        {{ $hotel->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hotel-amenities">
                                <h2>Amenities in {{ $hotel->name}}</h2>
                                
                                <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
                                <ul class="amenities clearfix style1">
                                    @foreach ($hotel->amenities as $item)
                                    <li class="col-md-4 col-sm-6">
                                        <div class="icon-box style1">{!! $item->icon !!}{{ $item->name}}</div>
                                    </li>
                                    @endforeach
                                </ul>
                                <br />
           
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="sidebar col-md-3">
                    <div class="travelo-box contact-box">
                        <h4>Need Travelo Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                            <br>
                            <a class="contact-email" href="#">help@travelo.com</a>
                        </address>
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