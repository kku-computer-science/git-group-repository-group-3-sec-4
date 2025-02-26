

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .dropdown-toggle .filter-option {
        height: 40px;
        width: 400px !important;
        color: #212529;
        background-color: #fff;
        border-width: 0.2;
        border-style: solid;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
        border-radius: 5px;
        padding: 4px 10px;
    }

    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>

<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('papers.whoops')); ?></strong> <?php echo e(__('papers.input_problem')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="col-md-10 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('papers.add_paper')); ?></h4>
                <p class="card-description"><?php echo e(__('papers.enter_paper_details')); ?></p>

                <form class="forms-sample" action="<?php echo e(route('papers.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b><?php echo e(__('papers.source')); ?></b></label>
                        <div class="col-sm-9">
                            <select class="selectpicker" multiple data-live-search="true" name="cat[]">
                                <?php $__currentLoopData = $source; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($s->id); ?>'><?php echo e($s->source_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b><?php echo e(__('papers.paper_name')); ?></b></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name" class="form-control" placeholder="<?php echo e(__('papers.paper_name')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b><?php echo e(__('papers.abstract')); ?></b></label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract" class="form-control form-control-lg" style="height:150px" placeholder="<?php echo e(__('papers.abstract')); ?>"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b><?php echo e(__('papers.keyword')); ?></b></label>
                        <div class="col-sm-9">
                            <input type="text" name="keyword" class="form-control" placeholder="<?php echo e(__('papers.keyword')); ?>">
                            <p class="text-danger"><?php echo e(__('papers.keyword_note')); ?></p>
                        </div>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2"><?php echo e(__('papers.submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('papers.index')); ?>"><?php echo e(__('papers.cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/papers/create.blade.php ENDPATH**/ ?>