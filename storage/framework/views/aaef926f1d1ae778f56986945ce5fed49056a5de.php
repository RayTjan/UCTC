<?php $__env->startSection('title', 'Detail Program'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">


        <div>
            <a href="" class="a-none blackhex d-inline-block">
                <h6>Program</h6>
            </a>
            <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
            <a href="<?php echo e(route('coordinator.program.show',$program)); ?>" class="a-none blackhex d-inline-block">
                <h6>Detail</h6>
            </a>
        </div>

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
                <h4 class="mt-2"><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></h4>
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
                        <h5 class="float-right font-weight-bold">Balance</h5>
                    </div>
                    <div class="clearfix mb-2">
                        <?php if($total<0): ?>
                            <h3 class="float-right text-danger">Rp. <?php echo e($total); ?></h3>
                        <?php else: ?>
                            <h3 class="float-right">Rp. <?php echo e($total); ?></h3>
                        <?php endif; ?>
                    </div>

                <?php if($program->status == '1' || $program->status == '2'): ?>
                    <div class="clearfix">
                        <a href="<?php echo e(route('coordinator.finance.show', $program)); ?>" class="float-right circular yellowstar font-weight-bold p-1 yellow-hover">
                            <i class="fa fa-money"></i>
                            Detail
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>

        <div class="mt-3">

            <?php if(isset($clients[0])): ?>
            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Client</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <?php for($i=0;$i<sizeof($clients);$i++): ?>
                <div class="">
                    <?php if($i == (sizeof($clients)-1)): ?>
                        <?php echo e($clients[$i]->name); ?>

                    <?php else: ?>
                        <?php echo e($clients[$i]->name.','); ?>&nbsp;
                    <?php endif; ?>

                </div>
                <?php endfor; ?>
            </div>
            <?php endif; ?>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    <?php echo e($program->creator->identity->name); ?>

                </div>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    <?php echo e($program->classified->name); ?>

                </div>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Category</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    <?php echo e($program->categorized->name); ?>

                </div>
            </div>

            <?php if(isset($proposal->id)): ?>
            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <?php if($proposal->status == '0'): ?>
                    <div class="text-primary">
                        Pending
                    </div>
                <?php elseif($proposal->status == '1'): ?>
                    <div class="text-success">
                        Approved
                    </div>
                <?php elseif($proposal->status == '2'): ?>
                    <div class="text-danger">
                        Rejected
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if(isset($report->id)): ?>
                <div class="row align-items-center">
                    <h6 class="col-1 font-weight-bold float-left pr-1">Report</h6>
                    <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                    <?php if($report->status == '0'): ?>
                        <div class="text-primary">
                            Pending
                        </div>
                    <?php elseif($report->status == '1'): ?>
                        <div class="text-success">
                            Approved
                        </div>
                    <?php elseif($report->status == '2'): ?>
                        <div class="text-danger">
                            Rejected
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="row align-items-center mt-3">
                <h6 class="col-md-1 font-weight-bold float-left">Goal</h6>
                <h6 class="font-weight-bold float-left">:&nbsp;</h6>
                <div class="">
                    <?php echo e($program->goal); ?>

                </div>
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
            <h2 class="col font-weight-bold text-left">Documentations</h2>

            <div class="container-fluid py-3">
                <div class="d-flex colorScroll heightPic">

                    <?php $__currentLoopData = $program->hasDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-6" id="picDoc" style="padding: 10px;">
                        <div class="hover hover-5 text-white rounded" >
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
                <a href="<?php echo e(route('coordinator.client.show', $program)); ?>" title="Client" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                    <i class="fa fa-user"></i>
                    Client
                </a>
                <a href="<?php echo e(route('coordinator.committee.show', $program)); ?>" title="Committee" class="circular yellowstar font-weight-bold p-2 yellow-hover mr-2">
                    <i class="fa fa-user"></i>
                    Committee
                </a>
                <a href="<?php echo e(route('coordinator.fund.show', $program)); ?>" title="Funds" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
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
                <a href="<?php echo e(route('coordinator.proposal.show', $program)); ?>" title="Proposal" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                    <i class="fa fa-address-book"></i>
                    Proposal
                </a>

                <?php if(isset($proposal->status)): ?>
                <?php if($proposal->status == "1"): ?>
                    <a href="<?php echo e(route('coordinator.report.create', $program)); ?>" title="Report" class="circular toscastar font-weight-bold p-2 tosca-hover mr-2">
                        <i class="fa fa-book"></i>
                        Report
                    </a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>

                <?php if($program->status == '1' || $program->status == '2'): ?>
                    <a href="<?php echo e(route('coordinator.action.show', $program)); ?>" title="Action Plan" class="circular bluestar font-weight-bold p-2 blue-hover mr-2">
                        <i class="fa fa-database"></i>
                        Action Plan
                    </a>

                    <a href="<?php echo e(route('coordinator.file.show',$program)); ?>" class="circular graystar font-weight-bold p-2 gray-hover mr-2">
                        <i class="fa fa-clipboard"></i>
                        Data Link
                    </a>
                <?php endif; ?>
            </div>
            <div class="align-self-center">
                <?php if($program->status != '3'&&$program->status != '2'): ?>
                    <a href="<?php echo e(route('coordinator.program.edit', $program)); ?>" title="Edit" class="circular purplestar font-weight-bold p-2 purple-hover mr-2">
                        <i class="fa fa-pencil"></i>
                        Edit
                    </a>
                <?php endif; ?>

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