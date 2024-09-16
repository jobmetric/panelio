<?php

namespace JobMetric\Panelio\Exceptions;

use Exception;
use Throwable;

class PanelNotFoundException extends Exception
{
    public function __construct(string $panel, int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('panelio::base.exceptions.panel_not_found', [
            'panel' => $panel
        ]), $code, $previous);
    }
}
