<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Route;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class RoutesController extends Controller
{
    public function index(Tour $tour)
    {
        return view('admin.routes.index')->with('tour',$tour)->with('areas',Route::all()->where('tour_id',$tour->id));
    }

    public function addroute(Request $request){

        $rules = array(
            'name' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'tour_id' => 'required',
            'go_order' => 'required',
          );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $route=Route::create([
                'name'=>$request->name,
                'tour_id'=>$request->tour_id,
                'lat'=>$request->lat,
                'lng'=>$request->long,
                'go_order'=>$request->go_order,
            ]);
          return response()->json(['route'=>$route]);
        }
    }

    public function editroute(Request $request){
        
        $route = Route::find ($request->id);
        $route->name = $request->name;
        $route->lat = $request->lat;
        $route->lng = $request->long;
        $route->go_order = $request->go_order;
        $route->save();
        return response()->json(['route'=>$route]);
    }

    public function deleteroute(Request $request){
        $del_id=$request->id;
        $route=Route::find($request->id)->delete();
        return response()->json(['route'=>$del_id]);
    }
}
