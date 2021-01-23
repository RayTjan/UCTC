
<?php $__env->startSection('title', 'Program'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Program View</h1>
        </div>

        <?php if(auth()->guard()->check()): ?>
        <div class="clearfix">
            
            <div class="float-right">

                <a href="<?php echo e(route('admin.program.create')); ?>" role="button" aria-pressed="true">
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

            </div>
        </div>
        <?php endif; ?>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">
                        <ul class="guiz-awards-row guiz-awards-header">
                            <li class="guiz-awards-header-star">&nbsp;</li>
                            <li class="guiz-awards-header-title">Name</li>
                            <li class="guiz-awards-header-time">Date</li>
                        </ul>

                        <?php $yes = 0; ?>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="
                            <?php if($yes%2 == 0): ?>
                                guiz-awards-row guiz-awards-row-even
                            <?php else: ?>
                                guiz-awards-row guiz-awards-row
                            <?php endif; ?>
                                quizz">
                            <a href="<?php echo e(route('admin.program.show',$program)); ?>" class="a-none">
                            <li class="guiz-awards-star">
                                <span class="
                                    <?php if($program->category == 1): ?>
                                    star cyanstar
                                    <?php elseif($program->category == 2): ?>
                                    star purplestar
                                    <?php endif; ?>
                                "></span>
                            </li>
                            <li class="guiz-awards-title"><?php echo e($program->name); ?>

                                <div class="guiz-awards-subtitle"><?php echo e($program->goal); ?></div>
                            </li>
                            <li class="guiz-awards-time"><?php echo e($program->program_date); ?></li>
                            </a>
                        </ul>
                            <?php $yes += 1; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>




































        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/1stRoleBlades/listProgram.blade.php ENDPATH**/ ?>