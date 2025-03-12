<!-- <?php
   if(Auth::user()->hasRole('admin')) {
      $layoutDirectory = 'dashboards.admins.layouts.admin-dash-layout';
   } else {
      $layoutDirectory = 'dashboards.users.layouts.user-dash-layout';
   }
?> -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e(\Session::get('success')); ?></p>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header"><?php echo e(__('department.department')); ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                    <span class="float-right">
                        <a class="btn btn-primary" href="<?php echo e(route('departments.index')); ?>"><?php echo e(__('department.back')); ?></a>
                    </span>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong><?php echo e(__('department.department_name_th')); ?>:</strong>
                    <?php echo e($department->department_name_th); ?>

                </div>
                <div class="lead">
                    <strong><?php echo e(__('department.department_name_en')); ?>:</strong>
                    <?php echo e($department->department_name_en); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/departments/show.blade.php ENDPATH**/ ?>