
<section class="hero" >
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($shows as $show)
            <div class="hero__items set-bg" data-setbg="{{ asset($show->image) }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{ $show['category']['name'] }}</div>
                            <h2>{{ $show->name }}</h2>
                            <p>{{ $show->description }}</p>
                            <a href="{{ route('anmie.watch',['show_id' => $show->id,'episode_name' => 1]) }}"><span>@lang('trans.watch-now')</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
