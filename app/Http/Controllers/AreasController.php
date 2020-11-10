<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Country;
use App\Http\Requests\Areas\AreasCreateRequest;
use App\Http\Requests\Areas\AreasUpdateRequest;

class AreasController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCountriesCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.areas.index')->with('areas',Area::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create')->with('countries',Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreasCreateRequest $request)
    {
        Area::create([
            'district'=>$request->district,
            'name'=>$request->name,
            'country_id'=>$request->country_id,
        ]);

        session()->flash('success','New area added');
        return redirect(route('areas.index'));
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
    public function edit(Area $area)
    {
        return view('admin.areas.create')->with('area',$area)->with('countries',Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreasUpdateRequest $request,Area $area)
    {
        $area->update([
            'name'=>$request->name,
            'district'=>$request->district,
            'country_id'=>$request->country_id,
        ]);

        session()->flash('success','Area Updated');
        return redirect(route('areas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();

        session()->flash('success','Area Deleted');
        return redirect(route('areas.index'));
    }
}
