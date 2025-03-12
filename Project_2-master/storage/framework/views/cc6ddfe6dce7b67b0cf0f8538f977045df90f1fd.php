

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('researchGroups.group_details')); ?></h4>
            <p class="card-description"><?php echo e(__('researchGroups.group_information')); ?></p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_name_th')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_th); ?></p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_name_en')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_desc_th')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_th); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_desc_en')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_detail_th')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_th); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_detail_en')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_en); ?></p>
            </div>
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_head')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->pivot->role == 1): ?>
                    <?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchGroups.group_members')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->pivot->role == 2): ?>
                    <?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>,
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            <a class="btn btn-primary mt-5" href="<?php echo e(route('researchGroups.index')); ?>"><?php echo e(__('researchGroups.back')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/research_groups/show.blade.php ENDPATH**/ ?>