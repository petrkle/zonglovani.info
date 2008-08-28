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

<div style="float: left; margin: 15px 15px 0 20px; text-align: center;">
<a href="/zonglovani/micky/" title="�onglov�n� s m��ky."><? echo img("micky.png","M��ky"); ?></a>
</div>


<div style="float: left; margin: 15px 15px 0 15px; text-align: center;">
<a href="/zonglovani/kruhy/" title="�onglov�n� s kruhy."><? echo img("kruhy.png","Kruhy"); ?></a>
</div>


<div style="float: left; margin: 15px 0px 0 15px; text-align: center;">
<a href="/zonglovani/kuzely/" title="�onglov�n� s ku�ely."><? echo img("kuzely.png","Ku�ely"); ?></a>
</div>

<p>
�ongl�r�v slabik�� je u�ebnice �onglov�n� se spoustou barevn�ch obr�zk�. Nejv�t�� ��st je v�novan� m��k�m. Dozv� se tak� n�co m�lo o kruz�ch, ku�elech a <a href="/zonglovani/chudy/" title="Ch�dy">ch�d�ch</a>.
</p>

<h3>��m m�m za��t?</h3>

<p>Nejleh�� je <a href="/zonglovani/micky/3/kaskada.html" title="Kask�da se t�emi m��ky.">kask�da s m��ky</a>, v�t�ina �ongl�r� se j� nau�� jako prvn�. Ne� se do toho pust�, poctiv� tr�nuj s <a href="/zonglovani/micky/jak-zacit.html#jeden" title="�pln� z�klad.">jedn�m</a> a <a href="/zonglovani/micky/jak-zacit.html#dva" title="�pln� z�klad.">dv�ma</a> m��ky.</p>

<ul>
<li><a href="/zonglovani/zakladni-pojmy.html" title="Z�kladn� pojmy v �onglov�n�.">Z�kladn� pojmy</a> v �onglov�n�.</li>
<li><a href="/zonglovani/nacini.html" title="Popis r�zn�ch �onglov�tek.">�ongl�rsk� n��in�</a> - s ��m v��m se d� �onglovat.</li>
<li><a href="/zonglovani/faq.html" title="FAQ">�asto kladen� ot�zky</a> a odpov�di na n�.</li>
</ul>

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
