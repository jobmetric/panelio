<?php

namespace JobMetric\Panelio\Exceptions;

use Exception;
use Throwable;

class AlertTypeNotFoundException extends Exception
{
    public function __construct(string $type, int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('panelio::base.exceptions.alert_type_not_found', [
            'type' => $type
        ]), $code, $previous);
    }
}
