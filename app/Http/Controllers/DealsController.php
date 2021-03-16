<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Airline;
use App\Country;
use App\FlightTicketsCategory;
use App\Http\Requests\Deals\DealsCreateRequest;
use App\Http\Requests\Deals\DealsUpdateRequest;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deals.index')->with('deals',Deal::all())->with('airlines',Airline::all())->with('countries',Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deals.create')->with('airlines',Airline::all())->with('countries',Country::all())->with('flightticketscategories',FlightTicketsCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealsCreateRequest $request)
    {
        if(empty($request->cancellation_fee)){
            $request->cancellation_fee=0.00;
        }
        if(empty($request->flight_change_fee)){
            $request->flight_change_fee=0.00;
        }

        $deal=Deal::create([
            'airline_id'=>$request->airline_id,
            'country_id'=>$request->country_id,
            'name'=>$request->name,
            'flight_type'=>$request->flight_type,
            'amount'=>$request->amount,
            'description'=>$request->description,
            'class_type'=>$request->class_type,
            'cancellation_fee'=>$request->cancellation_fee,
            'flight_change_fee'=>$request->flight_change_fee,
        ]);

        session()->flash('success','New Deal added.');
        return redirect(route('setflightplan',$deal->id));
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
    public function edit(Deal $deal)
    {
        return view('admin.deals.create')->with('deal',$deal)->with('airlines',Airline::all())->with('countries',Country::all())->with('flightticketscategories',FlightTicketsCategory::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DealsUpdateRequest $request,Deal $deal)
    {
        if(empty($request->cancellation_fee)){
            $request->cancellation_fee=0.00;
        }
        if(empty($request->flight_change_fee)){
            $request->flight_change_fee=0.00;
        }

        $deal->update([
            'airline_id'=>$request->airline_id,
            'country_id'=>$request->country_id,
            'name'=>$request->name,
            'flight_type'=>$request->flight_type,
            'amount'=>$request->amount,
            'description'=>$request->description,
            'class_type'=>$request->class_type,
            'cancellation_fee'=>$request->cancellation_fee,
            'flight_change_fee'=>$request->flight_change_fee,
        ]);

        session()->flash('success','Deal Updaated.');
        return redirect(route('setflightplan',$deal->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        session()->flash('success','Deal Deleted');
        return redirect(route('deals.index'));
    }


}
