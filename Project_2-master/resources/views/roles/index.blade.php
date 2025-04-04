@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ __('roles.roles') }}</h4>
                @can('role-create')
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('roles.create') }}">
                    <i class="mdi mdi-plus btn-icon-prepend"></i>{{ __('roles.add') }}
                </a>
                @endcan

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ __('roles.name') }}</th>
                            <th width="280px">{{ __('roles.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $key => $role)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <!-- เปลี่ยนแสดง role->name ตรง ๆ เป็น trans('roles.'.$role->name) -->
                            <td>{{ trans('roles.'.$role->name) }}</td>
                            <td>
                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                    <a class="btn btn-outline-primary btn-sm"
                                       type="button"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="{{ trans('roles.view_tooltip') }}"
                                       href="{{ route('roles.show',$role->id) }}">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                    @can('role-edit')
                                    <a class="btn btn-outline-success btn-sm"
                                       type="button"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="{{ trans('roles.edit_tooltip') }}"
                                       href="{{ route('roles.edit',$role->id) }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    @endcan

                                    @can('role-delete')
                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                                type="submit"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{ trans('roles.delete_tooltip') }}">
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
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "{{ trans('roles.are_you_sure') }}",
            text: "{{ trans('roles.if_delete_gone') }}",
            icon: "warning",
            buttons: {
                cancel: "{{ trans('roles.cancel_button') }}",   // ปุ่มยกเลิก
                confirm: "{{ trans('roles.ok_button') }}"       // ปุ่มตกลง
            },
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("{{ trans('roles.delete_success') }}", {
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