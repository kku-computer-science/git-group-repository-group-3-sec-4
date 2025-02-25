@extends('layouts.layout')
@section('content')
<td>{{ \App\Helpers\TranslationHelper::translateText(Str::limit($paper->ac_sourcetitle,50), 'en', 'th') }}</td>

@stop