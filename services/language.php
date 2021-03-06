<?php
/**
 * Script to set the new language.
 *
 * Copyright 2003-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL-2). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl.
 *
 * @author   Marko Djukic <marko@oblo.com>
 * @category Horde
 * @license  http://www.horde.org/licenses/lgpl LGPL-2
 * @package  Horde
 */

require_once __DIR__ . '/../lib/Application.php';
Horde_Registry::appInit('horde');

$vars = $injector->getInstance('Horde_Variables');

/* Set the language. */
$lang = $registry->preferredLang($vars->new_lang);
$prefs->setValue('language', $lang);
$registry->setLanguageEnvironment($lang);

/* Redirect to the url or login page if none given. */
if ($url = Horde::verifySignedUrl($vars->url)) {
    $url = Horde::url($url, true);
} else {
    $url = Horde::url('index.php', true);
}
$url->redirect();
