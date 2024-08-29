<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Episodes;
use App\Models\Show;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function anmieWatching($show_id,$episode_name)
    {
        $show = Show::findOrFail($show_id);
        $episode = Episodes::where('episode_name',$episode_name)->where('show_id',$show->id)->first();
        $episodes = Episodes::select()->where('show_id',$show_id)->get();
        $comments = Comment::select()->orderBy('id','asc')->take(6)->where('show_id',$show_id)->get();
        return view('frontend.episodes.episode',compact('show','episode','episodes','comments'));
    }
}
