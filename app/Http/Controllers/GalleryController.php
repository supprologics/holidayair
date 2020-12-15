<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Gallery;
use App\Deal;
use App\FlightDealGallery;
use App\Blog;
use App\BlogGallery;
use App\Room;
use App\Hotel;
use App\HotelGallery;

class GalleryController extends Controller
{

    public function galleryview(Tour $tour)
    {
        return view('admin.gallery.index')->with('tour',$tour)->with('gallery',Gallery::all()->where('tour_id',$tour->id));
    }

    public function dealgalleryview(Deal $deal)
    {
        return view('admin.deals.gallery')->with('deal',$deal)->with('gallery',FlightDealGallery::all()->where('deal_id',$deal->id));
    }

    public function bloggalleryview(Blog $blog)
    {
        return view('admin.blogs.gallery')->with('blog',$blog)->with('gallery',BlogGallery::all()->where('blog_id',$blog->id));
    }

    public function hotelgalleryview(Hotel $hotel)
    {
        return view('admin.hotels.gallery')->with('hotel',$hotel)->with('gallery',HotelGallery::all()->where('hotel_id',$hotel->id));
    }

    function upload(Request $request)
    {
        
        $image = $request->file('file');
        $imageName = uniqid().time() . '.' . $image->extension();
        $image->move(public_path('images/'.$request->type), $imageName);
        
        if($request->type=='deal'){
            FlightDealGallery::create([
                'file_path'=>$imageName,
                'deal_id'=>$request->id_type,
            ]);
        }
        if($request->type=='tours'){
            Gallery::create([
                'file_path'=>$imageName,
                'tour_id'=>$request->id_type,
            ]);
        }
        if($request->type=='blog'){
            BlogGallery::create([
                'file_path'=>$imageName,
                'blog_id'=>$request->id_type,
            ]);
        }
        if($request->type=='hotel'){
            HotelGallery::create([
                'file_path'=>$imageName,
                'hotel_id'=>$request->id_type,
            ]);
        }
        return response()->json(['success' => $imageName]);
    }

    function fetch(Request $request)
    {
        if($request->type=='deal'){
            $gallery=FlightDealGallery::all()->where('deal_id',$request->id_type);
        }
        if($request->type=='tours'){
            $gallery=Gallery::all()->where('tour_id',$request->id_type);
        }
        if($request->type=='blog'){
            $gallery=BlogGallery::all()->where('blog_id',$request->id_type);
        }
        if($request->type=='hotel'){
            $gallery=HotelGallery::all()->where('hotel_id',$request->id_type);
        }

        $output = '<div class="row">';
        foreach($gallery as $image)
            {
            $output .= '
            <div class="col-md-3">
                <div class="card mb-4" >
                    <div class="view overlay">
                    <img class="card-img-top" src="'.asset('images/'.$request->type.'/' . $image->file_path).'"
                    alt="Card image cap" style="width:400px; height:250px">
                    <div class="mask rgba-white-slight "></div>
                    </div>
                
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm remove_image float-right" id="'.$image->file_path.'"><em class="icon ni ni-trash"></em></button>
                    </div>
                </div>
            </div>
            ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
            $del_id=$request->name;
            if($request->get('name'))
            {
            if($request->type=='deal'){
                FlightDealGallery::where('file_path', $del_id)->delete();
            }
            if($request->type=='tours'){
                Gallery::where('file_path', $del_id)->delete();
            }
            if($request->type=='blog'){
                BlogGallery::where('file_path', $del_id)->delete();
            }
            if($request->type=='hotel'){
                HotelGallery::where('file_path', $del_id)->delete();
            }
            \File::delete(public_path('images/'.$request->type.'/' . $request->get('name')));
        }
    }

    
}


