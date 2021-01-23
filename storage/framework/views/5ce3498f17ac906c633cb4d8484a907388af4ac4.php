
<?php $__env->startSection('title', 'Tasks'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Tasks View</h1>
        </div>

        <div class="row">
            <div class="card-task card-bg-change">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">

                        <?php for($con = 0;$con < sizeof($tasks);$con++): ?>
                            <a onclick="detailShow('detailTask-<?php echo e($con); ?>')" class="a-none">
                                <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin quizz mb-2">
                                    <li class="guiz-awards-title blackhex"><?php echo e($tasks[$con]->name); ?>


                                        <?php
                                        $desc = $tasks[$con]->description;
                                        if (strlen($desc) > 35) {
                                            $desc = substr($desc,0,35)."...";
                                        }
                                        ?>
                                        <div class="guiz-awards-subtitle"><?php echo e($desc); ?></div>
                                    </li>
                                    <li class="guiz-awards-time text-right blackhex"><?php echo e(substr(str_replace("-","/",date("m-d-Y", strtotime($tasks[$con]->due_date))),0,5)); ?></li>

                                </ul>
                            </a>
                        <?php endfor; ?>

                    </div>
                </div>
            </div>

            <?php for($con = 0;$con < sizeof($tasks);$con++): ?>
                <?php echo $__env->make('3rdRoleBlades.detailTask', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endfor; ?>

        </div>

    </div>

    <script>
        function detailShow(id) {
            var close = document.getElementsByClassName('detailMod');
            var x = document.getElementById(id);
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/3rdRoleBlades/listTask.blade.php ENDPATH**/ ?>