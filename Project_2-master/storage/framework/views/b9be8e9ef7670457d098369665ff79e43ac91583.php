

<?php $__env->startSection('title', 'System Logs'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h4>System Logs</h4>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Timestamp</th>
                        <th>Level</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($log->id); ?></td>
                            <td><?php echo e($log->created_at); ?></td>
                            <td><?php echo e($log->level); ?></td>
                            <td><?php echo e($log->message); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <!-- เพิ่ม Pagination -->
            <div class="d-flex justify-content-center">
                <?php echo e($logs->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.admins.layouts.admin-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/dashboards/admins/logs.blade.php ENDPATH**/ ?>