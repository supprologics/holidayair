<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airline;
use App\Country;
use App\Http\Requests\Airlines\AirlinesCreateRequest;
use App\Http\Requests\Airlines\AirlinesUpdateRequest;
use Illuminate\Support\Facades\Storage;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.airlines.index')->with('airlines',Airline::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.airlines.create')->with('countries',Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirlinesCreateRequest $request)
    {
        $logo=$request->logo->store('airlinelogo');

        Airline::create([
            'code'=>$request->code,
            'country_id'=>$request->country_id,
            'name'=>$request->name,
            'logo'=>$logo,
        ]);

        session()->flash('success','New Airline Added');
        return redirect(route('airlines.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        return view('admin.airlines.create')->with('airline',$airline)->with('countries',Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirlinesUpdateRequest $request,Airline $airline)
    {
        $data=$request->only(['code','country_id','name']);
        if($request->hasFile('logo')){
            $logo=$request->logo->store('airlinelogo');
            Storage::delete($airline->logo);
            $data['logo']=$logo;
        }
        $airline->update($data);



        session()->flash('success','Airline Updated');
        return redirect(route('airlines.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();
        Storage::delete($airline->logo);
        
        session()->flash('success','Airline Deleted');
        return redirect(route('airlines.index'));
    }
}
