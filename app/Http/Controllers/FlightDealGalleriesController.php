<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\FlightDealGallery;

class FlightDealGalleriesController extends Controller
{
    public function dealgalleryview(Deal $deal)
    {
        return view('admin.deals.gallery')->with('deal',$deal)->with('gallery',FlightDealGallery::all()->where('deal_id',$deal->id));
    }



    function upload(Request $request)
    {
        if($request->type='deal'){
            $id_type='deal_id';
        }

        $image = $request->file('file');
        $imageName = uniqid().time() . '.' . $image->extension();
        $image->move(public_path('images/'.$request->type), $imageName);
        FlightDealGallery::create([
            'file_path'=>$imageName,
            $id_type=>$request->deal_id,
        ]);
        return response()->json(['success' => $imageName]);
    }

    function fetch(Request $request)
    {
        if($request->type='deal'){
            $id_type='deal_id';
        }
        $gallery=FlightDealGallery::all()->where($id_type,$request->deal_id);
        $output = '<div class="row">';
        foreach($gallery as $image)
            {
            $output .= '
            <div class="col-md-3">
                <div class="card mb-4" >
                    <div class="view overlay">
                    <img class="card-img-top" src="'.asset('images/'.$request->type.'/' . $image->file_path).'"
                    alt="Card image cap" style="width:400px; height:250px">
                    <div class="mask rgba-white-slight "></div>
                    </div>
                
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm remove_image float-right" id="'.$image->file_path.'"><em class="icon ni ni-trash"></em></button>
                    </div>
                </div>
            </div>
            ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
        if($request->get('name'))
        {
            $del_id=$request->name;
            FlightDealGallery::where('file_path', $del_id)->delete();
            \File::delete(public_path('images/'.$request->type.'/' . $request->get('name')));
        }
    }

}