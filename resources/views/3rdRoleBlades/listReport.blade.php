@extends('layouts.app')
@section('title', 'Report')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">

        {{--        navigation--}}
        <div>
            <a href="{{route('student.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Program</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('student.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Detail</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('student.report.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Report</h6>
            </a>
        </div>

        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} Report</h1>
        </div>

        @if($edit == true)
            @if($addAvailability == true)
            <div class="clearfix">
                <div class="float-right">
                    <a href="#"
                       title="Add Report"
                       data-toggle="modal"
                       data-target="#addReport">
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
            @endif
            {{--            modal add report--}}
            <div class="modal fade" id="addReport">
                <div class="modal-dialog">
                    <div class="modal-content card-bg-change">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Add report to {{$program->name}} </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="text-align: left;">
                            <form action="{{route ('student.report.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <input name="selected_program" type="hidden" value="{{$program->id}}">
                                    <label>Upload Your Report Here</label>
                                    <input type="file" name="report" class="form-control-file" required>
                                    <input type="hidden" name="statusReport" value="0">
                                    <input type="hidden" name="program" value="{{ $program->id }}">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Report</button>
                                </div>
                            </form>
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
                            <li class="guiz-awards-time customComittee font-weight-bold">Name</li>
                            <li class="guiz-awards-time customComittee font-weight-bold">Status</li>
                            @if($edit == true)
                                <li class="guiz-awards-time customComittee font-weight-bold">Replace</li>
                            @endif
                            <li class="guiz-awards-time customComittee font-weight-bold">Download</li>
                            @if($edit == true)
                                <li class="guiz-awards-time customComittee font-weight-bold">Delete</li>
                            @endif
                        </ul>

                        @foreach($reports as $report)
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">
                                    @if(strlen($report->report) > 20)
                                        {{ substr($report->report,0,20)."..." }}
                                    @else
                                        {{ $report->report }}
                                    @endif
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    @if($report->status == '0')
                                        <div class="text-info">Pending</div>
                                    @elseif($report->status == '1')
                                        <div class="text-success">Approved</div>
                                    @elseif($report->status == '2')
                                        <div class="d-flex justify-content-center">
                                            <button class="btnA circular redstar red-hover iconAct iconAct align-self-center mr-2" title="note"
                                                    data-toggle="modal"
                                                    data-target="#note-{{$report->id}}">
                                                <div class="d-flex justify-content-center">
                                                    <i class="fa fa-sticky-note align-self-center"></i>
                                                </div>
                                            </button>
                                            <div class="text-danger d-inline-block align-self-center">Rejected</div>
                                        </div>
                                    @endif
                                </li>
                                @if($edit == true)
                                    @if($report->status == 0)
                                        <li class="guiz-awards-time customComittee">
                                            <button type="submit" class="btn btn-primary"
                                                    title="Edit Report"
                                                    data-toggle="modal"
                                                    data-target="#replaceReport-{{$report->id}}">
                                                Replace
                                            </button>
                                        </li>

                                        {{--                                    modal edit report--}}
                                        <div class="modal fade" id="replaceReport-{{$report->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content card-bg-change">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold">Replace Report</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body" style="text-align: left;">
                                                        <form action="{{route ('student.report.update', $report)}}" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input name="selected_program" type="hidden" value="{{$program->id}}">
                                                                <label>Replace report {{ $report->report }} with ...</label>
                                                                <input type="file" name="report" class="form-control-file" required>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <button class="btnA circular bluestar p-2 blue-hover" type="submit">Replace Report</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @else
                                        <li class="guiz-awards-time customComittee">
                                            <form action="" method="get">
                                                <button type="submit" class="btn btn-primary disabled">Replace</button>
                                            </form>
                                        </li>
                                    @endif
                                @endif
                                <li class="guiz-awards-time customComittee">
                                    <a href="/files/report/{{ $report->report }}" class="btn btn-success">Download</a>
                                </li>
                                @if($edit == true)
                                    <li class="guiz-awards-time customComittee">
                                        <button
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#deleteReport-{{ $report->id }}"
                                            class="btn btn-danger">
                                            Delete
                                        </button>
                                    </li>
                                @endif
                            </ul>

                            {{--        Delete Report--}}

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
                                            <form action="{{ route('student.report.destroy', $report) }}" method="post" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                            </form>
                                            <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--            modal note--}}
                            <div class="modal fade" id="note-{{$report->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-change-red">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold titlelogin">Note From Coor</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <p class="titlelogin">{{$report->note}}</p>
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
