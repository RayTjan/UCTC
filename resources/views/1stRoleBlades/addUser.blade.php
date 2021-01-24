@extends('layouts.app')
@section('title', 'Add New User')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Add New User</h1>
        </div>

        <div class="p-3">
        <div class="onoffswitch">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0" checked="true">
            <label class="onoffswitch-label" for="myonoffswitch">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
        </div>

        <div class="row">

            <div class="col" id="inNew">

                    <div class="form-group">
                        <label>Identity:</label>
                        <select name="" id="identity" class="custom-select">
                            <option value="1">Lecturer</option>
                            <option value="2">Staff</option>
                            <option value="3">Student</option>
                        </select>
                    </div>

                    <div id="lecturerForm">
                        <form action="{{route('coordinator.user.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input type="hidden" name="identity_type" value="App\Models\Lecturer">

                            <div class="form-group">
                                <label>Role:</label>
                                <select name="role" class="custom-select">
                                    <option value="1">Coordinator</option>
                                    <option value="2">Lecturer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group">
                                <label >NIP: </label>
                                <input type="number" class="form-control" name="nip" required>
                            </div>

                            <div class="form-group">
                                <label >NIDN: </label>
                                <input type="number" class="form-control" name="nidn" required>
                            </div>

                            <div class="form-group">
                                <label >Description: </label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Gender:</label>
                                <select name="gender" class="custom-select">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Phone: </label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label >Line Account: </label>
                                <input type="text" class="form-control" name="line_acc" required>
                            </div>

                            <div class="form-group">
                                <label >Department: </label>
                                <select name="department_id" class="custom-select">
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Title: </label>
                                <select name="title_id" class="custom-select">
                                    @foreach($titles as $title)
                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Jaka: </label>
                                <select name="jaka_id" class="custom-select">
                                    @foreach($jakas as $jaka)
                                        <option value="{{$jaka->id}}">{{$jaka->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--                    normal user form--}}

                            <div class="form-group">
                                <label >Email: </label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label >Password: </label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                <label >Re type Password: </label>
                                <input type="password" class="form-control" name="repassword" required>
                            </div>

                            <div class="form-group">
                                <label >Profile picture:</label>
                                <input type="file" class="form-control-file" name="picture" accept="image/x-png,image/gif,image/jpeg" />
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add User</button>
                            </div>
                        </form>
                    </div>

                    <div id="staffForm">
                        <form action="{{route('coordinator.user.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input type="hidden" name="identity_type" value="App\Models\Staff">

                            <div class="form-group">
                                <label>Role:</label>
                                <select name="role" class="custom-select">
                                    <option value="1">Coordinator</option>
                                    <option value="2">Lecturer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group">
                                <label >NIP: </label>
                                <input type="number" class="form-control" name="nip" required>
                            </div>

                            <div class="form-group">
                                <label >Description: </label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Gender:</label>
                                <select name="gender" class="custom-select">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Phone: </label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label >Line Account: </label>
                                <input type="text" class="form-control" name="line_acc" required>
                            </div>

                            <div class="form-group">
                                <label >Department: </label>
                                <select name="department_id" class="custom-select">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Title: </label>
                                <select name="title_id" class="custom-select">
                                    @foreach($titles as $title)
                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--                    normal user form--}}

                            <div class="form-group">
                                <label >Email: </label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label >Password: </label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                <label >Re type Password: </label>
                                <input type="password" class="form-control" name="repassword" required>
                            </div>

                            <div class="form-group">
                                <label >Profile picture:</label>
                                <input type="file" class="form-control-file" name="picture" accept="image/x-png,image/gif,image/jpeg" />
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add User</button>
                            </div>
                        </form>
                    </div>

                    <div id="studentForm">
                        <form action="{{route('coordinator.user.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input type="hidden" name="identity_type" value="App\Models\Student">

                            <div class="form-group">
                                <label>Role:</label>
                                <select name="role" class="custom-select">
                                    <option value="1">Coordinator</option>
                                    <option value="3">Student</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group">
                                <label >NIM: </label>
                                <input type="number" class="form-control" name="nim" required>
                            </div>

                            <div class="form-group">
                                <label>Batch:</label>
                                <select name="batch" class="custom-select">
                                    @for($year = 2008;$year <= 2021;$year++)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Description: </label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Gender:</label>
                                <select name="gender" class="custom-select">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Phone: </label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label >Line Account: </label>
                                <input type="text" class="form-control" name="line_acc" required>
                            </div>

                            <div class="form-group">
                                <label >Department: </label>
                                <select name="department_id" class="custom-select">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--                    normal user form--}}

                            <div class="form-group">
                                <label >Email: </label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label >Password: </label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                <label >Re type Password: </label>
                                <input type="password" class="form-control" name="repassword" required>
                            </div>

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

            <div class="col" id="inEx">

                <div class="form-group">
                    <label>Identity:</label>
                    <select name="" id="identityE" class="custom-select">
                        <option value="1">Lecturer</option>
                        <option value="2">Staff</option>
                        <option value="3">Student</option>
                    </select>
                </div>

                <div id="lecturerEForm">
                    <form action="{{route('coordinator.user.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" name="identity_type" value="App\Models\Lecturer">
                        <input type="hidden" name="existing" value="{{true}}">

                        <div class="form-group">
                            <label>Name:</label>
                            <select name="identity_id" class="custom-select">
                                @foreach($lecturers as $lecturer)
                                    <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Role:</label>
                            <select name="role" class="custom-select">
                                <option value="1">Coordinator</option>
                                <option value="2">Lecturer</option>
                            </select>
                        </div>

                        {{--                    normal user form--}}

                        <div class="form-group">
                            <label >Email: </label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label >Password: </label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label >Re type Password: </label>
                            <input type="password" class="form-control" name="repassword" required>
                        </div>

                        <div class="form-group">
                            <label >Profile picture:</label>
                            <input type="file" class="form-control-file" name="picture" accept="image/x-png,image/gif,image/jpeg" />
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add User</button>
                        </div>
                    </form>
                </div>

                <div id="staffEForm">
                    <form action="{{route('coordinator.user.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" name="identity_type" value="App\Models\Staff">
                        <input type="hidden" name="existing" value="{{true}}">

                        <div class="form-group">
                            <label>Role:</label>
                            <select name="role" class="custom-select">
                                <option value="1">Coordinator</option>
                                <option value="2">Lecturer</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Name:</label>
                            <select name="identity_id" class="custom-select">
                                @foreach($staffs as $staff)
                                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--                    normal user form--}}

                        <div class="form-group">
                            <label >Email: </label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label >Password: </label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label >Re type Password: </label>
                            <input type="password" class="form-control" name="repassword" required>
                        </div>

                        <div class="form-group">
                            <label >Profile picture:</label>
                            <input type="file" class="form-control-file" name="picture" accept="image/x-png,image/gif,image/jpeg" />
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add User</button>
                        </div>
                    </form>
                </div>

                <div id="studentEform">
                    <form action="{{route('coordinator.user.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" name="identity_type" value="App\Models\Student">
                        <input type="hidden" name="existing" value="{{true}}">

                        <div class="form-group">
                            <label>Role:</label>
                            <select name="role" class="custom-select">
                                <option value="1">Coordinator</option>
                                <option value="3">Student</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Name:</label>
                            <select name="identity_id" class="custom-select">
                                @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--                    normal user form--}}

                        <div class="form-group">
                            <label >Email: </label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label >Password: </label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label >Re type Password: </label>
                            <input type="password" class="form-control" name="repassword" required>
                        </div>

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
    </div>

    {{--    Untuk add delete client--}}
    <script>

        $(function() {
            $("#myonoffswitch").click(function() {
                if ($(this).is(":checked")) {
                    $("#inNew").show();
                    $("#inEx").hide();

                } else {
                    $("#inNew").hide();
                    $("#inEx").show();
                }
            });

            $('#identity').change(function(){
                if($(this).val()=="1"){
                    $('#lecturerForm').show();
                    $('#staffForm').hide();
                    $('#studentForm').hide();
                }
                else if($(this).val()=="2"){
                    $('#lecturerForm').hide();
                    $('#staffForm').show();
                    $('#studentForm').hide();
                }
                else{
                    $('#lecturerForm').hide();
                    $('#staffForm').hide();
                    $('#studentForm').show();
                }       });

            $('#identityE').change(function(){
                if($(this).val()=="1"){
                    $('#lecturerEForm').show();
                    $('#staffEForm').hide();
                    $('#studentEForm').hide();
                }
                else if($(this).val()=="2"){
                    $('#lecturerEForm').hide();
                    $('#staffEForm').show();
                    $('#studentEForm').hide();
                }
                else{
                    $('#lecturerEForm').hide();
                    $('#staffEForm').hide();
                    $('#studentEForm').show();
                }       });

        });

    </script>



@endsection
