<?php

function smarty_modifier_mailobfuscate($string){

	srand();
	$nahoda=rand(1,10);
	$navrat="";

	if($nahoda==1){
		$navrat=str_replace(".","&nbsp;[te�ka]&nbsp;",str_replace("@","&nbsp;[zavin��]&nbsp;",$string));
	}elseif($nahoda==2){
		$navrat=str_replace(".","/te�ka/",str_replace("@","/zavin��/",$string));
	}elseif($nahoda==3){
		$navrat=str_replace(".","_tecka_",str_replace("@","_zavinac_",$string));
	}elseif($nahoda==4){
		$navrat=ereg_replace("$",".nospam.com",$string);
	}elseif($nahoda==5){
		$navrat=ereg_replace("$","-nospam.com",$string);
	}elseif($nahoda==6){
		$navrat=ereg_replace("@","@nospam.com.",$string);
	}elseif($nahoda==7){
		$navrat=ereg_replace("@","@nechcispam.cz.",$string);
	}elseif($nahoda==8){
		$navrat=str_replace(".","{te�ka}",str_replace("@","{zavin��}",$string));
	}else{
		$navrat=str_replace(".","(te�ka)",str_replace("@","(zavin��)",$string));
	}

	return $navrat;
}

?>
