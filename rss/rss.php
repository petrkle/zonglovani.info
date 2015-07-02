<?php

$rss_zdroje=array();
	
$rss_zdroje['fireshow']=array(
	'popis'=>'fireshow.cz',
	'url'=>'http://fireshow.cz',
	'feed_url'=>'http://feeds.feedburner.com/fireshowcz?format=xml');
$rss_zdroje['jugglesk']=array(
	'popis'=>'juggle.sk',
	'url'=>'http://juggle.sk',
	'feed_url'=>'http://juggle.sk/feed/');
$rss_zdroje['fireshowczfotky']=array(
	'popis'=>'fireshow.cz - fotky',
	'url'=>'http://fireshowcz.rajce.idnes.cz',
	'feed_url'=>'http://fireshowcz.rajce.idnes.cz/?rss=news');
$rss_zdroje['zonglujeu']=array(
	'popis'=>'zongluj.eu',
	'url'=>'http://zongluj.eu',
	'feed_url'=>'http://www.zongluj.eu/rss-kniha/');
$rss_zdroje['flow']=array(
	'popis'=>'The Flow',
	'url'=>'http://www.theflow.cz',
	'feed_url'=>'http://www.theflow.cz/frontpage/rss.html');
$rss_zdroje['bratri']=array(
	'popis'=>'Bratři v tricku',
	'url'=>'http://bratrivtricku.cz',
	'feed_url'=>'http://bratrivtricku.cz/feed');
$rss_zdroje['dvaadvacitka']=array(
	'popis'=>'22.cz',
	'url'=>'http://www.22.cz',
	'feed_url'=>'http://www.22.cz/blog/rss/');
$rss_zdroje['kufr']=array(
	'popis'=>'Divadlo KUFR',
	'url'=>'http://www.divadlokufr.cz',
	'feed_url'=>'http://www.divadlokufr.cz/feed/');
$rss_zdroje['kruhovaparabola']=array(
	'popis'=>'Kruhová parabola - obrázky',
	'url'=>'http://zongleri.cz',
	'feed_url'=>'http://kruhovaparabola.rajce.idnes.cz/?rss=news');
$rss_zdroje['adinfinitum']=array(
	'popis'=>'Ad infinitum - fotky',
	'url'=>'http://www.adinfinitum.cz/',
	'feed_url'=>'http://ad8.rajce.idnes.cz/?rss=news');
$rss_zdroje['zongleros']=array(
	'popis'=>'Žonglér o.s.',
	'url'=>'http://www.zongleros.cz',
	'feed_url'=>'http://www.zongleros.cz/feed/');
$rss_zdroje['slabikarkalendar']=array(
	'popis'=>'Žonglérův slabikář - kalendář',
	'url'=>'https://zonglovani.info/kalendar/',
	'feed_url'=>'https://zonglovani.info/kalendar/kalendar.xml');
$rss_zdroje['slabikarlide']=array(
	'popis'=>'Seznam žonglérů',
	'url'=>'https://zonglovani.info/lide/',
	'feed_url'=>'https://zonglovani.info/lide/uzivatele.xml');
$rss_zdroje['slabikardiskuse']=array(
	'popis'=>'Žonglérův slabikář - diskuse',
	'url'=>'https://zonglovani.info/diskuse/',
	'feed_url'=>'https://zonglovani.info/diskuse/zpravy.xml');
$rss_zdroje['slabikartip']=array(
	'popis'=>'Žonglérův slabikář - tip týdne',
	'url'=>'https://zonglovani.info/tip/',
	'feed_url'=>'https://zonglovani.info/tip/tip.xml');
$rss_zdroje['slabikarobrazky']=array(
	'popis'=>'Žonglérův slabikář - obrázky',
	'url'=>'https://zonglovani.info/obrazky/',
	'feed_url'=>'https://zonglovani.info/obrazky/obrazky.xml');
	
function get_news($pocet,$filtr=false){
	global $rss_zdroje;
	$dir = opendir(RSS_AGREGATOR_DATA);
	$novinky = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (preg_match('/\.txt$/',$filename)) {
							if($filtr){
								if(!preg_match($filtr,$filename)){
				      		array_push($novinky,$filename);
								}
							}else{
				      		array_push($novinky,$filename);
							}
					 }
			   }
		   }
	closedir($dir);
	rsort($novinky,SORT_NUMERIC);
	if(count($novinky)<$pocet){
		$pocet=count($novinky);
	}
	$navrat=array();
	for($foo=0;$foo<$pocet;$foo++){
		$bar=file(RSS_AGREGATOR_DATA.'/'.$novinky[$foo]);
		$baz=preg_split('/\./',$novinky[$foo]);
		$baz=preg_split('/-/',$baz[0]);
		$navrat[$foo]['titulek']=trim($bar[0]);
		$navrat[$foo]['description']=trim($bar[2]);
		$navrat[$foo]['description_plain']=trim(strip_tags($bar[2]));
		$navrat[$foo]['url']=trim($bar[1]);
		$navrat[$foo]['timestamp']=trim($baz[0]);
		$navrat[$foo]['cas']=trim($baz[0]);
		$navrat[$foo]['rssid']=trim($baz[1]);
		if(isset($rss_zdroje[$navrat[$foo]['rssid']])){
			$navrat[$foo]['rss']=$rss_zdroje[$navrat[$foo]['rssid']];
		}
		$navrat[$foo]['time_hr']=date('j. n. Y G.i',$navrat[$foo]['timestamp']);
		$navrat[$foo]['time_mr']=date('r',$navrat[$foo]['timestamp']);
	}
	return $navrat;
}
