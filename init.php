<?php

error_reporting(0);

if (php_uname('n') == 'vps') {
    define('ZS_DOMAIN', 'zonglovani.info');
} else {
    define('ZS_DOMAIN', 'zongl.info');
}
date_default_timezone_set('Europe/Prague');

define('ZS_DIR', '/home/www/zonglovani.info');

$lib = ZS_DIR.'/lib';

if (isset($_COOKIE['ZS']) and !isset($_SESSION)) {
    session_name('ZS');
    session_start();
}

if (isset($_SESSION['uzivatel']) and isset($_SESSION['ip'])) {
    if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) {
        session_destroy();
    }
}

require 'vendor/autoload.php';
$smarty = new Smarty();

$smarty->setTemplateDir(ZS_DIR.'/templates');
$smarty->setConfigDir($lib.'./configs');
$smarty->setCacheDir(ZS_DIR.'/tmp/cache');
$smarty->setCompileDir(ZS_DIR.'/tmp/templates_c');
$smarty->addPluginsDir($lib.'/plugins_user');

define('CALENDAR_URL', '/kalendar/');
define('CALENDAR_ROOT', $lib.'/calendar/');
define('CALENDAR_DATA', ZS_DIR.'/data/kalendar');
define('CALENDAR_DELETED', ZS_DIR.'/data/kalendar.deleted');
define('CALENDAR_IMG', ZS_DIR.'/data/kalendar.img');

define('LIDE_URL', '/lide/');
define('LIDE_DATA', ZS_DIR.'/data/lide');
define('LIDE_BY_MAIL', ZS_DIR.'/data/lide.by.mail');
define('LIDE_TMP', ZS_DIR.'/data/lide.tmp');
define('LIDE_VZKAZY', ZS_DIR.'/data/vzkazy');

define('RSS_AGREGATOR_DATA', ZS_DIR.'/data/rss');

define('DISKUSE_URL', '/diskuse/');
define('DISKUSE_DATA', ZS_DIR.'/data/diskuse');

define('OBRAZKY_URL', '/obrazky/');
define('OBRAZKY_DATA', ZS_DIR.'/obrazky');

define('SEARCH_URL', '/vyhledavani/');

define('TIMEOUT_REGISTRATION', 7 * 24 * 3600);
define('TIMEOUT_RESET_PASSWD', 7 * 24 * 3600);
define('TIMEOUT_VZKAZ', 7 * 24 * 3600);

define('TIPY_DATA', ZS_DIR.'/tip/tipy.inc');

define('WALLPAPERS_URL', '/obrazky-na-plochu/');
define('WALLPAPERS_DATA', ZS_DIR.'/obrazky-na-plochu');

define('ZPRAV_NA_STRANKU', 10);

define('STAT_DATA', ZS_DIR.'/data/stat');
define('STAT_EXPIRE', 31);

define('MAX_BIG_LETTERS', 0.7);
define('IMG_MAX_WIDTH', 4000);  //px
define('IMG_MAX_HEIGHT', 4000); //px
define('IMG_MAX_SIZE', 3); //MiB

define('IMG_RESPONSIVE_WIDTH', 200); //MiB

define('CSS_CHKSUM', '744363354');
define('JS_CHKSUM', '2391363690');
