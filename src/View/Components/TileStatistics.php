<?php

namespace JobMetric\Panelio\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class TileStatistics extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $number = '0',
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['number_format'] = shortFormatNumber($this->number);

        return view('panelio::components.tile-statistics', $data);
    }
}
