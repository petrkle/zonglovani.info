<?php
require("hlavicka.inc");
$title="Vysv�tlivky k obr�zk�m - ku�ely";
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
Obr�zky zn�zor�uj� jak h�zet ku�ely, jejich dr�hu a na�asov�n�. Ke ka�d�mu obr�zku pat�� vysv�tluj�c� text um�st�n� vpravo od n�j.
</p>

<h3>Ku�ely</h3>
<p>
<? echo img("kuzely-legendaa.png","Druhy ku�el�."); ?>
Ku�ely jsou rozli�eny barvou a ��slic�.
</p>


<h3>Dr�hy ku�elu</h3>
<p>
<? echo img("kuzely-legendab.png","Dr�ha ku�elu."); ?>
Dr�ha po kter� by ku�el m�l let�t je vyzna�ena p�eru�ovanou ��rou. �ipka na konci ur�uje sm�r.
</p>

<h3>Ruce</h3>
<p>
<? echo img("legendac.png","Prav� a lev� ruka."); ?>
Prav� ruka je ozna�ena p�smenem P. Lev� ruka p�smenem L.
</p>


<h3><a href="/kuzely/passing/" title="�onglov�n� ve v�ce lidech">Passing</a></h3>
<p>
<? echo img("kuzely-legendad.png","Passing."); ?>
Zobrazen� polohy �ongl�r� p�i passov�n�. Pohled shora. �ern� p�eru�ovan� �ipky zna�� dr�hu ku�el�. �erven� pln� �ipka zobrazuje p�esun �ongl�ra.
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
