@extends('layouts.app')
@section('title', 'Add Tasks')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Creating New Task</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{route('staff.actionTask.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <input type="hidden" name="status" value="0">
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label>PIC:</label>
                        <select name="PIC" class="custom-select">
                            <option value="{{\Illuminate\Support\Facades\Auth::id()}}">{{\Illuminate\Support\Facades\Auth::user()->identity->name}}</option>
                            @foreach($committees as $committee)
                                <option value="{{$committee->id}}">{{$committee->identity->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="action_plan" value="{{$id}}">
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
