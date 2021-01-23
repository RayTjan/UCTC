
<?php $__env->startSection('title', 'Proposal'); ?>
<?php $__env->startSection('content'); ?>

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold">Request Proposal List</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Status</li>
                            <li class="guiz-awards-time customComittee">Program</li>
                            <li class="guiz-awards-time customComittee">Download</li>
                            <li class="guiz-awards-time customComittee">Action</li>
                        </ul>

                        <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                                <li class="guiz-awards-time customComittee">
                                    <?php if(strlen($proposal->proposal) > 35): ?>
                                        <?php echo e(substr($proposal->proposal,0,20)."..."); ?>

                                    <?php else: ?>
                                        <?php echo e($proposal->proposal); ?>

                                    <?php endif; ?>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <?php if($proposal->status == '0'): ?>
                                        <div class="text-primary">Pending</div>
                                    <?php elseif($proposal->status == '1'): ?>
                                        <div class="text-success">Approved</div>
                                    <?php elseif($proposal->status == '2'): ?>
                                        <div class="text-danger">Rejected</div>
                                    <?php endif; ?>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <?php echo e($proposal->belongProgram->name); ?>

                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <a href="/files/proposal/<?php echo e($proposal->proposal); ?>" class="btn btn-success">Download</a>
                                </li>
                                <li class="guiz-awards-time customComittee">
                                    <div class="dropdown">
                                        <div class="dropdown show">
                                            <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                    <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <form action="<?php echo e(route('coordinator.proposal.approve', $proposal->id)); ?>"
                                                      method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <button class="ml-2 dropdown-item btnA btnSuccess" title="Approve" type="submit">Accept</button>
                                                </form>
                                                <?php if($proposal->status == '0'): ?>
                                                    <button class="ml-2 dropdown-item btnA btnDelete" title="Reject"
                                                            data-toggle="modal"
                                                            data-target="#rejectNote-<?php echo e($proposal->id); ?>">
                                                        Reject
                                                    </button>
                                                <?php elseif($proposal->status == '2'): ?>
                                                    <button class="ml-2 dropdown-item btnA" title="Reject"
                                                            data-toggle="modal"
                                                            data-target="#note-<?php echo e($proposal->id); ?>">
                                                        Reject Note
                                                    </button>
                                                <?php endif; ?>
                                                <form action="<?php echo e(route('coordinator.proposal.destroy', $proposal )); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="ml-2 dropdown-item btnA btnDelete">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            
                            <div class="modal fade" id="note-<?php echo e($proposal->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content card-bg-change">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Note From Coor </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <p><?php echo e($proposal->note); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
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

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listRequest.blade.php ENDPATH**/ ?>