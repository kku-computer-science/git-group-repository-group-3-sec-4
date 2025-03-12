
<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<h3 style="padding-top: 10px;"><?php echo e(__('dashboard.text1')); ?></h3>
<br>
<h4><?php echo e(__('dashboard.hello')); ?>

                <?php if(app()->getLocale() == 'zh'): ?>
                    <?php if(Auth::user()->fname_zh == null || Auth::user()->fname_zh == '-' || Auth::user()->lname_zh == null || Auth::user()->lname_zh == '-'): ?>
                        <?php echo e(Auth::user()->position_en); ?> <?php echo e(Auth::user()->fname_en); ?> <?php echo e(Auth::user()->lname_en); ?>

                    <?php else: ?>
                        <?php echo e(Auth::user()->position_zh); ?> <?php echo e(Auth::user()->fname_zh); ?> <?php echo e(Auth::user()->lname_zh); ?>

                    <?php endif; ?>
                <?php elseif(app()->getLocale() == 'th'): ?>
                        <?php echo e(Auth::user()->position_th); ?> <?php echo e(Auth::user()->fname_th); ?> <?php echo e(Auth::user()->lname_th); ?>

                <?php else: ?>
                        <?php echo e(Auth::user()->position_en); ?> <?php echo e(Auth::user()->fname_en); ?> <?php echo e(Auth::user()->lname_en); ?>

                <?php endif; ?>

</h2>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/dashboards/users/index.blade.php ENDPATH**/ ?>