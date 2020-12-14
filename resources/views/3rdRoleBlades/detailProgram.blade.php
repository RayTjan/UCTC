@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">{{$program->name}}</h1>
        </div>
        <h3>{{$program->program_date}}</h3>
        <form action="{{ route('program.destroy' , $program)}}" method="POST">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete Program</button>
        </form>
{{--        <div class="row">--}}
{{--            <div class="col-md-2">--}}
{{--                <a href="{{route('program.destroy', $program)}}" class="btn btn-danger btn-block" role="button" aria-pressed="true">Delete Program</a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <h3>{{$program->status}}</h3>
        <h4>Goal</h4>
        <p>{{$program->goal}}</p>
        <h4>Description</h4>
        <p>{{$program->description}}</p>
        <h4>Creator</h4>
        <p>{{$program->creator->name}}</p>
        <button type="button" class="btn btn-dark btn-circle float-right" title="Add Committee"
                data-toggle="modal"
                data-target="#addCommittee">Add</button>
        <br>
        <br>
        <div class="modal fade" id="addCommittee">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add committee to {{$program->title}} </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" style="text-align: left;">
                        @if(count($committeeList) > 0)
                            <p>{{$program->id}}</p>
                            <form action="{{route ('committee.store')}}" method="POST">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <input name="selected_program" type="hidden" value="{{$program->id}}">
                                    <label>Select Committee</label>
                                    <select name="user_id" class="custom-select" required>
                                        @foreach($committeeList as $committee)
                                            <option value="{{$committee->id}}" title="{{$committee->name}}">{{$committee->name}}</option>
                                        @endforeach
                                    </select>
                                    <input name="selected_program" type="hidden" value="{{$program->id}}">

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Add Committee</button>
                                </div>
                            </form>
                        @else
                            <h1 class="h4 mb-0 font-weight-bold">No free user left</h1>
                        @endif
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($program->committees as $committee)
                <tr>
                    <td>{{$committee->id}}</td>
                    <td>{{$committee->name}}</td>
                    <td>{{$committee->email}}</td>
                    <td>@if($committee->pivot->is_approved == 0) <p class="text-warning">Pending</p>
                        @elseif($committee->pivot->is_approved == 1) <p class="text-success">Approved</p>
                        @else <p class="text-danger">Rejected</p> @endif </td>
                    <td width="150px">
                        <div class="row no-gutters">
                            @if($committee->pivot->is_approved == 0)
                                <div class="col-md-6">
                                    <form action="{{route('committee.approve', $committee->id)}}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <input name="event_id" type="hidden" value="{{$program->id}}">
                                        <button class="btn btn-success btn-circle" title="Approve" type="submit"><i class="fas fa-check"></i></button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('committee.reject', $committee->id)}}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <input name="event_id" type="hidden" value="{{$program->id}}">
                                        <button class="btn btn-danger btn-circle" title="Reject" type="submit"><i class="fas fa-times"></i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
@endsection
