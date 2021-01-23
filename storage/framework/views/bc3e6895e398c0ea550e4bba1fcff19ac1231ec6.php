<div class="card-task-popup detailMod" id="detailTask-<?php echo e($con); ?>">
    <div class="quiz-window">
        <div class="scrollWebkit height100 position-relative pt-0 pb-0">

            <div class="row">
                <h1 class="col font-weight-bold"><?php echo e($tasks[$con]->name); ?></h1>
            </div>
            <h3><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($tasks[$con]->due_date)))); ?></h3>

            <div class="">
                <div class="row align-items-center">
                    <h6 class="col-md-2 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;: </h6>
                    <p class="col-md-2 font-weight-bold circular purplestar">
                        <?php if($tasks[$con]->status == 0): ?>
                            Ongoing
                        <?php else: ?>
                            Finished
                        <?php endif; ?>
                    </p>
                </div>
                <div class="row align-items-center">
                    <h6 class="col-md-2 font-weight-bold float-left">PIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                    <p class="col-md-2 font-weight-bold circular bluestar">
                        <?php echo e($tasks[$con]->pic->identity->name); ?>

                    </p>
                </div>

            </div>

            <h6>Description</h6>
            <div class="ml-4">
                <p>
                    <?php echo e($tasks[$con]->description); ?>

                </p>
            </div>

            <?php if($edit == true): ?>
            <div class="position-static centerBottom">
                <?php if($action->plansOf->status != '2'): ?>
                <a href="<?php echo e(route('lecturer.actionTask.edit', $tasks[$con]->id)); ?>" class="btn btn-info">Edit</a>
                <?php endif; ?>
                <button type="button"
                        data-toggle="modal" data-target="#submitTask-<?php echo e($con); ?>"
                        class="btn btn-success" id="BTN-<?php echo e($con); ?>">
                    Submit
                </button>
                <?php if($action->plansOf->status != '2'): ?>
                <button
                    type="button"
                    data-toggle="modal"
                    data-target="#deleteTask-<?php echo e($con); ?>"
                    class="btn btn-danger">
                    Delete
                </button>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>
    </div>

</div>


<div class="modal fade" id="deleteTask-<?php echo e($con); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to delete this Task <?php echo e($tasks[$con]->name); ?> ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                <form action="<?php echo e(route('lecturer.actionTask.destroy', $tasks[$con])); ?>" method="post" class="d-inline-block">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                </form>
                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="submitTask-<?php echo e($con); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Are you sure want to submit task <?php echo e($tasks[$con]->name); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                <form action="<?php echo e(route('lecturer.actionTask.update', $tasks[$con])); ?>" method="post" class="d-inline-block">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                </form>
                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/2ndRoleBlades/detailTaskAction.blade.php ENDPATH**/ ?>