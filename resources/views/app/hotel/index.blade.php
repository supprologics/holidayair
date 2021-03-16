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

    @include('partials.search')

    
    <section id="content" class="tour">

        
        <div class="section">
            <div class="container">

                <h2>Travelers Choice of Hotels</h2>
                <div class="block image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
                    <ul class="slides image-box listing-style2">
                        @foreach ($travelerchoices->reverse() as $hotel)
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
                        @foreach ($recommendeds->reverse() as $hotel)
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
                            @foreach ($recommendeds->reverse() as $hotel)
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
        


