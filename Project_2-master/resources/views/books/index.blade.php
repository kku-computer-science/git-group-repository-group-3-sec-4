@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title','Dashboard')

@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('books.book') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('books.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('books.Add') }} </a>
            <!-- <div class="table-responsive"> -->
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('books.no') }}</th>
                        <th>{{ __('books.Name') }}</th>
                        <th>{{ __('books.year') }}</th>
                        <th>{{ __('books.publications') }}</th>
                        <th>{{ __('books.page') }}</th>
                        <th width="280px">{{ __('books.Action') }}</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($books as $i=>$paper)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                @if(app()->getLocale() == 'th')
                                    {{ Str::limit($paper->ac_name ?? $paper->ac_name_en, 50) }}
                                @elseif(app()->getLocale() == 'zh')
                                    {{ Str::limit($paper->ac_name_zh ?? $paper->ac_name_en, 50) }}
                                @else
                                    {{ Str::limit($paper->ac_name_en, 50) }}
                                @endif
                            </td>
                            <td>
                                @if(app()->getLocale() == 'th')
                                    {{ date('Y', strtotime($paper->ac_year)) + 543 }}
                                @else
                                    {{ date('Y', strtotime($paper->ac_year)) }}
                                @endif
                            </td>
                            <td>
                                @if(app()->getLocale() == 'zh')
                                    {{ Str::limit($paper->ac_sourcetitle_cn ?? $paper->ac_sourcetitle_en, 50) }}
                                @elseif(app()->getLocale() == 'en')
                                    {{ Str::limit($paper->ac_sourcetitle_en, 50) }}
                                @else
                                    {{ Str::limit($paper->ac_sourcetitle ?? $paper->ac_sourcetitle_en, 50) }}
                                @endif
                            </td>
                            <td>{{ $paper->ac_page}}</td>
                            <td>
                                <form action="{{ route('books.destroy', $paper->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="{{ trans('books.view_tooltip') }}" href="{{ route('books.show', $paper->id) }}">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    @if(Auth::user()->can('update', $paper))
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="{{ trans('books.edit_tooltip') }}" href="{{ route('books.edit', $paper->id) }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if(Auth::user()->can('delete', $paper))
                                    @csrf
                                    @method('DELETE')
                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="{{ trans('books.delete_tooltip') }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                    @endif
                                    <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
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
                title: "{{ trans('books.are_you_sure') }}",
                text: "{{ trans('books.if_delete_gone') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ trans('books.cancel') }}",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "{{ trans('books.ok') }}",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false,
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("{{ trans('books.delete_success') }}", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
@stop
