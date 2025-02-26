

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
  
  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(__('users.success_message')); ?>

    </div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
        <h4 class="card-title"><?php echo e(__('users.title')); ?></h4>
        <form id="import-csv-form" method="POST" action="<?php echo e(url('import')); ?>" accept-charset="utf-8" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="file" placeholder="<?php echo e(__('users.choose_file')); ?>">
                    </div>
                    <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>              
                 <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3" id="submit"><?php echo e(__('users.submit')); ?></button>
                </div>
            </div>     
        </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GIGABYTE\Documents\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/users/import.blade.php ENDPATH**/ ?>