@extends('layouts.app')
@section('title', 'Detail Program')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">{{$program->name}}</h1>
        </div>
        <h3>{{$program->program_date}}</h3>
{{--        <form action="{{ route('program.destroy' , $program)}}" method="POST">--}}
{{--            {{ csrf_field() }}--}}
{{--            <input name="_method" type="hidden" value="DELETE">--}}
{{--            <button type="submit" class="btn btn-danger">Delete Program</button>--}}
{{--        </form>--}}

        <h6>{{$program->status}}</h6>
        <div class="ml-4">
            <h6 class="font-weight-bold">Goal</h6>
            <p class="ml-3">{{$program->goal}}</p>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular bluestar">
                    {{$program->creator->identity->name}}
{{--                    unchch--}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-2 font-weight-bold circular toscastar">
                    @if($program->category == 1)
                        Long-Term
                    @else
                        Short-Term
                    @endif
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular purplestar">
                    {{$program->status}}
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal :</h6>
                <p class="col-md-1 font-weight-bold circular greenstar">
                    Approved
                </p>
            </div>

            <h6 class="font-weight-bold">Description</h6>
            <p class="ml-3">{{$program->description}}</p>

        </div>

{{--        image--}}
        <div class="">
            <h2 class="col font-weight-bold text-center">Documentations</h2>

            <div class="container-fluid py-3">
                <div class="row">

{{--                    foreach here--}}
                    <div class="col-md-3 mb-lg-0" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded">
                            <img src="https://res.cloudinary.com/mhmd/image/upload/v1570786269/hoverSet-10_ccl30n.jpg" alt="image">
                            <button type="button"
                               data-toggle="modal"
                               data-target="#imgview">
                            <div class="hover-overlay">

                            </div>
                            </button>
                        </div>
                    </div>
{{--                    endforeach--}}

                    <div class="col-md-3 mb-lg-0" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded"><img src="https://res.cloudinary.com/mhmd/image/upload/v1570786269/hoverSet-10_ccl30n.jpg" alt="image">
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

{{--        modal image--}}

        <div class="modal fade" id="imgview">
            <div class="modal-dialog">
                <div class="modalpic-content">
                    <!-- Modal body -->
                    <div class="modalpic-body text-center">
                        <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1570786269/hoverSet-10_ccl30n.jpg" alt="image" class="card-img">
                    </div>
                </div>
            </div>
        </div>


        {{--        Option Menu--}}

        <div class="clearfix">
            <h5 class="float-right font-weight-bold">Budgeting</h5>
        </div>
        <div class="clearfix">
            <h3 class="float-right">Rp. 500.000</h3>
        </div>

        <div class="d-flex justify-content-between mb-5">
            <div>
                <a href="{{ route('admin.committee.index') }}" class="circular yellowstar font-weight-bold p-2 yellow-hover">Committee</a>
                <a href="{{ route('admin.program.edit', $program) }}" class="circular purplestar font-weight-bold p-2 purple-hover">Edit</a>
            </div>
            <div>
                <button type="button"
                        data-toggle="modal"
                        data-target="#detailBudget"
                        class="btnA circular graystar font-weight-bold p-2 gray-hover">Detail</button>
            </div>
        </div>

{{--        Modal Detail Budget--}}

        <div class="modal fade zindex1050" id="detailBudget">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header card-bg-change">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="card-bg-change scrollWebkit height100 modalCustomBody">

                        {{--                    @foreach($budgets as $budget)--}}
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Antidote</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>

                    </div>

                    <div class="card-bg-change height100 modalCustomFooter">
                        <div class="absoluteFooter">
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark pr-4 pl-4 clearfix">
                            <li class="guiz-awards-time text-left">Total</li>
                            <li class="guiz-awards-time float-right text-right">Rp. 500.000</li>
                        </ul>
                        </div>
                    </div>

                </div>
            </div>
         </div>


@endsection
