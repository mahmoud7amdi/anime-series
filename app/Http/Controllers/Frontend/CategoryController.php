<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Show;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($id){
        $category = category::findOrFail($id);
        $shows = Show::select()->where('category_id',$category->id)->get();
        $forYouShows = Show::select()->orderBy('name','desc')->take(4)->get();
        return view('frontend.details.category',compact('shows','category','forYouShows'));
    }
}
