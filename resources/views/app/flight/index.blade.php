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


    @include('partials.search')

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
        


