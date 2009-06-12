<?php
require("hlavicka.inc");
$title="Jak odkazovat na �ongl�r�v slabik��";
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

<h1>Jak odkazovat na �ongl�r�v slabik��</h1>

<p>
Pro vlo�en� odkazu sta�� do tv� str�nky zkop�rovat jeden z n�sleduj�c�ch k�d�.
</p>

<h2>Textov� odkaz</h2>
<p>
<code>
&lt;a href="http://petrkle.wz.cz/"
 title="Obr�zkov� u�ebnice �onglov�n�."&gt;�ongl�r�v slabik��&lt;/a&gt;
</code>
</p>
<p>
<a href="http://petrkle.wz.cz/" title="Obr�zkov� u�ebnice �onglov�n�.">�ongl�r�v slabik��</a>
</p>

<h2>Textov� odkaz s popiskem</h2>
<p>
<code>
&lt;a href="http://petrkle.wz.cz/"
 title="Obr�zkov� u�ebnice �onglov�n�."&gt;�ongl�r�v slabik��&lt;/a&gt; - obr�zkov� u�ebnice �onglov�n�. Pr�vodce sv�tem l�taj�c�ch m��k�, kruh� a ku�el�.
</code>
</p>
<p>
<a href="http://petrkle.wz.cz/" title="Obr�zkov� u�ebnice �onglov�n�.">�ongl�r�v slabik��</a> - obr�zkov� u�ebnice �onglov�n�. Pr�vodce sv�tem l�taj�c�ch m��k�, kruh� a ku�el�.
</p>

<h2>Ikonka 88x31</h2>
<p>
<code>
&lt;a href="http://petrkle.wz.cz/"
 title="Obr�zkov� u�ebnice �onglov�n�."&gt;&lt;img src="http://petrkle.wz.cz/img/s/slabikar1.gif" height="31" width="88" border="0" alt="�ongl�r�v slabik��." title="�ongl�r�v slabik��." /&gt;&lt;/a&gt;
</code>
</p>

<p>
<a href="/img/s/slabikar1.gif" title="�ongl�r�v slabik��"><img src="/img/s/slabikar1.gif" height="31" width="88" border="0" style="border: 0;" alt="�ongl�r�v slabik��" title="�ongl�r�v slabik��" /></a>
</p>


<h2>Ikonka 120x60</h2>
<p>
<code>
&lt;a href="http://petrkle.wz.cz/"
 title="Obr�zkov� u�ebnice �onglov�n�."&gt;&lt;img src="http://petrkle.wz.cz/img/s/slabikar2.gif" height="60" width="120" border="0" alt="�ongl�r�v slabik��." title="�ongl�r�v slabik��." /&gt;&lt;/a&gt;
</code>
</p>
<p>
<a href="/img/s/slabikar2.gif" title="�ongl�r�v slabik��"><img src="/img/s/slabikar2.gif" height="60" width="120" border="0" style="border: 0;" alt="�ongl�r�v slabik��" title="�ongl�r�v slabik��" /></a>
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
paticka($title);
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
