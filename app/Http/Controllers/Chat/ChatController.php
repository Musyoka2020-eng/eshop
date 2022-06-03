<?php

namespace App\Http\Controllers\Chat;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        // $chatuser = Chat::where('userid', Auth::id())->first();
        // $users =User::all();
        $allusers = Chat::all();
        $viewuser = Chat::where('userid', Auth::id())->get();
       return view('chats.index', compact('viewuser', 'allusers'));
    }

    
}
