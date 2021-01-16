@extends('layouts.app')
@section('title', 'Action Plan')
@section('content')

    <div class="d-flex justify-content-center mt-5">
        <div class="card-attribute-settings">
            <div class="quiz-window">
                <div class="height100">

                    <form action="{{route('staff.action.show')}}" method="post">
                        {{csrf_field()}}

                        <h4 class="font-weight-bold">Select Action Plan</h4>

                        <div class="form-group">
                            <label >Report:</label>
                            <select name="type" class="custom-select">
                                <option hidden>Select Action Plan</option>
                                @foreach($programs as $program)
                                <option value="{{$program->hasPlan->id}}">{{$program->hasPlan->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Select</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

@endsection
