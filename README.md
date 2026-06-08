![B&C Mods](https://raw.githubusercontent.com/0ldM4cM4n/admin-announcement-billboard/main/assets/images/B-C-Mods-Logo-02-optimized.png)

# admin-announcement-billboard

This [webtrees](https://www.webtrees.net) module displays an admin-controlled announcement billboard on each member's personal page when they log in. Only the administrator can configure and control the billboard settings — regular members can see the billboard but cannot modify it in any way. It is ideal for private family tree sites where the administrator needs to communicate important notices — such as privacy reminders, site updates, or family news — directly to all members.

## Example
When a member visits their personal page, they will see a clearly visible announcement box displayed as a block, containing whatever message the administrator has written. The box appearance is fully customizable by the admin.

## Features
- ✅ Enable or disable the billboard with a single checkbox
- ✅ Optional announcement title with customizable color
- ✅ Announcement text area supporting basic HTML formatting
- ✅ Adjustable font size
- ✅ Adjustable box height
- ✅ Live preview in the settings page
- ✅ No core Webtrees files modified — update safe!

## Compatibility

### webtrees 2.2
This module is developed and tested with webtrees 2.2.6 running under PHP 8.4.

### webtrees 2.1
This module should work with webtrees 2.1.x but has not been explicitly tested.

### webtrees 2.0 and lower
This module **will not work** with webtrees versions lower than 2.1.

## Installation Instructions
1. Download the zip archive of this repository from GitHub.
2. Unzip the archive.
3. Place the entire `Admin-Announcement-Billboard` folder into the `modules_v4` directory on your server.
4. That's it! Webtrees will automatically detect and load the module.

## Configuration
1. Go to the **Control Panel**.
2. Under the **Modules** section, find the **Home page** subsection.
3. Click **Blocks**.
4. Find **Admin Announcement Billboard** in the list and click the **wrench** icon next to it to access the settings page.

### Settings Explained

**Billboard Status**
Check this box to show the billboard to all members.
Uncheck it to hide the billboard without losing your announcement text.

**Announcement Title**
Enter a short title for your announcement. This will appear at the top of the billboard in bold text. Leave blank if you do not want a title.

**Title Color**
Choose a color for the announcement title text from the dropdown menu. Available colors are Dark Red (default), Dark Blue, Dark Green, Dark Orange, and Black.

> ⚠️ **Note:** If you are using the JustLight or Primer themes with a dark color palette, dark title colors such as Dark Blue and Black may be difficult to read, or not visible at all. We recommend using Dark Red, Dark Green, or Dark Orange with those theme/palette combinations.

**Announcement Text**
Enter the full text of your announcement. Basic HTML formatting is supported, such as the following, or use no HTML at all. It is your choice:
- `<strong>bold text</strong>`
- `<em>italic text</em>`
- `<a href="...">links</a>`

**Text Font Size**
Choose from Small, Medium (default), Large, or Extra Large.

**Billboard Box Height**
Choose from:
- Auto (recommended) — adjusts to fit your text automatically
- Small (60px)
- Medium (100px)
- Large (150px)
- Extra Large (200px)

### Preview
The settings page includes a live preview section so you can see roughly how your billboard will appear before saving your settings.

## Adding The Billboard To Member Pages

### For New Users
The billboard block will automatically appear on the personal page of any new user created after the module is installed, provided the administrator has added it to the default blocks for new users.

To set this up:
1. Go to the **Control Panel**.
2. Under the **Users** section, click **Set the default blocks for new users**.
3. On that page, find **Admin Announcement Billboard** in the list of optional blocks at the bottom.
4. Drag it up into either the **left (main) column** or the **right (side) column** in the upper section of the page.
5. Click **Save**.

### For Existing Users (Including The Administrator)
Existing users must add the block to their own personal page manually:
1. Go to **My page**.
2. Click the **Customize this page** button.
3. Add **Admin Announcement Billboard** to either the **left (main) column** or the **right (side) column**. We recommend the left column, as it is wider and produces a longer, shorter billboard, pushing the blocks below it down less than if it were placed in the narrower right column.
4. Click **Save**.

> 💡 **Important note for administrators:** Existing members will not automatically see the billboard until they have added it to their personal page. Since they have no way of knowing it exists, we strongly recommend notifying them through the Webtrees internal messaging system or any other communication channel you normally use, letting them know they need to add the **Admin Announcement Billboard** block to their personal page by following the steps above.

## Known Limitations
- When placed in a column alongside other blocks of different heights, a small amount of vertical misalignment between block tops and bottoms is normal. This is standard Webtrees block behavior and affects all block modules equally.
- On the JustLight and Primer themes with dark color palettes, dark title colors may have reduced contrast, or not be visible at all. See the Title Color note above.

## Upgrade Safety
This module operates entirely within the Webtrees block system. No core Webtrees files are modified. Your announcement settings are stored safely in the Webtrees database and will not be affected by upgrades.

## Privacy, Telemetry, Tracking
Privacy: yes. Tracking: no.

The module will check for the latest available version whenever the Webtrees Control Panel is opened. It checks a URL on github.com only.

## Credits
Developed by Bill Kochman with assistance from Claude (Anthropic).

## License
Copyright (C) 2026 Bill Kochman.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

## Warranty
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details:
https://www.gnu.org/licenses/
