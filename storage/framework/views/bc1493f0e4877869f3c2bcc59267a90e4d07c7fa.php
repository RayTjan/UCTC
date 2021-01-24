<?php $__env->startSection('title', 'Committee'); ?>
<?php $__env->startSection('content'); ?>

    <script>
        $(document).ready( function() {
        $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col font-weight-bold"><?php echo e($program->name); ?> Comittees List</h1>
        </div>

            <?php if($program->status != '2'): ?>
            <div class="clearfix">
                
                <div class="float-right">
                    <a href="#"
                            title="Add Committee"
                            data-toggle="modal"
                            data-target="#addCommittee">
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


            <div class="modal fade" id="addCommittee">
                <div class="modal-dialog">
                    <div class="modal-content card-bg-change">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Add committee to <?php echo e($program->name); ?> </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="text-align: left;">
                            <?php if(count($committeeList) > 0): ?>
                                <form action="<?php echo e(route ('coordinator.committee.store')); ?>" method="POST">
                                    <div class="form-group">
                                        <?php echo e(csrf_field()); ?>

                                        <input name="selected_program" type="hidden" value="<?php echo e($program->id); ?>">
                                        <label>Select Committee</label>
                                        <select name="user_id" class="custom-select" required>
                                            <?php $__currentLoopData = $committeeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($committee->id); ?>" title="<?php echo e($committee->identity->name); ?>"><?php echo e($committee->identity->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Committee</button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <h1 class="h4 mb-0 font-weight-bold">No free user left</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">


                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget card-bg-change">
                            <li class="guiz-awards-time customComittee">Name</li>
                            <li class="guiz-awards-time customComittee">Gender</li>
                            <li class="guiz-awards-time customComittee">Email</li>
                            <li class="guiz-awards-time customComittee">Access</li>
                            <li class="guiz-awards-time customComittee">Action</li>
                        </ul>

                        <?php $__currentLoopData = $program->committees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="quiz-window-body guiz-awards-row guiz-awards-row-margin mb-2 budget">
                            <li class="guiz-awards-time customComittee"><?php echo e($committee->identity->name); ?></li>
                            <li class="guiz-awards-time customComittee">
                                <?php if($committee->identity->gender == 'M'): ?>
                                    Male
                                <?php elseif($committee->identity->gender == 'F'): ?>
                                    Female
                                <?php endif; ?>
                            </li>
                            <li class="guiz-awards-time customComittee"><?php echo e($committee->identity->email); ?></li>
                            <li class="guiz-awards-time customComittee"><?php echo e($committee->role->name); ?></li>
                            <li class="guiz-awards-time customComittee">
                                <div class="dropdown">
                                    <div class="dropdown show">
                                        <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <button class="ml-2 dropdown-item btnA" title="Edit" type="submit"
                                                    data-toggle="modal"
                                                    data-target="#editCom-<?php echo e($committee->id); ?>">
                                                Edit
                                            </button>
                                            <button class="ml-2 dropdown-item btnA btnDelete" title="Reject" type="submit"
                                                    data-toggle="modal"
                                                    data-target="#deleteCom-<?php echo e($committee->id); ?>">
                                                Delete
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                            
                            <div class="modal fade" id="editCom-<?php echo e($committee->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content card-bg-change">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Edit Access <?php echo e($committee->identity->name); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left;">
                                            <form action="<?php echo e(route ('coordinator.committee.update', $committee)); ?>" method="POST">
                                                <div class="form-group">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <div class="form-group">
                                                        <label>Set Access To:</label>
                                                        <select name="category" class="custom-select">
                                                            <option value="0">Team</option>
                                                            <option value="1">PIC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btnA circular purplestar p-2 purple-hover" type="submit">Set Access</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="modal fade" id="deleteCom-<?php echo e($committee->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure want to remove <?php echo e($committee->identity->name); ?> form this program ?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                            <form action="<?php echo e(route('coordinator.committee.destroy', $committee)); ?>" method="post" class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover">Yes</button>
                                            </form>
                                            <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover" data-dismiss="modal">No</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listCommittee.blade.php ENDPATH**/ ?>