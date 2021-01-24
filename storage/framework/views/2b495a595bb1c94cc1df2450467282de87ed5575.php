<?php $__env->startSection('title', 'Edit Profile'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Profile <?php echo e($user->identity->name); ?></h1>
        </div>
        <div class="row">

            <div class="col">
                <form action="<?php echo e(route('coordinator.user.update', $user)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group">
                        <label>Role:</label>
                        <?php if($user->identity_type == 'App\Models\Student'): ?>
                            <select name="role" class="custom-select">
                                <option value="<?php echo e($user->role_id); ?>" hidden><?php echo e($user->role->name); ?></option>
                                <option value="1">Coordinator</option>
                                <option value="3">Student</option>
                            </select>
                        <?php else: ?>
                            <select name="role" class="custom-select">
                                <option value="<?php echo e($user->role_id); ?>" hidden><?php echo e($user->role->name); ?></option>
                                <option value="1">Coordinator</option>
                                <option value="2">Lecturer</option>
                            </select>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label >Name: </label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($user->identity->name); ?>" required>
                    </div>

                    <?php if($user->identity_type == 'App\Models\Student'): ?>
                        <div class="form-group">
                            <label >NIM: </label>
                            <input type="number" class="form-control" name="nim" value="<?php echo e($user->identity->nim); ?>" required>
                        </div>
                    <?php elseif($user->identity_type == 'App\Models\Staff'): ?>
                        <div class="form-group">
                            <label >NIP: </label>
                            <input type="number" class="form-control" name="nip" value="<?php echo e($user->identity->nip); ?>" required>
                        </div>

                        <div class="form-group">
                            <label >NIDN: </label>
                            <input type="number" class="form-control" name="nidn" value="<?php echo e($user->identity->nidn); ?>" required>
                        </div>

                        <div class="form-group">
                            <label >Title: </label>
                            <select name="title_id" class="custom-select">
                                <option value="<?php echo e($user->identity->title_id); ?>" hidden>
                                    <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($title->id == $user->identity->title_id): ?>
                                            <?php echo e($title->name); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </option>
                                <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($title->id); ?>"><?php echo e($title->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    <?php elseif($user->identity_type == 'App\Models\Lecturer'): ?>
                        <div class="form-group">
                            <label >NIP: </label>
                            <input type="number" class="form-control" name="nip" value="<?php echo e($user->identity->nip); ?>" required>
                        </div>

                        <div class="form-group">
                            <label >NIDN: </label>
                            <input type="number" class="form-control" name="nidn" value="<?php echo e($user->identity->nidn); ?>" required>
                        </div>

                        <div class="form-group">
                            <label >Title: </label>
                            <select name="title_id" class="custom-select">
                                <option value="<?php echo e($user->identity->title_id); ?>" hidden>
                                    <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($title->id == $user->identity->title_id): ?>
                                            <?php echo e($title->name); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </option>
                                <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($title->id); ?>"><?php echo e($title->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Jaka: </label>
                            <select name="jaka_id" class="custom-select">
                                <option value="<?php echo e($user->identity->jaka_id); ?>" hidden>
                                    <?php $__currentLoopData = $jakas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($jaka->id == $user->identity->jaka_id): ?>
                                            <?php echo e($jaka->name); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </option>
                                <?php $__currentLoopData = $jakas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jaka->id); ?>"><?php echo e($jaka->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Batch:</label>
                        <select name="batch" class="custom-select">
                            <option value="<?php echo e($user->identity->batch); ?>" hidden><?php echo e($user->identity->batch); ?></option>
                            <?php for($year = 2008;$year <= 2021;$year++): ?>
                                <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Description: </label>
                        <textarea class="form-control" name="description" required><?php echo e($user->identity->description); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="custom-select">
                            <option hidden value="<?php echo e($user->identity->gender); ?>">
                                <?php if($user->identity->gender == 'M'): ?>
                                    Male
                                <?php elseif($user->identity->gender == 'F'): ?>
                                    Female
                                <?php endif; ?>
                            </option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Phone: </label>
                        <input type="number" class="form-control" name="phone" value="<?php echo e($user->identity->phone); ?>" required>
                    </div>

                    <div class="form-group">
                        <label >Line Account: </label>
                        <input type="text" class="form-control" name="line_acc" value="<?php echo e($user->identity->line_account); ?>" required>
                    </div>

                    <div class="form-group">
                        <label >Department: </label>
                        <select name="department_id" class="custom-select">
                            <option value="<?php echo e($user->identity->department_id); ?>" hidden>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($department->id == $user->identity->department_id): ?>
                                        <?php echo e($department->name); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </option>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    

                    <div class="form-group">
                        <label >Email: </label>
                        <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
                    </div>

                    <?php if($user->id == \Illuminate\Support\Facades\Auth::id()): ?>

                    <input type="hidden" name="bpassword" value="<?php echo e($user->password); ?>">

                    <div class="form-group">
                        <label >Password: </label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label >New Password: </label>
                        <input type="password" class="form-control" name="newpassword">
                    </div>

                    <div class="form-group">
                        <label >Re type Password: </label>
                        <input type="password" class="form-control" name="repassword">
                    </div>

                    <?php endif; ?>

                    <div class="form-group">
                        <label >Profile picture:</label>
                        <input type="file" class="form-control-file" name="picture" accept="image/x-png,image/gif,image/jpeg" />
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btnA circular greenstar font-weight-bold p-2 green-hover">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Program\XAMPP\htdocs\sem3\UAS\uctc\uctcweb\resources\views/1stRoleBlades/editProfile.blade.php ENDPATH**/ ?>