<?php
function smarty_function_jsvideo($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')){
			$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml');
			$klip = (array) $xml;
			$klic = preg_split('/:/',$klip['link']);
			$klic = $klic[2];

		$vysledek="this.parentNode.setAttribute('class','wyoutubevideo');this.parentNode.innerHTML='<object type=\\'application/x-shockwave-flash\\' data=\\'http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=$klic\\' class=\\'wyoutubevideo\\'><param name=\\'movie\\' value=\\'http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=$klic\\' /><param name=\\'wmode\\' value=\\'transparent\\' /><param name=\\'allowscriptaccess\\' value=\\'always\\' /><param name=\\'allowfullscreen\\' value=\\'false\\' /><param name=\\'pluginspage\\' value=\\'http://get.adobe.com/flashplayer/\\' />Pro přehrávání videa je potřeba <a href=\\'http://get.adobe.com/flashplayer/\\' class=\\'external\\' onclick=\\'_gaq.push([\\'_trackPageview\\',\\'/goto/get.adobe.com/flashplayer\\']);\\'>Adobe Flash</a></object>';return false;";
	}else{
		$vysledek="Video se nepodařilo načíst.";
	}

	return $vysledek;

}
