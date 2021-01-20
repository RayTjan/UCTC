@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">DASHBOARD</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Student</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">My Programs</h3>
                    <a href="{{ route('student.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    @foreach($programs as $program)
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box inner-bg-yellow">
                            <div class="inner inner-bg-yellow">
                                <h2 class="font-weight-bold">{{$program->name}}</h2>
                                <p>{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</p>
                            </div>
                            <a href="{{route('student.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div  class="smol3">
                <h3 class="font-weight-bold">Should be calendar</h3>
            </div>


            <div class="smol2">
                <div class="{{--card-header--}}">
{{--                    <h3 class="card-title">--}}
{{--                        <i class="ion ion-clipboard mr-1"></i>--}}
{{--                        Tasks List--}}
{{--                    </h3>--}}

                    <div class="position-relative">
                        <h3 class="font-weight-bold">Tasks List</h3>
                        <a href="{{ route('student.action.index') }}" class="seeall">see all</a>
                    </div>

{{--                    <div class="card-tools">--}}
{{--                        <ul class="pagination pagination-sm">--}}
{{--                            <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">3</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card-header -->
                <div class="card card-body card-bg-change" style="height: 250px;">
                    <div class="scrollWebkit p-0">
                    <ul class="todo-list">

                        @foreach($tasks as $task)
                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">{{ $task->name }}</span>
                            <div class="float-right">
                                <p class="">{{ str_replace("-","/",date("d-m-Y", strtotime($task->due_date))) }}</p>
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
