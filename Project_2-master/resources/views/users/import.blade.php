@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container mt-5">
  
  @if(session('status'))
    <div class="alert alert-success">
        {{ __('users.success_message') }}
    </div>
  @endif

  <div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('users.title') }}</h4>
        <form id="import-csv-form" method="POST" action="{{ url('import') }}" accept-charset="utf-8" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="file" placeholder="{{ __('users.choose_file') }}">
                    </div>
                    @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>              
                 <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3" id="submit">{{ __('users.submit') }}</button>
                </div>
            </div>     
        </form>
    </div>
  </div>
</div>
@endsection
