<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Amenitie;
use App\HotelHasAmenitie;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class HotelAmenitiesController extends Controller
{
    public function index(Hotel $hotel)
    {
        return view('admin.hotelamenities.index')->with('hotel',$hotel)->with('amenities',HotelHasAmenitie::all()->where('hotel_id',$hotel->id))
        ->with('allamenities',Amenitie::all());
    }

    //using ajax addamenitie
    public function addhotelamenitie(Request $request){

        $rules = array(
            'amenitie_new' => 'required',
            'hotel_id' => 'required',
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

        else {
            $amenitie=HotelHasAmenitie::create([
                'amenitie_id'=>$request->amenitie_new,
                'hotel_id'=>$request->hotel_id,
            ]);
            
            $amenitie=Amenitie::find($request->amenitie_new)->first();
            return response()->json(['amenitie'=>$amenitie]);
        }

    }

    public function deletehotelamenitie(request $request){
        $del_id=$request->id;
        $amenitie = HotelHasAmenitie::find ($request->id)->delete();
        return response()->json(['amenitie'=>$del_id]);

    }

}