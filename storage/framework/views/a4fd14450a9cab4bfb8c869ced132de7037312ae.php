<?php $__env->startSection('title', 'List User'); ?>
<?php $__env->startSection('content'); ?>

<script>
    $(document).ready( function() {
        $('.dropdown-button').dropdown();
    });
</script>

<div class="container clearfix" style="margin-top: 20px;">
    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">User List View</h1>
        <?php if(auth()->guard()->check()): ?>
            <div class="clearfix">
                
                <div class="float-right">
                    <a href="<?php echo e(route('coordinator.user.create')); ?>" role="button" aria-pressed="true">
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

    <div class="container-table100 scrollWebkit">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>

                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row100 body">
                                <td class="cell100 column1">
                                    <div class="rounded-circle miniPic d-inline-block p-0 m-0" style=" background-repeat:no-repeat;
                                        background-position: center;
                                        background-image:url(

                                    <?php if($user->picture != null): ?>
                                        /img/userpic/<?php echo e($user->picture); ?>

                                    <?php else: ?>
                                        /img/default.jpg
                                    <?php endif; ?>

                                    );
                                        background-size: cover;">
                                    </div>
                                    <div class="d-inline-block vmiddle"><?php echo e($user->identity->name); ?></div>
                                </td>
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
                                <th class="cell100 column3">Gender</th>
                                <th class="cell100 column3">Role</th>
                                <th class="cell100 column4">Identity</th>
                                <th class="cell100 column5">Email</th>
                                <th class="cell100 column6">Phone</th>
                                <th class="cell100 column6">Line Account</th>
                                <th class="cell100 column7">Department</th>
                                <th class="cell100 column8">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row100 body">
                                    <td class="cell100 column3">
                                        <?php if($user->identity->gender == 'M'): ?>
                                            Male
                                        <?php else: ?>
                                            Female
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column3"><?php echo e($user->role->name); ?></td>
                                    <td class="cell100 column8">
                                        <?php if($user->identity_type == 'App\Models\Lecturer'): ?>
                                            Lecturer
                                        <?php elseif($user->identity_type == 'App\Models\Staff'): ?>
                                            Staff
                                        <?php elseif($user->identity_type == 'App\Models\Student'): ?>
                                            Student
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell100 column8"><?php echo e($user->email); ?></td>
                                    <td class="cell100 column8"><?php echo e($user->identity->phone); ?></td>
                                    <td class="cell100 column8"><?php echo e($user->identity->line_account); ?></td>
                                    <td class="cell100 column8"><?php echo e($user->identity->department->name); ?></td>
                                    <td class="cell100 column9 d-flex">
                                        
                                        <form action="<?php echo e(route('coordinator.user.edit', $user)); ?>" class="p-0 m-0"
                                              method="GET">
                                            <?php echo e(csrf_field()); ?>

                                            <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Detail">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </form>

                                        
                                        <div action="" class="p-0 m-0">
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                data-toggle="modal"
                                                data-target="#delete-<?php echo e($user->id); ?>">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        

        <div class="modal fade" id="delete-<?php echo e($user->id); ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure want to delete this user <?php echo e($user->identity->name); ?> ?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body d-inline-block text-center" style="text-align: left;">
                        <form action="<?php echo e(route('coordinator.user.destroy', $user)); ?>" method="post" class="d-inline-block">
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



</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/listUser.blade.php ENDPATH**/ ?>