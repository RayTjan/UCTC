<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            @if(\Illuminate\Support\Facades\Auth::user()==null)
                <a href="{{ route('login') }}" class="nav-link">
                <span class="link-text logo-text">GUEST</span>
            @else
                <a href="{{ route('user.show',\Illuminate\Support\Facades\Auth::id()) }}" class="nav-link">
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
        <li class="nav-item">
            <a href="/" class="nav-link">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="space-station-moon-alt"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="svg-inline--fa fa-space-station-moon-alt fa-w-16 fa-5x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="m197.332,0h-160c-20.586,0 -37.332,16.746 -37.332,37.332v96c0,20.59 16.746,37.336 37.332,37.336h160c20.59,0 37.336,-16.746 37.336,-37.336v-96c0,-20.586 -16.746,-37.332 -37.336,-37.332zM197.332,0"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="m197.332,213.332h-160c-20.586,0 -37.332,16.746 -37.332,37.336v224c0,20.586 16.746,37.332 37.332,37.332h160c20.59,0 37.336,-16.746 37.336,-37.332v-224c0,-20.59 -16.746,-37.336 -37.336,-37.336zM197.332,213.332"
                            class="fa-primary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="m474.668,341.332h-160c-20.59,0 -37.336,16.746 -37.336,37.336v96c0,20.586 16.746,37.332 37.336,37.332h160c20.586,0 37.332,-16.746 37.332,-37.332v-96c0,-20.59 -16.746,-37.336 -37.332,-37.336zM474.668,341.332"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="m474.668,0h-160c-20.59,0 -37.336,16.746 -37.336,37.332v224c0,20.59 16.746,37.336 37.336,37.336h160c20.586,0 37.332,-16.746 37.332,-37.336v-224c0,-20.586 -16.746,-37.332 -37.332,-37.332zM474.668,0"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('program.index') }}" class="nav-link">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="cat"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="svg-inline--fa fa-cat fa-w-16 fa-9x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M86.204,67.918h31.347c1.443,0 2.612,-1.17 2.612,-2.612V2.612c0,-1.443 -1.169,-2.612 -2.612,-2.612H86.204c-1.443,0 -2.612,1.17 -2.612,2.612v62.694C83.592,66.749 84.761,67.918 86.204,67.918z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M367.804,47.02h-38.661v16.718c0,9.927 -7.314,19.853 -17.241,19.853h-30.824c-10.637,-0.754 -19.099,-9.216 -19.853,-19.853V47.02H135.837v16.718c-0.754,10.637 -9.216,19.099 -19.853,19.853H85.159c-9.927,0 -17.241,-9.927 -17.241,-19.853V47.02H29.257C15.9,47.305 5.221,58.216 5.224,71.576v64.261h386.612V71.576C391.84,58.216 381.161,47.305 367.804,47.02z"
                            class="fa-primary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M279.51,67.918h31.347c1.443,0 2.612,-1.17 2.612,-2.612V2.612c0,-1.443 -1.17,-2.612 -2.612,-2.612H279.51c-1.443,0 -2.612,1.17 -2.612,2.612v62.694C276.898,66.749 278.067,67.918 279.51,67.918z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M5.224,373.551c0.284,13.068 10.961,23.513 24.033,23.51h338.547c13.071,0.003 23.748,-10.442 24.033,-23.51V151.51H5.224V373.551zM102.4,247.641c0.834,-2.854 3.312,-4.919 6.269,-5.224l53.812,-8.359l24.033,-48.588c2.159,-3.751 6.951,-5.041 10.702,-2.882c1.198,0.69 2.192,1.684 2.882,2.882l24.033,48.588l53.812,8.359c2.957,0.305 5.436,2.371 6.269,5.224c0.948,2.795 0.124,5.885 -2.09,7.837l-38.661,37.616l9.404,53.812c0.363,2.827 -0.838,5.628 -3.135,7.314c-1.373,0.986 -3.012,1.532 -4.702,1.567c-1.307,0.124 -2.613,-0.249 -3.657,-1.045l-48.065,-25.078l-48.065,25.078c-2.62,1.596 -5.958,1.388 -8.359,-0.522c-2.297,-1.687 -3.497,-4.488 -3.135,-7.314l9.404,-53.812l-38.661,-37.616C102.276,253.526 101.452,250.435 102.4,247.641z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Programs</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="alien-monster"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512"
                    class="svg-inline--fa fa-alien-monster fa-w-18 fa-9x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M230.432,0c-65.829,0 -119.641,53.812 -119.641,119.641s53.812,119.641 119.641,119.641s119.641,-53.812 119.641,-119.641S296.261,0 230.432,0z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M435.755,334.89c-3.135,-7.837 -7.314,-15.151 -12.016,-21.943c-24.033,-35.527 -61.126,-59.037 -102.922,-64.784c-5.224,-0.522 -10.971,0.522 -15.151,3.657c-21.943,16.196 -48.065,24.555 -75.233,24.555s-53.29,-8.359 -75.233,-24.555c-4.18,-3.135 -9.927,-4.702 -15.151,-3.657c-41.796,5.747 -79.412,29.257 -102.922,64.784c-4.702,6.792 -8.882,14.629 -12.016,21.943c-1.567,3.135 -1.045,6.792 0.522,9.927c4.18,7.314 9.404,14.629 14.106,20.898c7.314,9.927 15.151,18.808 24.033,27.167c7.314,7.314 15.673,14.106 24.033,20.898c41.273,30.825 90.906,47.02 142.106,47.02s100.833,-16.196 142.106,-47.02c8.359,-6.269 16.718,-13.584 24.033,-20.898c8.359,-8.359 16.718,-17.241 24.033,-27.167c5.224,-6.792 9.927,-13.584 14.106,-20.898C436.8,341.682 437.322,338.024 435.755,334.89z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Users</span>
            </a>
        </li>



        <li class="nav-item">
            <a href="/test" class="nav-link">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="space-shuttle"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 512"
                    class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M32 416c0 35.35 21.49 64 48 64h16V352H32zm154.54-232h280.13L376 168C243 140.59 222.45 51.22 128 34.65V160h18.34a45.62 45.62 0 0 1 40.2 24zM32 96v64h64V32H80c-26.51 0-48 28.65-48 64zm114.34 256H128v125.35C222.45 460.78 243 371.41 376 344l90.67-16H186.54a45.62 45.62 0 0 1-40.2 24z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M592.6 208.24C559.73 192.84 515.78 184 472 184H186.54a45.62 45.62 0 0 0-40.2-24H32c-23.2 0-32 10-32 24v144c0 14 8.82 24 32 24h114.34a45.62 45.62 0 0 0 40.2-24H472c43.78 0 87.73-8.84 120.6-24.24C622.28 289.84 640 272 640 256s-17.72-33.84-47.4-47.76zM488 296a8 8 0 0 1-8-8v-64a8 8 0 0 1 8-8c31.91 0 31.94 80 0 80z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Template Gan</span>
            </a>
        </li>

        <li class="nav-item" id="themeButton">
            <a href="#" class="nav-link">
                <svg
                    class="theme-icon"
                    id="lightIcon"
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="moon-stars"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>

            </a>
        </li>
        <li>
                <svg
                    class="theme-icon"
                    id="solarIcon"
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="sun"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    class="svg-inline--fa fa-sun fa-w-16 fa-7x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <svg
                    class="theme-icon"
                    id="darkIcon"
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="sunglasses"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512"
                    class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M574.09 280.38L528.75 98.66a87.94 87.94 0 0 0-113.19-62.14l-15.25 5.08a16 16 0 0 0-10.12 20.25L395.25 77a16 16 0 0 0 20.22 10.13l13.19-4.39c10.87-3.63 23-3.57 33.15 1.73a39.59 39.59 0 0 1 20.38 25.81l38.47 153.83a276.7 276.7 0 0 0-81.22-12.47c-34.75 0-74 7-114.85 26.75h-73.18c-40.85-19.75-80.07-26.75-114.85-26.75a276.75 276.75 0 0 0-81.22 12.45l38.47-153.8a39.61 39.61 0 0 1 20.38-25.82c10.15-5.29 22.28-5.34 33.15-1.73l13.16 4.39A16 16 0 0 0 180.75 77l5.06-15.19a16 16 0 0 0-10.12-20.21l-15.25-5.08A87.95 87.95 0 0 0 47.25 98.65L1.91 280.38A75.35 75.35 0 0 0 0 295.86v70.25C0 429 51.59 480 115.19 480h37.12c60.28 0 110.38-45.94 114.88-105.37l2.93-38.63h35.76l2.93 38.63c4.5 59.43 54.6 105.37 114.88 105.37h37.12C524.41 480 576 429 576 366.13v-70.25a62.67 62.67 0 0 0-1.91-15.5zM203.38 369.8c-2 25.9-24.41 46.2-51.07 46.2h-37.12C87 416 64 393.63 64 366.11v-37.55a217.35 217.35 0 0 1 72.59-12.9 196.51 196.51 0 0 1 69.91 12.9zM512 366.13c0 27.5-23 49.87-51.19 49.87h-37.12c-26.69 0-49.1-20.3-51.07-46.2l-3.12-41.24a196.55 196.55 0 0 1 69.94-12.9A217.41 217.41 0 0 1 512 328.58z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M64.19 367.9c0-.61-.19-1.18-.19-1.8 0 27.53 23 49.9 51.19 49.9h37.12c26.66 0 49.1-20.3 51.07-46.2l3.12-41.24c-14-5.29-28.31-8.38-42.78-10.42zm404-50l-95.83 47.91.3 4c2 25.9 24.38 46.2 51.07 46.2h37.12C489 416 512 393.63 512 366.13v-37.55a227.76 227.76 0 0 0-43.85-10.66z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Themify</span>
            </a>
        </li>
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
{{--                                User List--}}
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
