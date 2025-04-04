@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@section('content')
<style>
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
    .search-box {
        position: relative;
        float: right;
    }
    .search-box .input-group {
        min-width: 300px;
        position: absolute;
        right: 0;
    }
    .search-box .input-group-addon,
    .search-box input {
        border-color: #ddd;
        border-radius: 0;
    }
    .search-box input {
        height: 34px;
        padding-right: 35px;
        background: #0e393e;
        color: #ffffff;
        border: none;
        border-radius: 15px !important;
    }
    .search-box input:focus {
        background: #0e393e;
        color: #ffffff;
    }
    .search-box input::placeholder {
        font-style: italic;
    }
    .search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 6px 0;
    }
    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 2px;
    }
</style>
<script>
    $(document).ready(function() {
        // Activate tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Filter table rows based on searched term
        $("#search").on("keyup", function() {
            var term = $(this).val().toLowerCase();
            $("table tbody tr").each(function() {
                $row = $(this);
                var name = $row.find("td:nth-child(2)").text().toLowerCase();
                console.log(name);
                if (name.search(term) < 0) {
                    $row.hide();
                } else {
                    $row.show();
                }
            });
        });
    });
</script>
<div class="container">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('users.users') }}</h4>
            <a class="btn btn-primary btn-icon-text btn-sm" href="{{ route('users.create') }}">
                <i class="ti-plus btn-icon-prepend icon-sm"></i>{{ __('users.new_user') }}
            </a>
            <a class="btn btn-primary btn-icon-text btn-sm" href="{{ route('importfiles') }}">
                <i class="ti-download btn-icon-prepend icon-sm"></i>{{ __('users.import_new_use') }}
            </a>
            <!-- <div class="search-box">
                <div class="input-group">
                    <input type="text" id="search" class="form-control" placeholder="Search by Name">
                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                </div>
            </div> -->

            <div class="table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('users.name') }}</th>
                            <th>{{ __('users.department') }}</th>
                            <th>{{ __('users.email') }}</th>
                            <th>{{ __('users.roles') }}</th>
                            <th width="280px">{{ __('users.action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $user->fname_en }} {{ $user->lname_en }}</td>
                            <td>
                                @if(app()->getLocale() == 'zh')
                                    {{ Str::limit($user->program->programs_name_cn ?? $user->program->program_name_en, 20) }}
                                @elseif(app()->getLocale() == 'en')
                                    {{ Str::limit($user->program->program_name_en, 20) }}
                                @else
                                    {{ Str::limit($user->program->program_name_th ?? $user->program->program_name_en, 20) }}
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $val)
                                        <label class="badge badge-dark">{{ trans('users.role_'.$val) }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                           type="button"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="{{ trans('users.view_tooltip') }}"
                                           href="{{ route('users.show',$user->id) }}">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    @can('user-edit')
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                           type="button"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="{{ trans('users.edit_tooltip') }}"
                                           href="{{ route('users.edit',$user->id) }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('user-delete')
                                    @csrf
                                    @method('DELETE')
                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                                type="submit"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="{{ trans('users.delete_tooltip') }}">
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
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#example1')) {
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
            title: "{{ trans('users.are_you_sure') }}",
            text: "{{ trans('users.if_delete_gone') }}",
            icon: "warning",
            buttons: {
                cancel: "{{ trans('users.cancel_button') }}",   // ปุ่มยกเลิก
                confirm: "{{ trans('users.ok_button') }}"       // ปุ่มตกลง
            },
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("{{ trans('users.delete_success') }}", {
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
