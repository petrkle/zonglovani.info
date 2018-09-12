#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Prague');
for ($foo = 0; $foo < 800; ++$foo) {
    $bar = strtotime('10/1/2018') + ($foo * 24 * 3600);
    if (date('N', $bar) == 1) {
        echo date('Y-m-d', $bar)."\n";
    }
}
