<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Tour;
use App\Category;
use App\Blog;
use App\BlogCategory;
use App\Deal;
use App\Ticket;
use App\Hotel;
use App\Room;
use App\Country;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('welcome')
        ->with('countries',Country::all())
        ->with('categories',Category::all())
        ->with('deals',Deal::all());
    }

    public function about(){
        return view('app.site.about');
    }

    public function contact(){
        return view('app.site.contact');
    }

    //tours
    public function tours(){
        return view('app.tours.index')
        ->with('countries',Country::all())
        ->with('categories',Category::all())
        ->with('deals',Deal::all());
    }

    public function tourview(Tour $tour){
        return view('app.tours.tour')->with('tour',$tour);
    }

    public function searchtour(Request $request){
        $data = Tour::where('online',2);

        if(!empty($request->country)){
            $data=$data->where('country_id',$request->country);
        }
        if(!empty($request->category)){
            $data=$data->where('category_id',$request->category);
        }
        if(!empty($request->duration)){
            $data=$data->where('duration',$request->duration);
        }
        if(!empty($request->min_price)){
            $data=$data;
        }
        if(!empty($request->review_value)){
            $data=$data;
        }

        $min =  $data->min('amount');
        $max =  $data->max('amount');
        $data=$data->get();

        if(!isset($request->fetch)){
            if (count ( $data ) > 0)
                return view('app.tours.search')
                ->with('results',$data)
                ->with('country',$request->country)
                ->with('category',$request->category)
                ->with('duration',$request->duration)
                ->with('min',$min)
                ->with('max',$max)
                ->with('countries',Country::all())
                ->with('categories',Category::all());
            else
                return view('app.tours.search')
                ->with('min','0')
                ->with('max','1000')
                ->with('countries',Country::all())
                ->with('categories',Category::all());    
        }
        else{
            
            if (count ( $data ) > 0){
                foreach ($data as $tour){
                    ?>
                    <article class="box">
                        <figure class="col-sm-5 col-md-4">
                            <a title="" href="{{ route('tourview',<?php echo $tour->id ?>) }}" class="hover-effect"><img width="270" height="160" alt="" src="{{ asset('/images/tours/'<?php echo $tour->gallery->first()->file_path ?>)}}"></a>
                        </figure>
                        <div class="details col-sm-7 col-md-8">
                            <div>
                                <div>
                                    <h4 class="box-title"><?php echo $tour->id ?><small><i class="soap-icon-departure yellow-color"></i><?php echo $tour->country->name ?></small></h4>
                                </div>
                                <div>
                                    <div class="five-stars-container">
                                        <span class="five-stars" style="width: 80%;"></span>
                                    </div>
                                    <span class="review">270 reviews</span>
                                </div>
                            </div>
                            <div>
                                <p><?php echo substr($tour->description,0,150); ?></p>
                                <div>
                                    <span class="price"><small>AVG/PP</small>$<?php echo $tour->amount ?></span>
                                    <a class="button btn-small full-width text-center" title="" href="{{ route('booking.tour',<?php echo $tour->id ?>) }}">BOOK</a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php }
            }


        }
    }


    //blog
    public function blog(){
        return view('app.blog.index')
        ->with('posts',Blog::all()
        ->where('flag',1))->with('categories',BlogCategory::all());
    }
    
    public function blogview(Blog $blog){
        return view('app.blog.blog')
        ->with('post',$blog)->with('categories',BlogCategory::all());
    }

    
    //flight
    public function flight(){
        return view('app.flight.index')->with('deals',Deal::all())
        ->with('countries',Country::all())
        ->with('categories',Category::all())
        ->with('deals',Deal::all())
        ->with('tickets1',Ticket::all()->where('flightticketscategory_id','1'))
        ->with('tickets2',Ticket::all()->where('flightticketscategory_id','2'))
        ->with('tickets3',Ticket::all()->where('flightticketscategory_id','3'));
    }
    
    public function flightview(Deal $deal){
        return view('app.flight.deal')->with('deal',$deal);
    }

    public function searchflight(Request $request){
        $data = Deal::all();
        
        if(!empty($request->deal)){
            $data=$data->where('name',$request->deal);
        }
        if(!empty($request->flight_type)){
            $data=$data->where('flight_type',$request->flight_type);
        }

        if(!isset($request->fetch)){
            if (count ( $data ) > 0)
                return view('app.flight.search')
                ->with('min','0')
                ->with('max','1000')
                ->with('results',$data)
                ->with('deals',Deal::all());
            else
                return view('app.flight.search')
                ->with('min','0')
                ->with('max','1000')
                ->with('deals',Deal::all());    
        }
        else{
            
            if (count ( $data ) > 0){
                foreach ($data as $tour){
                    ?>
                    <article class="box">
                        <figure class="col-sm-5 col-md-4">
                            <a title="" href="{{ route('tourview',<?php echo $tour->id ?>) }}" class="hover-effect"><img width="270" height="160" alt="" src="{{ asset('/images/tours/'<?php echo $tour->gallery->first()->file_path ?>)}}"></a>
                        </figure>
                        <div class="details col-sm-7 col-md-8">
                            <div>
                                <div>
                                    <h4 class="box-title"><?php echo $tour->id ?><small><i class="soap-icon-departure yellow-color"></i><?php echo $tour->country->name ?></small></h4>
                                </div>
                                <div>
                                    <div class="five-stars-container">
                                        <span class="five-stars" style="width: 80%;"></span>
                                    </div>
                                    <span class="review">270 reviews</span>
                                </div>
                            </div>
                            <div>
                                <p><?php echo substr($tour->description,0,150); ?></p>
                                <div>
                                    <span class="price"><small>AVG/PP</small>$<?php echo $tour->amount ?></span>
                                    <a class="button btn-small full-width text-center" title="" href="{{ route('booking.tour',<?php echo $tour->id ?>) }}">BOOK</a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php }
            }


        }
    }

    //hotel
    public function hotel(){
        return view('app.hotel.index')->with('hotels',Hotel::all()->where('flag','<>','0'))
        ->with('travelerchoices',Hotel::all()->where('flag','2'))
        ->with('recommendeds',Hotel::all()->where('flag','3'))
        ->with('bestrooms',Room::all()->where('flag','2'))
        ->with('countries',Country::all())
        ->with('categories',Category::all())
        ->with('deals',Deal::all());
    }
    
    public function hotelview(Hotel $hotel){
        return view('app.hotel.hotel')->with('hotel',$hotel);
    }

    public function searchhotel(Request $request){
        $data = Hotel::where('flag', '<>', 0);

        if(!empty($request->country)){
            $data=$data->where('country_id',$request->country);
        }
        if(!empty($request->category)){
            $data=$data->where('category_id',$request->category);
        }
        if(!empty($request->duration)){
            $data=$data->where('duration',$request->duration);
        }
        if(!empty($request->min_price)){
            $data=$data;
        }
        if(!empty($request->review_value)){
            $data=$data;
        }

        $data=$data->get();

        if(!isset($request->fetch)){
            if (count ( $data ) > 0)
                return view('app.hotel.search')
                ->with('min','0')
                ->with('max','1000')
                ->with('results',$data)
                ->with('countries',Country::all());
            else
                return view('app.hotel.search')
                ->with('min','0')
                ->with('max','1000')
                ->with('countries',Country::all());    
        }
        else{
            
            if (count ( $data ) > 0){
                foreach ($data as $tour){
                    ?>
                    <article class="box">
                        <figure class="col-sm-5 col-md-4">
                            <a title="" href="{{ route('tourview',<?php echo $tour->id ?>) }}" class="hover-effect"><img width="270" height="160" alt="" src="{{ asset('/images/tours/'<?php echo $tour->gallery->first()->file_path ?>)}}"></a>
                        </figure>
                        <div class="details col-sm-7 col-md-8">
                            <div>
                                <div>
                                    <h4 class="box-title"><?php echo $tour->id ?><small><i class="soap-icon-departure yellow-color"></i><?php echo $tour->country->name ?></small></h4>
                                </div>
                                <div>
                                    <div class="five-stars-container">
                                        <span class="five-stars" style="width: 80%;"></span>
                                    </div>
                                    <span class="review">270 reviews</span>
                                </div>
                            </div>
                            <div>
                                <p><?php echo substr($tour->description,0,150); ?></p>
                                <div>
                                    <span class="price"><small>AVG/PP</small>$<?php echo $tour->amount ?></span>
                                    <a class="button btn-small full-width text-center" title="" href="{{ route('booking.tour',<?php echo $tour->id ?>) }}">BOOK</a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php }
            }


        }
    }


}
