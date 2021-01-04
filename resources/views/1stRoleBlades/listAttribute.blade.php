@extends('layouts.app')
@section('title', 'Settings')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Attributes</h1>
        </div>

        <div class="row">
            <div class="card-attribute mr-4">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <h4 class="font-weight-bold">Category</h4>

                        {{--                    @foreach($tasks as $task)--}}
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2">
                            <div class="d-flex justify-content-between">
                                <li class="guiz-awards-title titleWidth">Long term</li>
                                <li class="align-self-center">
                                    <form action="detroy" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA deleteAtt">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                        {{--                    @endforeach--}}

                    </div>
                </div>
            </div>

            <div class="card-attribute mr-4">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <h4 class="font-weight-bold">Type</h4>

                        {{--                    @foreach($tasks as $task)--}}
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2">
                            <div class="d-flex justify-content-between">
                                <li class="guiz-awards-title titleWidth">Ongoing</li>
                                <li class="align-self-center">
                                    <form action="detroy" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA deleteAtt">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                        {{--                    @endforeach--}}

                    </div>
                </div>
            </div>

            <div class="card-attribute-settings mr-4">
                <div class="quiz-window">
                    <div class="height100">

                        <form action="{{route('admin.category.store')}}" method="post">
                        {{csrf_field()}}

                            <h4 class="font-weight-bold">Add New Attributes</h4>

                            <div class="form-group">
                                <label >Select Attribute:</label>
                                <select class="form-control" placeholder="Select Attribute">
                                    <option value="Category">Category</option>
                                    <option value="Type">Type</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Category:</label>
                                <input type="text" class="form-control" name="Category" required>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
