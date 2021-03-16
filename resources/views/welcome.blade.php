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
            @foreach ($categories as $category)
                @if ($category->tours->where('online','<>',0)->count() > 0)
                    
                <h2>{{ $category->name }}</h2>
                <div class="tour-guide image-carousel style2 flexslider animated " data-animation="slide" data-item-width="270" data-item-margin="30" data-animation-type="fadeInUp" style="margin-bottom: 20px">
                    <ul class="slides image-box">
                        @foreach ($category->tours->where('online','<>',0) as $tour)
                            <li>
                                <article class="box">
                                    @if (isset($tour->discount))
                                        <span class="discount"><span class="discount-text">{{ $tour->discount}}% Discount</span></span>
                                    @endif
                                    <a href="{{ route('tourview',$tour->id) }}" class="hover-effect"><img style="width: 270px; height:180px" alt="" src="{{ asset('/images/tours/'.$tour->gallery->first()->file_path )}}"></a>
                                    
                                    <div class="details">
                                        <span class="price">
                                            <small>price</small>
                                            @if ($tour->amount=='0.00')
                                                <span style="font-size: 60%">Please call<br> for prices</span> 
                                            @else
                                                ${{ $tour->amount }}
                                            @endif
                                        </span>
                                        <h4 class="box-title" >{{ $tour->name }}<small>{{ $tour->duration }}</small></h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                            <span class="review">270 reviews</span>
                                        </div>
                                        <p class="description">{{ substr($tour->description,0,150) }}</p>
                                        <div class="action">
                                            <a class="button btn-small full-width" href="{{ route('booking.tour',$tour->id) }}">BOOK NOW</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            @endforeach
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
@endsection

@section('script')
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="{{ asset('assets/components/revolution_slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="{{ asset('assets/components/jquery.bxslider/jquery.bxslider.min.js') }}"></script>
@endsection
        


