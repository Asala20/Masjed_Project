<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {

        $competitions = Competition::all();
        return view('pages.competitionManagment', compact('competitions'));
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
            'end_date' => 'required',
            'start_date' => 'required',
        ]);

        $competition = new Competition();
        $competition->name = $request->name;
        $competition->end_date = $request->end_date;
        $competition->start_date = $request->start_date;
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
        return view('pages.competitionDetails', compact('competition', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $competition = Competition::find($id);
        return view('pages.competitionManagment', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $competition = Competition::find($id);
        $competition->name = $request->name;
        $competition->start_date = $request->start_date;
        $competition->end_date = $request->end_date;
        $competition->update();
        return redirect('competitions')->with('message' , 'Competition has been updated successfully!');
    }

    
}
