<?php

$redirects=array('android.app'=>'https://play.google.com/store/apps/details?id=info.zonglovani.mobile.app');

$android_redirects=array('android.app'=>'market://details?id=info.zonglovani.mobile.app');

if(isset($_GET['r']) and isset($redirects[$_GET['r']])){

	if(preg_match('/android/i',$_SERVER['HTTP_USER_AGENT']) and isset($android_redirects[$_GET['r']])){
		header('Location: '.$android_redirects[$_GET['r']]);
		exit();
	}else{
		header('Location: '.$redirects[$_GET['r']]);
		exit();
	}

}else{
	require('../404.php');
	exit();
}
