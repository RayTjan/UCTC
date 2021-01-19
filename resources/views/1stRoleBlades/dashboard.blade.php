@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container" style="margin-top: 20px;">
        <h1 class="font-weight-bold">DASHBOARD</h1>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Recents Program</h3>
                    <a href="{{ route('admin.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                @foreach($allprograms as $program)
                    <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            @if($program->status == '0')
                                <div class="small-box inner-bg-yellow">
                                    <div class="inner inner-bg-yellow">
                            @elseif($program->status == '1')
                                <div class="small-box inner-bg-cyan">
                                    <div class="inner inner-bg-cyan">
                            @elseif($program->status == '2')
                                <div class="small-box inner-bg-green">
                                    <div class="inner inner-bg-green">
                            @elseif($program->status == '3')
                                <div class="small-box inner-bg-red">
                                    <div class="inner inner-bg-red">
                            @endif
                                    <h2 class="font-weight-bold">{{$program->name}}</h2>
                                    <p>{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</p>
                                </div>
                                <a href="{{route('admin.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div  class="smol3">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">Report Request List</h3>
                        <a href="{{ route('admin.report.index') }}" class="seeall">see all</a>
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
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1" title="Detail">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </form>

                                            @if($report->status == '0' || $report->status == '2')
                                                {{--                                    approve--}}
                                                <form action="{{route('admin.report.approve', $report->id)}}" class="p-0 m-0 d-inline-block"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            {{--                                    reject note--}}
                                            @if($report->status == '2')
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject Note"
                                                            data-toggle="modal"
                                                            data-target="#note-{{$report->id}}">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </button>
                                                </div>
                                            @endif

                                            @if($report->status != '1' && $report->status != '2')
                                                {{--                                    reject--}}
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject"
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
                                        @if(strlen($report->report) > 35)
                                                {{ substr($report->report,0,20)."..." }}
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
                    <div class="position-relative">
                        <h3 class="font-weight-bold">Proposal Request List</h3>
                        <a href="{{ route('admin.proposal.index') }}" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-change" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <ul class="todo-list">

                                @foreach($proposals as $proposal)
                                    <li>
                                        <!-- iconAct -->
                                        <div class="d-inline-block">
                                            {{--                                    download--}}
                                            <form action="/files/proposal/{{ $proposal->proposal }}" class="p-0 m-0 d-inline-block"
                                                  method="GET">
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1" title="Detail">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </form>

                                            @if($proposal->status == '0' || $proposal->status == '2')
                                                {{--                                    approve--}}
                                                <form action="{{route('admin.proposal.approve', $proposal->id)}}" class="p-0 m-0 d-inline-block"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            {{--                                    reject note--}}
                                            @if($proposal->status == '2')
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject Note"
                                                            data-toggle="modal"
                                                            data-target="#note-{{$proposal->id}}">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </button>
                                                </div>
                                            @endif

                                            @if($proposal->status != '1' && $proposal->status != '2')
                                                {{--                                    reject--}}
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject"
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
                                            @if(strlen($proposal->proposal) > 35)
                                                {{ substr($proposal->proposal,0,20)."..." }}
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
                                    <h4 class="modal-title font-weight-bold">Reject {{$proposal->name}} </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: left;">
                                    <form action="{{route('admin.proposal.reject', $proposal->id)}}" class="p-0 m-0"
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
                                    <h4 class="modal-title">Are you sure want to delete this {{ $proposal->name }} Proposal ?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                    <form action="{{ route('admin.proposal.destroy', $proposal) }}" method="post" class="d-inline-block">
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
                                    <h4 class="modal-title font-weight-bold">Reject {{$report->name}} </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
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
                                    <h4 class="modal-title">Are you sure want to delete this {{ $report->name }} report ?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                    <form action="{{ route('admin.report.destroy', $report) }}" method="post" class="d-inline-block">
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
                                <h4 class="modal-title font-weight-bold">Edit {{$fund->name}} </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left;">
                                <form action="{{route('admin.fund.reject', $fund->id)}}" class="p-0 m-0"
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

            <div class="smol4">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Request Disbursement of Funds</h3>
                    <a href="{{ route('admin.fund.index') }}" class="seeall">see all</a>
                </div>
                <div class="container-fluid">
                    <div class="d-flex boxScroll">
                    @foreach($funds as $fund)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <h2 class="">{{$fund->name}}</h2>
                                        </div>
                                        <div>Value</div>
                                        <h3 class="card-title">Rp. {{$fund->value}}</h3>
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
                                                        <form action="{{ route('admin.fund.approve', $fund->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="pl-2 btnA dropdown-item btnSuccess">Accept</button>
                                                        </form>
                                                        <button class="pl-2 btnA dropdown-item btnDelete" title="Reject"
                                                                data-toggle="modal"
                                                                data-target="#rejectNote-{{$fund->id}}">
                                                            Reject
                                                        </button>
                                                        <form action="{{ route('admin.fund.destroy', $fund) }}" method="post">
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
