
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->startSection('title','Project'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('researchProjects.research_project')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('researchProjects.create')); ?>"><i class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(__('researchProjects.add')); ?></a>
            <!-- <div class="table-responsive"> -->
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo e(__('researchProjects.no')); ?></th>
                        <th><?php echo e(__('researchProjects.year')); ?></th>
                        <th><?php echo e(__('researchProjects.project_name')); ?></th>
                        <th><?php echo e(__('researchProjects.head')); ?></th>
                        <th><?php echo e(__('researchProjects.member')); ?></th>
                        <th width="auto"><?php echo e(__('researchProjects.action')); ?></th>
                    </tr>
                    <thead>
                    <tbody>
                        <?php $__currentLoopData = $researchProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$researchProject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <td><?php echo e($researchProject->project_year); ?></td>
                            
                            <td><?php echo e(Str::limit($researchProject->project_name,70)); ?></td>
                            <td>
                                <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $user->pivot->role == 1): ?>
                                <?php echo e($user->fname_en); ?>

                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $user->pivot->role == 2): ?>
                                <?php echo e($user->fname_en); ?>

                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <form action="<?php echo e(route('researchProjects.destroy', $researchProject->id)); ?>" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('researchProjects.view_tooltip')); ?>"
                                            href="<?php echo e(route('researchProjects.show', $researchProject->id)); ?>">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    <!-- <?php if(Auth::user()->can('update',$researchProject)): ?>
            <a class="btn btn-primary" href="<?php echo e(route('researchProjects.edit',$researchProject->id)); ?>">Edit</a>
        <?php endif; ?> -->

                                    <?php if(Auth::user()->can('update', $researchProject)): ?>
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('researchProjects.edit_tooltip')); ?>"
                                            href="<?php echo e(route('researchProjects.edit', $researchProject->id)); ?>">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(Auth::user()->can('delete', $researchProject)): ?>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('researchProjects.delete_tooltip')); ?>">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tbody>

            </table>
            <!-- </div> -->
            <br>

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
                title: "<?php echo e(trans('researchProjects.are_you_sure')); ?>",
                text: "<?php echo e(trans('researchProjects.if_delete_gone')); ?>",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "<?php echo e(__('researchProjects.cancel')); ?>",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "<?php echo e(__('researchProjects.ok')); ?>",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "<?php echo e(trans('researchProjects.delete_success')); ?>",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "<?php echo e(__('researchProjects.ok')); ?>",
                                className: "btn btn-success",
                            }
                        }
                    }).then(function() {
                        form.submit();
                    });
                }
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/research_projects/index.blade.php ENDPATH**/ ?>