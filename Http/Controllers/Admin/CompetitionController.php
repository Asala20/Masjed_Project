<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $competitions = Competition::all();
        // $users =User::with('competitions')->get();
        // return dd($users);
        return view('admin.competitionCrud.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.competitionCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        $competition = new Competition();
        $competition->name = $request->name;
        $competition->date = $request->date;
        $competition->success = $request->success;
        $competition->repeaters = $request->repeaters;
        $competition->save();
        return redirect('competitions')->with('message' , 'New Competition has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competition = Competition::find($id);
        $users = $competition->users;
        // return dd($users);
        return view('admin.competitionCrud.show', compact('competition', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $competition = Competition::find($id);
        return view('admin.competitionCrud.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        $competition = Competition::find($id);
        $competition->name = $request->name;
        $competition->date = $request->date;
        $competition->success = $request->success;
        $competition->repeaters = $request->repeaters;
        $competition->update();
        return redirect('competitions')->with('message' , 'Competition has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Competition::destroy($id);
        return redirect()->back()->with('message' , 'Competition has been moved to recycle bin successfully!');
    }

    public function trashedUsers()
    {
        $users = Competition::onlyTrashed()->get();
        return view('admin.userCrud.trashedUsers')->with('users',$users);
    }

    public function restoreUser(string $id)
    {
        Competition::whereId($id)->restore();
        return redirect()->back()->with('message' , 'user has been restored successfully!');
    }

    public function restoreAllUsers()
    {
        Competition::onlyTrashed()->restore();
        return redirect('users')->with('message' , 'all users have been restored successfully!');
    }
}
