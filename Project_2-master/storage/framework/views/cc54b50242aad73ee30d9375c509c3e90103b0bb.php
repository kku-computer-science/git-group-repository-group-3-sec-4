
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(\Session::get('success')); ?></p>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header"><?php echo e(__('department.department')); ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-create')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('departments.create')); ?>">
                    <?php echo e(__('department.new_department')); ?>

                </a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('department.name')); ?></th>
                            <th width="280px"><?php echo e(__('department.action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($department->id); ?></td>
                            <td><?php echo e($department->department_name_th); ?></td>
                            <td>
                                <form action="<?php echo e(route('departments.destroy', $department->id)); ?>" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                           type="button"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php echo e(trans('department.view_tooltip')); ?>"
                                           href="<?php echo e(route('departments.show', $department->id)); ?>">
                                           <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-edit')): ?>
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                           type="button"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="<?php echo e(trans('department.edit_tooltip')); ?>"
                                           href="<?php echo e(route('departments.edit', $department->id)); ?>">
                                           <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-delete')): ?>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                                type="submit"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="<?php echo e(trans('department.delete_tooltip')); ?>">
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
                <?php echo e($data->appends($_GET)->links()); ?>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();

        swal({
                title: "<?php echo e(trans('department.are_you_sure')); ?>",
                text: "<?php echo e(trans('department.if_delete_gone')); ?>",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "<?php echo e(trans('department.cancel_button')); ?>",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "<?php echo e(trans('department.ok_button')); ?>",
                        value: true,
                        visible: true,
                        className: "btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "<?php echo e(trans('department.delete_successfully')); ?>",
                        icon: "success",
                        button: "<?php echo e(trans('department.ok_button')); ?>"
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/departments/index.blade.php ENDPATH**/ ?>