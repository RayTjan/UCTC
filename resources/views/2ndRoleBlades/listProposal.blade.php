@extends('layouts.app')
@section('title', 'Proposal')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} Proposal List</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Replace</li>
                            <li class="guiz-awards-time customComittee">Download</li>
                            <li class="guiz-awards-time customComittee">Delete</li>
                        </ul>

                        @foreach($proposals as $proposal)
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">
                                    @if(strlen($proposal->proposal) > 35)
                                        {{ substr($proposal->proposal,0,20)."..." }}
                                    @else
                                        {{ $proposal->proposal }}
                                    @endif
                                </li>
                                <li class="guiz-awards-time customComittee">{{ $proposal->status }}</li>
                                <li class="guiz-awards-time customComittee">
                                    <a href="" class="circular bluestar p-1 blue-hover">Replace</a>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <a href="" class="circular greenstar p-1 green-hover">Download</a>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <a href="" class="circular redstar p-1 red-hover">Delete</a>
                                </li>
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
