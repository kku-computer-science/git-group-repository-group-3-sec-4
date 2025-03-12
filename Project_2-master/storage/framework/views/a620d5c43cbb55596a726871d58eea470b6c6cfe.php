
<?php $__env->startSection('content'); ?>
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('researchProjects.whoops')); ?></strong> <?php echo e(__('researchProjects.input_problem')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="card col-md-12" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('researchProjects.edit_project')); ?></h4>
            <p class="card-description"><?php echo e(__('researchProjects.enter_details')); ?></p>
            <form action="<?php echo e(route('researchProjects.update',$researchProject->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.project_name')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="project_name" value="<?php echo e($researchProject->project_name); ?>" class="form-control" style="height:90px"><?php echo e($researchProject->project_name); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.start_date')); ?></b></p>
                    <div class="col-sm-4">
                        <input type="date" name="project_start" value="<?php echo e($researchProject->project_start); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.end_date')); ?></b></p>
                    <div class="col-sm-4">
                        <input type="date" name="project_end" value="<?php echo e($researchProject->project_end); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <p for="exampleInputfund_details" class="col-sm-3"><b><?php echo e(__('researchProjects.choose_scholarship')); ?></b></p>
                    <div class="col-sm-9">
                        <select id='fund' style='width: 200px;' class="custom-select my-select" name="fund">
                            <option value='' disabled selected><?php echo e(__('researchProjects.choose_scholarship')); ?></option><?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($f->id); ?>" <?php echo e($f->fund_name == $researchProject->fund->fund_name ? 'selected' : ''); ?>><?php echo e($f->fund_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.year_submission')); ?></b></p>
                    <div class="col-sm-8">
                        <input type="year" name="project_year" class="form-control" placeholder="ปี" value="<?php echo e($researchProject->project_year); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.budget')); ?></b></p>
                    <div class="col-sm-4">
                        <input type="number" name="<?php echo e(__('researchProjects.baht')); ?>" value="<?php echo e($researchProject->budget); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.responsible_agency')); ?></b></p>
                    <div class="col-sm-3">
                        <select id='dep' style='width: 200px;' class="custom-select my-select"  name="responsible_department">
                            <option value=''><?php echo e(__('researchProjects.Choose_study')); ?></option><?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($dep->department_name_th); ?>" <?php echo e($dep->department_name_th == $researchProject->responsible_department ? 'selected' : ''); ?>><?php echo e($dep->department_name_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.project_details')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="note" class="form-control" style="height:90px"><?php echo e($researchProject->note); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(__('researchProjects.status')); ?></b></p>
                    <div class="col-sm-8">
                        <select id='status' class="custom-select my-select" style='width: 200px;' name="status">
                        <option value="1" <?php echo e(1 == $researchProject->status ? 'selected' : ''); ?>><?php echo e(__('researchProjects.apply_for')); ?></option>
                                <option value="2" <?php echo e(2 == $researchProject->status ? 'selected' : ''); ?>><?php echo e(__('researchProjects.carry_out')); ?></option>
                                <option value="3" <?php echo e(3 == $researchProject->status ? 'selected' : ''); ?>><?php echo e(__('researchProjects.close_project')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <table class="table">
                        <tr>
                            <th><?php echo e(__('researchProjects.person')); ?></th>
                        <tr>
                            <td>
                                <select id='head0' style='width: 200px;' name="head">
                                    <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($u->pivot->role == 1): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                        <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <table class="table " id="dynamicAddRemove">
                        <tr>
                            <th width="522.98px"><?php echo e(__('researchProjects.internal_project')); ?></th>
                            <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                        </tr>
                    </table>
                </div>
                <div class="form-group row">
                        <label for="exampleInputpaper_author" class="col-sm-3 col-form-label"><?php echo e(__('researchProjects.external')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered w-75" id="dynamic_field">

                                    <tr>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button>
                                        </td>
                                    </tr>

                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                        </div>
                <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('researchProjects.submit')); ?></button>
                <a class="btn btn-light mt-5" href="<?php echo e(route('researchProjects.index')); ?>"> <?php echo e(__('researchProjects.back')); ?></a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    // ประกาศตัวแปรรับค่าจาก trans() สำหรับ "Select User"
    var textSelectUser = "<?php echo e(trans('researchProjects.select_user_option')); ?>";

    $(document).ready(function() {
        // กำหนด select2 ให้กับ #head0
        $("#head0").select2();

        var researchProject = <?php echo $researchProject['user']; ?>;
        var i = 0;

        // วนลูปดู user ที่ role == 2 (ภายใน)
        for (i = 0; i < researchProject.length; i++) {
            var obj = researchProject[i];
            if (obj.pivot.role === 2) {
                $("#dynamicAddRemove").append(
                    '<tr>' +
                        '<td>' +
                            '<select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;">' +
                                // ใช้ตัวแปร textSelectUser แทน "Select User"
                                '<option value="">' + textSelectUser + '</option>' +
                                '<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>' +
                                    '<option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>' +
                                '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' +
                            '</select>' +
                        '</td>' +
                        '<td>' +
                            '<button type="button" class="btn btn-danger btn-sm remove-tr">' +
                                '<i class="mdi mdi-minus"></i>' +
                            '</button>' +
                        '</td>' +
                    '</tr>'
                );
                // เซ็ตค่า select ให้ตรงกับ obj.id
                document.getElementById("selUser" + i).value = obj.id;
                // ทำให้ select2 แสดงผล
                $("#selUser" + i).select2();
            }
        }

        // เมื่อคลิกปุ่ม Add เพื่อเพิ่มแถว
        $("#add-btn2").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr>' +
                    '<td>' +
                        '<select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;">' +
                            // ใช้ตัวแปร textSelectUser
                            '<option value="">' + textSelectUser + '</option>' +
                            '<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>' +
                                '<option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>' +
                            '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' +
                        '</select>' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm remove-tr">' +
                            '<i class="mdi mdi-minus"></i>' +
                        '</button>' +
                    '</td>' +
                '</tr>'
            );
            $("#selUser" + i).select2();
        });

        // เมื่อคลิกปุ่ม remove ลบแถว
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    });
</script>

<script>
    // กำหนดตัวแปรใน JavaScript ด้วยค่าที่มาจาก trans() ปรับแก้ตรงนี้
    var textPositionTitle = "<?php echo e(trans('researchProjects.Positionortitle')); ?>";
    var textFname         = "<?php echo e(trans('researchProjects.fname')); ?>";
    var textLname         = "<?php echo e(trans('researchProjects.lname')); ?>";

    $(document).ready(function() {
        var outsider = <?php echo $researchProject->outsider; ?>;
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 0;

        // ส่วนแสดงรายการ outsider ที่มีอยู่แล้วในฐานข้อมูล
        for (i = 0; i < outsider.length; i++) {
            var obj = outsider[i];
            $("#dynamic_field").append(
                '<tr id="row' + i + '" class="dynamic-added">' +
                    '<td>' +
                        '<p>' + textPositionTitle + ' :</p>' +
                        '<input type="text" name="title_name[]" ' +
                            'value="' + obj.title_name + '" ' +
                            'placeholder="' + textPositionTitle + '" ' +
                            'style="width: 200px;" class="form-control name_list" />' +
                        '<br>' +
                        '<p>' + textFname + ' :</p>' +
                        '<input type="text" name="fname[]" ' +
                            'value="' + obj.fname + '" ' +
                            'placeholder="' + textFname + '" ' +
                            'style="width: 300px;" class="form-control name_list" />' +
                        '<br>' +
                        '<p>' + textLname + ' :</p>' +
                        '<input type="text" name="lname[]" ' +
                            'value="' + obj.lname + '" ' +
                            'placeholder="' + textLname + '" ' +
                            'style="width: 300px;" class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" name="remove" id="' + i + '" ' +
                                'class="btn btn-danger btn-sm btn_remove">' +
                            '<i class="mdi mdi-minus"></i>' +
                        '</button>' +
                    '</td>' +
                '</tr>'
            );
        }

        // กรณีกดปุ่ม Add เพื่อเพิ่มฟอร์มใหม่
        $('#add').click(function() {
            i++;
            $("#dynamic_field").append(
                '<tr id="row' + i + '" class="dynamic-added">' +
                    '<td>' +
                        '<p>' + textPositionTitle + ' :</p>' +
                        '<input type="text" name="title_name[]" ' +
                            'placeholder="' + textPositionTitle + '" ' +
                            'style="width: 200px;" class="form-control name_list" />' +
                        '<br>' +
                        '<p>' + textFname + ' :</p>' +
                        '<input type="text" name="fname[]" ' +
                            'placeholder="' + textFname + '" ' +
                            'style="width: 300px;" class="form-control name_list" />' +
                        '<br>' +
                        '<p>' + textLname + ' :</p>' +
                        '<input type="text" name="lname[]" ' +
                            'placeholder="' + textLname + '" ' +
                            'style="width: 300px;" class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" name="remove" id="' + i + '" ' +
                                'class="btn btn-danger btn-sm btn_remove">' +
                            '<i class="mdi mdi-minus"></i>' +
                        '</button>' +
                    '</td>' +
                '</tr>'
            );
        });

        // ลบแถวเมื่อกดปุ่ม remove
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id).remove();
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/research_projects/edit.blade.php ENDPATH**/ ?>