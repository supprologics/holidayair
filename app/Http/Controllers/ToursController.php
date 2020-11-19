<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Category;
use App\Country;
use App\Area;
use App\Http\Requests\Tours\ToursCreateRequest;
use App\Http\Requests\Tours\ToursUpdateRequest;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tours.index')->with('tours',Tour::paginate(10))->with('categories',Category::all())
        ->with('countries',Country::all())->with('areas',Area::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tours.create')->with('categories',Category::all())
        ->with('countries',Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToursCreateRequest $request)
    {
        if(empty($request->rating)){
            $request->rating=5;
        }
        if(empty($request->hits)){
            $request->hits=0;
        }
        if(empty($request->is_highlight)){
            $request->is_highlight=0;
        }
        if(empty($request->online)){
            $request->online=0;
        }
        $tour=Tour::create([
            'category_id'=>$request->category_id,
            'country_id'=>$request->country_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'duration'=>$request->duration,
            'days'=>$request->days,
            'nights'=>$request->nights,
            'amount'=>$request->amount,
            'rating'=>$request->rating,
            'hits'=>$request->hits,
            'is_highlight'=>$request->is_highlight,
            'online'=>$request->online,
        ]);

        session()->flash('success','New Tour added.Update itineraries.');
        return redirect(route('setitineraries',$tour->id));
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
    public function edit(Tour $tour)
    {
        
        return view('admin.tours.create')->with('tour',$tour)->with('categories',Category::all())
        ->with('countries',Country::all())->with('areas',Area::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ToursUpdateRequest $request,Tour $tour)
    {
    if(empty($request->rating)){
        $request->rating=5;
    }
    if(empty($request->hits)){
        $request->hits=0;
    }
    if(empty($request->is_highlight)){
        $request->is_highlight=0;
    }
    if(empty($request->online)){
        $request->online=0;
    }
    
        $tour->Update([
            'category_id'=>$request->category_id,
            'country_id'=>$request->country_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'duration'=>$request->duration,
            'days'=>$request->days,
            'nights'=>$request->nights,
            'amount'=>$request->amount,
            'rating'=>$request->rating,
            'hits'=>$request->hits,
            'is_highlight'=>$request->is_highlight,
            'online'=>$request->online,
        ]);
        
        session()->flash('success','Tour Updated.Update itineraries.');
        return redirect(route('setitineraries',$tour->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();

        session()->flash('success','Tour Deleted');
        return redirect(route('tours.index'));
    }

    public function publish(Tour $tour)
    {
        $tour->Update([
            'online'=>2,
        ]);
        return $this->index();
    }

    public function active(Tour $tour)
    {
        $tour->Update([
            'online'=>1,
        ]);
        return $this->index();
    }

    public function inactive(Tour $tour)
    {
        $tour->Update([
            'online'=>0,
        ]);
        return $this->index();
    }
}
