@extends('layouts.layout')
@section('content')

<div class="container refund">
    <p>{{ __('reseracher.Project_Service') }}</p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">{{ __('reseracher.No') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ __('reseracher.Year') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ __('reseracher.Project_Name') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ __('reseracher.Details') }}</th>
                    <th class="col-md-2" style="font-weight: bold;">{{ __('reseracher.Responsible_Person') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ __('reseracher.Status') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    <td style="vertical-align: top;text-align: left;">
                        {{ app()->getLocale() == 'th' ? $re->project_year + 543 : $re->project_year }}
                    </td>
                    <td style="vertical-align: top;text-align: left;">
                        {{ $re->{'project_name_'.app()->getLocale()} ?? $re->project_name }}
                    </td>
                    <td>
                        <div style="padding-bottom: 10px">
                            <span style="font-weight: bold;">{{ __('reseracher.Project_Duration') }}</span>
                            <span style="padding-left: 10px;">
                                @if ($re->project_start != null)
                                    {{\Carbon\Carbon::parse($re->project_start)->translatedFormat('j F Y') }} 
                                    {{ __('reseracher.To') }} 
                                    {{\Carbon\Carbon::parse($re->project_end)->translatedFormat('j F Y') }}
                                @endif
                            </span>
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('reseracher.Funding_Type') }}</span>
                            <span style="padding-left: 10px;">{{ $re->fund->{'fund_type_' . (app()->getLocale() == 'zh' ? 'cn' : app()->getLocale())} ?? $re->fund->fund_type }}</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('reseracher.Support_Agency') }}</span>
                            <span style="padding-left: 10px;">{{ $re->fund->{'support_resource_' . (app()->getLocale() == 'zh' ? 'cn' : app()->getLocale())} ?? $re->fund->support_resource }}</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('reseracher.Responsible_Department') }}</span>
                            <span style="padding-left: 10px;">
                                {{ $re->{'responsible_department_' . (app()->getLocale() == 'zh' ? 'cn' : app()->getLocale())} ?? $re->responsible_department_en }}
                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('reseracher.Budget_Allocated') }}</span>
                            <span style="padding-left: 10px;">{{ number_format($re->budget) }} {{ __('reseracher.Currency') }}</span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        @foreach($re->user as $user)
                            {{ $user->{'position_'.app()->getLocale()} ?? $user->position_en }} 
                            {{ $user->{'fname_'.app()->getLocale()} ?? $user->fname_en }} 
                            {{ $user->{'lname_'.app()->getLocale()} ?? $user->lname_en }}
                            <br>
                        @endforeach
                    </td>
                    <td style="vertical-align: top;text-align: left;">
                        @if($re->status == 1)
                        <h6><label class="badge badge-success">{{ __('reseracher.Requested') }}</label></h6>
                        @elseif($re->status == 2)
                        <h6><label class="badge bg-warning text-dark">{{ __('reseracher.In_Process') }}</label></h6>
                        @else
                        <h6><label class="badge bg-dark">{{ __('reseracher.Closed_Project') }}</label></h6>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

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
@stop
