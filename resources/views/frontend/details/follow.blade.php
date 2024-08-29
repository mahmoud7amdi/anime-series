<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
</div>

@if(Auth::user())
@if(auth()->user()->follows->contains('show_id', $shows->id))
        <div class="anime__details__btn">
            @if(Auth::user())
            <form action="{{ route('shows.unfollow', $shows->id) }}" method="POST">
                @csrf
            <button type="submit" class="follow-btn"><i class="fa fa-heart-o"></i>Un Follow</button>
        </form>
        @endif

            <a href="{{ route('anmie.watch',['show_id' => $shows->id,'episode_name' => 1]) }}" class="watch-btn"><span>Watch Now</span> <i
                class="fa fa-angle-right mt-2"></i></a>

        </div>



@else

        <div class="anime__details__btn">
            @if(Auth::user())
            <form action="{{ route('shows.follow', $shows->id) }}" method="POST">
                @csrf
            <button type="submit" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</button>
        </form>
        @endif

            <a href="{{ route('anmie.watch',['show_id' => $shows->id,'episode_name' => 1]) }}" class="watch-btn"><span>Watch Now</span> <i
                class="fa fa-angle-right mt-2"></i></a>

        </div>

        @endif
        @else
        <div class="anime__details__btn">
            @if(Auth::user())
            <form action="{{ route('shows.follow', $shows->id) }}" method="POST">
                @csrf
            <button type="submit" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</button>
        </form>
        @endif

            <a href="{{ route('anmie.watch',['show_id' => $shows->id,'episode_name' => 1]) }}" class="watch-btn"><span>Watch Now</span> <i
                class="fa fa-angle-right mt-2"></i></a>
        </div>
@endif
{{-- <div class="anime__details__btn">
    <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
    <a href="#" class="watch-btn"><span>Watch Now</span> <i
        class="fa fa-angle-right"></i></a>
    </div>
</div> --}}
