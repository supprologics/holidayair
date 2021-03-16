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
            <h2 class="entry-title">Flight Search Results</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site')}} ">HOME</a></li>
            <li class="active">Flight Search Results</li>
        </ul>
    </div>
</div>
<section id="content">
    <div class="container">
        <div id="main">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <h4 class="search-results-title"><i class="soap-icon-search"></i><b>1,984</b> results found.</h4>
                    <div class="toggle-container filters-container">
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                            </h4>
                            <div id="price-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <div id="price-range"></div>
                                    <br />
                                    <span class="min-price-label pull-left"></span>
                                    <span class="max-price-label pull-right"></span>
                                    <div class="clearer"></div>
                                </div><!-- end content -->
                            </div>
                        </div>
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#flight-times-filter" class="collapsed">Flight Times</a>
                            </h4>
                            <div id="flight-times-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <div id="flight-times" class="slider-color-yellow"></div>
                                    <br />
                                    <span class="start-time-label pull-left"></span>
                                    <span class="end-time-label pull-right"></span>
                                    <div class="clearer"></div>
                                </div><!-- end content -->
                            </div>
                        </div>
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#flight-stops-filter" class="collapsed">Flight Stops</a>
                            </h4>
                            <div id="flight-stops-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <ul class="check-square filters-option">
                                        <li><a href="#">1 Stop</a></li>
                                        <li><a href="#">2 Stops</a></li>
                                        <li class="active"><a href="#">3 Stops</a></li>
                                        <li><a href="#">MultiStops</a></li>
                                    </ul>
                                    <a class="button btn-mini">MORE</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#airlines-filter" class="collapsed">Airlines</a>
                            </h4>
                            <div id="airlines-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <ul class="check-square filters-option">
                                        <li><a href="#">Major Airline<small>($620)</small></a></li>
                                        <li><a href="#">United Airlines<small>($982)</small></a></li>
                                        <li class="active"><a href="#">delta airlines<small>($1,127)</small></a></li>
                                        <li><a href="#">Alitalia<small>($2,322)</small></a></li>
                                        <li><a href="#">US airways<small>($3,158)</small></a></li>
                                        <li><a href="#">Air France<small>($4,239)</small></a></li>
                                        <li><a href="#">Air tahiti nui<small>($5,872)</small></a></li>
                                    </ul>
                                    <a class="button btn-mini">MORE</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#flight-type-filter" class="collapsed">Flight Type</a>
                            </h4>
                            <div id="flight-type-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <ul class="check-square filters-option">
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">First class</a></li>
                                        <li class="active"><a href="#">Economy</a></li>
                                        <li><a href="#">Premium Economy</a></li>
                                    </ul>
                                    <a class="button btn-mini">MORE</a>
                                </div>
                            </div>
                        </div>

                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#inflight-experience-filter" class="collapsed">Inflight Experience</a>
                            </h4>
                            <div id="inflight-experience-filter" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <ul class="check-square filters-option">
                                        <li><a href="#">Inflight Dining</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li class="active"><a href="#">Sky Shopping</a></li>
                                        <li><a href="#">Wi-fi</a></li>
                                        <li><a href="#">Seats &amp; Cabin</a></li>
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
                                    <form action="{{ route('search.flight')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Select Deal</label>
                                            <div class="selector">
                                                <select class="full-width" name="deal" id="deal">
                                                    <option value="">Select deal</option>
                                                    @foreach ($deals as $deal)
                                                        <option value="{{ $deal->name }}">{{$deal->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Arriving On</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" name="date_to" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Flight Type</label>
                                            <div class="selector">
                                                <select class="full-width" name="flight_type">
                                                    <option value="One Way">One Way</option>
                                                    <option value="Return">Return</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Adults</label>
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kids</label>
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
                                                <div class="col-md-6">
                                                    <label>Infants</label>
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
                                            </div>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn-medium icon-check uppercase full-width">search again</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <div class="sort-by-section clearfix box">
                        <h4 class="sort-by-title block-sm">Sort results by:</h4>
                        <ul class="sort-bar clearfix block-sm">
                            <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                            <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                            <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>duration</span></a></li>
                        </ul>
                        
                    </div>
                    <div class="flight-list listing-style3 flight">
                        @if (isset($results))
                            @foreach ($results as $deal)
                                <article class="box">
                                    <figure class="col-xs-3 col-sm-2">
                                        <img alt="" src="{{ asset('/images/deal/'.$deal->gallery->first()->file_path )}}" style="height:100%; width: 100%; ">
                                    </figure>
                                    <div class="details col-xs-9 col-sm-10">
                                        <div class="details-wrapper">
                                            <div class="first-row">
                                                <div>
                                                    <h4 class="box-title">{{ $deal->name }}<small>{{ $deal->flight_type }}</small></h4>
                                                    <a class="button btn-mini stop">{{$deal->flightplans->count()-1}} STOP</a>
                                                </div>
                                                <div>
                                                    <span class="price"><small>AVG/PERSON</small>${{ $deal->amount }}</span>
                                                </div>
                                            </div>
                                            @foreach ($deal->flightplans as $flightplan)
                                                @if($loop->first)
                                                    @php
                                                       $takeoff= $flightplan->takeoff_airport;
                                                    @endphp
                                                @endif
                                                @if($loop->last)
                                                    @php
                                                    $landing= $flightplan->landing_airport;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            
                                            <div class="second-row ">
                                                <div class="time row">
                                                    
                                                    <div class="take-off col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Take off </span><br />{{ $takeoff}}
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">landing</span><br />{{$landing}}
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-4">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">total time</span><br />10Hour 20minutes
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a href="{{ route('flightview',$deal->id) }}" class="button btn-small full-width">SELECT NOW</a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <h4>No Tours yet in your search !</h4>
                        @endif
                    </div>
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
        


