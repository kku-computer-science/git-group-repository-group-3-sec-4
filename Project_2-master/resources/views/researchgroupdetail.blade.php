@extends('layouts.layout')

<style>
    .name {
        font-size: 20px;
    }
</style>

@section('content')
<div class="container card-4 mt-5">
    <div class="card">
        @foreach ($resgd as $rg)
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{ asset('img/'.$rg->group_image) }}" alt="...">
                    <h1 class="card-text-1">{{ trans('books.laboratory_supervisor') }}</h1>
                    
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                        @if($r->hasRole('teacher'))
                            @if(app()->getLocale() == 'zh')
                                @if(empty($r->fname_zh) || $r->fname_zh == '-' || empty($r->lname_zh) || $r->lname_zh == '-')
                                    {{ $r->position_en }} {{ $r->fname_en }} {{ $r->lname_en }}
                                @else
                                    {{ $r->position_zh }} {{ $r->fname_zh }} {{ $r->lname_zh }}
                                @endif
                            @elseif(app()->getLocale() == 'th')
                                {{ $r->position_th }} {{ $r->fname_th }} {{ $r->lname_th }}
                            @else
                                {{ $r->position_en }} {{ $r->fname_en }} {{ $r->lname_en }}
                            @endif
                            <br>
                        @endif
                        @endforeach
                    </h2>

                    <h1 class="card-text-1">{{ trans('books.student') }}</h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $user)
                        @if($user->hasRole('student'))
                            {{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}
                            <br>
                        @endif
                        @endforeach
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        @if(app()->getLocale() == 'zh')
                            {{ $rg->groups_name_cn ?? $rg->group_name_en }}
                        @elseif(app()->getLocale() == 'th')
                            {{ $rg->group_name_th ?? $rg->group_name_en }}
                        @else
                            {{ $rg->group_name_en }}
                        @endif
                    </h5>
                    <h3 class="card-text">
                        @if(app()->getLocale() == 'zh')
                            {{ $rg->groups_desc_cn ?? $rg->group_desc_en }}
                        @elseif(app()->getLocale() == 'th')
                            {{ $rg->group_desc_th ?? $rg->group_desc_en }}
                        @else
                            {{ $rg->group_desc_en }}
                        @endif
                    </h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
