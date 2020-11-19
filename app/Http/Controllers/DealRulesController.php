<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DealRule;
use App\Deal;
use Validator;
use Response;
use Illuminate\Support\Facedes\Input;
use App\http\Requests;

class DealRulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setdealrule(Deal $deal)
    {
        return view('admin.deals.rule')->with('deal',$deal)->with('dealrules',DealRule::all()->where('deal_id',$deal->id));
    }

    //using ajax newitinerary
    public function adddealrule(Request $request){

        $rules = array(
            'deal_id' => 'required',
            'title' => 'required',
            'description' => 'required',
          );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $dealrule=DealRule::create([
                'deal_id'=>$request->deal_id,
                'title'=>$request->title,
                'description'=>$request->description,
            ]);
          return response()->json(['dealrule'=>$dealrule]);
        }

    }

    public function editdealrule(request $request){
        
        $dealrule = DealRule::find ($request->id);
        $dealrule->title = $request->title;
        $dealrule->description = $request->description;
        $dealrule->save();
        return response()->json(['dealrule'=>$dealrule]);

    }
    
    public function deletedealrule(request $request){
        $del_id=$request->id;
        $dealrule = DealRule::find ($request->id)->delete();
        return response()->json(['dealrule'=>$del_id]);

    }

}
