@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1 class="font-weight-bold">DASHBOARD</h1>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Recents</h3>
                    <a href="{{ route('admin.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                @foreach($programs as $program)
                    <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box inner-bg-change">
                                <div class="inner inner-bg-change">
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
                <h3 class="font-weight-bold">Should be calendar</h3>
            </div>


            <div class="smol2">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">Request List</h3>
                        <a href="{{ route('admin.proposal.index') }}" class="seeall">see all</a>
                </div>
                <!-- /.card-header -->
                <div class="card card-body card-bg-change" style="height: 250px;">
                    <div class="scrollWebkit p-0">
                        <ul class="todo-list">

                            @foreach($proposals as $proposal)
                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="" name="">
                                    <!-- todo text -->
                                    <span class="text">
                                        @if(strlen($proposal->proposal) > 35)
                                            {{ substr($proposal->proposal,0,20)."..." }}
                                        @else
                                            {{ $proposal->proposal }}
                                        @endif
                                    </span>
                                    <div class="float-right">
                                        <p class="">{{ $proposal->belongProgram->name }}</p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <!-- /.card-body -->
                {{--                <div class="card-footer clearfix">--}}
                {{--                    <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add item</button>--}}
                {{--                </div>--}}
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
@endsection
