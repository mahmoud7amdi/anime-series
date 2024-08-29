@extends('dashboard')
@section('main')

<style type="text/css">
    .videox{
        height: 564px;
        width: 1172px;
    }
</style>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <a href="#">{{ $show['category']['name'] }}</a>
                        <span>{{ $show->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player videox">
                        <video id="player"  playsinline controls data-poster="{{ asset($episode->thumbnail) }}">
                            <source    src="{{ asset($episode->video) }}"  type="video/mp4" />
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Name</h5>
                        </div>
                        @foreach ($episodes as $episode)
                        <a href="{{ route('anmie.watch',['show_id' => $show->id,'episode_name' => $episode->episode_name]) }}">EP{{ $episode->episode_name }}</a>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($comments as $comment)
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('frontend/assets/img/anime/review-1.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6> <strong>{{ $comment->user->name }}</strong> - <span>{{ $comment->created_at->format('Y-m-d H:i') }}</span> </h6>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    </div>
                        @endforeach


                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form  method="post" action="{{ route('store.comment',$show->id) }}" >
                            @csrf
                            <input type="hidden" name="show_id" value="{{ $show->id }}">
                            <textarea name="comment" placeholder="Add your comment" required></textarea>
                            <button type="submit">Post Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
{{-- public function store(Request $request)
{
    $request->validate([
        'episode_name' => 'required|string|max:255',
        'show_id' => 'required|exists:shows,id',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,ogg|max:50000',
    ]);
    $episode = new Episodes();
    $episode->episode_name = $request->episode_name;
    $episode->show_id = $request->show_id;

    if($request->file('thumbnail')){
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('thumbnail')->getClientOriginalExtension();
        $img = $manager->read($request->file('thumbnail'));
        $img = $img->resize(1172,564);
        $img->toJpeg(80)->save(base_path('public/upload/episode/thumbnails/'.$name_gen));
        $save_url = 'upload/episode/thumbnails/'.$name_gen;
    }
    $episode->thumbnail = $save_url;

    if ($request->hasFile('video')) {
        $video = $request->file('video');

        // Upload and resize video on Cloudinary
        $videoUpload = Cloudinary::uploadVideo($video->getRealPath(), [
            'folder' => 'episode/videos',
            'transformation' => [
                'width' => 1172,
                'height' => 564,
                'crop' => 'fit'
            ]
        ]);

        $episode->video = $videoUpload->getSecurePath();

        // Optionally, save the video in the local path as well
        $uploadPath = 'public/upload/episode/thumbnails';
        $fileName = time() . '_' . $video->getClientOriginalName();
        $video->storeAs($uploadPath, $fileName);

        // Store the local path if needed
        $episode->video= str_replace('public/', '', $uploadPath . '/' . $fileName);
    }
    $episode->save();




    // Handle video upload and resize


    return redirect()->route('all.episodes')->with('success', 'Episode created successfully.');
} --}}
