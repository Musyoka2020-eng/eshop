<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Repair;
use PHPUnit\TextUI\XmlConfiguration\Group;

class FrontendController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    
    public function index()
    {
        $todayorders = Order::where('status','1')->whereDate('created_at', '=', date('Y-m-d'))->sum('total_price');
        $users = User::where('role_as','0')->count();
        $newuser = User::whereDate('created_at', '=', date('Y-m-d'))->count();
        $comporders = Order::where('status','1')->sum('total_price');
        $pendingorders = Order::where('status','0')->sum('total_price');
        $allrepairs = Repair::all()->count();
        $pendrepairs = Repair::where('status','0')->count();
        $comprepairs = Repair::where('status','1')->count();
        return view('admin.index', compact('todayorders','users','newuser','comporders','pendingorders','allrepairs','pendrepairs','comprepairs'));
    }
}
