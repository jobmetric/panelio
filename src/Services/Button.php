<?php

namespace JobMetric\Panelio\Services;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Traits\Macroable;
use JobMetric\Panelio\Exceptions\ButtonNotFoundException;
use Throwable;

class Button
{
    use Macroable;

    /**
     * The application instance.
     *
     * @var Application
     */
    protected Application $app;

    /**
     * The Button Object.
     *
     * @var array
     */
    protected array $button = [];

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

        $this->button = [
            'save' => false,
            'save_close' => false,
            'save_new' => false,
            'cancel' => false,
            'add' => false,
            'add_modal' => false,
            'recycle' => false,
            'delete' => false,
            'actions' => false,
            'status' => false,
            'block' => false,
            'export' => false,
            'import' => false,
            'bulk' => false,
            'setting' => false,
            'link' => false,
            'help' => false,
        ];
    }

    /**
     * Get Button config.
     *
     * @param string $button
     *
     * @return bool|array
     * @throws Throwable
     */
    public function get(string $button): bool|array
    {
        if (!array_key_exists($button, $this->button)) {
            throw new ButtonNotFoundException($button);
        }

        return $this->button[$button];
    }

    /**
     * Add Button Save.
     *
     * @param string|null $form form name
     * @param string|null $title language key
     *
     * @return void
     */
    public function save(string $form = null, string $title = null): void
    {
        $this->button['save'] = [
            'form' => (is_null($form)) ? 'form' : $form,
            'title' => (is_null($title)) ? 'panelio::base.button.save' : $title,
        ];
    }

    /**
     * Add Button Save Close.
     *
     * @param string|null $form form name
     * @param string|null $title language key
     *
     * @return void
     */
    public function saveClose(string $form = null, string $title = null): void
    {
        $this->button['save_close'] = [
            'form' => (is_null($form)) ? 'form' : $form,
            'title' => (is_null($title)) ? 'panelio::base.button.save_close' : $title,
        ];
    }

    /**
     * Add Button Save New.
     *
     * @param string|null $form form name
     * @param string|null $title language key
     *
     * @return void
     */
    public function saveNew(string $form = null, string $title = null): void
    {
        $this->button['save_new'] = [
            'form' => (is_null($form)) ? 'form' : $form,
            'title' => (is_null($title)) ? 'panelio::base.button.save_new' : $title,
        ];
    }

    /**
     * Add Button Cancel.
     *
     * @param string|null $url url
     * @param string|null $title language key
     *
     * @return void
     */
    public function cancel(string $url = null, string $title = null): void
    {
        $this->button['cancel'] = [
            'url' => (is_null($url)) ? 'javascript:void(0)' : $url,
            'title' => (is_null($title)) ? 'panelio::base.button.cancel' : $title,
        ];
    }

    /**
     * Add Button Add.
     *
     * @param string|null $url url
     * @param string|null $title language key
     *
     * @return void
     */
    public function add(string $url = null, string $title = null): void
    {
        $this->button['add'] = [
            'url' => (is_null($url)) ? 'javascript:void(0)' : $url,
            'title' => (is_null($title)) ? 'panelio::base.button.add' : $title,
        ];
    }

    /**
     * Add Button Modal.
     *
     * @param string|null $template modal template
     * @param string|null $size modal size
     * @param string|null $title language key
     *
     * @return void
     */
    public function addModal(string $template = null, string $size = null, string $title = null): void
    {
        $this->button['add_modal'] = [
            'template' => (is_null($template)) ? null : $template,
            'size' => (is_null($size)) ? 'modal-lg' : $size,
            'title' => (is_null($title)) ? 'panelio::base.button.add' : $title,
        ];
    }

    /**
     * Add Button Status.
     *
     * @param string|null $title_enable language key
     * @param string|null $title_disable language key
     *
     * @return void
     */
    public function status(string $title_enable = null, string $title_disable = null): void
    {
        $this->button['status'] = [
            'title_enable' => (is_null($title_enable)) ? 'panelio::base.button.status.enable' : $title_enable,
            'title_disable' => (is_null($title_disable)) ? 'panelio::base.button.status.disable' : $title_disable,
        ];

        $this->button['actions'] = true;
    }

    /**
     * Add Button Block.
     *
     * @param string|null $title_block language key
     * @param string|null $title_unblock language key
     *
     * @return void
     */
    public function block(string $title_block = null, string $title_unblock = null): void
    {
        $this->button['block'] = [
            'title_block' => (is_null($title_block)) ? 'panelio::base.button.block' : $title_block,
            'title_unblock' => (is_null($title_unblock)) ? 'panelio::base.button.unblock' : $title_unblock,
        ];

        $this->button['actions'] = true;
    }

    /**
     * Add Button Import.
     *
     * @param string|null $type import type null with default
     * @param string|null $title language key
     *
     * @return void
     */
    public function import(string $type = null, string $title = null): void
    {
        $this->button['import'] = [
            'type' => (is_null($type)) ? null : $type,
            'title' => (is_null($title)) ? 'panelio::base.button.import' : $title,
        ];

        $this->button['actions'] = true;
    }

    /**
     * Add Button Export.
     *
     * @param string|null $type export type null with default
     * @param string|null $title language key
     *
     * @return void
     */
    public function export(string $type = null, string $title = null): void
    {
        $this->button['export'] = [
            'type' => (is_null($type)) ? null : $type,
            'title' => (is_null($title)) ? 'panelio::base.button.export' : $title,
        ];

        $this->button['actions'] = true;
    }

    /**
     * Add Button Modal.
     *
     * @param string|null $template modal template
     * @param string|null $size modal size
     * @param string|null $title language key
     *
     * @return void
     */
    public function bulk(string $template = null, string $size = null, string $title = null): void
    {
        $this->button['bulk'] = [
            'template' => (is_null($template)) ? null : $template,
            'size' => (is_null($size)) ? 'modal-lg' : $size,
            'title' => (is_null($title)) ? 'panelio::base.button.bulk' : $title,
        ];
    }

    /**
     * Add Button Setting.
     *
     * @param string|null $template modal template
     * @param string|null $size modal size
     * @param string|null $title language key
     *
     * @return void
     */
    public function setting(string $template = null, string $size = null, string $title = null): void
    {
        $this->button['setting'] = [
            'template' => (is_null($template)) ? null : $template,
            'size' => (is_null($size)) ? 'modal-lg' : $size,
            'title' => (is_null($title)) ? 'panelio::base.button.setting' : $title,
        ];
    }

    /**
     * Add Button Link.
     *
     * @param string $title language key
     * @param string $url url
     *
     * @return void
     */
    public function link(string $title, string $url): void
    {
        $this->button['link'][] = [
            'title' => $title,
            'url' => $url,
        ];
    }

    /**
     * Add Button Help.
     *
     * @param string|null $template modal template
     * @param string|null $size modal size
     * @param string|null $title language key
     *
     * @return void
     */
    public function help(string $template = null, string $size = null, string $title = null): void
    {
        $this->button['help'] = [
            'template' => (is_null($template)) ? null : $template,
            'size' => (is_null($size)) ? 'modal-lg' : $size,
            'title' => (is_null($title)) ? 'panelio::base.button.help' : $title,
        ];
    }
}
