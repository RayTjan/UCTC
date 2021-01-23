<nav class="navbar scrollNav">
    <ul class="navbar-nav">
        <li class="logo">
            <?php if(\Illuminate\Support\Facades\Auth::user()==null): ?>
                <a href="<?php echo e(route('login')); ?>" class="nav-link">
                <span class="link-text logo-text">GUEST</span>
            <?php else: ?>
                <a href="
                <?php if(\Illuminate\Support\Facades\Auth::user()->isAdmin()): ?>
                    <?php echo e(route('coordinator.user.show',\Illuminate\Support\Facades\Auth::id())); ?>

                <?php elseif(\Illuminate\Support\Facades\Auth::user()->isCreator()): ?>
                    <?php echo e(route('lecturer.user.show',\Illuminate\Support\Facades\Auth::id())); ?>

                <?php elseif(\Illuminate\Support\Facades\Auth::user()->isUser()): ?>
                    <?php echo e(route('student.user.show',\Illuminate\Support\Facades\Auth::id())); ?>

                <?php endif; ?>
                    " class="nav-link">
                    <span class="link-text logo-text"><?php echo e(\Illuminate\Support\Facades\Auth::user()->identity->name); ?></span>
                    <?php endif; ?>
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="angle-double-right"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                            class="fa-secondary"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
            </a>
        </li>

        <?php if(auth()->guard()->check()): ?>
        <?php if(\Illuminate\Support\Facades\Auth::user()->isAdmin()): ?>
            <?php echo $__env->make('tools.menu.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(\Illuminate\Support\Facades\Auth::user()->isCreator()): ?>
            <?php echo $__env->make('tools.menu.staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(\Illuminate\Support\Facades\Auth::user()->isUser()): ?>
            <?php echo $__env->make('tools.menu.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php endif; ?>

    </ul>
</nav>

































































<?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/tools/navbar.blade.php ENDPATH**/ ?>