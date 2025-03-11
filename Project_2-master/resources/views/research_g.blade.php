@extends('layouts.layout')
@section('content')
<div class="container card-3 ">
    <p>{{ trans('books.research_group') }}</p>
    @foreach ($resg as $rg)
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{ asset('img/'.$rg->group_image) }}" alt="...">
                    <h2 class="card-text-1">{{ trans('books.laboratory_supervisor') }}</h2>
                    
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
                            {{ Str::limit($rg->groups_desc_cn ?? $rg->group_desc_en, 350) }}
                        @elseif(app()->getLocale() == 'th')
                            {{ Str::limit($rg->group_desc_th ?? $rg->group_desc_en, 350) }}
                        @else
                            {{ Str::limit($rg->group_desc_en, 350) }}
                        @endif
                    </h3>
                </div>
                <div>
                    <a href="{{ route('researchgroupdetail',['id'=>$rg->id])}}" class="btn btn-outline-info">
                        {{ trans('books.details') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop
