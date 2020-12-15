@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1>PROFILE</h1>
        <p>{{$user->name}}</p>
    </div>
@endsection
