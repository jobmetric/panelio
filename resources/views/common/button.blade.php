@php
    $button_save = \JobMetric\Panelio\Facades\Button::get('save');
    $button_save_close = \JobMetric\Panelio\Facades\Button::get('save_close');
    $button_save_new = \JobMetric\Panelio\Facades\Button::get('save_new');
    $button_cancel = \JobMetric\Panelio\Facades\Button::get('cancel');
    $button_add = \JobMetric\Panelio\Facades\Button::get('add');
    $button_add_modal = \JobMetric\Panelio\Facades\Button::get('add_modal');
    $button_recycle = \JobMetric\Panelio\Facades\Button::get('recycle');
    $button_delete = \JobMetric\Panelio\Facades\Button::get('delete');
    $button_actions = \JobMetric\Panelio\Facades\Button::get('actions');
@endphp

@if($button_save_new !== false)
    <div class="btn-group ms-3" role="group">
        <button type="submit" name="save" value="save.new" class="btn btn-sm btn-primary" form="{{ $button_save_new['form'] }}">
            <i class="la la-plus fs-2 position-absolute"></i>
            <span class="ps-9">{{ trans($button_save_new['title']) }}</span>
        </button>
    </div>
@endif

@if($button_save !== false)
    <div class="btn-group ms-3" role="group">
        <button type="submit" name="save" value="save" class="btn btn-sm btn-primary" form="{{ $button_save['form'] }}">
            <i class="la la-check fs-2 position-absolute"></i>
            <span class="ps-9">{{ trans($button_save['title']) }}</span>
        </button>
        @if($button_save_close !== false)
            <div class="btn-group dropdown-menu-end" role="group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-big-cursor" data-bs-toggle="dropdown" aria-expanded="false"></button>
                <div class="dropdown-menu">
                    <button type="submit" name="save" value="save.close" class="dropdown-item btn-sm" form="form">
                        <i class="la la-check-square text-primary fs-2 position-absolute"></i>
                        <span class="ps-9">{{ trans($button_save_close['title']) }}</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
@else
    @if($button_save_close !== false)
        <div class="btn-group ms-3" role="group">
            <button type="submit" name="save" value="save.close" class="btn btn-sm btn-primary" form="{{ $button_save_close['form'] }}">
                <i class="la la-check-square fs-2 position-absolute"></i>
                <span class="ps-9">{{ trans($button_save_close['title']) }}</span>
            </button>
        </div>
    @endif
@endif

@if($button_cancel !== false)
    <div class="btn-group ms-3" role="group">
        <a href="{{ $button_cancel['url'] }}" class="btn btn-sm btn-default">
            <i class="la @if(trans('domi::base.direction') == 'rtl') la-undo @else la-redo @endif text-danger fs-2 position-absolute"></i>
            <span class="ps-9">{{ trans($button_cancel['title']) }}</span>
        </a>
    </div>
@endif

@if($button_add !== false)
    <div class="btn-group ms-3" role="group">
        <a href="{{ $button_add['url'] }}" class="btn btn-sm btn-primary">
            <i class="la la-plus fs-2 position-absolute"></i>
            <span class="ps-9">{{ trans($button_add['title']) }}</span>
        </a>
    </div>
@endif

@if($button_add_modal !== false)
    <div class="btn-group ms-3" role="group">
        <a href="javascript:alert('not complete')" class="btn btn-sm btn-primary">
            <i class="la la-plus fs-2 position-absolute"></i>
            <span class="ps-9">{{ trans($button_add_modal['title']) }}</span>
        </a>
    </div>
@endif

@if($button_recycle !== false)
@endif

@if($button_delete !== false)
@endif

@if($button_actions !== false)
    @php
        $button_export = \JobMetric\Panelio\Facades\Button::get('export');
        $button_import = \JobMetric\Panelio\Facades\Button::get('import');
        $button_status = \JobMetric\Panelio\Facades\Button::get('status');
        $button_block = \JobMetric\Panelio\Facades\Button::get('block');
        $button_bulk = \JobMetric\Panelio\Facades\Button::get('bulk');
        $button_setting = \JobMetric\Panelio\Facades\Button::get('setting');
        $button_help = \JobMetric\Panelio\Facades\Button::get('help');
        $button_link = \JobMetric\Panelio\Facades\Button::get('link');
    @endphp

    <div class="btn-group ms-3" role="group">
        <div class="dropdown dropdown-menu-end">
            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-big-cursor pe-12" data-bs-toggle="dropdown">
                <i class="la la-gear fs-2 position-absolute"></i>
                <span class="ps-9">{{ trans('panelio::base.button.operation') }}</span>
            </button>
            <ul class="dropdown-menu w-225px">
                <li class="dropdown-item d-flex justify-content-between align-items-center">
                    <span class="fs-7 fw-bold">{{ trans('panelio::base.button.select_option') }}</span>
                    <i class="la la-info-circle fs-2"></i>
                </li>
                <li><hr class="dropdown-divider"></li>
                @if($button_status !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('enable not complete')">
                            <i class="la la-check text-success fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_status['title_enable']) }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:alert('disable not complete')">
                            <i class="la la-close text-danger fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_status['title_disable']) }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                @endif
                @if($button_block !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('block not complete')">
                            <i class="la la-ban text-danger fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_block['title_block']) }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:alert('unblock not complete')">
                            <i class="la la-retweet text-success fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_block['title_unblock']) }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                @endif
                @if($button_export !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('export type: {{ $button_export['type'] }}')">
                            <i class="la la-download text-info fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_export['title']) }}</span>
                        </a>
                    </li>
                @endif
                @if($button_import !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('import type: {{ $button_import['type'] }}')">
                            <i class="la la-upload text-info fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_import['title']) }}</span>
                        </a>
                    </li>
                @endif
                @if($button_export !== false || $button_import !== false)
                    <li><hr class="dropdown-divider"></li>
                @endif
                @if($button_bulk !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('bulk not complete')">
                            <i class="la la-adjust fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_bulk['title']) }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                @endif
                @if($button_setting !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('setting not complete')">
                            <i class="la la-cogs fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_setting['title']) }}</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                @endif
                @if($button_link !== false)
                    @foreach($button_link as $item)
                        <li>
                            <a class="dropdown-item" href="{{ $item['url'] }}">
                                <i class="la la-link fs-2 position-absolute"></i>
                                <span class="ms-10">{{ trans($item['title']) }}</span>
                            </a>
                        </li>
                    @endforeach
                    <li><hr class="dropdown-divider"></li>
                @endif
                @if($button_help !== false)
                    <li>
                        <a class="dropdown-item" href="javascript:alert('help not complete')">
                            <i class="la la-question fs-2 position-absolute"></i>
                            <span class="ms-10">{{ trans($button_help['title']) }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif
