
<?php $__env->startSection('title', 'Committee'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold"><?php echo e($program->name); ?> Comittees List</h1>
        </div>

        <?php if($edit == true): ?>
            <?php if($program->status != '2'): ?>
            <div class="clearfix">
                
                <div class="float-right">
                    <a href="#"
                            title="Add Committee"
                            data-toggle="modal"
                            data-target="#addCommittee">
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


            <div class="modal fade" id="addCommittee">
                <div class="modal-dialog">
                    <div class="modal-content card-bg-change">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Add committee to <?php echo e($program->name); ?> </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="text-align: left;">
                            <?php if(count($committeeList) > 0): ?>
                                <form action="<?php echo e(route ('lecturer.committee.store')); ?>" method="POST">
                                    <div class="form-group">
                                        <?php echo e(csrf_field()); ?>

                                        <input name="selected_program" type="hidden" value="<?php echo e($program->id); ?>">
                                        <label>Select Committee</label>
                                        <select name="user_id" class="custom-select" required>
                                            <?php $__currentLoopData = $committeeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($committee->id); ?>" title="<?php echo e($committee->identity->name); ?>"><?php echo e($committee->identity->name); ?></option>
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
                            <li class="guiz-awards-time customComittee25">Name</li>
                            <li class="guiz-awards-time customComittee25">Gender</li>
                            <li class="guiz-awards-time customComittee25">Email</li>
                            <li class="guiz-awards-time customComittee25">Access</li>
                        </ul>

                        <?php $__currentLoopData = $program->committees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee25"><?php echo e($committee->identity->name); ?></li>
                            <li class="guiz-awards-time customComittee25">
                                <?php if($committee->identity->gender == 'M'): ?>
                                    Male
                                <?php elseif($committee->identity->gender == 'F'): ?>
                                    Female
                                <?php endif; ?>
                            </li>
                            <li class="guiz-awards-time customComittee25"><?php echo e($committee->identity->email); ?></li>
                            <li class="guiz-awards-time customComittee25"><?php echo e($committee->role->name); ?></li>
                        </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listCommittee.blade.php ENDPATH**/ ?>