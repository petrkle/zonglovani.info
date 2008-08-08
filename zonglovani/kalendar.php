<?php
require("hlavicka.inc");
$title="Kalendáø na rok 2006";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">


<div id="obsah">
<h1>Kalendáø na rok 2006</h1>

<p>
<a href="kalendar/zongleruv-kalendar.pdf" title="Kalendáø na rok 2006"><? echo img("img/kalendar-nahled.gif","Kalendáø na rok 2006"); ?></a>
Jednostránkový kalendáø formátu A4. Obsahuje jmeniny, fáze mìsíce a svìtový den ¾onglování.
</p>
<p>
<ul>
<li><a href="kalendar/zongleruv-kalendar.pdf" title="Kalendáø na rok 2006">Kalendáø v PDF</a> - 45 kB</li>
<li><a href="kalendar/zongleruv-kalendar.pdf.tar.bz2" title="Kalendáø na rok 2006">Kalendáø - formát PDF v archivu</a> - 42 kB</li>
<li><a href="kalendar/zongleruv-kalendar.ps.tar.bz2" title="Kalendáø na rok 2006">Kalendáø - formát PS v archivu</a> - 93 kB</li>
</ul>

</p>

<p>
<b>PDF</b> = portable document format a <b>PS</b> = post script. Formáty vhodné pro tisk.
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
