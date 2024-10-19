@extends('panelio::layout.base')

@section('body-attribute-variable')
    @if(Route::is('admin.dashboard'))
        data-kt-aside-minimize="on"
    @endif
@endsection

@section('body')

@endsection
