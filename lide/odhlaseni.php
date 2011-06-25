<?php
session_start();
session_destroy();
header('Location: http://'.$_SERVER['SERVER_NAME'].'/lide/odhlaseni/ok.html');
exit();
