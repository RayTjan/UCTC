<?php $__env->startSection('title', 'Settings'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row mb-3">
            <h1 class="col font-weight-bold">Settings</h1>
        </div>

        <div class="row">
            <div class="card-attribute mr-4">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <h4 class="font-weight-bold">Category</h4>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2">
                            <div class="d-flex justify-content-between">
                                <li class="guiz-awards-title titleWidth"><?php echo e($category->name); ?></li>
                                <li class="align-self-center">
                                    <form action="<?php echo e(route('coordinator.setting.destroy', $category->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA deleteAtt">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>

            <div class="card-attribute mr-4">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <h4 class="font-weight-bold">Type</h4>

                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2">
                            <div class="d-flex justify-content-between">
                                <li class="guiz-awards-title titleWidth"><?php echo e($type->name); ?></li>
                                <li class="align-self-center">
                                    <form action="<?php echo e(route('coordinator.setting.tdestroy', $type->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA deleteAtt">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>

            <div class="card-attribute-settings mr-4">
                <div class="quiz-window">
                    <div class="height100">

                            <h4 class="font-weight-bold mb-3">Add New Attributes</h4>

                            <div class="form-group text-center">
                                <a onclick="inputShow('categoryInput')"
                                        class="titlelogin btn btn-success mr-0 ml-0 d-inline-block">Category</a>
                                <a onclick="inputShow('typeInput')"
                                        class="titlelogin btn btn-primary mr-0 ml-0 d-inline-block">Type</a>
                            </div>

                        <form action="<?php echo e(route('coordinator.setting.store')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group detailMod" id="categoryInput">
                                <label >Category:</label>
                                <input type="text" class="form-control" name="cname">
                            </div>

                            <div class="form-group detailMod" id="typeInput">
                                <label >Type:</label>
                                <input type="text" class="form-control" name="tname">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function inputShow(id) {
            var x = document.getElementById(id);
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listAttribute.blade.php ENDPATH**/ ?>