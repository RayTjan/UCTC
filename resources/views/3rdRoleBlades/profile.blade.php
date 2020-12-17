@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1>PROFILE</h1>
        <p>{{$user->identity->name}}</p>
        <form action="{{ route('logout')}}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Bye</button>
        </form>

    </div>
@endsection
