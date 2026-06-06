<?php

/**
 * webtrees module: admin-announcement-billboard
 * Displays an admin-controlled announcement billboard on each
 * member's personal page when they log in.
 *
 * Copyright (C) 2026 Bill Kochman.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details:
 * <https://www.gnu.org/licenses/>
 */

declare(strict_types=1);

namespace BillKochman\WtModule\AdminAnnouncementBillboard;

use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleBlockInterface;
use Fisharebest\Webtrees\Module\ModuleBlockTrait;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleConfigInterface;
use Fisharebest\Webtrees\Module\ModuleConfigTrait;
use Fisharebest\Webtrees\Tree;
use Fisharebest\Webtrees\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Fisharebest\Webtrees\Validator;
use Fisharebest\Webtrees\FlashMessages;

class AdminAnnouncementBillboardModule extends AbstractModule implements
    ModuleCustomInterface,
    ModuleConfigInterface,
    ModuleBlockInterface
{
    use ModuleCustomTrait;
    use ModuleConfigTrait;
    use ModuleBlockTrait;

    const GITHUB_USER  = '0ldM4cM4n';
    const GITHUB_REPO  = 'admin-announcement-billboard';
    const THIS_VERSION = '1.0.0';

    public function __construct() { }

    public function boot(): void
    {
        $viewsFolder = $this->resourcesFolder() . 'views/';
        View::registerNamespace($this->name(), $viewsFolder);
    }

    public function title(): string
    {
        return I18N::translate('Admin Announcement Billboard');
    }

    public function description(): string
    {
        return I18N::translate('Displays an admin-controlled announcement billboard on each member\'s personal page.');
    }

    public function customModuleAuthorName(): string
    {
        return 'Bill Kochman';
    }

    public function customModuleVersion(): string
    {
        return self::THIS_VERSION;
    }

    public function customModuleLatestVersionUrl(): string
    {
        return 'https://raw.githubusercontent.com/' . self::GITHUB_USER . '/' . self::GITHUB_REPO . '/main/latest-version.txt';
    }

    public function customModuleSupportUrl(): string
    {
        return 'https://github.com/' . self::GITHUB_USER . '/' . self::GITHUB_REPO;
    }

    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

    public function getConfigLink(): string
    {
        return route('module', [
            'module' => $this->name(),
            'action' => 'Admin',
        ]);
    }

    public function getBlock(Tree $tree, int $block_id, string $context, array $config = []): string
    {
        $billboard_enabled     = $this->getPreference('billboard_enabled', '1');
        $billboard_title       = $this->getPreference('billboard_title', '');
        $billboard_title_color = $this->getPreference('billboard_title_color', '#cc0000');
        $billboard_text        = $this->getPreference('billboard_text', '');
        $billboard_font_size   = $this->getPreference('billboard_font_size', 'medium');
        $billboard_height      = $this->getPreference('billboard_height', 'auto');

        if ($billboard_enabled !== '1' || $billboard_text === '') {
            return '';
        }

        return view($this->name() . '::billboard', [
            'billboard_title'       => $billboard_title,
            'billboard_title_color' => $billboard_title_color,
            'billboard_text'        => $billboard_text,
            'billboard_font_size'   => $billboard_font_size,
            'billboard_height'      => $billboard_height,
        ]);
    }

    public function loadAjax(): bool
    {
        return false;
    }

    public function isUserBlock(): bool
    {
        return true;
    }

    public function isTreeBlock(): bool
    {
        return false;
    }

    public function editBlockConfiguration(Tree $tree, int $block_id): string
    {
        return '';
    }

    public function saveBlockConfiguration(ServerRequestInterface $request, int $block_id): void
    {
    }

    public function getAdminAction(ServerRequestInterface $request): ResponseInterface
    {
        $tree = Validator::attributes($request)->treeOptional();

        return $this->viewResponse($this->name() . '::settings', [
            'title'                 => $this->title(),
            'tree'                  => $tree,
            'billboard_enabled'     => $this->getPreference('billboard_enabled', '1'),
            'billboard_title'       => $this->getPreference('billboard_title', ''),
            'billboard_title_color' => $this->getPreference('billboard_title_color', '#cc0000'),
            'billboard_text'        => $this->getPreference('billboard_text', ''),
            'billboard_font_size'   => $this->getPreference('billboard_font_size', 'medium'),
            'billboard_height'      => $this->getPreference('billboard_height', 'auto'),
            'billboard_margin'      => $this->getPreference('billboard_margin', '40px'),
        ]);
    }

    public function postAdminAction(ServerRequestInterface $request): ResponseInterface
    {
        $params = (array) $request->getParsedBody();
        $this->setPreference('billboard_enabled',     $params['billboard_enabled'] ?? '0');
        $this->setPreference('billboard_title',       $params['billboard_title'] ?? '');
        $this->setPreference('billboard_title_color', $params['billboard_title_color'] ?? '#000000');
        $this->setPreference('billboard_text',        $params['billboard_text'] ?? '');
        $this->setPreference('billboard_font_size',   $params['billboard_font_size'] ?? 'medium');
        $this->setPreference('billboard_height',      $params['billboard_height'] ?? 'auto');
        $this->setPreference('billboard_margin',      $params['billboard_margin'] ?? '40px');
        FlashMessages::addMessage(I18N::translate('Settings saved.'), 'success');

        return redirect(route('module', [
            'module' => $this->name(),
            'action' => 'Admin',
        ]));
    }
}
