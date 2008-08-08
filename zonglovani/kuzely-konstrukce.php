<?php
require("hlavicka.inc");
$title="Konstrukce ku¾elu";
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
<ol class="vp">
<li>hlava</li>
<li>tìlo</li>
<li>rukoje»</li>
<li>patka</li>
</ol>
</p>

<p>
<? echo img("/zonglovani/img/kuzel-konstrukce.png","Prùøez ku¾elem"); ?>
</p>


<p>
Uvnitø ku¾elu je døevìná tyèka. Patka a hlava jsou k ní upevnìny ¹roubem. Rukoje» je k tìlu ku¾elu pøichycena páskou.
</p>

<p>
Kvalitní ku¾ely mají "motanou" rukoje» která nepraská.
</p>

<p>
Hmotnost ku¾elu se pohybuje mezi 200 a¾ 250 gramy.
</p>

<p>
Konkrétní názvy  ku¾elù: piruette, classic, flip, delphin, radical fish, ...
</p>

<p>
<a href="vyroba.html" title="Ku¾el z novin.">Jednoduchý ku¾el</a> mù¾e¹ vyrobit svépomocí z novin.
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
