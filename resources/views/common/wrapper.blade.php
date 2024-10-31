<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap mt-n5 mt-lg-0 me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#content-container', lg: '#kt_header_container'}">
                <h1 class="text-gray-800 fw-bold my-0 fs-2">@domi('title')</h1>
                @if(!empty(\JobMetric\Panelio\Facades\Breadcrumb::get()))
                    <ul class="breadcrumb fw-semibold fs-base my-1">
                        @foreach(\JobMetric\Panelio\Facades\Breadcrumb::get() as $breadcrumb)
                            @if(!is_null($breadcrumb['link']))
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{ $breadcrumb['link'] }}" class="text-muted text-hover-primary">{{ $breadcrumb['title'] }}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item text-gray-700">{{ $breadcrumb['title'] }}</li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="d-flex d-lg-none align-items-center ms-n4 me-2">
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_mobile_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <a href="{{ route('panel.' . get_current_panel() . '.dashboard') }}" class="d-flex align-items-center">
                    <img alt="Logo" src="{{ asset('assets/vendor/panelio/media/logo/default-small.svg') }}" class="h-30px" />
                </a>
            </div>
            <div class="d-flex flex-shrink-0">
                @include('panelio::common.button')
                @yield('buttons')
            </div>
        </div>
    </div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="content-container">
            @yield('body')
        </div>
    </div>
</div>
