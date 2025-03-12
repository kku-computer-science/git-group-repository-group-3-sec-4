@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('researchProjects.research_projects_detail') }}</h4>
            <p class="card-description">{{ __('researchProjects.project_info') }}</p>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.project_name') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->project_name }}</p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.start_date') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->project_start }}</p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.end_date') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->project_end }}</p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.funder') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->fund->fund_name }}</p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.budget') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->budget }}</p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.project_details') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->note }}</p>
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.status') }}</b></p>
                @if($researchProject->status == 1)
                <p class="card-text col-sm-9">{{ __('researchProjects.apply_for') }}</p>
                @elseif($researchProject->status == 2)
                <p class="card-text col-sm-9">{{ __('researchProjects.carry_out') }}</p>
                @else
                <p class="card-text col-sm-9">{{ __('researchProjects.close_project') }}</p>
                @endif
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.head') }}</b></p>
                @foreach($researchProject->user as $user)
                @if ( $user->pivot->role == 1)
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'th')
                        {{ $user->position_th ?? $user->position_en }} {{ $user->fname_th ?? $user->fname_en }} {{ $user->lname_th ?? $user->lname_en }}
                    @elseif(app()->getLocale() == 'zh')
                        {{ $user->position_zh ?? $user->position_en }} {{ $user->fname_zh ?? $user->fname_en }} {{ $user->lname_zh ?? $user->lname_en }}
                    @else
                        {{ $user->position_en }} {{ $user->fname_en }} {{ $user->lname_en }}
                    @endif
                </p>
                @endif
                @endforeach
            </div>
            
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('researchProjects.members') }}</b></p>
                @foreach($researchProject->user as $user)
                @if ( $user->pivot->role == 2)
                <p class="card-text col-sm-9">
                    @if(app()->getLocale() == 'th')
                        {{ $user->position_th ?? $user->position_en }} {{ $user->fname_th ?? $user->fname_en }} {{ $user->lname_th ?? $user->lname_en }}
                    @elseif(app()->getLocale() == 'zh')
                        {{ $user->position_zh ?? $user->position_en }} {{ $user->fname_zh ?? $user->fname_en }} {{ $user->lname_zh ?? $user->lname_en }}
                    @else
                        {{ $user->position_en }} {{ $user->fname_en }} {{ $user->lname_en }}
                    @endif
                </p>
                @if (!$loop->last),@endif
                @endif
                @endforeach
                
                @foreach($researchProject->outsider as $user)
                @if ( $user->pivot->role == 2)
                , 
                {{ 
                    app()->getLocale() == 'th' ? ($user->title_name_th ?? $user->title_name_en) . ' ' . ($user->fname_th ?? $user->fname_en) . ' ' . ($user->lname_th ?? $user->lname_en) :
                    (app()->getLocale() == 'zh' ? ($user->title_name_zh ?? $user->title_name_en) . ' ' . ($user->fname_zh ?? $user->fname_en) . ' ' . ($user->lname_zh ?? $user->lname_en) :
                    ($user->title_name_en . ' ' . $user->fname_en . ' ' . $user->lname_en))
                }}
                @if (!$loop->last),@endif
                @endif
                @endforeach
            </div>
            
            <div class="pull-right mt-5">
                <a class="btn btn-primary" href="{{ route('researchProjects.index') }}">{{ __('researchProjects.back') }}</a>
            </div>

        </div>
    </div>
</div>
@endsection
