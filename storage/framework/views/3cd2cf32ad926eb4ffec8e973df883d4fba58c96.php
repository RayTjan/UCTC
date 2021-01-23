<?php $__env->startSection('title', 'Add Link'); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-center mt-5">
    <div class="card-attribute-settings">
        <div class="quiz-window">
            <div class="height100">

                <form action="<?php echo e(route('lecturer.file.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>


                    <h4 class="font-weight-bold">Add File Link Attachments</h4>

                    <div class="form-group">
                        <label >Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label >Drive Link:</label>
                        <input type="text" class="form-control" name="file_attachment" required>
                    </div>
                    <input type="hidden" name="program" value="<?php echo e($program->id); ?>">

                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/addAttachment.blade.php ENDPATH**/ ?>