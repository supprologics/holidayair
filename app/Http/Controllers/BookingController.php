<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Tour;
use App\BookTour;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function bookingtour(Tour $tour){
        return view('app.tours.booking')
        ->with('tour',$tour);
    }

    public function booktour(Request $request){

        
        $check = Validator::make($request->all(),[
            'date' => 'required|date',
            'adults' => 'required|integer',
            'kids' => 'required|integer',
            'first_name' => 'required',
            'last_name' => 'required',
            'personal_address' => 'required|max:255',
            'passport' => 'required',
            'email_address' => 'required|email',
            'email_address' => 'same:r_email_address',
            'country_code' => 'required',
            'phone_number' => 'required',
            
        ]);
          
        if($check->passes()){
            $tour=BookTour::create([
                'tour_id'=>$request->tour_id,
                'date'=>Carbon::parse($request->date)->format('Y-m-d H:i:s'),
                'adults'=>$request->adults,
                'kids'=>$request->kids,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'personal_address'=>$request->personal_address,
                'passport'=>$request->passport,
                'email_address'=>$request->email_address,
                'country_code'=>$request->country_code,
                'phone_number'=>$request->phone_number,
            ]);
            \Mail::to($tour->email_address)->send(new \App\Mail\TourBookingConfirm($tour));
            \Mail::to('support@prologics.lk')->send(new \App\Mail\TourBooked($tour));
            
            return view('app.tours.thank')
                ->with('tour',$tour);
        }
        else{
            //this will return the errors & to check put "dd($errors);" in your blade(view)
            return back()->withErrors($check)->withInput();
        }
    }
}
