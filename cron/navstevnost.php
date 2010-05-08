<?php
require 'auth.php';
require 'gapi.class.php';

$ga = new gapi(ga_email,ga_password);


$datum = date('Y-m-d',time()-(24*3600));
$prijemce='pek@t-email.cz';

$ga->requestReportData(ga_profile_id,array('date'),array('visitors','pageviews'),array('date'),null,$datum,$datum);

foreach($ga->getResults() as $result){
	$navstevy = $result->getVisitors();
	$stranky = $result->getPageviews();
}

$zprava=trim($navstevy.' '.$stranky);

if(strlen($zprava)>0){

	$headers = 'From: robot@zonglovani.info' . "\r\n" .
	'Reply-To: robot@zonglovani.info' . "\r\n" .
	'Precedence: bulk' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($prijemce,$datum,$zprava,$headers);
}

?>
