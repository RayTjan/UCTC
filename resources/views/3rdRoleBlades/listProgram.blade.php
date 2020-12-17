@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Program View</h1>
        </div>
        <div class="row">
            {{-- auth to limit content, it cannot be accessed until login --}}
            <div class="col-md-2">
                <a href="{{route('program.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New Program</a>
            </div>
        </div>
{{--        <div class="row" style="margin-top: 30px;">--}}
{{--            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>--}}
{{--            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">--}}
{{--            <div class="quiz-window">--}}
{{--                <div class="quiz-window-header">--}}
{{--                    <div class="quiz-window-title">Your Awards</div>--}}
{{--                    <button class="quiz-window-close">&times;</button>--}}
{{--                </div>--}}
{{--                <div class="quiz-window-body">--}}
{{--                    <div class="gui-window-awards">--}}
{{--                        <ul class="guiz-awards-row guiz-awards-header">--}}
{{--                            <li class="guiz-awards-header-star">&nbsp;</li>--}}
{{--                            <li class="guiz-awards-header-title">Award</li>--}}
{{--                            <li class="guiz-awards-header-track">This Track</li>--}}
{{--                            <li class="guiz-awards-header-time">All Time</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="guiz-awards-row guiz-awards-row-even">--}}
{{--                            <li class="guiz-awards-star"><span class="star goldstar"></span></li>--}}
{{--                            <li class="guiz-awards-title">Golden Star--}}
{{--                                <div class="guiz-awards-subtitle">90-100% correct answers</div>--}}
{{--                            </li>--}}
{{--                            <li class="guiz-awards-track">8</li>--}}
{{--                            <li class="guiz-awards-time">10</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="guiz-awards-row">--}}
{{--                            <li class="guiz-awards-star"><span class="star silverstar"></span></li>--}}
{{--                            <li class="guiz-awards-title">Silver Star--}}
{{--                                <div class="guiz-awards-subtitle">80-90% correct answers</div>--}}
{{--                            </li>--}}
{{--                            <li class="guiz-awards-track"><span class="null">0</span></li>--}}
{{--                            <li class="guiz-awards-time"><span class="null">0</span></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="guiz-awards-row guiz-awards-row-even">--}}
{{--                            <li class="guiz-awards-star"><span class="star bronzestar"></span></li>--}}
{{--                            <li class="guiz-awards-title">Bronze Star--}}
{{--                                <div class="guiz-awards-subtitle">70-80% correct answers</div></li>--}}
{{--                            <li class="guiz-awards-track">2</li>--}}
{{--                            <li class="guiz-awards-time">2</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="guiz-awards-row">--}}
{{--                            <li class="guiz-awards-star"><span class="star rhodiumstar"></span></li>--}}
{{--                            <li class="guiz-awards-title">Rhodium Star--}}
{{--                                <div class="guiz-awards-subtitle">60-70% correct answers</div></li>--}}
{{--                            <li class="guiz-awards-track"><span class="null">0</span></li>--}}
{{--                            <li class="guiz-awards-time"><span class="null">0</span></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="guiz-awards-row guiz-awards-row-even">--}}
{{--                            <li class="guiz-awards-star"><span class="star platinumstar"></span></li>--}}
{{--                            <li class="guiz-awards-title">Platinum Star--}}
{{--                                <div class="guiz-awards-subtitle">50-60% correct answers</div></li>--}}
{{--                            <li class="guiz-awards-track">2</li>--}}
{{--                            <li class="guiz-awards-time">2</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="guiz-awards-row">--}}
{{--                            <li class="guiz-awards-star"><span class="star"></span></li>--}}
{{--                            <li class="guiz-awards-title">Star</li>--}}
{{--                            <li class="guiz-awards-track"><span class="null">0</span></li>--}}
{{--                            <li class="guiz-awards-time"><span class="null">0</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="guiz-awards-buttons"><button class="guiz-awards-but-back"><i class="fa fa-angle-left"></i> Back</button></div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">View</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Goal</th>
                    <th scope="col">Date</th>
                    <th scope="col">Created by</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td>{{$program->name}}</td>
                        <td><form action="{{ route('program.show' , $program)}}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                        </td>
                        <td><a href="{{route('program.show',$program)}}">View</a></td>
                        <td>{{$program->categorized->name}}</td>
                        <td>{{$program->classified->name}}</td>
                        <td>{{$program->description}}</td>
                        <td>{{$program->status}}</td>
                        <td>{{$program->goal}}</td>
                        <td>{{$program->program_date}}</td>
                        <td>{{$program->creator->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
