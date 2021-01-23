-
<?php $__env->startSection('title', 'fund'); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Request Pencairan fund ist</h1>
    </div>

    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">

                <div class="">
                    <div class="table100-nextcols boxScroll">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column2">Name</th>
                                <th class="cell100 column6">Date</th>
                                <th class="cell100 column6">Value</th>
                                <th class="cell100 column6">Attachment</th>
                                <th class="cell100 column6">Status</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $requestedfunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        <?php echo e($fund->name); ?>

                                    </td>
                                    <td class="cell100 column3">
                                        <?php echo e(str_replace("-","/",date("d-m-Y", strtotime($fund->date)))); ?>

                                    </td>
                                    <td class="cell100 column6">
                                        <?php echo e($fund->value); ?>

                                    </td>
                                    <td class="cell100 column4">
                                        <a data-toggle="modal"
                                           data-target="#desc-<?php echo e($fund->id); ?>"
                                           class="btn btn-primary titlelogin">See Detail</a>
                                    </td>
                                    <td class="cell100 column3">
                                        <?php if($fund->status == '0'): ?>
                                            <div class="text-primary">Pending</div>
                                        <?php elseif($fund->status == '1'): ?>
                                            <div class="text-danger">Approved</div>
                                        <?php elseif($fund->status == '2'): ?>
                                            <div class="text-danger">Rejected</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column9 d-flex">

                                        <?php if($fund->note != null): ?>
                                            
                                            <?php echo e(csrf_field()); ?>

                                            <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 "
                                                    title="Approve"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-<?php echo e($fund->id); ?>">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        <?php endif; ?>

                                        <?php if($fund->status == '0' || $fund->status == '3'): ?>
                                            
                                            <form action="<?php echo e(route('coordinator.fund.approve', $fund->id)); ?>" class="p-0 m-0"
                                                  method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>

                                        <?php if($fund->status != '2' && $fund->status != '3'): ?>
                                            
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Reject"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-<?php echo e($fund->id); ?>">
                                                <i class="fa fa-stop"></i>
                                            </button>
                                            </form>
                                        <?php endif; ?>

                                        

                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editfund-<?php echo e($fund->id); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>

                                        
                                        <form action="<?php echo e(route('coordinator.fund.destroy', $fund)); ?>"
                                              method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                                
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

                                
                                <div class="modal fade" id="note-<?php echo e($fund->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Note From Coor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p><?php echo e($fund->note); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="modal fade" id="editfund-<?php echo e($fund->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit <?php echo e($fund->name); ?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="<?php echo e(route ('coordinator.fund.update',$fund)); ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <div class="form-group">
                                                            <label>Name: </label>
                                                            <input type="text" class="form-control" name="name" value="<?php echo e($fund->name); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Value: </label>
                                                            <input type="text" class="form-control" name="value" value="<?php echo e($fund->value); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date: </label>
                                                            <input type="date" class="form-control" name="date" value="<?php echo e($fund->date); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description: </label>
                                                            <textarea type="text" class="form-control" name="description" required><?php echo e($fund->description); ?></textarea>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit fund</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="modal fade" id="desc-<?php echo e($fund->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Description </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p><?php echo e($fund->description); ?></p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listFund.blade.php ENDPATH**/ ?>