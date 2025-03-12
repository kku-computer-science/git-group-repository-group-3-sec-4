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
            <h4 class="card-title">{{ __('patents.oaw') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('patents.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('patents.add') }} </a>
            <!-- <div class="table-responsive"> -->
                <table id ="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('patents.no') }}</th>
                            <th>{{ __('patents.title') }}</th>
                            <th>{{ __('patents.type') }}</th>
                            <th>{{ __('patents.registration_date') }}</th>
                            <th>{{ __('patents.registration_number') }}</th>
                            <th>{{ __('patents.creator') }}</th>
                            <th width="280px">{{ __('patents.action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($patents as $i=>$paper)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>
                                    @if(app()->getLocale() == 'zh')
                                        {{ Str::limit($paper->ac_name_cn ?? $paper->ac_name_en, 50) }}
                                    @elseif(app()->getLocale() == 'en')
                                        {{ Str::limit($paper->ac_name_en, 50) }}
                                    @else
                                        {{ Str::limit($paper->ac_name_th ?? $paper->ac_name_en, 50) }}
                                    @endif
                                </td>

                                <td>
                                    @if(app()->getLocale() == 'zh')
                                        {{ $paper->ac_type_cn ?? $paper->ac_type_en }}
                                    @elseif(app()->getLocale() == 'en')
                                        {{ $paper->ac_type_en }}
                                    @else
                                        {{ $paper->ac_type_th ?? $paper->ac_type_en }}
                                    @endif
                                </td>
                                <td>
                                    {{ date('Y', strtotime($paper->ac_year)) }}
                                </td>
                                <td>{{ $paper->ac_refnumber}}</td>
                                <td>@foreach($paper->user as $a)
                                    @if(app()->getLocale() == 'zh')
                                        {{ $a->fname_cn ?? $a->fname_en }} {{ $a->lname_cn ?? $a->lname_en }}
                                    @elseif(app()->getLocale() == 'en')
                                        {{ $a->fname_en }} {{ $a->lname_en }}
                                    @else
                                        {{ $a->fname_th ?? $a->fname_en }} {{ $a->lname_th ?? $a->lname_en }}
                                    @endif
                                    @if (!$loop->last),@endif
                                    @endforeach

                                </td>
                                <td>
                                    <form action="{{ route('patents.destroy',$paper->id) }}" method="POST">

                                        <!-- แก้ไขตรงนี้ <a class="btn btn-info" href="{{ route('patents.show',$paper->id) }}">Show</a> -->
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="{{ __('patents.view_tooltip') }}" href="{{ route('patents.show',$paper->id) }}"><i class="mdi mdi-eye"></i></a>
                                        </li>
                                        <!-- <a class="btn btn-primary" href="{{ route('patents.edit',$paper->id) }}">Edit</a> -->
                                        @if(Auth::user()->can('update',$paper))
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="{{ __('patents.edit_tooltip') }}" href="{{ route('patents.edit',$paper->id) }}"><i class="mdi mdi-pencil"></i></a>
                                        </li>
                                        @endif
                                        @if(Auth::user()->can('delete',$paper))
                                        @csrf
                                        @method('DELETE')
                                        <li class="list-inline-item">
                                            <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('patents.delete_tooltip') }}"><i class="mdi mdi-delete"></i></button>
                                        </li>
                                        @endif
                                        <!-- จนถึงตรงนี้<button type="submit" class="btn btn-danger">Delete</button> -->
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    <tbody>
                </table>
            <!-- </div> -->
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>
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
        event.preventDefault();

        swal({
                title: "{{ trans('patents.are_you_sure') }}",
                text: "{{ trans('patents.if_delete_gone') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ trans('patents.cancel') }}",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "{{ trans('patents.ok') }}",
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
                    swal("{{ trans('patents.delete_success') }}", {
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
