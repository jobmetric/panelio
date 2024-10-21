[contributors-shield]: https://img.shields.io/github/contributors/jobmetric/panelio.svg?style=for-the-badge
[contributors-url]: https://github.com/jobmetric/panelio/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/jobmetric/panelio.svg?style=for-the-badge&label=Fork
[forks-url]: https://github.com/jobmetric/panelio/network/members
[stars-shield]: https://img.shields.io/github/stars/jobmetric/panelio.svg?style=for-the-badge
[stars-url]: https://github.com/jobmetric/panelio/stargazers
[license-shield]: https://img.shields.io/github/license/jobmetric/panelio.svg?style=for-the-badge
[license-url]: https://github.com/jobmetric/panelio/blob/master/LICENCE.md
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-blue.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/majidmohammadian

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

# Panelio for laravel

Panelio is a very useful package for creating a cool admin panel.

## Install via composer

Run the following command to pull in the latest version:

```bash
composer require jobmetric/panelio
```

### Publish the config

Run the following command to publish the package config file:

```bash
php artisan vendor:publish --provider="JobMetric\Panelio\PanelioServiceProvider" --tag="panelio-assets"
```

## Documentation

Panelio is a Laravel package that allows you to create dynamic panels, each with menus, submenus, dashboard links, and profile links. You can also organize these panels into sections and manage permissions and positions.

#### Usage

The `Panelio` class allows you to define panels and their sections, menus, and links. Below are the main methods you will use:

This is an example for the `Findr` package, whose information we bring here as an example

##### Add a panel

To add a panel or a new environment, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addPanel('findr', [
    'name' => 'findr::base.panel_name',
    'namespace' => 'JobMetric\Findr\Http\Controllers',
    'args' => [
        'description' => 'findr::base.description',
        'icon' => '<i class="ki-duotone ki-abstract-20 fs-2x"><span class="path1"></span><span class="path2"></span></i>',
    ],
    'permission' => 'findr',
    'position' => 0,
]);
```

> arguments:
> 
> - `panel slug` (string): The slug of the panel.
> 
> Parameters:
> 
> - `name` (translation key): The name of the panel.
> - `namespace` (Psr 4 namespace): The namespace of the panel.
> - `args` (array): The arguments of the panel.
> - `description` (translation key): The description of the panel.
> - `icon` (html tag i): The icon of the panel.
> - `permission` (string permission key): The permission of the panel.
> - `position` (int): The position of the panel.

##### Add a section

To add a section to a panel, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addSection('findr', 'content', [
    'name' => 'findr::base.sections.content.name',
    'args' => [
        'title' => 'findr::base.sections.content.title',
        'description' => 'findr::base.sections.content.description',
        'icon' => '<i class="ki-duotone ki-abstract-26 fs-2x"><span class="path1"></span><span class="path2"></span></i>',
    ],
    'permission' => 'findr.content',
    'position' => 0,
]);
```

> arguments:
>
> - `panel slug` (string): The slug of the panel.
> - `section slug` (string): The slug of the section.
>
> Parameters:
>
> - `name` (translation key): The name of the section.
> - `args` (array): The arguments of the section.
> - `title` (translation key): The title of the section.
> - `description` (translation key): The description of the section.
> - `icon` (html tag i): The icon of the section.
> - `permission` (string permission key): The permission of the section.
> - `position` (int): The position of the section.

##### Add a group menu

To add a group menu to a section, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addMenu('findr', 'content', [
    'type' => 'group',
    'name' => 'findr::base.sections.content.menus.group_name_1',
    'permission' => 'findr.content.group_1',
    'position' => 0,
]);
```

> arguments:
>
> - `panel slug` (string): The slug of the panel.
> - `section slug` (string): The slug of the section.
>
> Parameters:
>
> - `type` (string): The type of the menu.
> - `name` (translation key): The name of the menu.
> - `permission` (string permission key): The permission of the menu.
> - `position` (int): The position of the menu.

##### Add a link menu

To add a link menu to a group menu, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addMenu('findr', 'content', [
    'type' => 'link',
    'name' => 'findr::base.sections.content.menus.link_name_1',
    'link' => route('findr.content.sample'),
    'icon' => '<i class="ki-duotone ki-calendar-8 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i>',
    'permission' => 'findr.content.link_1',
    'position' => 0,
]);
```

> arguments:
>
> - `panel slug` (string): The slug of the panel.
> - `section slug` (string): The slug of the section.
>
> Parameters:
>
> - `type` (string): The type of the menu.
> - `name` (translation key): The name of the menu.
> - `link` (route name): The link of the menu.
> - `icon` (html tag i): The icon of the menu.
> - `permission` (string permission key): The permission of the menu.
> - `position` (int): The position of the menu.

##### Add a submenu link

To add a submenu link to a group menu, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addSubmenu('findr', 'content', 'findr::base.sections.content.menus.link_name_1', [
    'name' => 'findr::base.sections.content.menus.submenu_name_1',
    'link' => route('findr.content.sample'),
    'permission' => 'findr.content.submenu_1',
    'position' => 0,
]);
```

> arguments:
>
> - `panel slug` (string): The slug of the panel.
> - `section slug` (string): The slug of the section.
> - `menu name` (string): The name of the menu.
>
> Parameters:
>
> - `name` (translation key): The name of the submenu.
> - `link` (route name): The link of the submenu.
> - `permission` (string permission key): The permission of the submenu.
> - `position` (int): The position of the submenu.

##### Add a dashboard link

To add a dashboard link to a section, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addDashboardLink('findr', [
    'name' => 'findr::base.sections.dashboard.dashboard_name_1',
    'link' => route('findr.content.sample'),
    'icon' => '<span class="symbol-label bg-light-success"><i class="ki-duotone ki-abstract-26 fs-2x text-success"><span class="path1"></span><span class="path2"></span></i></span>',
    'permission' => 'findr.content.dashboard_1',
    'position' => 0,
]);
```

> arguments:
>
> - `panel slug` (string): The slug of the panel.
>
> Parameters:
>
> - `name` (translation key): The name of the dashboard link.
> - `link` (route name): The link of the dashboard link.
> - `icon` (html tag i): The icon of the dashboard link.
> - `permission` (string permission key): The permission of the dashboard link.
> - `position` (int): The position of the dashboard link.

##### Add a profile link

To add a profile link to a section, we add the following command in the `Findr` package provider service

```php
use JobMetric\Panelio\Facades\Panelio;

Panelio::addProfileLink('findr', [
    'name' => 'findr::base.sections.profile.profile_name_1',
    'link' => route('findr.content.sample'),
    'permission' => 'findr.content.profile_1',
    'position' => 0,
]);
```

> arguments:
>
> - `panel slug` (string): The slug of the panel.
>
> Parameters:
>
> - `name` (translation key): The name of the profile link.
> - `link` (route name): The link of the profile link.
> - `permission` (string permission key): The permission of the profile link.
> - `position` (int): The position of the profile link.

## Contributing

Thank you for considering contributing to the Panelio! The contribution guide can be found in the [CONTRIBUTING.md](https://github.com/jobmetric/panelio/blob/master/CONTRIBUTING.md).

## License

The MIT License (MIT). Please see [License File](https://github.com/jobmetric/panelio/blob/master/LICENCE.md) for more information.
