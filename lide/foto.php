<?php

require '../init.php';
if (isset($_GET['id'])) {
    $id = trim(preg_replace('/[\.\/]/', '', $_GET['id']));
} else {
    http_response_code(404);
    exit();
}

if (is_readable(LIDE_DATA.'/'.$id.'/foto.jpg')) {
    header('Content-Length: '.filesize(LIDE_DATA.'/'.$id.'/foto.jpg'));
    header('Content-Type: image/jpeg');
    @readfile(LIDE_DATA.'/'.$id.'/foto.jpg');
} else {
    http_response_code(404);
    exit();
}
