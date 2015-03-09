<?php
if (!isset($_SESSION)) {
	session_name('ZS');
	session_start();
	session_destroy();
}else{
	session_name('ZS');
	session_destroy();
}
setcookie('ZS', '', time()-(60*60*24), '/');
header('Location: http://'.$_SERVER['SERVER_NAME'].'/lide/odhlaseni/ok.html');
exit();
