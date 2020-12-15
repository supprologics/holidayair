<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Amenitie;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.amenities.index')->with('amenities',Amenitie::all());
    }


    //using ajax addamenitie
    public function addamenitie(Request $request){

        $rules = array(
            'name' => 'required',
            'icon' => 'required',
          );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $amenitie=Amenitie::create([
                'name'=>$request->name,
                'icon'=>$request->icon,
            ]);
          return response()->json(['amenitie'=>$amenitie]);
        }

    }

    public function editamenitie(request $request){
        
        $amenitie = Amenitie::find ($request->id);
        $amenitie->name = $request->name;
        $amenitie->icon = $request->icon;
        $amenitie->save();
        return response()->json(['amenitie'=>$amenitie]);

    }
    
    public function deleteamenitie(request $request){
        $del_id=$request->id;
        $amenitie = Amenitie::find ($request->id)->delete();
        return response()->json(['amenitie'=>$del_id]);

    }

}
