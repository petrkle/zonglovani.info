<?php
require("hlavicka.inc");
$title="Vysv�tlivky k obr�zk�m - m��ky";
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
Obr�zky zn�zor�uj� jak h�zet m��ky, jejich dr�hu a na�asov�n�. Ke ka�d�mu obr�zku pat�� vysv�tluj�c� text um�st�n� vpravo od n�j.
</p>

<h3>M��ky</h3>
<p>
<? echo img("legendaa.png","Druhy m��k�."); ?>
M��ky jsou rozli�eny barvou a ��slic�.
</p>


<h3>Dr�hy m��k�</h3>
<p>
<? echo img("legendab.png","Dr�ha m��ku."); ?>
Dr�ha po kter� by m��ek m�l let�t je vyzna�ena p�eru�ovanou ��rou. �ipka na konci ur�uje sm�r.
</p>

<h3>Ruce</h3>
<p>
<? echo img("legendac.png","Prav� a lev� ruka."); ?>
Prav� ruka je ozna�ena p�smenem P. Lev� ruka p�smenem L.
</p>

<h3>Pohyby rukou</h3>
<p>
<? echo img("legendad.png","Pohyb prav� ruky."); ?>
V n�kter�ch p��padech je zvlṻ zd�razn�n pohyb rukou. P�eru�ovan� ��ra s �ipkou vede od p�semn�ho ozna�en� ruky.
</p>

<h3>Poloha t�la</h3>
<p>
<? echo img("legendae.png","Zvednut� koleno."); ?>
U slo�it�j��ch trik� je pro n�zornost nakreslen i obrys postavy.
</p>

<a href="#nahore" title="P�esun na za��tek str�nky" class="nahoru">nahoru&nbsp;^^</a>

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
