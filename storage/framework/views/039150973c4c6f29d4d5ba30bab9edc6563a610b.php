<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">Welcome to UCTC</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Student</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative mb-2">
                    <h3 class="font-weight-bold">Programs</h3>
                    <a href="<?php echo e(route('student.program.index')); ?>" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" >
                        <!-- small box -->
                            <div class="small-box card-bg-change position-relative shadowCard">
                                <?php if($program->status == '0'): ?>
                                    <div class="starCard yellstar"></div>
                                <?php elseif($program->status == '1'): ?>
                                    <div class="starCard toscastar"></div>
                                <?php elseif($program->status == '2'): ?>
                                    <div class="starCard greenstar"></div>
                                <?php elseif($program->status == '3'): ?>
                                    <div class="starCard redstar"></div>
                                <?php endif; ?>
                                <div class="inner ml-2">
                                    <h2 class="reduceWidth maxline font"><?php echo e($program->name); ?></h2>
                                    <div><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></div>
                                </div>
                                <a href="<?php echo e(route('student.program.show',$program)); ?>" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div  class="smol3">
                <div class="">
                    <div class="position-relative mb-2">
                        <h3 class="font-weight-bold">My Programs</h3>
                        <a href="<?php echo e(route('student.program.index')); ?>" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-bluess" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('student.program.show',$program)); ?>" class="a-none">
                            <ul class="todo-list mb-1">
                                    <li class="d-flex justify-content-between truegray-hover">
                                        <div class="d-flex">
                                            <?php if($program->status == '0'): ?>
                                                <div class="ministar yellowstar d-inline-block align-self-center"></div>
                                            <?php elseif($program->status == '1'): ?>
                                                <div class="ministar toscastar d-inline-block align-self-center"></div>
                                            <?php elseif($program->status == '2'): ?>
                                                <div class="ministar greenstar d-inline-block align-self-center"></div>
                                            <?php elseif($program->status == '3'): ?>
                                                <div class="ministar redstar d-inline-block align-self-center"></div>
                                            <?php endif; ?>
                                            <span class="text">
                                                <?php echo e($program->name); ?>

                                            </span>
                                        </div>
                                        <div class="align-self-center">
                                            <?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?>

                                        </div>
                                    </li>
                            </ul>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>
                </div>
            </div>

            <div  class="smol2">
                <div class="">
                    <div class="position-relative mb-2">
                        <h3 class="font-weight-bold">My Tasks</h3>
                    </div>
                    <div class="card card-body card-bg-change" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                        <div class="scrollWebkit p-0">
                            <div class="row">
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- ./col -->
                                    <div class="col-lg-6 col-8" >
                                        <a class="a-none position-relative" href="<?php echo e(route('student.actionTask.show', $task->action_plan)); ?>">
                                            <!-- small box -->
                                            <div class="btnSlider"></div>
                                            <div class="small-box inner-bg-yellow position-relative shadowCard btnSlider">
                                                <div class="p-2 ml-2">
                                                    <h2 class="reduceWidth maxlineP"><?php echo e($task->name); ?></h2>
                                                    <div class="maxlineP"><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($task->due_date)))); ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/3rdRoleBlades/dashboard.blade.php ENDPATH**/ ?>