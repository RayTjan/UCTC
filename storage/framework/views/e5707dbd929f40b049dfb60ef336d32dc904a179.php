<?php $__env->startSection('title', 'Program'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <h1 class="col font-weight-bold">Program List</h1>
    </div>

    <div class="container-table100 scrollWebkit">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>

                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Program</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row100 body">
                            <td class="cell100 column1"> <?php echo e($program->name); ?> </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="wrap-table100-nextcols js-pscroll boxScroll">
                    <div class="table100-nextcols">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column2">Status</th>
                                <th class="cell100 column3">PIC</th>


                                <th class="cell100 column6">Program Date</th>
                                <th class="cell100 column7">Type</th>
                                <th class="cell100 column8">Category</th>
                                <th class="cell100 column9">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row100 body">
                                <td class="cell100 column2">
                                    <?php if($program->status == '0'): ?>
                                        <div class="text-primary">Pending</div>
                                    <?php elseif($program->status == '1'): ?>
                                        <div class="text-info">Ongoing</div>
                                    <?php elseif($program->status == '2'): ?>
                                        <div class="text-success">Finished</div>
                                    <?php elseif($program->status == '3'): ?>
                                        <div class="text-danger">Suspended</div>
                                    <?php endif; ?>
                                </td>
                                <td class="cell100 column3"><?php echo e($program->creator->identity->name); ?></td>
                                <td class="cell100 column6"><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></td>
                                <td class="cell100 column7"><?php echo e($program->classified->name); ?></td>
                                <td class="cell100 column8"><?php echo e($program->categorized->name); ?></td>
                                <td class="cell100 column9 d-flex">

                                    <form action="<?php echo e(route('coordinator.program.show', $program)); ?>" class="p-0 m-0"
                                          method="GET">
                                        <?php echo e(csrf_field()); ?>

                                        <button class="btnA circular bluestar blue-hover iconAct mr-1 p-1" title="Detail">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>

                                    <?php if($program->status == '0' || $program->status == '3'): ?>

                                    <form action="<?php echo e(route('coordinator.program.approve', $program->id)); ?>" class="p-0 m-0"
                                          method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>


                                    <?php if($program->status == '3'): ?>
                                        <div>
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1 " title="Suspend Note"
                                                data-toggle="modal"
                                                data-target="#note-<?php echo e($program->id); ?>">
                                            <i class="fa fa-sticky-note"></i>
                                        </button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($program->status != '2' && $program->status != '3'): ?>

                                        <div>
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Suspend"
                                                title="Suspend"
                                                data-toggle="modal"
                                                data-target="#suspendNote-<?php echo e($program->id); ?>">
                                            <i class="fa fa-stop"></i>
                                        </button>
                                        </div>
                                    <?php endif; ?>


                                    <form action="<?php echo e(route('coordinator.program.suspend', $program->id)); ?>" class="p-0 m-0"
                                          method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            
                            <div class="modal fade" id="note-<?php echo e($program->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content card-bg-change">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Note From Coor </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <p><?php echo e($program->note); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listProgram.blade.php ENDPATH**/ ?>