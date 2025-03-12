

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
        <strong><?php echo e(__('funds.Whoops')); ?></strong> <?php echo e(__('funds.Error_Message')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('funds.Add_Fund')); ?></h4>
                <p class="card-description"><?php echo e(__('funds.Enter_Fund_Details')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('funds.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="fund_type" class="col-sm-2 "><?php echo e(__('funds.Fund_Type')); ?></label>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="" disabled selected><?php echo e(__('funds.Select_Fund_Type')); ?></option>
                                <option value="ทุนภายใน"><?php echo e(__('funds.Internal_Fund')); ?></option>
                                <option value="ทุนภายนอก"><?php echo e(__('funds.External_Fund')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <label for="fund_level" class="col-sm-2 "><?php echo e(__('funds.Fund_Level')); ?></label>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                    <option value="" disabled selected><?php echo e(__('funds.Select_Fund_Level')); ?></option>
                                    <option value=""><?php echo e(__('funds.Not_Specified')); ?></option>
                                    <option value="สูง"><?php echo e(__('funds.High')); ?></option>
                                    <option value="กลาง"><?php echo e(__('funds.Medium')); ?></option>
                                    <option value="ล่าง"><?php echo e(__('funds.Low')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fund_name" class="col-sm-2 "><?php echo e(__('funds.Fund_Name')); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" class="form-control" placeholder="<?php echo e(__('funds.Enter_Fund_Name')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="support_resource" class="col-sm-2 "><?php echo e(__('funds.Support_Agency')); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" class="form-control" placeholder="<?php echo e(__('funds.Enter_Support_Agency')); ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('funds.Submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('funds.index')); ?>"><?php echo e(__('funds.Cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const ac = document.getElementById("fund_code");

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "<?php echo e(__('funds.Internal_Fund')); ?>" ? "block" : "none";
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/funds/create.blade.php ENDPATH**/ ?>