<?php $__env->startSection('title', 'Edit Action Plan'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Action Plan <?php echo e($action->name); ?></h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="<?php echo e(route('lecturer.action.update', $action)); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($action->name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required><?php echo e($action->description); ?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/editActionPlan.blade.php ENDPATH**/ ?>