<?php
if(isset($_GET["v"])){
	$v=trim($_GET["v"]);
}else{
	header("Location: /video/");
	exit();
}

$allvideos=file("./video.inc");
$exist=false;

foreach($allvideos as $video){
	if(!$exist){
		$video=explode("*",$video);

		$id=$video[0];
		$url=$video[1];
		$title=$video[2];
		$description=$video[3];
	}
	if($id==$v){
		$exist=true;
	}
}

if(!$exist){
	require("404.inc");
	exit();
}

require("hlavicka.inc");

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
<?=$description?>
</p>

<p class="youtubevideo">
<?
if(ereg("^http://www\.youtube\.com/watch\?v=",$url)){
$url=explode("watch?v=",$url);
$url=$url[1];
?>
<object height="380" width="480">
	<param name="movie" value="http://www.youtube.com/v/<?=$url?>">
	<embed src="http://www.youtube.com/v/<?=$url?>" type="application/x-shockwave-flash" height="380" width="480">
</object>
<?}

if(ereg("^http://juggling\.tv:",$url)){
$id=explode(".tv:",$url);
$id=$id[1];
?>
	<object type="application/x-shockwave-flash" width="480" height="380"wmode="transparent" data="http://www.juggling.tv/vaults/flvplayer.swf?file=http://www.juggling.tv/vaults/flvideo/<?=$id?>.flv&autostart=false&showfsbutton=true">
        <param name="movie" value="http://www.juggling.tv/vaults/flvplayer.swf?file=http://www.juggling.tv/vaults/flvideo/<?=$id?>.flv&autostart=false&showfsbutton=true" />
        <param name="wmode" value="transparent" />
		<param name="allowScriptAccess" value="sameDomain" />
<embed src="http://www.juggling.tv/vaults/flvplayer.swf?file=http://www.juggling.tv/vaults/flvideo/<?=$id?>.flv&autostart=false&showfsbutton=true" loop="false" width="480" height="380" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<?}?>

</p>
<p>
Dal¹í <a href="/video/">¾onglérská videa</a>.
</p>

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
