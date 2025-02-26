

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <strong><?php echo e(__('users.oops')); ?></strong> <?php echo e(__('users.error_msg')); ?><br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card" style="padding: 16px;">
                <div class="card-body">
                    <h4 class="card-title mb-5"><?php echo e(__('users.add_user')); ?></h4>
                    <p class="card-description"><?php echo e(__('users.enter_details')); ?></p>
                    <?php echo Form::open(array('route' => 'users.store','method'=>'POST')); ?>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b><?php echo e(__('users.fname_th')); ?></b></p>
                            <?php echo Form::text('fname_th', null, array('placeholder' => __('users.fname_th'),'class' => 'form-control')); ?>

                        </div>
                        <div class="col-sm-6">
                            <p><b><?php echo e(__('users.lname_th')); ?></b></p>
                            <?php echo Form::text('lname_th', null, array('placeholder' => __('users.lname_th'),'class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b><?php echo e(__('users.fname_en')); ?></b></p>
                            <?php echo Form::text('fname_en', null, array('placeholder' => __('users.fname_en'),'class' => 'form-control')); ?>

                        </div>
                        <div class="col-sm-6">
                            <p><b><?php echo e(__('users.lname_en')); ?></b></p>
                            <?php echo Form::text('lname_en', null, array('placeholder' => __('users.lname_en'),'class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <p><b><?php echo e(__('users.email')); ?></b></p>
                            <?php echo Form::text('email', null, array('placeholder' => __('users.email'),'class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b><?php echo e(__('users.password')); ?></b></p>
                            <?php echo Form::password('password', array('placeholder' => __('users.password'),'class' => 'form-control')); ?>

                        </div>
                        <div class="col-sm-6">
                            <p><b><?php echo e(__('users.confirm_password')); ?></b></p>
                            <?php echo Form::password('password_confirmation', array('placeholder' => __('users.confirm_password'),'class' =>'form-control')); ?>

                        </div>
                    </div>
                    <div class="form-group col-sm-8">
                        <p><b><?php echo e(__('users.role')); ?></b></p>
                        <div class="col-sm-8">
                            <?php echo Form::select('roles[]', $roles,[],  array('class' => 'selectpicker','multiple')); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <h6><?php echo e(__('users.department')); ?> <span class="text-danger">*</span></h6>
                                <select class="form-control" name="cat" id="cat" style="width: 100%;" required>
                                    <option><?php echo e(__('users.select_category')); ?></option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->department_name_en); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h6><?php echo e(__('users.program')); ?> <span class="text-danger">*</span></h6>
                                <select class="form-control select2" name="sub_cat" id="subcat" required>
                                    <option value=""><?php echo e(__('users.select_subcategory')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo e(__('users.submit')); ?></button>
                    <a class="btn btn-secondary" href="<?php echo e(route('users.index')); ?>"><?php echo e(__('users.cancel')); ?></a>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script>
    $('#cat').on('change', function(e) {
        var cat_id = e.target.value;
        $.get('/ajax-get-subcat?cat_id=' + cat_id, function(data) {
            $('#subcat').empty();
            $.each(data, function(index, areaObj) {
                $('#subcat').append('<option value="' + areaObj.id + '">' + areaObj.degree.title_en +' in '+ areaObj.program_name_en + '</option>');
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/users/create.blade.php ENDPATH**/ ?>