@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>{{ __('roles.opps') }}</strong> {{ __('roles.error_check') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">{{ __('roles.create_role') }}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">{{ __('roles.roles') }}</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>{{ __('roles.name') }}:</strong>
                        {!! Form::text('name', null, array('placeholder' => __('roles.name'),'class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        <strong>{{ __('roles.permission') }}:</strong>
                        <br/>
                        @foreach($permission as $value)
                        <label>
                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            
                            @if(app()->getLocale() == 'zh')
                                {{ $value->name_cn ?? $value->name_en }}
                            @elseif(app()->getLocale() == 'th')
                                {{ $value->name_th ?? $value->name_en }}
                            @else
                                {{ $value->name_en }}
                            @endif
                        </label>
                        <br/>
                    @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('roles.submit') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
