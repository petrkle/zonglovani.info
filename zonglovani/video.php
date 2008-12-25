<?php
if(isset($_GET["v"])){
	$v=trim($_GET["v"]);
}else{
	header("Location: /zonglovani/video/");
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
$url=explode("watch?v=",$url);
$url=$url[1];

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
<object height="300" width="400">
	<param name="movie" value="http://www.youtube.com/v/<?=$url?>">
	<embed src="http://www.youtube.com/v/<?=$url?>" type="application/x-shockwave-flash" height="300" width="400">
</object>
</p>
<p>
Dal¹í <a href="/zonglovani/video/">¾onglérská videa</a>.
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
