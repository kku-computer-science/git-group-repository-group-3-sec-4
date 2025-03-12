
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(\Session::get('success')); ?></p>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header"><?php echo e(__('permissions.permissions')); ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-create')): ?>
                <span class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('permissions.create')); ?>"><?php echo e(__('permissions.new_permissions')); ?></a>
                </span>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('permissions.name')); ?></th>
                            <th width="280px"><?php echo e(__('permissions.action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($permission->id); ?></td>
                            <td><?php echo e($permission->name); ?></td>
                            <td>
                                <form action="<?php echo e(route('permissions.destroy', $permission->id)); ?>" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('permissions.view_tooltip')); ?>"
                                            href="<?php echo e(route('permissions.show', $permission->id)); ?>">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-edit')): ?>
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('permissions.edit_tooltip')); ?>"
                                            href="<?php echo e(route('permissions.edit', $permission->id)); ?>">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-delete')): ?>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('permissions.delete_tooltip')); ?>">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="justify-content-center">

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
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
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "<?php echo e(trans('permissions.are_you_sure')); ?>",
            text: "<?php echo e(trans('permissions.if_delete_gone')); ?>",
            icon: "warning",
            buttons: {
                cancel: "<?php echo e(trans('permissions.cancel_button')); ?>",   // ปุ่มยกเลิก
                confirm: "<?php echo e(trans('permissions.ok_button')); ?>"       // ปุ่มตกลง
            },
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("<?php echo e(trans('permissions.delete_successfully')); ?>", {
                    icon: "success",
                }).then(function() {
                    location.reload();
                    form.submit();
                });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/permissions/index.blade.php ENDPATH**/ ?>