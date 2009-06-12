<?php
require("hlavicka.inc");
$title="Pøístupnost";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>


<div id="stranka">
<div id="ramecek">



<div id="obsah">

<div class="odstavec">

<h2><?=$title?></h2>


<p>
Doufám ¾e nebudete mít s pou¾íváním tìchto stránek ¾ádné potí¾e. Dodr¾uji následující pravidla:
<ul>
<li>Odkazy jsou podtr¾ené.</li>
<li>®ádné otevírání nových oken.</li>
<li>Jednoduchá a srozumitelná navigace.</li>
</ul>
</p>

<p>
Sna¾ím se dodr¾ovat normu <a href="http://www.w3.org/TR/xhtml1/" class="external" onclick="pageTracker._trackPageview('/goto/w3.org');">X-HTML 1.0 Strict</a>. Vzhled je urèen pomocí kaskádových stylù (CSS).
</p>
<p>
®onglérùv slabikáø obsahuje <a href="/video/" title="Videa v ¾onglérovì slabikáøi.">odkazy na videa</a>. K jejich shlédnutí budete potøebovat pøehrávaè souborù flv, avi a wmv.
</p>


</div>
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
paticka($title,__FILE__);
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
