@extends('dashboards.users.layouts.user-dash-layout')
<!-- <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
@section('content')

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
@if ($errors->any())
<div class="alert alert-danger">
    <strong>{{ trans('researchProjects.whoops') }}</strong> {{ trans('researchProjects.input_problem') }}<br><br>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
    </ul>
</div>
@endif
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ __('researchProjects.add_project') }}</h4>
                <p class="card-description">{{ __('researchProjects.enter_details') }}</p>
                <form action="{{ route('researchProjects.store') }}" method="POST">
                    @csrf
                    <div class="form-group row mt-5">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ __('researchProjects.project_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="project_name" class="form-control" placeholder="{{ __('researchProjects.project_name') }}" value="{{ old('project_name') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ __('researchProjects.start_date') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="project_start" id="Project_start" class="form-control" value="{{ old('project_start') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ __('researchProjects.end_date') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="project_end" id="Project_end" class="form-control" value="{{ old('project_end') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{ __('researchProjects.choose_scholarship') }}</label>
                        <div class="col-sm-4">
                            <select id='fund' style='width: 200px;' class="custom-select my-select" name="fund">
                                <option value='' disabled selected>{{ __('researchProjects.choose_scholarship') }}</option>@foreach($funds as $fund)<option value="{{ $fund->id }}">{{ $fund->fund_name }}</option>@endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputproject_year" class="col-sm-2 ">{{ __('researchProjects.year_submission') }}</label>
                        <div class="col-sm-4">
                            <input type="year" name="project_year" class="form-control" placeholder="{{ __('researchProjects.year') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ __('researchProjects.budget') }}</label>
                        <div class="col-sm-4">
                            <input type="int" name="budget" class="form-control" placeholder="{{ __('researchProjects.Baht') }}" value="{{ old('budget') }}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputresponsible_department" class="col-sm-2 ">{{ __('researchProjects.responsible_agency') }}</label>
                        <div class="col-sm-9">
                            <select id='dep' style='width: 200px;' class="custom-select my-select" name="responsible_department">
                            <option value='' disabled selected>{{ __('researchProjects.Choose_study') }}</option>
                            @foreach($deps as $dep)
                                <option value="{{ app()->getLocale() == 'zh' ? $dep->department_name_cn : (app()->getLocale() == 'th' ? $dep->department_name_th : $dep->department_name_en) }}">
                                    {{ app()->getLocale() == 'zh' ? ($dep->department_name_cn ?? $dep->department_name_en) : (app()->getLocale() == 'th' ? ($dep->department_name_th ?? $dep->department_name_en) : $dep->department_name_en) }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{ __('researchProjects.project_details') }}</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="note" class="form-control form-control-lg" style="height:150px" placeholder="{{ trans('researchProjects.researchProject.note') }}" value="{{ old('note') }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputstatus" class="col-sm-2 ">{{ __('researchProjects.status') }}</label>
                        <div class="col-sm-3">
                            <select id='status' class="custom-select my-select" name="status">
                                <option value="" disabled selected>{{ trans('researchProjects.researchProjects.operating_status') }}</option>
                                <option value="1">{{ __('researchProjects.apply_for') }}</option>
                                <option value="2">{{ __('researchProjects.carry_out') }}</option>
                                <option value="3">{{ __('researchProjects.close_project') }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="exampleInputstatus" class="col-sm-2 ">สถานะ</label>
                        <div class="col-sm-8">
                            <select name="status" class="form-control" id="status">
                                <option value="1">ยื่นขอ</option>
                                <option value="2">ดำเนินการ</option>
                                <option value="3">ปิดโครงการ</option>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{ __('researchProjects.person') }}</label>
                        <div class="col-sm-9">
                            <select id='head0' style='width: 200px;' name="head">
                                <option value=''>{{ __('researchProjects.select_user_option') }}</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 ">{{ __('researchProjects.internal_project') }}</label>
                        <div class="col-sm-9">
                            <table class="table" id="dynamicAddRemove">
                                <tr>
                                    <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                                </tr>
                                <tr>
                                    <!-- <td><input type="text" name="moreFields[0][Budget]" placeholder="Enter title" class="form-control" /></td> -->
                                    <td><select id='selUser0' style='width: 200px;' name="moreFields[0][userid]">
                                            <option value=''>{{ __('researchProjects.Select User') }}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                                            @endforeach
                                        </select></td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="form-group row mt-2">
                        <label for="exampleInputpaper_doi" class="col-sm-2 ">ผู้รับผิดชอบโครงการ (ร่วม) ภายนอก</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered w-75" id="dynamic_field">
                                    <tr>
                                        <td>
                                            <p>ตำแหน่งหรือคำนำหน้า :</p><input type="text" name="title_name[]" placeholder="ตำแหน่งหรือคำนำหน้า" style='width: 200px;' class="form-control name_list" /><br>
                                            <p>ชื่อ :</p><input type="text" name="fname[]" placeholder="ชื่อ" style='width: 300px;' class="form-control name_list" /><br>
                                            <p>นามสกุล :</p><input type="text" name="lname[]" placeholder="นามสกุล" style='width: 300px;' class="form-control name_list" />
                                        </td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row mt-2">
                        <label for="exampleInputpaper_doi" class="col-sm-2 ">{{ __('researchProjects.external') }}</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th>{{ __('researchProjects.position_prefix') }}</th>
                                        <th>{{ __('researchProjects.fname') }}</th>
                                        <th>{{ __('researchProjects.lname') }}</th>
                                        <!-- <th>Email Id</th> -->
                                        <!-- <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button> -->
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore2" title="Add More Person"><i class="mdi mdi-plus"></i></span></a></th>
                                    <tr>
                                        <td><input type="text" name="title_name[]" class="form-control" placeholder="{{ __('researchProjects.position_prefix') }}"></td>
                                        <td><input type="text" name="fname[]" class="form-control" placeholder="{{ __('researchProjects.fname') }}"></td>
                                        <td><input type="text" name="lname[]" class="form-control" placeholder="{{ __('researchProjects.lname') }}"></td>
                                        <!-- <td><input type="text" name="emailid[]" class="form-control"></td> -->
                                        <td><a href='javascript:void(0);' class='remove'><span><i class="mdi mdi-minus"></span></a></td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-2">{{ __('researchProjects.submit') }}</button>
                        <a class="btn btn-light" href="{{ route('researchProjects.index')}}">{{ __('researchProjects.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @stop
    @section('javascript')
    <script>
        $(document).ready(function() {
            $("#selUser0").select2()
            $("#head0").select2()
            //$("#fund").select2()
            //$("#dep").select2()
            var i = 0;

            $("#add-btn2").click(function() {

                ++i;
                $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i +
                    '" name="moreFields[' + i +
                    '][userid]"  style="width: 200px;"><option value="">Select User</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
                );
                $("#selUser" + i).select2()
            });
            $(document).on('click', '.remove-tr', function() {
                $(this).parents('tr').remove();
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var postURL = "<?php echo url('addmore'); ?>";
            var i = 0;


            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><p>ตำแหน่งหรือคำนำหน้า :</p><input type="text" name="title_name[]" placeholder="ตำแหน่งหรือคำนำหน้า" style="width: 200px;" class="form-control name_list" /><br><p>ชื่อ :</p><input type="text" name="fname[]" placeholder="ชื่อ" style="width: 300px;" class="form-control name_list" /><br><p>นามสกุล :</p><input type="text" name="lname[]" placeholder="นามสกุล" style="width: 300px;" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn-sm btn_remove"><i class="mdi mdi-minus"></i></button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function() {
                $.ajax({
                    url: postURL,
                    method: "POST",
                    data: $('#add_name').serialize(),
                    type: 'json',
                    success: function(data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display', 'block');
                            $(".print-error-msg").css('display', 'none');
                            $(".print-success-msg").find("ul").append(
                                '<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $(".print-success-msg").css('display', 'none');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addMore2').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                data.find("input").val('');
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if (trIndex > 1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("{{ __('researchProjects.cannot_remove_first_row') }}");

                }
            });
        });
    </script>
    @stop