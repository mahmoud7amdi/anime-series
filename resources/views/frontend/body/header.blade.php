<?php
$categories = App\Models\Category::orderBy('name','ASC')->limit(4)->get();

?>


<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul >
                            <li class="active"><a href="{{ route('home') }}">@lang('trans.Homepage')</a></li>
                            <li><a href="/">@lang('trans.Categories')<span class="arrow_carrot-down"></span></a>
                                <ul  class="dropdown rounded" style="background-color: rgb(141, 125, 52)">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('category',$category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach


                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 mt-3">
            <form method="POST" action="{{  route('show.search') }}"   class="form-inline my-2 my-lg-0">
                @csrf
                <input class="form-control mr-sm-2" name="query" type="search" placeholder=@lang('trans.search') aria-label="Search">

            </form>
        </div>
        <div class="col-lg-2 my-2">
            <div class="header__nav">
                <nav class="header__menu mobile-menu">
                    <ul  >
                        <li ><a href="/">@lang('trans.lang') <span class="arrow_carrot-down"></span></a>

                            <ul  class="dropdown rounded" style="background-color: rgb(245, 234, 184)">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                     {{ $properties['native'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
            <div class="col-lg-1">
                <div class="header__nav"  style="color: red">
                    <ul>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a style="margin-right: 100px" class="nav-link" href="{{ route('login') }}">@lang('trans.login')</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">@lang('trans.Register')</a>
                                </li>
                            @endif
                        @else
                        <div class="header__nav" >
                            <nav class="header__menu mobile-menu">
                                <ul >
                                    <li><a href="/"> <span class="icon_profile"></span> @lang('trans.Acount') </a>
                                        <ul class="dropdown rounded" style="background-color: rgb(235, 220, 155)">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            @if (Auth::user()->role == 'admin')
                                                <li><a href="{{ route('admin.dashboard') }}">@lang('trans.Dashboard')</a></li>

                                            @else
                                            <li><a href="{{ route('dashboard') }}">@lang('trans.Dashboard')</a></li>
                                            @endif
                                            <li><a href="{{ route('follow.shows') }}">@lang('trans.Followed_Shows')</a></li>
                                            <li><a href="{{ route('logout') }}">@lang('trans.Logout')</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        @endguest

                    </ul>

                </div>
            </div>

        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
