<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlightTicketsCategory;
use App\Http\Requests\FlightTicketCategories\FlightTicketCategoriesCreateRequest;
use App\Http\Requests\FlightTicketCategories\FlightTicketCategoriesUpdateRequest;

class FlightTicketCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.flightticketcategories.index')->with('flightticketcategories',FlightTicketsCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flightticketcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlightTicketCategoriesCreateRequest $request)
    {
        FlightTicketsCategory::create([
            'name'=>$request->name,
        ]);

        session()->flash('success','New Flight Ticket Category Added.');
        return redirect(route('flightticketcategories.index'));
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
    public function edit(FlightTicketsCategory $flightticketcategory)
    {
        return view('admin.flightticketcategories.create')->with('flightticketcategory',$flightticketcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlightTicketCategoriesUpdateRequest $request,FlightTicketsCategory $flightticketcategory)
    {
        $flightticketcategory->update([
            'name'=>$request->name,
        ]);

        session()->flash('success','Flight Ticket Category Updated');
        return redirect(route('flightticketcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightTicketsCategory $flightticketcategory)
    {
        $flightticketcategory->delete();

        session()->flash('success','Flight Ticket Category Deleted');
        return redirect(route('flightticketcategories.index'));
    }
}
