<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Txt_details;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class Txt_detailsController extends Controller
{
    public function setinculdes(Tour $tour)
    {
        return view('admin.txt_details.index')->with('tour',$tour)->with('txt_details',Txt_details::all()->where('tour_id',$tour->id)->where('detail_type',1))->with('detail_type',1);
    }

    public function setexcludes(Tour $tour)
    {
        return view('admin.txt_details.index')->with('tour',$tour)->with('txt_details',Txt_details::all()->where('tour_id',$tour->id)->where('detail_type',2))->with('detail_type',2);
    }

    public function setconditions(Tour $tour)
    {
        return view('admin.txt_details.index')->with('tour',$tour)->with('txt_details',Txt_details::all()->where('tour_id',$tour->id)->where('detail_type',3))->with('detail_type',3);
    }

    public function setcancellations(Tour $tour)
    {
        return view('admin.txt_details.index')->with('tour',$tour)->with('txt_details',Txt_details::all()->where('tour_id',$tour->id)->where('detail_type',4))->with('detail_type',4);
    }

    public function sethints(Tour $tour)
    {
        return view('admin.txt_details.index')->with('tour',$tour)->with('txt_details',Txt_details::all()->where('tour_id',$tour->id)->where('detail_type',5))->with('detail_type',5);
    }


    //using ajax newtxt_detail
    public function addtxt_detail(Request $request){

        $rules = array(
            'detail_type' => 'required',
            'tour_id' => 'required',
            'text' => 'required',
          );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $txt_detail=Txt_details::create([
                'detail_type'=>$request->detail_type,
                'tour_id'=>$request->tour_id,
                'text'=>$request->text
            ]);
          return response()->json(['txt_detail'=>$txt_detail]);
        }

    }

    public function edittxt_detail(request $request){
        
        $txt_detail = Txt_details::find ($request->id);
        $txt_detail->detail_type = $request->detail_type;
        $txt_detail->text = $request->text;
        $txt_detail->save();
        return response()->json(['txt_detail'=>$txt_detail]);

    }
    
    public function deletetxt_detail(request $request){
        $del_id=$request->id;
        $txt_detail = Txt_details::find ($request->id)->delete();
        return response()->json(['txt_detail'=>$del_id]);

    }
}
