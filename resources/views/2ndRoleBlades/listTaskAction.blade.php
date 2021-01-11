@extends('layouts.app')
@section('title', 'Task Action Plan')
@section('content')

    <script>
        function detailShow() {
            var x = document.getElementById("detailTask");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Tasks In {{$action->name}} Action Plan</h1>
        </div>

        <div class="row">
            <div class="card-task bg-change-dark">
                <div class="quiz-window">
                    <div class="bg-change-dark scrollWebkit height100">

                        @foreach($tasks as $task)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin quizz mb-2">
                            <a onclick="detailShow()" class="a-none">
                                <li class="guiz-awards-title blackhex">{{ $task->name }}

                                    <?php
                                        $desc = $task->description;
                                        if (strlen($desc) > 35) {
                                            $desc = substr($desc,0,35)."...";
                                        }
                                    ?>
                                    <div class="guiz-awards-subtitle">{{ $desc }}</div>
                                </li>
                                <li class="guiz-awards-time text-right blackhex">{{ substr(str_replace("-","/",date("m-d-Y", strtotime($task->due_date))),0,5) }}</li>
                            </a>

                        </ul>
                        @endforeach

                    </div>
                </div>
            </div>

            @include('2ndRoleBlades.detailTaskAction')

        </div>

    </div>

@endsection
