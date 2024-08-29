<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Following;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        $show = Show::findOrFail($id);
        $user = Auth::user();

        if (!Following::where('user_id', $user->id)->where('show_id', $id)->exists()) {
            Following::create([
                'user_id' => $user->id,
                'show_id' => $show->id,
            ]);

            return redirect()->back()->with('success', 'You are now following this show.');
        }

        return redirect()->back()->with('info', 'You are already following this show.');
    }

    public function unfollow($id)
    {
        $show = Show::findOrFail($id);
        $user = Auth::user();

        $follow = Following::where('user_id', $user->id)->where('show_id', $id)->first();

        if ($follow) {
            $follow->delete();
            return redirect()->back()->with('success', 'You have unfollowed this show.');
        }

        return redirect()->back()->with('info', 'You are not following this show.');
    }
}
