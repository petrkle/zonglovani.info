<?php

if(eregi("index\.php$",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: .");
	exit();
}

require("utils.inc");
require("hlavicka.inc");
$title="�ongl�r�v slabik��";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">

<div id="obsah">

<p>
�ongl�r�v slabik�� je u�ebnice �onglov�n� se spoustou barevn�ch obr�zk�.
</p>

<h3><a href="/zonglovani/micky/" title="�onglov�n� s m��ky.">�onglov�n� s m��ky</a></h3>
<p>
<a href="/zonglovani/micky/" title="�onglov�n� s m��ky."><? echo img("intro-micky.png","M��ky"); ?></a>
<a href="/zonglovani/micky/jak-zacit.html" title="Jak za��t �onglovat s m��ky.">Prvn� trik</a> se t�emi m��ky zvl�dne� za jedno odpoledne. Vyber si <a href="micky/druhy.html" title="Druhy m��k� pro �onglov�n�">spr�vn� m��ek</a> a za�ni <a href="trenink.html" title="Rady pro tr�nkink.">tr�novat</a> hned te�.
</p>

<h3><a href="/zonglovani/kuzely/" title="�onglov�n� s ku�ely.">�onglov�n� s ku�ely</a></h3>
<p>
<a href="/zonglovani/kuzely/" title="�onglov�n� s ku�ely."><? echo img("intro-kuzely.png","Ku�ely"); ?></a>
<a href="/zonglovani/kuzely/jak-zacit.html" title="Jak za��t �onglovat s ku�ely.">Za��t �onglovat s ku�ely</a> je trochu t쾹� ne� s m��ky. Odm�nou ti bude �pln� nov� pohled na �onglov�n�. 
</p>

<h3><a href="/zonglovani/kuzely/passing/" title="�onglov�n� ve v�ce lidech.">Passing</a> - �onglov�n� ve v�ce lidech</h3>
<p>
<a href="/zonglovani/kuzely/passing/" title="�onglov�n� ve v�ce lidech."><? echo img("intro-passing.png","Passing"); ?></a>
Kr�lovsk� discipl�na �onglov�n�. U�ije� si p�i n� nejv�c legrace.
</p>

<h3>Dal�� informace o �onglov�n�</h3>
<p>
<ul>
<li><a href="/zonglovani/zakladni-pojmy.html" title="Z�kladn� pojmy v �onglov�n�.">Z�kladn� pojmy</a> v �onglov�n�.</li>
<li><a href="/zonglovani/nacini.html" title="Popis r�zn�ch �onglov�tek.">�ongl�rsk� n��in�</a> - s ��m v��m se d� �onglovat.</li>
<li><a href="/zonglovani/faq.html" title="FAQ">�asto kladen� ot�zky</a> a odpov�di na n�.</li>
</ul>
</p>

<!-- obsah konec -->
</div>



<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>

<!-- menu konec -->
</div>

<!-- ramecek konec -->
</div>


<div class="spacer"></div>
<!-- str�nka konec -->
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
