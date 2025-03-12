@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('researchProjects.research_project') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('researchProjects.create') }}"> {{ __('researchProjects.create_new') }}</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>{{ __('researchProjects.no') }}</th>
            <th>{{ __('researchProjects.project_name_th') }}</th>
            <th>{{ __('researchProjects.project_name_en') }}</th>
            <th>{{ __('researchProjects.project_start') }}</th>
            <th>{{ __('researchProjects.project_end') }}</th>
            <th>{{ __('researchProjects.funder') }}</th>
            <th>{{ __('researchProjects.budget') }}</th>
            <th>{{ __('researchProjects.note') }}</th>
            <th>{{ __('researchProjects.head') }}</th>
            <th>{{ __('researchProjects.member') }}</th>
            <th width="280px">{{ __('researchProjects.action') }}</th>
        </tr>
        @foreach ($researchProjects as $researchProject)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $researchProject->Project_name_TH }}</td>
            <td>{{ $researchProject->Project_name_EN }}</td>
            <td>{{ $researchProject->Project_start }}</td>
            <td>{{ $researchProject->Project_end }}</td>
            <td>{{ $researchProject->Funder }}</td>
            <td>{{ $researchProject->Budget }}</td>
            <td>{{ $researchProject->Note }}</td>
            <td>
                @foreach($researchProject->user as $user)
                @if ( $user->pivot->role == 1)
                    {{ $user->name}}
                @endif
                @endforeach
            </td>
            <td>
                @foreach($researchProject->user as $user)
                @if ( $user->pivot->role == 2)
                    {{ $user->name}}
                @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('researchProjects.destroy',$researchProject->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('researchProjects.show',$researchProject->id) }}">{{ __('researchProjects.show') }}</a>
                    @can('editResearchProject')
                    <a class="btn btn-primary" href="{{ route('researchProjects.edit',$researchProject->id) }}">{{ __('researchProjects.edit') }}</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('deleteResearchProject')
                    <button type="submit" class="btn btn-danger">{{ __('researchProjects.delete') }}</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $researchProjects->links() !!}

</div>
@stop
