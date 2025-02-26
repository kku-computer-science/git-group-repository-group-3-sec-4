
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(\Session::get('success')); ?></p>
        </div>
        <?php endif; ?>
        <div class="card col-8" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('roles.roles')); ?></h4>
                <p class="card-description"><?php echo e(__('roles.role_details')); ?></p>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(__('roles.name')); ?> </b></p>
                    <p class="card-text col-sm-9"><?php echo e($role->name); ?></p>
                </div>
                <div class="row mt-3">
                    <p class="card-text col-sm-3"><b><?php echo e(__('roles.permissions')); ?> </b></p>
                    <?php if(!empty($rolePermissions)): ?>
                    <p class="card-text col-sm-9" style="line-height: 1.85rem;">
                        <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="badge badge-success"> <?php echo e($permission->name); ?> </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <?php endif; ?>
                </div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                <a class="btn btn-primary mt-5" href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('roles.back')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/roles/show.blade.php ENDPATH**/ ?>