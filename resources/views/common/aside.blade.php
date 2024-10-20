<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
        <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
            <a href="{{ route('panel.' . get_current_panel() . '.dashboard') }}">
                <img alt="Logo" src="{{ asset('assets/vendor/panelio/media/logo/default-small.svg') }}" class="h-35px" />
            </a>
        </div>
        <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
            <div class="hover-scroll-overlay-y mb-5 scroll-ms px-5" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="0px">
                <ul class="nav flex-column w-100" id="kt_aside_nav_tabs">
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="{{ trans('panelio::base.section.dashboard.name') }}">
                        <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light @if(Route::is('panel.' . get_current_panel() . '.dashboard')) active @endif" @if(Route::is('panel.' . get_current_panel() . '.dashboard')) data-bs-toggle="tab" href="#aside_menu_dashboard" @else href="{{ route('admin.dashboard') }}" @endif>
                            <i class="ki-duotone ki-element-11 fs-2x">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </a>
                    </li>
                    @foreach(\JobMetric\Panelio\Facades\Panelio::getSections(get_current_panel()) as $panel)
                        <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="{{ $panel['name'] }}">
                            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light @if(Route::is('panel.' . get_current_panel() . '.' . $panel['slug'] . '.*')) active @endif" data-bs-toggle="tab" href="#aside_menu_{{ $panel['slug'] }}">
                                {!! $panel['args']['icon'] !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
            <div class="d-flex align-items-center mb-2">
                <a href="#" class="btn btn-icon flex-center bg-body btn-color-gray-600 btn-active-color-primary h-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-night-day theme-light-show fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                        <span class="path7"></span>
                        <span class="path8"></span>
                        <span class="path9"></span>
                        <span class="path10"></span>
                    </i>
                    <i class="ki-duotone ki-moon theme-dark-show fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-night-day fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                    <span class="path10"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ trans('panelio::base.mode.light') }}</span>
                        </a>
                    </div>
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-moon fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ trans('panelio::base.mode.dark') }}</span>
                        </a>
                    </div>
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-duotone ki-screen fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">{{ trans('panelio::base.mode.system') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center mb-2">
                <div class="btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-end" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="{{ trans('panelio::base.section.notification.title') }}">
                    <i class="ki-duotone ki-notification-on fs-2 fs-lg-1 animation-shake">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="aside-notification">
                    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset('assets/vendor/panelio/misc/dropdown-header-bg.png') }}')">
                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                            <span>{{ trans('panelio::base.section.notification.title') }}</span>
                            <span class="fs-8 opacity-75 ps-3">{{ trans('panelio::base.section.notification.report', ['number' => 24]) }}</span>
                        </h3>
                        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">
                            <li class="nav-item">
                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#aside_notification_alert">پیام ها و هشدارها</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#aside_notification_user">کاربران</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#aside_notification_sale">فروش</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="aside_notification_alert" role="tabpanel">
                            <div class="scroll-y mh-325px my-5 px-8">
                                <div class="d-flex flex-stack py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-35px me-4">
                                            <span class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-abstract-28 fs-2 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <div class="mb-0 me-2">
                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">هشدار برای کبری 11</a>
                                            <div class="text-gray-400 fs-7">سیستم</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-light fs-8">1 ساعت</span>
                                </div>
                            </div>
                            <div class="py-3 text-center border-top">
                                <a href="javascript:void(0)" class="btn btn-color-gray-600 btn-active-color-primary">
                                    <span>{{ trans('panelio::base.section.notification.all') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="aside_notification_user" role="tabpanel">
                            <div class="scroll-y mh-325px my-5 px-8">
                                <div class="d-flex flex-stack py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-35px me-4">
                                            <span class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-abstract-28 fs-2 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <div class="mb-0 me-2">
                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">هشدار برای کبری 11</a>
                                            <div class="text-gray-400 fs-7">سیستم</div>
                                        </div>
                                    </div>
                                    <span class="badge badge-light fs-8">1 ساعت</span>
                                </div>
                            </div>
                            <div class="py-3 text-center border-top">
                                <a href="javascript:void(0)" class="btn btn-color-gray-600 btn-active-color-primary">
                                    <span>{{ trans('panelio::base.section.notification.all') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="aside_notification_sale" role="tabpanel">
                            <div class="scroll-y mh-325px my-5 px-8">
                                <div class="d-flex flex-stack py-4">
                                    <div class="d-flex align-items-center me-2">
                                        <a href="javascript:void(0)" class="text-gray-800 text-hover-primary fw-semibold">
                                            <ul>
                                                <li>سفارش 123 پرداخت شد.</li>
                                            </ul>
                                        </a>
                                    </div>
                                    <span class="badge badge-light fs-8">هم اکنون</span>
                                </div>
                            </div>
                            <div class="py-3 text-center border-top">
                                <a href="javascript:void(0)" class="btn btn-color-gray-600 btn-active-color-primary">
                                    <span>{{ trans('panelio::base.section.notification.all') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center mb-10" id="aside_profile_menu">
                <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-end" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="{{ trans('panelio::base.section.profile.title') }}">
                    <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">M</div>
                    {{--<img src="{{ asset('avatar/default.jpg') }}" alt="image" />--}}
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="symbol symbol-50px me-5">
                                <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">M</div>
                                {{--<img alt="Logo" src="{{ asset('avatar/default.jpg') }}" />--}}
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">
                                    <span>ترانه محمدیان</span>
                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">مدیر</span>
                                </div>
                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7 text-start" dir="ltr">+98 936 0880 315</a>
                            </div>
                        </div>
                    </div>
                    @if(!empty(\JobMetric\Panelio\Facades\Panelio::getProfileLinks(get_current_panel())))
                        <div class="separator my-2"></div>
                        @foreach(\JobMetric\Panelio\Facades\Panelio::getProfileLinks(get_current_panel()) as $profileLink)
                            <div class="menu-item px-5">
                                <a href="{{ $profileLink['link'] }}" class="menu-link px-5">{{ $profileLink['name'] }}</a>
                            </div>
                        @endforeach
                    @endif
                    @if($languageInfo)
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" data-kt-menu-offset="-30px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">{{ trans('panelio::base.section.profile.languages') }}
                                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ $languageInfo->name }}
                                        <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets/vendor/language/flags/' . $languageInfo->flag) }}" alt="">
                                    </span>
                                </span>
                            </a>
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                @foreach($languages as $language)
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0)" class="menu-link d-flex px-5 change-language @if(app()->getLocale() == $language->locale) active @endif" data-lang="{{ $language->locale }}">
                                            <span class="symbol symbol-20px me-4">
                                                <img class="rounded-1" src="{{ asset('assets/vendor/language/flags/' . $language->flag) }}" alt="">
                                            </span>{{ $language->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="separator my-2"></div>
                    <div class="menu-item px-5 my-1">
                        <a href="javascript:void(0)" class="menu-link px-5">{{ trans('panelio::base.section.profile.setting') }}</a>
                    </div>
                    <div class="menu-item px-5">
                        <a href="javascript:void(0)" class="menu-link px-5">{{ trans('panelio::base.section.profile.logout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aside-secondary d-flex flex-row-fluid">
        <div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
            <div class="d-flex h-100 flex-column">
                <div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_wordspace" data-kt-scroll-dependencies="#aside-secondary-footer" data-kt-scroll-offset="0px">
                    <div class="tab-content">
                        <div class="tab-pane fade @if(Route::is('panel.' . get_current_panel() . '.dashboard')) active show @endif" id="aside_menu_dashboard" role="tabpanel">
                            <div class="mx-5">
                                <h3 class="fw-bold text-dark mb-10 mx-0">{{ trans('panelio::base.section.dashboard.title') }}</h3>
                                <div class="mb-12">
                                    @foreach(\JobMetric\Panelio\Facades\Panelio::getDashboardLinks(get_current_panel()) as $dashboardLink)
                                        <div class="d-flex align-items-center mb-7">
                                            <div class="symbol symbol-50px me-5">
                                                {!! $dashboardLink['icon'] !!}
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ $dashboardLink['link'] }}" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $dashboardLink['name'] }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach(\JobMetric\Panelio\Facades\Panelio::getSections(get_current_panel()) as $section)
                            <div class="tab-pane fade @if(Route::is('panel.' . get_current_panel() . '.' . $section['slug'] . '.*')) active show @endif" id="aside_menu_{{ $section['slug'] }}" role="tabpanel">
                                <div class="mx-5">
                                    <h3 class="fw-bold text-dark mb-10 mx-0">{{ $section['args']['title'] }}</h3>
                                </div>
                                <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-5 px-6 my-5 my-lg-0" id="kt_aside_menu_{{ $panel['slug'] }}" data-kt-menu="true">
                                    <div id="kt_aside_menu_{{ $section['slug'] }}_wrapper" class="menu-fit">
                                        @foreach(\JobMetric\Panelio\Facades\Panelio::getMenus(get_current_panel(), $section['slug']) as $menu)
                                            @if($menu['type'] == 'group')
                                                <div class="menu-item pt-5">
                                                    <div class="menu-content">
                                                        <span class="menu-heading fw-bold text-uppercase fs-7">{{ $menu['name'] }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                @if(empty($menu['submenus']))
                                                    <div class="menu-item">
                                                        <a class="menu-link @if(\Illuminate\Support\Facades\Request::is($menu['link'])) active @endif" href="{{ $menu['link'] }}">
                                                            <span class="menu-icon">
                                                                {!! $menu['icon'] !!}
                                                            </span>
                                                            <span class="menu-title">{{ $menu['name'] }}</span>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if(\Illuminate\Support\Facades\Request::is($menu['link'] . '/*')) here show @endif">
                                                        <span class="menu-link">
                                                            <span class="menu-icon">
                                                                <i class="ki-duotone ki-address-book fs-2">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                            <span class="menu-title">{{ $menu['name'] }}</span>
                                                            <span class="menu-arrow"></span>
                                                        </span>
                                                        <div class="menu-sub menu-sub-accordion">
                                                            @foreach($menu['submenus'] as $submenu)
                                                                <div class="menu-item">
                                                                    <a class="menu-link @if(\Illuminate\Support\Facades\Request::is($submenu['link'])) active @endif" href="{{ $submenu['link'] }}">
                                                                        <span class="menu-bullet">
                                                                        <span class="bullet bullet-dot"></span>
                                                                    </span>
                                                                        <span class="menu-title">منوی اصلی</span>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex-column-auto pt-10 px-5" id="aside-secondary-footer">
                    <a href="/" class="btn btn-bg-light btn-color-gray-600 btn-flex btn-active-color-primary flex-center w-100">
                        <span class="btn-label">{{ trans('panelio::base.show_website') }}</span>
                        <i class="ki-duotone ki-document btn-icon fs-4 ms-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <button id="kt_aside_toggle" class="aside-toggle btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex mb-5" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
        <i class="ki-duotone ki-arrow-left fs-2 rotate-180">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </button>
</div>
