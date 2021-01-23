
<?php $__env->startSection('title', 'Detail Program'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold"><?php echo e($program->name); ?></h1>
        </div>
        <div class="d-flex justify-content-between">
            <h3><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></h3>

                <a href="<?php echo e(route('coordinator.file.show',$program)); ?>" class="circular graystar font-weight-bold p-2 gray-hover">
                    <i class="fa fa-paperclip"></i>
                    Data link
                </a>

        </div>

        <div class="ml-4">

            <?php if(isset($clients[0])): ?>
                <div class="row align-items-center">
                    <h6 class="col-md-1 font-weight-bold float-left">Client&nbsp;&nbsp;&nbsp;: </h6>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="col-md-1 font-weight-bold circular graystar mr-1">
                            <?php echo e($client->name); ?>

                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <h6 class="font-weight-bold">Goal</h6>
            <p class="ml-3"><?php echo e($program->goal); ?></p>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular bluestar">
                    <?php echo e($program->creator->identity->name); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-2 font-weight-bold circular cyanstar">
                    <?php echo e($program->classified->name); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Category: </h6>
                <p class="col-md-2 font-weight-bold circular toscastar">
                    <?php echo e($program->categorized->name); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <?php if($program->status == '0'): ?>
                    <p class="col-md-1 font-weight-bold circular yellowstar">
                        Pending
                    </p>
                <?php elseif($program->status == '1'): ?>
                    <p class="col-md-1 font-weight-bold circular toscastar">
                        Ongoing
                    </p>
                <?php elseif($program->status == '2'): ?>
                    <p class="col-md-1 font-weight-bold circular greenstar">
                        Finished
                    </p>
                <?php elseif($program->status == '3'): ?>
                    <p class="col-md-1 font-weight-bold circular redstar">
                        Suspended
                    </p>
                <?php endif; ?>
            </div>

                <?php if(isset($proposal->id)): ?>
                    <div class="row align-items-center">
                        <h6 class="col-1 font-weight-bold float-left pr-1">Proposal :</h6>
                        <?php if($proposal->status == '0'): ?>
                            <p class="col-md-1 font-weight-bold circular yellowstar">
                                Pending
                            </p>
                        <?php elseif($proposal->status == '1'): ?>
                            <p class="col-md-1 font-weight-bold circular greenstar">
                                Approved
                            </p>
                        <?php elseif($proposal->status == '2'): ?>
                            <p class="col-md-1 font-weight-bold circular redstar">
                                Rejected
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($report->id)): ?>
                    <div class="row align-items-center">
                        <h6 class="col-1 font-weight-bold float-left pr-1">Report&nbsp;&nbsp;&nbsp;&nbsp;:</h6>
                        <?php if($report->status == '0'): ?>
                            <p class="col-md-1 font-weight-bold circular yellowstar">
                                Pending
                            </p>
                        <?php elseif($report->status == '1'): ?>
                            <p class="col-md-1 font-weight-bold circular greenstar">
                                Approved
                            </p>
                        <?php elseif($report->status == '2'): ?>
                            <p class="col-md-1 font-weight-bold circular redstar">
                                Rejected
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <h6 class="font-weight-bold">Description</h6>
            <p class="ml-3"><?php echo e($program->description); ?></p>

        </div>

        
        <?php if(isset($program->hasDocs[0]->id)): ?>
            <div class="">
                <h2 class="col font-weight-bold text-center">Documentations</h2>

                <div class="container-fluid py-3">
                    <div class="d-flex colorScroll heightPic">

                        <?php $__currentLoopData = $program->hasDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-6" style="padding: 10px;">
                                <div class="hover hover-5 text-white rounded">
                                    <img src="/img/documentation/<?php echo e($doc->documentation); ?>" alt="image">
                                    <button type="button"
                                            data-toggle="modal"
                                            data-target="#imgview-<?php echo e($doc->id); ?>">
                                        <div class="hover-overlay">

                                        </div>
                                    </button>
                                </div>
                            </div>

                            
                            <div class="modal fade" id="imgview-<?php echo e($doc->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modalpic-content">
                                        <!-- Modal body -->
                                        <div class="modalpic-body text-center">
                                            <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                            <img src="/img/documentation/<?php echo e($doc->documentation); ?>" alt="image" class="card-img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

            </div>
        <?php endif; ?>

        
        <?php
        $total = 0;



        foreach ($program->hasFinances as $finance){
            //0 income 1 expenditure
            if ($finance->type == '0') {
                $total = $total + $finance->value;
            }else if ($finance->type == '1') {
                $total = $total - $finance->value;
            }
        }
        ?>

            <div class="clearfix">
                <h5 class="float-right font-weight-bold">Budgeting</h5>
            </div>
            <div class="clearfix">
                <h3 class="float-right">Rp. <?php echo e($total); ?></h3>
            </div>

        <div class="d-flex justify-content-between mb-5">
            <div class="">
                    <a href="<?php echo e(route('coordinator.client.show', $program)); ?>" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                        <i class="fa fa-user"></i>
                        Client
                    </a>
                    <a href="<?php echo e(route('coordinator.committee.show', $program)); ?>" class="circular cyanstar font-weight-bold p-2 cyan-hover mr-2">
                        <i class="fa fa-user"></i>
                        Committee
                    </a>
                    <a href="<?php echo e(route('coordinator.action.show', $program)); ?>" class="circular bluestar font-weight-bold p-2 blue-hover mr-2">
                        <i class="fa fa-database"></i>
                        Action Plan
                    </a>
                    <a href="<?php echo e(route('coordinator.program.edit', $program)); ?>" class="circular purplestar font-weight-bold p-2 purple-hover mr-2">
                        <i class="fa fa-dashboard"></i>
                        Edit
                    </a>

                    <a href="<?php echo e(route('coordinator.proposal.show', $program)); ?>" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                        <i class="fa fa-address-book"></i>
                        Proposal
                    </a>

                    
                        <a href="<?php echo e(route('coordinator.report.create', $program)); ?>" class="circular greenstar font-weight-bold p-2 green-hover mr-2">
                            <i class="fa fa-book"></i>
                            Report
                        </a>

                <button type="button"
                        data-toggle="modal"
                        data-target="#deleteProgram"
                        class="btnA circular redstar font-weight-bold p-2 red-hover">
                    <i class="fa fa-close"></i>
                    Delete
                </button>
            </div>
                <div>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#detailBudget"
                            class="btnA circular graystar font-weight-bold p-2 gray-hover">
                        <i class="fa fa-address-book"></i>
                        Detail
                    </button>
                </div>
        </div>

        
        <div class="modal fade zindex1050" id="detailBudget">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header card-bg-change">
                        <a href="<?php echo e(route('coordinator.finance.show', $program)); ?>" class="circular yellowstar font-weight-bold p-2 yellow-hover">
                            <i class="fa fa-money"></i>
                            Finance
                        </a>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="card-bg-change scrollWebkit height100 modalCustomBody">

                        <?php $__currentLoopData = $program->hasFinances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                                <li class="guiz-awards-time text-left"><?php echo e($finance->name); ?></li>
                                <?php if($finance->type == '0'): ?>
                                    <li class="guiz-awards-time float-right text-right btnSuccess">
                                        + Rp. <?php echo e($finance->value); ?>

                                    </li>
                                <?php elseif($finance->type == '1'): ?>
                                    <li class="guiz-awards-time float-right text-right btnDelete">
                                        - Rp. <?php echo e($finance->value); ?>

                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="card-bg-change height100 modalCustomFooter">
                        <div class="absoluteFooter">
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark pr-4 pl-4 clearfix">
                                <li class="guiz-awards-time text-left">Total</li>
                                <li class="guiz-awards-time float-right text-right">Rp. <?php echo e($total); ?></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        

        <div class="modal fade" id="deleteProgram">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure want to delete program <?php echo e($program->name); ?> </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body d-inline-block text-center" style="text-align: left;">
                        <form action="<?php echo e(route('coordinator.program.destroy', $program)); ?>" method="post" class="d-inline-block">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover">Yes</button>
                        </form>
                        <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/detailProgram.blade.php ENDPATH**/ ?>