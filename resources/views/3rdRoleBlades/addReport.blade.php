@extends('layouts.app')
@section('title', 'Add Report')
@section('content')

    <div class="d-flex justify-content-center mt-5">
        <div class="card-attribute-settings">
            <div class="quiz-window">
                <div class="height100">

                    <form action="{{route('student.report.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <h4 class="font-weight-bold">Report {{ $program->name }}</h4>

                        <div class="form-group">
                            <i class="fa fa-file fa-2x btnSuccess"></i>
                            <label >Report:</label>
                            <input type="file" class="form-control" name="report" required>
                        </div>

                        <input type="hidden" name="program" value="{{ $program->id }}">
                        <input type="hidden" name="statusReport" value="0">

                        <div class="text-center">
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

@endsection
