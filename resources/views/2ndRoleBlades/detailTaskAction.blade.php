<script>
    function EnableBtn(checkBtn, id) {
        var btn = document.getElementById(id);
        btn.disabled=checkBtn.checked ? false:true;
        if (!btn.disabled) {
            btn.focus();
        }
    }
</script>

<div class="card-task-popup detailMod" id="detailTask-{{ $con }}">
    <div class="quiz-window">
        <div class="scrollWebkit height100 position-relative pt-0 pb-0">

            <div class="row">
                <h1 class="col font-weight-bold">{{ $tasks[$con]->name }}</h1>
            </div>
            <h3>{{ str_replace("-","/",date("m-d-Y", strtotime($tasks[$con]->due_date))) }}</h3>

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

            <div class="position-static centerBottom">
                <form action="{{ route('staff.file.create', $tasks[$con]->id) }}">
                    <input type="checkbox" class="custom-checkbox" id="checkBtn" onclick="EnableBtn (this, 'BTN-{{$con}}')">
                    already done?
                    <br>
                    <button type="button" disabled="disabled"
                            data-toggle="modal" data-target="#submitTask-{{$con}}"
                            class="btn btn-success" id="BTN-{{$con}}">
                        Submit
                    </button>
                </form>
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
                <h4 class="modal-title">Submit {{$tasks[$con]->name}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-center" style="text-align: left;">
                <form action="{{route('staff.file.show', $tasks[$con]->id)}}" method="get" class="mt-2">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btnA circular greenstar font-weight-bold p-3 green-hover widthSubmitButton">Submit with File Attachment</button>
                </form>
                <form action="" method="post" class="mt-2">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btnA circular graystar font-weight-bold p-3 gray-hover widthSubmitButton">Submit without File Attachment</button>
                </form>
            </div>
        </div>
    </div>
</div>
