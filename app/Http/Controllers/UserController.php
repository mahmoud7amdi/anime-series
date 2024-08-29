<?php

namespace App\Http\Controllers;

use App\Models\Following;
use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function followShows()
    {
        $followdShows = Following::with('shows')
        ->where('user_id', Auth::id())
        ->orderBy('id', 'desc')
        ->get();
        return view('frontend.user.followshows',compact('followdShows'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:1'
        ]);

        // Get the search query from the input
        $searchQuery = $request->input('query');

        // Search for shows by their name
        $shows = Show::where('name', 'like', '%' . $searchQuery . '%')
        ->orWhere('type', 'like', '%' . $searchQuery . '%')
        ->orWhere('quality', 'like', '%' . $searchQuery . '%')
        ->get();

        // Return a view with the search results
        return view('frontend.details.search_results', compact('shows'));
    }


    public function UserAccount()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.acount',compact('userData'));
    }
}
