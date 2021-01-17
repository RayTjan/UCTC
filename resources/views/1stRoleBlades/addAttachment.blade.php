@extends('layouts.app')
@section('title', 'Submit Task')
@section('content')

    <div class="d-flex justify-content-center mt-5">
    <div class="card-attribute-settings">
        <div class="quiz-window">
            <div class="height100">

                <form action="{{route('admin.file.store')}}" method="post">
                    {{csrf_field()}}

                    <h4 class="font-weight-bold">New File Submission</h4>

                    <div class="form-group">
                        <label >Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label >Drive Link:</label>
                        <input type="text" class="form-control" name="file_attachment" required>
                    </div>

                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="idTask" value="{{ $task->id }}">

                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
