<?php

namespace JobMetric\Panelio;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Traits\Macroable;
use JobMetric\Panelio\Exceptions\MenuInSectionPanelNotFoundException;
use JobMetric\Panelio\Exceptions\PanelNotFoundException;
use JobMetric\Panelio\Exceptions\SectionInPanelNotFoundException;
use Throwable;

class Panelio
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
     * Get Panelio.
     *
     * @return array
     */
    public function get(): array
    {
        return app('panelio');
    }

    /**
     * Set Panelio.
     *
     * @param array $params
     *
     * @return void
     */
    private function set(array $params = []): void
    {
        $this->app->singleton('panelio', function () use ($params) {
            return $params;
        });
    }

    /**
     * Add Panel.
     *
     * @param string $slug
     * @param array $params
     *
     * @return void
     */
    public function addPanel(string $slug, array $params = []): void
    {
        if ($this->isPanel($slug)) {
            return;
        }

        $panelio = $this->get();

        $panelio[] = [
            'slug' => $slug,
            'namespace' => $params['namespace'] ?? null,
            'name' => $params['name'],
            'args' => $params['args'] ?? [], // description, icon, ...
            'permission' => $params['permission'] ?? null,
            'position' => $params['position'] ?? 0,
            'sections' => [],
            'dashboard_links' => [],
            'notifications' => [],
            'profiles' => []
        ];

        $this->set($panelio);
    }

    /**
     * Isset Panel by slug.
     *
     * @param string $slug
     *
     * @return bool
     */
    private function isPanel(string $slug): bool
    {
        $panelio = $this->get();

        return in_array($slug, array_column($panelio, 'slug'));
    }

    /**
     * Get Panel key by slug.
     *
     * @param string $slug
     *
     * @return int
     * @throws Throwable
     */
    private function getPanelKey(string $slug): int
    {
        if (!$this->isPanel($slug)) {
            throw new PanelNotFoundException($slug);
        }

        return array_search($slug, array_column($this->get(), 'slug'));
    }

    /**
     * Get Panels sorted by position.
     *
     * @return array
     * @throws Throwable
     */
    public function getPanels(): array
    {
        $panelio = $this->get();

        usort($panelio, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        return $panelio;
    }

    /**
     * Get Panel by slug.
     *
     * @param string $slug
     *
     * @return array
     * @throws Throwable
     */
    public function getPanel(string $slug): array
    {
        if (!$this->isPanel($slug)) {
            throw new PanelNotFoundException($slug);
        }

        $panelio = $this->get();

        return $panelio[$this->getPanelKey($slug)];
    }

    /**
     * Add Section to Panel.
     *
     * @param string $panelSlug
     * @param string $slug
     * @param array $params
     *
     * @return void
     * @throws Throwable
     */
    public function addSection(string $panelSlug, string $slug, array $params = []): void
    {
        $panelio = $this->get();

        if ($this->isSection($panelSlug, $slug)) {
            return;
        }

        $panelKey = $this->getPanelKey($panelSlug);

        $panelio[$panelKey]['sections'][] = [
            'slug' => $slug,
            'name' => $params['name'],
            'args' => $params['args'] ?? [], // title, description, icon, ...
            'permission' => $params['permission'] ?? null,
            'position' => $params['position'] ?? 0,
            'menus' => []
        ];

        $this->set($panelio);
    }

    /**
     * Isset Section by slug.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     *
     * @return bool
     * @throws Throwable
     */
    private function isSection(string $panelSlug, string $sectionSlug): bool
    {
        $panel = $this->getPanel($panelSlug);

        return in_array($sectionSlug, array_column($panel['sections'], 'slug'));
    }

    /**
     * Get Section key by slug.
     *
     * @param string $panelSlug
     * @param string $slug
     *
     * @return int
     * @throws Throwable
     */
    private function getSectionKey(string $panelSlug, string $slug): int
    {
        $panel = $this->getPanel($panelSlug);

        if (!$this->isSection($panelSlug, $slug)) {
            throw new SectionInPanelNotFoundException($panelSlug, $slug);
        }

        return array_search($slug, array_column($panel['sections'], 'slug'));
    }

    /**
     * Get Sections by slug sorted by position.
     *
     * @param string $panelSlug
     *
     * @return array
     * @throws Throwable
     */
    public function getSections(string $panelSlug): array
    {
        $panel = $this->getPanel($panelSlug);

        $sections = $panel['sections'];

        usort($sections, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        return $sections;
    }

    /**
     * Get Section by slug.
     *
     * @param string $panelSlug
     * @param string $slug
     *
     * @return array
     * @throws Throwable
     */
    public function getSection(string $panelSlug, string $slug): array
    {
        if (!$this->isSection($panelSlug, $slug)) {
            throw new SectionInPanelNotFoundException($panelSlug, $slug);
        }

        $panelio = $this->get();

        $panelKey = $this->getPanelKey($panelSlug);
        $sectionKey = $this->getSectionKey($panelSlug, $slug);

        return $panelio[$panelKey]['sections'][$sectionKey];
    }

    /**
     * Add Menu to Section.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     * @param array $params
     *
     * @return void
     * @throws Throwable
     */
    public function addMenu(string $panelSlug, string $sectionSlug, array $params = []): void
    {
        if ($this->isMenu($panelSlug, $sectionSlug, $params['name'])) {
            return;
        }

        $panelio = $this->get();

        $panelKey = $this->getPanelKey($panelSlug);
        $sectionKey = $this->getSectionKey($panelSlug, $sectionSlug);

        $type = $params['type'] ?? 'link';

        if ($type === 'group') {
            $panelio[$panelKey]['sections'][$sectionKey]['menus'][] = [
                'type' => 'group',
                'name' => $params['name'],
                'permission' => $params['permission'] ?? null,
                'position' => $params['position'] ?? 0,
            ];
        } else {
            $panelio[$panelKey]['sections'][$sectionKey]['menus'][] = [
                'type' => 'link',
                'name' => $params['name'],
                'link' => $params['link'] ?? null,
                'icon' => $params['icon'] ?? '',
                'permission' => $params['permission'] ?? null,
                'position' => $params['position'] ?? 0,
                'submenus' => []
            ];
        }

        $this->set($panelio);
    }

    /**
     * Isset Menu by name.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     * @param string $menuName
     *
     * @return bool
     * @throws Throwable
     */
    private function isMenu(string $panelSlug, string $sectionSlug, string $menuName): bool
    {
        $section = $this->getSections($panelSlug);

        $sectionKey = $this->getSectionKey($panelSlug, $sectionSlug);

        return in_array($menuName, array_column($section[$sectionKey]['menus'], 'name'));
    }

    /**
     * Get Menu key by name.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     * @param string $menuName
     *
     * @return int
     * @throws Throwable
     */
    private function getMenuKey(string $panelSlug, string $sectionSlug, string $menuName): int
    {
        $section = $this->getSection($panelSlug, $sectionSlug);

        if (!$this->isMenu($panelSlug, $sectionSlug, $menuName)) {
            throw new MenuInSectionPanelNotFoundException($panelSlug, $sectionSlug, $menuName);
        }

        return array_search($menuName, array_column($section['menus'], 'name'));
    }

    /**
     * Get Menu sorted by position.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     *
     * @return array
     * @throws Throwable
     */
    public function getMenus(string $panelSlug, string $sectionSlug): array
    {
        $section = $this->getSection($panelSlug, $sectionSlug);

        $menus = $section['menus'];

        usort($menus, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        // get submenus sorted by position
        foreach ($menus as $key => $menu) {
            if ($menu['type'] === 'group') {
                continue;
            }

            if (!empty($menu['submenus'])) {
                usort($menus[$key]['submenus'], function ($a, $b) {
                    return $a['position'] <=> $b['position'];
                });
            }
        }

        return $menus;
    }

    /**
     * Add Submenu to Menu.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     * @param string $menuName
     * @param array $params
     *
     * @return void
     * @throws Throwable
     */
    public function addSubmenu(string $panelSlug, string $sectionSlug, string $menuName, array $params = []): void
    {
        if ($this->isSubMenu($panelSlug, $sectionSlug, $menuName, $params['name'])) {
            return;
        }

        $panelio = $this->get();

        $panelKey = $this->getPanelKey($panelSlug);
        $sectionKey = $this->getSectionKey($panelSlug, $sectionSlug);
        $menuKey = $this->getMenuKey($panelSlug, $sectionSlug, $menuName);

        $panelio[$panelKey]['sections'][$sectionKey]['menus'][$menuKey]['submenus'][] = [
            'name' => $params['name'],
            'link' => $params['link'] ?? null,
            'permission' => $params['permission'] ?? null,
            'position' => $params['position'] ?? 0,
        ];

        $this->set($panelio);
    }

    /**
     * Isset SubMenu by name.
     *
     * @param string $panelSlug
     * @param string $sectionSlug
     * @param string $menuName
     * @param string $subMenuName
     *
     * @return bool
     * @throws Throwable
     */
    private function isSubMenu(string $panelSlug, string $sectionSlug, string $menuName, string $subMenuName): bool
    {
        $menu = $this->getMenus($panelSlug, $sectionSlug);

        $menuKey = $this->getMenuKey($panelSlug, $sectionSlug, $menuName);

        if (!isset($menu[$menuKey]['submenus'])) {
            return false;
        }

        return in_array($subMenuName, array_column($menu[$menuKey]['submenus'], 'name'));
    }

    /**
     * Add Dashboard Link to Panel.
     *
     * @param string $panelSlug
     * @param array $params
     *
     * @return void
     * @throws Throwable
     */
    public function addDashboardLink(string $panelSlug, array $params = []): void
    {
        $panelio = $this->get();

        $panelKey = $this->getPanelKey($panelSlug);

        $panelio[$panelKey]['dashboard_links'][] = [
            'name' => $params['name'],
            'link' => $params['link'] ?? 'javascript:void(0)',
            'icon' => $params['icon'] ?? null,
            'permission' => $params['permission'] ?? null,
            'position' => $params['position'] ?? 0
        ];

        $this->set($panelio);
    }

    /**
     * Get Dashboard Links by slug sorted by position.
     *
     * @param string $panelSlug
     *
     * @return array
     * @throws Throwable
     */
    public function getDashboardLinks(string $panelSlug): array
    {
        $panel = $this->getPanel($panelSlug);

        $dashboard_links = $panel['dashboard_links'];

        usort($dashboard_links, function ($a, $b) {
            return $a['position'] <=> $b['position'];
        });

        return $dashboard_links;
    }
}
