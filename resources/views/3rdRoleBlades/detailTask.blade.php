<script>
    function EnableBtn(checkBtn) {
        var btn = document.getElementById("BTN");
        btn.disabled=checkBtn.checked ? false:true;
        if (!btn.disabled) {
            btn.focus();
        }
    }
</script>

<div class="card-task-popup scrollWebkit position-relative">

    <div class="row">
        <h1 class="col font-weight-bold">Coding School</h1>
    </div>
    <h3>15/16/2001</h3>

    <div class="">
        <div class="row align-items-center">
            <h6 class="col-md-2 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;: </h6>
            <p class="col-md-2 font-weight-bold circular purplestar">
                unchch
            </p>
        </div>
        <div class="row align-items-center">
            <h6 class="col-md-2 font-weight-bold float-left">PIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
            <p class="col-md-2 font-weight-bold circular bluestar">
                unchch
            </p>
        </div>

    </div>

    <h6>Description</h6>
    <div class="ml-4">
        <p>
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdwaudhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw
            audhawhuhqowdoaooa djqnwonqoid adwqiheoqn ijdiojioajwd ajsiojd asdajdwo kadoa dasdw

        </p>
    </div>

        <div class="position-static centerBottom">
            <input type="checkbox" class="custom-checkbox" id="checkBtn" onclick="EnableBtn (this)" name="checkBtn">
            already done?
            <br>
            <button disabled="disabled" class="btn btn-success" id="BTN">Submit</button>
        </div>


</div>
