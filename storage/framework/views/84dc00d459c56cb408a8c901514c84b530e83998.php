
<?php $__env->startSection('title', 'Edit Program'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Program <?php echo e($program->name); ?></h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="<?php echo e(route('coordinator.program.update', $program)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($program->name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <textarea class="form-control" name="description" required><?php echo e($program->description); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label >Goal: </label>
                        <input type="text" class="form-control" name="goal" value="<?php echo e($program->goal); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Program Date / Deadline:</label>
                        <input type="date" class="form-control" name="program_date" value="<?php echo e($program->program_date); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="category" class="custom-select">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <select name="type" class="custom-select">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Proposal:</label>
                        <input type="file" name="proposal" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label>Add Finance:</label>
                        <div id="dynamic_field">
                            <div>
                                <select name="typeFinance[]" class="custom-select typeBudgetForm d-inline-block mr-3">
                                    <option hidden>Select Type</option>
                                    <option value="0">Income</option>
                                    <option value="1">Expenditure</option>
                                </select>
                                <input type="text" name="nameBudget[]" placeholder="Enter your Detail" class="sizeForm form-control name_list d-inline-block mr-3" />
                                <input type="number" name="value[]" placeholder="Enter your Budget" class="sizeForm form-control name_list d-inline-block mr-3" />
                                <input type="file" name="proof_of_payment[]" id="fileProof-[0]" title="Proof" class="d-none" />
                                <label for="fileProof-[0]" class="typeBudgetForm form-control name_list d-inline-block mr-3">Proof image</label>
                                <button type="button" name="add" id="add" class="btn btn-success d-inline-block">Add More</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Documentations:</label>
                        <div id="picture_field">
                            <div>
                                <input type="file" name="documentation[]" class="form-control-file d-inline-block docForm" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Thumbnail:</label>
                        <input type="file" class="form-control-file" name="thumbnail" title="thumbnail program">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Edit Program</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if(isset($report->id)): ?>
        <?php if($report->status == '1'): ?>
            <?php if($program->status != '2'): ?>
                <div class="text-center mt-3">
                    <h5>Report approved, finish program Now!</h5>
                    <div>
                        <button type="button"
                                data-toggle="modal"
                                data-target="#finishProgram"
                                class="btnA circular greenstar font-weight-bold pr-4 pl-4 pb-3 pt-3 green-hover">
                            <i class="fa fa-check"></i>
                            Finish Program
                        </button>
                    </div>
                </div>

                
                <div class="modal fade" id="finishProgram">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Finish <?php echo e($program->name); ?> now ?</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                <form action="<?php echo e(route('coordinator.program.finish', $program->id)); ?>" method="post" class="d-inline-block">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover widthSubmitButton">Yes</button>
                                </form>
                                <button type="button" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    
    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div id="row'+i+'"> ' +
                    '<select name="typeFinance[]" class="custom-select typeBudgetForm d-inline-block mr-3">\n' +
                    '                                    <option hidden>Select Type</option>\n' +
                    '                                    <option value="0">Income</option>\n' +
                    '                                    <option value="1">Expenditure</option>\n' +
                    '                                </select>' +
                    '<input type="text" name="nameBudget[]" placeholder="Enter your Detail" class="sizeForm form-control name_list d-inline-block mr-3" /> <input type="number" name="value[]" placeholder="Enter your Budget" class="sizeForm form-control name_list d-inline-block mr-3" /> ' +
                    '<input type="file" name="proof_of_payment[]" id="fileProof-['+i+']" title="Proof" class="d-none" />' +
                    '<label for="fileProof-['+i+']" class="typeBudgetForm form-control name_list d-inline-block mr-3">Proof image</label>\n' +
                    '                                <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            // $('#submit').click(function(){
            //     $.ajax({
            //         url:"name.php",
            //         method:"POST",
            //         data:$('#add_name').serialize(),
            //         success:function(data)
            //         {
            //             alert(data);
            //             $('#add_name')[0].reset();
            //         }
            //     });
            // });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/editProgram.blade.php ENDPATH**/ ?>