<?php $__env->startSection('title', 'Action Plan'); ?>
<?php $__env->startSection('content'); ?>

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Action Plan <?php echo e($program->name); ?></h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">
                        <ul class="guiz-awards-row guiz-awards-header">
                            <li class="guiz-awards-header-star">&nbsp;</li>
                            <li class="guiz-awards-header-title">Name</li>
                            <?php if($edit == true): ?>
                            <li class="guiz-awards-header-time">Action</li>
                            <?php endif; ?>
                        </ul>

                        <?php $yes = 0; ?>
                        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actionPlan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="
                            <?php if($yes%2 == 0): ?>
                                guiz-awards-row guiz-awards-row-even
                            <?php else: ?>
                                guiz-awards-row guiz-awards-row
                            <?php endif; ?>
                                quizz">
                                <a href="<?php echo e(route('student.actionTask.show', $actionPlan)); ?>" class="a-none">
                                    <li class="guiz-awards-star">
                                <span class="star"></span>
                                    </li>
                                    <li class="guiz-awards-title"><?php echo e($actionPlan->name); ?>

                                        <div class="guiz-awards-subtitle"><?php echo e($actionPlan->description); ?></div>
                                    </li>
                                    <?php if($edit == true): ?>
                                    <li class="guiz-awards-time">
                                        <div class="dropdown">
                                            <div class="dropdown show">
                                                <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                        <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <form action="<?php echo e(route('student.action.edit', $actionPlan)); ?>" method="get">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="pl-2 btnA dropdown-item">Edit</button>
                                                    </form>
                                                    <button
                                                        type="button"
                                                        data-toggle="modal"
                                                        data-target="#deleteAction-<?php echo e($actionPlan->id); ?>"
                                                        class="pl-2 btnA dropdown-item btnDelete">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </a>
                            </ul>

                            

                            <div class="modal fade" id="deleteAction-<?php echo e($actionPlan->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure want to delete this <?php echo e($actionPlan->name); ?> action plan?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                            <form action="<?php echo e(route('student.action.destroy', $actionPlan)); ?>" method="post" class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover">Yes</button>
                                            </form>
                                            <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $yes += 1; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/3rdRoleBlades/listActionPlan.blade.php ENDPATH**/ ?>