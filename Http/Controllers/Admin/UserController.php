<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.userCrud.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.userCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' =>'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->almasjed = $request->almasjed;
        $user->supervisor = $request->supervisor;
        $user->password = $request->password;
        $user->role_as = '0'; //its default value is 0, but just to make sure :)
        $user->save();
        return redirect('users')->with('message' , 'New user has been added successfully!');
    }

    /**
     * Display the specified resource.
     *//////////////////////////////////////////
    public function show(string $id)
    {
        $user = User::find($id);
        $competitions = $user->competitions;
        return view('admin.userCrud.show', compact('user', 'competitions') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.userCrud.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $email_rule = $id ? ',' . $id . ',id' : '';
        $request->validate([
            'email' => 'required|unique:users,email'.$email_rule,
            'name' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->almasjed = $request->almasjed;
        $user->supervisor = $request->supervisor;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();
        // return dd($user);
        return redirect('users')->with('message' , 'user has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('message' , 'user has been moved to recycle bin successfully!');
    }

    public function trashedUsers()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.userCrud.trashedUsers')->with('users',$users);
    }

    public function restoreUser(string $id)
    {
        User::whereId($id)->restore();
        return redirect()->back()->with('message' , 'user has been restored successfully!');
    }

    public function restoreAllUsers()
    {
        User::onlyTrashed()->restore();
        return redirect('users')->with('message' , 'all users have been restored successfully!');
    }
}
