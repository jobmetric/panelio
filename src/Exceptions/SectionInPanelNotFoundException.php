<?php

namespace JobMetric\Panelio\Exceptions;

use Exception;
use Throwable;

class SectionInPanelNotFoundException extends Exception
{
    public function __construct(string $panel, string $section, int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('panelio::base.exceptions.section_in_panel_not_found', [
            'panel' => $panel,
            'section' => $section,
        ]), $code, $previous);
    }
}
