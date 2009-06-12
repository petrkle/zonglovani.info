<?php
require("hlavicka.inc");
$title="Cirkusov� discipl�ny";
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
Dovednosti kter� nemaj� s �onglov�n�m mnoho spole�n�ho. Ale z n�jak�ho d�vodu je provozuje podobn� druh lid� jako �onglov�n�.
</p>

<h3>Ch�ze po lan�</h3>
<p>
<?=img("cirkusa.png","Ch�ze po lan�.");?>
Chodit se d� nejen po pevn� napjat�m lan�, ale i po lan� voln� prov�en�m. A to je je�t� obt�n�j��.
</p>


<h3>Jednokolka</h3>
<p>
<?=img("cirkusb.png","Jednokolka");?>
Je minim�ln� o polovinu skladn�j�� ne� oby�ejn� j�zdn� kolo. Existuj� i ter�n� verze pro je�d�n� v p��rod�. Vysok� jednokolce na kter� jezn� nap�. televizn� ve�ern��ek se ��k� �irafa. Dal�� zaj�mavosti o jednokolk�ch najde� na <a href="http://www.apo-vystoupeni.cz/jednokolky.php" title="Podrobnosti o jednokolk�ch." class="external" onclick="pageTracker._trackPageview('/goto/apo-vystoupeni.cz/jednokolky.php');">danov� str�nce</a>.
</p>

<h3><a href="/chudy/" title="�onglov�n� na ch�d�ch">Ch�dy</a></h3>
<p>
<a href="/chudy/" title="�onglov�n� na ch�d�ch"><?=img("cirkusc.png","Ch�dy");?></a>
Div�ci miluj� ch�dy. Hlavn� proto�e jsou v�ichni zv�dav� kdy ch�da� spadne a �eredn� si natlu�e. <a href="/chudy/" title="N�vod na v�robu ch�d.">N�vod na v�robu ch�d</a>.
</p>

<h3>Sk�kac� boty</h3>
<p>
<?=img("cirkusd.png","Sk�kac� boty");?>
Modern� materi�ly umo�nily vznik sedmim�lov�ch bot. Sko� na <a href="http://www.apo-vystoupeni.cz/o-skakacich-botach.php" title="Podrobnosti o sk�kac�ch bot�ch." class="external" onclick="pageTracker._trackPageview('/goto/apo-vystoupeni.cz/o-skakacich-botach.php');">danovu str�nku</a> pro podrobn�j�� popis.
</p>

<h3>Vysut� hrazda</h3>
<p>
<?=img("cirkuse.png","Vysut� hrazda");?>
Klasick� cirkusov� ��slo. Vy�aduje pevn� svaly i nervy.
</p>


<h3>Hula-hop kruh</h3>
<p>
<?=img("cirkusf.png","Hula-hop kruh");?>
Plastov� obru� kterou udr�uje� v pohybu. Rozt��et m��e� i n�kolik obru�� najednou.
</p>

<h3>Rola-bola</h3>
<p>
<?=img("cirkusg.png","Rola-bola");?>
Kus prkna na trubce je jednoduch� pom�cka pro cvi�en� rovnov�hy.
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
