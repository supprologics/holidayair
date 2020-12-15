<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelCategory;
use App\Http\Requests\HotelCategories\HotelCategoriesCreateRequest;
use App\Http\Requests\HotelCategories\HotelCategoriesUpdateRequest;


class HotelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hcategories.index')->with('categories',HotelCategory::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelCategoriesCreateRequest $request)
    {
        HotelCategory::create([
            'name'=>$request->name,
        ]);

        session()->flash('success','New hotel category added');
        return redirect(route('hotelcategories.index'));
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
    public function edit(HotelCategory $hotelcategory)
    {
        return view('admin.hcategories.create')->with('category',$hotelcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelCategoriesUpdateRequest $request,HotelCategory $hotelcategory)
    {
        $hotelcategory->update([
            'name'=>$request->name,
        ]);

        session()->flash('success','Hotel Category Updated');
        return redirect(route('hotelcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelCategory $hotelcategory)
    {
        $hotelcategory->delete();

        session()->flash('success','Hotel Category Deleted');
        return redirect(route('hotelcategories.index'));
    }
}
