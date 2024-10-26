<?php

namespace JobMetric\Panelio\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use JobMetric\Panelio\Facades\Panelio;

class PanelioController extends Controller
{
    public function index()
    {
        DomiPlugins('jquery');

        $data['panels'] = Panelio::getPanels();

        return view('panelio::chose-panel', $data);
    }

    /**
     * section page
     *
     * @param string $panel
     * @param string $section
     *
     * @return View
     */
    public function section(string $panel, string $section): View
    {
        // set section title
        $sectionKey = Panelio::getSectionKey($panel, $section);
        DomiTitle(trans(Panelio::getSections($panel)[$sectionKey]['name']));

        $data['menus'] = Panelio::getGroupByMenu($panel, $section);

        return view('panelio::section', $data);
    }
}
