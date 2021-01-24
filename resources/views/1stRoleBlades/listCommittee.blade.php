@extends('layouts.app')
@section('title', 'Committee')
@section('content')
    <div class="container clearfix" style="margin-top: 20px;">

        {{--        navigation--}}
        <div>
            <a href="{{route('coordinator.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Program</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('coordinator.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Detail</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('coordinator.committee.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Committee</h6>
            </a>
        </div>

        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} Comittees List</h1>
        </div>

            @if($program->status != '2')
            <div class="clearfix">
                {{-- auth to limit content, it cannot be accessed until login --}}
                <div class="float-right">
                    <a href="#"
                            title="Add Committee"
                            data-toggle="modal"
                            data-target="#addCommittee">
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
                                    fill="#fff"
                                    d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                                    class="fa-secondary">
                                </path>
                            </g>
                        </svg>
                    </a>

                </div>
            </div>

{{--            modal add committee--}}
            <div class="modal fade" id="addCommittee">
                <div class="modal-dialog">
                    <div class="modal-content card-bg-change">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Add committee to {{$program->name}} </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="text-align: left;">
                            @if(count($committeeList) > 0)
                                <form action="{{route ('coordinator.committee.store')}}" method="POST">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <input name="selected_program" type="hidden" value="{{$program->id}}">
                                        <label>Select Committee</label>
                                        <select name="user_id" class="custom-select" required>
                                            @foreach($committeeList as $committee)
                                                <option value="{{$committee->id}}" title="{{$committee->identity->name}}">{{$committee->identity->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Committee</button>
                                    </div>
                                </form>
                            @else
                                <h1 class="h4 mb-0 font-weight-bold">No free user left</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Name</li>
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Gender</li>
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Email</li>
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Access</li>
                        </ul>

                        @foreach($program->committees as $committee)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee">{{ $committee->identity->name }}</li>
                            <li class="guiz-awards-time customComittee">
                                @if($committee->identity->gender == 'M')
                                    Male
                                @elseif($committee->identity->gender == 'F')
                                    Female
                                @endif
                            </li>
                            <li class="guiz-awards-time customComittee">{{ $committee->identity->email }}</li>
                            <li class="guiz-awards-time customComittee">{{ $committee->role->name }}</li>
                        </ul>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
