<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" dir="ltr">
    <div class="container">
        <a class="navbar-brand fst-italic" href="#page-top">PCP</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            {{ __('Menu') }}
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('front.home') }}">{{ __('Home') }}</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('front.about') }}">{{__('About') }}</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('front.contact') }}">{{__('Contact') }}</a></li>
                <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Categories') }}</a>
                    <ul class="dropdown-menu w-25">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="{{ route('front.langs', ['lang' => 'fa']) }}"><span class="fi fi-ir"></span></a></li>
                        <li><a class="dropdown-item" href="{{ route('front.langs', ['lang' => 'it']) }}"><span class="fi fi-it"></span></a></li> --}}
                    </ul>
                </li>
                <li class="nav-item mx-0 mx-lg-1 dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Lang') }}</a>
                    <ul class="dropdown-menu w-25">
                        <li><a class="dropdown-item" href="{{ route('front.langs', ['lang' => 'en']) }}"><span class="fi fi-gb"></span></a></li>
                        <li><a class="dropdown-item" href="{{ route('front.langs', ['lang' => 'fa']) }}"><span class="fi fi-ir"></span></a></li>
                        <li><a class="dropdown-item" href="{{ route('front.langs', ['lang' => 'it']) }}"><span class="fi fi-it"></span></a></li>
                    </ul>
                </li>
                @auth
                    <li class="nav-item mx-0 mx-lg-1 dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->full_name }}</a>
                        <ul class="dropdown-menu w-25">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li class="nav-item mx-0 mx-lg-1 d-flex text-white">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">
                            <i class="fa fa-lock"></i>
                        </a>
                        <span class="nav-link py-3 px-lg-0 px-2 rounded">/</span>
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
