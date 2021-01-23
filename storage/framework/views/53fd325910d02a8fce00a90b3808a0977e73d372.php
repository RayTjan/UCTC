
<?php $__env->startSection('title', 'Task Action Plan'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="font-weight-bold">Tasks In <?php echo e($action->name); ?> Action Plan</h1>

            <?php if($edit == true): ?>
            <?php if($action->plansOf->status != '2'): ?>
            <a href="<?php echo e(route('lecturer.actionTask.create', $action->id)); ?>" role="button" aria-pressed="true">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="angle-double-right"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x iconplus float-right"
                >
                    <g>
                        <path
                            fill="#000000"
                            d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                            class="fa-secondary">
                        </path>
                    </g>
                </svg>
            </a>
            <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="card-task card-bg-change">
                <div class="quiz-window">
                    <div class="card-bg-change scrollWebkit height100">
                        <?php if(isset($tasks[0])): ?>
                        <?php for($con = 0;$con < sizeof($tasks);$con++): ?>
                        <a onclick="detailShow('detailTask-<?php echo e($con); ?>')" class="a-none">
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin quizz borderquiz mb-2">
                                    <li class="guiz-awards-title blackhex"><?php echo e($tasks[$con]->name); ?>


                                        <?php
                                            $desc = $tasks[$con]->description;
                                            if (strlen($desc) > 35) {
                                                $desc = substr($desc,0,35)."...";
                                            }
                                        ?>
                                        <div class="guiz-awards-subtitle"><?php echo e($desc); ?></div>
                                    </li>
                                    <li class="guiz-awards-time text-right blackhex"><?php echo e(substr(str_replace("-","/",date("d-m-Y", strtotime($tasks[$con]->due_date))),0,5)); ?></li>

                            </ul>
                        </a>
                        <?php endfor; ?>
                    </div>
                        <?php else: ?>
                        <div class="card-bg-change d-flex justify-content-center height100">
                            <div class="align-self-center">
                                No Tasks List
                            </div>
                        </div>
                        <?php endif; ?>

                </div>
            </div>

            <?php for($con = 0;$con < sizeof($tasks);$con++): ?>
                <?php echo $__env->make('2ndRoleBlades.detailTaskAction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listTaskAction.blade.php ENDPATH**/ ?>