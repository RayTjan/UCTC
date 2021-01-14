@extends('layouts.app')
@section('title', 'Add Program')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Creating New Program</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{route('staff.program.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <label class="d-inline-block">Client: </label>
                            <button type="button" name="new" id="new" class="btn btn-success d-inline-block">Add New Client</button>
                            <button type="button" name="load" id="load" class="btn btn-primary d-inline-block">Add Existing Clients</button>
                        </div>
                        <div id="dynamic_field">


                        </div>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label >Goal: </label>
                        <input type="text" class="form-control" name="goal" required>
                    </div>
                    <input type="hidden" name="status" value="Started">
                    <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                    <div class="form-group">
                        <label>Program Date / Deadline:</label>
                        <input type="date" class="form-control" name="program_date" required>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="category" class="custom-select">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <select name="type" class="custom-select">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add Program</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    Untuk add delete client--}}
    <script>
        $(document).ready(function(){
            var i=1;
            $('#new').click(function(){
                i++;
                $('#dynamic_field').append('<div id="row'+i+'"> <input type="text" class="form-control mt-3 d-inline-block newClientForm mr-3" name="newClient[]" placeholder="New client name" required>' +
                    '<input type="text" class="form-control mt-3 d-inline-block newClientForm mr-3" name="phone[]" placeholder="Phone Number" required>' +
                    '<input type="text" class="form-control mt-3 d-inline-block newClientForm mr-3" name="address[]" placeholder="Client Address" required>' +
                    '<input type="text" class="form-control mt-3 d-inline-block newClientForm mr-3" name="email[]" placeholder="Email Client" required>' +
                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mb-1">X</button></div>');
            });

            $('#load').click(function(){
                i++;
                $('#dynamic_field').append('<div id="row'+i+'"> ' +
                    '<select name="client[]" class="custom-select mt-3 mr-3 d-inline-block clientForm">\n' +
                    '                                    <option hidden>Load Existing Client</option>\n' +
                    '                                @foreach($clients as $client)\n' +
                    '                                    <option value="{{$client->id}}">{{$client->name}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select>' +
                    ' <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mt-3">X</button></div>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            // $('#submit').click(function(){
            //     $.ajax({
            //         url:"name.php",
            //         method:"POST",
            //         data:$('#add_name').serialize(),
            //         success:function(data)
            //         {
            //             alert(data);
            //             $('#add_name')[0].reset();
            //         }
            //     });
            // });

        });
    </script>



@endsection
