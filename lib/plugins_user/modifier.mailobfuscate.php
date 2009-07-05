<?php

function smarty_modifier_mailobfuscate($string){

	srand();
	$nahoda=rand(1,10);
	$navrat="";

	if($nahoda==1){
		$navrat=str_replace(".","&nbsp;[teèka]&nbsp;",str_replace("@","&nbsp;[zavináè]&nbsp;",$string));
	}elseif($nahoda==2){
		$navrat=str_replace(".","/teèka/",str_replace("@","/zavináè/",$string));
	}elseif($nahoda==3){
		$navrat=str_replace(".","_tecka_",str_replace("@","_zavinac_",$string));
	}elseif($nahoda==4){
		$navrat=str_replace(".","[tecka]",str_replace("@","[zavinac]",$string));
	}elseif($nahoda==5){
		$navrat=str_replace(".","[teèka]",str_replace("@","[zavináè]",$string));
	}elseif($nahoda==6){
		$navrat=str_replace(".","_teèka_",str_replace("@","_zavináè_",$string));
	}elseif($nahoda==7){
		$navrat=str_replace(".","-teèka-",str_replace("@","-zavináè-",$string));
	}elseif($nahoda==8){
		$navrat=str_replace(".","{teèka}",str_replace("@","{zavináè}",$string));
	}else{
		$navrat=str_replace(".","(teèka)",str_replace("@","(zavináè)",$string));
	}

	return $navrat;
}

?>
