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
            <h4 class="card-title">{{ __('funds.research_funding') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('funds.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i> {{ __('funds.add') }}</a>
            <div class="table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('funds.no') }}</th>
                            <th>{{ __('funds.fund_name') }}</th>
                            <th>{{ __('funds.fund_type') }}</th>
                            <th>{{ __('funds.fund_level') }}</th>
                            <!-- <th>Create by</th> -->
                            <th>{{ __('funds.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $i=>$fund)
                        <tr>

                            <td>{{ $i+1 }}</td>
                            <td>{{ Str::limit($fund->fund_name,80) }}</td>
                            <td>
                                @if(app()->getLocale() == 'zh')
                                    {{ $fund->fund_type_cn ?? $fund->fund_type }}
                                @elseif(app()->getLocale() == 'en')
                                    {{ $fund->fund_type_en ?? $fund->fund_type }}
                                @else
                                    {{ $fund->fund_type }}
                                @endif
                            </td>
                            <td>{{ $fund->fund_level }}</td>
                            <!-- <td>{{ $fund->user->fname_en }} {{ $fund->user->lname_en }}</td> -->

                            <td>
                                @csrf
                                <form action="{{ route('funds.destroy',$fund->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('funds.view_tooltip') }}"
                                            href="{{ route('funds.show',$fund->id) }}">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </li>
                                    @if(Auth::user()->can('update',$fund))
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm"
                                            type="button"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="{{ trans('funds.edit_tooltip') }}"
                                            href="{{ route('funds.edit',Crypt::encrypt($fund->id)) }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </li>
                                    @endif

                                    @if(Auth::user()->can('delete',$fund))
                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-outline-danger btn-sm show_confirm"
                                            type="submit"
                                            data-toggle="tooltip"
                                            title="{{ trans('funds.delete_tooltip') }}">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </li>
                                    @endif
                                    <!-- โค้ดอื่น ๆ (เช่น comment หรือส่วนที่ไม่เกี่ยว) ยังคงเดิม -->
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
                title: "{{ trans('funds.are_you_sure') }}",
                text: "{{ trans('funds.if_delete_gone') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ trans('funds.cancel') }}",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "{{ trans('funds.ok') }}",
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
                        title: "{{ trans('funds.delete_success') }}",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "{{ trans('funds.ok') }}",
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

@endsection