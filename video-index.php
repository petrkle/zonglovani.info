<?php
require("init.php");
require("func.php");

$smarty->assign("titulek","�ongl�rsk� videa");
$smarty->assign("videa",get_videa("./video.inc"));
$smarty->display("hlavicka.tpl");
$smarty->display("video-index.tpl");
$smarty->display("paticka.tpl");

?>