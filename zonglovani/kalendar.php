<?php
require("hlavicka.inc");
$title="Kalend�� na rok 2006";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">


<div id="obsah">
<h1>Kalend�� na rok 2006</h1>

<p>
<a href="kalendar/zongleruv-kalendar.pdf" title="Kalend�� na rok 2006"><? echo img("img/kalendar-nahled.gif","Kalend�� na rok 2006"); ?></a>
Jednostr�nkov� kalend�� form�tu A4. Obsahuje jmeniny, f�ze m�s�ce a sv�tov� den �onglov�n�.
</p>
<p>
<ul>
<li><a href="kalendar/zongleruv-kalendar.pdf" title="Kalend�� na rok 2006">Kalend�� v PDF</a> - 45 kB</li>
<li><a href="kalendar/zongleruv-kalendar.pdf.tar.bz2" title="Kalend�� na rok 2006">Kalend�� - form�t PDF v archivu</a> - 42 kB</li>
<li><a href="kalendar/zongleruv-kalendar.ps.tar.bz2" title="Kalend�� na rok 2006">Kalend�� - form�t PS v archivu</a> - 93 kB</li>
</ul>

</p>

<p>
<b>PDF</b> = portable document format a <b>PS</b> = post script. Form�ty vhodn� pro tisk.
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
