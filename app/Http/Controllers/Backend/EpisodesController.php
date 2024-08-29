<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Episodes;
use App\Models\Show;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodes = Episodes::all();
        return view('backend.episodes.all_episode', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shows = Show::all();
        return view('backend.episodes.add_episode', compact('shows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'episode_name' => 'required',
            'show_id'      => 'required',
            'video'        => 'required|file|mimes:mp4,avi,mov,wmv,flv,ogg|max:50000',
            'thumbnail'    => 'required',
        ]);

       $videoDestinationPath = public_path('upload/episode/videos');

    // Store video in the specified path
    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
        $video->move($videoDestinationPath, $videoName);

        // Construct the full path to store in the database
        $videoPath = 'upload/episode/videos/' . $videoName;
    } else {
        return back()->withErrors(['video' => 'A video is required']);
    }


        // Check and store thumbnail
        if($request->file('thumbnail')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $img = $manager->read($request->file('thumbnail'));
            $img = $img->resize(1172,564);
            $img->toJpeg(80)->save(base_path('public/upload/episode/thumbnails/'.$name_gen));
            $save_url = 'upload/episode/thumbnails/'.$name_gen;
        }

        Episodes::create([
            'episode_name' => $validated['episode_name'],
            'show_id' => $validated['show_id'],
            'video' => $videoPath,
            'thumbnail' => $save_url,
        ]);

        return redirect()->route('all.episodes')->with('success', 'Episode created successfully.');
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
        $episode = Episodes::findOrFail($id);
        $shows = Show::all();
        return view('backend.episodes.edit_episode', compact('episode', 'shows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $episode = Episodes::findOrFail($id);

        $validated = $request->validate([
            'episode_name' => 'required|string|max:255',
            'show_id' => 'required|exists:shows,id',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,ogg', // Video is optional
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Thumbnail is optional
        ]);

        if ($request->hasFile('video')) {
            // Remove old video if exists
            if ($episode->video && file_exists(public_path($episode->video))) {
                unlink(public_path($episode->video));
            }

            // Store new video
            $videoDestinationPath = public_path('upload/episode/videos');
            $video = $request->file('video');
            $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move($videoDestinationPath, $videoName);

            // Update video path
            $episode->video = 'upload/episode/videos/' . $videoName;
        }

        if ($request->hasFile('thumbnail')) {
            if ($episode->thumbnail && file_exists(public_path($episode->thumbnail))) {
                unlink(public_path($episode->thumbnail));
            }
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $img = $manager->read($request->file('thumbnail'));
            $img->toJpeg(80)->save(base_path('public/upload/episode/thumbnails/'.$name_gen));
            $episode->thumbnail = 'upload/episode/thumbnails/'.$name_gen;
        }



        $episode->episode_name = $validated['episode_name'];
        $episode->show_id = $validated['show_id'];

        $episode->save();

        return redirect()->route('all.episodes')->with('success', 'Episode updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episodes::findOrFail($id);
        // Delete the video file if it exists
    if ($episode->video && file_exists(public_path($episode->video))) {
        unlink(public_path($episode->video));
    }

    // Delete the thumbnail file if it exists
    if ($episode->thumbnail && file_exists(public_path($episode->thumbnail))) {
        unlink(public_path($episode->thumbnail));
    }

    // Delete the episode from the database
    $episode->delete();

    return redirect()->route('all.episodes')->with('success', 'Episode deleted successfully.');
    }
}
