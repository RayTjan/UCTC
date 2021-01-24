@extends('layouts.app')
@section('title', 'Client')
@section('content')

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{ $program->name }} Client List</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee font-weight-bold">Name</li>
                            <li class="guiz-awards-time customComittee font-weight-bold">Phone</li>
                            <li class="guiz-awards-time customComittee font-weight-bold">Address</li>
                            <li class="guiz-awards-time customComittee font-weight-bold">Email</li>
                            <li class="guiz-awards-time customComittee font-weight-bold">Action</li>
                        </ul>

                        @foreach($program->clients as $client)
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">{{ $client->name }}</li>
                                <li class="guiz-awards-time customComittee">{{ $client->phone }}</li>
                                <li class="guiz-awards-time customComittee">{{ $client->address }}</li>
                                <li class="guiz-awards-time customComittee">{{ $client->email }}</li>
                                @if($client->pivot->is_approved == 0)
                                    <li class="guiz-awards-time customComittee">
                                        <div class="dropdown">
                                            <div class="dropdown show">
                                                <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                        <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <form action="{{route('lecturer.client.edit', $client->id)}}"
                                                          method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="selected_program" type="hidden" value="{{$program->id}}">
                                                        <button class="ml-2 dropdown-item btnA" title="Approve" type="submit">Edit</button>
                                                    </form>
                                                    <form action="{{route('lecturer.client.destroy', $client->id)}}"
                                                          method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="selected_program" type="hidden" value="{{$program->id}}">
                                                        <button class="ml-2 dropdown-item btnA btnDelete" title="Reject" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
