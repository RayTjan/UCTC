@extends('adminPage.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Admin Event View</h1>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Owned By</th>
                    <th scope="col">Update at</th>
                    <th scope="col">Create at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><a href="@auth(){{route('admin.event.edit',$event)}}@endauth">{{$event->title}}</div></a></td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->status}}</td>
                    <td>{{$event->creator->name}}</td>
                    <td>{{$event->updated_at}}</td>
                    <td>{{$event->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
