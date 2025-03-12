@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('books.Book Detail') }}</h4>
            <p class="card-description">{{ trans('books.Book details information') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('books.Book name') }}</b></p>
                <p class="card-text col-sm-9">                                
                    @if(app()->getLocale() == 'th')
                        {{ Str::limit($paper->ac_name ?? $paper->ac_name_en, 50) }}
                    @elseif(app()->getLocale() == 'zh')
                        {{ Str::limit($paper->ac_name_zh ?? $paper->ac_name_en, 50) }}
                    @else
                        {{ Str::limit($paper->ac_name_en, 50) }}
                    @endif</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('books.Year') }}</b></p>
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'th')
                        {{ date('Y', strtotime($paper->ac_year)) + 543 }}
                    @else
                        {{ date('Y', strtotime($paper->ac_year)) }}
                    @endif
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('books.Publication source') }}</b></p>
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'zh')
                        {{ Str::limit($paper->ac_sourcetitle_cn ?? $paper->ac_sourcetitle_en, 50) }}
                    @elseif(app()->getLocale() == 'en')
                        {{ Str::limit($paper->ac_sourcetitle_en, 50) }}
                    @else
                        {{ Str::limit($paper->ac_sourcetitle ?? $paper->ac_sourcetitle_en, 50) }}
                    @endif
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('books.Page') }}</b></p>
                <p class="card-text col-sm-9">{{ $paper->ac_page }}</p>
            </div>

            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('books.index') }}">{{ trans('books.Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
