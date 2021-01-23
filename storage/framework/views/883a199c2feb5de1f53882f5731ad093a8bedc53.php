<?php $__env->startSection('title', 'Detail Program'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="position-relative">
            <div>
                <div class="d-flex flex-row">
                    <h1><?php echo e($program->name); ?></h1>
                    <div class="align-self-center">
                        <?php if($program->status == '0'): ?>
                            <p class="font-weight-bold circular yellowstar">
                                Pending
                            </p>
                        <?php elseif($program->status == '1'): ?>
                            <p class="font-weight-bold circular toscastar">
                                Ongoing
                            </p>
                        <?php elseif($program->status == '2'): ?>
                            <p class="font-weight-bold circular greenstar">
                                Finished
                            </p>
                        <?php elseif($program->status == '3'): ?>
                            <p class="font-weight-bold circular redstar">
                                Suspended
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <h3><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></h3>
            </div>
            <?php if($program->status == '1' || $program->status == '2'): ?>
            <div class="card-finance card-bg-change position-absolute">

                
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
                    <div class="clearfix mb-2">
                        <h3 class="float-right">Rp. <?php echo e($total); ?></h3>
                    </div>

                <?php if($program->status == '1' || $program->status == '2'): ?>
                    <div class="clearfix">
                        <a href="<?php echo e(route('lecturer.finance.show', $program)); ?>" class="float-right circular yellowstar font-weight-bold p-1 yellow-hover">
                            <i class="fa fa-money"></i>
                            Detail
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>

        <div class="">

            <?php if(isset($clients[0])): ?>
            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Client&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <?php for($i=0;$i<sizeof($clients);$i++): ?>
                <p class="">
                    <?php if($i == (sizeof($clients)-1)): ?>
                        <?php echo e($clients[$i]->name); ?>

                    <?php else: ?>
                        <?php echo e($clients[$i]->name.', '); ?>

                    <?php endif; ?>

                </p>
                <?php endfor; ?>
            </div>
            <?php endif; ?>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="">
                    <?php echo e($program->creator->identity->name); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="">
                    <?php echo e($program->classified->name); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Category&nbsp;&nbsp;: </h6>
                <p class="">
                    <?php echo e($program->categorized->name); ?>

                </p>
            </div>

            <?php if(isset($proposal->id)): ?>
            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal&nbsp;&nbsp;&nbsp;:</h6>
                <?php if($proposal->status == '0'): ?>
                    <p class="text-primary">
                        Pending
                    </p>
                <?php elseif($proposal->status == '1'): ?>
                    <p class="text-success">
                        Approved
                    </p>
                <?php elseif($proposal->status == '2'): ?>
                    <p class="text-danger">
                        Rejected
                    </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if(isset($report->id)): ?>
                <div class="row align-items-center">
                    <h6 class="col-1 font-weight-bold float-left pr-1">Report&nbsp;&nbsp;&nbsp;&nbsp;:</h6>
                    <?php if($report->status == '0'): ?>
                        <p class="text-primary">
                            Pending
                        </p>
                    <?php elseif($report->status == '1'): ?>
                        <p class="text-success">
                            Approved
                        </p>
                    <?php elseif($report->status == '2'): ?>
                        <p class="text-danger">
                            Rejected
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Goal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="">
                    <?php echo e($program->goal); ?>

                </p>
            </div>

        </div>

        <div class="card-desc card-bg-change mb-3">
            <div class="quiz-window">
                <div class="card-bg-change scrollWebkit height100">
                    <div class="">
                        <h5 class="font-weight-bold">Description</h5>
                        <div class=""><?php echo e($program->description); ?></div>
                    </div>
                </div>
            </div>
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

        <div class="d-flex justify-content-between mb-5">
            <div class="align-self-center">
                <?php if($program->status == '1'||$program->status == '2'): ?>
                <a href="<?php echo e(route('lecturer.client.show', $program)); ?>" title="Client" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                    <i class="fa fa-user"></i>
                    Client
                </a>
                <a href="<?php echo e(route('lecturer.committee.show', $program)); ?>" title="Committee" class="circular cyanstar font-weight-bold p-2 cyan-hover mr-2">
                    <i class="fa fa-user"></i>
                    Committee
                </a>
                <a href="<?php echo e(route('lecturer.action.show', $program)); ?>" title="Action Plan" class="circular bluestar font-weight-bold p-2 blue-hover mr-2">
                    <i class="fa fa-database"></i>
                    Action Plan
                </a>
                <a href="<?php echo e(route('lecturer.fund.show', $program)); ?>" title="Funds" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-money"></i>
                    Reimburse
                </a>
                <?php endif; ?>

                <?php if($program->status == '3'): ?>
                <a class="circular redstar font-weight-bold p-2 red-hover mr-2"
                    title="Suspend note"
                    data-toggle="modal"
                    data-target="#note-<?php echo e($program->id); ?>">
                    <i class="fa fa-sticky-note"></i>
                    Coor's Note
                </a>
                <?php endif; ?>

                <?php if($program->status == '1'||$program->status == '2'): ?>
                <a href="<?php echo e(route('lecturer.proposal.show', $program)); ?>" title="Proposal" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-address-book"></i>
                    Proposal
                </a>

                <?php if(isset($proposal->status)): ?>
                <?php if($proposal->status == "1"): ?>
                    <a href="<?php echo e(route('lecturer.report.create', $program)); ?>" title="Report" class="circular greenstar font-weight-bold p-2 green-hover mr-2">
                        <i class="fa fa-book"></i>
                        Report
                    </a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>

                <?php if($program->status == '1' || $program->status == '2'): ?>
                    <a href="<?php echo e(route('lecturer.file.show',$program)); ?>" class="circular graystar font-weight-bold p-2 gray-hover mr-2">
                        <i class="fa fa-clipboard"></i>
                        Data link
                    </a>
                <?php endif; ?>
            </div>
            <div class="align-self-center">
                <?php if($edit == true): ?>
                <?php if($program->status != '3'&&$program->status != '2'): ?>
                    <a href="<?php echo e(route('lecturer.program.edit', $program)); ?>" title="Edit" class="circular purplestar font-weight-bold p-2 purple-hover mr-2">
                        <i class="fa fa-dashboard"></i>
                        Edit
                    </a>
                <?php endif; ?>
                <?php endif; ?>

                <?php if($edit == true): ?>
                <?php if($program->status != '2'): ?>
                    <button type="button"
                            title="Delete"
                            data-toggle="modal"
                            data-target="#deleteProgram"
                            class="btnA circular redstar font-weight-bold p-2 red-hover">
                                <i class="fa fa-close"></i>
                                Delete
                    </button>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="modal fade" id="note-<?php echo e($program->id); ?>">
            <div class="modal-dialog">
                <div class="modal-content bg-change-red">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title font-weight-bold titlelogin">Note From Coor</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" style="text-align: left;">
                        <p class="titlelogin"><?php echo e($program->note); ?></p>
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
                        <form action="<?php echo e(route('lecturer.program.destroy', $program)); ?>" method="post" class="d-inline-block">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/detailProgram.blade.php ENDPATH**/ ?>