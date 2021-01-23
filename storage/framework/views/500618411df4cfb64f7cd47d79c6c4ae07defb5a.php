<?php $__env->startSection('title', 'Report'); ?>
<?php $__env->startSection('content'); ?>

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

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
            <a href="<?php echo e(route('lecturer.report.show',$program)); ?>" class="a-none blackhex d-inline-block">
                <h6>Report</h6>
            </a>
        </div>

        <div class="row">
            <h1 class="col font-weight-bold"><?php echo e($program->name); ?> Report</h1>
        </div>

        <?php if($edit == true): ?>
            <?php if($addAvailability == true): ?>
            <div class="clearfix">
                <div class="float-right">
                    <a href="#"
                       title="Add Report"
                       data-toggle="modal"
                       data-target="#addReport">
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
            
            <div class="modal fade" id="addReport">
                <div class="modal-dialog">
                    <div class="modal-content card-bg-change">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Add report to <?php echo e($program->name); ?> </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="text-align: left;">
                            <form action="<?php echo e(route ('lecturer.report.store')); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <?php echo e(csrf_field()); ?>

                                    <input name="selected_program" type="hidden" value="<?php echo e($program->id); ?>">
                                    <label>Upload Your Report Here</label>
                                    <input type="file" name="report" class="form-control-file" required>
                                    <input type="hidden" name="statusReport" value="0">
                                    <input type="hidden" name="program" value="<?php echo e($program->id); ?>">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Report</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <?php if($edit == true): ?>
                                <li class="guiz-awards-time customComittee">Replace</li>
                            <?php endif; ?>
                            <li class="guiz-awards-time customComittee">Download</li>
                            <?php if($edit == true): ?>
                                <li class="guiz-awards-time customComittee">Delete</li>
                            <?php endif; ?>
                        </ul>

                        <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">
                                    <?php if(strlen($report->report) > 35): ?>
                                        <?php echo e(substr($report->report,0,20)."..."); ?>

                                    <?php else: ?>
                                        <?php echo e($report->report); ?>

                                    <?php endif; ?>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <?php if($report->status == '0'): ?>
                                        <div class="text-info">Pending</div>
                                    <?php elseif($report->status == '1'): ?>
                                        <div class="text-success">Approved</div>
                                    <?php elseif($report->status == '2'): ?>
                                        <div class="d-flex justify-content-center">
                                            <button class="btnA circular redstar red-hover iconAct iconAct align-self-center mr-2" title="note"
                                                    data-toggle="modal"
                                                    data-target="#note-<?php echo e($report->id); ?>">
                                                <div class="d-flex justify-content-center">
                                                    <i class="fa fa-sticky-note align-self-center"></i>
                                                </div>
                                            </button>
                                            <div class="text-danger d-inline-block align-self-center">Rejected</div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                                <?php if($edit == true): ?>
                                    <?php if($report->status == 0): ?>
                                        <li class="guiz-awards-time customComittee">
                                            <button type="submit" class="btn btn-primary"
                                                    title="Edit Report"
                                                    data-toggle="modal"
                                                    data-target="#replaceReport-<?php echo e($report->id); ?>">
                                                Replace
                                            </button>
                                        </li>

                                        
                                        <div class="modal fade" id="replaceReport-<?php echo e($report->id); ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content card-bg-change">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold">Replace Report</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body" style="text-align: left;">
                                                        <form action="<?php echo e(route ('lecturer.report.update', $report)); ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <?php echo e(csrf_field()); ?>

                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input name="selected_program" type="hidden" value="<?php echo e($program->id); ?>">
                                                                <label>Replace report <?php echo e($report->report); ?> with ...</label>
                                                                <input type="file" name="report" class="form-control-file" required>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <button class="btnA circular bluestar p-2 blue-hover" type="submit">Replace Report</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php else: ?>
                                        <li class="guiz-awards-time customComittee">
                                            <form action="" method="get">
                                                <button type="submit" class="btn btn-primary disabled">Replace</button>
                                            </form>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <li class="guiz-awards-time customComittee">
                                    <a href="/files/report/<?php echo e($report->report); ?>" class="btn btn-success">Download</a>
                                </li>
                                <?php if($edit == true): ?>
                                    <li class="guiz-awards-time customComittee">
                                        <button
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#deleteReport-<?php echo e($report->id); ?>"
                                            class="btn btn-danger">
                                            Delete
                                        </button>
                                    </li>
                                <?php endif; ?>
                            </ul>

                            

                            <div class="modal fade" id="deleteReport-<?php echo e($report->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure want to delete this <?php echo e($report->report); ?> report ?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                            <form action="<?php echo e(route('lecturer.report.destroy', $report)); ?>" method="post" class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                            </form>
                                            <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="modal fade" id="note-<?php echo e($report->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-change-red">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold titlelogin">Note From Coor</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <p class="titlelogin"><?php echo e($report->note); ?></p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listReport.blade.php ENDPATH**/ ?>