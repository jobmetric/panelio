<?php

namespace JobMetric\Panelio\Services;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Traits\Macroable;

class Datatable
{
    use Macroable;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected Application $app;

    /**
     * Create a new Translation instance.
     *
     * @param Application $app
     *
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * response datatable json
     *
     * @param object $object
     * @param array $extra
     * @param int|null $count
     *
     * @return JsonResponse
     * @static
     */
    public function of(object $object, array $extra = [], int $count = null): JsonResponse
    {
        ini_set('xdebug.max_nesting_level', 9999);

        $start = (int)request()->input('start', 0);
        $length = (int)request()->input('length', config('panelio.page_limit'));

        if (is_null($count)) {
            $total = $object->count();
        } else {
            $total = $count;
        }

        $data = $object->limit($length)->offset($start)->get()->toArray();

        return response()->json(array_merge([
            'draw' => (int)@ request()->draw ?: 1,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data,
        ], $extra));
    }

    /**
     * Get sort
     *
     * @param string $default
     *
     * @return string
     */
    public function getSort(string $default = ''): string
    {
        if (isset(request()->input('order')[0]['column'])) {
            return request()->input('order')[0]['column'];
        } else {
            return $default;
        }
    }

    /**
     * Get order
     *
     * @param string $default
     *
     * @return string
     */
    public function getOrder(string $default = ''): string
    {
        if (isset(request()->input('order')[0]['dir'])) {
            return request()->input('order')[0]['dir'];
        } else {
            return $default;
        }
    }
}
