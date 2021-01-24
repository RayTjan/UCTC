<?php $__env->startSection('title', 'Fund'); ?>
<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Dana List <?php echo e($program->name); ?></h1>
        <?php if(auth()->guard()->check()): ?>
            <div class="clearfix">

                <div class="float-right">

                    <a role="button" aria-pressed="true"
                       title="Add dana"
                       data-toggle="modal"
                       data-target="#adddana">
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
                                    fill="#fff"
                                    d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                                    class="fa-secondary">
                                </path>
                            </g>
                        </svg>
                    </a>

                </div>
            </div>
        <?php endif; ?>
    </div>


    <div class="modal fade" id="adddana">
        <div class="modal-dialog">
            <div class="modal-content card-bg-change">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Add dana </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="text-align: left;">
                    <form action="<?php echo e(route ('staff.dana.store')); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="program" value="<?php echo e($program->id); ?>">
                            <input type="hidden" name="status" value="0">
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Value: </label>
                                <input type="text" class="form-control" name="value" required>
                            </div>
                            <div class="form-group">
                                <label>Date: </label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label>Description: </label>
                                <textarea type="text" class="form-control" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add dana</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                                <th class="cell100 column6">Value</th>
                                <th class="cell100 column6">Description</th>
                                <th class="cell100 column6">Status</th>
                                <th class="cell100 column6">Note</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $danas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        <?php echo e($dana->name); ?>

                                    </td>
                                    <td class="cell100 column6">
                                        Rp. <?php echo e($dana->value); ?>

                                    </td>

                                    <td class="cell100 column3">
                                        <a data-toggle="modal"
                                           data-target="#desc-<?php echo e($dana->id); ?>"
                                           class="btn btn-primary titlelogin">
                                            Desc
                                        </a>
                                    </td>
                                    <td class="cell100 column3">
                                        <?php if($dana->status == '0'): ?>
                                            <div class="text-primary">Pending</div>
                                        <?php elseif($dana->status == '1'): ?>
                                            <div class="text-success">Approved</div>
                                        <?php elseif($dana->status == '2'): ?>
                                            <div class="text-danger">Rejected</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column3">
                                        <?php if($dana->status == '2'): ?>
                                            <a data-toggle="modal"
                                               data-target="#note-<?php echo e($dana->id); ?>"
                                               class="btn btn-danger titlelogin">
                                                Coor's Note
                                            </a>
                                        <?php else: ?>
                                            &nbsp;
                                        <?php endif; ?>
                                    </td>

                                    <?php if($dana->status == '0'): ?>
                                        <td class="cell100 column9 d-flex">



                                            <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                    data-toggle="modal"
                                                    data-target="#editdana-<?php echo e($dana->id); ?>">
                                                <i class="fa fa-pencil"></i>
                                            </button>


                                            <form action="<?php echo e(route('staff.dana.destroy', $dana)); ?>"
                                                  method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </form>

                                        </td>
                                    <?php endif; ?>
                                </tr>


                                <div class="modal fade" id="desc-<?php echo e($dana->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Description </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p><?php echo e($dana->description); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="note-<?php echo e($dana->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-change-red">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold titlelogin">Note From Coor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p class="titlelogin"><?php echo e($dana->note); ?></p>
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
                                                <form action="<?php echo e(route ('staff.dana.update',$dana)); ?>" method="POST" enctype="multipart/form-data">
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
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit dana</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listFundProgram.blade.php ENDPATH**/ ?>
