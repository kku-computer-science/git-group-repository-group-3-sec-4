@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('patents.detail_title') }}</h4>
            <p class="card-description">{{ trans('patents.detail_description') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.name') }}</b></p>
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'zh')
                        {{ Str::limit($patent->ac_name_cn ?? $patent->ac_name_en, 50) }}
                    @elseif(app()->getLocale() == 'en')
                        {{ Str::limit($patent->ac_name_en, 50) }}
                    @else
                        {{ Str::limit($patent->ac_name_th ?? $patent->ac_name_en, 50) }}
                    @endif
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.type') }}</b></p>
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'zh')
                        {{ $patent->ac_type_cn ?? $patent->ac_type_en }}
                    @elseif(app()->getLocale() == 'en')
                        {{ $patent->ac_type_en }}
                    @else
                        {{ $patent->ac_type_th ?? $patent->ac_type_en }}
                    @endif
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.registration_date') }}</b></p>
                <p class="card-text col-sm-9">{{ $patent->ac_year }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.registration_number') }}</b></p>
                <p class="card-text col-sm-9">{{ trans('patents.registration_prefix') }} {{ $patent->ac_refnumber }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.creator') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($patent->user as $a)
                        @if(app()->getLocale() == 'zh')
                            {{ $a->fname_zh ?? $a->fname_en }} {{ $a->lname_zh ?? $a->lname_en }}
                        @elseif(app()->getLocale() == 'en')
                            {{ $a->fname_en }} {{ $a->lname_en }}
                        @else
                            {{ $a->fname_th }} {{ $a->lname_th }}
                        @endif
                        @if (!$loop->last),@endif
                    @endforeach
                </p>
            </div>

            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.co_creator') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($patent->author as $a)
                        @if(app()->getLocale() == 'zh')
                            {{ $a->author_fname_zh ?? $a->author_fname }} {{ $a->author_lname_zh ?? $a->author_lname }}
                        @elseif(app()->getLocale() == 'en')
                            {{ $a->author_fname_en ?? $a->author_fname }} {{ $a->author_lname_en ?? $a->author_lname }}
                        @else
                            {{ $a->author_fname ?? $a->author_fname }} {{ $a->author_lname ?? $a->author_lname }}
                        @endif
                        @if (!$loop->last),@endif
                    @endforeach
                </p>
            </div>
            
            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('patents.index') }}">{{ trans('patents.back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
