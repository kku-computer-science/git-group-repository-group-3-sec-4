
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }

    body label:not(.input-group-text) {
        margin-top: 10px;
    }

    body .my-select {
        background-color: #EFEFEF;
        color: #212529;
        border: 0 none;
        border-radius: 10px;
        padding: 6px 20px;
        width: 100%;
    }
</style>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title" "><?php echo e(__('manageProgram.course')); ?></h4>
            <a class=" btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="javascript:void(0)" id="new-program" data-toggle="modal"><i class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(__('manageProgram.add')); ?> </a>
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('manageProgram.id')); ?></th>
                            <th><?php echo e(__('manageProgram.name_thai')); ?></th>
                            <!-- <th>Name (Eng)</th> -->
                            <th><?php echo e(__('manageProgram.degree')); ?></th>
                            <th><?php echo e(__('manageProgram.action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="program_id_<?php echo e($program->id); ?>">
                            <td><?php echo e($i+1); ?></td>
                            <td><?php echo e($program->program_name_th); ?></td>
                            <!-- <td><?php echo e($program->program_name_en); ?></td> -->
                            <td><?php echo e($program->degree->degree_name_en); ?></td>
                            <td>
                                <form action="<?php echo e(route('programs.destroy',$program->id)); ?>" method="POST">
                                    <!-- <a class="btn btn-info" id="show-program" data-toggle="modal" data-id="<?php echo e($program->id); ?>">Show</a> -->

                                    <!-- <a class="btn btn-outline-primary btn-sm" id="show-program" type="button" data-toggle="modal" data-placement="top" title="view" data-id="<?php echo e($program->id); ?>"><i class="mdi mdi-eye"></i></a>
                                     -->
                                    <!-- <a href="javascript:void(0)" class="btn btn-success" id="edit-program" data-toggle="modal" data-id="<?php echo e($program->id); ?>">Edit </a> -->
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                            id="edit-program"
                                            type="button"
                                            data-toggle="modal"
                                            data-id="<?php echo e($program->id); ?>"
                                            data-placement="top"
                                            title="<?php echo e(trans('manageProgram.edit_tooltip')); ?>"
                                            href="javascript:void(0)">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>

                                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm"
                                            id="delete-program"
                                            type="submit"
                                            data-id="<?php echo e($program->id); ?>"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="<?php echo e(trans('manageProgram.delete_tooltip')); ?>">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                </form>
                                <!-- <a id="delete-program" data-id="<?php echo e($program->id); ?>" class="btn btn-danger delete-user">Delete</a> -->

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>


<!-- Add and Edit program modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="programCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="proForm" action="<?php echo e(route('programs.store')); ?>" method="POST">
                    <input type="hidden" name="pro_id" id="pro_id">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><?php echo e(__('manageProgram.education_level')); ?>:</strong>
                                <div class="col-sm-8">
                                    <select id="degree" class="custom-select my-select" name="degree">
                                        <?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($d->id); ?>"><?php echo e($d->degree_name_th); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong><?php echo e(__('manageProgram.major')); ?>:</strong>
                                <div class="col-sm-8">
                                    <select id="department" class="custom-select my-select" name="department">
                                        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($d->id); ?>"><?php echo e($d->department_name_th); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong><?php echo e(__('manageProgram.name_thai')); ?>:</strong>
                                <input type="text" name="program_name_th" id="program_name_th" class="form-control" placeholder="<?php echo e(__('manageProgram.enter_name_thai')); ?>" onchange="validate()">
                            </div>
                            <div class="form-group">
                                <strong><?php echo e(__('manageProgram.name_english')); ?>:</strong>
                                <input type="text" name="program_name_en" id="program_name_en" class="form-control" placeholder="<?php echo e(__('manageProgram.enter_name_english')); ?>" onchange="validate()">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled><?php echo e(__('manageProgram.submit')); ?></button>
                            <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-danger"><?php echo e(__('manageProgram.cancel')); ?></a>
                        </div>
                    </div>
                </form>
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
<script>
    $(document).ready(function() {

        /* When click New program button */
        $('#new-program').click(function() {
            $('#btn-save').val("create-program");
            $('#program').trigger("reset");
            // เดิม: $('#programCrudModal').html("Add New program");
            // แก้เป็นเรียกข้อความจากไฟล์แปล manageProgram.php
            $('#programCrudModal').html("<?php echo e(__('manageProgram.add_new_program')); ?>");
            $('#crud-modal').modal('show');
        });

        /* Edit program */
        $('body').on('click', '#edit-program', function() {
            var program_id = $(this).data('id');
            $.get('programs/' + program_id + '/edit', function(data) {
                // แก้ไขให้ใช้การแปลแทนข้อความเดิม
                $('#programCrudModal').html("<?php echo e(__('manageProgram.edit_program')); ?>");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#pro_id').val(data.id);
                $('#program_name_th').val(data.program_name_th);
                $('#program_name_en').val(data.program_name_en);
                $('#degree').val(data.degree_id);
            });
        });


        /* Delete program */
        $('body').on('click', '#delete-program', function(e) {
            var program_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            e.preventDefault();

            // เปลี่ยนการกำหนดปุ่มใน sweetalert เพื่อแปลปุ่ม OK/Cancel
            swal({
                title: "<?php echo e(trans('manageProgram.are_you_sure')); ?>",
                text: "<?php echo e(trans('manageProgram.cant_recover')); ?>",
                icon: "warning",
                buttons: {
                    cancel: "<?php echo e(trans('manageProgram.cancel_button')); ?>", // ปุ่มยกเลิก
                    confirm: "<?php echo e(trans('manageProgram.ok_button')); ?>" // ปุ่มตกลง
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("<?php echo e(trans('manageProgram.delete_success')); ?>", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        $.ajax({
                            type: "DELETE",
                            url: "programs/" + program_id,
                            data: {
                                "id": program_id,
                                "_token": token,
                            },
                            success: function(data) {
                                $('#msg').html('program entry deleted successfully');
                                $("#program_id_" + program_id).remove();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    });

                }
            });
        });
    });
</script>
<script>
    error = false

    function validate() {
        if (document.proForm.program_name_th.value != '' && document.proForm.program_name_en.value != '')
            document.proForm.btnsave.disabled = false
        else
            document.proForm.btnsave.disabled = true
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/programs/index.blade.php ENDPATH**/ ?>