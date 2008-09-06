<?php
require("hlavicka.inc");
$title="�ongl�rsk� n��in�";
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
�onglovat m��e� se spoustou v�c�. A mnoha <a href="/zonglovani/druhy-zonglovani.html" title="Druhy �onglov�n�.">r�zn�mi zp�soby</a>.
</p>

<h3><a href="/zonglovani/micky/" title="�onglov�n� s m��ky.">M��ky</a></h3>
<p>
<a href="/zonglovani/micky/" title="�onglov�n� s m��ky."><?=img("nacinia.png","M��ky");?></a>
Jsou nejleh�� na nau�en�. Sta�� vyhazovat do vzduchu a chytat. <a href="/zonglovani/micky/druhy.html" title="Druhy m��k�.">Druhy m��k�</a>.
</p>

<h3>Sk�kac� m��ky</h3>
<p>
<?=img("nacinib.png","Sk�kac� m��ky.");?>
M�sto vyhazov�n� do vzduchu je odr�� o podlahu.
</p>

<h3><a href="/zonglovani/kruhy/" title="�onglov�n� s kruhy.">Kruhy</a></h3>
<p>
<a href="/zonglovani/kruhy/" title="�onglov�n� s kruhy."><?=img("nacinic.png","Kruhy");?></a>
Plastov� o pr�m�ru zhruba 35 cm. Jsou vid�t l�pe ne� m��ky. Vhodn� i pro <a href="/zonglovani/kuzely/passing/" title="�onglov�n� ve v�ce lidech">passing</a>.
</p>

<h3><a href="/zonglovani/kuzely/" title="�onglov�n� s ku�ely.">Ku�ely</a></h3>
<p>
<a href="/zonglovani/kuzely/" title="�onglov�n� s ku�ely."><? echo img("nacinid.png","Ku�ely"); ?></a>
Ku�el tvo�� dv� ��sti. �ir�� - hlava a u��� dr�adlo. Vyhozen�m do vzduchu se rozto��. Za��tek je t쾹� ne� s  m��ky nebo kruhy.
</p>

<h3><a href="/zonglovani/kuzely/ohen.html" title="�onglov�n� s ohn�m.">Ohniv� ku�ely</a></h3>
<p>
<a href="/zonglovani/kuzely/ohen.html" title="�onglov�n� s ohn�m."><? echo img("nacinie.png","Ho��c� ku�ely"); ?></a>
Stejn� jako ku�ely, jen m�sto �ir�� ��sti je knot. Napust� se ho�lavinou a zap�l�.
</p>

<h3>Diabolo</h3>
<p>
<?=img("nacinif.png","Diabolo");?>
C�vka kterou rozt��� pomoc� prov�zk� a h�lek.
</p>

<h3>Devilstick</h3>
<p>
<?=img("nacinig.png","Devilstick");?>
H�lka kterou udr�uje� ve vzduchu dv�ma dal��mi h�lkami.
</p>

<h3>Flowerstick</h3>
<p>
<?=img("nacinih.png","Flowerstick");?>
H�lka kter� m� na konc�ch t��sn�. Ve vzduchu j� dr�� pomoc� dvou dal��ch h�lek.
</p>

<h3>Jo-jo</h3>
<p>
<?=img("nacinii.png","Jo-jo");?>
C�vka uv�zan� na prov�zku.
</p>

<h3>Poi-poi</h3>
<p>
M��ek p�iv�zan� na prov�zku (+- 0,5m). Na druh�m konci prov�zku je smy�ka pro dr�en�. Do ka�d� ruky si vezme� jednu poiku a to�� s nimi okolo sebe.
</p>

<h3>Tenisov� rakety</h3>
<p>
L�taj� skoro stejn� jako ku�ely. Jen jsou trochu v�t��.
</p>

<h3>Crystal ball</h3>
<p>
V�t�� m��ek z um�l� hmoty (polyakryl�t ?). Vypad� jako sklen�n�. Pou��v� se na kontaktn� �onglov�n� - neh�z� se sn�m, ale kut�l� se po rukou a jin�ch ��stech t�la.
</p>

<h3>Ty�</h3>
<p>
<?=img("nacinij.png","Ty�");?>
Dal�� p�edm�t pro kontaktn� �onglov�n�. Obvykle s knoty na konc�ch k zap�len�.
</p>

<h3>��tky</h3>
<p>
�dajn� sna��� ne� m��ky. Doporu�ovan� pro �pln� za��te�n�ky.
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
