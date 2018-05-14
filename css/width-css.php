<?php

if (isset($_GET['width'])) {
    $width = preg_replace('/[^0-9]+/', '', $_GET['width']);
} else {
    http_response_code(404);
    exit();
}

header('content-type: text/css; charset: UTF-8');
echo '.photo{width:98%;max-width:'.$width.'px;}';
