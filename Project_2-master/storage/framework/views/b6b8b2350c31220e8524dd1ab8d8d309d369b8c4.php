

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong><?php echo e(__('roles.opps')); ?></strong> <?php echo e(__('roles.error_check')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header"><?php echo e(__('roles.create_role')); ?>

                <span class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('roles.roles')); ?></a>
                </span>
            </div>

            <div class="card-body">
                <?php echo Form::open(array('route' => 'roles.store','method'=>'POST')); ?>

                    <div class="form-group">
                        <strong><?php echo e(__('roles.name')); ?>:</strong>
                        <?php echo Form::text('name', null, array('placeholder' => __('roles.name'),'class' => 'form-control')); ?>

                    </div>

                    <div class="form-group">
                        <strong><?php echo e(__('roles.permission')); ?>:</strong>
                        <br/>
                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                            <?php echo e($value->name); ?></label>
                        <br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo e(__('roles.submit')); ?></button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/roles/create.blade.php ENDPATH**/ ?>