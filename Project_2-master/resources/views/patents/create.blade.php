@extends('dashboards.users.layouts.user-dash-layout')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@section('content')
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }

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
        font-size: 14px;
    }
</style>
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('books.whoops') }}</strong> {{ trans('books.input_problem') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('books.add_academic_work') }}</h4>
                <p class="card-description">{{ trans('books.academic_work_desc') }}</p>
                <form class="forms-sample" action="{{ route('patents.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3">{{ trans('books.ac_name_label') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" class="form-control" placeholder="{{ trans('books.ac_name_placeholder') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_type" class="col-sm-3">{{ trans('books.type_label') }}</label>
                        <div class="col-sm-4">
                            <select id="category" class="custom-select my-select" name="ac_type">
                                <option value="" disabled selected>{{ trans('books.select_type_placeholder') }}</option>
                                <optgroup label="{{ trans('books.patent_group_label') }}">
                                    <option value="สิทธิบัตร">{{ trans('books.patent_option') }}</option>
                                    <option value="สิทธิบัตร (การประดิษฐ์)">{{ trans('books.invention_patent_option') }}</option>
                                    <option value="สิทธิบัตร (การออกแบบผลิตภัณฑ์)">{{ trans('books.design_patent_option') }}</option>
                                </optgroup>
                                <optgroup label="{{ trans('books.sub_patent_group_label') }}">
                                    <option value="อนุสิทธิบัตร">{{ trans('books.sub_patent_option') }}</option>
                                </optgroup>
                                <optgroup label="{{ trans('books.copyright_group_label') }}">
                                    <option value="ลิขสิทธิ์">{{ trans('books.copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (วรรณกรรม)">{{ trans('books.literature_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (ตนตรีกรรม)">{{ trans('books.music_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (ภาพยนตร์)">{{ trans('books.film_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (ศิลปกรรม)">{{ trans('books.art_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)">{{ trans('books.broadcast_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (โสตทัศนวัสดุ)">{{ trans('books.audiovisual_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)">{{ trans('books.other_copyright_option') }}</option>
                                    <option value="ลิขสิทธิ์ (สิ่งบันทึกเสียง)">{{ trans('books.sound_record_copyright_option') }}</option>
                                </optgroup>
                                <optgroup label="{{ trans('books.others_group_label') }}">
                                    <option value="ความลับทางการค้า">{{ trans('books.trade_secret_option') }}</option>
                                    <option value="เครื่องหมายการค้า">{{ trans('books.trademark_option') }}</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3">{{ trans('books.ac_year_label') }}</label>
                        <div class="col-sm-4">
                            <input type="date" name="ac_year" class="form-control" placeholder="{{ trans('books.ac_year_placeholder') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_refnumber" class="col-sm-3">{{ trans('books.ac_refnumber_label') }}</label>
                        <div class="col-sm-4">
                            <input type="text" name="ac_refnumber" class="form-control" placeholder="{{ trans('books.ac_refnumber_placeholder') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_doi" class="col-sm-3">{{ trans('books.faculty_label') }}</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="dynamicAddRemove">
                                    <tr>
                                        <td>
                                            <select id="selUser0" style="width: 200px;" name="moreFields[0][userid]">
                                                <option value="">{{ trans('books.select_user_option') }}</option>
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />-->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="exampleInput" class="col-sm-3 ">บุคลลภายนอก</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="fname[]" placeholder="Enter Author FName" class="form-control name_list" /></td>
                                        <td><input type="text" name="lname[]" placeholder="Enter Author LName" class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row ">
                        <label for="exampleInputpaper_doi" class="col-sm-3 ">{{ trans('books.external_person_label') }}</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th>{{ trans('books.first_name') }}</th>
                                        <th>{{ trans('books.last_name') }}</th>
                                        <!-- <th>Email Id</th> -->
                                            <!-- <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button> -->
                                        <th>
                                            <a href="javascript:void(0);" style="font-size:18px;" id="addMore2" title="{{ trans('books.add_more_person_title') }}">
                                                <i class="mdi mdi-plus"></i>
                                            </a>
                                        </th>
                                    <tr>
                                        <!--  -->
                                        <td><input type="text" name="fname[]" class="form-control" placeholder="{{ trans('books.first_name') }}"></td>
                                        <td><input type="text" name="lname[]" class="form-control" placeholder="{{ trans('books.last_name') }}"></td>
                                        <!-- <td><input type="text" name="emailid[]" class="form-control"></td> -->
                                        <td><a href='javascript:void(0);' class='remove'><span><i class="mdi mdi-minus"></i></span></a></td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2">{{ trans('books.submit') }}</button>
                    <a class="btn btn-light" href="{{ route('patents.index')}}">{{ trans('books.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#selUser0").select2()
        $("#head0").select2()

        var i = 0;

        $("#add-btn2").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;"><option value="">{{ trans("books.select_user_option") }}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">X</button></td></tr>'
            );
            $("#selUser" + i).select2()
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });
</script>
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
                alert("{{ trans('books.remove_first_row_error') }}");
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="text" name="fname[]" placeholder="{{ trans("books.enter_your_name") }}" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="{{ trans("books.enter_your_name") }}" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
@endsection
