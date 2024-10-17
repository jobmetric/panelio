<?php

namespace JobMetric\Panelio\Http\Controllers;

use App\Http\Controllers\Controller;
use JobMetric\Panelio\Facades\Panelio;

class PanelioController extends Controller
{
    public function index()
    {
        DomiPlugins('jquery');

        $data['panels'] = Panelio::getPanels();

        return view('panelio::chose-panel', $data);
    }
}
