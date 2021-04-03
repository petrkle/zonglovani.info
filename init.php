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

define('IMG_RESPONSIVE_WIDTH', 200); //px
define('IMG_CSS_WIDTH', 490); //px
define('MAX_MOBILE_WIDTH', 950); //px

define('CSS_CHKSUM', '1115490827');
