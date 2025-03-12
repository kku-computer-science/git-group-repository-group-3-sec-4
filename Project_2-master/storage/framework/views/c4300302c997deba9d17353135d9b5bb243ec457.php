

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('books.Book Detail')); ?></h4>
            <p class="card-description"><?php echo e(trans('books.Book details information')); ?></p>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('books.Book name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('books.Year')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e(date('Y', strtotime($paper->ac_year)) + 543); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('books.Publication source')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_sourcetitle); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('books.Page')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_page); ?></p>
            </div>

            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('books.index')); ?>"><?php echo e(trans('books.Back')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/books/show.blade.php ENDPATH**/ ?>