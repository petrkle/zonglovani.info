<?php

if (isset($_GET['style']) and is_readable('./'.$_GET['style'].'.css')) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        header('content-type: text/css; charset: UTF-8');
    }

    if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) and substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
        ob_start('ob_gzhandler');
    }
    echo trim(file_get_contents('./'.$_GET['style'].'.css'));
} else {
    http_response_code(404);
    exit();
}
