@extends('layouts.app')
@section('title', 'Add Action Plan')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Creating New action</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{route('coordinator.action.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <input type="hidden" name="status" value="Started">
                    <input type="hidden" name="program" value="{{ $program->id }}">
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
