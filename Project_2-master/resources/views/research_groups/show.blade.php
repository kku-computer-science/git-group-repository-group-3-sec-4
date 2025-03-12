@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('researchGroups.group_details') }}</h4>
            <p class="card-description">{{ __('researchGroups.group_information') }}</p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_name_th') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_th }}</p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_name_en') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_en }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ __(key: 'researchGroups.group_desc_th') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_th }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_desc_en') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_en }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_detail_th') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_th }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_detail_en') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_en }}</p>
            </div>
            <!-- Group Head -->
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_head') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                        @if ($user->pivot->role == 1)
                            @if(app()->getLocale() == 'zh')
                                {{ $user->position_zh ?? $user->position_en ?? $user->position_th }}
                                {{ $user->fname_zh ?? $user->fname_en ?? $user->fname_th }}
                                {{ $user->lname_zh ?? $user->lname_en ?? $user->lname_th }}
                            @elseif(app()->getLocale() == 'en')
                                {{ $user->position_en ?? $user->position_th }}
                                {{ $user->fname_en ?? $user->fname_th }}
                                {{ $user->lname_en ?? $user->lname_th }}
                            @else
                                {{ $user->position_th }} {{ $user->fname_th }} {{ $user->lname_th }}
                            @endif
                        @endif
                    @endforeach
                </p>
            </div>

            <!-- Group Members -->
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>{{ __('researchGroups.group_members') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                        @if ($user->pivot->role == 2)
                            @if(app()->getLocale() == 'zh')
                                {{ $user->position_zh ?? $user->position_en ?? $user->position_th }}
                                {{ $user->fname_zh ?? $user->fname_en ?? $user->fname_th }}
                                {{ $user->lname_zh ?? $user->lname_en ?? $user->lname_th }}
                            @elseif(app()->getLocale() == 'en')
                                {{ $user->position_en ?? $user->position_th }}
                                {{ $user->fname_en ?? $user->fname_th }}
                                {{ $user->lname_en ?? $user->lname_th }}
                            @else
                                {{ $user->position_th }} {{ $user->fname_th }} {{ $user->lname_th }}
                            @endif
                            @if (!$loop->last), @endif
                        @endif
                    @endforeach
                </p>
            </div>
            <a class="btn btn-primary mt-5" href="{{ route('researchGroups.index') }}">{{ __('researchGroups.back') }}</a>
        </div>
    </div>
@stop
