<script>
    function EnableBtn(checkBtn) {
        var btn = document.getElementById("BTN");
        btn.disabled=checkBtn.checked ? false:true;
        if (!btn.disabled) {
            btn.focus();
        }
    }
</script>

<div class="card-task-popup detailMod" id="detailTask-{{ $con }}">
    <div class="quiz-window">
        <div class="scrollWebkit height1concon position-relative pt-con pb-con">



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

            <div class="position-static centerBottom">
                <form action="{{ route('user.file.create') }}">
                    <input type="checkbox" class="custom-checkbox" id="checkBtn" onclick="EnableBtn (this)">
                    already done?
                    <br>
                    <button disabled="disabled" class="btn btn-success" id="BTN">
                        Submit
                    </button>
                </form>
            </div>


        </div>
    </div>

</div>
