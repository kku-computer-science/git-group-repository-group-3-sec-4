@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('funds.Whoops') }}</strong> {{ __('funds.Error_Message') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('funds.Add_Fund') }}</h4>
                <p class="card-description">{{ __('funds.Enter_Fund_Details') }}</p>
                <form class="forms-sample" action="{{ route('funds.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="fund_type" class="col-sm-2 ">{{ __('funds.Fund_Type') }}</label>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="" disabled selected>{{ __('funds.Select_Fund_Type') }}</option>
                                <option value="ทุนภายใน">{{ __('funds.Internal_Fund') }}</option>
                                <option value="ทุนภายนอก">{{ __('funds.External_Fund') }}</option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <label for="fund_level" class="col-sm-2 ">{{ __('funds.Fund_Level') }}</label>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                    <option value="" disabled selected>{{ __('funds.Select_Fund_Level') }}</option>
                                    <option value="">{{ __('funds.Not_Specified') }}</option>
                                    <option value="สูง">{{ __('funds.High') }}</option>
                                    <option value="กลาง">{{ __('funds.Medium') }}</option>
                                    <option value="ล่าง">{{ __('funds.Low') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fund_name" class="col-sm-2 ">{{ __('funds.Fund_Name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" class="form-control" placeholder="{{ __('funds.Enter_Fund_Name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="support_resource" class="col-sm-2 ">{{ __('funds.Support_Agency') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" class="form-control" placeholder="{{ __('funds.Enter_Support_Agency') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">{{ __('funds.Submit') }}</button>
                    <a class="btn btn-light" href="{{ route('funds.index')}}">{{ __('funds.Cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const ac = document.getElementById("fund_code");

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "{{ __('funds.Internal_Fund') }}" ? "block" : "none";
    }
</script>
@endsection
