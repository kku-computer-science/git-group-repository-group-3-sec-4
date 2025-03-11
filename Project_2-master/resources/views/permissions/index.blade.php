@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">{{ __('permissions.permissions') }}
                @can('permission-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('permissions.create') }}">{{ __('permissions.new_permissions') }}</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <table id="example1" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ __('permissions.name') }}</th>
                            <th width="280px">{{ __('permissions.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>
                                @if(app()->getLocale() == 'zh')
                                    {{ $permission->name_cn ?? $permission->name }}
                                @elseif(app()->getLocale() == 'th')
                                    {{ $permission->name_th ?? $permission->name }}
                                @else
                                    {{ $permission->name }}
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('permissions.view_tooltip') }}"
                                            href="{{ route('permissions.show', $permission->id) }}">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>

                                    @can('permission-edit')
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('permissions.edit_tooltip') }}"
                                            href="{{ route('permissions.edit', $permission->id) }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    @endcan

                                    @can('permission-delete')
                                    @csrf
                                    @method('DELETE')
                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('permissions.delete_tooltip') }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="justify-content-center">

            </div>
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
            title: "{{ trans('permissions.are_you_sure') }}",
            text: "{{ trans('permissions.if_delete_gone') }}",
            icon: "warning",
            buttons: {
                cancel: "{{ trans('permissions.cancel_button') }}",   // ปุ่มยกเลิก
                confirm: "{{ trans('permissions.ok_button') }}"       // ปุ่มตกลง
            },
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("{{ trans('permissions.delete_successfully') }}", {
                    icon: "success",
                }).then(function() {
                    location.reload();
                    form.submit();
                });
            }
        });
    });
</script>
@endsection