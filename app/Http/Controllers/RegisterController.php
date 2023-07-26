<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('pages.singUp');
    }

    public function registerDemand(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->superviser = $request->superviser;
        $user->password = $request->password;
        $user->masjed = $request->masjed;
        $user->status = '0';
        $user->role_as = '0';
        $user->save();
        return redirect('registerForm')
        ->with( 'message' , 'سيتم تدقيق طلبك، شكرًا للانتظار');
    }


    
}
