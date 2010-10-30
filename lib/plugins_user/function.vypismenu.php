<?php

function smarty_function_vypismenu($params, &$smarty){
	$adresy = array('/','/micky/','/kruhy/','/kuzely/','/lide/','/ostatni.html');
	$texty = array('Úvodní stránka','Míčky','Kruhy','Kužely','Žongléři','Ostatní');
	$popis = array('Úvodní stránka žonglérova slabikáře','Začínáme s míčky','Začínáme s kruhy','Začínáme s kužely','Seznam uživatelů žonglérova slabikáře.','Vše ostatní o žonglování');
	
	$navrat="<ul>\n";

	for($foo=0;$foo<count($adresy);$foo++){
		if($_SERVER['REQUEST_URI']==$adresy[$foo] and !isset($_GET['show'])){
			$navrat.="<li><h4>".$texty[$foo]."</h4>\n";
		}else{
			$navrat.='<li><h4><a href="'.$adresy[$foo].'" title="'.$popis[$foo].'">'.$texty[$foo].'</a></h4>'."\n";
		};
		$navrat.=submenu($foo);
		$navrat.="</li>\n";
	}

	$navrat.="\n</ul>\n";

	if(!preg_match(SEARCH_URL,$_SERVER['REQUEST_URI'])){
	$navrat.='<form action="'.SEARCH_URL.'" method="get" id="malehledani">
		<fieldset>
		<legend>Vyhledávání</legend>
		<input type="text" name="query" class="policko" accesskey="4" /><input type="submit" value="Najít" class="knoflik" />
		<input type="hidden" name="search" value="1" />
		</fieldset>
		</form>';
			}

	
	$navrat.='<script type="text/javascript">//<![CDATA[
		document.write(\'<br /><ul><li><iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fzongleruv.slabikar&amp;width=155&amp;colorscheme=light&amp;connections=6&amp;stream=false&amp;header=false&amp;height=420" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:155px; height:420px;" allowTransparency="true"></iframe></li></ul>\');
//]]></script>
';
		
	return $navrat;
}

function submenu($id){

	if($id==1){
		$adresy = array('/micky/2/','/micky/3/','/micky/4/','/micky/5/');
		$texty = array('2 míčky','3 míčky','4 míčky','5 míčků');
		$popisky = array('Žonglování se dvěma míčky.','Žonglování se třemi míčky.','Žonglování se čtyřmi míčky.','Žonglování s pěti míčky.');
	}

	if($id==3){
		$adresy = array('/kuzely/3/','/kuzely/passing/');
		$texty = array('3 kužely','Passing');
		$popisky = array('Žonglování se třemi kužely','Žonglování ve více lidech');
	}

	if($id==4){
		$adresy = array('/kalendar/','/mapa/','/diskuse/');
		$texty = array('Kalendář','Mapa','Diskuse');
		$popisky = array('Kalendář žonglování','Žonglérská mapa','Diskuse a komentáře');
	}

	if($id==5){
		$adresy = array('/obrazky/','/video/','/animace/');
		$texty = array('Obrázky','Video','Animace');
		$popisky = array('Obrázky žonglování','Zajímavá žonglérská videa','Animace žonglování s míčky');
	}

	if(isset($adresy)){
		$navrat="<ul>\n";
		for($foo=0;$foo<count($adresy);$foo++){
			if($_SERVER['REQUEST_URI']==$adresy[$foo] and !isset($_GET['show'])){
				$navrat.='<li><strong>'.$texty[$foo].'</strong></li>'."\n";
			}else{
				$navrat.='<li><a href="'.$adresy[$foo].'" title="'.$popisky[$foo].'">'.$texty[$foo].'</a>'."</li>\n";
			};
		};
		$navrat.="</ul>\n";
		return $navrat;
	}else{
		return '';
	}
}

?>
