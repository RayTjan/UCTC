@extends('layouts.app')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Tasks View</h1>
        </div>

        <div class="row">
            <div class="card-task">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">

        {{--                    @foreach($tasks as $task)--}}
                                <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin quizz mb-2">
                                    <a href="{{ 'task.show' }}" class="a-none">
                                        <li class="guiz-awards-title">Test
                                            <div class="guiz-awards-subtitle">Design</div>
                                        </li>
                                        <li class="guiz-awards-time">10/12/2001</li>
                                    </a>

                                </ul>

                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row quizz mb-2">
                                <a href="{{ 'task.show' }}" class="a-none">
                                    <li class="guiz-awards-title">Test
                                        <div class="guiz-awards-subtitle">Design</div>
                                    </li>
                                    <li class="guiz-awards-time">10/12/2001</li>
                                </a>

                            </ul>

                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row quizz mb-2">
                                <a href="{{ 'task.show' }}" class="a-none">
                                    <li class="guiz-awards-title">Test
                                        <div class="guiz-awards-subtitle">Design</div>
                                    </li>
                                    <li class="guiz-awards-time">10/12/2001</li>
                                </a>

                            </ul>

                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row quizz mb-2">
                                <a href="{{ 'task.show' }}" class="a-none">
                                    <li class="guiz-awards-title">Test
                                        <div class="guiz-awards-subtitle">Design</div>
                                    </li>
                                    <li class="guiz-awards-time">10/12/2001</li>
                                </a>

                            </ul>

                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row quizz mb-2">
                                <a href="{{ 'task.show' }}" class="a-none">
                                    <li class="guiz-awards-title">Test
                                        <div class="guiz-awards-subtitle">Design</div>
                                    </li>
                                    <li class="guiz-awards-time">10/12/2001</li>
                                </a>

                            </ul>
        {{--                    @endforeach--}}

                    </div>
                </div>
            </div>

            @if($detail == 1)
            @include('3rdRoleBlades.detailTask')
            @endif

        </div>

    </div>

@endsection
