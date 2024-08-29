<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Comment;
use App\Models\Show;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $category = category::first();
        $show = Show::all();
        $shows = Show::select()->orderBy('id','desc')->take(3)->get();
        // $comments = Comment::select()->orderBy('id','asc')->take(6)->where('show_id',$id)->get();
        $adventureShows = Show::whereHas('category', function ($query) {
            $query->where('name', 'adventure');
        })
        ->orderBy('id', 'desc')
        ->take(6)
        ->get();

        $trendingShows =Show::whereHas('category', function ($query) {
            $query->where('name', 'comedy');
        })
        ->orderBy('id', 'desc')
        ->take(6)
        ->get();
        $actionShows = Show::whereHas('category', function ($query) {
            $query->where('name', 'action');
        })
        ->orderBy('id', 'desc')
        ->take(6)
        ->get();
        $resentShows = Show::select()->orderBy('id','desc')->take(6)->get();
        $forYouShows = Show::select()->orderBy('name','desc')->take(4)->get();

        return view('index',compact('shows','trendingShows','adventureShows','actionShows','resentShows','forYouShows'));
    }
}
