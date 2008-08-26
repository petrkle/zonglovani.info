<?php


function titulek($soubor){
	$foo=basename($soubor);
echo"
<div id=\"hlavicka\">
<a name=\"nahore\" id=\"nahore\"></a>
<div style=\"background: ";

if(ereg("^micky-",$foo)){echo "url('/zonglovani/img/m/micky-logo.gif') no-repeat 95% 0 ";};
if(ereg("^kruhy-",$foo)){echo "url('/zonglovani/img/k/kruhy-logo.gif') no-repeat 99% 0 ";};
if(ereg("^kuzely-",$foo)){echo "url('/zonglovani/img/k/kuzely-logo.gif') no-repeat 92% 0 ";};

echo "transparent;\">
<a href=\"/zonglovani/.\" title=\"®onglérùv slabikáø - úvodní stránka.\">".img("logo.gif","®onglérùv slabikáø - úvodní stránka.")."</a>
</div>
</div>
";
};

?>
