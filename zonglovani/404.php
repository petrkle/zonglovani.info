<?php
header ("HTTP/1.0 404 Not Found");
require("hlavicka.inc");
$title="Str�nka nebyla nalezena";
hlavicka($title,__FILE__);
?>



<?php
require("titulek.inc");
titulek(__FILE__);
?>


<div id="stranka">
<div id="ramecek">



<div id="obsah">

<h1>Str�nka nebyla nalezena</h1>

<ul>
<li>
<?
extract($HTTP_SERVER_VARS);
echo "http://".$SERVER_NAME.$REQUEST_URI;
?>
</li>
</ul>
<p>
Je mi l�to, po�adovan� str�nka se bohu�el v �ongl�rov� slabik��i nenach�z�. Patrn� byla odstran�na, p�em�st�na nebo p�ejmenov�na. Pr�b�n� doch�z� k drobn�m �prav�m a je proto mo�n�, �e n�kter� vn�j�� odkazy nyn� nefunguj�.
</p>
	<p>Pomoci v�m m��e n�sleduj�c�:
	<ul>
<li>Pokud jste zapsali adresu do prohl�e�e ru�n�, zkontrolujte p�eklepy.</li>
<li>P�ejd�te na <a href="/zonglovani/" title="�vodn� str�nka �ongl�rova slabik��e.">�vodn� str�nku �ongl�rova slabik��e</a> a d�l pokra�ujte odtud.</li>
<li>Pou�ijte <a href="/mapa-stranek.html" title="Mapa str�nek">mapu str�nek</a>, tj. seznam v�ech str�nek na serveru.</li>
	</ul>
	
	</p>	

<p>Chybov� hl�en�: <strong>HTTP 404 [Page Not Found]</strong></p>


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
#$fp = fopen ("../error.log", "a+");
#fwrite($fp,time().":".$REQUEST_URI."\n");
#fclose($fp);
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->


</body>
</html>
