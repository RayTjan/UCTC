@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{$program->name}}</h1>
        </div>
        <h3>{{$program->program_date}}</h3>
{{--        <form action="{{ route('program.destroy' , $program)}}" method="POST">--}}
{{--            {{ csrf_field() }}--}}
{{--            <input name="_method" type="hidden" value="DELETE">--}}
{{--            <button type="submit" class="btn btn-danger">Delete Program</button>--}}
{{--        </form>--}}

        <h6>{{$program->status}}</h6>
        <div class="ml-4">
            <h6 class="font-weight-bold">Goal</h6>
            <p class="ml-3">{{$program->goal}}</p>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular bluestar">
                    {{$program->creator->identity->name}}
{{--                    unchch--}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-2 font-weight-bold circular toscastar">
                    @if($program->category == 1)
                        Long-Term
                    @else
                        Short-Term
                    @endif
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular purplestar">
                    {{$program->status}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal :</h6>
                <p class="col-md-1 font-weight-bold circular greenstar">
                    Approved
                </p>
            </div>

            <h6 class="font-weight-bold">Description</h6>
            <p class="ml-3">{{$program->description}}</p>

        </div>

{{--        image--}}
        <div class="">
            <h2 class="col font-weight-bold text-center">Documentations</h2>

            <div class="container-fluid py-3">
                <div class="row">

{{--                    foreach here--}}
                    <div class="col-md-3 mb-lg-0" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded">
                            <img src="https://res.cloudinary.com/mhmd/image/upload/v1570786269/hoverSet-10_ccl30n.jpg" alt="image">
                            <button type="button"
                               data-toggle="modal"
                               data-target="#imgview">
                            <div class="hover-overlay">

                            </div>
                            </button>
                        </div>
                    </div>
{{--                    endforeach--}}

                    <div class="col-md-3 mb-lg-0" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded"><img src="https://res.cloudinary.com/mhmd/image/upload/v1570786269/hoverSet-10_ccl30n.jpg" alt="image">
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

{{--        modal image--}}

        <div class="modal fade" id="imgview">
            <div class="modal-dialog">
                <div class="modalpic-content">
                    <!-- Modal body -->
                    <div class="modalpic-body text-center">
                        <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1570786269/hoverSet-10_ccl30n.jpg" alt="image" class="card-img">
                    </div>
                </div>
            </div>
        </div>


        {{--        Option Menu--}}

        <div class="clearfix">
            <h5 class="float-right font-weight-bold">Budgeting</h5>
        </div>
        <div class="clearfix">
            <h3 class="float-right">Rp. 500.000</h3>
        </div>

        <div class="d-flex justify-content-between mb-5">
            <div>
                <a href="{{ route('committee.index') }}" class="circular yellowstar font-weight-bold p-2 yellow-hover">Committee</a>
                <a href="{{ route('action.index') }}" class="circular bluestar font-weight-bold p-2 blue-hover">Action Plan</a>
                <a href="{{ route('program.edit', $program) }}" class="circular purplestar font-weight-bold p-2 purple-hover">Edit</a>
            </div>
            <div>
                <button type="button"
                        data-toggle="modal"
                        data-target="#detailBudget"
                        class="btnA circular graystar font-weight-bold p-2 gray-hover">Detail</button>
            </div>
        </div>

{{--        Modal Detail Budget--}}

        <div class="modal fade zindex1050" id="detailBudget">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header card-bg-change">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="card-bg-change scrollWebkit height100 modalCustomBody">

                        {{--                    @foreach($budgets as $budget)--}}
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                    </div>

                    <div class="card-bg-change height100 modalCustomFooter">
                        <div class="absoluteFooter">
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Total</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>
                        </div>
                    </div>

                </div>
            </div>
         </div>

{{--        ray stuff--}}

        <button type="button" class="btn btn-dark btn-circle float-right" title="Add Committee"
                data-toggle="modal"
                data-target="#addCommittee">Recruit</button>

        <div class="modal fade" id="addCommittee">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add committee to {{$program->name}} </h4>
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
                                            <option value="{{$committee->id}}" title="{{$committee->identity->name}}">{{$committee->identity->name}}</option>
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
                    <td>{{$committee->identity->name}}</td>
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
                                        <input name="selected_program" type="hidden" value="{{$program->id}}">
                                        <button class="btn btn-success btn-circle" title="Approve" type="submit"><i class="fas fa-check"></i></button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('committee.reject', $committee->id)}}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <input name="selected_program" type="hidden" value="{{$program->id}}">
                                        <button class="btn btn-danger btn-circle" title="Reject" type="submit"><i class="fas fa-times"></i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="button" class="btn btn-dark btn-circle float-right" title="Add Action Plan"
                data-toggle="modal"
                data-target="#addActionPlan">Plan</button>
        <div class="modal fade" id="addActionPlan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add ActionPlan to {{$program->name}} </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" style="text-align: left;">
                        <form action="{{route ('action.store')}}" method="POST">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <label>Name</label>
                                <div class="form-group">
                                    <label >Name: </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label >Description:</label>
                                    <textarea class="form-control" name="description" required></textarea>
                                </div>
                                <input name="program" type="hidden" value="{{$program->id}}">

                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Add Action Plan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Tasks</th>
            </tr>
            @foreach($program->hasPlans as $action_plan)
                <td>{{$action_plan->id}}</td>
                <td>{{$action_plan->name}}</td>
                <td>{{$action_plan->description}}</td>
                <td>
                @foreach($action_plan->hasTasks as $task)
                    <p>{{$task->name}} due {{$task->due_date}}</p>
                @endforeach
                    <button type="button" class="btn btn-dark btn-circle float-right" title="Add Task"
                            data-toggle="modal"
                            data-target="#addTask">New Task</button>
                    <div class="modal fade" id="addTask">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Task to {{$action_plan->name}} </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: left;">
                                    <form action="{{route ('task.store')}}" method="POST">
                                        <div class="form-group">
                                            {{ csrf_field() }}
                                            <label>Name</label>
                                            <div class="form-group">
                                                <label >Name: </label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Description:</label>
                                                <textarea class="form-control" name="description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Due Date:</label>
                                                <input type="date" class="form-control" name="due_date" required>
                                            </div>
                                            <label>Select PIC</label>
                                            <select name="PIC" class="custom-select" required>
                                                @foreach($committees as $participated)
                                                    <option value="{{$participated->id}}" title="{{$participated->identity->name}}">{{$participated->email}}</option>
                                                @endforeach
                                            </select>
                                            <input name="action_plan" type="hidden" value="{{$action_plan->id}}">

                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Add Action Plan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            @endforeach
        </table>
        </div>
    </div>
@endsection
