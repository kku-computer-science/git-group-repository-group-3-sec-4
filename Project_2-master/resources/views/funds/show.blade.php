@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('funds.fund_detail') }}</h4>
            <p class="card-description">{{ __('funds.fund_info') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.fund_name') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.fund_year') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_year }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.fund_details') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_details }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.fund_type') }}</b></p>
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'zh')
                        {{ $fund->fund_type_cn ?? $fund->fund_type_th }}
                    @elseif(app()->getLocale() == 'en')
                        {{ $fund->fund_type_en ?? $fund->fund_type_th }}
                    @else
                        {{ $fund->fund_type_th }}
                    @endif
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.fund_level') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_level }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.agency') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('funds.added_by') }}</b></p>
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'zh')
                        {{ ($fund->user->fname_zh && $fund->user->lname_zh && $fund->user->fname_zh != '-' && $fund->user->lname_zh != '-') 
                            ? $fund->user->fname_zh . ' ' . $fund->user->lname_zh 
                            : $fund->user->fname_en . ' ' . $fund->user->lname_en }}
                    @elseif(app()->getLocale() == 'en')
                        {{ ($fund->user->fname_en && $fund->user->lname_en) 
                            ? $fund->user->fname_en . ' ' . $fund->user->lname_en 
                            : $fund->user->fname_en . ' ' . $fund->user->lname_en }}
                    @else
                        {{ $fund->user->fname_th }} {{ $fund->user->lname_th }}
                    @endif
                </p>
            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('funds.index') }}"> {{ __('funds.back') }}</a>
            </div>
        </div>

    </div>


</div>
@endsection