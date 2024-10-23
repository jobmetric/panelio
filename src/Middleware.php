<?php

namespace JobMetric\Panelio;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Traits\Macroable;
use Throwable;

class Middleware
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
     * Get Middleware.
     *
     * @return array
     */
    public function get(): array
    {
        return app('panelio_middleware');
    }

    /**
     * Set Middleware.
     *
     * @param array $params
     *
     * @return void
     */
    private function set(array $params = []): void
    {
        $this->app->singleton('panelio_middleware', function () use ($params) {
            return $params;
        });
    }

    /**
     * Add Middleware.
     *
     * @param string $class
     * @param int $position
     *
     * @return void
     */
    public function addMiddleware(string $class, int $position = 0): void
    {
        if ($this->isMiddleware($class)) {
            return;
        }

        $middleware = $this->get();

        $middleware[] = [
            'class' => $class,
            'position' => $position,
        ];

        $this->set($middleware);
    }

    /**
     * Isset Middleware by class.
     *
     * @param string $class
     *
     * @return bool
     */
    private function isMiddleware(string $class): bool
    {
        return in_array($class, array_column($this->get(), 'class'));
    }

    /**
     * Get Middlewares sorted by position.
     *
     * @return array
     * @throws Throwable
     */
    public function getMiddlewares(): array
    {
        $middleware = $this->get();

        usort($middleware, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        return array_column($middleware, 'class');
    }
}
