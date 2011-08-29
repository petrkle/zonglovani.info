<?php
function smarty_function_jsvideo($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')){
			$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml');
			$klip = (array) $xml;
			$klic = preg_split('/:/',$klip['link']);
			$klic = $klic[2];
			$dl = preg_replace('/http:\/\/juggling.tv\//',$klip['download']);


		$vysledek="this.parentNode.setAttribute('class','wyoutubevideo');this.parentNode.innerHTML='<object type=\\'application/x-shockwave-flash\\' data=\\'http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=$klic\\' class=\\'wyoutubevideo\\'><param name=\\'movie\\' value=\\'http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=$klic\\' /><param name=\\'wmode\\' value=\\'transparent\\' /><param name=\\'allowscriptaccess\\' value=\\'always\\' /><param name=\\'allowfullscreen\\' value=\\'false\\' /><param name=\\'pluginspage\\' value=\\'http://get.adobe.com/flashplayer/\\' />Uložit video <a href=\\'".$klip['download']."\\' class=\\'external\\'>$v.mp4</a> (".$klip['velikost'].", ".$klip['delka'].").</object>';_gaq.push(['_trackPageview','/video/klip/navod/$v.html']);return false;";
	}else{
		$vysledek="Video se nepodařilo načíst.";
	}

	return $vysledek;

}
