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
    public function __construct(){
        $this->middleware('verifyTourCategoryCount')->only(['create','store']);
        $this->middleware('verifyCountriesCount')->only(['create','store']);
    }
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
        if($request->seasonon=='0'){
            $request->seasonon=null;
        }
        if($request->seasonout=='0'){
            $request->seasonout=null;
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
            'online'=>'0',
            'seasonon'=>$request->seasonon,
            'seasonout'=>$request->seasonout,
            'discount'=>$request->discount,
            'discounton'=>$request->discounton,
            'discountout'=>$request->discountout,
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
    if($request->seasonon=='0'){
        $request->seasonon=null;
    }
    if($request->seasonout=='0'){
        $request->seasonout=null;
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
            'seasonon'=>$request->seasonon,
            'seasonout'=>$request->seasonout,
            'discount'=>$request->discount,
            'discounton'=>$request->discounton,
            'discountout'=>$request->discountout,
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
        if($tour->gallery->count()==0){
            session()->flash('error','Please upload tour images for publish tour');
            return redirect(route('galleryview' ,$tour->id));
        }
        else{
            $tour->Update([
                'online'=>2,
            ]);
        }
        return $this->index();
        
    }

    public function draft(Tour $tour)
    {
        $tour->Update([
            'online'=>0,
        ]);
        return $this->index();
        
    }

    public function status(Tour $tour){
        
        if($tour->online=='1' || $tour->online=='2'){            
            $tour->online='0';
            $tour->save();
            session()->flash('success','Tour Saved as draft');
        }
        else{
            if($tour->gallery->count()==0){
                session()->flash('error','Please upload tour images for publish tour');
                return redirect(route('galleryview' ,$tour->id));
            }
            $tour->online='2';
            $tour->save();
            session()->flash('success','Tour Published');
        }
        return $this->index();

    }

    public function recommended(Tour $tour)
    {
        if($tour->gallery->count()==0){
            session()->flash('error','Please upload tour images for publish tour');
            return redirect(route('galleryview' ,$tour->id));
        }
        else{
            $tour->Update([
                'online'=>1,
            ]);
        }
        return $this->index();
    }

}
