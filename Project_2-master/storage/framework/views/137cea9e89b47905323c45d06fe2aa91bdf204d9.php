
<?php $__env->startSection('content'); ?>

<div class="container refund">
    <p><?php echo e(__('reseracher.Project_Service')); ?></p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;"><?php echo e(__('reseracher.No')); ?></th>
                    <th class="col-md-1" style="font-weight: bold;"><?php echo e(__('reseracher.Year')); ?></th>
                    <th class="col-md-4" style="font-weight: bold;"><?php echo e(__('reseracher.Project_Name')); ?></th>
                    <th class="col-md-4" style="font-weight: bold;"><?php echo e(__('reseracher.Details')); ?></th>
                    <th class="col-md-2" style="font-weight: bold;"><?php echo e(__('reseracher.Responsible_Person')); ?></th>
                    <th class="col-md-1" style="font-weight: bold;"><?php echo e(__('reseracher.Status')); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $resp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="vertical-align: top;text-align: left;"><?php echo e($i+1); ?></td>
                    <td style="vertical-align: top;text-align: left;">
                        <?php echo e(app()->getLocale() == 'th' ? $re->project_year + 543 : $re->project_year); ?>

                    </td>
                    <td style="vertical-align: top;text-align: left;">
                        <?php echo e($re->{'project_name_'.app()->getLocale()} ?? $re->project_name); ?>

                    </td>
                    <td>
                        <div style="padding-bottom: 10px">
                            <span style="font-weight: bold;"><?php echo e(__('reseracher.Project_Duration')); ?></span>
                            <span style="padding-left: 10px;">
                                <?php if($re->project_start != null): ?>
                                    <?php echo e(\Carbon\Carbon::parse($re->project_start)->translatedFormat('j F Y')); ?> 
                                    <?php echo e(__('reseracher.To')); ?> 
                                    <?php echo e(\Carbon\Carbon::parse($re->project_end)->translatedFormat('j F Y')); ?>

                                <?php endif; ?>
                            </span>
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('reseracher.Funding_Type')); ?></span>
                            <span style="padding-left: 10px;"><?php echo e($re->fund->{'fund_type_' . (app()->getLocale() == 'zh' ? 'cn' : app()->getLocale())} ?? $re->fund->fund_type); ?></span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('reseracher.Support_Agency')); ?></span>
                            <span style="padding-left: 10px;"><?php echo e($re->fund->{'support_resource_' . (app()->getLocale() == 'zh' ? 'cn' : app()->getLocale())} ?? $re->fund->support_resource); ?></span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('reseracher.Responsible_Department')); ?></span>
                            <span style="padding-left: 10px;">
                                <?php echo e($re->{'responsible_department_' . (app()->getLocale() == 'zh' ? 'cn' : app()->getLocale())} ?? $re->responsible_department_en); ?>

                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('reseracher.Budget_Allocated')); ?></span>
                            <span style="padding-left: 10px;"><?php echo e(number_format($re->budget)); ?> <?php echo e(__('reseracher.Currency')); ?></span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        <?php $__currentLoopData = $re->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($user->{'position_'.app()->getLocale()} ?? $user->position_en); ?> 
                            <?php echo e($user->{'fname_'.app()->getLocale()} ?? $user->fname_en); ?> 
                            <?php echo e($user->{'lname_'.app()->getLocale()} ?? $user->lname_en); ?>

                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td style="vertical-align: top;text-align: left;">
                        <?php if($re->status == 1): ?>
                        <h6><label class="badge badge-success"><?php echo e(__('reseracher.Requested')); ?></label></h6>
                        <?php elseif($re->status == 2): ?>
                        <h6><label class="badge bg-warning text-dark"><?php echo e(__('reseracher.In_Process')); ?></label></h6>
                        <?php else: ?>
                        <h6><label class="badge bg-dark"><?php echo e(__('reseracher.Closed_Project')); ?></label></h6>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#example1')) { // ตรวจสอบว่า DataTable ถูกใช้งานไปแล้วหรือยัง
            var table1 = $('#example1').DataTable({
                responsive: true,
                language: {
                    search: "<?php echo e(__('reseracher.Search')); ?>",
                    lengthMenu: "<?php echo e(__('reseracher.Show')); ?> _MENU_ <?php echo e(__('reseracher.entries')); ?>",
                    info: "<?php echo e(__('reseracher.Showing')); ?> _START_ <?php echo e(__('reseracher.to')); ?> _END_ <?php echo e(__('reseracher.of')); ?> _TOTAL_ <?php echo e(__('reseracher.entries')); ?>",
                    paginate: {
                        previous: "<?php echo e(__('reseracher.Previous')); ?>",
                        next: "<?php echo e(__('reseracher.Next')); ?>",
                    }
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/research_proj.blade.php ENDPATH**/ ?>