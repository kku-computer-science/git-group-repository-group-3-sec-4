@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('patents.detail_title') }}</h4>
            <p class="card-description">{{ trans('patents.detail_description') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.name') }}</b></p>
                <p class="card-text col-sm-9">{{ $patent->ac_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.type') }}</b></p>
                <p class="card-text col-sm-9">{{ $patent->ac_type }}</p>
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
                        {{ $a->fname_th }} {{ $a->lname_th }}@if (!$loop->last),@endif
                    @endforeach
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('patents.co_creator') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($patent->author as $a)
                        {{ $a->author_fname }} {{ $a->author_lname }}@if (!$loop->last),@endif
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
