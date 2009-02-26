<?php


function menu($soubor){
	require("micky-menu.inc");
	require("kruhy-menu.inc");
	require("kuzely-menu.inc");


  $foo=basename($soubor);


	echo "<ul>";
	
if($foo!="index.php"){
	echo "<li><h4><a href=\"/zonglovani/\" title=\"®onglérùv slabikáø - úvodní stránka.\">Úvodní stránka<a></h4></li>";
};


if($foo=="micky-index.php"){
	echo "<li><h4>Míèky</h4>";
}else{
	echo "<li><h4><a href=\"/zonglovani/micky/\" title=\"Zaèínáme s míèky.\">Míèky</a></h4>";
}
	micky_menu($foo);
	echo "</li>";


if($foo=="kruhy-index.php"){
	echo "<li><h4>Kruhy</h4>";
}else{
	echo "<li><h4><a href=\"/zonglovani/kruhy/\" title=\"Zaèínáme s kruhy.\">Kruhy</a></h4>";
}
	echo "</li>";

if($foo=="kuzely-index.php"){
	echo "<li><h4>Ku¾ely</h4>";
}else{
	echo "<li><h4><a href=\"/zonglovani/kuzely/\" title=\"Zaèínáme s ku¾ely.\">Ku¾ely</a></h4>";
}
	kuzely_menu($foo);
	echo "</li>";

if($foo=="ostatni-index.php"){
	echo "<li><h4>Ostatní</h4></li>";
}else{
	echo "<li><h4><a href=\"/zonglovani/ostatni.html\" title=\"V¹e ostatní o ¾onglování.\">Ostatní</a></h4></li>";
};

print "\n<!-- start -->\n";
if($foo=="video-index.php"){
	print "<li><ul><li><strong>Video</strong></li></ul></li>";
}else{
	print "<li><ul><li><a href=\"/zonglovani/video/\" title=\"Zajímavá ¾onglérská videa.\">Video</a></li></ul></li>";
};
	echo "</ul>";

	print "<br /><ul><li><a href=\"http://www.ddmpraha.cz/index.php?hledej=ok&typ_menu=6&id_menu=1&pobocka_=268&typ_ikonka=77\" title=\"®onglování na Klamovce.\" class=\"external\" onclick=\"pageTracker._trackPageview('/goto/ddmpraha.cz');\">Kurz ¾onglování<br />na&nbsp;Klamovce</a></li></ul>";
print "\n<!-- stop -->\n";

};

?>
