<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\HotelCategory;
use App\Country;
use App\Http\Requests\Hotels\HotelsCreateRequest;
use App\Http\Requests\Hotels\HotelsUpdateRequest;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hotels.index')->with('hotels',Hotel::all())->with('categories',HotelCategory::all())
        ->with('countries',Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create')->with('categories',HotelCategory::all())
        ->with('countries',Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelsCreateRequest $request)
    {
        if(empty($request->logo)){
            $logo='hotellogo/default.png';
        }
        else{
            $logo=$request->logo->store('hotellogo');
        }

        $hotel=Hotel::create([
            'country_id'=>$request->country_id,
            'hotelcategory_id'=>$request->hotelcategory_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'city'=>$request->city,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'minstay'=>$request->minstay,
            'rating'=>'5',
            'flag'=>'1',
            'logo'=>$logo,
        ]);

        session()->flash('success','New hotel added.Update amenities.');
        return redirect(route('hotelamenities.index',$hotel->id));
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
    public function edit(Hotel $hotel)
    {
        
        return view('admin.hotels.create')->with('hotel',$hotel)->with('categories',HotelCategory::all())
        ->with('countries',Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelsUpdateRequest $request,Hotel $hotel)
    {

        $data=$request->only(['hotelcategory_id','country_id','name','description','city','lat','lng','minstay']);
        if($request->hasFile('logo')){
            $logo=$request->logo->store('hotellogo');
            if($hotel->logo!='hotellogo/default.png'){
                Storage::delete($hotel->logo);
            }
            $data['logo']=$logo;
        }
        $hotel->update($data);


        session()->flash('success','Hotel Updated.Update amenities.');
        return redirect(route('hotelamenities.index',$hotel->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        session()->flash('success','Hotel Deleted');
        return redirect(route('hotels.index'));
    }

    public function published(Hotel $hotel)
    {
        $hotel->update([
            'flag'=>'1',
        ]);
        return redirect(route('hotels.index'));
    }

    public function draft(Hotel $hotel)
    {
        $hotel->update([
            'flag'=>'0',
        ]);
        return redirect(route('hotels.index'));
    }

    public function travelerchoice(Hotel $hotel)
    {
        $hotel->update([
            'flag'=>'3',
        ]);
        return redirect(route('hotels.index'));
    }
    public function recommended(Hotel $hotel)
    {
        $hotel->update([
            'flag'=>'2',
        ]);
        return redirect(route('hotels.index'));
    }

}
