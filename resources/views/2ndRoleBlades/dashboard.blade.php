@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">DASHBOARD</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Lecturer</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Programs</h3>
                    <a href="{{ route('staff.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    @foreach($allprogramssort as $program)
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" >
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
                            <a href="{{route('staff.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div  class="smol3">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">My Programs</h3>
                        <a href="{{ route('staff.program.myprogram') }}" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-bluess" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            @foreach($programs as $program)
                                <a href="{{route('staff.program.show',$program)}}" class="a-none">
                            <ul class="todo-list mb-1">
                                    <li>

                                        <span class="text">
                                            {{$program->name}}
                                        </span>
                                        <div class="float-right">
                                            {{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}
                                        </div>
                                    </li>
                            </ul>
                                </a>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div  class="smol2">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">Action Plans</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-change" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            @foreach($actions as $action)
                                <a href="{{route('staff.actionTask.show',$action)}}" class="a-none gray-hover">
                                    <ul class="todo-list mb-1">

                                                <li>

                                                    <span class="text">
                                                        {{$action->name}}
                                                    </span>
                                                    <div class="float-right">
                                                        {{$action->plansOf->name}}
                                                    </div>

                                                </li>

                                    </ul>
                                </a>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
@endsection
