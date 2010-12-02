<?php

$handle = fopen('http://'.$_SERVER['SERVER_NAME'].'/cron/navstevnost.php', 'r');
$handle = fopen('http://'.$_SERVER['SERVER_NAME'].'/cron/clean-reg.php', 'r');
fclose($handle);

?>
