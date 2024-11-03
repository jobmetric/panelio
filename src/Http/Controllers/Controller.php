<?php

namespace JobMetric\Panelio\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use JobMetric\PackageCore\Controllers\HasResponse;
use JobMetric\Panelio\Exceptions\AlertTypeNotFoundException;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, HasResponse;

    /**
     * Set the alert message.
     *
     * @param string $message
     * @param string $type
     *
     * @return void
     * @throws Throwable
     */
    protected function alert(string $message, string $type = 'primary'): void
    {
        match ($type) {
            'success' => session()->put('alert-success', $message),
            'warning' => session()->put('alert-warning', $message),
            'danger' => session()->put('alert-danger', $message),
            'info' => session()->put('alert-info', $message),
            'primary' => session()->put('alert-primary', $message),
            'dark' => session()->put('alert-dark', $message),
            default => throw new AlertTypeNotFoundException($type),
        };
    }
}
