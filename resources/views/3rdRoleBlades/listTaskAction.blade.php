@extends('layouts.app')
@section('title', 'Task Action Plan')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="font-weight-bold">Tasks In {{$action->name}} Action Plan</h1>

            @if($edit == true)
            @if($action->plansOf->status != '2')
            <a href="{{route('student.actionTask.create', $action->id)}}" role="button" aria-pressed="true">
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
            @endif
            @endif
        </div>

        <div class="row">
            <div class="card-task card-bg-change">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        @if(isset($tasks[0]))
                        @foreach($tasks as $task)
                        <a onclick="detailShow('detailTask-{{ $task->id }}')" class="a-none">
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin quizz borderquiz mb-2">
                                    <li class="guiz-awards-title blackhex">{{ $task->name }}

                                        <?php
                                            $desc = $task->description;
                                            if (strlen($desc) > 35) {
                                                $desc = substr($desc,0,35)."...";
                                            }
                                        ?>
                                        <div class="guiz-awards-subtitle">{{ $desc }}</div>
                                    </li>
                                    <li class="guiz-awards-time text-right blackhex">{{ substr(str_replace("-","/",date("d-m-Y", strtotime($task->due_date))),0,5) }}</li>

                            </ul>
                        </a>
                        @endforeach
                    </div>
                        @else
                        <div class="card-bg-change d-flex justify-content-center height100">
                            <div class="align-self-center">
                                No Tasks List
                            </div>
                        </div>
                        @endif

                </div>
            </div>

            @foreach($tasks as $task)
                @include('3rdRoleBlades.detailTaskAction')
            @endforeach

        </div>

    </div>

    <script>
        function detailShow(id) {
            var close = document.getElementsByClassName('detailMod');
            var x = document.getElementById(id);
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

@endsection
