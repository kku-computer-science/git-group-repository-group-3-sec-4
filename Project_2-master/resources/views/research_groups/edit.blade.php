@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('researchGroups.whoops') }}</strong> {{ __('researchGroups.input_problem') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('researchGroups.edit_group') }}</h4>
            <p class="card-description">{{ __('researchGroups.enter_details') }}</p>
            <form action="{{ route('researchGroups.update',$researchGroup->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_name_th') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="{{ $researchGroup->group_name_th }}" class="form-control" placeholder="{{ __('researchGroups.group_name_th') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_name_en') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="{{ $researchGroup->group_name_en }}" class="form-control" placeholder="{{ __('researchGroups.group_name_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_desc_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" class="form-control" style="height:90px">{{ $researchGroup->group_desc_th }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_desc_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" class="form-control" style="height:90px">{{ $researchGroup->group_desc_en }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_detail_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_th" class="form-control" style="height:90px">{{ $researchGroup->group_detail_th }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_detail_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" class="form-control" style="height:90px">{{ $researchGroup->group_detail_en }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.image') }}</b></p>
                    <div class="col-sm-8">
                        <input type="file" name="group_image" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ __('researchGroups.group_head') }}</b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            @foreach($researchGroup->user as $u)
                            @if($u->pivot->role == 1)
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" @if($u->id == $user->id) selected @endif>{{ $user->fname_th }} {{ $user->lname_th }}</option>
                            @endforeach
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b>{{ __('researchGroups.group_members') }}</b></p>
                    <div class="col-sm-8">
                        <table class="table" id="dynamicAddRemove">
                            <tr>
                                <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">{{ __('researchGroups.submit') }}</button>
                <a class="btn btn-light mt-5" href="{{ route('researchGroups.index') }}">{{ __('researchGroups.back') }}</a>
            </form>
        </div>
    </div>
</div>
@stop
