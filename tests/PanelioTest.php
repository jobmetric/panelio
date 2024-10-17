<?php

namespace JobMetric\Panelio\Tests;

use JobMetric\Panelio\Exceptions\PanelNotFoundException;
use JobMetric\Panelio\Exceptions\SectionInPanelNotFoundException;
use JobMetric\Panelio\Facades\Panelio;
use Throwable;

class PanelioTest extends BasePanelio
{
    /**
     * @throws Throwable
     */
    public function test_get()
    {
        $panelio = Panelio::get();

        $this->assertIsArray($panelio);
    }

    /**
     * @throws Throwable
     */
    public function test_panel()
    {
        // check panel not exists
        try {
            Panelio::getPanel('not-exist-panel');
        } catch (Throwable $e) {
            $this->assertInstanceOf(PanelNotFoundException::class, $e);
        }

        // add panel
        $this->addPanel('panel-slug', 'Panel Name', 'Panel Description', 'fas fa-users', 1);

        // get panel
        $panel = Panelio::getPanel('panel-slug');

        $this->assertIsArray($panel);
        $this->assertEquals('panel-slug', $panel['slug']);
        $this->assertEquals('Panel Name', $panel['name']);
        $this->assertEquals('Panel Description', $panel['args']['description']);
        $this->assertEquals('fas fa-users', $panel['args']['icon']);
        $this->assertEquals(1, $panel['position']);
        $this->assertIsArray($panel['sections']);
        $this->assertIsArray($panel['notifications']);
        $this->assertIsArray($panel['profiles']);

        // add another panel
        $this->addPanel('panel-slug-2', 'Panel Name 2', 'Panel Description 2', 'fas fa-users');

        // get panelio
        $panelio = Panelio::getPanels();

        $this->assertIsArray($panelio);
        $this->assertCount(2, $panelio);

        $this->assertEquals('panel-slug-2', $panelio[0]['slug']);
        $this->assertEquals('panel-slug', $panelio[1]['slug']);
    }

    /**
     * @throws Throwable
     */
    public function test_section()
    {
        // add panel
        $this->addPanel('panel-slug', 'Panel Name', 'Panel Description', 'fas fa-users', 1);

        // check section not exists
        try {
            Panelio::getSection('panel-slug', 'not-exist-section');
        } catch (Throwable $e) {
            $this->assertInstanceOf(SectionInPanelNotFoundException::class, $e);
        }

        // add section
        $this->addSection('panel-slug', 'users', 'Users', 'Users Title', 'Users Description','fas fa-users', 1);

        // get section
        $section = Panelio::getSections('panel-slug');

        $this->assertIsArray($section);
        $this->assertEquals('users', $section[0]['slug']);
        $this->assertEquals('Users', $section[0]['name']);
        $this->assertEquals('Users Title', $section[0]['args']['title']);
        $this->assertEquals('Users Description', $section[0]['args']['description']);
        $this->assertEquals('fas fa-users', $section[0]['args']['icon']);
        $this->assertEquals(1, $section[0]['position']);
        $this->assertIsArray($section[0]['menus']);

        // add another section
        $this->addSection('panel-slug', 'roles', 'Roles', 'Roles Title', 'Roles Description','fas fa-users');

        // get sections
        $sections = Panelio::getSections('panel-slug');

        $this->assertIsArray($sections);
        $this->assertCount(2, $sections);

        $this->assertEquals('roles', $sections[0]['slug']);
        $this->assertEquals('users', $sections[1]['slug']);
    }

    /**
     * @throws Throwable
     */
    public function test_menu()
    {
        // add panel
        $this->addPanel('panel-slug', 'Panel Name', 'Panel Description', 'fas fa-users', 1);

        // add section
        $this->addSection('panel-slug', 'users', 'Users', 'Users Title', 'Users Description','fas fa-users', 1);
        $this->addSection('panel-slug', 'posts', 'Posts', 'Posts Title', 'Posts Description','fas fa-users', 2);

        // add group menu
        $this->addGroupMenu('panel-slug', 'users', 'Users', 1);

        // add link menu
        $this->addLinkMenu('panel-slug', 'users', 'Users List', '/users', 2, 'fas fa-users');

        // add submenu
        $this->addSubMenu('panel-slug', 'users', 'Users List', 'Add User', '/users/store', 1);
        $this->addSubMenu('panel-slug', 'users', 'Users List', 'Edit User', '/users/edit', 2);

        // get menus
        $menus = Panelio::getMenus('panel-slug', 'users');

        $this->assertIsArray($menus);
        $this->assertCount(2, $menus);

        $this->assertEquals('group', $menus[0]['type']);
        $this->assertEquals('Users', $menus[0]['name']);
        $this->assertEquals(1, $menus[0]['position']);

        $this->assertEquals('link', $menus[1]['type']);
        $this->assertEquals('Users List', $menus[1]['name']);
        $this->assertEquals('/users', $menus[1]['link']);
        $this->assertEquals('fas fa-users', $menus[1]['icon']);
        $this->assertEquals(2, $menus[1]['position']);

        $this->assertIsArray($menus[1]['submenus']);
        $this->assertCount(2, $menus[1]['submenus']);

        $this->assertEquals('Add User', $menus[1]['submenus'][0]['name']);
        $this->assertEquals('/users/store', $menus[1]['submenus'][0]['link']);
        $this->assertEquals(1, $menus[1]['submenus'][0]['position']);

        $this->assertEquals('Edit User', $menus[1]['submenus'][1]['name']);
        $this->assertEquals('/users/edit', $menus[1]['submenus'][1]['link']);
        $this->assertEquals(2, $menus[1]['submenus'][1]['position']);
    }
}
