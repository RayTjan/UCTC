
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <h1>DASHBOARD</h1>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Recents</h3>
                    <a href="<?php echo e(route('user.program.index')); ?>" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box inner-bg-change">
                            <div class="inner inner-bg-change">
                                <h2 class="font-weight-bold"><?php echo e($program->name); ?></h2>
                                <p><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></p>
                            </div>
                            <a href="<?php echo e(route('user.program.show',$program)); ?>" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>


        <p  class="smol3">
            Sartorial kogi taxidermy, kickstarter synth yr irony ennui everyday carry
            retro helvetica stumptown cloud bread squid echo park. Etsy cloud bread
            sartorial quinoa tacos beard mumblecore shaman tumblr pop-up. Twee retro
            fingerstache af helvetica pabst 8-bit leggings taiyaki portland ramps tbh
            tumblr vinyl. Neutra humblebrag bushwick portland subway tile plaid, offal
            scenester flexitarian cliche squid small batch palo santo. Palo santo meh
            adaptogen +1 3 wolf moon, listicle brunch ethical fanny pack everyday
            carry fam. Offal fingerstache taxidermy, man bun venmo PBR&amp;B helvetica
            thundercats everyday carry tote bag artisan cray wolf jianbing.
        </p>


            <div class="smol2">
                <div class="">





                    <div class="position-relative">
                        <h3 class="font-weight-bold">Tasks List</h3>
                        <a href="<?php echo e(route('user.task.index')); ?>" class="seeall">see all</a>
                    </div>










                </div>
                <!-- /.card-header -->
                <div class="card card-body card-bg-change" style="height: 250px;">
                    <div class="scrollWebkit p-0">
                    <ul class="todo-list">

                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text"><?php echo e($task->name); ?></span>
                            <div class="float-right">
                                <p class=""><?php echo e(substr(str_replace("-","/",date("d-m-Y", strtotime($task->due_date))),0,5)); ?></p>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                    </div>
                </div>
                <!-- /.card-body -->



            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/3rdRoleBlades/dashboard.blade.php ENDPATH**/ ?>