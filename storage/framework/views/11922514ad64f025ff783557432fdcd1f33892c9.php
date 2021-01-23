
<?php $__env->startSection('title', 'Detail Program'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold"><?php echo e($program->name); ?></h1>
        </div>
        <h3><?php echo e(str_replace("-","/",date("d-m-Y", strtotime($program->program_date)))); ?></h3>


        <h6><?php echo e($program->status); ?></h6>
        <div class="ml-4">

            <?php if(isset($clients[0])): ?>
                <div class="row align-items-center">
                    <h6 class="col-md-1 font-weight-bold float-left">Client&nbsp;&nbsp;&nbsp;: </h6>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="col-md-1 font-weight-bold circular graystar mr-1">
                            <?php echo e($client->name); ?>

                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <h6 class="font-weight-bold">Goal</h6>
            <p class="ml-3"><?php echo e($program->goal); ?></p>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Creator&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular bluestar">
                    <?php echo e($program->creator->identity->name); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left tab1">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-2 font-weight-bold circular toscastar">
                    <?php if($program->category == 1): ?>
                        Long-Term
                    <?php else: ?>
                        Short-Term
                    <?php endif; ?>
                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-md-1 font-weight-bold float-left">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h6>
                <p class="col-md-1 font-weight-bold circular purplestar">
                    <?php echo e($program->status); ?>

                </p>
            </div>

            <div class="row align-items-center">
                <h6 class="col-1 font-weight-bold float-left pr-1">Proposal :</h6>
                <p class="col-md-1 font-weight-bold circular greenstar">
                    Approved
                </p>
            </div>

            <h6 class="font-weight-bold">Description</h6>
            <p class="ml-3"><?php echo e($program->description); ?></p>

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
        <div class="clearfix">
            <h3 class="float-right">Rp. <?php echo e($total); ?></h3>
        </div>

        <div class="d-flex justify-content-between mb-5">
            <div class="">
                <a href="<?php echo e(route('user.client.show', $program)); ?>" class="circular yellowstar font-weight-bold p-2 yellow-hover">Client</a>
                <a href="<?php echo e(route('user.committee.show', $program)); ?>" class="circular yellowstar font-weight-bold p-2 yellow-hover">Committee</a>
                <a href="<?php echo e(route('user.task.show', $program)); ?>" class="circular bluestar font-weight-bold p-2 blue-hover">Action Plan</a>
            </div>
            <div>
                <button type="button"
                        data-toggle="modal"
                        data-target="#detailBudget"
                        class="btnA circular graystar font-weight-bold p-2 gray-hover">Detail</button>
            </div>
        </div>

        
        <div class="modal fade zindex1050" id="detailBudget">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header card-bg-change">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="card-bg-change scrollWebkit height100 modalCustomBody">

                        <?php $__currentLoopData = $program->hasFinances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget pr-4 pl-4 clearfix">
                                <li class="guiz-awards-time text-left"><?php echo e($finance->name); ?></li>
                                <?php if($finance->type == '0'): ?>
                                    <li class="guiz-awards-time float-right text-right btnSuccess">
                                        + Rp. <?php echo e($finance->value); ?>

                                    </li>
                                <?php elseif($finance->type == '1'): ?>
                                    <li class="guiz-awards-time float-right text-right btnDelete">
                                        - Rp. <?php echo e($finance->value); ?>

                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="card-bg-change height100 modalCustomFooter">
                        <div class="absoluteFooter">
                            <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget bg-change-dark pr-4 pl-4 clearfix">
                                <li class="guiz-awards-time text-left">Total</li>
                                <li class="guiz-awards-time float-right text-right">Rp. <?php echo e($total); ?></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/3rdRoleBlades/detailProgram.blade.php ENDPATH**/ ?>