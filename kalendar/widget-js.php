<?php
require('../init.php');
require('../cache.php');
http_cache_headers(86400);
header('Content-Type: application/javascript; charset=utf-8');
$smarty->display('widget-js.tpl');
