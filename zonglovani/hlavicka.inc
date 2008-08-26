<?php
if($HTTP_SERVER_VARS["SERVER_NAME"]!="my-test"){
	error_reporting(0);
}else{
	error_reporting(E_ALL);
};

if(eregi("^www\.",$_SERVER["HTTP_HOST"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".ereg_replace("^www\.","",$_SERVER["HTTP_HOST"]).$_SERVER["REQUEST_URI"]);
	exit();
}

if(eregi("\.php\?show",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".$_SERVER["HTTP_HOST"].ereg_replace("(micky|kruhy|kuzely)\-(2|3|4|5)\.php\?show=(micky|kruhy|kuzely)\-(2|3|4|5)\-(.*)$","\\1/\\2/\\5.html",$_SERVER["REQUEST_URI"]));
	exit();
}

if(eregi("(micky|kruhy|kuzely)\-(2|3|4|5)\.php$",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".$_SERVER["HTTP_HOST"].ereg_replace("(micky|kruhy|kuzely)\-(2|3|4|5)\.php$","\\1/\\2/",$_SERVER["REQUEST_URI"]));
	exit();
}

if(eregi("(micky|kruhy|kuzely)\-index\.php$",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".$_SERVER["HTTP_HOST"].ereg_replace("(micky|kruhy|kuzely)\-index\.php$","\\1/",$_SERVER["REQUEST_URI"]));
	exit();
}


function hlavicka($titulek){
  echo("<?xml version=\"1.0\" encoding=\"iso-8859-2\"?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"cs\" lang=\"cs\">
<head>
	<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-2\" />
	<title>".$titulek."</title>
	<meta name=\"description\" content=\"�ongl�r�v slabik�� - obr�zkov� u�ebnice �onglov�n�.\" />
	<meta name=\"keywords\" content=\"�ongov�n�, m��ky, kruhy, ku�ely, n�vod, kask�da, mills mess\" />
	<style media=\"screen,projection\" type=\"text/css\">@import url(/zonglovani/zonglovani.css);</style>
	<style media=\"print\" type=\"text/css\">@import url(/zonglovani/zonglovani-tisk.css);</style>
	<meta name=\"robots\" content=\"index,follow\" />
</head>
<body>
");

};

function img($obrazek,$popisek){
	$rozmery=getimagesize(str_replace("/zonglovani/","",$obrazek));
	return ("<img src=\"".$obrazek."\" ".$rozmery[3]." title=\"".$popisek."\" alt=\"".$popisek."\" />\n");
}

?>