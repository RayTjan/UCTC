<?php $__env->startSection('title', 'Client'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold"><?php echo e($program->name); ?> Client List</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee25">Name</li>
                            <li class="guiz-awards-time customComittee25">Phone</li>
                            <li class="guiz-awards-time customComittee25">Address</li>
                            <li class="guiz-awards-time customComittee25">Email</li>
                        </ul>

                        <?php $__currentLoopData = $program->clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee25"><?php echo e($client->name); ?></li>
                                <li class="guiz-awards-time customComittee25"><?php echo e($client->phone); ?></li>
                                <li class="guiz-awards-time customComittee25"><?php echo e($client->address); ?></li>
                                <li class="guiz-awards-time customComittee25"><?php echo e($client->email); ?></li>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/3rdRoleBlades/listClientProgram.blade.php ENDPATH**/ ?>