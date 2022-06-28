<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    
    public function users()
    {
        $newuser = User::whereDate('created_at', '=', date('Y-m-d'))->get();
        $users = User::all();
        return view('admin.users.index', compact('users','newuser'));
    }
    public function viewusers($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }

    public function changeuserrole(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_as = $request->input('role_as');
        $user->update();
        return redirect('users')->with('status', "User Role Updated Successful");
    }
    public function viewrole($id)
    {
        $roleuse = User::find($id);
        return view('admin.users.role', compact('roleuse'));

    }
    public function updateadmin(Request $request)
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
            // $user->address1 = $request->input('address1');
            // $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            // $user->state = $request->input('state');
            $user->country = $request->input('country');
            // $user->pincode = $request->input('pincode');
            $user->update();

            return redirect('dashboard')->with('status', "Thank you . . Admin Profile Updated successfully");
        }
        else{
            return redirect('/')->with('status', "Please login first to update");
        }
    }
}
