<?php

namespace JobMetric\Panelio\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class ListView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        DomiPlugins('datatable');

        DomiScript('assets/vendor/panelio/js/components/list_view/script.js');

        DomiLocalize('list_view', [
            'page_limit' => config('panelio.page_limit', 50)
        ]);

        return view('panelio::components.list-view', []);
    }
}
