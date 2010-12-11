<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/lib/facebook.php';

$app_id = "181040748578128";
$app_secret = "fe6ce8297a69b51b82ebbe4b7618e33f";

$facebook = new Facebook(array(
	'appId' => $app_id,
	'secret' => $app_secret,
	'cookie' => true
));

if(is_null($facebook->getUser()))
{
	header("Location:{$facebook->getLoginUrl(array('req_perms' => 'user_status,publish_stream'))}");
	exit;
}

$session = $facebook->getSession();
$loginUrl = $facebook->getLoginUrl(
				array(
				'canvas'    => 1,
				'fbconnect' => 0,
				'req_perms' => 'publish_stream'
				)
);

$fbme = null;

try {
		$uid      =   $facebook->getUser();
		$fbme     =   $facebook->api('/me');

} catch (FacebookApiException $e) {
		echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
		exit;
}
