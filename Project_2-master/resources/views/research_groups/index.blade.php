@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('researchGroups.research_group') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('researchGroups.create') }}"><i
                    class="mdi mdi-plus btn-icon-prepend"></i> {{ __('researchGroups.add') }}</a>
            <!-- <div class="table-responsive"> -->
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('researchGroups.no') }}</th>
                        <th>{{ __('researchGroups.group_name') }}</th>
                        <th>{{ __('researchGroups.head') }}</th>
                        <th>{{ __('researchGroups.member') }}</th>
                        <th width="280px">{{ __('researchGroups.action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($researchGroups as $i=>$researchGroup)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>
                            {{ Str::limit(
                                app()->getLocale() == 'zh' ? ($researchGroup->group_name_cn ?? $researchGroup->group_name_en) :
                                (app()->getLocale() == 'th' ? ($researchGroup->group_name_th ?? $researchGroup->group_name_en) :
                                $researchGroup->group_name_en), 50) }}
                        </td>

                        <td>
                            @foreach($researchGroup->user as $user)
                                @if ($user->pivot->role == 1)
                                    {{ app()->getLocale() == 'zh' ? ($user->fname_zh ?? $user->fname_en) :
                                    (app()->getLocale() == 'th' ? ($user->fname_th ?? $user->fname_en) : 
                                    $user->fname_en) }}
                                @endif
                            @endforeach
                        </td>

                        <td>
                            @foreach($researchGroup->user as $user)
                                @if ($user->pivot->role == 2)
                                    {{ app()->getLocale() == 'zh' ? ($user->fname_zh ?? $user->fname_en) :
                                    (app()->getLocale() == 'th' ? ($user->fname_th ?? $user->fname_en) :
                                    $user->fname_en) }}
                                    @if (!$loop->last), @endif
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('researchGroups.destroy', $researchGroup->id) }}" method="POST">

                                <a class="btn btn-outline-primary btn-sm"
                                    type="button"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ trans('researchGroups.view_tooltip') }}"
                                    href="{{ route('researchGroups.show', $researchGroup->id) }}">
                                    <i class="mdi mdi-eye"></i>
                                </a>

                                @if(Auth::user()->can('update', $researchGroup))
                                <a class="btn btn-outline-success btn-sm"
                                    type="button"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ trans('researchGroups.edit_tooltip') }}"
                                    href="{{ route('researchGroups.edit', $researchGroup->id) }}">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                @endif

                                @if(Auth::user()->can('delete', $researchGroup))
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm show_confirm"
                                    type="submit"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ trans('researchGroups.delete_tooltip') }}">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                                @endif

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <!-- </div> -->
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
        event.preventDefault();

        swal({
            title: "{{ trans('researchGroups.are_you_sure') }}",
            text: "{{ trans('researchGroups.if_delete_gone') }}",
            icon: "warning",
            /* จากเดิม buttons: true, แก้เป็นแบบ object เพื่อใส่ text ที่จะแปล */
            buttons: {
                cancel: {
                    text: "{{ trans('researchGroups.cancel_button') }}", // ปุ่มยกเลิก
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "{{ trans('researchGroups.ok_button') }}",    // ปุ่มตกลง
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
                swal("{{ trans('researchGroups.delete_success') }}", {
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "{{ trans('researchGroups.ok_button') }}",
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
