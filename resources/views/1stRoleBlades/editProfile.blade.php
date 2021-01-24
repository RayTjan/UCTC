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
                        <label>Role:</label>
                        @if($user->identity_type == 'App\Models\Student')
                            <select name="role" class="custom-select">
                                <option value="{{$user->role_id}}" hidden>{{$user->role->name}}</option>
                                <option value="1">Coordinator</option>
                                <option value="3">Student</option>
                            </select>
                        @else
                            <select name="role" class="custom-select">
                                <option value="{{$user->role_id}}" hidden>{{$user->role->name}}</option>
                                <option value="1">Coordinator</option>
                                <option value="2">Lecturer</option>
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" value="{{$user->identity->name}}" required>
                    </div>

                    @if($user->identity_type == 'App\Models\Student')
                        <div class="form-group">
                            <label >NIM: </label>
                            <input type="number" class="form-control" name="nim" value="{{$user->identity->nim}}" required>
                        </div>
                    @elseif($user->identity_type == 'App\Models\Staff')
                        <div class="form-group">
                            <label >NIP: </label>
                            <input type="number" class="form-control" name="nip" value="{{$user->identity->nip}}" required>
                        </div>

                        <div class="form-group">
                            <label >NIDN: </label>
                            <input type="number" class="form-control" name="nidn" value="{{$user->identity->nidn}}" required>
                        </div>

                        <div class="form-group">
                            <label >Title: </label>
                            <select name="title_id" class="custom-select">
                                <option value="{{$user->identity->title_id}}" hidden>
                                    @foreach($titles as $title)
                                        @if($title->id == $user->identity->title_id)
                                            {{$title->name}}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach($titles as $title)
                                    <option value="{{$title->id}}">{{$title->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    @elseif($user->identity_type == 'App\Models\Lecturer')
                        <div class="form-group">
                            <label >NIP: </label>
                            <input type="number" class="form-control" name="nip" value="{{$user->identity->nip}}" required>
                        </div>

                        <div class="form-group">
                            <label >NIDN: </label>
                            <input type="number" class="form-control" name="nidn" value="{{$user->identity->nidn}}" required>
                        </div>

                        <div class="form-group">
                            <label >Title: </label>
                            <select name="title_id" class="custom-select">
                                <option value="{{$user->identity->title_id}}" hidden>
                                    @foreach($titles as $title)
                                        @if($title->id == $user->identity->title_id)
                                            {{$title->name}}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach($titles as $title)
                                    <option value="{{$title->id}}">{{$title->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Jaka: </label>
                            <select name="jaka_id" class="custom-select">
                                <option value="{{$user->identity->jaka_id}}" hidden>
                                    @foreach($jakas as $jaka)
                                        @if($jaka->id == $user->identity->jaka_id)
                                            {{$jaka->name}}
                                        @endif
                                    @endforeach
                                </option>
                                @foreach($jakas as $jaka)
                                    <option value="{{$jaka->id}}">{{$jaka->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Batch:</label>
                        <select name="batch" class="custom-select">
                            <option value="{{$user->identity->batch}}" hidden>{{$user->identity->batch}}</option>
                            @for($year = 2008;$year <= 2021;$year++)
                                <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Description: </label>
                        <textarea class="form-control" name="description" required>{{$user->identity->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="custom-select">
                            <option hidden value="{{$user->identity->gender}}">
                                @if($user->identity->gender == 'M')
                                    Male
                                @elseif($user->identity->gender == 'F')
                                    Female
                                @endif
                            </option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Phone: </label>
                        <input type="number" class="form-control" name="phone" value="{{$user->identity->phone}}" required>
                    </div>

                    <div class="form-group">
                        <label >Line Account: </label>
                        <input type="text" class="form-control" name="line_acc" value="{{$user->identity->line_account}}" required>
                    </div>

                    <div class="form-group">
                        <label >Department: </label>
                        <select name="department_id" class="custom-select">
                            <option value="{{$user->identity->department_id}}" hidden>
                                @foreach($departments as $department)
                                    @if($department->id == $user->identity->department_id)
                                        {{$department->name}}
                                    @endif
                                @endforeach
                            </option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--                    normal user form--}}

                    <div class="form-group">
                        <label >Email: </label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                    </div>

                    @if($user->id == \Illuminate\Support\Facades\Auth::id())

                    <input type="hidden" name="bpassword" value="{{$user->password}}">

                    <div class="form-group">
                        <label >Password: </label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label >New Password: </label>
                        <input type="password" class="form-control" name="newpassword">
                    </div>

                    <div class="form-group">
                        <label >Re type Password: </label>
                        <input type="password" class="form-control" name="repassword">
                    </div>

                    @endif

                    <div class="form-group">
                        <label >Profile picture:</label>
                        <input type="file" class="form-control-file" name="picture" accept="image/x-png,image/gif,image/jpeg" />
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
