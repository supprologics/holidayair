<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlightPlan;
use App\Deal;
use App\Airline;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class FlightPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setflightplan(Deal $deal)
    {
        return view('admin.deals.plan')->with('deal',$deal)->with('flightplans',FlightPlan::all()->where('deal_id',$deal->id))->with('airlines',Airline::all());
    }


    //using ajax newitinerary
    public function addflightplan(Request $request){

        $rules = array(
            'deal_id' => 'required',
            'airline_id' => 'required',
            'takeoff_airport' => 'required',
            'landing_airport' => 'required',
            'time_hours' => 'required',
            'time_min' => 'required',
          );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $flightplan=FlightPlan::create([
                'deal_id'=>$request->deal_id,
                'airline_id'=>$request->airline_id,
                'takeoff_airport'=>$request->takeoff_airport,
                'landing_airport'=>$request->landing_airport,
                'time_hours'=>$request->time_hours,
                'time_min'=>$request->time_min,
            ]);
          return response()->json(['flightplan'=>$flightplan]);
        }

    }

    public function editflightplan(request $request){
        
        $flightplan = FlightPlan::find ($request->id);
        $flightplan->airline_id = $request->airline_id;
        $flightplan->takeoff_airport = $request->takeoff_airport;
        $flightplan->landing_airport = $request->landing_airport;
        $flightplan->time_hours = $request->time_hours;
        $flightplan->time_min = $request->time_min;
        $flightplan->save();
        return response()->json(['flightplan'=>$flightplan]);

    }
    
    public function deleteflightplan(request $request){
        $del_id=$request->id;
        $flightplan = FlightPlan::find ($request->id)->delete();
        return response()->json(['flightplan'=>$del_id]);

    }

}
