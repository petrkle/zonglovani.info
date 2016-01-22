<?php
require('../init.php');
header('Content-Type: application/javascript; charset=utf-8');
$smarty->assign('antispam_odpoved', $_SESSION['antispam_odpoved']);
$smarty->display('antispam-js.tpl');
