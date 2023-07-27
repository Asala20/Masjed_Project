<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function searchUsers(){
    //     $search_text =$_GET['search'];
    //     $users = User::where('name', 'LIKE', '%'.$search_text.'%')->get();
    //     return view('pages.index', compact('users'))->with('message', 'النتائج');
    // }
    // public function searchTrashedUsers(){
    //     $search_text =$_GET['search'];
    //     $users = User::onlyTrashed()->where('name', 'LIKE', '%'.$search_text.'%')->where('role_as', '=', '0')->get();
    //     return view('pages.trashedUser', compact('users'))->with('message', 'results');
    // }
    // public function searchCompetitions(){
    //     $search_text =$_GET['search'];
    //     $competitions = Competition::where('name', 'LIKE', '%'.$search_text.'%')->get();
    //     return view('pages.competitionManagment', compact('competitions'))->with('message', 'النتائج');
    // }
    // public function searchThoseCompetitions($id){
    //     $search_text =$_GET['search'];
    //     $user = User::find($id);
    //     $competitions = $user->competitions;
    //     $aoqafs = $user->aoqafs;
    //     return view('pages.userDetails', compact('user' , 'competitions' , 'aoqafs'))->with('message', 'النتائج');
    // }
    // public function searchThoseUsers($id){
    //     $search_text =$_GET['search'];
    //     $competition = Competition::find($id);
    //     $users = $competition->users;
    //     return view('pages.competitionDetails' , compact('competition' , 'users'))->with('message', 'النتائج');
    // }


}
