<?php
require("hlavicka.inc");
$title="®onglérská videa";
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
Dlouho jste èekali. Ale nakonec to pøi¹lo. I v ¾onglérovì slabikáøi najdete pohyblivé obrázky.
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
Videa na internetu se pøesouvají, mizí a zase objevují. Pokud narazí¹ na ¹patný odkaz, mù¾e¹ mi <a href="/kontakt.html" title="Nahlá¹ení ¹patného odkazu.">napsat</a>. Zaøídím jeho opravu.
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
<!-- stránka konec -->
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
