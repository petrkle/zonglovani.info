<?php

$directory = new RecursiveDirectoryIterator(__DIR__);
$fullTree = new RecursiveIteratorIterator($directory);
$phpFiles = new RegexIterator($fullTree, '/.+((?<!Test)+\.php$)/i', RecursiveRegexIterator::GET_MATCH);

foreach ($phpFiles as $key => $file) {
    require_once($file[0]);
}
