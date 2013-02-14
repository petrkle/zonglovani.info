<?php
date_default_timezone_set('Europe/Prague');
function http_cache_headers($expires,$login_vary=false){
	global $_SERVER,$_SESSION;
	if(!isset($_SESSION['logged']) or $login_vary){
		$cas = gmdate('U',time());
#			header('Cache-Control: public, maxage=' . $expires);
#			header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $cas-$expires) . ' GMT');
#			header('Expires: ' . gmdate('D, d M Y H:i:s', $cas+$expires) . ' GMT');
#		if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && (strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])+(2*$expires)) > $cas){
#			 header('HTTP/1.0 304 Not Modified');
#			 exit;
#		}
	}
}
