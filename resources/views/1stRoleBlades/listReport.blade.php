@extends('layouts.app')
@section('title', 'Report')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Request Report List</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Program</li>
                            <li class="guiz-awards-time customComittee">Finance</li>
                            <li class="guiz-awards-time customComittee">Action</li>
                        </ul>

                        @foreach($reports as $report)
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">
                                    @if(strlen($report->report) > 35)
                                        {{ substr($report->report,0,20)."..." }}
                                    @else
                                        {{ $report->report }}
                                    @endif
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    @if($report->status == '0')
                                        <div class="text-primary">Pending</div>
                                    @elseif($report->status == '1')
                                        <div class="text-success">Approved</div>
                                    @elseif($report->status == '2')
                                        <div class="text-danger">Rejected</div>
                                    @endif
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    {{$report->belongProgram->name}}
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <a href="/files/report/{{ $report->report }}" class="btn btn-success">Download</a>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <div class="dropdown">
                                        <div class="dropdown show">
                                            <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                    <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <form action="{{route('admin.report.approve', $report->id)}}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="ml-2 dropdown-item btnA btnSuccess" title="Approve" type="submit">Accept</button>
                                                </form>
                                                @if($report->status == '0')
                                                    <button class="ml-2 dropdown-item btnA btnDelete" title="Reject"
                                                            data-toggle="modal"
                                                            data-target="#rejectNote-{{$report->id}}">
                                                        Reject
                                                    </button>
                                                @elseif($report->status == '2')
                                                    <button class="ml-2 dropdown-item btnA" title="Reject"
                                                            data-toggle="modal"
                                                            data-target="#note-{{$report->id}}">
                                                        Reject Note
                                                    </button>
                                                @endif
                                                    <button type="submit" class="ml-2 dropdown-item btnA btnDelete"
                                                    data-toggle="modal"
                                                    data-target="#deleteReport-{{ $report->id }}">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            {{--            $report note--}}
                            <div class="modal fade" id="note-{{$report->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content card-bg-change">
                                        <!-- $report Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Note From Coor</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- $report body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <p>{{$report->note}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                                $report reject--}}
                            <div class="modal fade" id="rejectNote-{{$report->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content card-bg-change">
                                        <!-- $report Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Reject {{$report->name}} </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- $report body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <form action="{{route('admin.report.reject', $report->id)}}" class="p-0 m-0"
                                                  method="POST">
                                                <div class="form-group">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <div class="form-group">
                                                        <label>Note: </label>
                                                        <textarea type="text" class="form-control" name="note" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject Report</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--        Delete report--}}

                            <div class="modal fade" id="deleteReport-{{ $report->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure want to delete this {{ $report->report }} report ?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                            <form action="{{ route('admin.report.destroy', $report) }}" method="post" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover">Yes</button>
                                            </form>
                                            <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
