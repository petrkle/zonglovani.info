<?php
require("hlavicka.inc");
$title="®onglérské náèiní";
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
®onglovat mù¾e¹ se spoustou vìcí. A mnoha <a href="/druhy-zonglovani.html" title="Druhy ¾onglování.">rùznými zpùsoby</a>.
</p>

<h3><a href="/micky/" title="®onglování s míèky.">Míèky</a></h3>
<p>
<a href="/micky/" title="®onglování s míèky."><?=img("nacinia.png","Míèky");?></a>
Jsou nejlehèí na nauèení. Staèí vyhazovat do vzduchu a chytat. <a href="/micky/druhy.html" title="Druhy míèkù.">Druhy míèkù</a>.
</p>

<a name="bounce"><h3>Skákací míèky</h3></a>
<p>
<?=img("nacinib.png","Skákací míèky.");?>
Místo vyhazování do vzduchu je odrá¾í¹ o podlahu. S polu s <a href="#cigarbox" title="Cigar boxy">cigar boxy</a> je to nejhluènìj¹í ¾onglérské náèiní.
</p>

<h3><a href="/kruhy/" title="®onglování s kruhy.">Kruhy</a></h3>
<p>
<a href="/kruhy/" title="®onglování s kruhy."><?=img("nacinic.png","Kruhy");?></a>
Plastové o prùmìru zhruba 35 cm. Jsou vidìt lépe ne¾ míèky. Vhodné i pro <a href="/kuzely/passing/" title="®onglování ve více lidech">passing</a>.
</p>

<h3><a href="/kuzely/" title="®onglování s ku¾ely.">Ku¾ely</a></h3>
<p>
<a href="/kuzely/" title="®onglování s ku¾ely."><? echo img("nacinid.png","Ku¾ely"); ?></a>
Ku¾el tvoøí dvì èásti. ©ir¹í - hlava a u¾¹í dr¾adlo. Vyhozením do vzduchu se roztoèí. Zaèátek je tì¾¹í ne¾ s  míèky nebo kruhy.
</p>

<h3><a href="/kuzely/ohen.html" title="®onglování s ohnìm.">Ohnivé ku¾ely</a></h3>
<p>
<a href="/kuzely/ohen.html" title="®onglování s ohnìm."><? echo img("nacinie.png","Hoøící ku¾ely"); ?></a>
Stejné jako ku¾ely, jen místo ¹ir¹í èásti je knot. Napustí se hoølavinou a zapálí.
</p>

<h3>Diabolo</h3>
<p>
<?=img("nacinif.png","Diabolo");?>
Cívka kterou roztáèí¹ pomocí provázkù a hùlek.
</p>

<h3>Devilstick</h3>
<p>
<?=img("nacinig.png","Devilstick");?>
Hùlka kterou udr¾uje¹ ve vzduchu dvìma dal¹ími hùlkami.
</p>

<h3>Flowerstick</h3>
<p>
<?=img("nacinih.png","Flowerstick");?>
Hùlka která má na koncích tøásnì. Ve vzduchu jí dr¾í¹ pomocí dvou dal¹ích hùlek.
</p>

<h3>Jo-jo</h3>
<p>
<?=img("nacinii.png","Jo-jo");?>
Cívka uvázaná na provázku.
</p>

<h3><a href="/literatura.html#poi" title="Kní¾ka o toèení s poi.">Poi-poi</a></h3>
<p>
<?=img("nacinik.png","Poi-poi");?>
Míèek pøivázaný na provázku (+- 0,5m). Na druhém konci provázku je smyèka pro dr¾ení. Do ka¾dé ruky si vezme¹ jednu poiku a toèí¹ s nimi okolo sebe. Ucelený popis najde¹ v <a href="/literatura.html#poi" title="Podrobnosti o toèení.">Richeeho kní¾ce</a>.
</p>

<h3>Tenisové rakety</h3>
<p>
<?=img("nacinil.png","Tenisová raketa");?>
Létají skoro stejnì jako ku¾ely. Jen jsou trochu vìt¹í.
</p>

<h3>Crystal ball</h3>
<p>
<?=img("nacinim.png","Crystal ball");?>
Vìt¹í míèek z umìlé hmoty (polyakrylát ?). Vypadá jako sklenìný. Pou¾ívá se na kontaktní ¾onglování - nehází se sním, ale kutálí se po rukou a jiných èástech tìla.
</p>

<h3>Tyè</h3>
<p>
<?=img("nacinij.png","Tyè");?>
Dal¹í pøedmìt pro kontaktní ¾onglování. Obvykle s knoty na koncích k zapálení.
</p>

<a name="cigarbox"><h3>Cigar boxy</h3></a>
<p>
<?=img("nacinio.png","Cigar boxy");?>
Cigar boxy jsou døevìné krabièky. Dvì krajní dr¾í¹ rukou a tøetí mezi nimy pøehazuje¹. Vzniká pøi tom skoro stejný hluk jako pøi ¾onglování se <a href="#bounce" title="Odrá¾ení míèkù o podlahu.">skákacími míèky</a>.
</p>

<h3>©átky</h3>
<p>
<?=img("nacinin.png","©átky");?>
Údajnì sna¾¹í ne¾ míèky. Doporuèované pro úplné zaèáteèníky.
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
