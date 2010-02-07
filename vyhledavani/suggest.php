<?php
require_once('settings/conf.php');
require_once('settings/database.php');

if(isset($_GET['query'])){
		$query=trim(strip_tags($_GET['query']));
		$query=preg_replace('/[\%\*]/','',$query);
		header('Content-Type: text/plain; charset=utf-8');
		$napady=array();
		$nazvy=array();
		$vahy=array();

		if(strlen($query)>3){
		$result = mysql_query('SELECT keyword FROM `'.$mysql_table_prefix.'keywords` WHERE keyword like \''.$query.'%\' order by keyword limit 10');
		if (mysql_num_rows($result)> 0) {
			while($row=mysql_fetch_array($result)){
				array_push($napady,$row['keyword']);
			}
		}
		}
		print '["'.$query.'",';
		$bar=20;
		if(count($napady)>0){
			foreach($napady as $foo){
				array_push($nazvy,'"'.$foo.'"');
				array_push($vahy,'"Relevance: '.$bar.'"');
				$bar--;
			}
		}
		print '['.join(',',$nazvy).'],['.join(',',$vahy).'],[]]';
}
?>
