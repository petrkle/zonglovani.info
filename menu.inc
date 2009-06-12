<?php


function menu($soubor){
	require("micky-menu.inc");
	require("kruhy-menu.inc");
	require("kuzely-menu.inc");


  $foo=basename($soubor);


	echo "<ul>";
	
if($foo!="index.php"){
	echo "<li><h4><a href=\"/\" title=\"®onglérùv slabikáø - úvodní stránka.\">Úvodní stránka<a></h4></li>";
};


if($foo=="micky-index.php"){
	echo "<li><h4>Míèky</h4>";
}else{
	echo "<li><h4><a href=\"/micky/\" title=\"Zaèínáme s míèky.\">Míèky</a></h4>";
}
	micky_menu($foo);
	echo "</li>";


if($foo=="kruhy-index.php"){
	echo "<li><h4>Kruhy</h4>";
}else{
	echo "<li><h4><a href=\"/kruhy/\" title=\"Zaèínáme s kruhy.\">Kruhy</a></h4>";
}
	echo "</li>";

if($foo=="kuzely-index.php"){
	echo "<li><h4>Ku¾ely</h4>";
}else{
	echo "<li><h4><a href=\"/kuzely/\" title=\"Zaèínáme s ku¾ely.\">Ku¾ely</a></h4>";
}
	kuzely_menu($foo);
	echo "</li>";

if($foo=="ostatni-index.php"){
	echo "<li><h4>Ostatní</h4>";
print "\n<!-- start -->\n";
print "<ul>";
if($foo=="video-index.php"){
	print "<li><strong>Video</strong></li>";
}else{
	print "<li><a href=\"/video/\" title=\"Zajímavá ¾onglérská videa.\">Video</a></li>";
};
print "</ul>";
print "\n<!-- stop -->\n";
	
	echo "</li>";
}else{
	echo "<li><h4><a href=\"/ostatni.html\" title=\"V¹e ostatní o ¾onglování.\">Ostatní</a></h4>";
print "\n<!-- start -->\n";
print "<ul>";
if($foo=="video-index.php"){
	print "<li><strong>Video</strong></li>";
}else{
	print "<li><a href=\"/video/\" title=\"Zajímavá ¾onglérská videa.\">Video</a></li>";
};
print "</ul>";
print "\n<!-- stop -->\n";

	echo "</li>";
};


print "</ul>";
};

?>
