@extends('dashboard')
@section('main')



       <!-- Breadcrumb Begin -->
       <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>{{ $shows['category']['name'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ asset($shows->image) }}">
                            <div class="comment"><i class="fa fa-comments"></i> {{ $comments->count() }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $shows->uniqueViewersCount() }}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $shows->name }}</h3>

                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p>{{ $shows->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{ $shows->type }} </li>
                                            <li><span>Studios:</span> {{ $shows->studios }}</li>
                                            <li><span>Date aired:</span> {{ $shows->date_aired }}</li>
                                            <li><span>Status:</span> {{ $shows->status }}</li>
                                            <li><span>Category:</span> {{ $shows['category']['name'] }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Scores:</span> 7.31 / 1,515</li>
                                            <li><span>Rating:</span> 8.5 / 161 times</li>
                                            <li><span>Duration:</span> {{ $shows->duration }}</li>
                                            <li><span>Quality:</span> {{ $shows->quality }}</li>
                                            <li><span>Views:</span> {{ $shows->uniqueViewersCount() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.details.follow')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                           @include('frontend.details.comments')
                        </div>
                        @include('frontend.details.add_comment')
                    </div>
                    @include('frontend.details.rondom_shows')
                </div>
            </div>
        </section>
        <!-- Anime Section End -->




@endsection
