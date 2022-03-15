<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
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
}
