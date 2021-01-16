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
            <h1 class="col font-weight-bold">Request Proposal List</h1>
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
                            <li class="guiz-awards-time customComittee">Download</li>
                            <li class="guiz-awards-time customComittee">Action</li>
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
                                <li class="guiz-awards-time customComittee">
                                    @if($proposal->status == '0')
                                        <div class="text-warning">Pending</div>
                                    @elseif($proposal->status == '1')
                                        <div class="text-success">Approved</div>
                                    @elseif($proposal->status == '2')
                                        <div class="text-danger">Rejected</div>
                                    @endif
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <a href="/files/proposal/{{ $proposal->proposal }}" class="btn btn-success">Download</a>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <div class="dropdown">
                                        <div class="dropdown show">
                                            <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                    <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <form action="{{route('admin.proposal.approve', $proposal->id)}}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="ml-2 dropdown-item btnA btnSuccess" title="Approve" type="submit">Accept</button>
                                                </form>
                                                <form action="{{route('admin.proposal.reject', $proposal->id)}}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <button class="ml-2 dropdown-item btnA btnDelete" title="Reject" type="submit">Reject</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <form action="{{ route('admin.proposal.destroy', $proposal ) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
