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
            <h2 class="entry-title">Hotel Search Results</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site')}} ">HOME</a></li>
            <li class="active">Hotel Search Results</li>
        </ul>
    </div>
</div>
<section id="content">
    <div class="container">
        <div id="main">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <h4 class="search-results-title"><i class="soap-icon-search"></i><b>{{ isset($results)?$results->count():'0' }}</b> results found.</h4>
                    <div class="toggle-container filters-container">
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                            </h4>
                            <div id="price-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <div id="price-range"></div>
                                    <input type="hidden"  id="min_price" value="{{ $min }}">
                                    <input type="hidden"  id="max_price" value="{{ $max }}">
                                    <br />
                                    <span class="min-price-label pull-left"></span>
                                    <span class="max-price-label pull-right"></span>
                                    <div class="clearer"></div>
                                </div><!-- end content -->
                            </div>
                        </div>
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                            </h4>
                            <div id="rating-filter" class="panel-collapse collapse filters-container">
                                <div class="panel-content">
                                    <div id="rating" class="five-stars-container editable-rating"></div>
                                    <input type="hidden" id="review_value" value="5">
                                    <br />
                                    <small>2458 REVIEWS</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                            </h4>
                            <div id="accomodation-type-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <ul class="check-square filters-option">
                                        <li><a href="#">All<small>(722)</small></a></li>
                                        <li><a href="#">Hotel<small>(982)</small></a></li>
                                        <li><a href="#">Resort<small>(127)</small></a></li>
                                        <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                        <li><a href="#">Condo<small>(158)</small></a></li>
                                        <li><a href="#">Residence<small>(439)</small></a></li>
                                        <li><a href="#">Guest House<small>(52)</small></a></li>
                                    </ul>
                                    <a class="button btn-mini">MORE</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                            </h4>
                            <div id="amenities-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <ul class="check-square filters-option">
                                        <li><a href="#">Bathroom<small>(722)</small></a></li>
                                        <li><a href="#">Cable tv<small>(982)</small></a></li>
                                        <li class="active"><a href="#">air conditioning<small>(127)</small></a></li>
                                        <li class="active"><a href="#">mini bar<small>(222)</small></a></li>
                                        <li><a href="#">wi - fi<small>(158)</small></a></li>
                                        <li><a href="#">pets allowed<small>(439)</small></a></li>
                                        <li><a href="#">room service<small>(52)</small></a></li>
                                    </ul>
                                    <a class="button btn-mini">MORE</a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                            </h4>
                            <div id="modify-search-panel" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <form action="{{ route('search.hotel')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Country</label>
                                            <div class="selector">
                                                <select class="full-width" name="country" id="country">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>check in</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" name="date_from" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>check out</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Rooms</label>
                                            <div class="selector">
                                                <select class="full-width"  name="rooms_count" id="rooms_count">
                                                    <option value="1">1 Room</option>
                                                    <option value="2">2 Rooms</option>
                                                    <option value="3">3 Rooms</option>
                                                    <option value="4">4 Rooms</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Guests</label>
                                            <div class="selector">
                                                <select class="full-width" name="room_capacity" id="room_capacity">
                                                    <option value="1">1 Guest</option>
                                                    <option value="2">2 Guests</option>
                                                    <option value="3">3 Guests</option>
                                                    <option value="4">4 Guests</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br />
                                        <button class="btn-medium icon-check uppercase full-width">search again</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <div class="sort-by-section clearfix">
                        <h4 class="sort-by-title block-sm">Sort results by:</h4>
                        <ul class="sort-bar clearfix block-sm">
                            <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                            <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                            <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
                            <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
                        </ul>
                        
                    </div>
                    <div class="hotel-list listing-style3 hotel fetch-results">
                        @if (isset($results))
                            @foreach ($results as $hotel)
                                <div class="col-sms-6 col-sm-6 col-md-4">
                                    <article class="box" >
                                        <figure>
                                            <a href="{{ route('hotelview',$hotel->id) }}" title="" class="hover-effect "><img src="{{ asset('/images/hotel/'.$hotel->gallery->first()->file_path )}}" alt="" style="width: 270px; height:160px"  /></a>
                                        </figure>
                                        <div class="details">
                                                <h6 class="box-title uppercase">{!! $hotel->name !!}</h6>
                                                <label class="price-wrapper">
                                                    <div class="pull-left">
                                                        <span class="price-per-unit">${!! $hotel->rooms->min('amount') !!}</span>avg/night
                                                    </div>
                                                </label>  
                                        </div>
                                    </article>
                                </div>

                            @endforeach
                        @else
                            <h4>No hotels yet in your search !</h4>
                        @endif
                    </div>
                    <div class="loader"></div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
    <style>
        #loading
        {
            text-align:center; 
            background: url('loader.gif') no-repeat center; 
            height: 150px;
        }
    </style>
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="{{ asset('assets/components/revolution_slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="{{ asset('assets/components/jquery.bxslider/jquery.bxslider.min.js') }}"></script>

    <script type="text/javascript">
        var country='1';
        var category="2";
        var duration='';
        var min={!! $min !!};
        var max={!! $max !!};
        
        tjq(document).ready(function() {
            tjq("#price-range").slider({
                range: true,
                min: min,
                max: max,
                values: [ min, max ],
                slide: function( event, ui ) {
                    tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                    tjq(".max-price-label").html( "$" + ui.values[ 1 ]);

                },
                stop:function(event, ui)
                {
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                }
            });
            tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));
            
            tjq("#rating").slider({
                range: "min",
                value: 5,
                min: 0,
                max: 5,
                slide: function( event, ui ) {
                    
                    $('#review_value').val(ui.value);
                }
            });
        });

    function filter_data()
    {
        $('.fetch-results').hide();
        $('.loader').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var min_price = $('#min_price').val();
        var max_price = $('#max_price').val();
        var review_value = $('#review_value').val();
        $.ajax({
            url:"{{ route('search.tour')}}",
            method:"POST",
            data:{
                fetch:'fetch_data',
                country:country,
                category:category, 
                duration:duration, 
                min_price:min_price, 
                max_price:max_price, 
                review_value:review_value
            },
            success:function(data){
                    $(".fetch-results").empty();
                    $(".loader").remove();
                    $ (".fetch-results").append (data).fadeIn (2000);
            }
        });
    }
    </script>
@endsection
        


