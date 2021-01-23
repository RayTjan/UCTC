<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/flat/blue.css')); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/morris/morris.css')); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
    <!-- Animate -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/animate/animate.css')); ?>">
    <!-- Perfect scrollbar -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/perfect-scrollbar/perfect-scrollbar.css')); ?>">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/customScript.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e('/css/table.css'); ?>" rel="stylesheet" type="text/css" >
    <link href="<?php echo e('/css/customStyle.css'); ?>" rel="stylesheet" type="text/css" >

    <link rel="icon" href="/img/icon.svg">

</head>
<body>

<?php if(!\Request::is('login')): ?>
    <div id="app">
        <?php echo $__env->make('tools.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main class="py-4 blacktest">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
<?php else: ?>
    <?php echo $__env->yieldContent('content'); ?>
<?php endif; ?>




    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo e(asset('plugins/morris/morris.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('plugins/knob/jquery.knob.js')); ?>"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo e(asset('plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo e(asset('plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('plugins/fastclick/fastclick.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('dist/js/pages/dashboard.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\uctcweb\resources\views/layouts/app.blade.php ENDPATH**/ ?>