<?php

require '../init.php';
require '../func.php';

$trail = new Trail();
$trail->addStep('Kalendář', CALENDAR_URL);
$trail->addStep('Widget');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/w/widget-light.png');
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

$smarty->assign('kalendar', 'https://zonglovani.info'.CALENDAR_URL);
$smarty->assign('widget_params', 'type="text/javascript" charset="utf-8" integrity="sha384-F4UhyN6nNO1p/ZFFXQQBfRvRMv4TQySJU7PrV2WsVpGjVjh6GHwNvCXRUrK0MKxX" crossorigin="anonymous"');

$titulek = 'Výpis z kalendáře';

$dalsi = array(
    array('url' => '/download/wordpress.html', 'text' => 'Plugin pro WordPress', 'title' => 'Plugin kalendáře žonglérských akcí pro systém WordPress'),
    array('url' => '/jak-odkazovat.html', 'text' => 'Jak odkazovat na žonglérův slabikář', 'title' => 'Jak odkazovat na žonglérův slabikář - připravené HTML kódy'),
    array('url' => '/kontakt.html', 'text' => 'Technická podpora', 'title' => 'Rady při problémy s vkládáním widgetu'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('titulek', $titulek);
$smarty->assign('description', 'Kalendář žonglování - widget pro tvůj web');

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-widget.tpl');
$smarty->display('paticka.tpl');
