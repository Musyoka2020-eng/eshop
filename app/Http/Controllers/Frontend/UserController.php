<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }
    public function index2()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.User.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }
    public function view2($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.User.orders.view', compact('orders'));
    }
    public function delete($id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect('frontend.orders.index')->with('status',"Order Deleted Successfully");
    }

    public function profile()
    {
        $typeuser = User::where('id', Auth::id())->first();
        $comporders = Order::where('status', '1')->where('user_id', Auth::id())->get();
        $pendorders = Order::where('status', '0')->where('user_id', Auth::id())->get();
        $cash = Order::where('status', '0')->where('user_id', Auth::id())->sum('total_price');
        return view('frontend.User.index', compact('comporders','pendorders','typeuser','cash'));
    }
    public function viewprofile($id)
    {
      return view('frontend.User.profile');

    }
    public function update(Request $request)
    {
        if (User::where('id', Auth::id())) {

            $user = User::where('id', Auth::id())->first();
            if($request->hasFile('image'))
        {
            $path = 'assets/uploads/users/'.$user->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/users/',$filename);
            $user->image = $filename;
        }

            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();

            return redirect('user')->with('status', "Profile Updated successfully");
        }
        else{
            return redirect('/')->with('status', "Please login first to update");
        }
    }
}

