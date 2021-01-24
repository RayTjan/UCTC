<?php $__env->startSection('title', 'Client'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container clearfix" style="margin-top: 20px;">


        <div>
            <a href="<?php echo e(route('lecturer.program.show',$program)); ?>" class="a-none blackhex d-inline-block">
                <h6>Program</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="<?php echo e(route('lecturer.program.show',$program)); ?>" class="a-none blackhex d-inline-block">
                <h6>Detail</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="<?php echo e(route('lecturer.client.show',$program)); ?>" class="a-none blackhex d-inline-block">
                <h6>Client</h6>
            </a>
        </div>

        <div class="row">
            <h1 class="col font-weight-bold">Client List</h1>
        </div>

        <?php if($edit == true): ?>
            <?php if($program->status != '2'): ?>
                <div class="clearfix">

                    <div class="float-right">
                        <a href="#"
                           title="Add Committee"
                           data-toggle="modal"
                           data-target="#addClient">
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
                                        fill="#fff"
                                        d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                                        class="fa-secondary">
                                    </path>
                                </g>
                            </svg>
                        </a>

                    </div>
                </div>


                <div class="modal fade" id="addClient">
                    <div class="modal-dialog">
                        <div class="modal-content card-bg-change">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold">Add committee to <?php echo e($program->name); ?> </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left;">
                                <?php if(count($clientList) > 0): ?>
                                    <form action="<?php echo e(route ('lecturer.client.store')); ?>" method="POST">
                                        <div class="form-group">
                                            <?php echo e(csrf_field()); ?>

                                            <input name="selected_program" type="hidden" value="<?php echo e($program->id); ?>">
                                            <label>Select Committee</label>
                                            <select name="client_id" class="custom-select" required>
                                                <?php $__currentLoopData = $clientList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($client->id); ?>" title="<?php echo e($client->name); ?>"><?php echo e($client->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Committee</button>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <h1 class="h4 mb-0 font-weight-bold">No free user left</h1>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Name</li>
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Phone</li>
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Address</li>
                            <li class="guiz-awards-time customComittee25 font-weight-bold">Email</li>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listClient.blade.php ENDPATH**/ ?>
