<?php
require("hlavicka.inc");
$title="Vysv�tlivky k obr�zk�m - kruhy";
hlavicka($title,__FILE__);
?>




<?php
require("titulek.inc");
titulek(__FILE__);
?>




<div id="stranka">
<div id="ramecek">

<div id="obsah">


<h1>Vysv�tlivky k obr�zk�m</h1>

<p>
Obr�zky zn�zor�uj� jak h�zet kruhy, jejich dr�hu a na�asov�n�. Ke ka�d�mu obr�zku pat�� vysv�tluj�c� text um�st�n� vpravo od n�j.
</p>

<h3>Kruhy</h3>
<p>
<? echo img("kruhy-legendaa.png","Druhy kruh�."); ?>
Kruhy jsou rozli�eny barvou a ��slic�.
</p>


<h3>Dr�hy kruh�</h3>
<p>
<? echo img("legendab.png","Dr�ha kruhu."); ?>
Dr�ha po kter� by kruh m�l let�t je vyzna�ena p�eru�ovanou ��rou. �ipka na konci ur�uje sm�r.
</p>

<h3>Ruce</h3>
<p>
<? echo img("legendac.png","Prav� a lev� ruka."); ?>
Prav� ruka je ozna�ena p�smenem P. Lev� ruka p�smenem L.
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
