<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Airline;
use App\FlightTicketsCategory;
use App\Http\Requests\Tickets\TicketsCreateRequest;
use App\Http\Requests\Tickets\TicketsUpdateRequest;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tickets.index')->with('tickets',Ticket::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickets.create')->with('airlines',Airline::all())->with('flightticketscategories',FlightTicketsCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketsCreateRequest $request)
    {
        Ticket::create([
            'airline_id'=>$request->airline_id,
            'flightticketscategory_id'=>$request->flight_ticket_category_id,
            'name'=>$request->name,
            'amount'=>$request->amount,
            'flight_type'=>$request->flight_type,
        ]);

        session()->flash('success','New Ticket Added.');
        return redirect(route('tickets.index'));
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
    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.create')->with('ticket',$ticket)->with('airlines',Airline::all())->with('flightticketscategories',FlightTicketsCategory::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketsUpdateRequest $request,Ticket $ticket)
    {
        $ticket->Update([
            'airline_id'=>$request->airline_id,
            'flightticketscategory_id'=>$request->flight_ticket_category_id,
            'name'=>$request->name,
            'amount'=>$request->amount,
            'flight_type'=>$request->flight_type,
        ]);

        session()->flash('success','Ticket Updated.');
        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        session()->flash('success','Ticket Deleted');
        return redirect(route('tickets.index'));
    }
}
