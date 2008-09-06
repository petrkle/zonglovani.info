<?php
require("hlavicka.inc");
$title="Druhy �onglov�n�";
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
Z�kladn� p�ehled zp�sob� �onglov�n�. Nejedn� se o �pln� nebo p�esn� seznam. Jde jen o nazna�en� jak m��e� �onglovat. S ��m v��m m��e� �onglovat se dozv� v <a href="/zonglovani/nacini.html" title="�ognl�rsk� n��in�.">p�ehledu �ongl�rsk�ch pom�cek</a>.
</p>

<h3>H�zen� do vzduchu</h3>
<p>
<?=img("nacinia.png","");?>
P�edm�ty vyhazuje� vzj�ru a ony se p�soben�m gravita�n� s�ly vrac� zp�t.
</p>

<h3>Kontaktn� �onglov�n�</h3>
<p>
<?=img("druhyb.png","");?>
P�edm�ty si kut�l� po t�le. V�t�inou se pou��vaj� m��ky.
</p>


<h3><a href="/zonglovani/kuzely/passing/" title="�onglov�n� ve v�ce lidech.">Passing</a></h3>
<p>
<a href="/zonglovani/kuzely/passing/" title="�onglov�n� ve v�ce lidech."><?=img("druhyc.png","");?></a>
�onglov�n� ve v�ce lidech. Pro passing jsou ide�ln� ku�ely.
</p>

<h3>�onglov�n� se sk�kac�mi m��ky</h3>
<p>
<?=img("druhyd.png","");?>
M��ky neh�z� nahoru, ale odr�� od podlahy.
</p>

<h3>Fireshow</h3>
<p>
<?=img("druhye.png","");?>
�onglov�n� s ohn�m. Existuj� <a href="/zonglovani/kuzely/ohen.html" title="�onglov�n� s ohn�m.">ohniv� ku�ely</a>, ty�e, poi-poi a v�j��e. Ohe� se d� i plivat, ale to je velmi nebezpe�n�.
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
