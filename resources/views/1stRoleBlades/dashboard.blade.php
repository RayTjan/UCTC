@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">Welcome to UCTC</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Coordinator</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative mb-2">
                    <h3 class="font-weight-bold">Programs</h3>
                    <a href="{{ route('coordinator.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                @foreach($allprogramssort as $program)
                    <!-- ./col -->
                        <div class="col-lg-3 col-6 position-relative" >
                            <!-- small box -->

                            <div class="small-box card-bg-change position-relative shadowCard">

                                @if($program->status == '0')
                                    <div class="starCard yellowstar"></div>
                                @elseif($program->status == '1')
                                    <div class="starCard toscastar"></div>
                                @elseif($program->status == '2')
                                    <div class="starCard greenstar"></div>
                                @elseif($program->status == '3')
                                    <div class="starCard redstar"></div>
                                @endif

                                <div class="inner ml-2 position-relative">
                                    <h2 class="nameForm maxline font">{{$program->name}}</h2>
                                    <div>{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</div>
                                    <a class="dropdown-button a-none circular darkbluestar yellow-hover actionDash iconAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-list"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        {{--                                                    Approve--}}
                                        @if($program->status == '0' || $program->status == '3')
                                            <form action="{{ route('coordinator.program.approve', $program->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="pl-2 btnA dropdown-item btnSuccess">Approve</button>
                                            </form>
                                        @endif
                                        {{--                                                    Suspend--}}
                                        @if($program->status != '2' && $program->status != '3')
                                            <button class="pl-2 btnA dropdown-item btnDelete" title="Reject"
                                                    data-toggle="modal"
                                                    data-target="#suspendNote-{{$program->id}}">
                                                Suspend
                                            </button>
                                        @endif
                                        {{--                                                    Delete--}}
                                        <form action="{{ route('coordinator.program.destroy', $program) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="pl-2 btnA dropdown-item btnDelete">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <a href="{{route('coordinator.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div  class="smol3">
                <div class="">
                    <div class="position-relative mb-2">
                        <h3 class="font-weight-bold">Report Request List</h3>
                        <a href="{{ route('coordinator.report.index') }}" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-bluess" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <ul class="todo-list">

                                @foreach($reports as $report)
                                    <li>
                                        <!-- iconAct -->
                                        <div class="d-inline-block">
                                            {{--                                    download--}}
                                            <form action="/files/report/{{ $report->report }}" class="p-0 m-0 d-inline-block"
                                                  method="GET">
                                                <button class="btnA circular greenstar green-hover iconAct p-1" title="Download">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </form>

                                            @if($report->status == '0' || $report->status == '2')
                                                {{--                                    approve--}}
                                                <form action="{{route('coordinator.report.approve', $report->id)}}" class="p-0 m-0 d-inline-block"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="btnA circular greenstar green-hover iconAct p-1 " title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            {{--                                    reject note--}}
                                            @if($report->status == '2')
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct p-1" title="reject Note"
                                                            data-toggle="modal"
                                                            data-target="#note-{{$report->id}}">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </button>
                                                </div>
                                            @endif

                                            @if($report->status != '1' && $report->status != '2')
                                                {{--                                    reject--}}
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct p-1" title="reject"
                                                            title="reject"
                                                            data-toggle="modal"
                                                            data-target="#rejectNote-{{$report->id}}">
                                                        <i class="fa fa-stop"></i>
                                                    </button>
                                                </div>
                                            @endif

                                            {{--                                                                            reject--}}
                                            <div class="d-inline-block">
                                                <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                        data-toggle="modal"
                                                        data-target="#deletereport-{{$report->id}}">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- todo text -->
                                        <span class="text">
                                        @if(strlen($report->report) > 10)
                                                {{ substr($report->report,0,10)."..." }}
                                            @else
                                                {{ $report->report }}
                                            @endif
                                    </span>
                                        <div class="float-right">
                                            {{ $report->belongProgram->name }}
                                        </div>
                                    </li>

                                @endforeach


                            </ul>


                        </div>
                    </div>
                </div>
            </div>


            <div class="smol2">
                <div class="">
                    <div class="position-relative mb-2">
                        <h3 class="font-weight-bold">Proposal Request List</h3>
                        <a href="{{ route('coordinator.proposal.index') }}" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body inner-bg-yellow" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <ul class="todo-list">

                                @foreach($proposals as $proposal)
                                    <li>
                                        <!-- iconAct -->
                                        <div class="d-inline-block">
                                            {{--                                    download--}}
                                            <form action="/files/proposal/{{ $proposal->proposal }}" class="p-0 m-0 d-inline-block"
                                                  method="GET">
                                                <button class="btnA circular greenstar green-hover iconAct p-1" title="Detail">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </form>

                                            @if($proposal->status == '0' || $proposal->status == '2')
                                                {{--                                    approve--}}
                                                <form action="{{route('coordinator.proposal.approve', $proposal->id)}}" class="p-0 m-0 d-inline-block"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="btnA circular greenstar green-hover iconAct p-1 " title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            {{--                                    reject note--}}
                                            @if($proposal->status == '2')
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct p-1" title="reject Note"
                                                            data-toggle="modal"
                                                            data-target="#note-{{$proposal->id}}">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </button>
                                                </div>
                                            @endif

                                            @if($proposal->status != '1' && $proposal->status != '2')
                                                {{--                                    reject--}}
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct p-1" title="reject"
                                                            title="reject"
                                                            data-toggle="modal"
                                                            data-target="#rejectNote-{{$proposal->id}}">
                                                        <i class="fa fa-stop"></i>
                                                    </button>
                                                </div>
                                            @endif

    {{--                                                                            reject--}}
                                            <div class="d-inline-block">
                                                <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                        data-toggle="modal"
                                                        data-target="#deleteProposal-{{$proposal->id}}">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- todo text -->
                                        <span class="text">
                                            @if(strlen($proposal->proposal) > 10)
                                                {{ substr($proposal->proposal,0,10)."..." }}
                                            @else
                                                {{ $proposal->proposal }}
                                            @endif
                                        </span>
                                        <div class="float-right">
                                            {{ $proposal->belongProgram->name }}
                                        </div>
                                    </li>

                                @endforeach


                            </ul>


                        </div>
                    </div>
                </div>
            </div>



{{--                kumpulan modal modal--}}
                @foreach($proposals as $proposal)
                    {{--                                modal reject--}}
                    <div class="modal fade" id="rejectNote-{{$proposal->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content card-bg-change">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold">Reject {{$proposal->proposal}} </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: left;">
                                    <form action="{{route('coordinator.proposal.reject', $proposal->id)}}" class="p-0 m-0"
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
                                            <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject Proposal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

{{--                    modal delete proposal--}}
                    <div class="modal fade" id="deleteProposal-{{$proposal->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Are you sure want to delete this {{ $proposal->proposal }} Proposal ?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                    <form action="{{ route('coordinator.proposal.destroy', $proposal) }}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                    </form>
                                    <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach($reports as $report)
                    {{--                                modal reject--}}
                    <div class="modal fade" id="rejectNote-{{$report->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content card-bg-change">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold">Reject {{$report->report}} </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: left;">
                                    <form action="{{route('coordinator.report.reject', $report->id)}}" class="p-0 m-0"
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
                                            <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject report</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    modal delete report--}}
                    <div class="modal fade" id="deletereport-{{$report->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Are you sure want to delete this {{ $report->report }} report ?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                    <form action="{{ route('coordinator.report.destroy', $report) }}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                    </form>
                                    <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($funds as $fund)
                {{--                                modal reject--}}
                <div class="modal fade" id="rejectNote-{{$fund->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content card-bg-change">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h6 class="modal-title font-weight-bold">Edit {{$fund->name}} </h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left;">
                                <form action="{{route('coordinator.fund.reject', $fund->id)}}" class="p-0 m-0"
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
                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject fund</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            @foreach($allprogramssort as $program)
                {{--                                modal suspend--}}
                <div class="modal fade" id="suspendNote-{{$program->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content card-bg-change">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold">Suspend {{$program->name}} </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left;">
                                <form action="{{route('coordinator.program.suspend', $program->id)}}" class="p-0 m-0"
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
                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Suspend Program</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="smol4">
                <div class="position-relative mb-2">
                    <h3 class="font-weight-bold">Request Disbursement of Funds</h3>
                    <a href="{{ route('coordinator.fund.index') }}" class="seeall">see all</a>
                </div>
                <div class="container-fluid">
                    <div class="d-flex boxScroll">
                    @foreach($funds as $fund)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <h4 class="maxlineP">{{$fund->name}}</h4>
                                        </div>
                                        <div>Value</div>
                                        <h3 class="card-title maxlineP">Rp. {{$fund->value}}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <div class="stats">
                                                {{ str_replace("-","/",date("d-m-Y", strtotime($fund->date))) }}
                                            </div>

                                            <div class="dropdown">
                                                <div class="dropdown show">
                                                    <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                            <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <form action="{{ route('coordinator.fund.approve', $fund->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="pl-2 btnA dropdown-item btnSuccess">Accept</button>
                                                        </form>
                                                        <button class="pl-2 btnA dropdown-item btnDelete" title="Reject"
                                                                data-toggle="modal"
                                                                data-target="#rejectNote-{{$fund->id}}">
                                                            Reject
                                                        </button>
                                                        <form action="{{ route('coordinator.fund.destroy', $fund) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="pl-2 btnA dropdown-item btnDelete">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
