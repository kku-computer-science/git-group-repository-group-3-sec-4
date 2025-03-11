@extends('layouts.layout')
@section('content')
<div class="container card-2">
    <p class="title">{{ __('reseracher.Researchers') }}</p>
    @foreach($request as $res)
    <span>
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> 
        @if (App::getLocale() == 'th')
            {{ $res->program_name_th }}
        @elseif (App::getLocale() == 'zh') 
            {{ $res->programs_name_cn ?? $res->program_name_en }} 
        @else
            {{ $res->program_name_en }}
        @endif
    </span>
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('searchresearchers',['id'=>$res->id])}}">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="{{__('reseracher.Research interests')}}">
                    </div>
                </div>
                <!-- <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected> Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary">{{__('reseracher.Search')  }}</button>
                </div>
            </form>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-0">
        @foreach($users as $r)
        <a href=" {{ route('detail',Crypt::encrypt($r->id))}}">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img class="card-image" src="{{ $r->picture}}" alt="">
                    </div>
                    <div class="col-sm-8 overflow-hidden" style="text-overflow: clip; @if(app()->getLocale() == 'en') max-height: 220px; @else max-height: 210px;@endif">
                        <div class="card-body">
                            @if(app()->getLocale() == 'en' || app()->getLocale() == 'zh')
                                <h5 class="card-title">
                                    {{ $r->fname_en ?? 'N/A' }} {{ $r->lname_en ?? 'N/A' }}
                                    @if(!empty($r->doctoral_degree))
                                        , {{$r->doctoral_degree}}
                                    @endif
                                </h5>
                                <h5 class="card-title-2">
                                    {{ $r->academic_ranks_en ?? 'N/A' }}
                                </h5>

                            @else
                                <h5 class="card-title">
                                    {{ $r->{'position_'.app()->getLocale()} ?? 'N/A' }}
                                    {{ $r->{'fname_'.app()->getLocale()} ?? 'N/A' }} {{ $r->{'lname_'.app()->getLocale()} ?? 'N/A' }}
                                </h5>
                                <h5 class="card-title-2">
                                    {{ $r->academic_ranks_th ?? 'N/A' }}
                                </h5>
                            @endif

                            <p class="card-text-1">{{ __('reseracher.Expertise') }}</p>
                            <div class="card-expertise">
                                @foreach($r->expertise->sortBy('expert_name') as $exper)
                                    @php
                                        $currentLocale = app()->getLocale(); 
                                    @endphp
                                    
                                    @if($currentLocale === 'th')
                                        <p class="card-text">{{ $exper->expert_name_th }}</p>
                                    @elseif($currentLocale === 'zh')
                                        <p class="card-text">{{ $exper->expert_name_cn }}</p>
                                    @else
                                        <!-- ค่าเริ่มต้นหรือ locale 'en' -->
                                        <p class="card-text">{{ $exper->expert_name }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </diV>
                </div>
            </div>
        </a>
        @endforeach
        @endforeach
    </div>
</div>

@stop