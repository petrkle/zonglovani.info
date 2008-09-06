<?php
require("hlavicka.inc");
$title="Cirkusové disciplíny";
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
Dovednosti které nemají s ¾onglováním mnoho spoleèného. Ale z nìjakého dùvodu je provozuje podobný druh lidí jako ¾onglování.
</p>

<h3>Chùze po lanì</h3>
<p>
<?=img("cirkusa.png","Chùze po lanì.");?>
Chodit se dá nejen po pevnì napjatém lanì, ale i po lanì volnì provì¹eném. A to je je¹tì obtí¾nìj¹í.
</p>


<h3>Jednokolka</h3>
<p>
<?=img("cirkusb.png","Jednokolka");?>
Je minimálnì o polovinu skladnìj¹í ne¾ obyèejné jízdní kolo. Existují i teréní verze pro je¾dìní v pøírodì. Vysoké jednokolce na které jezní napø. televizní veèerníèek se øíká ¾irafa. Dal¹í zajímavosti o jednokolkách najde¹ na <a href="http://www.apo-vystoupeni.cz/jednokolky.htm" title="Podrobnosti o jednokolkách." class="external">danovì stránce</a>.
</p>

<h3><a href="/zonglovani/chudy/" title="®onglování na chùdách">Chùdy</a></h3>
<p>
<a href="/zonglovani/chudy/" title="®onglování na chùdách"><?=img("cirkusc.png","Chùdy");?></a>
Diváci milují chùdy. Hlavnì proto¾e jsou v¹ichni zvìdaví kdy chùdaø spadnì a ¹erednì si natluèe. <a href="/zonglovani/chudy/" title="Návod na výrobu chùd.">Návod na výrobu chùd</a>.
</p>

<h3>Skákací boty</h3>
<p>
<?=img("cirkusd.png","Skákací boty");?>
Moderní materiály umo¾nily vznik sedmimílových bot. Skoè na <a href="http://www.apo-vystoupeni.cz/o-skakacich-botach.htm" title="Podrobnosti o skákacích botách." class="external">danovu stránku</a> pro podrobnìj¹í popis.
</p>

<h3>Vysutá hrazda</h3>
<p>
<?=img("cirkuse.png","Vysutá hrazda");?>
Klasické cirkusové èíslo. Vy¾aduje pevné svaly i nervy.
</p>


<h3>Hula-hop kruh</h3>
<p>
<?=img("cirkusf.png","Hula-hop kruh");?>
Plastová obruè kterou udr¾uje¹ v pohybu. Roztáèet mù¾e¹ i nìkolk obruèí najednou.
</p>

<h3>Rola-bola</h3>
<p>
<?=img("cirkusg.png","Rola-bola");?>
Kus prkna na trubce je jednoduchá pomùcka pro cvièení rovnováhy.
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
