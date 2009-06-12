<?php
require("hlavicka.inc");
$title="�onglov�n� - z�kladn� pojmy";
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

<h3>�ongl�r</h3>
<p>
<? echo img("zongler.png","�ongl�r"); ?>
S okouzluj�c� lehkost� p�edv�d� neuv��iteln� kousky. Usm�v� se a v�echy pobav�.
</p>

<h3><a href="/micky/3/kaskada.html" title="N�vod pro 3 m��ky.">Kask�da</a></h3>
<p>
<a href="/micky/3/kaskada.html" title="N�vod pro 3 m��ky."><? echo img("help-kaskada.png","Kask�da"); ?></a>
Nejsnadn�j�� zp�sob �onglov�n�. �ongluje se s lich�m po�tem p�edm�t� - 3, 5, 7, .... St��dav� h�z� prav� a lev� ruka.
</p>

<h3><a href="/micky/3/sprcha.html" title="N�vod pro 3 m��ky.">Sprcha</a></h3>
<p>
<a href="/micky/3/sprcha.html" title="N�vod pro 3 m��ky."><? echo img("help-sprcha.png","Sprcha"); ?></a>
�onglov�n� dokole�ka. Jedna ruka h�z� vrchem, druh� chyt� a h�z� spodem. Mo�n� s lich�m i sud�m po�tem p�edm�t�.
</p>

<h3><a href="/micky/4/fontana.html" title="N�vod pro 4 m��ky.">Font�na</a></h3>
<p>
<a href="/micky/4/fontana.html" title="N�vod pro 4 m��ky."><? echo img("help-fontana.png","Font�na"); ?></a>
�onglov�n� se sud�m po�tem p�edm�t� - 4, 6, 8, .... V ka�d� ruce polovina.
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
