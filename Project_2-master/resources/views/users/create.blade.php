@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ __('users.oops') }}</strong> {{ __('users.error_msg') }}<br><br>
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
                    <h4 class="card-title mb-5">{{ __('users.add_user') }}</h4>
                    <p class="card-description">{{ __('users.enter_details') }}</p>
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ __('users.fname_th') }}</b></p>
                            {!! Form::text('fname_th', null, array('placeholder' => __('users.fname_th'),'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ __('users.lname_th') }}</b></p>
                            {!! Form::text('lname_th', null, array('placeholder' => __('users.lname_th'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ __('users.fname_en') }}</b></p>
                            {!! Form::text('fname_en', null, array('placeholder' => __('users.fname_en'),'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ __('users.lname_en') }}</b></p>
                            {!! Form::text('lname_en', null, array('placeholder' => __('users.lname_en'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <p><b>{{ __('users.email') }}</b></p>
                            {!! Form::text('email', null, array('placeholder' => __('users.email'),'class' => 'form-control'))!!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ __('users.password') }}</b></p>
                            {!! Form::password('password', array('placeholder' => __('users.password'),'class' => 'form-control'))!!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ __('users.confirm_password') }}</b></p>
                            {!! Form::password('password_confirmation', array('placeholder' => __('users.confirm_password'),'class' =>'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-8">
                        <p><b>{{ __('users.role') }}</b></p>
                        <div class="col-sm-8">
                            @php
                            // สร้างอาเรย์ใหม่สำหรับ roles ที่แปลภาษา
                            $localizedRoles = [];
                            foreach ($roles as $k => $v) {
                            // สมมติ $roles = ['admin' => 'admin', 'headproject' => 'headproject', ...]
                            // $k = 'admin', $v = 'admin'
                            // ให้ key = 'admin' เหมือนเดิม, แต่ value = trans('users.role_admin') (ถ้า $v == 'admin')
                            $localizedRoles[$k] = trans('users.role_'.$v);
                            }
                            @endphp

                            {!! Form::select('roles[]', $localizedRoles, [], [
                            'class' => 'selectpicker',
                            'multiple',
                            'data-none-selected-text' => trans('users.nothing_selected')
                            ]) !!}

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>{{ __('users.department') }} <span class="text-danger">*</span></h6>
                                <select class="form-control" name="cat" id="cat" style="width: 100%;" required>
                                    <option>{{ __('users.select_category') }}</option>
                                    @foreach ($departments as $cat)
                                    <option value="{{$cat->id}}">{{ $cat->department_name_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h6>{{ __('users.program') }} <span class="text-danger">*</span></h6>
                                <select class="form-control select2" name="sub_cat" id="subcat" required>
                                    <option value="">{{ __('users.select_subcategory') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('users.submit') }}</button>
                    <a class="btn btn-secondary" href="{{ route('users.index') }}">{{ __('users.cancel') }}</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script>
    // ส่วนนี้คือโค้ดเดิมที่ใช้ดึงข้อมูล sub_cat
    $('#cat').on('change', function(e) {
        var cat_id = e.target.value;
        $.get('/ajax-get-subcat?cat_id=' + cat_id, function(data) {
            $('#subcat').empty();
            $.each(data, function(index, areaObj) {
                $('#subcat').append('<option value="' + areaObj.id + '">' + areaObj.degree.title_en + ' in ' + areaObj.program_name_en + '</option>');
            });
        });
    });

    // เพิ่มโค้ดด้านล่างเพื่อ override HTML5 Validation message

    document.addEventListener('DOMContentLoaded', function() {
        // 1) สำหรับ select id="cat"
        var catElem = document.getElementById('cat');
        catElem.oninvalid = function(e) {
            e.target.setCustomValidity("{{ trans('users.select_cat_error') }}");
        };
        catElem.oninput = function(e) {
            e.target.setCustomValidity('');
        };

        // 2) สำหรับ select id="subcat"
        var subcatElem = document.getElementById('subcat');
        subcatElem.oninvalid = function(e) {
            e.target.setCustomValidity("{{ trans('users.select_subcat_error') }}");
        };
        subcatElem.oninput = function(e) {
            e.target.setCustomValidity('');
        };
    });
</script>

@endsection