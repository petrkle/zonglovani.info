<?php
for($foo=0;$foo<1000;$foo++){
	$bar=strtotime('10/10/2010')+($foo*24*3600);
	if(date('N',$bar)==1){
		print date('Y-m-d',$bar).'<br />';
	}
}
?>
