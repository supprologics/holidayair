@extends('layouts.site')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/components/flexslider/flexslider.css') }}" media="screen" />
@endsection

@section('content')
    <section id="content">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sm-8 col-md-9">
                    <div class="page">
                        <div class="post-content">
                            <div class="blog-infinite">
                                
                                @foreach ($posts as $post)
                                    <div class="post">
                                        <div class="post-content-wrapper">
                                            <figure class="image-container">
                                                <a href="{{ route('blogview',$post->id)}}" class="hover-effect"><img src="{{ asset('/images/blog/'.$post->gallery->first()->file_path )}}" alt="" /></a>
                                            </figure>
                                            <div class="details">
                                                <h2 class="entry-title"><a href="{{ route('blogview',$post->id)}}">{{ $post->name }}</a></h2>
                                                <div class="excerpt-container">
                                                    <p>{{ $post->description_short }}</p>
                                                </div>
                                                <div class="post-meta">
                                                    <div class="entry-date">
                                                        <label class="date">{{ $post->created_at->format('d') }}</label>
                                                        <label class="month">{{ $post->created_at->format('M') }}</label>
                                                    </div>
                                                    <div class="entry-action">
                                                        <a href="#" class="button btn-small"><i class="soap-icon-wishlist"></i><span>{{ $post->blog_category->name }}</span></a>
                                                        <span class="entry-tags"><i class="soap-icon-features"></i><span>{{ $post->tags }}</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-sm-4 col-md-3">
                    <div class="travelo-box">
                        <h5 class="box-title">Search Stories</h5>
                        <div class="with-icon full-width">
                            <input type="text" class="input-text full-width" placeholder="story name or category">
                            <button class="icon green-bg white-color"><i class="soap-icon-search"></i></button>
                        </div>
                    </div>
                    <div class="travelo-box">
                        <h5 class="box-title">About HolidayAir</h5>
                        <p>Phasellus vehicula justo eget  sollicitudin eu tincidu ncurabitur ele sollicitu tincidu nulla curabitur magna ined and posuere lorem sollicitudin eu tin.</p>
                    </div>
                    <div class="tab-container box">
                        <ul class="tabs full-width">
                            <li><a data-toggle="tab" href="#recent-posts">Recent</a></li>
                            <li class="active"><a data-toggle="tab" href="#popular-posts">Popular</a></li>
                            <li><a data-toggle="tab" href="#new-posts">New</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="recent-posts" class="tab-pane fade">
                                
                            </div>
                            <div id="popular-posts" class="tab-pane fade in active">
                                <div class="image-box style14">
                                    <article class="box">
                                        <figure><a href="#" title=""><img width="63" height="59" src="http://placehold.it/63x59" alt=""></a></figure>
                                        <div class="details">
                                            <h5 class="box-title"><a href="#">Half-Day Island Tour</a></h5>
                                            <label class="price-wrapper"><span class="price-per-unit">$35</span>Family Package</label>
                                        </div>
                                    </article>
                                    <article class="box">
                                        <figure><a href="#" title=""><img width="63" height="59" src="http://placehold.it/63x59" alt=""></a></figure>
                                        <div class="details">
                                            <h5 class="box-title"><a href="#">Ocean Park Tour</a></h5>
                                            <label class="price-wrapper"><span class="price-per-unit">$26</span>Per Person</label>
                                        </div>
                                    </article>
                                    <article class="box">
                                        <figure><a href="#" title=""><img width="63" height="59" src="http://placehold.it/63x59" alt=""></a></figure>
                                        <div class="details">
                                            <h5 class="box-title"><a href="#">Dream World Trip</a></h5>
                                            <label class="price-wrapper"><span class="price-per-unit">$11</span>holiday offer</label>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div id="new-posts" class="tab-pane fade">
                                
                            </div>
                        </div>
                    </div>
                    <div class="travelo-box filters-container">
                        <h4 class="box-title">All Categories</h4>
                        <ul class="check-square categories-filter filters-option">
                            @foreach ($categories as $category)
                            <li class="active"><a href="#">{{ $category->name }}<small>({{ $category->posts->where('flag',1)->count() }})</small></a></li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="travelo-box book-with-us-box">
                        <h4 class="box-title">Need HolidayAir Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <ul >
                            <li class="address">
                                <i class="soap-icon-address circle"></i>
                                <h5 class="title">Address</h5><p>130, <br>High Street, <br> Barnet  EN5 5XQ.</p>
                            </li>
                            <li class="phone">
                                <i class="soap-icon-phone circle"></i>
                                <h5 class="title">Phone</h5><p>Office: <span class="contact-phone">+44 (0)208 4400770 </span>
                                <br>Whats App: <span class="contact-phone">+44 (0)7534433111</span></p>
                            </li>
                            <li class="email">
                                <i class="soap-icon-message circle"></i>
                                <h5 class="title">Email</h5><p><a href="mailto:info@holidayair.com" class="contact-email">info@holidayair.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- Fit Video -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.fitvids.min.js') }}"></script>

@endsection