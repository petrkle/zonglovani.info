<?php


function titulek($soubor){
	$foo=basename($soubor);
echo"
<div id=\"hlavicka\">
<a name=\"nahore\" id=\"nahore\"></a>
<div style=\"background: ";

if(ereg("^micky-",$foo)){echo "url(/zonglovani/img/micky-logo.gif) no-repeat 95% 0 ";};
if(ereg("^kruhy-",$foo)){echo "url(/zonglovani/img/kruhy-logo.gif) no-repeat 99% 0 ";};
if(ereg("^kuzely-",$foo)){echo "url(/zonglovani/img/kuzely-logo.gif) no-repeat 92% 0 ";};

echo "transparent;\">
<a href=\"/zonglovani/.\" title=\"�ongl�r�v slabik�� - �vodn� str�nka.\">".img("/zonglovani/img/logo.gif","�ongl�r�v slabik�� - �vodn� str�nka.")."</a>
</div>
</div>
";
};

?>