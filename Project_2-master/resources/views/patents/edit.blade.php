@extends('dashboards.users.layouts.user-dash-layout') 
@section('content')
<style>
.my-select {
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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <!-- ส่วนนี้ว่างไว้ตามโค้ดเดิม -->
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('patents.whoops') }}</strong> {{ trans('patents.input_problem') }}<br><br>
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
                <h4 class="card-title">{{ trans('patents.edit_detail_title') }}</h4>
                <p class="card-description">{{ trans('patents.edit_detail_desc') }}</p>

                <form class="forms-sample" action="{{ route('patents.update',$patent->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3 col-form-label">
                            {{ trans('patents.ac_name_label') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" value="{{ $patent->ac_name }}" 
                                   class="form-control" 
                                   placeholder="{{ trans('patents.ac_name_placeholder') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_type" class="col-sm-3 col-form-label">
                            {{ trans('patents.ac_type_label') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_type" value="{{ $patent->ac_type }}" 
                                   class="form-control" 
                                   placeholder="{{ trans('patents.ac_type_placeholder') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3 col-form-label">
                            {{ trans('patents.ac_year_label') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="date" name="ac_year" value="{{ $patent->ac_year }}" 
                                   class="form-control" 
                                   placeholder="{{ trans('patents.ac_year_placeholder') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_refnumber" class="col-sm-3 col-form-label">
                            {{ trans('patents.ac_refnumber_label') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_refnumber" value="{{ $patent->ac_refnumber }}" 
                                   class="form-control" 
                                   placeholder="{{ trans('patents.ac_refnumber_placeholder') }}">
                        </div>
                    </div>

                    <!-- โค้ดคอมเมนต์เดิม: ไม่ลบออก -->
                    <!-- <div class="form-group row">
                        <label for="exampleInputac_author" class="col-sm-3 col-form-label">ชื่อผู้รับผิดชอบ</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td></td>
                                        
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            {{ trans('patents.faculty_label') }}
                        </label>
                        <div class="col-sm-9">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>
                                        <button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add">
                                            <i class="mdi mdi-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInput" class="col-sm-3 ">
                            {{ trans('patents.external_label') }}
                        </label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td>
                                            <button type="button" name="add" id="add" class="btn btn-success btn-sm">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2 mt-5">
                        {{ trans('patents.submit') }}
                    </button>
                    <a class="btn btn-light mt-5" href="{{ route('patents.index') }}">
                        {{ trans('patents.cancel') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    // ประกาศตัวแปรสำหรับข้อความที่ต้องการแปล
    var textSelectUser   = "{{ trans('patents.select_user_option') }}"; // "Select User"
    var textEnterName    = "{{ trans('patents.ac_name_placeholder') }}"; // "Enter your Name"

    $(document).ready(function() {
        // -------------- ส่วนอาจารย์ในสาขา (faculty) --------------
        var patent = <?php echo $patent->user; ?>;
        var i = 0;

        // วนลูป user ที่มีอยู่แล้ว
        for (i = 0; i < patent.length; i++) {
            var obj = patent[i];
            $("#dynamicAddRemove").append(
                '<tr>' +
                    '<td>' +
                        '<select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;">' +
                            // ใช้ textSelectUser แทน "Select User"
                            '<option value="">' + textSelectUser + '</option>' +
                            '@foreach($users as $user)' +
                                '<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>' +
                            '@endforeach' +
                        '</select>' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm remove-tr">' +
                            '<i class="mdi mdi-minus"></i>' +
                        '</button>' +
                    '</td>' +
                '</tr>'
            );
            // เซ็ต select ให้ตรงกับ id ที่ได้จากฐานข้อมูล
            document.getElementById("selUser" + i).value = obj.id;
            $("#selUser" + i).select2();
        }

        // เมื่อคลิกปุ่ม + เพื่อเพิ่มรายการอาจารย์
        $("#add-btn2").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr>' +
                    '<td>' +
                        '<select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;">' +
                            '<option value="">' + textSelectUser + '</option>' +
                            '@foreach($users as $user)' +
                                '<option value="{{ $user->id }}">{{ $user->fname_en }} {{ $user->lname_en }}</option>' +
                            '@endforeach' +
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

        // ลบแถว
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

        // -------------- ส่วนบุคคลภายนอก (external) --------------
        var patentAuthor = <?php echo $patent->author; ?>;
        var j = 0;

        for (j = 0; j < patentAuthor.length; j++) {
            var obj2 = patentAuthor[j];
            $("#dynamic_field").append(
                '<tr id="row' + j + '" class="dynamic-added">' +
                    '<td>' +
                        '<input type="text" name="fname[]" value="' + obj2.author_fname + '" ' +
                               'placeholder="' + textEnterName + '" class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="lname[]" value="' + obj2.author_lname + '" ' +
                               'placeholder="' + textEnterName + '" class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" name="remove" id="' + j + '" ' +
                                'class="btn btn-danger btn-sm btn_remove">X</button>' +
                    '</td>' +
                '</tr>'
            );
        }

        // เมื่อคลิกปุ่ม + เพื่อเพิ่มบุคคลภายนอก
        $('#add').click(function() {
            j++;
            $('#dynamic_field').append(
                '<tr id="row' + j + '" class="dynamic-added">' +
                    '<td>' +
                        '<input type="text" name="fname[]" placeholder="' + textEnterName + '" ' +
                               'class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="lname[]" placeholder="' + textEnterName + '" ' +
                               'class="form-control name_list" />' +
                    '</td>' +
                    '<td>' +
                        '<button type="button" name="remove" id="' + j + '" ' +
                                'class="btn btn-danger btn-sm btn_remove">X</button>' +
                    '</td>' +
                '</tr>'
            );
        });

        // ลบแถว
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id).remove();
        });

    });
</script>
@endsection