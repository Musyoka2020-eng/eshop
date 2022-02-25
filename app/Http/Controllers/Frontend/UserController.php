<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }
    public function delete($id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect('frontend.orders.index')->with('status',"Order Deleted Successfully");
    }
}