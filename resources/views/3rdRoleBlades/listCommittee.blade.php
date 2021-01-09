@extends('layouts.app')
@section('title', 'Committee')
@section('content')

    <script>
        $(document).ready( function() {
        $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} List Committees</h1>
        </div>
        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Role</li>
                            <li class="guiz-awards-time customComittee">Email</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Action</li>
                        </ul>

                        @foreach($program->committees as $committee)
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">{{ $committee->identity->name }}</li>
                                <li class="guiz-awards-time customComittee">{{ $committee->role->name }}</li>
                                <li class="guiz-awards-time customComittee">{{ $committee->identity->email }}</li>
                                <li class="guiz-awards-time customComittee">
                                    @if($committee->pivot->is_approved == 0) <div class="text-warning">Pending</div>
                                    @elseif($committee->pivot->is_approved == 1) <div class="text-success">Approved</div>
                                    @else <div class="text-danger">Rejected</div> @endif
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
