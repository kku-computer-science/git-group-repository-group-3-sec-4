

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('funds.fund_detail')); ?></h4>
            <p class="card-description"><?php echo e(__('funds.fund_info')); ?></p>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.fund_name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.fund_year')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_year); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.fund_details')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_details); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.fund_type')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_type); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.fund_level')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_level); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.agency')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('funds.added_by')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->user->fname_th); ?> <?php echo e($fund->user->lname_th); ?></p>
            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('funds.index')); ?>"> <?php echo e(__('funds.back')); ?></a>
            </div>
        </div>

    </div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/funds/show.blade.php ENDPATH**/ ?>