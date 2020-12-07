@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Program View</h1>
        </div>
        <div class="row">
            {{-- auth to limit content, it cannot be accessed until login --}}
            <div class="col-md-2">
                <a href="{{route('program.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New Program</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">View</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Goal</th>
                    <th scope="col">Date</th>
                    <th scope="col">Created by</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td>{{$program->name}}</td>
                        <td><a href="@auth(){{route('program.show',$program)}}@endauth">View</a></td>
                        <td>{{$program->categorized->name}}</td>
                        <td>{{$program->classified->name}}</td>
                        <td>{{$program->description}}</td>
                        <td>{{$program->status}}</td>
                        <td>{{$program->goal}}</td>
                        <td>{{$program->program_date}}</td>
                        <td>{{$program->creator->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
