<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Hotel;
use App\Roomavailable;
use App\Http\Requests\Rooms\RoomsCreateRequest;
use App\Http\Requests\Rooms\RoomsUpdateRequest;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{

    public function setrooms(Hotel $hotel)
    {
        return view('admin.rooms.index')->with('rooms',Room::all()->where('hotel_id',$hotel->id))->with('hotel',$hotel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hotel $hotel)
    {
        return view('admin.rooms.index')->with('rooms',Room::all())->where('hotel_id',$hotel->id)->with('hotel',$hotel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createrooom(Hotel $hotel)
    {
        return view('admin.rooms.create')->with('hotel',$hotel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomsCreateRequest $request)
    {

        $image=$request->image->store('rooms');

        $room=Room::create([
            'name'=>$request->name,
            'hotel_id'=>$request->hotel_id,
            'description'=>$request->description,
            'amount'=>$request->amount,
            'adults'=>$request->adults,
            'kids'=>$request->kids,
            'checkindate'=>$request->checkindate,
            'checkutdate'=>$request->checkutdate,
            'flag'=>'1',
            'image'=>$image,
        ]);

        for($i=1;$i<=$request->rooms;$i++){
            $roomavailable=Roomavailable::create([
                'room_id'=>$room->id,
                'hotel_id'=>$request->hotel_id,
            ]);
        }

        session()->flash('success','New Room Type added.Update rooms availability.');
        //return view('admin.rooms.available')->with('room',$room);
        return redirect(route('rooms.setrooms',$room->hotel_id));
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
    public function edit(Room $room)
    {
        
        return view('admin.rooms.create')->with('room',$room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomsUpdateRequest $request,Room $room)
    {

        $data=$request->only(['name','description','amount','adults','kids','checkindate','checkutdate']);
        if($request->hasFile('image')){
            $image=$request->image->store('rooms');
            Storage::delete($room->image);
            $data['image']=$image;
        }
        $room->update($data);

        session()->flash('success','Room Updated.');
        return redirect(route('rooms.setrooms',$room->hotel_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        session()->flash('success','Room Deleted');
        return redirect(route('rooms.setrooms',$room->hotel_id));
    }

    public function publishedroom(Room $room)
    {
        $room->update([
            'flag'=>'1',
        ]);
        return redirect(route('rooms.setrooms',$room->hotel_id));
    }

    public function draftroom(Room $room)
    {
        $room->update([
            'flag'=>'0',
        ]);
        return redirect(route('rooms.setrooms',$room->hotel_id));
    }

    public function bestroom(Room $room)
    {
        $room->update([
            'flag'=>'2',
        ]);
        return redirect(route('rooms.setrooms',$room->hotel_id));
    }


}