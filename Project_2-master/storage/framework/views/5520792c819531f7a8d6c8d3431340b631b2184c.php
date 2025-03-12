

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('patents.detail_title')); ?></h4>
            <p class="card-description"><?php echo e(trans('patents.detail_description')); ?></p>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('patents.name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($patent->ac_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('patents.type')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($patent->ac_type); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('patents.registration_date')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($patent->ac_year); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('patents.registration_number')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e(trans('patents.registration_prefix')); ?> <?php echo e($patent->ac_refnumber); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('patents.creator')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $patent->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($a->fname_th); ?> <?php echo e($a->lname_th); ?><?php if(!$loop->last): ?>,<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('patents.co_creator')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $patent->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($a->author_fname); ?> <?php echo e($a->author_lname); ?><?php if(!$loop->last): ?>,<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            
            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('patents.index')); ?>"><?php echo e(trans('patents.back')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/patents/show.blade.php ENDPATH**/ ?>