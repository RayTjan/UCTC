@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">Welcome to UCTC</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Student</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative mb-2">
                    <h3 class="font-weight-bold">Programs</h3>
                    <a href="{{ route('student.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    @foreach($programs as $program)
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" >
                        <!-- small box -->
                            <div class="small-box card-bg-change position-relative shadowCard">
                                @if($program->status == '0')
                                    <div class="starCard yellstar"></div>
                                @elseif($program->status == '1')
                                    <div class="starCard toscastar"></div>
                                @elseif($program->status == '2')
                                    <div class="starCard greenstar"></div>
                                @elseif($program->status == '3')
                                    <div class="starCard redstar"></div>
                                @endif
                                <div class="inner ml-2">
                                    <h2 class="reduceWidth maxline font">{{$program->name}}</h2>
                                    <div>{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</div>
                                </div>
                                <a href="{{route('student.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div  class="smol3">
                <div class="">
                    <div class="position-relative mb-2">
                        <h3 class="font-weight-bold">My Programs</h3>
                        <a href="{{ route('student.program.index') }}" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-bluess" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            @foreach($programs as $program)
                                <a href="{{route('student.program.show',$program)}}" class="a-none">
                            <ul class="todo-list mb-1">
                                    <li class="d-flex justify-content-between truegray-hover">
                                        <div class="d-flex">
                                            @if($program->status == '0')
                                                <div class="ministar yellowstar d-inline-block align-self-center"></div>
                                            @elseif($program->status == '1')
                                                <div class="ministar toscastar d-inline-block align-self-center"></div>
                                            @elseif($program->status == '2')
                                                <div class="ministar greenstar d-inline-block align-self-center"></div>
                                            @elseif($program->status == '3')
                                                <div class="ministar redstar d-inline-block align-self-center"></div>
                                            @endif
                                            <span class="text">
                                                {{$program->name}}
                                            </span>
                                        </div>
                                        <div class="align-self-center">
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
                    <div class="position-relative mb-2">
                        <h3 class="font-weight-bold">My Tasks</h3>
                    </div>
                    <div class="card card-body card-bg-change" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                        <div class="scrollWebkit p-0">
                            <div class="row">
                            @foreach($tasks as $task)
                                <!-- ./col -->
                                    <div class="col-lg-6 col-8" >
                                        <a class="a-none position-relative" href="{{route('student.actionTask.show', $task->action_plan)}}">
                                            <!-- small box -->
                                            <div class="btnSlider"></div>
                                            <div class="small-box inner-bg-yellow position-relative shadowCard btnSlider">
                                                <div class="p-2 ml-2">
                                                    <h2 class="reduceWidth maxlineP">{{$task->name}}</h2>
                                                    <div class="maxlineP">{{ str_replace("-","/",date("d-m-Y", strtotime($task->due_date))) }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
@endsection
