<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Show;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class showDetailsController extends Controller
{
    public function showDetails($id)
    {
        $shows = Show::findOrFail($id);
        $user = Auth::user();

        $randomShows = Show::select()->orderBy('id','desc')->take(4)->where('id', '!=' , $id)->get();
        $comments = Comment::select()->orderBy('id','asc')->take(6)->where('show_id',$id)->get();


        if(Auth::user()){
            $viewExists = Views::where('user_id', $user->id)->where('show_id', $id)->exists();

            if (!$viewExists) {
                // Create a new view record
                Views::create([
                    'user_id' => $user->id,
                    'show_id' => $shows->id,
                ]);
            }
            return view('frontend.details.show_details',compact('shows','randomShows','comments'));
        }else{
            return view('frontend.details.show_details',compact('shows','randomShows','comments'));
        }

    }
}
