<?php
require("hlavicka.inc");
$title="M�ty a omyly";
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

<h3>�onglov�n� zv�t�uje mozek</h3>
<p>
<?=img("mytya.png","");?>
Typick� zpr�va okurkov� sezony.
</p>


<h3>Kdy� si stoupnu p�ed ze�, p�estanu h�zet m��ky p��li� dop�edu</h3>
<p>
<?=img("mytyb.png","");?>
Za��naj�c� �ongl��i �asto h�z� m��ky dop�edu. St�t �elem ke zdi ale nikomu nepom��e.
</p>





</div>

<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>


</div>


</div>
<div class="spacer"></div>
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
