<?php
require("hlavicka.inc");
$title="Zvednut� ku�elu nohou";
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
Neust�l� sh�b�n� pro spadl� ku�ely se stane minulost�.
</p>

<p>
<? echo img("kuzely-kickupa.png","Ku�el na n�rtu nohy."); ?>
Ku�el si polo� �ikmo dr�adlem p�es n�rt prav� nohy.
</p>


<p>
<? echo img("kuzely-kickupb.png","Vykopnut� ku�elu do vzduchu."); ?>
Vykopni nohou do strany. Ku�el se op�e o hole� a n�rt. Vylet� nahoru a m��e� pokra�ovat v �onglov�n�.
</p>

<p>
Obdobn� postup m��e� pou��t pro <a href="/zonglovani/micky/kick-up.html" title="Zvednut� m��ku nohou.">zvednut� m��ku</a>.
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
