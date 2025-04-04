@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<style type="text/css">
    .dropdown-toggle .filter-option {
        height: 40px;
        width: 400px !important;
        color: #212529;
        background-color: #fff;
        border-width: 0.2;
        border-style: solid;
        border-radius: 5px;
        padding: 4px 10px;
    }

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
        <strong>{{ __('papers.whoops') }}</strong> {{ __('papers.input_problem') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col-md-10 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ __('papers.edit_paper') }}</h4>
                <p class="card-description">{{ __('papers.enter_paper_details') }}</p>

                <form class="forms-sample" action="{{ route('papers.update',$paper->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>{{ __('papers.source') }}</b></label>
                        <div class="col-sm-9">
                            {!! Form::select('sources[]', $sources, $paperSource, array('class' => 'selectpicker','multiple data-live-search'=>"true")) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>{{ __('papers.paper_name') }}</b></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name" value="{{ $paper->paper_name }}" class="form-control" placeholder="{{ __('papers.paper_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>{{ __('papers.abstract') }}</b></label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract" placeholder="{{ __('papers.abstract') }}" class="form-control form-control-lg" style="height:150px">{{ $paper->abstract }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>{{ __('papers.keyword') }}</b></label>
                        <div class="col-sm-9">
                            <input type="text" name="keyword" value="{{ $paper->keyword }}" class="form-control" placeholder="{{ __('papers.keyword') }}">
                            <p class="text-danger">{{ __('papers.keyword_note') }}</p>
                        </div>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2">{{ __('papers.submit') }}</button>
                    <a class="btn btn-light" href="{{ route('papers.index') }}">{{ __('papers.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
