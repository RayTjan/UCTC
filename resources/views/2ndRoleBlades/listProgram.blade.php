@extends('layouts.app')
@section('title', 'Program')
@section('content')
    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Program View</h1>
        </div>

        @auth()
        <div class="clearfix">
            {{-- auth to limit content, it cannot be accessed until login --}}
            <div class="float-right">
{{--                <a href="{{route('program.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New Program</a>--}}
                <a href="{{route('staff.program.create')}}" role="button" aria-pressed="true">
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
                    <form action="{{route('staff.program.index')}}"
                          method="GET">
                        {{ csrf_field() }}
                        <button class="btn btn-primary btn-block" role="button"  type="submit">All</button>
                    </form>
                    @foreach($types as $type)
                        <form action="{{route('staff.program.filterProgramType')}}"
                              method="GET">
                            {{ csrf_field() }}
                            <input name="value" type="hidden" value="{{$type->id}}">
                            <button class="btn btn-primary btn-block" role="button"  type="submit">{{$type->name}}</button>
                        </form>
{{--                        <a href="{{route('staff.program.filterProgram')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">$type->name</a>--}}
                    @endforeach
                    @foreach($categories as $category)
                        <form action="{{route('staff.program.filterProgramCategory')}}"
                              method="GET">
                            {{ csrf_field() }}
                            <input name="value" type="hidden" value="{{$category->id}}">
                            <button class="btn btn-primary btn-block" role="button"  type="submit">{{$category->name}}</button>
                        </form>
                    @endforeach
                    <form action="{{route('staff.program.filterProgramStatus')}}"
                          method="GET">
                        {{ csrf_field() }}
                        <input name="value" type="hidden" value="1">
                        <button class="btn btn-primary btn-block" role="button"  type="submit">Ongoing</button>
                    </form>
                    <form action="{{route('staff.program.filterProgramStatus')}}"
                          method="GET">
                        {{ csrf_field() }}
                        <input name="value" type="hidden" value="2">
                        <button class="btn btn-primary btn-block" role="button"  type="submit">Finished</button>
                    </form>

            </div>
        </div>
        @endauth

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">
                        <ul class="guiz-awards-row guiz-awards-header">
                            <li class="guiz-awards-header-star">&nbsp;</li>
                            <li class="guiz-awards-header-title">Name</li>
                            <li class="guiz-awards-header-time">Date</li>
                        </ul>

                        <?php $yes = 0; ?>
                        @foreach($programs as $program)
                        <ul class="
                            @if($yes%2 == 0)
                                guiz-awards-row guiz-awards-row-even
                            @else
                                guiz-awards-row guiz-awards-row
                            @endif
                                quizz">
                            <a href="{{route('staff.program.show',$program)}}" class="a-none">
                            <li class="guiz-awards-star">
                                <span class="
                                    @if($program->category == 1)
                                    star cyanstar
                                    @elseif($program->category == 2)
                                    star purplestar
                                    @endif
                                "></span>
                            </li>
                            <li class="guiz-awards-title">{{$program->name}}
                                <div class="guiz-awards-subtitle">{{$program->goal}}</div>
                            </li>
                            <li class="guiz-awards-time">{{$program->program_date}}</li>
                            </a>
                        </ul>
                            <?php $yes += 1; ?>
                        @endforeach

                    </div>
                </div>
            </div>
{{--            <table class="table table-striped table-dark">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th scope="col">Title</th>--}}
{{--                    <th scope="col">View</th>--}}
{{--                    <th scope="col">Type</th>--}}
{{--                    <th scope="col">Category</th>--}}
{{--                    <th scope="col">Description</th>--}}
{{--                    <th scope="col">Status</th>--}}
{{--                    <th scope="col">Goal</th>--}}
{{--                    <th scope="col">Date</th>--}}
{{--                    <th scope="col">Created by</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($programs as $program)--}}
{{--                    <tr>--}}
{{--                        <td>{{$program->name}}</td>--}}
{{--                        <td><form action="{{ route('program.show' , $program)}}" method="POST">--}}
{{--                            <input name="_method" type="hidden" value="DELETE">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <button type="submit" class="btn btn-primary">View</button>--}}
{{--                        </form>--}}
{{--                        </td>--}}
{{--                        <td><a href="{{route('program.show',$program)}}">View</a></td>--}}
{{--                        <td>{{$program->categorized->name}}</td>--}}
{{--                        <td>{{$program->classified->name}}</td>--}}
{{--                        <td>{{$program->description}}</td>--}}
{{--                        <td>{{$program->status}}</td>--}}
{{--                        <td>{{$program->goal}}</td>--}}
{{--                        <td>{{$program->program_date}}</td>--}}
{{--                        <td>{{$program->creator->name}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
        </div>
    </div>
@endsection
