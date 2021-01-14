@extends('layouts.app')
@section('title', 'Edit Program')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Program {{ $program->name }}</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="{{route('staff.program.update', $program)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" value="{{ $program->name }}" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required>{{ $program->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label >Goal: </label>
                        <input type="text" class="form-control" name="goal" value="{{ $program->goal }}" required>
                    </div>
                    <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                    <div class="form-group">
                        <label>Program Date / Deadline:</label>
                        <input type="date" class="form-control" name="program_date" value="{{ $program->program_date }}" required>
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
                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" class="custom-select">
                                <option value="Started">Started</option>
                            <option value="Finished">Finished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Proposal:</label>
                        <input type="file" name="proposal" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label>Budgeting:</label>
                        <div id="dynamic_field">
                            <div>
                                @foreach($program->hasFinances as $finance)
                                    <select name="typeFinance[]" class="custom-select typeBudgetForm d-inline-block mr-3">
                                        <option hidden>Select Type</option>
                                        <option value="0">Income</option>
                                        <option value="1">Expenditure</option>
                                    </select>
                                    <input type="text" name="nameBudget[]" placeholder="Enter your Detail" class="sizeForm form-control name_list d-inline-block mr-3" value="{{$finance->name}}" />
                                    <input type="number" name="value[]" placeholder="Enter your Budget" class="sizeForm form-control name_list d-inline-block mr-3" value="{{$finance->value}}" />
                                @endforeach
                                    <select name="typeFinance[]" class="custom-select typeBudgetForm d-inline-block mr-3">
                                        <option hidden>Select Type</option>
                                        <option value="0">Income</option>
                                        <option value="1">Expenditure</option>
                                    </select>
                                    <input type="text" name="nameBudget[]" placeholder="Enter your Detail" class="sizeForm form-control name_list d-inline-block mr-3" />
                                    <input type="number" name="value[]" placeholder="Enter your Budget" class="sizeForm form-control name_list d-inline-block mr-3" />
                                    <button type="button" name="add" id="add" class="btn btn-success d-inline-block">Add More</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Documentations:</label>
                        <div id="picture_field">
                            <div>
                                <input type="file" name="documentation[]" class="form-control-file d-inline-block docForm">
                                <button type="button" name="addPic" id="addPic" class="btn btn-success d-inline-block">Add More</button>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Edit Program</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    untuk budgeting biar bisa add delete row--}}
    <script>
        $(document).ready(function(){
            var i=1;
            var u=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div id="row'+i+'"> ' +
                    '<select name="typeFinance[]" class="custom-select typeBudgetForm d-inline-block mr-3">\n' +
                    '                                    <option hidden>Select Type</option>\n' +
                    '                                    <option value="0">Income</option>\n' +
                    '                                    <option value="1">Expenditure</option>\n' +
                    '                                </select>' +
                    '<input type="text" name="nameBudget[]" placeholder="Enter your Detail" class="sizeForm form-control name_list d-inline-block mr-3" /> <input type="number" name="value[]" placeholder="Enter your Budget" class="sizeForm form-control name_list d-inline-block mr-3" /> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
            });

            $('#addPic').click(function(){
                u++;
                $('#picture_field').append('<div id="row'+u+'"> <input type="file" name="documentation[]" class="form-control-file d-inline-block docForm"> <button type="button" name="remove" id="'+u+'" class="btn btn-danger btn_remove">X</button></div>');
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
