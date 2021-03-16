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
            <h2 class="entry-title">Tour Search Results</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site')}} ">HOME</a></li>
            <li class="active">Tour Search Results</li>
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
                                <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                            </h4>
                            <div id="modify-search-panel" class="panel-collapse collapse">
                                <div class="panel-content">
                                    <form action="{{ route('search.tour')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="full-width" name="country" id="country">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="full-width" name="category" id="category">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Duration</label>
                                            <select class="full-width" name="duration" id="duration">
                                                <option value="">Select Duration</option>
                                                <option value="FullDay">FULLDAY</option>
                                                <option value="HalfDay">HALFDAY</option>
                                                <option value="Overnight">OVERNIGHT</option>
                                            </select>
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
                            @foreach ($results as $tour)
                                <article class="box">
                                    <figure class="col-sm-5 col-md-4">
                                        <a title="" href="{{ route('tourview',$tour->id) }}" class="hover-effect"><img width="270" height="160" alt="" src="{{ asset('/images/tours/'.$tour->gallery->first()->file_path )}}"></a>
                                    </figure>
                                    <div class="details col-sm-7 col-md-8">
                                        <div>
                                            <div>
                                                <h4 class="box-title">{{ $tour->name }}<small><i class="soap-icon-departure yellow-color"></i> {{ $tour->country->name }}</small></h4>
                                            </div>
                                            <div>
                                                <div class="five-stars-container">
                                                    <span class="five-stars" style="width: 80%;"></span>
                                                </div>
                                                <span class="review">270 reviews</span>
                                            </div>
                                        </div>
                                        <div>
                                            <p>{{ substr($tour->description,0,150) }}</p>
                                            <div>
                                                <span class="price"><small>AVG/PP</small>
                                                    @if ($tour->amount=='0.00')
                                                        <span style="font-size: 60%">Please call for prices</span> 
                                                    @else
                                                        ${{ $tour->amount }}
                                                    @endif
                                                </span>
                                                <a class="button btn-small full-width text-center" title="" href="{{ route('booking.tour',$tour->id) }}">BOOK</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <h4>No Tours yet in your search !</h4>
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
        


