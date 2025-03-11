@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">{{ __('department.department') }}
                @can('departments-create')
                <a class="btn btn-primary" href="{{ route('departments.create') }}">
                    {{ __('department.new_department') }}
                </a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ __('department.name') }}</th>
                            <th width="280px">{{ __('department.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->department_name_th }}</td>
                            <td>
                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                           type="button"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="{{ trans('department.view_tooltip') }}"
                                           href="{{ route('departments.show', $department->id) }}">
                                           <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    @can('departments-edit')
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                           type="button"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="{{ trans('department.edit_tooltip') }}"
                                           href="{{ route('departments.edit', $department->id) }}">
                                           <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('departments-delete')
                                    @csrf
                                    @method('DELETE')
                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                                type="submit"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{ trans('department.delete_tooltip') }}">
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
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();

        swal({
                title: "{{ trans('department.are_you_sure') }}",
                text: "{{ trans('department.if_delete_gone') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ trans('department.cancel_button') }}",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "{{ trans('department.ok_button') }}",
                        value: true,
                        visible: true,
                        className: "btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "{{ trans('department.delete_successfully') }}",
                        icon: "success",
                        button: "{{ trans('department.ok_button') }}"
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
@endsection
