@extends('dashboard')
@section('main')

@include('frontend.home.show')
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @include('frontend.home.adventure_shows')


                @include('frontend.home.trending_shows')

                @include('frontend.home.recent_shows')

                @include('frontend.home.action_shows')

            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                @include('frontend.home.top_views')

        </div>
    </div>
</div>
@include('frontend.home.for_you')

</section>
@endsection
