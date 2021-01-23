
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container" style="margin-top: 20px;">
        <div class="d-flex justify-content-between">
            <h1 class="font-weight-bold align-self-center">DASHBOARD</h1>
            <div class="align-self-center">
                <h5 class="d-inline-block">Login as&nbsp;</h5>
                <h2 class="font-weight-bold d-inline-block">Coordinator</h2>
            </div>
        </div>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Recents Program</h3>
                    <a href="<?php echo e(route('coordinator.program.index')); ?>" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                <?php $__currentLoopData = $allprogramssort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <?php if($program->status == '0'): ?>
                                <div class="small-box inner-bg-yellow">
                                    <div class="inner inner-bg-yellow">
                            <?php elseif($program->status == '1'): ?>
                                <div class="small-box inner-bg-cyan">
                                    <div class="inner inner-bg-cyan">
                            <?php elseif($program->status == '2'): ?>
                                <div class="small-box inner-bg-green">
                                    <div class="inner inner-bg-green">
                            <?php elseif($program->status == '3'): ?>
                                <div class="small-box inner-bg-red">
                                    <div class="inner inner-bg-red">
                            <?php endif; ?>
                                    <h2 class="font-weight-bold"><?php echo e($program->name); ?></h2>
                                    <div class="d-flex justify-content-between">
                                        <div><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></div>
                                        <div class="dropdown">
                                            <div class="dropdown show">
                                                <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                        <path id="Path_1462" data-name="Path 1462"
                                                              d="M1215,2144l12,12,12-12Z"
                                                              transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="2"/>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                    <?php if($program->status == '0' || $program->status == '3'): ?>
                                                    <form action="<?php echo e(route('coordinator.program.approve', $program->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="pl-2 btnA dropdown-item btnSuccess">Approve</button>
                                                    </form>
                                                    <?php endif; ?>

                                                    <?php if($program->status != '2' && $program->status != '3'): ?>
                                                    <button class="pl-2 btnA dropdown-item btnDelete" title="Reject"
                                                            data-toggle="modal"
                                                            data-target="#suspendNote-<?php echo e($program->id); ?>">
                                                        Suspend
                                                    </button>
                                                    <?php endif; ?>

                                                    <form action="<?php echo e(route('coordinator.program.destroy', $program)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="pl-2 btnA dropdown-item btnDelete">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('coordinator.program.show',$program)); ?>" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>


            <div  class="smol3">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">Report Request List</h3>
                        <a href="<?php echo e(route('coordinator.report.index')); ?>" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-bluess" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <ul class="todo-list">

                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <!-- iconAct -->
                                        <div class="d-inline-block">
                                            
                                            <form action="/files/report/<?php echo e($report->report); ?>" class="p-0 m-0 d-inline-block"
                                                  method="GET">
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1" title="Detail">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </form>

                                            <?php if($report->status == '0' || $report->status == '2'): ?>
                                                
                                                <form action="<?php echo e(route('coordinator.report.approve', $report->id)); ?>" class="p-0 m-0 d-inline-block"
                                                      method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                            
                                            <?php if($report->status == '2'): ?>
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject Note"
                                                            data-toggle="modal"
                                                            data-target="#note-<?php echo e($report->id); ?>">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </button>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($report->status != '1' && $report->status != '2'): ?>
                                                
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject"
                                                            title="reject"
                                                            data-toggle="modal"
                                                            data-target="#rejectNote-<?php echo e($report->id); ?>">
                                                        <i class="fa fa-stop"></i>
                                                    </button>
                                                </div>
                                            <?php endif; ?>

                                            
                                            <div class="d-inline-block">
                                                <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                        data-toggle="modal"
                                                        data-target="#deletereport-<?php echo e($report->id); ?>">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- todo text -->
                                        <span class="text">
                                        <?php if(strlen($report->report) > 35): ?>
                                                <?php echo e(substr($report->report,0,20)."..."); ?>

                                            <?php else: ?>
                                                <?php echo e($report->report); ?>

                                            <?php endif; ?>
                                    </span>
                                        <div class="float-right">
                                            <?php echo e($report->belongProgram->name); ?>

                                        </div>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>


                        </div>
                    </div>
                </div>
            </div>


            <div class="smol2">
                <div class="">
                    <div class="position-relative">
                        <h3 class="font-weight-bold">Proposal Request List</h3>
                        <a href="<?php echo e(route('coordinator.proposal.index')); ?>" class="seeall">see all</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-body card-bg-change" style="height: 250px;">
                        <div class="scrollWebkit p-0">
                            <ul class="todo-list">

                                <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <!-- iconAct -->
                                        <div class="d-inline-block">
                                            
                                            <form action="/files/proposal/<?php echo e($proposal->proposal); ?>" class="p-0 m-0 d-inline-block"
                                                  method="GET">
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1" title="Detail">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </form>

                                            <?php if($proposal->status == '0' || $proposal->status == '2'): ?>
                                                
                                                <form action="<?php echo e(route('coordinator.proposal.approve', $proposal->id)); ?>" class="p-0 m-0 d-inline-block"
                                                      method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                            
                                            <?php if($proposal->status == '2'): ?>
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject Note"
                                                            data-toggle="modal"
                                                            data-target="#note-<?php echo e($proposal->id); ?>">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </button>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($proposal->status != '1' && $proposal->status != '2'): ?>
                                                
                                                <div class="d-inline-block">
                                                    <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="reject"
                                                            title="reject"
                                                            data-toggle="modal"
                                                            data-target="#rejectNote-<?php echo e($proposal->id); ?>">
                                                        <i class="fa fa-stop"></i>
                                                    </button>
                                                </div>
                                            <?php endif; ?>

    
                                            <div class="d-inline-block">
                                                <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                        data-toggle="modal"
                                                        data-target="#deleteProposal-<?php echo e($proposal->id); ?>">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- todo text -->
                                        <span class="text">
                                            <?php if(strlen($proposal->proposal) > 35): ?>
                                                <?php echo e(substr($proposal->proposal,0,20)."..."); ?>

                                            <?php else: ?>
                                                <?php echo e($proposal->proposal); ?>

                                            <?php endif; ?>
                                        </span>
                                        <div class="float-right">
                                            <?php echo e($proposal->belongProgram->name); ?>

                                        </div>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>


                        </div>
                    </div>
                </div>
            </div>




                <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="modal fade" id="rejectNote-<?php echo e($proposal->id); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content card-bg-change">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold">Reject <?php echo e($proposal->name); ?> </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: left;">
                                    <form action="<?php echo e(route('coordinator.proposal.reject', $proposal->id)); ?>" class="p-0 m-0"
                                          method="POST">
                                        <div class="form-group">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="PATCH">
                                            <div class="form-group">
                                                <label>Note: </label>
                                                <textarea type="text" class="form-control" name="note" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject Proposal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="deleteProposal-<?php echo e($proposal->id); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Are you sure want to delete this <?php echo e($proposal->name); ?> Proposal ?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                    <form action="<?php echo e(route('coordinator.proposal.destroy', $proposal)); ?>" method="post" class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                    </form>
                                    <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="modal fade" id="rejectNote-<?php echo e($report->id); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content card-bg-change">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title font-weight-bold">Reject <?php echo e($report->name); ?> </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="text-align: left;">
                                    <form action="<?php echo e(route('coordinator.report.reject', $report->id)); ?>" class="p-0 m-0"
                                          method="POST">
                                        <div class="form-group">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="PATCH">
                                            <div class="form-group">
                                                <label>Note: </label>
                                                <textarea type="text" class="form-control" name="note" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject report</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="modal fade" id="deletereport-<?php echo e($report->id); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Are you sure want to delete this <?php echo e($report->name); ?> report ?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                    <form action="<?php echo e(route('coordinator.report.destroy', $report)); ?>" method="post" class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                    </form>
                                    <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="modal fade" id="rejectNote-<?php echo e($fund->id); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content card-bg-change">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold">Edit <?php echo e($fund->name); ?> </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left;">
                                <form action="<?php echo e(route('coordinator.fund.reject', $fund->id)); ?>" class="p-0 m-0"
                                      method="POST">
                                    <div class="form-group">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label>Note: </label>
                                            <textarea type="text" class="form-control" name="note" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject fund</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $allprogramssort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="modal fade" id="suspendNote-<?php echo e($program->id); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content card-bg-change">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold">Suspend <?php echo e($program->name); ?> </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body" style="text-align: left;">
                                <form action="<?php echo e(route('coordinator.program.suspend', $program->id)); ?>" class="p-0 m-0"
                                      method="POST">
                                    <div class="form-group">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label>Note: </label>
                                            <textarea type="text" class="form-control" name="note" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Suspend Program</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="smol4">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Request Disbursement of Funds</h3>
                    <a href="<?php echo e(route('coordinator.fund.index')); ?>" class="seeall">see all</a>
                </div>
                <div class="container-fluid">
                    <div class="d-flex boxScroll">
                    <?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <h2 class=""><?php echo e($fund->name); ?></h2>
                                        </div>
                                        <div>Value</div>
                                        <h3 class="card-title">Rp. <?php echo e($fund->value); ?></h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <div class="stats">
                                                <?php echo e(str_replace("-","/",date("d-m-Y", strtotime($fund->date)))); ?>

                                            </div>

                                            <div class="dropdown">
                                                <div class="dropdown show">
                                                    <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                            <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <form action="<?php echo e(route('coordinator.fund.approve', $fund->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="pl-2 btnA dropdown-item btnSuccess">Accept</button>
                                                        </form>
                                                        <button class="pl-2 btnA dropdown-item btnDelete" title="Reject"
                                                                data-toggle="modal"
                                                                data-target="#rejectNote-<?php echo e($fund->id); ?>">
                                                            Reject
                                                        </button>
                                                        <form action="<?php echo e(route('coordinator.fund.destroy', $fund)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="pl-2 btnA dropdown-item btnDelete">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/dashboard.blade.php ENDPATH**/ ?>