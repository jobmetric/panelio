<?php

namespace JobMetric\Panelio\Exceptions;

use Exception;
use Throwable;

class ButtonNotFoundException extends Exception
{
    public function __construct(string $button, int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('panelio::base.exceptions.button_not_found', [
            'button' => $button
        ]), $code, $previous);
    }
}
