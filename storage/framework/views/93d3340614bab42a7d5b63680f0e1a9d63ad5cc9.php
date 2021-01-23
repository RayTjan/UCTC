
<?php $__env->startSection('title', 'Add Action Plan'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Creating New action</h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="<?php echo e(route('lecturer.action.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <input type="hidden" name="status" value="Started">
                    <input type="hidden" name="program" value="<?php echo e($program->id); ?>">
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/2ndRoleBlades/addActionPlan.blade.php ENDPATH**/ ?>