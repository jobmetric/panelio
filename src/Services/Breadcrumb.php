<?php

namespace JobMetric\Panelio\Services;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Traits\Macroable;
use Throwable;

class Breadcrumb
{
    use Macroable;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected Application $app;

    /**
     * The Breadcrumb Object.
     *
     * @var array
     */
    protected array $breadcrumb = [];

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

        $this->breadcrumb = [];
    }

    /**
     * Get Breadcrumb config.
     *
     * @return array
     * @throws Throwable
     */
    public function get(): array
    {
        return $this->breadcrumb;
    }

    /**
     * Add Breadcrumb.
     *
     * @param string $title language key
     * @param string|null $link url
     *
     * @return void
     */
    public function add(string $title, string $link = null): void
    {
        $this->breadcrumb[] = [
            'title' => $title,
            'link' => $link,
        ];
    }
}
