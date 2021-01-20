@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Profile {{ $user->identity->name }}</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{route('coordinator.user.update', $user)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="" value="{{ $user->identity->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label >Email:</label>
                        <input type="text" class="form-control" name="" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Picture:</label>
                        <input type="file" id="picture" class="form-control-file @error('picture') is-invalid @enderror" name="picture">
                        @error('picture')<div class="invalid-feedback">
                            {{ $message }}
                        </div>@enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
