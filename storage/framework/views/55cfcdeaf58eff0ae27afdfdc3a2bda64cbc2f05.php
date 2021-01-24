<?php $__env->startSection('title', 'Finance'); ?>
<?php $__env->startSection('content'); ?>


    <div>
        <a href="<?php echo e(route('lecturer.program.show',$program)); ?>" class="a-none blackhex d-inline-block">
            <h6>Program</h6>
        </a>
        <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
        <a href="<?php echo e(route('lecturer.program.show',$program)); ?>" class="a-none blackhex d-inline-block">
            <h6>Detail</h6>
        </a>
        <i class="fa fa-angle-right d-inline-block mr-1 ml-1"></i>
        <a href="<?php echo e(route('lecturer.finance.show',$program)); ?>" class="a-none blackhex d-inline-block">
            <h6>Saldo</h6>
        </a>
    </div>
    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Detail Saldo <?php echo e($program->name); ?></h1>

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

        <?php if($edit == true): ?>
            <div class="clearfix">

                <div class="float-right">

                    <a role="button" aria-pressed="true"
                       title="Add Finance"
                       data-toggle="modal"
                       data-target="#addFinance">
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


    <div class="modal fade" id="addFinance">
        <div class="modal-dialog">
            <div class="modal-content card-bg-change">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Add Finance </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="text-align: left;">
                    <form action="<?php echo e(route ('lecturer.finance.store')); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="program" value="<?php echo e($program->id); ?>">
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Type: </label>
                                <select name="type" class="custom-select">
                                    <option hidden>Select Type</option>
                                    <option value="0">Income</option>
                                    <option value="1">Expenditure</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Value: </label>
                                <input type="text" class="form-control" name="value" required>
                            </div>
                            <div class="form-group">
                                <label>Proof of Payment: </label>
                                <i class="fa fa-clipboard"></i>
                                <input type="file" class="form-control" name="proof_of_payment" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Finance</button>
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
                                <th class="cell100 column6">Type</th>
                                <th class="cell100 column6">Value</th>
                                <th class="cell100 column6">Attachment</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $finances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        <?php echo e($finance->name); ?>

                                    </td>
                                    <td class="cell100 column3">
                                        <?php if($finance->type == '0'): ?>
                                            <div class="text-success">Income</div>
                                        <?php elseif($finance->type == '1'): ?>
                                            <div class="text-danger">Expenditure</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column6">
                                        <?php if($finance->type == '0'): ?>
                                            <div class="text-success">+ Rp. <?php echo e($finance->value); ?></div>
                                        <?php elseif($finance->type == '1'): ?>
                                            <div class="text-danger">- Rp. <?php echo e($finance->value); ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column4">
                                        <a data-toggle="modal"
                                           data-target="#imgview-<?php echo e($finance->id); ?>"
                                           class="btn btn-primary titlelogin">View</a>
                                    </td>
                                    <td class="cell100 column9 d-flex">



                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editFinance-<?php echo e($finance->id); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </button>


                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                data-toggle="modal"
                                                data-target="#deleteFinance-<?php echo e($finance->id); ?>">
                                            <i class="fa fa-close"></i>
                                        </button>

                                    </td>
                                </tr>



                                <div class="modal fade" id="deleteFinance-<?php echo e($finance->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure want to delete this <?php echo e($finance->name); ?> ?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                                <form action="<?php echo e(route('lecturer.finance.destroy', $finance)); ?>" method="post" class="d-inline-block">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                                </form>
                                                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="editFinance-<?php echo e($finance->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit <?php echo e($finance->name); ?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                    <form action="<?php echo e(route ('lecturer.finance.update',$finance)); ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <?php echo e(csrf_field()); ?>

                                                            <input type="hidden" name="_method" value="PATCH">
                                                            <div class="form-group">
                                                                <label>Name: </label>
                                                                <input type="text" class="form-control" name="name" value="<?php echo e($finance->name); ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Type: </label>
                                                                <select name="type" class="custom-select">

                                                                        <?php if($finance->type == '0'): ?>
                                                                        <option hidden value="0">Income</option>
                                                                        <?php elseif($finance->type == '1'): ?>
                                                                        <option hidden value="1">Expenditure</option>
                                                                        <?php endif; ?>
                                                                    <option value="0">Income</option>
                                                                    <option value="1">Expenditure</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Value: </label>
                                                                <input type="text" class="form-control" name="value" value="<?php echo e($finance->value); ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Proof of Payment: </label>
                                                                <input type="file" class="form-control" name="proof_of_payment">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit Finance</button>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="imgview-<?php echo e($finance->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modalpic-content">
                                            <!-- Modal body -->
                                            <div class="modalpic-body text-center">
                                                <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                                <img src="/files/finance/<?php echo e($finance->proof_of_payment); ?>" alt="image" class="card-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row100 head">
                                <th class="cell100 column2">Total</th>
                                <th class="cell100 column6">&nbsp;</th>
                                <th class="cell100 column6">Rp. <?php echo e($total); ?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listFinance.blade.php ENDPATH**/ ?>
