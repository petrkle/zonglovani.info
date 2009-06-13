<?php
require("utils.inc");
$titulek="Pøístup zakázán";
echo indexhlavicka($titulek);
?>

<ul>
<li>
<?
echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
?>
</li>
</ul>
<p>
Je mi líto, po¾adovanou stránku nelze zobrazit.
</p>
	<p>Pomoci vám mù¾e následující:
	<ul>
<li>Pøejdìte na <a href="/" title="Úvodní stránka" target="_top">úvodní stránku webu</a> a dál pokraèujte odtud.</li>
<li>Pou¾ijte <a href="/mapa-stranek.html" title="Mapa stránek" target="_top">mapu stránek</a>, tj. seznam v¹ech stránek na serveru.</li>
	</ul>
</p>	


<p>Chybové hlá¹ení: <strong>HTTP 403 [Forbidden]</strong></p>

<?
echo indexpaticka("","");
?>


<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->


</div>

</body>
</html>
