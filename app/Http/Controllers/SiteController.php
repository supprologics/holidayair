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

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('welcome')
        ->with('countries',Country::all())
        ->with('categories',Category::all());
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
        ->with('categories',Category::all());
    }

    public function tourview(Tour $tour){
        return view('app.tours.tour')->with('tour',$tour);
    }

    public function searchtour(Request $request){
        if(empty($request->country)){
            $searchcountry=0;
            $samecountry=0;
        }else{
            $searchcountry=Country::find($request->country);
            $samecountry=Tour::where('country_id',$request->country)->get();
        }
        if(empty($request->category)){
            $searchcategory=0;
            $samecategory=0;
        }else{
            $searchcategory=Category::find($request->category);
            $samecategory=Tour::where('category_id',$request->category)->get();
        }
        $data = Tour::orWhere('country_id',$request->country)
        ->orWhere('category_id',$request->category)
        ->orWhere('duration',$request->duration)->get();
        if (count ( $data ) > 0)
            return view('app.tours.search')
            ->with('results',$data)
            ->with('samecategory',$samecategory)
            ->with('samecountry',$samecountry)
            ->with('searchcategory',$searchcategory)
            ->with('searchcountry',$searchcountry)
            ->with('countries',Country::all())
            ->with('categories',Category::all());
        else
            return view('app.tours.search')
            ->with('resultempty',1)
            ->with('samecategory',$samecategory)
            ->with('samecountry',$samecountry)
            ->with('searchcategory',$searchcategory)
            ->with('searchcountry',$searchcountry)
            ->with('countries',Country::all())
            ->with('categories',Category::all())
            ->withMessage ( 'No Tours yet in your search !' );    
        
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
        ->with('tickets1',Ticket::all()->where('flightticketscategory_id','1'))
        ->with('tickets2',Ticket::all()->where('flightticketscategory_id','2'))
        ->with('tickets3',Ticket::all()->where('flightticketscategory_id','3'));
    }
    
    public function flightview(Deal $deal){
        return view('app.flight.deal')->with('deal',$deal);
    }

    //hotel
    public function hotel(){
        return view('app.hotel.index')->with('hotels',Hotel::all()->where('flag','<>','0'))
        ->with('travelerchoices',Hotel::all()->where('flag','2'))
        ->with('recommendeds',Hotel::all()->where('flag','3'))
        ->with('bestrooms',Room::all()->where('flag','2'))
        ->with('countries',Country::all())
        ->with('categories',Category::all());
    }
    
    public function hotelview(Hotel $hotel){
        return view('app.hotel.hotel')->with('hotel',$hotel);
    }


}
