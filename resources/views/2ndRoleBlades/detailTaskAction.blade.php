<div class="card-task-popup detailMod" id="detailTask-{{ $con }}">
    <div class="quiz-window">
        <div class="scrollWebkit height100 position-relative pt-0 pb-0">

            <div class="row">
                <h1 class="col font-weight-bold">{{ $tasks[$con]->name }}</h1>
            </div>
            <h3>{{ str_replace("-","/",date("d-m-Y", strtotime($tasks[$con]->due_date))) }}</h3>

            <div class="">
                <div class="row align-items-center">
                    <h6 class="col-md-2 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;: </h6>
                    <p class="col-md-2 font-weight-bold circular purplestar">
                        @if($tasks[$con]->status == 0)
                            Ongoing
                        @else
                            Finished
                        @endif
                    </p>
                </div>
                <div class="row align-items-center">
                    <h6 class="col-md-2 font-weight-bold float-left">PIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                    <p class="col-md-2 font-weight-bold circular bluestar">
                        {{ $tasks[$con]->pic->identity->name }}
                    </p>
                </div>

            </div>

            <h6>Description</h6>
            <div class="ml-4">
                <p>
                    {{$tasks[$con]->description}}
                </p>
            </div>

            @if($edit == true)
            <div class="position-static centerBottom">
                <a href="{{ route('staff.actionTask.edit', $tasks[$con]->id) }}" class="btn btn-info">Edit</a>
                <button type="button"
                        data-toggle="modal" data-target="#submitTask-{{$con}}"
                        class="btn btn-success" id="BTN-{{$con}}">
                    Submit
                </button>
                <button
                    type="button"
                    data-toggle="modal"
                    data-target="#deleteTask-{{ $con }}"
                    class="btn btn-danger">
                    Delete
                </button>
            </div>
            @endif

        </div>
    </div>

</div>

{{--        Delete Task--}}
<div class="modal fade" id="deleteTask-{{$con}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to delete this Task {{ $tasks[$con]->name }} ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                <form action="{{ route('staff.actionTask.destroy', $tasks[$con]) }}" method="post" class="d-inline-block">
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
<div class="modal fade" id="submitTask-{{$con}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to submit task {{$tasks[$con]->name}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                <form action="{{ route('staff.actionTask.update', $tasks[$con]) }}" method="post" class="d-inline-block">
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
