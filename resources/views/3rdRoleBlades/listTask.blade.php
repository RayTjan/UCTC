@extends('layouts.app')
@section('title', 'Tasks')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Tasks View</h1>
        </div>

        <div class="row">
            <div class="card-task card-bg-change">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">

                        @for($con = 0;$con < sizeof($tasks);$con++)
                            <a onclick="detailShow('detailTask-{{ $con }}')" class="a-none">
                                <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin quizz mb-2">
                                    <li class="guiz-awards-title blackhex">{{ $tasks[$con]->name }}

                                        <?php
                                        $desc = $tasks[$con]->description;
                                        if (strlen($desc) > 35) {
                                            $desc = substr($desc,0,35)."...";
                                        }
                                        ?>
                                        <div class="guiz-awards-subtitle">{{ $desc }}</div>
                                    </li>
                                    <li class="guiz-awards-time text-right blackhex">{{ substr(str_replace("-","/",date("d-m-Y", strtotime($tasks[$con]->due_date))),0,5) }}</li>

                                </ul>
                            </a>
                        @endfor

                    </div>
                </div>
            </div>

            @for($con = 0;$con < sizeof($tasks);$con++)
                @include('3rdRoleBlades.detailTask')
            @endfor

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
