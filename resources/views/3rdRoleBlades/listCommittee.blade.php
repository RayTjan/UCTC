@extends('layouts.app')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Event-Name List Committees</h1>
        </div>

        @auth()
            <div class="clearfix">
                {{-- auth to limit content, it cannot be accessed until login --}}
                <div class="float-right">
                    {{--                <a href="{{route('program.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New Program</a>--}}
                    <a href="{{route('program.create')}}" role="button" aria-pressed="true">
                        <svg
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fad"
                            data-icon="angle-double-right"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                            class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x iconplus float-right"
                        >
                            <g>
                                <path
                                    fill="#000000"
                                    d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                                    class="fa-secondary">
                                </path>
                            </g>
                        </svg>
                    </a>

                </div>
            </div>
        @endauth

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Role</li>
                            <li class="guiz-awards-time customComittee">Email</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee">Tono</li>
                            <li class="guiz-awards-time customComittee">PIC</li>
                            <li class="guiz-awards-time customComittee">tonoia@gmial.com</li>
                            <li class="guiz-awards-time customComittee">Dosen</li>
                            <li class="guiz-awards-time customComittee">Lembur</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee">Fredo</li>
                            <li class="guiz-awards-time customComittee">Member</li>
                            <li class="guiz-awards-time customComittee">fredo@gmial.com</li>
                            <li class="guiz-awards-time customComittee">Mahasiswa</li>
                            <li class="guiz-awards-time customComittee">Unch</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
