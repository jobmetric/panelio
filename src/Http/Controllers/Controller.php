<?php

namespace JobMetric\Panelio\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use JobMetric\Category\Facades\Category;
use JobMetric\PackageCore\Controllers\HasResponse;
use JobMetric\Panelio\Exceptions\AlertTypeNotFoundException;
use JobMetric\Panelio\Exceptions\ChangeStatusMethodNotFoundInControllerException;
use JobMetric\Panelio\Exceptions\DeletesMethodNotFoundInControllerException;
use JobMetric\Panelio\Http\Requests\ActionListRequest;
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

    /**
     * Run Actions in list
     *
     * @param ActionListRequest $request
     * @param mixed $params
     *
     * @return RedirectResponse
     * @throws Throwable
     */
    public function options(ActionListRequest $request, ...$params): RedirectResponse
    {
        $ids = $request->input('ids');
        $action = $request->input('action');

        $alert = null;
        $danger = null;
        switch ($action) {
            case 'delete':
                if (!method_exists($this, 'deletes')) {
                    throw new DeletesMethodNotFoundInControllerException(class_basename($this));
                }

                if ($this->deletes($ids, $params, $alert, $danger)) {
                    if (is_null($alert)) {
                        $alert = trans('panelio::base.message.delete', ['count' => count($ids)]);
                    }
                }

                break;
            case 'status.enable':
                if (!method_exists($this, 'changeStatus')) {
                    throw new DeletesMethodNotFoundInControllerException(class_basename($this));
                }

                if ($this->changeStatus($ids, true, $params, $alert, $danger)) {
                    if (is_null($alert)) {
                        $alert = trans('panelio::base.message.status.enable', ['count' => count($ids)]);
                    }
                }

                break;
            case 'status.disable':
                if (!method_exists($this, 'changeStatus')) {
                    throw new ChangeStatusMethodNotFoundInControllerException(class_basename($this));
                }

                if ($this->changeStatus($ids, false, $params, $alert, $danger)) {
                    if (is_null($alert)) {
                        $alert = trans('panelio::base.message.status.disable', ['count' => count($ids)]);
                    }
                }

                break;
        }

        if ($danger) {
            return back()->with('alert-danger', $danger);
        }

        return back()->with('alert-success', $alert);
    }
}
