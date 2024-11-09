<?php

namespace JobMetric\Panelio\Exceptions;

use Exception;
use Throwable;

class DeletesMethodNotFoundInControllerException extends Exception
{
    public function __construct(string $class, int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct(trans('panelio::base.exceptions.deletes_method_not_found_in_controller', [
            'class' => $class
        ]), $code, $previous);
    }
}
