@extends('layouts.app')
@section('title', 'Proposal')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">

        {{--        navigation--}}
        <div>
            <a href="{{route('lecturer.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Program</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('lecturer.program.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Detail</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="{{route('lecturer.proposal.show',$program)}}" class="a-none blackhex d-inline-block">
                <h6>Proposal</h6>
            </a>
        </div>

        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} Proposal List</h1>
        </div>

        @if($edit == true)
            @if($addAvailability == true)
            <div class="clearfix">
                <div class="float-right">
                    <a href="#"
                       title="Add Proposal"
                       data-toggle="modal"
                       data-target="#addProposal">
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
            {{--            modal add proposal--}}
            <div class="modal fade" id="addProposal">
                <div class="modal-dialog">
                    <div class="modal-content card-bg-change">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Add proposal to {{$program->name}} </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="text-align: left;">
                            <form action="{{route ('lecturer.proposal.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <input name="selected_program" type="hidden" value="{{$program->id}}">
                                    <label>Upload Your Proposal Here</label>
                                    <input type="file" name="proposal" class="form-control-file" required>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Proposal</button>
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

                        @foreach($proposals as $proposal)
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">
                                    @if(strlen($proposal->proposal) > 20)
                                        {{ substr($proposal->proposal,0,20)."..." }}
                                    @else
                                        {{ $proposal->proposal }}
                                    @endif
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    @if($proposal->status == '0')
                                        <div class="text-primary">Pending</div>
                                    @elseif($proposal->status == '1')
                                        <div class="text-success">Approved</div>
                                    @elseif($proposal->status == '2')
                                        <div class="d-flex justify-content-center">
                                        <button class="btnA circular redstar red-hover iconAct iconAct align-self-center mr-2" title="note"
                                                data-toggle="modal"
                                                data-target="#note-{{$proposal->id}}">
                                            <div class="d-flex justify-content-center">
                                                <i class="fa fa-sticky-note align-self-center"></i>
                                            </div>
                                        </button>
                                        <div class="text-danger d-inline-block align-self-center">Rejected</div>
                                        </div>
                                    @endif
                                </li>
                                @if($edit == true)
                                @if($proposal->status == 0)
                                <li class="guiz-awards-time customComittee">
                                    <button type="submit" class="btn btn-primary"
                                            title="Add Proposal"
                                            data-toggle="modal"
                                            data-target="#replaceProposal-{{$proposal->id}}">
                                        Replace
                                    </button>
                                </li>

{{--                                    modal edit proposal--}}
                                    <div class="modal fade" id="replaceProposal-{{$proposal->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content card-bg-change">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title font-weight-bold">Replace Proposal</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body" style="text-align: left;">
                                                    <form action="{{route ('lecturer.proposal.update', $proposal)}}" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="PATCH">
                                                            <input name="selected_program" type="hidden" value="{{$program->id}}">
                                                            <label>Replace proposal {{ $proposal->proposal }} with ...</label>
                                                            <input type="file" name="proposal" class="form-control-file" accept="application/pdf, application/vnd.ms-excel" required>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button class="btnA circular bluestar p-2 blue-hover" type="submit">Replace Proposal</button>
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
                                    <a href="/files/proposal/{{ $proposal->proposal }}" class="btn btn-success">Download</a>
                                </li>
                                @if($edit == true)
                                <li class="guiz-awards-time customComittee">
                                    <button
                                        type="button"
                                        data-toggle="modal"
                                        data-target="#deleteProposal-{{ $proposal->id }}"
                                        class="btn btn-danger">
                                        Delete
                                    </button>
                                </li>
                                @endif
                            </ul>

                            {{--        Delete Proposal--}}

                            <div class="modal fade" id="deleteProposal-{{ $proposal->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure want to delete this {{ $proposal->proposal }} proposal ?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                            <form action="{{ route('lecturer.proposal.destroy', $proposal) }}" method="post" class="d-inline-block">
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
                            <div class="modal fade" id="note-{{$proposal->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-change-red">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold titlelogin">Note From Coor</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <p class="titlelogin">{{$proposal->note}}</p>
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
