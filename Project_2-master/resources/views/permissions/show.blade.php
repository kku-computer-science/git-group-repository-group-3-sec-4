@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{ __('permissions.permission') }}
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('permissions.index') }}">{{ __('permissions.back') }}</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>{{ __('permissions.name') }}:</strong>
                    @if(app()->getLocale() == 'zh')
                                {{ $permission->name_cn ?? $permission->name }}
                            @elseif(app()->getLocale() == 'th')
                                {{ $permission->name_th ?? $permission->name }}
                            @else
                                {{ $permission->name }}
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
