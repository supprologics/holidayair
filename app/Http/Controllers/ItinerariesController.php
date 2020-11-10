<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Itinerary;
use App\Http\Requests\Itineraries\ItinerariesCreateRequest;
use App\Http\Requests\Itineraries\ItinerariesUpdateRequest;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class ItinerariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setitineraries(Tour $tour)
    {
        return view('admin.itineraries.index')->with('tour',$tour)->with('itineraries',Itinerary::all()->where('tour_id',$tour->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newitinerary(Tour $tour)
    {
        return view('admin.itineraries.create')->with('tour',$tour);
    }

    //using ajax newitinerary
    public function additinerary(Request $request){

        $rules = array(
            'title' => 'required',
            'tour_id' => 'required',
            'description' => 'required',
          );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $itinerary=Itinerary::create([
                'title'=>$request->title,
                'tour_id'=>$request->tour_id,
                'description'=>$request->description
            ]);
          return response()->json(['itinerary'=>$itinerary]);
        }

    }

    public function edititinerary(request $request){
        
        $itinerary = Itinerary::find ($request->id);
        $itinerary->title = $request->title;
        $itinerary->description = $request->description;
        $itinerary->save();
        return response()->json(['itinerary'=>$itinerary]);

    }
    
    public function deleteitinerary(request $request){
        $del_id=$request->id;
        $itinerary = Itinerary::find ($request->id)->delete();
        return response()->json(['itinerary'=>$del_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItinerariesCreateRequest $request)
    {
        Itinerary::create([
            'title'=>$request->title,
            'tour_id'=>$request->tour_id,
            'description'=>$request->description
        ]);
        
        session()->flash('success','Itinerary Added');
        return redirect(route('setitineraries',$request->tour_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Itinerary $itinerary)
    {
        return view('admin.itineraries.create')->with('itinerary',$itinerary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItinerariesUpdateRequest $request,Itinerary $itinerary)
    {
        $itinerary->update([
            'title'=>$request->title,
            'tour_id'=>$request->tour_id,
            'description'=>$request->description
        ]);
        
        session()->flash('success','Itinerary Updated');
        return redirect(route('setitineraries',$request->tour_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itinerary $itinerary)
    {
        $tour_id=$itinerary->tour->id;
        $itinerary->delete();

        session()->flash('success','Itinerary Deleted');
        return redirect(route('setitineraries',$tour_id));
    }
}
