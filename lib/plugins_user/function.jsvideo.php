<?php
function smarty_function_jsvideo($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')){
			$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml');
			$klip = (array) $xml;
			$klic = preg_split('/:/',$klip['link']);
			$klic = $klic[2];

			if(isset($klip['youtube'])){
				$dataurl="http://www.youtube.com/v/".$klip['youtube']."?version=3&amp;hl=cs_CZ&amp;rel=0&amp;autoplay=1&amp;loop=1&amp;playlist=".$klip['youtube'];
			}else{
				$dataurl="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=".$klic."&amp;autostart=true";
			}
				$include="<object type=\\'application/x-shockwave-flash\\' data=\\'$dataurl\\' class=\\'wyoutubevideo\\'><param name=\\'movie\\' value=\\'$dataurl\\' /><param name=\\'wmode\\' value=\\'transparent\\' /><param name=\\'allowscriptaccess\\' value=\\'always\\' /><param name=\\'allowfullscreen\\' value=\\'false\\' /><param name=\\'pluginspage\\' value=\\'http://get.adobe.com/flashplayer/\\' />Uložit video <a href=\\'".$klip['download']."\\' class=\\'external\\'>$v.mp4</a> (".$klip['velikost'].", ".$klip['delka'].").</object>";	


		$vysledek="this.parentNode.setAttribute('class','wyoutubevideo');this.parentNode.innerHTML='$include';return false;";
	}else{
		$vysledek="Video se nepodařilo načíst.";
	}

	return $vysledek;

}
