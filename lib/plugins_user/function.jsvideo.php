<?php
function smarty_function_jsvideo($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')){
			$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml');
			$klip = (array) $xml;
			$klic = preg_split('/:/',$klip['link']);
			$klic = $klic[2];

			if(isset($klip['youtube'])){
				$include = "<iframe id=\\'player\\' type=\\'text/html\\' class=\\'wyoutubevideo\\' src=\\'https://www.youtube.com/embed/".$klip['youtube']."?origin=https://".$_SERVER['SERVER_NAME']."&autoplay=1&autohide=1&loop=1&playlist=".$klip['youtube']."&rel=0&showinfo=O&fs=0&controls=0&modestbranding=1\\' frameborder=\\'0\\'></iframe>";
			}else{
				$dataurl="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=".$klic."&amp;autostart=true";
				$include="<object type=\\'application/x-shockwave-flash\\' data=\\'$dataurl\\' class=\\'wyoutubevideo\\'><param name=\\'movie\\' value=\\'$dataurl\\' /><param name=\\'wmode\\' value=\\'transparent\\' /><param name=\\'allowscriptaccess\\' value=\\'always\\' /><param name=\\'allowfullscreen\\' value=\\'false\\' /><param name=\\'pluginspage\\' value=\\'http://get.adobe.com/flashplayer/\\' />Uložit video <a href=\\'".$klip['download']."\\' class=\\'external\\'>$v.mp4</a> (".$klip['velikost'].", ".$klip['delka'].").</object>";	
			}


		$vysledek="this.parentNode.setAttribute('class','wyoutubevideo');this.parentNode.innerHTML='$include';return false;";
	}else{
		$vysledek="Video se nepodařilo načíst.";
	}

	return $vysledek;

}
