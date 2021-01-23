<?php $__env->startSection('title', 'Links'); ?>
<?php $__env->startSection('content'); ?>

    <script>
        $(document).ready( function() {
            $('.dropdown-button').dropdown();
        });
    </script>

    <div class="container clearfix" style="margin-top: 20px;">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="font-weight-bold">List Attachment Links <?php echo e($program->name); ?></h1>

            <?php if($edit == true): ?>
                <?php if($program->status != '2'): ?>
                    <a href="<?php echo e(route('lecturer.file.create', $program->id)); ?>" role="button" aria-pressed="true">
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
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="row" style="margin-top: 30px;">
            <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <div class="quiz-window quiz-padding">
                <div class="quiz-window-body">
                    <div class="gui-window-awards">

                        <?php $yes = 1; ?>
                        <?php $__currentLoopData = $program->hasAttachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul class="
                            <?php if($yes%2 == 0): ?>
                                guiz-awards-row guiz-awards-row-even
                            <?php else: ?>
                                guiz-awards-row guiz-awards-row
                            <?php endif; ?>
                                ">
                                    <li class="guiz-awards-title attachmentWidth">
                                        <label>
                                            <?php echo e($file->name); ?>

                                        </label>
                                        <div class="guiz-awards-subtitle">
                                            <a href="//<?php echo e($file->file_attachment); ?>"><?php echo e($file->file_attachment); ?></a>
                                        </div>
                                    </li>
                                <?php if($program->status != '2'): ?>
                                    <li class="guiz-awards-time text-right">
                                        <div class="dropdown">
                                            <div class="dropdown show">
                                                <a class="dropdown-button iconCommitteeAct" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.414" height="13.207" viewBox="0 0 26.414 13.207">
                                                        <path id="Path_1462" data-name="Path 1462" d="M1215,2144l12,12,12-12Z" transform="translate(-1213.793 -2143.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <form action="<?php echo e(route('lecturer.file.edit', $file->id)); ?>" method="get">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="pl-2 btnA dropdown-item">Edit</button>
                                                    </form>
                                                    <button
                                                        type="button"
                                                        data-toggle="modal"
                                                        data-target="#deleteAction-<?php echo e($file->id); ?>"
                                                        class="pl-2 btnA dropdown-item btnDelete">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>

                            

                            <div class="modal fade" id="deleteAction-<?php echo e($file->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure want to delete this <?php echo e($file->name); ?> attachment?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                            <form action="<?php echo e(route('lecturer.file.destroy', $file)); ?>" method="post" class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                            </form>
                                            <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $yes += 1; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/2ndRoleBlades/listFileAttachment.blade.php ENDPATH**/ ?>