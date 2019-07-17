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
$smarty->assign('currenturl', parse_url('https://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]));

define('OBRAZKY_URL', '/obrazky/');
define('OBRAZKY_DATA', ZS_DIR.'/obrazky');

define('SEARCH_URL', '/vyhledavani/');

define('WALLPAPERS_URL', '/obrazky-na-plochu/');
define('WALLPAPERS_DATA', ZS_DIR.'/obrazky-na-plochu');

define('IMG_RESPONSIVE_WIDTH', 200); //px
define('IMG_CSS_WIDTH', 490); //px
define('MAX_MOBILE_WIDTH', 950); //px

define('CSS_CHKSUM', '2533777220');
define('JS_CHKSUM', '2391363690');
