@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Program View</h1>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Events (create/joined) </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_id}}</td>
                        @if($user->role_id == 2)
                        <td>{{$user->createEvents->name}}</td>
                        @elseif($user->role_id == 3)
{{--                        <td>{{$user->attends->name}}</td>--}}
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
