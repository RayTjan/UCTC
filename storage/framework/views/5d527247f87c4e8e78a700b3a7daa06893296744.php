
<?php $__env->startSection('title', 'Add Report'); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-center mt-5">
        <div class="card-attribute-settings">
            <div class="quiz-window">
                <div class="height100">

                    <?php if($edit == true): ?>
                    <form action="<?php echo e(route('lecturer.report.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <h4 class="font-weight-bold">Report <?php echo e($program->name); ?></h4>

                        <div class="form-group">
                            <i class="fa fa-file fa-2x btnSuccess"></i>
                            <label >Report:</label>
                            <input type="file" class="form-control" name="report" required>
                        </div>

                        <input type="hidden" name="program" value="<?php echo e($program->id); ?>">
                        <input type="hidden" name="statusReport" value="0">

                        <div class="text-center">
                            <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                        </div>
                    </form>

                    <?php else: ?>
                        <h2>You don't have permission to edit this program Report!</h2>
                    <?php endif; ?>

                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/addReport.blade.php ENDPATH**/ ?>