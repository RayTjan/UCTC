@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">Welcome Lecturer to UCTC</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Lecturer</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Programs</h3>
                    <a href="{{ route('lecturer.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    @foreach($allprogramssort as $program)
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
                                    <h2 class="font-weight-bold reduceWidth maxline">{{$program->name}}</h2>
                                    <p>{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</p>
                                </div>
                                <a href="{{route('lecturer.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div  class="smol3">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">My Programs</h3>
                        <a href="{{ route('lecturer.program.myprogram') }}" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-bluess" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            @foreach($programs as $program)
                                <a href="{{route('lecturer.program.show',$program)}}" class="a-none">
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
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card card-body card-bg-change" style="height: 250px;">--}}
{{--                        <div class="scrollWebkit p-0">--}}
{{--                            @foreach($actions as $action)--}}
{{--                                <a href="{{route('lecturer.actionTask.show',$action)}}" class="a-none gray-hover">--}}
{{--                                    <ul class="todo-list mb-1">--}}

{{--                                                <li>--}}

{{--                                                    <span class="text">--}}
{{--                                                        {{$action->name}}--}}
{{--                                                    </span>--}}
{{--                                                    <div class="float-right">--}}
{{--                                                        {{$action->plansOf->name}}--}}
{{--                                                    </div>--}}

{{--                                                </li>--}}

{{--                                    </ul>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}


{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="card card-body card-bg-change" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <div class="row">
                            @foreach($actions as $action)
                                <!-- ./col -->
                                    <div class="col-lg-6 col-8" >
                                        <a class="a-none position-relative" href="{{route('lecturer.actionTask.show', $action)}}">
                                            <!-- small box -->
                                            <div class="btnSlider"></div>
                                            <div class="small-box inner-bg-yellow position-relative shadowCard btnSlider">
                                                <div class="p-2 ml-2">
                                                    <h2 class="font-weight-bold reduceWidth maxlineP">{{$action->name}}</h2>
                                                    <p class="maxlineP">{{$action->plansOf->name}}</p>
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
