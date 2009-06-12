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
�onglovat m��e� se spoustou v�c�. A mnoha <a href="/druhy-zonglovani.html" title="Druhy �onglov�n�.">r�zn�mi zp�soby</a>.
</p>

<h3><a href="/micky/" title="�onglov�n� s m��ky.">M��ky</a></h3>
<p>
<a href="/micky/" title="�onglov�n� s m��ky."><?=img("nacinia.png","M��ky");?></a>
Jsou nejleh�� na nau�en�. Sta�� vyhazovat do vzduchu a chytat. <a href="/micky/druhy.html" title="Druhy m��k�.">Druhy m��k�</a>.
</p>

<a name="bounce"><h3>Sk�kac� m��ky</h3></a>
<p>
<?=img("nacinib.png","Sk�kac� m��ky.");?>
M�sto vyhazov�n� do vzduchu je odr�� o podlahu. S polu s <a href="#cigarbox" title="Cigar boxy">cigar boxy</a> je to nejhlu�n�j�� �ongl�rsk� n��in�.
</p>

<h3><a href="/kruhy/" title="�onglov�n� s kruhy.">Kruhy</a></h3>
<p>
<a href="/kruhy/" title="�onglov�n� s kruhy."><?=img("nacinic.png","Kruhy");?></a>
Plastov� o pr�m�ru zhruba 35 cm. Jsou vid�t l�pe ne� m��ky. Vhodn� i pro <a href="/kuzely/passing/" title="�onglov�n� ve v�ce lidech">passing</a>.
</p>

<h3><a href="/kuzely/" title="�onglov�n� s ku�ely.">Ku�ely</a></h3>
<p>
<a href="/kuzely/" title="�onglov�n� s ku�ely."><? echo img("nacinid.png","Ku�ely"); ?></a>
Ku�el tvo�� dv� ��sti. �ir�� - hlava a u��� dr�adlo. Vyhozen�m do vzduchu se rozto��. Za��tek je t쾹� ne� s  m��ky nebo kruhy.
</p>

<h3><a href="/kuzely/ohen.html" title="�onglov�n� s ohn�m.">Ohniv� ku�ely</a></h3>
<p>
<a href="/kuzely/ohen.html" title="�onglov�n� s ohn�m."><? echo img("nacinie.png","Ho��c� ku�ely"); ?></a>
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

<h3><a href="/literatura.html#poi" title="Kn�ka o to�en� s poi.">Poi-poi</a></h3>
<p>
<?=img("nacinik.png","Poi-poi");?>
M��ek p�iv�zan� na prov�zku (+- 0,5m). Na druh�m konci prov�zku je smy�ka pro dr�en�. Do ka�d� ruky si vezme� jednu poiku a to�� s nimi okolo sebe. Ucelen� popis najde� v <a href="/literatura.html#poi" title="Podrobnosti o to�en�.">Richeeho kn�ce</a>.
</p>

<h3>Tenisov� rakety</h3>
<p>
<?=img("nacinil.png","Tenisov� raketa");?>
L�taj� skoro stejn� jako ku�ely. Jen jsou trochu v�t��.
</p>

<h3>Crystal ball</h3>
<p>
<?=img("nacinim.png","Crystal ball");?>
V�t�� m��ek z um�l� hmoty (polyakryl�t ?). Vypad� jako sklen�n�. Pou��v� se na kontaktn� �onglov�n� - neh�z� se sn�m, ale kut�l� se po rukou a jin�ch ��stech t�la.
</p>

<h3>Ty�</h3>
<p>
<?=img("nacinij.png","Ty�");?>
Dal�� p�edm�t pro kontaktn� �onglov�n�. Obvykle s knoty na konc�ch k zap�len�.
</p>

<a name="cigarbox"><h3>Cigar boxy</h3></a>
<p>
<?=img("nacinio.png","Cigar boxy");?>
Cigar boxy jsou d�ev�n� krabi�ky. Dv� krajn� dr�� rukou a t�et� mezi nimy p�ehazuje�. Vznik� p�i tom skoro stejn� hluk jako p�i �onglov�n� se <a href="#bounce" title="Odr�en� m��k� o podlahu.">sk�kac�mi m��ky</a>.
</p>

<h3>��tky</h3>
<p>
<?=img("nacinin.png","��tky");?>
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
