@extends('layouts.app')
@section('title', 'Edit Action Plan')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Action Plan {{ $action->name }}</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{ route('coordinator.action.update', $action) }}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" value="{{ $action->name }}" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required>{{ $action->description }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
