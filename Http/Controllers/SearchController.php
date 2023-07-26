<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Competition;

class SearchController extends Controller
{
    public function searchCompetitions()
    {
        $search_text =$_GET['search'];
        $competitions = Competition::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin.search.searchCompetitions', compact('competitions'))->with('message', 'results');
    }

    public function searchUsers()
    {
        $search_text =$_GET['search'];
        $users = User::where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=', '0')->get();
        return view('admin.search.searchUsers', compact('users'))->with('message', 'results');
    }

    public function searchTrashedCompetitions()
    {
        $search_text =$_GET['search'];
        $competitions = Competition::onlyTrashed()->where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('admin.search.searchTrashedCompetitions', compact('Competitions'))->with('message', 'results');
    }

    public function searchTrashedUsers()
    {
        $search_text =$_GET['search'];
        $users = User::onlyTrashed()->where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=', '0')->get();
        return view('admin.search.searchTrashedUsers', compact('users'))->with('message', 'results');
    }


}
