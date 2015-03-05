<?php
require('../init.php');
error_reporting(E_ALL);
require('../func.php');
require('rss.php');
if (function_exists('date_default_timezone_set')) {
	    date_default_timezone_set('Europe/Prague');
}
ini_set('user_agent', 'https://zonglovani.info/rss');
uasort($rss_zdroje, 'u_shuffle');

define('MAGPIE_INPUT_ENCODING','UTF-8');
define('MAGPIE_OUTPUT_ENCODING','UTF-8');
define('MAGPIE_DETECT_ENCODING',false);
define('MAGPIE_CACHE_DIR',$_SERVER['DOCUMENT_ROOT'].'/tmp/cache.rss');
require('../lib/rss_fetch.inc');
print '<pre>';

$maxpocet=10;
$udalosti=array();

foreach($rss_zdroje as $id=>$kanal){
	print $kanal['feed_url']."\n";
	$rss = fetch_rss($kanal['feed_url']);
	$items=$rss->items;
	foreach($items as $item){
		if(isset($item['published']) and !isset($item['date_timestamp'])){
			$item['date_timestamp'] = strtotime($item['published']);
		}
		if($id=='lideczongl'){
			$item['date_timestamp'] = $item['date_timestamp']-(25*3600);
		}

		if($id=='zonglujeu'){
			$item['link'] = $item['guid'];
		}

		if(preg_match('/facebook/',$kanal['feed_url'])){
			$item['link']=preg_replace('/^\//','https://facebook.com/',$item['link']);

			if(strlen(trim($item['title']))==0 and isset($item['atom_content'])){
				$ac=trim(strip_tags($item['atom_content']));
				if(strlen($ac)>0){
					$item['title']=$ac;
				}
			}

			if(strlen(trim($item['title']))==0 and (preg_match('/facebook\.com\/events\//', $item['link']) or preg_match('/facebook\.com\/.*\/photos\//', $item['link']))){
				$item['title'] = get_facebook_title($item['link']);
			}

		}

		if(isset($item['feedburner']['origlink'])){
			$item['link']=$item['feedburner']['origlink'];
		}

		if(preg_match('/rajce\.idnes\.cz/',$kanal['feed_url'])){
			$item['link']=preg_replace('/^(http:\/\/.*)http:\/\/.*$/','\1',$item['link']);
		}

		$baz=RSS_AGREGATOR_DATA.'/'.$item['date_timestamp'].'-'.$id.'.txt';


		$foo=fopen($baz.'.new','w');
		fwrite($foo,preg_replace('/\n/',' ',mb_substr(html_entity_decode($item['title'],ENT_COMPAT,'UTF-8'),0,120,'UTF-8'))."\n");
		fwrite($foo,preg_replace('/\n/',' ',$item['link'])."\n");

		if(isset($item['description'])){
			fwrite($foo,preg_replace('/\n/',' ',html_entity_decode($item['description'],ENT_COMPAT,'UTF-8'))."\n");
		}else{
			fwrite($foo,preg_replace('/\n/',' ',html_entity_decode($item['title'],ENT_COMPAT,'UTF-8'))."\n");
		}
		fclose($foo);
		if(is_file($baz)){
			if(md5(file_get_contents($baz.'.new'))==md5(file_get_contents($baz.'.new'))){
				unlink($baz.'.new');
			}else{
				print "rename $baz.new\n";
			}
		}else{
			rename($baz.'.new',$baz);
		}

		
	}

	# uklid
	$dir = opendir(RSS_AGREGATOR_DATA);
	$novinky = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (preg_match('/-'.$id.'\.txt$/',$filename)) {
				      array_push($novinky,$filename);
					 }
			   }
		   }
	closedir($dir);
	rsort($novinky,SORT_NUMERIC);
	for($foo=count($novinky)-1;$foo>$maxpocet;$foo--){
		unlink(RSS_AGREGATOR_DATA.'/'.$novinky[$foo]);
	}
}

function u_shuffle( $a, $b ) {
	     return rand(-1,1);
}

function get_facebook_title($url){
	$navrat = '';

		$url = preg_replace('/^http:\/\/www\.facebook\.com/', 'https://www.facebook.com', $url);
		$dom = new DOMDocument();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
		curl_setopt($ch, CURLOPT_REFERER, BASEURL);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.65 Safari/537.36');
		curl_setopt($ch,CURLOPT_ENCODING, '');
		$dom->loadHTML(curl_exec($ch));
		curl_close($ch);

		$xpath = new DOMXPath($dom);
		$titleNode = $xpath->query('//title');
		$title = $titleNode->item(0)->nodeValue;
		if(strlen(trim($title)) > 0){
			$navrat = preg_replace('/\s\|\sFacebook$/', '', $title);
		}

	return $navrat;	
}
