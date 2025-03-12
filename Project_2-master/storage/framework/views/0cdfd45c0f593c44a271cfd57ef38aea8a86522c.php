    

    <?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-4">
        <div class="row">
            <main class="col-md-9">
                <!-- Graph -->
                <div class="card mb-4">
                    <div class="card-body">
                        <?php if(!empty($logsByDate)): ?> <!-- ตรวจสอบว่ามีข้อมูล logsByDate หรือไม่ -->
                            <canvas id="logChart" data-logs="<?php echo e(json_encode($logsByDate)); ?>"></canvas>
                        <?php else: ?>
                            <p class="text-center"><?php echo e(trans('dashboard.no_log_data')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Search Box -->
                <div class="d-flex mb-3">
                <input type="text" class="form-control me-2" id="search" placeholder="<?php echo e(trans('system_log.search')); ?>">
                <input type="text" class="form-control me-2" id="userId" placeholder="<?php echo e(trans('system_log.user_id')); ?>">
                    <input type="date" class="form-control me-2" id="date">
                    <button class="btn btn-primary"><?php echo e(trans('system_log.search')); ?></button>
                </div>

                <!-- Log Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th><?php echo e(trans('system_log.date')); ?></th>
                                <th><?php echo e(trans('system_log.time')); ?></th>
                                <th><?php echo e(trans('system_log.user')); ?></th>
                                <th><?php echo e(trans('system_log.event')); ?></th>
                                <th><?php echo e(trans('system_log.type')); ?></th>
                                <th><?php echo e(trans('system_log.description')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($log['date']); ?></td>
                                <td><?php echo e($log['time']); ?></td>
                                <td><?php echo e($log['user'] ?? 'Guest'); ?></td>
                                <td><?php echo e($log['event']); ?></td>
                                <td><?php echo e($log['type']); ?></td>
                                <td><?php echo e($log['description']); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center">N<?php echo e(trans('system_log.No logs found')); ?></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('javascript'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let logElement = document.getElementById('logChart');
        if (logElement) {
            let logData = logElement.dataset.logs ? JSON.parse(logElement.dataset.logs) : [];

            if (logData.length > 0) {
                let dates = logData.map(log => log.date);
                let counts = logData.map(log => log.count);

                let ctx = logElement.getContext('2d');
                let logChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: "<?php echo e(trans('system_log.log_events')); ?>",
                            data: counts,
                            borderColor: 'blue',
                            fill: false
                        }]
                    }
                });
            } else {
                logElement.remove();
            }
        }
    });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/logs/index.blade.php ENDPATH**/ ?>