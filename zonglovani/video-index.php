<?php
require("hlavicka.inc");
$title="�ongl�rsk� videa";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">

<div id="obsah">

<h1><?=$title?></h1>

<p>
Dlouho jste �ekali. Ale nakonec to p�i�lo. I v �ongl�rov� slabik��i najdete pohybliv� obr�zky.
</p>

<dl>
<?
$allvideos=file("./video.inc");
foreach($allvideos as $video){
	$video=explode("*",$video);
	$id=$video[0];
	$url=$video[1];
	$title=$video[2];
	$description=$video[3];
	if(ereg("^http://www\.youtube\.com/watch\?v=",$url)){
		$url="$id.html";	
		$class="";
	}else{
		$class=" class=\"external\"";
	}

print "<dt><a href=\"$url\" title=\"$title\"$class>$title</a></dt>";
print "<dd>$description</dd>";
}
?>

</dl>

<p>
Videa na internetu se p�esouvaj�, miz� a zase objevuj�. Pokud naraz� na �patn� odkaz, m��e� mi <a href="/kontakt.html" title="Nahl�en� �patn�ho odkazu.">napsat</a>. Za��d�m jeho opravu.
</p>

<!-- obsah konec -->
</div>



<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>


<!-- menu konec -->
</div>

<!-- ramecek konec -->
</div>


<div class="spacer"></div>
<!-- str�nka konec -->
</div>



<?php
require("paticka.inc");
paticka($title);
?>





<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
