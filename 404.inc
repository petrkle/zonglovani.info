<?php
header ("HTTP/1.0 404 Not Found");
require("hlavicka.inc");
$title="Stránka nebyla nalezena";
hlavicka($title,__FILE__);
?>



<?php
require("titulek.inc");
titulek(__FILE__);
?>


<div id="stranka">
<div id="ramecek">



<div id="obsah">

<h1>Stránka nebyla nalezena</h1>

<ul>
<li>
<?
echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
?>
</li>
</ul>
<p>
Je mi líto, po¾adovaná stránka se bohu¾el v ¾onglérovì slabikáøi nenachází. Patrnì byla odstranìna, pøemístìna nebo pøejmenována. Prùbì¾nì dochází k drobným úpravám a je proto mo¾né, ¾e nìkteré vnìj¹í odkazy nyní nefungují.
</p>
	<p>Pomoci vám mù¾e následující:
	<ul>
<li>Pokud jste zapsali adresu do prohlí¾eèe ruènì, zkontrolujte pøeklepy.</li>
<li>Pøejdìte na <a href="/" title="Úvodní stránka ¾onglérova slabikáøe.">úvodní stránku ¾onglérova slabikáøe</a> a dál pokraèujte odtud.</li>
<li>Pou¾ijte <a href="/mapa-stranek.html" title="Mapa stránek">mapu stránek</a>, tj. seznam v¹ech stránek na serveru.</li>
	</ul>
	
	</p>	

<p>Chybové hlá¹ení: <strong>HTTP 404 [Page Not Found]</strong></p>


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
print paticka($title);
?>
