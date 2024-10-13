<?php

namespace JobMetric\Panelio\Tests;

use JobMetric\Panelio\Facades\Panelio;
use Tests\BaseDatabaseTestCase as BaseTestCase;

class BasePanelio extends BaseTestCase
{
    protected function addPanel(string $slug, string $name, string $description = '', string $icon = '', int $position = 0): void
    {
        Panelio::addPanel($slug, [
            'name' => $name,
            'args' => [
                'description' => $description,
                'icon' => $icon,
            ],
            'position' => $position,
        ]);
    }

    protected function addSection(string $panelSlug, string $sectionSlug, string $name, string $title = '', string $description = '', string $icon = '', int $position = 0): void
    {
        Panelio::addSection($panelSlug, $sectionSlug, [
            'name' => $name,
            'args' => [
                'title' => $title,
                'description' => $description,
                'icon' => $icon,
            ],
            'position' => $position,
        ]);
    }

    protected function addGroupMenu(string $panelSlug, string $sectionSlug, string $name, int $position): void
    {
        Panelio::addMenu($panelSlug, $sectionSlug, [
            'type' => 'group',
            'name' => $name,
            'position' => $position,
        ]);
    }

    protected function addLinkMenu(string $panelSlug, string $sectionSlug, string $name, string $link, int $position = 0, string $icon = ''): void
    {
        Panelio::addMenu($panelSlug, $sectionSlug, [
            'name' => $name,
            'link' => $link,
            'icon' => $icon,
            'position' => $position,
        ]);
    }

    protected function addSubMenu(string $panelSlug, string $sectionSlug, string $menuName, string $name, string $link, int $position = 0): void
    {
        Panelio::addSubmenu($panelSlug, $sectionSlug, $menuName, [
            'type' => 'sub',
            'name' => $name,
            'link' => $link,
            'position' => $position,
        ]);
    }
}
