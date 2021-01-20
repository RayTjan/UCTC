<nav class="navbar scrollNav">
    <ul class="navbar-nav">
        <li class="logo">
            @if(\Illuminate\Support\Facades\Auth::user()==null)
                <a href="{{ route('login') }}" class="nav-link">
                <span class="link-text logo-text">GUEST</span>
            @else
                <a href="
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    {{ route('coordinator.user.show',\Illuminate\Support\Facades\Auth::id()) }}
                @elseif(\Illuminate\Support\Facades\Auth::user()->isCreator())
                    {{ route('lecturer.user.show',\Illuminate\Support\Facades\Auth::id()) }}
                @elseif(\Illuminate\Support\Facades\Auth::user()->isUser())
                    {{ route('student.user.show',\Illuminate\Support\Facades\Auth::id()) }}
                @endif
                    " class="nav-link">
                    <span class="link-text logo-text">{{\Illuminate\Support\Facades\Auth::user()->identity->name}}</span>
                    @endif
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="angle-double-right"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
            </a>
        </li>

        @auth()
        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
            @include('tools.menu.admin')
        @elseif(\Illuminate\Support\Facades\Auth::user()->isCreator())
            @include('tools.menu.staff')
        @elseif(\Illuminate\Support\Facades\Auth::user()->isUser())
            @include('tools.menu.user')
        @endif
        @endauth

    </ul>
</nav>
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}
{{--                        <li class="nav-item " role="presentation">--}}
{{--                            <a class="nav-link active" href="{{ route('program.index') }}">--}}
{{--                                Program List--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <a class="nav-link active" href="{{ route('user.index') }}">--}}
{{--                                Student List--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <button class="btn btn-primary" onclick="myFunction()">Try Js</button>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
