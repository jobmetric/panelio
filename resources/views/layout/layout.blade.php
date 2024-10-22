@extends('panelio::layout.base')

@section('body-attribute-variable')
    @if(Route::is('panel.' . get_current_panel() . '.dashboard') && empty(\JobMetric\Panelio\Facades\Panelio::getDashboardLinks(get_current_panel())))
        data-kt-aside-minimize="on"
    @endif
@endsection

@section('body')

@endsection
