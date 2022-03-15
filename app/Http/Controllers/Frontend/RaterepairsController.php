<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Repair;
use App\Models\Repairrating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RaterepairsController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('repair_rating');
        $user_review = $request->input('user_review');
        $repairs_id = $request->input('repair_id');


        $repair_check = Repair::where('id', $repairs_id)->where('status', '1')->first();
        if ($repair_check) {
            $existing_rating = Repairrating::where('user_id', Auth::id())->where('prod_id', $repairs_id)->first();
            if ($existing_rating) {
                $existing_rating->stars_rated = $stars_rated; 
                $existing_rating->user_review = $request->input('user_review');
                $existing_rating->update();
                return redirect()->back()->with('status', "Rating Updated successfully");

            } else{
                Repairrating::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $repairs_id,
                    'stars_rated' => $stars_rated,
                    'user_review' => $user_review,
                ]);
                return redirect()->back()->with('status', "Thank you for rating our services");
            }
          
        }else{
            return redirect()->back()->with('status', "You cannot Rate unfinished services");
        }

    }
}
