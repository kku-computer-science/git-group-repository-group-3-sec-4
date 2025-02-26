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
                        @if(app()->getLocale() == 'en' && $r->academic_ranks_en == 'Lecturer' && $r->doctoral_degree == 'Ph.D.')
                             {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                        @elseif(app()->getLocale() == 'en' && $r->academic_ranks_en == 'Lecturer')
                            {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                        @elseif(app()->getLocale() == 'en' && $r->doctoral_degree == 'Ph.D.')
                            {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                        @else                            
                            {{ $r->{'position_'.app()->getLocale()} }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                        @endif
                        <br>
                        @endif
                        @endforeach
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> {{ $rg->{'group_name_'.app()->getLocale()} }}</h5>
                    <h3 class="card-text">{{ Str::limit($rg->{'group_desc_'.app()->getLocale()}, 350) }}</h3>
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
