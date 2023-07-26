<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' =>'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->masjed = $request->masjed;
        $user->superviser = $request->superviser;
        $user->password = Hash::make($request->password);
        $user->role_as = '0'; //its default value is 0, but just to make sure :)
        $user->status = '1';
        $user->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *//////////////////////////////////////////
    public function show(string $id)
    {
        $user = User::find($id);
        $competitions = $user->competitions;
        $aoqafs = $user->aoqafs;
        return view('pages.userDetails', compact('user', 'competitions', 'aoqafs') );

        // $user->trophies()->attach( $trophyId, ['column_name_in_pivot','any_value you want']);
        // It will create record with additional column data.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('pages.User', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->almasjed = $request->almasjed;
        $user->superviser = $request->superviser;
        $user->password = Hash::make($request->password);
        $user->role_as = '0'; //its default value is 0, but just to make sure :)
        $user->status = '1';
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
        return view('pages.trashedUser')->with('users',$users);
    }

    public function restoreUser(string $id)
    {
        User::whereId($id)->restore();
        return redirect()->back()->with('message' , 'user has been restored successfully!');
    }

    public function restoreAllUsers()
    {
        User::onlyTrashed()->restore();
        return redirect()->back()->with('message' , 'all users have been restored successfully!');
    }

    public function acceptUser($id){
        $user = User::find($id);
        $user->status = '1';
        $user->update();
        return redirect('users')->with('message' , 'the user is accepted successfully');
    }
}
