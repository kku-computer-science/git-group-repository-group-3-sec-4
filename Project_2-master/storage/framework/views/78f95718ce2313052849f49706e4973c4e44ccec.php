
<style>
    body label:not(.input-group-text) {
        margin-top: 10px;
    }

    body .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 6px 20px;
        width: 100%;
    }
</style>
<?php $__env->startSection('title','Profile'); ?>
<!-- เปลี่ยนไปใช้ SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert@2/dist/sweetalert.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert@2/dist/sweetalert.min.js"></script>
<?php $__env->startSection('content'); ?>
<div class="container profile">
    <div class="bg-white shadow rounded-lg d-block d-sm-flex">
        <div class="profile-tab-nav border-right">
            <div class="p-4">
                <div class="img-circle text-center mb-3">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle admin_picture" src="<?php echo e(Auth::user()->picture); ?>" alt="User profile picture">
                    </div>
                    <h4 class="text-center p-2"><?php if(app()->getLocale() == 'zh'): ?>
                        <?php if(Auth::user()->fname_zh == null || Auth::user()->fname_zh == '-' || Auth::user()->lname_zh == null || Auth::user()->lname_zh == '-'): ?>
                        <?php echo e(Auth::user()->position_en); ?> <?php echo e(Auth::user()->fname_en); ?> <?php echo e(Auth::user()->lname_en); ?>

                        <?php else: ?>
                        <?php echo e(Auth::user()->position_zh); ?> <?php echo e(Auth::user()->fname_zh); ?> <?php echo e(Auth::user()->lname_zh); ?>

                        <?php endif; ?>
                        <?php elseif(app()->getLocale() == 'th'): ?>
                        <?php echo e(Auth::user()->position_th); ?> <?php echo e(Auth::user()->fname_th); ?> <?php echo e(Auth::user()->lname_th); ?>

                        <?php else: ?>
                        <?php echo e(Auth::user()->position_en); ?> <?php echo e(Auth::user()->fname_en); ?> <?php echo e(Auth::user()->lname_en); ?>

                        <?php endif; ?>
                    </h4>
                    <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                    <a href="javascript:void(0)" class="btn btn-primary btn-block btn-sm" id="change_picture_btn"><b><?php echo e(__('profile.change_picture')); ?></b></a>
                </div>

            </div>
            <div class="nav flex-column nav-pills-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link " id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                    <i class="mdi mdi-account-card-details"></i>
                    <span class="menu-title"> <?php echo e(__('profile.account')); ?> </span>
                </a>
                <a class="nav-link " id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                    <i class="mdi mdi-key-variant"></i>
                    <span class="menu-title"> <?php echo e(__('profile.password')); ?> </span>
                </a>
                <?php if(Auth::user()->hasRole('teacher')): ?>
                <a class="nav-link <?php echo e(old('tab') == 'expertise' ? ' active' : null); ?>" id="expertise-tab" data-toggle="pill" href="#expertise" role="tab" aria-controls="expertise" aria-selected="false">
                    <i class="mdi mdi-account-star"></i>
                    <span class="menu-title"> <?php echo e(__('profile.expiretise')); ?> </span>
                </a>
                <a class="nav-link" id="education-tab" data-toggle="pill" href="#education" role="tab" aria-controls="education" aria-selected="false">
                    <i class="mdi mdi-school"></i>
                    <span class="menu-title"> <?php echo e(__('profile.education')); ?> </span>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
            <!-- <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab"> -->
            <div class="tab-pane " id="account" role="tabpanel" aria-labelledby="account-tab">
                <h3 class="mb-4"><?php echo e(__('profile.srofile_settings')); ?></h3>
                <form class="form-horizontal" method="POST" action="<?php echo e(route('adminUpdateInfo')); ?>" id="AdminInfoForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-sm-4">
                                <label><?php echo e(__('profile.name_title')); ?></label>
                                <select class="custom-select my-select " name="title_name_en">
                                    <option value="Mr." <?php echo e(Auth::user()->title_name_en == 'Mr.' ? 'selected' : ''); ?>><?php echo e(__('profile.mr')); ?></option>
                                    <option value="Miss" <?php echo e(Auth::user()->title_name_en == 'Miss' ? 'selected' : ''); ?>><?php echo e(__('profile.mrs')); ?></option>
                                    <option value="Mrs." <?php echo e(Auth::user()->title_name_en == 'Mrs.' ? 'selected' : ''); ?>><?php echo e(__('profile.miss')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.fname_en')); ?></label>
                                <input type="text" class="form-control" id="inputfNameEN" placeholder="<?php echo e(__('profile.Name')); ?>" value="<?php echo e(Auth::user()->fname_en); ?>" name="fname_en">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.lname_en')); ?></label>
                                <input type="text" class="form-control" id="inputlNameEN" placeholder="<?php echo e(__('profile.Name')); ?>" value="<?php echo e(Auth::user()->lname_en); ?>" name="lname_en">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.fname_th')); ?>

                                    << /label>
                                        <input type="text" class="form-control" id="inputfNameTH" placeholder="<?php echo e(__('profile.Name')); ?>" value="<?php echo e(Auth::user()->fname_th); ?>" name="fname_th">
                                        <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.lname_th')); ?></label>
                                <input type="text" class="form-control" id="inputlNameTH" placeholder="<?php echo e(__('profile.Name')); ?>" value="<?php echo e(Auth::user()->lname_th); ?>" name="lname_th">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.email')); ?></label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="<?php echo e(__('profile.Email')); ?>" value="<?php echo e(Auth::user()->email); ?>" name="email">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <?php if(Auth::user()->hasRole('teacher')): ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.academic_ranks')); ?></label>
                                <select id="category" class="custom-select my-select" name="academic_ranks_en">
                                    <option value="Professor" <?php echo e(Auth::user()->academic_ranks_en == 'Professor' ? 'selected' : ''); ?>><?php echo e(__('profile.professor')); ?></option>
                                    <option value="Associate Professor" <?php echo e(Auth::user()->academic_ranks_en == 'Associate Professor' ? 'selected' : ''); ?>><?php echo e(__('profile.associate_professor')); ?></option>
                                    <option value="Assistant Professor" <?php echo e(Auth::user()->academic_ranks_en == 'Assistant Professor' ? 'selected' : ''); ?>><?php echo e(__('profile.assistant_professor')); ?></option>
                                    <option value="Lecturer" <?php echo e(Auth::user()->academic_ranks_en == 'Lecturer' ? 'selected' : ''); ?>><?php echo e(__('profile.lecturer')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.academic_position')); ?></label>
                                <select name="academic_ranks_th" id="subcategory" class="custom-select my-select">
                                    <optgroup id="Professor" label="Professor">
                                        <option value="ศาสตราจารย์" <?php echo e(Auth::user()->academic_ranks_th == 'ศาสตราจารย์' ? 'selected' : ''); ?>><?php echo e(__('profile.professor')); ?></option>
                                    </optgroup>
                                    <optgroup id="Associate Professor" label="Associate Professor">
                                        <option value="รองศาสตราจารย์" <?php echo e(Auth::user()->academic_ranks_th == 'รองศาสตราจารย์' ? 'selected' : ''); ?>><?php echo e(__('profile.associate_professor')); ?></option>
                                    </optgroup>
                                    <optgroup id="Assistant Professor" label="Assistant Professor">
                                        <option value="ผู้ช่วยศาสตราจารย์" <?php echo e(Auth::user()->academic_ranks_th == 'ผู้ช่วยศาสตราจารย์' ? 'selected' : ''); ?>><?php echo e(__('profile.assistant_professor')); ?></option>
                                    </optgroup>
                                    <optgroup id="Lecturer" label="Lecturer">
                                        <option value="อาจารย์" <?php echo e(Auth::user()->academic_ranks_th == 'อาจารย์' ? 'selected' : ''); ?>><?php echo e(__('profile.lecturer')); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="pos" type="checkbox" value="check2" /><?php echo e(__('profile.check_degree')); ?></label>
                                </div>

                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('profile.update')); ?></button>
                    </div>
                </form>
            </div>


            <div class="tab-pane fade " id="password" role="tabpanel" aria-labelledby="password-tab">
                <form class="form-horizontal" action="<?php echo e(route('adminChangePassword')); ?>" method="POST" id="changePasswordAdminForm">
                    <h3 class="mb-4"><?php echo e(__('profile.password_settings')); ?></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.old_password')); ?></label>
                                <input type="password" class="form-control" id="inputpassword" placeholder="<?php echo e(__('profile.Enter current password')); ?>" name="oldpassword">
                                <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.New password')); ?></label>
                                <input type="password" class="form-control" id="newpassword" placeholder="<?php echo e(__('profile.Enter new password1')); ?>" name="newpassword">
                                <span class="text-danger error-text newpassword_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('profile.confirm_new_password')); ?></label>
                                <input type="password" class="form-control" id="cnewpassword" placeholder="<?php echo e(__('profile.ReEnter new password1')); ?>" name="cnewpassword">
                                <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary"><?php echo e(__('profile.update')); ?>!!</button>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </div>

                </form>
            </div>
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('updateEdInfo')); ?>" id="EdInfoForm">
                    <h3 class="mb-4"><?php echo e(__('profile.educational_record')); ?></h3>
                    <div class="row">
                        <label><?php echo e(__('profile.bachelor_degree')); ?></label>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.university_name')); ?></label>
                                <?php if(empty(Auth::user()->education[0]->uname)): ?>
                                <input type="text" class="form-control" id="inputlBUName" placeholder="<?php echo e(__('profile.university_name')); ?>" value="" name="b_uname">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlBUName" placeholder="<?php echo e(__('profile.university_name')); ?>" value="<?php echo e(Auth::user()->education[0]->uname); ?>" name="b_uname">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.degree_name')); ?></label>
                                <?php if(empty(Auth::user()->education[0]->qua_name)): ?>
                                <input type="text" class="form-control" id="inputlBQuName" placeholder="<?php echo e(__('profile.degree_name')); ?>" value="" name="b_qua_name">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlBQuName" placeholder="<?php echo e(__('profile.degree_name')); ?>" value="<?php echo e(Auth::user()->education[0]->qua_name); ?>" name="b_qua_name">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.year_of_graduation')); ?></label>
                                <?php if(empty(Auth::user()->education[0]->year)): ?>
                                <input type="text" class="form-control" id="inputlYear" placeholder="<?php echo e(__('profile.year_of_graduation')); ?>" value="" name="b_year">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlYear" placeholder="<?php echo e(__('profile.year_of_graduation')); ?>" value="<?php echo e(Auth::user()->education[0]->year); ?>" name="b_year">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label><?php echo e(__('profile.master_degree')); ?></label>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.university_name')); ?></label>
                                <?php if(empty(Auth::user()->education[1]->uname)): ?>
                                <input type="text" class="form-control" id="inputlMUName" placeholder="<?php echo e(__('profile.university_name')); ?>" value="" name="m_uname">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlMUName" placeholder="<?php echo e(__('profile.university_name')); ?>" value="<?php echo e(Auth::user()->education[1]->uname); ?>" name="m_uname">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.degree_name')); ?></label>
                                <?php if(empty(Auth::user()->education[1]->qua_name)): ?>
                                <input type="text" class="form-control" id="inputlMQuName" placeholder="<?php echo e(__('profile.degree_name')); ?>" value="" name="m_qua_name">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlMQuName" placeholder="<?php echo e(__('profile.degree_name')); ?>" value="<?php echo e(Auth::user()->education[1]->qua_name); ?>" name="m_qua_name">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.year_of_graduation')); ?></label>
                                <?php if(empty(Auth::user()->education[1]->year)): ?>
                                <input type="text" class="form-control" id="inputlYear" placeholder="<?php echo e(__('profile.year_of_graduation')); ?>" value="" name="m_year">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlYear" placeholder="<?php echo e(__('profile.year_of_graduation')); ?>" value="<?php echo e(Auth::user()->education[1]->year); ?>" name="m_year">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label><?php echo e(__('profile.doctoral_degree')); ?></label>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.university_name')); ?></label>
                                <?php if(empty(Auth::user()->education[2]->uname)): ?>
                                <input type="text" class="form-control" id="inputlDUName" placeholder="<?php echo e(__('profile.university_name')); ?>" value="" name="d_uname">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlDUName" placeholder="<?php echo e(__('profile.university_name')); ?>" value="<?php echo e(Auth::user()->education[2]->uname); ?>" name="d_uname">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.degree_name')); ?></label>
                                <?php if(empty(Auth::user()->education[2]->qua_name)): ?>
                                <input type="text" class="form-control" id="inputlDQuName" placeholder="<?php echo e(__('profile.degree_name')); ?>" value="" name="d_qua_name">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlDQuName" placeholder="<?php echo e(__('profile.degree_name')); ?>" value="<?php echo e(Auth::user()->education[2]->qua_name); ?>" name="d_qua_name">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?php echo e(__('profile.year_of_graduation')); ?></label>
                                <?php if(empty(Auth::user()->education[2]->year)): ?>
                                <input type="text" class="form-control" id="inputlYear" placeholder="<?php echo e(__('profile.year_of_graduation')); ?>" value="" name="d_year">
                                <?php else: ?>
                                <input type="text" class="form-control" id="inputlYear" placeholder="<?php echo e(__('profile.year_of_graduation')); ?>" value="<?php echo e(Auth::user()->education[2]->year); ?>" name="d_year">
                                <?php endif; ?>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-primary"><?php echo e(__('profile.update')); ?></button>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </div>

                </form>

            </div>
            <div class="tab-pane fade show<?php echo e(old('tab') == 'expertise' ? ' active' : null); ?>" id="expertise" role="tabpanel" aria-labelledby="expertise-tab">
                <h3 class="mb-4"><?php echo e(__('profile.expiretise')); ?></h3>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <!-- <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-expertise" data-toggle="modal">Add Expertise</a> -->
                            <button type="button" class="btn btn-primary btn-menu1 btn-icon-text btn-sm mb-3" data-toggle="modal" data-target="#crud-modal">
                                <i class="mdi mdi-plus btn-icon-prepend"></i><?php echo e(__('profile.add_expiretise')); ?>

                        </div>
                    </div>
                </div>
                <br />
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p id="msg"><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>


                <table class="table table-striped table-hover">
                    <tr>
                        <th colspan="2"><?php echo e(__('profile.expiretise')); ?></th>

                    </tr>
                    <?php $__currentLoopData = Auth::user()->expertise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="expert_id_<?php echo e($expert->id); ?>">
                        <td><?php echo e($expert->expert_name); ?></td>
                        <td width="180px">
                            <form action="<?php echo e(route('experts.destroy',$expert->id)); ?>" method="POST">
                                <!-- ปุ่ม Edit -->
                                <li class="list-inline-item">
                                    <button class="btn btn-outline-success btn-sm"
                                        href="javascript:void(0)"
                                        id="edit-expertise"
                                        type="button"
                                        data-toggle="modal"
                                        data-placement="top"
                                        data-id="<?php echo e($expert->id); ?>"
                                        title="<?php echo e(trans('profile.edit_tooltip')); ?>">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                </li>

                                <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

                                <!-- ปุ่ม Delete -->
                                <li class="list-inline-item">
                                    <button id="delete-expertise"
                                        data-id="<?php echo e($expert->id); ?>"
                                        class="btn btn-outline-danger btn-sm"
                                        type="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="<?php echo e(trans('profile.delete_tooltip')); ?>">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </li>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>
            </div>

            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="expertiseCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="expForm" action="<?php echo e(route('experts.store')); ?>" method="POST">
                    <input type="hidden" name="exp_id" id="exp_id">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><?php echo e(__('profile.name')); ?>:</strong>
                                <input type="text" name="expert_name" id="expert_name" class="form-control" placeholder="Expert_name" onchange="validate()">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled><?php echo e(__('profile.submit')); ?></button>
                            <!-- <a  href="<?php echo e(URL::previous()); ?>"class="btn btn-danger">Cancel</a>-->
                            <button class="btn btn-danger" id="btnCancel" data-dismiss="modal"><?php echo e(__('profile.cancel')); ?></button>
                            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<!-- <script src="alert/dist/sweetalert-dev.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->


<script>
    $(document).ready(function() {
        var $optgroups = $('#subcategory > optgroup');

        $("#category").on("change", function() {
            var selectedVal = this.value;

            $('#subcategory').html($optgroups.filter('[id="' + selectedVal + '"]'));
        });
    });
</script>

<script>
    $(function() {
        /* UPDATE ADMIN
               PERSONAL INFO */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ฟังก์ชันแสดง SweetAlert เพื่อยืนยันการอัปเดตข้อมูล
        showSwal = function(type) {
            swal({
                    title: "<?php echo e(trans('profile.are_you_sure_update_info')); ?>",
                    text: "<?php echo e(trans('profile.are_you_sure_to_proceed')); ?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#82ce34",
                    confirmButtonText: "<?php echo e(trans('profile.update_my_info')); ?>",
                    cancelButtonText: "<?php echo e(trans('profile.i_am_not_sure')); ?>",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal("<?php echo e(trans('profile.update_info')); ?>", "<?php echo e(trans('profile.account_updated')); ?>", "success");
                    } else {
                        swal("<?php echo e(trans('profile.cancel')); ?>", "<?php echo e(trans('profile.account_not_updated')); ?>", "error");
                    }
                });
        }



        $('#AdminInfoForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(document).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.status == 0) {
                    $.each(data.error, function(prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $('.admin_name').each(function() {
                        $(this).html($('#AdminInfoForm').find($('input[name="name"]')).val());
                    });
                    console.log(data.msg);
                    swal({
                        title: "<?php echo e(trans('profile.update_info1')); ?>",
                        text: "<?php echo e(trans('profile.account_updated1')); ?>",
                        icon: "success",
                        buttons: {
                            confirm: "<?php echo e(trans('profile.ok')); ?>"
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "<?php echo e(trans('profile.error_occurred')); ?>",
                    text: "<?php echo e(trans('profile.update_failed')); ?>",
                    icon: "error",
                    buttons: {
                        confirm: "<?php echo e(trans('profile.ok')); ?>"
                    }
                });
            }
        });
    });
         // $('#AdminInfoForm').on('submit', function(e) {

        //     e.preventDefault();
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         method: $(this).attr('method'),
        //         data: new FormData(this),
        //         processData: false,
        //         dataType: 'json',
        //         contentType: false,

        //         beforeSend: function() {
        //             $(document).find('span.error-text').text('');
        //         },
        //         success: function(data) {
        //             if (data.status == 0) {
        //                 $.each(data.error, function(prefix, val) {
        //                     $('span.' + prefix +
        //                         '_error').text(val[0]);
        //                 });
        //             } else {
        //                 $('.admin_name').each(function() {
        //                     $(this).html($('#AdminInfoForm').find($(
        //                         'input[name="name"]')).val());
        //                 });

        //                 swal("Update Info", "Your account is updated!", "success");
        //             }
        //         }
        //     });
        // });
        $('#EdInfoForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('.admin_name').each(function() {
                            $(this).html($('#EdInfoForm').find($('input[name="name"]')).val());
                        });
                        console.log(data.msg);
                        swal("<?php echo e(trans('profile.update_info')); ?>", "<?php echo e(trans('profile.account_updated')); ?>", "success");swal({
    title: "<?php echo e(trans('profile.update_info1')); ?>",
    text: "<?php echo e(trans('profile.account_updated1')); ?>",
    type: "success",
    confirmButtonColor: "#82ce34",
    confirmButtonText: "<?php echo e(trans('profile.ok_button')); ?>", // แก้ปุ่ม OK ตรงนี้
    showCancelButton: false,
    closeOnConfirm: true
});
                    }
                }
            });
        });

        $(document).on('click', '#change_picture_btn', function() {
            $('#admin_image').click();
        });

        $('#admin_image').ijaboCropTool({
            preview: '.admin_picture',
            setRatio: 2 / 3,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '<?php echo e(route("adminPictureUpdate")); ?>',
            withCSRF: ['_token', '<?php echo e(csrf_token()); ?>'],
            onSuccess: function(message, element, status) {
                swal("<?php echo e(trans('profile.update_profile_picture')); ?>", "<?php echo e(trans('profile.account_updated')); ?>", "success");
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });

        $('#changePasswordAdminForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#changePasswordAdminForm')[0].reset();
                        swal("<?php echo e(trans('profile.update_password')); ?>", "<?php echo e(trans('profile.password_updated')); ?>", "success");
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

        /* When click New expertise button */
        $('#new-expertise').click(function() {
            $('#btn-save').val("create-expertise");
            $('#expertise').trigger("reset");
            $('#expertiseCrudModal').html("Add New Expertise");
            $('#crud-modal').modal('show');

        });

        /* Edit expertise */
        $('body').on('click', '#edit-expertise', function() {
            var expert_id = $(this).data('id');
            $.get('experts/' + expert_id + '/edit', function(data) {

                $('#expertiseCrudModal').html("<?php echo e(trans('profile.edit_modal_title')); ?>");


                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#exp_id').val(data.id);
                $('#expert_name').val(data.expert_name);

                //$('#v-pills-tabContent.a.active').removeClass("active");

                //$('li.list-group-item.active').removeClass("active");
                //$(this).addClass("active");

                //swal("Update Profile Picture", "Your account is updated!", "success");
            })

        });


        /* Delete expertise */
        $('body').on('click', '#delete-expertise', function(e) {
            e.preventDefault();
            var expertId = $(this).data("id"); // ใช้ expertId แทน expert_id
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "<?php echo e(trans('profile.are_you_sure')); ?>",
                text: "<?php echo e(trans('profile.if_delete_gone')); ?>",
                type: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("<?php echo e(trans('profile.delete_success')); ?>", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        $.ajax({
                            type: "DELETE",
                            url: "experts/" + expertId,
                            data: {
                                "id": expertId,
                                "_token": token,
                            },
                            success: function() {
                                $("#expert_id_" + expertId).remove();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("<?php echo e(trans('profile.error_deleting')); ?>", "<?php echo e(trans('profile.try_again')); ?>", "error");
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
        if (document.expForm.expert_name.value != '')
            document.expForm.btnsave.disabled = false
        else
            document.expForm.btnsave.disabled = true
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/dashboards/users/profile.blade.php ENDPATH**/ ?>