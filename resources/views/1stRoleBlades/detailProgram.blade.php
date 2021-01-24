@extends('layouts.app')
@section('title', 'Detail Program')
@section('content')
    <div class="container" style="margin-top: 20px;">

{{--        navigation--}}
        <div>
            <a href="" class="a-none blackhex d-inline-block">
                <h6>Program</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('coordinator.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Detail</h6>
            </a>
        </div>

        <div class="position-relative">
            <div>
                <div class="d-flex flex-row">
                    <h1>{{$program->name}}</h1>
                    <div class="align-self-center">
                        @if($program->status == '0')
                            <p class="font-weight-bold circular yellowstar">
                                Pending
                            </p>
                        @elseif($program->status == '1')
                            <p class="font-weight-bold circular toscastar">
                                Ongoing
                            </p>
                        @elseif($program->status == '2')
                            <p class="font-weight-bold circular greenstar">
                                Finished
                            </p>
                        @elseif($program->status == '3')
                            <p class="font-weight-bold circular redstar">
                                Suspended
                            </p>
                        @endif
                    </div>
                </div>
                <h4 class="mt-2">{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</h4>
            </div>
            @if($program->status == '1' || $program->status == '2')
            <div class="card-finance card-bg-change position-absolute">

                {{--        Option Menu--}}
                <?php
                $total = 0;



                foreach ($program->hasFinances as $finance){
                    //0 income 1 expenditure
                    if ($finance->type == '0') {
                        $total = $total + $finance->value;
                    }else if ($finance->type == '1') {
                        $total = $total - $finance->value;
                    }
                }
                ?>
                    <div class="clearfix">
                        <h5 class="float-right font-weight-bold">Balance</h5>
                    </div>
                    <div class="clearfix mb-2">
                        @if($total<0)
                            <h3 class="float-right text-danger">Rp. {{$total}}</h3>
                        @else
                            <h3 class="float-right">Rp. {{$total}}</h3>
                        @endif
                    </div>

                @if($program->status == '1' || $program->status == '2')
                    <div class="clearfix">
                        <a href="{{ route('coordinator.finance.show', $program) }}" class="float-right circular yellowstar font-weight-bold p-1 yellow-hover">
                            <i class="fa fa-money"></i>
                            Detail
                        </a>
                    </div>
                @endif
            </div>
            @endif

        </div>

        <div class="mt-3">

            @if(isset($clients[0]))
            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Client</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                @for($i=0;$i<sizeof($clients);$i++)
                <div class="">
                    @if($i == (sizeof($clients)-1))
                        {{ $clients[$i]->name }}
                    @else
                        {{ $clients[$i]->name.',' }}&nbsp;
                    @endif

                </div>
                @endfor
            </div>
            @endif

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    {{$program->creator->identity->name}}
                </div>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    {{$program->classified->name}}
                </div>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Category</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    {{$program->categorized->name}}
                </div>
            </div>

            @if(isset($proposal->id))
            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                @if($proposal->status == '0')
                    <div class="text-primary">
                        Pending
                    </div>
                @elseif($proposal->status == '1')
                    <div class="text-success">
                        Approved
                    </div>
                @elseif($proposal->status == '2')
                    <div class="text-danger">
                        Rejected
                    </div>
                @endif
            </div>
            @endif

            @if(isset($report->id))
                <div class="row align-items-center">
                    <h6 class="col-1 font-weight-bold float-left pr-1">Report</h6>
                    <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                    @if($report->status == '0')
                        <div class="text-primary">
                            Pending
                        </div>
                    @elseif($report->status == '1')
                        <div class="text-success">
                            Approved
                        </div>
                    @elseif($report->status == '2')
                        <div class="text-danger">
                            Rejected
                        </div>
                    @endif
                </div>
            @endif

            <div class="row align-items-center mt-3">
                <h6 class="col-md-1 font-weight-bold float-left">Goal</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    {{ $program->goal }}
                </div>
            </div>

        </div>

        <div class="card-desc card-bg-change mb-3">
            <div class="quiz-window">
                <div class="card-bg-change scrollWebkit height100">
                    <div class="">
                        <h5 class="font-weight-bold">Description</h5>
                        <div class="">{{$program->description}}</div>
                    </div>
                </div>
            </div>
        </div>

{{--        image--}}
        @if(isset($program->hasDocs[0]->id))
        <div class="">
            <h2 class="col font-weight-bold text-left">Documentations</h2>

            <div class="container-fluid py-3">
                <div class="d-flex colorScroll heightPic">

                    @foreach($program->hasDocs as $doc)
                    <div class="col-lg-3 col-6" id="picDoc" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded" >
                            <img src="/img/documentation/{{$doc->documentation}}" alt="image">
                            <button type="button"
                               data-toggle="modal"
                               data-target="#imgview-{{$doc->id}}">
                            <div class="hover-overlay">

                            </div>
                            </button>
                        </div>
                    </div>

{{--                    modal image--}}
                        <div class="modal fade" id="imgview-{{$doc->id}}">
                            <div class="modal-dialog">
                                <div class="modalpic-content">
                                    <!-- Modal body -->
                                    <div class="modalpic-body text-center">
                                        <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                        <img src="/img/documentation/{{$doc->documentation}}" alt="image" class="card-img">
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

        </div>

        @endif

        <div class="d-flex justify-content-between mb-5">
            <div class="align-self-center">
                @if($program->status == '1'||$program->status == '2')
                <a href="{{ route('coordinator.client.show', $program) }}" title="Client" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                    <i class="fa fa-user"></i>
                    Client
                </a>
                <a href="{{ route('coordinator.committee.show', $program) }}" title="Committee" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                    <i class="fa fa-user"></i>
                    Committee
                </a>
                <a href="{{ route('coordinator.fund.show', $program) }}" title="Funds" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-money"></i>
                    Reimburse
                </a>
                @endif

                @if($program->status == '3')
                <a class="circular redstar font-weight-bold p-2 red-hover mr-2"
                    title="Suspend note"
                    data-toggle="modal"
                    data-target="#note-{{$program->id}}">
                    <i class="fa fa-sticky-note"></i>
                    Coor's Note
                </a>
                @endif

                @if($program->status == '1'||$program->status == '2')
                <a href="{{ route('coordinator.proposal.show', $program) }}" title="Proposal" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-address-book"></i>
                    Proposal
                </a>

                @if(isset($proposal->status))
                @if($proposal->status == "1")
                    <a href="{{ route('coordinator.report.create', $program) }}" title="Report" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                        <i class="fa fa-book"></i>
                        Report
                    </a>
                @endif
                @endif
                @endif

                @if($program->status == '1' || $program->status == '2')
                    <a href="{{ route('coordinator.action.show', $program) }}" title="Action Plan" class="circular bluestar font-weight-bold p-2 blue-hover mr-2">
                        <i class="fa fa-database"></i>
                        Action Plan
                    </a>

                    <a href="{{route('coordinator.file.show',$program)}}" class="circular graystar font-weight-bold p-2 gray-hover mr-2">
                        <i class="fa fa-clipboard"></i>
                        Data Link
                    </a>
                @endif
            </div>
            <div class="align-self-center">
                @if($program->status != '3'&&$program->status != '2')
                    <a href="{{ route('coordinator.program.edit', $program) }}" title="Edit" class="circular purplestar font-weight-bold p-2 purple-hover mr-2">
                        <i class="fa fa-pencil"></i>
                        Edit
                    </a>
                @endif

                @if($program->status != '2')
                    <button type="button"
                            title="Delete"
                            data-toggle="modal"
                            data-target="#deleteProgram"
                            class="btnA circular redstar font-weight-bold p-2 red-hover">
                                <i class="fa fa-close"></i>
                                Delete
                    </button>
                @endif
            </div>
        </div>

        {{--            modal note--}}
        <div class="modal fade" id="note-{{$program->id}}">
            <div class="modal-dialog">
                <div class="modal-content bg-change-red">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title font-weight-bold titlelogin">Note From Coor</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" style="text-align: left;">
                        <p class="titlelogin">{{$program->note}}</p>
                    </div>
                </div>
            </div>
        </div>

{{--        Delete Program--}}

        <div class="modal fade" id="deleteProgram">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure want to delete program {{ $program->name }} </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body d-inline-block text-center" style="text-align: left;">
                        <form action="{{ route('coordinator.program.destroy', $program) }}" method="post" class="d-inline-block">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover">Yes</button>
                        </form>
                        <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
