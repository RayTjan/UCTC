<div class="card-task-popup detailMod" id="detailTask-{{ $task->id }}">
    <div class="quiz-window">
        <div class="scrollWebkit height100 position-relative pt-0 pb-0">

            <div class="row">
                <h1 class="col font-weight-bold">{{ $task->name }}</h1>
            </div>
            <h3>{{ str_replace("-","/",date("d-m-Y", strtotime($task->due_date))) }}</h3>

            <div class="">
                <div class="row align-items-center">
                    <h6 class="col-md-2 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;: </h6>
                    <p class="col-md-2 font-weight-bold circular purplestar">
                        @if($task->status == 0)
                            Ongoing
                        @else
                            Finished
                        @endif
                    </p>
                </div>
                <div class="row align-items-center">
                    <h6 class="col-md-2 font-weight-bold float-left">PIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                    <p class="col-md-2 font-weight-bold circular bluestar">
                        {{ $task->pic->identity->name }}
                    </p>
                </div>

            </div>

            <h6>Description</h6>
            <div class="ml-4">
                <p>
                    {{$task->description}}
                </p>
            </div>

            @if($edit == true)
            <div class="position-static centerBottom">
                @if($action->plansOf->status != '2')
                <a href="{{ route('student.actionTask.edit', $task->id) }}" class="btn btn-info">Edit</a>
                @endif
                <button type="button"
                        data-toggle="modal" data-target="#submitTask-{{$task->id}}"
                        class="btn btn-success" id="BTN-{{$task->id}}">
                    Submit
                </button>
                @if($action->plansOf->status != '2')
                <button
                    type="button"
                    data-toggle="modal"
                    data-target="#deleteTask-{{ $task->id }}"
                    class="btn btn-danger">
                    Delete
                </button>
                @endif
            </div>
            @endif

        </div>
    </div>

</div>

{{--        Delete Task--}}
<div class="modal fade" id="deleteTask-{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to delete this Task {{ $task->name }} ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                <form action="{{ route('student.actionTask.destroy', $task) }}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                </form>
                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

{{--    modal submit task--}}
<div class="modal fade" id="submitTask-{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to submit task {{$task->name}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                <form action="{{ route('student.actionTask.update', $task) }}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                </form>
                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
