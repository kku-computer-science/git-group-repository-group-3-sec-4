

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('researchGroups.whoops')); ?></strong> <?php echo e(__('researchGroups.input_problem')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('researchGroups.create_group')); ?></h4>
            <p class="card-description"><?php echo e(__('researchGroups.enter_details')); ?></p>
            <form action="<?php echo e(route('researchGroups.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_name_th')); ?></b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="<?php echo e(old('group_name_th')); ?>" class="form-control" placeholder="<?php echo e(__('researchGroups.group_name_th')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_name_en')); ?></b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="<?php echo e(old('group_name_en')); ?>" class="form-control" placeholder="<?php echo e(__('researchGroups.group_name_en')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_desc_th')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" class="form-control" style="height:90px"><?php echo e(old('group_desc_th')); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_desc_en')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" class="form-control" style="height:90px"><?php echo e(old('group_desc_en')); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_detail_th')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_th" class="form-control" style="height:90px"><?php echo e(old('group_detail_th')); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_detail_en')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" class="form-control" style="height:90px"><?php echo e(old('group_detail_en')); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.image')); ?></b></p>
                    <div class="col-sm-8">
                        <input type="file" name="group_image" class="form-control" value="<?php echo e(old('group_image')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(__('researchGroups.group_head')); ?></b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b><?php echo e(__('researchGroups.group_members')); ?></b></p>
                    <div class="col-sm-8">
                        <table class="table" id="dynamicAddRemove">
                            <tr>
                                <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary upload mt-5"><?php echo e(__('researchGroups.submit')); ?></button>
                <a class="btn btn-light mt-5" href="<?php echo e(route('researchGroups.index')); ?>"><?php echo e(__('researchGroups.back')); ?></a>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/research_groups/create.blade.php ENDPATH**/ ?>