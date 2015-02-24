<?php
/*******************************************
* Sphider Version 1.3.x
* This program is licensed under the GNU GPL.
* By Ando Saabas          ando(a t)cs.ioc.ee
********************************************/
require('../init.php');
require('../func.php');

$include_dir = './include'; 
include ("$include_dir/commonfuncs.php");

//extract(getHttpVars());
foreach( $_GET as $key => $value ){
$_GET[$key] = strip_tags( substr( $value, 0, 64 ) );
}

foreach( $_POST as $key => $value ){
$_POST[$key] = strip_tags( substr( $value, 0, 64 ) );
}

foreach( $_REQUEST as $key => $value ){
$_REQUEST[$key] = strip_tags( substr( $value, 0, 64 ) );
}

foreach( $_COOKIE as $key => $cookie ){
if( is_array( $cookie ) )
foreach( $cookie as $attr => $value ){
$_COOKIE[$key][$attr] = strip_tags( substr( $value, 0, 64 ) );
}
}


if (isset($_GET['query']) and strlen(trim($_GET['query']))>0)
	$query = trim($_GET['query']);
if (isset($_GET['search'])){
	$search = $_GET['search'];
}

	$domain = '';
	$type = 'and';
	$catid = '';
	$category = '';
	$results = '';
	if (isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	} 
if (isset($_GET['adv'])) 
	$adv = $_GET['adv'];
	
	
$include_dir = "./include"; 
$template_dir = "./templates"; 
$settings_dir = "./settings"; 
$language_dir = "./languages";


require_once("$settings_dir/database.php");
require_once("$language_dir/en-language.php");
require_once("$include_dir/searchfuncs.php");
require_once("$include_dir/categoryfuncs.php");


include "$settings_dir/conf.php";

$trail = new Trail();
$trail->addStep('Vyhledávání','/vyhledavani/');

if(isset($query) and strlen($query)>0){
	$titulek="$query - prohledávání žonglérova slabikáře";
	$trail->addStep('Výsledky vyhledávání');
}else{
	$titulek="Žonglérův slabikář - vyhledávání";
}

$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/h/hledani.png');
$smarty->assign('description','Hledání v žonglérově slabikáři');

$smarty->assign('titulek',$titulek);
$smarty->assign('nadpis','Vyhledávání');
$smarty->assign('notitle',true);
$smarty->assign('robots','noindex,nofollow');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');

include "$language_dir/$language-language.php";


if (preg_match('/[^a-z0-9-.]+/', $domain)) {
	$domain='';
}


if ($results != '') {
	$results_per_page = $results;
}

if (get_magic_quotes_gpc()==1) {
	$query = stripslashes($query);
} 

if (!is_numeric($catid)) {
	$catid = '';
}

if (!is_numeric($category)) {
	$category = '';
} 



if ($catid && is_numeric($catid)) {

	$tpl_['category'] = sql_fetch_all('SELECT category FROM '.$mysql_table_prefix.'categories WHERE category_id='.(int)$_REQUEST['catid']);
}
	
$count_level0 = sql_fetch_all('SELECT count(*) FROM '.$mysql_table_prefix.'categories WHERE parent_num=0');
$has_categories = 0;

if ($count_level0) {
	$has_categories = $count_level0[0][0];
}



require_once("$template_dir/$template/search_form.html");


function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }



function poweredby () {
	global $sph_messages;
    //If you want to remove this, please donate to the project at http://www.sphider.eu/donate.php
    print $sph_messages['Powered by'];?>  <a href="http://www.sphider.eu/"><img src="sphider-logo.png" border="0" style="vertical-align: middle" alt="Sphider"></a>

    <?php 
}


function saveToLog ($query, $elapsed, $results) {
        global $mysql_table_prefix;
    if ($results =="") {
        $results = 0;
    }
    $query =  "insert into ".$mysql_table_prefix."query_log (query, time, elapsed, results) values ('$query', now(), '$elapsed', '$results')";
	mysql_query($query);
                    
	#echo mysql_error();
                        
}

switch ($search) {
	case 1:
		if (!isset($results)) {
			$results = '';
		}
		$search_results = get_search_results($query, $start, $category, $type, $results, $domain);
		require("$template_dir/$template/search_results.html");
	break;
	default:
		if ($show_categories) {
			if ($_REQUEST['catid']  && is_numeric($catid)) {
				$cat_info = get_category_info($catid);
			} else {
				$cat_info = get_categories_view();
			}
			require("$template_dir/$template/categories.html");
		}
	break;
	}

$smarty->display('paticka.tpl');
