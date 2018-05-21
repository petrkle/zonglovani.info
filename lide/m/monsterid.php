<?php

require '../../init.php';
require '../../func.php';

use function \SandFoxMe\MonsterID\build_monster;

if (isset($_GET['seed']) and is_zs_account($_GET['seed'])) {
    header('Content-Type: image/png');
    print build_monster($_GET['seed']);
} else {
    http_response_code(404);
    exit();
}
