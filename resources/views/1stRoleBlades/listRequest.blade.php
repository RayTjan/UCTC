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
            <h1 class="col font-weight-bold">Request Proposal List</h1>
        </div>

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
{{--                        @foreach($proposals as $proposal)--}}
{{--                            <ul class="--}}
{{--                            @if($yes%2 == 0)--}}
{{--                                guiz-awards-row guiz-awards-row-even--}}
{{--                            @else--}}
{{--                                guiz-awards-row guiz-awards-row--}}
{{--                            @endif--}}
{{--                                quizz">--}}
{{--                                <a href="{{route('admin.proposal.show',$proposal)}}" class="a-none">--}}
{{--                                    <li class="guiz-awards-star">--}}
{{--                                        <span class="star"></span>--}}
{{--                                    </li>--}}
{{--                                    <li class="guiz-awards-title">{{$proposal->name}}--}}
{{--                                        <div class="guiz-awards-subtitle">{{$proposal->description}}</div>--}}
{{--                                    </li>--}}
{{--                                    <li class="guiz-awards-time">--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <div class="dropdown show">--}}
{{--                                                <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">--}}
{{--                                                        <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}

{{--                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                                                    <a class="dropdown-item btnSuccess" href="{{route('admin.proposal.approve',$proposal)}}">Accept</a>--}}
{{--                                                    <a class="dropdown-item btnDelete" href="{{route('admin.proposal.reject',$proposal)}}">Reject</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </a>--}}
{{--                            </ul>--}}

{{--                        temporary for test--}}

                            <ul class="
                            @if($yes%2 == 0)
                                guiz-awards-row guiz-awards-row-even
                            @else
                                guiz-awards-row guiz-awards-row
                            @endif
                                quizz">
                                <a href="" class="a-none">
                                    <li class="guiz-awards-star">
                                        <span class="star"></span>
                                    </li>
                                    <li class="guiz-awards-title">Proposal Coding School
                                        <div class="guiz-awards-subtitle">Mohon diaccept gan</div>
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
                                                    <a class="dropdown-item btnSuccess" href="#">Accept</a>
                                                    <a class="dropdown-item btnDelete" href="#">Reject</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            </ul>

{{--                        temporary end, delete stelah slesai--}}

                            <?php $yes += 1; ?>
{{--                        @endforeach--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
