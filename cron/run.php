<?php

$handle = fopen('https://'.$_SERVER['SERVER_NAME'].'/cron/old-accounts.php', 'r');
sleep(1);
$handle = fopen('https://'.$_SERVER['SERVER_NAME'].'/cron/clean-reg.php', 'r');
fclose($handle);
