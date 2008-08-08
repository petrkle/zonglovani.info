<?php


function menu($soubor){
	require("micky-menu.inc");
	require("kruhy-menu.inc");
	require("kuzely-menu.inc");


  $foo=basename($soubor);


	echo "<ul>";
	
if($foo=="index.php"){
	#echo "<li><h4>Úvodní stránka</h4></li>";
}else{
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
	kruhy_menu($foo);
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

#echo "<li><h4><a href=\"/zonglovani/forum/\" title=\"Diskuse o ¾onglování.\">Fórum</a></h4></li>";

	echo "</ul>";
};

?>
