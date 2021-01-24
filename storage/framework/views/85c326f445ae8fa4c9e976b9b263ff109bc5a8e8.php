<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center align-items-center containerCustom">

        <div class="text-center shadow-sm profile-box">
            <div class="miniOption position-relative">
                <div class="iconOptionCenter position-absolute">
                    <a href="<?php echo e(route('lecturer.user.edit', $user)); ?>" class="iconOption">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline-block">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btnA iconOptionB">
                            <i class="fa fa-power-off"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="heightProfile"></div>
            <div class="rounded-circle profilePic" style=" background-repeat:no-repeat;
                    background-position: center;
                    background-image:url(

            <?php if($user->picture != null): ?>
                /img/userpic/<?php echo e($user->picture); ?>

            <?php else: ?>
                https://www.mgretails.com/assets/img/default.png
            <?php endif; ?>

            );
                    background-size: cover;">
            </div>
            <div class="heightName">
                <div>
                    <h4 class="font-weight-bold"><?php echo e($user->identity->name); ?></h4>
                    <p style="font-size: 12px;" class="mb-0"><?php echo e($user->identity->description); ?></p>
                </div>
            </div>
            <div class="social">
                <div class="iconCenter">
                    <div class="iconProfile dropdown">
                    <a class="dropbtn">
                        <i class="fa fa-envelope"></i>
                    </a>

                    <div class="dropdown-content">
                        <div class="dropdown-item" ><?php echo e($user->email); ?></div>
                    </div>
                    </div>

                    <div class="iconProfile dropdown">
                        <a class="dropbtn">
                            <i class="fa fa-phone"></i>
                        </a>

                        <div class="dropdown-content">
                            <div class="dropdown-item" ><?php echo e($user->identity->phone); ?></div>
                        </div>
                    </div>

                    <div class="iconProfile dropdown mr-0">
                        <a class="dropbtn">
                            <i class="fa fa-address-book"></i>
                        </a>

                        <div class="dropdown-content">
                            <div class="dropdown-item" ><?php echo e($user->identity->line_acc); ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/profile.blade.php ENDPATH**/ ?>