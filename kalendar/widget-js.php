<?php

require '../init.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/javascript; charset=utf-8');
$smarty->display('widget-js.tpl');
