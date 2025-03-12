

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('researchProjects.research_projects_detail')); ?></h4>
            <p class="card-description"><?php echo e(__('researchProjects.project_info')); ?></p>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.project_name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->project_name); ?></p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.start_date')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->project_start); ?></p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.end_date')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->project_end); ?></p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.funder')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->fund->fund_name); ?></p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.budget')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->budget); ?></p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.project_details')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->note); ?></p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.status')); ?></b></p>
                <?php if($researchProject->status == 1): ?>
                <p class="card-text col-sm-9"><?php echo e(__('researchProjects.apply_for')); ?></p>
                <?php elseif($researchProject->status == 2): ?>
                <p class="card-text col-sm-9"><?php echo e(__('researchProjects.carry_out')); ?></p>
                <?php else: ?>
                <p class="card-text col-sm-9"><?php echo e(__('researchProjects.close_project')); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.head')); ?></b></p>
                <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->pivot->role == 1): ?>
                <p class="card-text col-sm-9"><?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></p>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(__('researchProjects.members')); ?></b></p>
                <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->pivot->role == 2): ?>
                <p class="card-text col-sm-9"><?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                <?php if(!$loop->last): ?>,<?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php $__currentLoopData = $researchProject->outsider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->pivot->role == 2): ?>
                , <?php echo e($user->title_name); ?> <?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                <?php if(!$loop->last): ?>,<?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="pull-right mt-5">
                <a class="btn btn-primary" href="<?php echo e(route('researchProjects.index')); ?>"><?php echo e(__('researchProjects.back')); ?></a>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/research_projects/show.blade.php ENDPATH**/ ?>