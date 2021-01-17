@extends('layouts.app')
@section('title', 'Edit File')
@section('content')

    <div class="d-flex justify-content-center mt-5">
        <div class="card-attribute-settings">
            <div class="quiz-window">
                <div class="height100">

                    <form action="{{route('student.file.update',$file->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PATCH">
                        <h4 class="font-weight-bold">Edit File Attachment</h4>

                        <div class="form-group">
                            <label >Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $file->name }}" required>
                        </div>

                        <div class="form-group">
                            <label >Drive Link:</label>
                            <input type="text" class="form-control" name="file_attachment" value="{{ $file->file_attachment }}" required>
                        </div>

                        <input type="hidden" name="program" value="{{$file->program}}">

                        <div class="text-center">
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

@endsection
