<?php

namespace JobMetric\Panelio\Exceptions;

use Exception;
use Throwable;

class MenuInSectionPanelNotFoundException extends Exception
{
    public function __construct(string $panel, string $section, string $menuName, int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('panelio::base.exceptions.menu_in_section_panel_not_found', [
            'panel' => $panel,
            'section' => $section,
            'menu_name' => $menuName,
        ]), $code, $previous);
    }
}
