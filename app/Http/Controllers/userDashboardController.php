<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userDashboardController extends Controller
{
    public function profile()  {
        $user = User::find(Auth::user()->id);
        $competitions = $user->competitions;
        return view('pages.User' , compact( 'user' , 'competitions'));
    }
}
