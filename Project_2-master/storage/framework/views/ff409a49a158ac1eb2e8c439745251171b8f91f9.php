

<?php $__env->startSection('content'); ?>
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('funds.whoops')); ?></strong> <?php echo e(__('funds.problem_input')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('funds.edit_fund')); ?></h4>
                <p class="card-description"><?php echo e(__('funds.fill_edit')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('funds.update',$fund->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group row">
                        <p class="col-sm-3 "><b><?php echo e(__('funds.research_grant_type')); ?></b></p>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="ทุนภายใน" <?php echo e($fund->fund_type == 'ทุนภายใน' ? 'selected' : ''); ?>><?php echo e(__('funds.internal_capital')); ?></option>
                                <option value="ทุนภายนอก" <?php echo e($fund->fund_type == 'ทุนภายนอก' ? 'selected' : ''); ?>><?php echo e(__('funds.external_capital')); ?></option>
                            </select>
                        </div>
                    </div>

                    <div id="fund_code">
                        <div class="form-group row">
                            <p class="col-sm-3"><b><?php echo e(__('funds.capital_level')); ?></b></p>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                    <option value=""<?php echo e($fund->fund_level == '' ? 'selected' : ''); ?>><?php echo e(__('funds.not_specified')); ?></option>
                                    <option value="สูง" <?php echo e($fund->fund_level == 'สูง' ? 'selected' : ''); ?>><?php echo e(__('funds.high')); ?></option>
                                    <option value="กลาง" <?php echo e($fund->fund_level == 'กลาง' ? 'selected' : ''); ?>><?php echo e(__('funds.medium')); ?></option>
                                    <option value="ล่าง" <?php echo e($fund->fund_level == 'ล่าง' ? 'selected' : ''); ?>><?php echo e(__('funds.low')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-3 "><b><?php echo e(__('funds.capital_name')); ?></b></p>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" value="<?php echo e($fund->fund_name); ?>" class="form-control" placeholder="<?php echo e(__('funds.name')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <p class="col-sm-3 "><b><?php echo e(__('funds.support')); ?></b></p>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" value="<?php echo e($fund->support_resource); ?>" class="form-control" placeholder="<?php echo e(__('funds.sup')); ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('funds.submit')); ?></button>
                    <a class="btn btn-light mt-5" href="<?php echo e(route('funds.index')); ?>"><?php echo e(__('funds.cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const ac = document.getElementById("fund_code");
    const ab = document.getElementById("fund_type").value;
    if (ab === "ทุนภายนอก") {
        ac.style.display = "none";
    }

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "ทุนภายใน" ? "block" : "none";
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/funds/edit.blade.php ENDPATH**/ ?>