@extends('layouts.app')
@section('title', 'Settings')
@section('content')

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row mb-3">
            <h1 class="col font-weight-bold">Settings</h1>
        </div>

        <div class="row">
            <div class="card-attribute mr-4">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <h4 class="font-weight-bold">Category</h4>

                        @foreach($categories as $category)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2">
                            <div class="d-flex justify-content-between">
                                <li class="guiz-awards-title titleWidth">{{$category->name}}</li>
                                <li class="align-self-center">
                                    <form action="{{route('coordinator.setting.destroy', $category->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA deleteAtt">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="card-attribute mr-4">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <h4 class="font-weight-bold">Type</h4>

                        @foreach($types as $type)
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2">
                            <div class="d-flex justify-content-between">
                                <li class="guiz-awards-title titleWidth">{{$type->name}}</li>
                                <li class="align-self-center">
                                    <form action="{{route('coordinator.setting.tdestroy', $type->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA deleteAtt">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="card-attribute-settings mr-4">
                <div class="quiz-window">
                    <div class="height100">

                            <h4 class="font-weight-bold mb-3">Add New Attributes</h4>

                            <div class="form-group text-center">
                                <a onclick="inputShow('categoryInput')"
                                        class="titlelogin btn btn-success mr-0 ml-0 d-inline-block">Category</a>
                                <a onclick="inputShow('typeInput')"
                                        class="titlelogin btn btn-primary mr-0 ml-0 d-inline-block">Type</a>
                            </div>

                        <form action="{{route('coordinator.setting.store')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group detailMod" id="categoryInput">
                                <label >Category:</label>
                                <input type="text" class="form-control" name="cname">
                            </div>

                            <div class="form-group detailMod" id="typeInput">
                                <label >Type:</label>
                                <input type="text" class="form-control" name="tname">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function inputShow(id) {
            var x = document.getElementById(id);
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

@endsection
