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

use Composer\Autoload\ClassLoader;

$loader = new ClassLoader();
$loader->addPsr4('BillKochman\\WtModule\\AdminAnnouncementBillboard\\', __DIR__);
$loader->register();

return new AdminAnnouncementBillboardModule();
