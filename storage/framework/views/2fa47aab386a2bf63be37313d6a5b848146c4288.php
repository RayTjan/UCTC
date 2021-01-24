<?php $__env->startSection('title', 'dana'); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Request Pencairan Dana ist</h1>
    </div>

    <div class="container-table100 scrollWebkit">
        <div class="wrap-table100">
            <div class="table100 ver1">

                <div class="">
                    <div class="table100-nextcols boxScroll">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column2">Name</th>
                                <th class="cell100 column6">Type</th>
                                <th class="cell100 column6">Value</th>
                                <th class="cell100 column6">Attachment</th>
                                <th class="cell100 column6">Status</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $requesteddanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        <?php echo e($dana->name); ?>

                                    </td>
                                    <td class="cell100 column3">
                                        Apa ini
                                    </td>
                                    <td class="cell100 column6">
                                        <?php echo e($dana->value); ?>

                                    </td>
                                    <td class="cell100 column4">
                                        <a data-toggle="modal"
                                           data-target="#imgview-<?php echo e($dana->id); ?>"
                                           class="btn btn-primary titlelogin">See Detail</a>
                                    </td>
                                    <td class="cell100 column3">
                                        <?php if($dana->status == '0'): ?>
                                            <div class="text-primary">Pending</div>
                                        <?php elseif($dana->status == '1'): ?>
                                            <div class="text-danger">Approved</div>
                                        <?php elseif($dana->status == '2'): ?>
                                            <div class="text-danger">Rejected</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column9 d-flex">

                                        <?php if($dana->note != null): ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 "
                                                    title="Approve"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-<?php echo e($dana->id); ?>">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        <?php endif; ?>

                                        <?php if($dana->status == '0' || $dana->status == '3'): ?>

                                            <form action="<?php echo e(route('admin.dana.approve', $dana->id)); ?>" class="p-0 m-0"
                                                  method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>

                                        <?php if($dana->status != '2' && $dana->status != '3'): ?>

                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Reject"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-<?php echo e($dana->id); ?>">
                                                <i class="fa fa-stop"></i>
                                            </button>
                                            </form>
                                        <?php endif; ?>



                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editdana-<?php echo e($dana->id); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>


                                        <form action="<?php echo e(route('admin.dana.destroy', $dana)); ?>"
                                              method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>


                                <div class="modal fade" id="rejectNote-<?php echo e($dana->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit <?php echo e($dana->name); ?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="<?php echo e(route('admin.dana.reject', $dana->id)); ?>" class="p-0 m-0"
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
                                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject dana</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="note-<?php echo e($dana->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Note From Coor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p><?php echo e($dana->note); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="editdana-<?php echo e($dana->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit <?php echo e($dana->name); ?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="<?php echo e(route ('admin.dana.update',$dana)); ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <div class="form-group">
                                                            <label>Name: </label>
                                                            <input type="text" class="form-control" name="name" value="<?php echo e($dana->name); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Value: </label>
                                                            <input type="text" class="form-control" name="value" value="<?php echo e($dana->value); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date: </label>
                                                            <input type="date" class="form-control" name="date" value="<?php echo e($dana->date); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description: </label>
                                                            <textarea type="text" class="form-control" name="description" required><?php echo e($dana->description); ?></textarea>
                                                        </div>
                                                    <div class="form-group text-center">
                                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit dana</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="imgview-<?php echo e($dana->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modalpic-content">
                                            <!-- Modal body -->
                                            <div class="modalpic-body text-center">
                                                <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                                <img src="/files/dana/<?php echo e($dana->proof_of_payment); ?>" alt="image" class="card-img">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listFundProgram.blade.php ENDPATH**/ ?>
