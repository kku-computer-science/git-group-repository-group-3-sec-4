@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title','Project')

@section('content')

<div class="container">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('researchProjects.research_project') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('researchProjects.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('researchProjects.add') }}</a>
            <!-- <div class="table-responsive"> -->
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('researchProjects.no') }}</th>
                        <th>{{ __('researchProjects.year') }}</th>
                        <th>{{ __('researchProjects.project_name') }}</th>
                        <th>{{ __('researchProjects.head') }}</th>
                        <th>{{ __('researchProjects.member') }}</th>
                        <th width="auto">{{ __('researchProjects.action') }}</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($researchProjects as $i=>$researchProject)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ app()->getLocale() == 'th' ? $researchProject->project_year + 543 : $researchProject->project_year }}</td>
                            {{-- <td>{{ $researchProject->project_name }}</td> --}}
                            <td>{{ Str::limit($researchProject->project_name,70) }}</td>
                            <td>
                                @foreach($researchProject->user as $user)
                                    @if ($user->pivot->role == 1)
                                        @if(app()->getLocale() == 'th')
                                            {{ $user->fname_th ?? $user->fname_en }} {{ $user->lname_th ?? $user->lname_en }}
                                        @elseif(app()->getLocale() == 'zh')
                                            {{ $user->fname_zh ?? $user->fname_en }} {{ $user->lname_zh ?? $user->lname_en }}
                                        @else
                                            {{ $user->fname_en }} {{ $user->lname_en }}
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($researchProject->user as $user)
                                    @if ($user->pivot->role == 2)
                                        @if(app()->getLocale() == 'th')
                                            {{ $user->fname_th ?? $user->fname_en }} {{ $user->lname_th ?? $user->lname_en }}
                                        @elseif(app()->getLocale() == 'zh')
                                            {{ $user->fname_zh ?? $user->fname_en }} {{ $user->lname_zh ?? $user->lname_en }}
                                        @else
                                            {{ $user->fname_en }} {{ $user->lname_en }}
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('researchProjects.destroy', $researchProject->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('researchProjects.view_tooltip') }}"
                                            href="{{ route('researchProjects.show', $researchProject->id) }}">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    <!-- @if(Auth::user()->can('update',$researchProject))
            <a class="btn btn-primary" href="{{ route('researchProjects.edit',$researchProject->id) }}">Edit</a>
        @endif -->

                                    @if(Auth::user()->can('update', $researchProject))
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('researchProjects.edit_tooltip') }}"
                                            href="{{ route('researchProjects.edit', $researchProject->id) }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    @endif

                                    @if(Auth::user()->can('delete', $researchProject))
                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('researchProjects.delete_tooltip') }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                <tbody>

            </table>
            <!-- </div> -->
            <br>

        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#example1')) { // ตรวจสอบว่า DataTable ถูกใช้งานไปแล้วหรือยัง
            var table1 = $('#example1').DataTable({
                responsive: true,
                language: {
                    search: "{{ __('reseracher.Search') }}",
                    lengthMenu: "{{ __('reseracher.Show') }} _MENU_ {{ __('reseracher.entries') }}",
                    info: "{{ __('reseracher.Showing') }} _START_ {{ __('reseracher.to') }} _END_ {{ __('reseracher.of') }} _TOTAL_ {{ __('reseracher.entries') }}",
                    paginate: {
                        previous: "{{ __('reseracher.Previous') }}",
                        next: "{{ __('reseracher.Next') }}",
                    }
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: "{{ trans('researchProjects.are_you_sure') }}",
                text: "{{ trans('researchProjects.if_delete_gone') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ __('researchProjects.cancel') }}",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "{{ __('researchProjects.ok') }}",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "{{ trans('researchProjects.delete_success') }}",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "{{ __('researchProjects.ok') }}",
                                className: "btn btn-success",
                            }
                        }
                    }).then(function() {
                        form.submit();
                    });
                }
            });
    });
</script>
@stop