<?php


function menu($soubor){
	require("micky-menu.inc");
	require("kruhy-menu.inc");
	require("kuzely-menu.inc");


  $foo=basename($soubor);


	echo "<ul>";
	
if($foo=="index.php"){
	#echo "<li><h4>�vodn� str�nka</h4></li>";
}else{
	echo "<li><h4><a href=\"/zonglovani/\" title=\"�ongl�r�v slabik�� - �vodn� str�nka.\">�vodn� str�nka<a></h4></li>";
};


if($foo=="micky-index.php"){
	echo "<li><h4>M��ky</h4>";
}else{
	echo "<li><h4><a href=\"/zonglovani/micky/\" title=\"Za��n�me s m��ky.\">M��ky</a></h4>";
}
	micky_menu($foo);
	echo "</li>";


if($foo=="kruhy-index.php"){
	echo "<li><h4>Kruhy</h4>";
}else{
	echo "<li><h4><a href=\"/zonglovani/kruhy/\" title=\"Za��n�me s kruhy.\">Kruhy</a></h4>";
}
	echo "</li>";

if($foo=="kuzely-index.php"){
	echo "<li><h4>Ku�ely</h4>";
}else{
	echo "<li><h4><a href=\"/zonglovani/kuzely/\" title=\"Za��n�me s ku�ely.\">Ku�ely</a></h4>";
}
	kuzely_menu($foo);
	echo "</li>";

if($foo=="ostatni-index.php"){
	echo "<li><h4>Ostatn�</h4></li>";
}else{
	echo "<li><h4><a href=\"/zonglovani/ostatni.html\" title=\"V�e ostatn� o �onglov�n�.\">Ostatn�</a></h4></li>";
};

print "\n<!-- start -->\n";
if($foo=="video-index.php"){
	print "<li><ul><li><strong>Video</strong></li></ul></li>";
}else{
	print "<li><ul><li><strong><a href=\"/zonglovani/video/\" title=\"Zaj�mav� �ongl�rsk� videa.\">Video</a></strong></li></ul></li>";
};
print "\n<!-- stop -->\n";

	echo "</ul>";
};

?>