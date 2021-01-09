@extends('layouts.app')
@section('title', 'Committee')
@section('content')

    <script>
        $(document).ready( function() {
        $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} Comittees List</h1>
        </div>

        @auth()
            <div class="clearfix">
                {{-- auth to limit content, it cannot be accessed until login --}}
                <div class="float-right">
                    {{--                <a href="{{route('program.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New Program</a>--}}
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
                                    fill="#000000"
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
                                <form action="{{route ('staff.committee.store')}}" method="POST">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <input name="selected_program" type="hidden" value="{{$program->id}}">
                                        <label>Select Committee</label>
                                        <select name="user_id" class="custom-select" required>
                                            @foreach($committeeList as $committee)
                                                <option value="{{$committee->id}}" title="{{$committee->identity->name}}">{{$committee->identity->name}}</option>
                                            @endforeach
                                        </select>
                                        <input name="selected_program" type="hidden" value="{{$program->id}}">

                                    </div>
                                    <div class="form-group">
                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Committee</button>
                                    </div>
                                </form>
                            @else
                                <h1 class="h4 mb-0 font-weight-bold">No free user left</h1>
                            @endif
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btnA circular redstar font-weight-bold p-2 red-hover" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Role</li>
                            <li class="guiz-awards-time customComittee">Email</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Action</li>
                        </ul>

                        @foreach($program->committees as $committee)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee">{{ $committee->identity->name }}</li>
                            <li class="guiz-awards-time customComittee">{{ $committee->role->name }}</li>
                            <li class="guiz-awards-time customComittee">{{ $committee->identity->email }}</li>
                            <li class="guiz-awards-time customComittee">
                                @if($committee->pivot->is_approved == 0) <div class="text-warning">Pending</div>
                                @elseif($committee->pivot->is_approved == 1) <div class="text-success">Approved</div>
                                @else <div class="text-danger">Rejected</div> @endif
                            </li>
                            @if($committee->pivot->is_approved == 0)
                            <li class="guiz-awards-time customComittee">
                                <div class="dropdown">
                                    <div class="dropdown show">
                                        <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <form action="{{route('staff.committee.approve', $committee->id)}}"
                                                         method="POST">
                                                {{ csrf_field() }}
                                                <input name="selected_program" type="hidden" value="{{$program->id}}">
                                                <button class="ml-2 dropdown-item btnA btnSuccess" title="Approve" type="submit">Accept</button>
                                            </form>
                                            <form action="{{route('staff.committee.reject', $committee->id)}}"
                                                  method="POST">
                                                {{ csrf_field() }}
                                                <input name="selected_program" type="hidden" value="{{$program->id}}">
                                                <button class="ml-2 dropdown-item btnA btnDelete" title="Reject" type="submit">Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                        </ul>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
