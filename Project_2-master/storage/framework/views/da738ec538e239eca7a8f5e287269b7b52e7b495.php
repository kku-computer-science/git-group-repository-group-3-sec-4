
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong><?php echo e(__('permissions.error_title')); ?></strong> <?php echo e(__('permissions.error_message')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header"><?php echo e(__('permissions.create_permission')); ?>

                <span class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('permissions.index')); ?>"><?php echo e(__('permissions.permissions')); ?></a>
                </span>
            </div>
            <div class="card-body">
                <?php echo Form::open(array('route' => 'permissions.store','method'=>'POST')); ?>

                    <div class="form-group">
                        <strong><?php echo e(__('permissions.name')); ?>:</strong>
                        <?php echo Form::text('name', null, array('placeholder' => __('permissions.name_placeholder'),'class' => 'form-control')); ?>

                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('permissions.submit')); ?></button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/permissions/create.blade.php ENDPATH**/ ?>