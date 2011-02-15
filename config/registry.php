<?php
/**
 * Horde application registry.
 *
 * This configuration file is used by Horde to determine which Horde
 * applications are installed and where, as well as how they interact.
 *
 * IMPORTANT: Local overrides should be placed in registry.local.php,
 * registry.d/, or registry-servername.php if the 'vhosts' setting has been
 * enabled in Horde's configuration.
 *
 * NOTE: _() is an alias for gettext(), which translates the string into
 * other languages.
 *
 * Application registry
 * --------------------
 * These settings are OPTIONAL:
 *
 * fileroot: (string) The base filesystem path for the module's files.
 *           DEFAULT: Auto-determined based on this file's location.
 * initial_page: (string) The initial page for the module.
 *               DEFAULT: index.php
 * menu_parent: (string) The name of the 'heading' group that this app should
 *              show up under. Not-needed for top-level items.
 *              DEFAULT: null
 * name: (string) The human-readable name used in menus and descriptions for
 *       a module.
 *       DEFAULT: None (any publicly viewable element SHOULD have this entry
 *                defined).
 * status: (string) One of the following:
 *             active: Activate application.
 *             admin: Activate application, but only for admins.
 *             heading: Header label for application groups.
 *             hidden: Enable application, but hide.
 *             inactive: Disable application
 *             notoolbar: TODO
 *             sidebar: Show in sidebar only.
 *         DEFAULT: 'active'
 * webroot: (string) The base URI path for the module.
 *          DEFAULT: Applications live one level below the base horde
 *          directory.
 *
 * These settings should not be changed from the defaults unless you *REALLY*
 * know what you are doing:
 *
 * icon: (string) The URI for an icon to show in menus for the module.
 *                Setting this will override the default theme-based logic in
 *                the code.
 * jsfs: (string) The base filesystem path for static javascript files.
 * jsuri: (string) The base URI for static javascript files.
 * provides: (mixed) Service types the module provides.
 * target: (string) The target frame for the link.
 * templates: (string) The filesystem path to the templates directory.
 * themesfs: (string) The base file system directory for the themes.
 * themesuri: (string) The base URI for the themes. This can be used to serve
 *            all icons and style sheets from a separate server.
 * url: (string) The URL of 'heading' entries.
 *
 */

// By default, applications are assumed to live within the base Horde
// directory (e.g. their fileroot/webroot will be automatically determined
// by appending the application name to Horde's 'fileroot'/'webroot' setting.
// If your applications live in a different base directory, defining these
// variables will change the default directory without the need to change
// every application's 'fileroot'/'webroot' settings.
// $app_fileroot = dirname(__FILE__) . '../';
// $app_webroot = $this->_detectWebroot();

$this->applications = array(
    'horde' => array(
        'initial_page' => 'services/portal/index.php',
        'name' => _("Horde"),
        'provides' => 'horde',
    ),

    'imp' => array(
        'name' => _("Mail"),
        'provides' => array(
            'mail',
            'contacts/favouriteRecipients'
        )
    ),

    'ingo' => array(
        'name' => _("Filters"),
        'provides' => array(
            'filter',
            'mail/blacklistFrom',
            'mail/showBlacklist',
            'mail/whitelistFrom',
            'mail/showWhitelist',
            'mail/applyFilters',
            'mail/canApplyFilters',
            'mail/showFilters'
        ),
        'menu_parent' => 'imp'
    ),

    'imp-menu' => array(
        'app' => 'imp',
        'menu_parent' => 'imp',
        'status' => 'sidebar',
    ),

    'organizing' => array(
        'name' => _("Organizing"),
        'status' => 'heading',
    ),

    'turba' => array(
        'name' => _("Address Book"),
        'provides' => array(
            'contacts',
            'clients/getClientSource',
            'clients/clientFields',
            'clients/getClient',
            'clients/getClients',
            'clients/addClient',
            'clients/updateClient',
            'clients/deleteClient',
            'clients/searchClients'
        ),
        'menu_parent' => 'organizing'
    ),

    'turba-menu' => array(
        'app' => 'turba',
        'menu_parent' => 'turba',
        'status' => 'sidebar',
    ),

    'kronolith' => array(
        'name' => _("Calendar"),
        'provides' => 'calendar',
        'menu_parent' => 'organizing'
    ),

    'kronolith-alarms' => array(
        'status' => 'sidebar',
        'app' => 'kronolith',
        'sidebar_params' => array(
            'id' => 'alarms'
        ),
        'menu_parent' => 'kronolith',
    ),

    'kronolith-menu' => array(
        'status' => 'sidebar',
        'app' => 'kronolith',
        'sidebar_params' => array(
            'id' => 'menu'
        ),
        'menu_parent' => 'kronolith',
    ),

    'nag' => array(
        'name' => _("Tasks"),
        'provides' => 'tasks',
        'menu_parent' => 'organizing'
    ),

    'nag-alarms' => array(
        'status' => 'sidebar',
        'app' => 'nag',
        'sidebar_params' => array(
            'id' => 'alarms'
        ),
        'menu_parent' => 'nag',
    ),

    'nag-menu' => array(
        'status' => 'sidebar',
        'app' => 'nag',
        'sidebar_params' => array(
            'id' => 'menu'
        ),
        'menu_parent' => 'nag',
    ),

    'mnemo' => array(
        'name' => _("Notes"),
        'provides' => 'notes',
        'menu_parent' => 'organizing'
    ),

    'mnemo-menu' => array(
        'status' => 'sidebar',
        'app' => 'mnemo',
        'menu_parent' => 'mnemo',
    ),

    'trean' => array(
        'name' => _("Bookmarks"),
        'provides' => 'bookmarks',
        'menu_parent' => 'organizing'
    ),

    'trean-menu' => array(
        'status' => 'sidebar',
        'app' => 'trean',
        'menu_parent' => 'trean',
    ),

    'devel' => array(
        'name' => _("Development"),
        'status' => 'heading',
    ),

    'chora' => array(
        'name' => _("Version Control"),
        'menu_parent' => 'devel'
    ),

    'chora-menu' => array(
        'status' => 'sidebar',
        'app' => 'chora',
        'menu_parent' => 'chora',
    ),

    'whups' => array(
        'name' => _("Tickets"),
        'provides' => 'tickets',
        'menu_parent' => 'devel',
    ),

    'whups-menu' => array(
        'status' => 'sidebar',
        'app' => 'whups',
        'menu_parent' => 'whups',
    ),

    'luxor' => array(
        'name' => _("X-Ref"),
        'menu_parent' => 'devel'
    ),

    'info' => array(
        'name' => _("Information"),
        'status' => 'heading',
    ),

    'jonah' => array(
        'name' => _("News"),
        'provides' => 'news',
        'menu_parent' => 'info'
    ),

    'jonah-menu' => array(
        'status' => 'sidebar',
        'app' => 'jonah',
        'menu_parent' => 'jonah',
    ),

    'office' => array(
        'name' => _("Office"),
        'status' => 'heading',
    ),

    'hermes' => array(
        'name' => _("Time Tracking"),
        'menu_parent' => 'office',
        'provides' => 'time'
    ),

    'hermes-stopwatch' => array(
        'status' => 'sidebar',
        'app' => 'hermes',
        'sidebar_params' => array(
            'id' => 'stopwatch',
        ),
        'menu_parent' => 'hermes',
    ),

    'hermes-menu' => array(
        'status' => 'sidebar',
        'app' => 'hermes',
        'sidebar_params' => array(
            'id' => 'menu'
        ),
        'menu_parent' => 'hermes',
    ),

    'myaccount' => array(
        'name' => _("My Account"),
        'status' => 'heading',
    ),

    'gollem' => array(
        'name' => _("File Manager"),
        'menu_parent' => 'myaccount',
        'provides' => 'files',
    ),

    'gollem-menu' => array(
        'status' => 'sidebar',
        'app' => 'gollem',
        'menu_parent' => 'gollem',
    ),

    'passwd' => array(
        'name' => _("Password"),
        'menu_parent' => 'myaccount'
    ),

    'website' => array(
        'name' => _("Web Site"),
        'status' => 'heading',
    ),

    'agora' => array(
        'name' => _("Forums"),
        'provides' => 'forums',
        'menu_parent' => 'website'
    ),

    'ansel' => array(
        'name' => _("Photos"),
        'provides' => 'images',
        'menu_parent' => 'website'
    ),

    'wicked' => array(
        'name' => _("Wiki"),
        'provides' => 'wiki',
        'menu_parent' => 'website'
    ),

    'vilma' => array(
        'name' => _("Mail Admin"),
        'menu_parent' => 'administration'
    ),

    'content' => array(
        'status' => 'hidden'
    ),

    'timeobjects' => array(
        'status' => 'hidden'
    )
);

/* Local overrides. */
if (file_exists(dirname(__FILE__) . '/registry.local.php')) {
    include dirname(__FILE__) . '/registry.local.php';
}