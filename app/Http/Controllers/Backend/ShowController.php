<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowRequest;
use App\Models\category;
use App\Models\Show;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class ShowController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::latest()->get();
        return view('backend.shows.all_shows',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('backend.shows.add_show',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowRequest $request)
    {
        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(1172,564);
            $img->toJpeg(80)->save(base_path('public/upload/show/'.$name_gen));
            $save_url = 'upload/show/'.$name_gen;
            Show::insert([
                'name' => $request->name ,
                'image' =>  $save_url ,
                'description' => $request->description ,
                'type' => $request->type ,
                'studios' => $request->studios ,
                'data_aired' =>$request->data_aired ,
                'status' => $request->status ,
                'category_id' => $request->category_id ,
                'duration' =>$request->duration ,
                'quality' => $request->quality ,
            ]);
        }

        $notification = array(
            'message' => 'Show Added Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.show')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = category::all();
        $show = Show::findOrFail($id);
        return view('backend.shows.edit_show',compact('show','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShowRequest $request)
    {
        $show_id = $request->id;
        $old_img = $request->old_image ;

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(1172,564);
            $img->toJpeg(80)->save(base_path('public/upload/show/'.$name_gen));
            $save_url = 'upload/show/'.$name_gen;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            Show::findOrFail($show_id)->update([
                'name' => $request->name ,
                'image' =>  $save_url ,
                'description' => $request->description ,
                'type' => $request->type ,
                'studios' => $request->studios ,
                'data_aired' =>$request->data_aired ,
                'status' => $request->status ,
                'category_id' => $request->category_id ,
                'duration' =>$request->duration ,
                'quality' => $request->quality ,
            ]);
        }

        $notification = array(
            'message' => 'Show Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.show')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $show = Show::findOrFail($id);
        $image = $show->image;
        unlink($image);
        Show::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Show deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.show')->with($notification);
    }
}
