<script>
    function EnableBtn(checkBtn) {
        var btn = document.getElementById("BTN");
        btn.disabled=checkBtn.checked ? false:true;
        if (!btn.disabled) {
            btn.focus();
        }
    }
</script>

<div class="card-task-popup" id="detailTask">
    <div class="quiz-window">
        <div class="scrollWebkit height100 position-relative pt-0 pb-0">



            <div class="row">
                <h1 class="col font-weight-bold">{{ $task->name }}</h1>
            </div>
            <h3>{{ str_replace("-","/",date("m-d-Y", strtotime($task->due_date))) }}</h3>

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

            <div class="position-static centerBottom">
                <input type="checkbox" class="custom-checkbox" id="checkBtn" onclick="EnableBtn (this)" name="checkBtn">
                already done?
                <br>
                <button disabled="disabled" class="btn btn-success" id="BTN">Submit</button>
            </div>


        </div>
    </div>

</div>
