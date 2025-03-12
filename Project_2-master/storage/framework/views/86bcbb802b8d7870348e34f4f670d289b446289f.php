

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('papers.details')); ?></h4>
            <p class="card-description"><?php echo e(__('papers.enter_details')); ?></p>

            <div class="row mt-3">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.paper_name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_name); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.abstract')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->abstract); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.keyword')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->keyword); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.paper_type')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_type); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.paper_subtype')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_subtype); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.publication')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->publication); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.authors')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 1): ?>
                            <b><?php echo e(__('papers.first_author')); ?>:</b> <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 1): ?>
                            <b><?php echo e(__('papers.first_author')); ?>:</b> <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 2): ?>
                            <b><?php echo e(__('papers.co_author')); ?>:</b> <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 2): ?>
                            <b><?php echo e(__('papers.co_author')); ?>:</b> <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 3): ?>
                            <b><?php echo e(__('papers.corresponding_author')); ?>:</b> <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 3): ?>
                            <b><?php echo e(__('papers.corresponding_author')); ?>:</b> <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.source_title')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_sourcetitle); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.year_published')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_yearpub); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.volume')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_volume); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.issue')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_issue); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.page_number')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_page); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.doi')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_doi); ?></p>
            </div>

            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('papers.url')); ?></b></p>
                <a href="<?php echo e($paper->paper_url); ?>" target="_blank" class="card-text col-sm-9"><?php echo e($paper->paper_url); ?></a>
            </div>

            <a class="btn btn-primary mt-5" href="<?php echo e(route('papers.index')); ?>"><?php echo e(__('papers.back')); ?></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/papers/show.blade.php ENDPATH**/ ?>