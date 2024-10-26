<?php

use JobMetric\Panelio\Facades\Breadcrumb;
use JobMetric\Panelio\Facades\Panelio;

if (!function_exists('get_current_panel')) {
    /**
     * Get the current panel
     *
     * @return string|null
     */
    function get_current_panel(): ?string
    {
        $parts = explode('/', request()->path());

        if (count($parts) > 1 && $parts[0] === 'p') {
            return $parts[1];
        }

        return null;
    }
}

if (!function_exists('add_breadcrumb_base')) {
    /**
     * Add breadcrumb base
     *
     * @param string $panel
     * @param string|null $section
     *
     * @return void
     */
    function add_breadcrumb_base(string $panel, string $section = null): void
    {
        Breadcrumb::add(trans('panelio::base.dashboard'), route('panel.'.$panel.'.dashboard'));

        if ($section === null) {
            return;
        }

        $sectionKey = Panelio::getSectionKey($panel, $section);
        Breadcrumb::add(trans(Panelio::getSections($panel)[$sectionKey]['name']), route('panel.section', [
            'panel' => $panel,
            'section' => $section
        ]));
    }
}
