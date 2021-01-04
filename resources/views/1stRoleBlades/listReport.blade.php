@extends('layouts.app')
@section('title', 'Report')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Faculty Report</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Program</li>
                            <li class="guiz-awards-time customComittee">Creator</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Date</li>
                            <li class="guiz-awards-time customComittee">Budget</li>
                        </ul>

                        @foreach($programs as $program)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee">{{ $program->name }}</li>
                            <li class="guiz-awards-time customComittee">{{ $program->creator->identity->name }}</li>
                            <li class="guiz-awards-time customComittee">
                                @if($program->category == 1)
                                    Long-Term
                                @else
                                    Short-Term
                                @endif
                            </li>
                            <li class="guiz-awards-time customComittee">{{$program->program_date}}</li>
                            <li class="guiz-awards-time customComittee">Rp. 145.000</li>
                        </ul>
                        @endforeach

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark">
                            <li class="guiz-awards-time customComittee">Total</li>
                            <li class="guiz-awards-time customComittee">&nbsp;</li>
                            <li class="guiz-awards-time customComittee">&nbsp;</li>
                            <li class="guiz-awards-time customComittee">&nbsp;</li>
                            <li class="guiz-awards-time customComittee">Rp. 500.000</li>
                        </ul>

{{--                        <div class="card-bg-change height100 modalCustomFooter">--}}
{{--                            <div class="absoluteFooter">--}}
{{--                                <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark pr-4 pl-4 clearfix">--}}
{{--                                    <li class="guiz-awards-time text-left">Total</li>--}}
{{--                                    <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
