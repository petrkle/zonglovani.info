<?php

$redirects=array('android.app'=>'market://details?id=info.zonglovani.mobile.app');

if(isset($_GET['r']) and isset($redirects[$_GET['r']])){

	header('Location: '.$redirects[$_GET['r']]);
	exit();

}else{
	require('../404.php');
	exit();
}
