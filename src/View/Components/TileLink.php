<?php

namespace JobMetric\Panelio\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TileLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $link = 'javascript:void(0)',
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('panelio::components.tile-link');
    }
}
