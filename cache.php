<?php
date_default_timezone_set('Europe/Prague');
function http_cache_headers($expires,$login_vary=false){
	if(!isset($_SESSION['logged']) or $login_vary){
		$cas = gmdate('U',time());
			header('Cache-Control: public, maxage=' . $expires);
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $cas-$expires) . ' GMT');
			if(!isset($_COOKIE['ZS'])){
				header('Expires: ' . gmdate('D, d M Y H:i:s', $cas+$expires) . ' GMT');
			}
			if(
				isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) and
			 	(strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])+($expires)) > $cas 
				and $_SERVER['SERVER_NAME']!='zongl.info'
				and !isset($_COOKIE['ZS'])
			){
			 header('HTTP/1.0 304 Not Modified');
			 exit;
		}
	}
}
