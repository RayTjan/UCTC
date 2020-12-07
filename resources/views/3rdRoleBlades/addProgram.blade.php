@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Creating New Program</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{route('program.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label >Goal: </label>
                        <input type="text" class="form-control" name="goal" required>
                    </div>
                    <input type="hidden" name="status" value="Started">
                    <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                    <div class="form-group">
                        <label>Program Date / Deadline:</label>
                        <input type="date" class="form-control" name="program_date" required>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <select name="created_by" class="custom-select">--}}
{{--                            @foreach($users as $user)--}}
{{--                                <option value="{{$user->id}}">{{$user->name . '(' . $user->email . ')'}}></option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>



@endsection
