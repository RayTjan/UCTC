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

        <li class="nav-item">
            <a href="<?php echo e(route('info')); ?>" class="nav-link">
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="space-shuttle"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 512"
                    class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
                >
                    <g class="fa-group">
                        <path
                            fill="currentColor"
                            d="M262.118 0c-144.53 0-262.118 117.588-262.118 262.118s117.588 262.118 262.118 262.118 262.118-117.588 262.118-262.118-117.589-262.118-262.118-262.118zm17.05 417.639c-12.453 2.076-37.232 7.261-49.815 8.303-10.651 0.882 -20.702-5.215-26.829-13.967-6.143-8.751-7.615-19.95-3.968-29.997l49.547-136.242h-51.515c-0.044-28.389 21.25-49.263 48.485-57.274 12.997-3.824 37.212-9.057 49.809-8.255 7.547 0.48 20.702 5.215 26.829 13.967 6.143 8.751 7.615 19.95 3.968 29.997l-49.547 136.242h51.499c0.01 28.356-20.49 52.564-48.463 57.226zm15.714-253.815c-18.096 0-32.765-14.671-32.765-32.765 0-18.096 14.669-32.765 32.765-32.765s32.765 14.669 32.765 32.765c0 18.095-14.668 32.765-32.765 32.765z"
                            class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Manual</span>
            </a>
        </li>

    </ul>
</nav>

































































<?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/tools/navbar.blade.php ENDPATH**/ ?>