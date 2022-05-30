<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Repair;
use App\Models\Repairrating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewrepairController extends Controller
{
    public function index()
    {
        return view('frontend.repairs.index');
    }
    public function repairlistAjax()
    {
        $repairs = Repair::select('email')->get();
        $data = [];

        foreach ($repairs as $item) {
            $data[] = $item['email'];
        }
        return $data;
    }

    public function searchrepair(Request $request)
    {
        $searched_repair = $request->email;
        if ($searched_repair != '') {

            $repair = Repair::where("email", "LIKE", "%$searched_repair%")->first();
            if ($repair) {

                $repairsn = Repair::where("email", "LIKE", "%$searched_repair%")->get();
                return view('frontend.repairs.index', compact('repairsn'));
            } else {
                return redirect()->back()->with('status', "No repair macthed your search");

            }

        } else {
            return redirect('/')->with('status', "No repair email your search");
        }

    }
    public function viewrepair($id)
    {
        $repair = Repair::where('id', $id)->get();
        $ratings = Repairrating::where('prod_id', $id)->get();
        $rating_sum = Repairrating::where('prod_id', $id)->sum('stars_rated');
        $user_rating = Repairrating::where('prod_id', $id)->where('user_id', Auth::id())->first();
        $review = Repairrating::where('prod_id', $id)->where('user_id', Auth::id())->first();
        $review1 = Repairrating::where('prod_id', $id)->where('user_id', Auth::id())->get();
        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        return view('frontend.repairs.view', compact('repair', 'ratings', 'rating_sum', 'user_rating', 'rating_value', 'review', 'review1'));
    }

    public function userview($id)
    {
        $user = User::where('id', $id)->first();
        $userepair = Repair::where('email', $user->email)->get();
        return view('frontend.User.repair.index', compact('userepair'));

    }
}
