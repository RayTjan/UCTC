@extends('layouts.app')
@section('title', 'Edit Action Plan')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Action Plan NameEvent</h1>
        </div>

        @auth()
            <div class="clearfix">
                {{-- auth to limit content, it cannot be accessed until login --}}
                <div class="float-right">
                    {{--                <a href="{{route('action.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New action</a>--}}
                    <a href="{{route('staff.action.create')}}" role="button" aria-pressed="true">
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
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">
                        <ul class="guiz-awards-row guiz-awards-header">
                            <li class="guiz-awards-header-star">&nbsp;</li>
                            <li class="guiz-awards-header-title">Name</li>
                            <li class="guiz-awards-header-time">Action</li>
                        </ul>

                        <?php $yes = 0; ?>
                        @foreach($program->hasPlan as $actionPlan)
                            <ul class="
                            @if($yes%2 == 0)
                                guiz-awards-row guiz-awards-row-even
                            @else
                                guiz-awards-row guiz-awards-row
                            @endif
                                quizz">
                                <a href="{{route('staff.action.show',$actionPlan)}}" class="a-none">
                                    <li class="guiz-awards-star">
                                <span class="star"></span>
                                    </li>
                                    <li class="guiz-awards-title">{{$actionPlan->name}}
                                        <div class="guiz-awards-subtitle">{{$actionPlan->description}}</div>
                                    </li>
                                    <li class="guiz-awards-time">
                                        <div class="dropdown">
                                            <div class="dropdown show">
                                                <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                        <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('staff.action.edit',$actionPlan)}}">Edit</a>
                                                    <a class="dropdown-item btnDelete" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                            <?php $yes += 1; ?>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
