@extends('layouts.app')
@section('title', 'Detail Program')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{$program->name}}</h1>
        </div>
        <div class="d-flex justify-content-between">
            <h3>{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</h3>

            @if($program->status == '1' || $program->status == '2')
            <a href="{{route('staff.file.show',$program)}}" class="circular graystar font-weight-bold p-2 gray-hover">
                <i class="fa fa-paperclip"></i>
                Data link
            </a>
            @endif

        </div>

        <div class="ml-4">

            @if(isset($clients[0]))
            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Client&nbsp;&nbsp;&nbsp;: </h6>
                @foreach($clients as $client)
                <p class="col-md-1 font-weight-bold circular graystar mr-1">
                    {{ $client->name }}
                </p>
                @endforeach
            </div>
            @endif

            <h6 class="font-weight-bold">Goal</h6>
            <p class="ml-3">{{$program->goal}}</p>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular bluestar">
                    {{$program->creator->identity->name}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-2 font-weight-bold circular cyanstar">
                    {{$program->classified->name}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Category: </h6>
                <p class="col-md-2 font-weight-bold circular toscastar">
                    {{$program->categorized->name}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                @if($program->status == '0')
                    <p class="col-md-1 font-weight-bold circular yellowstar">
                        Pending
                    </p>
                @elseif($program->status == '1')
                    <p class="col-md-1 font-weight-bold circular toscastar">
                        Ongoing
                    </p>
                @elseif($program->status == '2')
                    <p class="col-md-1 font-weight-bold circular greenstar">
                        Finished
                    </p>
                @elseif($program->status == '3')
                    <p class="col-md-1 font-weight-bold circular redstar">
                        Suspended
                    </p>
                @endif
            </div>

            @if(isset($proposal->id))
            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal :</h6>
                @if($proposal->status == '0')
                    <p class="col-md-1 font-weight-bold circular yellowstar">
                        Pending
                    </p>
                @elseif($proposal->status == '1')
                    <p class="col-md-1 font-weight-bold circular greenstar">
                        Approved
                    </p>
                @elseif($proposal->status == '2')
                    <p class="col-md-1 font-weight-bold circular redstar">
                        Rejected
                    </p>
                @endif
            </div>
            @endif

            @if(isset($report->id))
                <div class="row align-items-center">
                    <h6 class="col-1 font-weight-bold float-left pr-1">Report&nbsp;&nbsp;&nbsp;&nbsp;:</h6>
                    @if($report->status == '0')
                        <p class="col-md-1 font-weight-bold circular yellowstar">
                            Pending
                        </p>
                    @elseif($report->status == '1')
                        <p class="col-md-1 font-weight-bold circular greenstar">
                            Approved
                        </p>
                    @elseif($report->status == '2')
                        <p class="col-md-1 font-weight-bold circular redstar">
                            Rejected
                        </p>
                    @endif
                </div>
            @endif

            <h6 class="font-weight-bold">Description</h6>
            <p class="ml-3">{{$program->description}}</p>

        </div>

{{--        image--}}
        @if(isset($program->hasDocs[0]->id))
        <div class="">
            <h2 class="col font-weight-bold text-center">Documentations</h2>

            <div class="container-fluid py-3">
                <div class="d-flex colorScroll heightPic">

                    @foreach($program->hasDocs as $doc)
                    <div class="col-lg-3 col-6" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded">
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

        @if(isset($report->id))
        @if($report->status == '1')
        @if($program->status != '2')
        <div class="text-center">
            <h5>Report approved, finish program Now!</h5>
            <div>
                <button type="button"
                        data-toggle="modal"
                        data-target="#finishProgram"
                        class="btnA circular greenstar font-weight-bold pr-4 pl-4 pb-3 pt-3 green-hover">
                    <i class="fa fa-check"></i>
                    Finish Program
                </button>
            </div>
        </div>

        {{--        Finish Program--}}
        <div class="modal fade" id="finishProgram">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Finish {{$program->name}} now ?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body d-inline-block text-center" style="text-align: left;">
                        <form action="{{ route('staff.program.finish', $program->id) }}" method="post" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover widthSubmitButton">Yes</button>
                        </form>
                        <button type="button" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endif


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

        @if($program->status == '1' || $program->status == '2')
        <div class="clearfix">
            <h5 class="float-right font-weight-bold">Budgeting</h5>
        </div>
        <div class="clearfix">
            <h3 class="float-right">Rp. {{$total}}</h3>
        </div>
        @endif

        <div class="d-flex justify-content-between mb-5">
            <div class="">
                @if($program->status == '1'||$program->status == '2')
                <a href="{{ route('staff.client.show', $program) }}" title="Client" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                    <i class="fa fa-user"></i>
                    Client
                </a>
                <a href="{{ route('staff.committee.show', $program) }}" title="Committee" class="circular cyanstar font-weight-bold p-2 cyan-hover mr-2">
                    <i class="fa fa-user"></i>
                    Committee
                </a>
                <a href="{{ route('staff.action.show', $program) }}" title="Action Plan" class="circular bluestar font-weight-bold p-2 blue-hover mr-2">
                    <i class="fa fa-database"></i>
                    Action Plan
                </a>
                <a href="{{ route('staff.fund.show', $program) }}" title="Funds" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-money"></i>
                    Disbursement of Funds
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

                @if($edit == true)
                @if($program->status != '3'&&$program->status != '2')
                <a href="{{ route('staff.program.edit', $program) }}" title="Edit" class="circular purplestar font-weight-bold p-2 purple-hover mr-2">
                    <i class="fa fa-dashboard"></i>
                    Edit
                </a>
                @endif
                @endif

                @if($program->status == '1'||$program->status == '2')
                <a href="{{ route('staff.proposal.show', $program) }}" title="Proposal" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-address-book"></i>
                    Proposal
                </a>

                @if(isset($proposal->status))
                @if($proposal->status == "1")
                    <a href="{{ route('staff.report.create', $program) }}" title="Report" class="circular greenstar font-weight-bold p-2 green-hover mr-2">
                        <i class="fa fa-book"></i>
                        Report
                    </a>
                @endif
                @endif

                @endif
                @if($edit == true)
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
                @endif
            </div>
            @if($program->status == '1' || $program->status == '2')
            <div>
                <button type="button"
                        data-toggle="modal"
                        data-target="#detailBudget"
                        class="btnA circular graystar font-weight-bold p-2 gray-hover">
                    <i class="fa fa-address-book"></i>
                    Detail
                </button>
            </div>
            @endif
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

{{--        Modal Detail Budget--}}
        <div class="modal fade zindex1050" id="detailBudget">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header card-bg-change">
                        @if($edit == true)
                        <a href="{{ route('staff.finance.show', $program) }}" class="circular yellowstar font-weight-bold p-2 yellow-hover">
                            <i class="fa fa-money"></i>
                            Finance
                        </a>
                        @endif
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="card-bg-change scrollWebkit height100 modalCustomBody">

                        @foreach($program->hasFinances as $finance)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">{{ $finance->name }}</li>
                            @if($finance->type == '0')
                                <li class="guiz-awards-time float-right text-right btnSuccess">
                                    + Rp. {{ $finance->value }}
                                </li>
                            @elseif($finance->type == '1')
                                <li class="guiz-awards-time float-right text-right btnDelete">
                                    - Rp. {{ $finance->value }}
                                </li>
                            @endif
                        </ul>
                        @endforeach

                    </div>

                    <div class="card-bg-change height100 modalCustomFooter">
                        <div class="absoluteFooter">
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Total</li>
                            <li class="guiz-awards-time float-right text-right">Rp. {{ $total }}</li>
                        </ul>
                        </div>
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
                        <form action="{{ route('staff.program.destroy', $program) }}" method="post" class="d-inline-block">
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
