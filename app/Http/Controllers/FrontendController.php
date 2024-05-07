<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FutsalDetails;
use DB;

class FrontendController extends Controller
{
    public function futsalpage()
    {
        $data = FutsalDetails::get();
        return view('frontend.futsals', compact('data'));
    }

    public function futsaldetailspage($id)
    {
        $data = DB::table('futsal_details')
        ->join('futsal_time_slots', 'futsal_details.id', '=', 'futsal_time_slots.futsal_id')
        ->where('futsal_details.id', $id)
        ->first();
       
        return view('frontend.futsaldetails', compact('data'));
    }
    
}
