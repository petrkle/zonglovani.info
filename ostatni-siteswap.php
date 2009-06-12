<?php
require("hlavicka.inc");
$title="Siteswap";
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
<? echo img("siteswapa.png","Základní druhy hodù."); ?>
Zápis ¾onglování pomocí èísel. Jsou to vlastnì takové noty pro ¾onglování. Siteswap vymysleli ¾ongléøi, aby s jejich pomocí <strong>na¹li nové triky</strong>.
</p>
<h3>Vıhody</h3>
<p>
<ul>
<li>Snadné a pøesné pojmenování triku.</li>
<li>Usnadnìní komunikace mezi ¾ongléry.</li>
<li>Platí pro míèky, kruhy i ku¾ely.</li>
<li>Existují <a href="/software.html" title="Simulátory ¾onglování">poèítaèové programy</a> do kterıch napí¹e¹ èíslo a hned uvidí¹ jak trik vypadá.</li>
</ul>
</p>

<h3>Základní pravidla</h3>
<p>
<ul>
<li>Èísla oznaèují jak vysoko a kterou rukou hází¹.</li>
<li>Ruce se pøi házení støídají.</li>
<li>Posloupnost èísel se opakuje dokola.</li>
</ul>
</p>

<h3>0, 1 a 2</h3>
<p>
0 znamená pauzu - v ruce nemá¹ míèek. 1 znaèí hod rovnì napøíè a 2 je podobná 0, pauza. Rozdíl je v tom, ¾e 0 je pauza bez míèku, 2 je pauza s míèkem, dr¾ení.
</p>


<h3>3</h3>
<p>
Nejednodu¹í siteswap zapí¹eme èíslem 3. Zaèni pravou rukou a opakuj dokola.
</p>

<pre>
P = pravá ruka  L = levá ruka

    P L P L P L P L P L P L ...
    3 3 3 3 3 3 3 3 3 3 3 3 ...
</pre>

<p>
<a href="/micky/3/kaskada.html" title="Základní trik se tøemi míèky."><? echo img("kaskadaa.png",""); ?></a>
Pravá ruka hází míèek tak jako kdy¾ ¾ongluje¹ se tøemi míèky (docela nízko, z jedné ruky do druhé). Levou rukou hodí¹ stejnı hod. Potom pravá, pak levá...</p>

<p>
Trojka znamená, <a href="/micky/3/kaskada.html" title="Základní trik se tøemi míèky.">kaskádu se 3 míèky</a>.
</p>

<h3>4</h3>
<p>
Dal¹í jednoduchı pøíklad: <a href="/micky/4/fontana.html" title="Základní trik se ètyømi míèky.">fontána se ètyømi míèky</a> se zapí¹e jako 4.
</p>
<pre>
    P L P L P L P L P L P L ...
    4 4 4 4 4 4 4 4 4 4 4 4 ...
</pre>
<p>
<a href="/micky/4/fontana.html" title="Základní trik se ètyømi míèky."><? echo img("fontanaa.png",""); ?></a>
Ètyøi míèky musí¹ háze jako asynchronní fontánu. V siteswap v¹echny sudá èísla zùstávají ve stejné ruce, lichá znaèí hody do druhé ruky.
</p>

<h3>5, 6, ...</h3>
<p>
<a href="/micky/6/" title="Trik se ¹esti míèky."><? echo img("micky-6-fontanaa.png",""); ?></a>
V¹echny základní triky se zapisují jedním èíslem (5 je <a href="/micky/5/kaskada.html" title="Trik s pìti míèky.">kaskáda s pìti</a> míèky, 8 je fontána s osmi míèky, atd.).
</p>

<h3>555000</h3>
<p>
<a href="/micky/3/blesk.html" title="blesk"><? echo img("bleskc.png",""); ?></a>
Trik se tøemi míèky. První tøi hody jsou jako pøi <a href="/micky/5/kaskada.html" title="Trik s pìti míèky.">kaskádì s pìti</a> míèky. Pak následují dvì pauzy bez míèku (0).
</p>

<pre>
    P L P L P L P L P L P L ...
    5 5 5 0 0 5 5 5 0 0 5 5 ...
</pre>

<p>
Vìt¹ina ¾onglérù zná tento trik pod názvem <a href="/micky/3/blesk.html" title="blesk">blesk</a>.
</p>

<h3>53</h3>
<p>
<a href="/micky/4/sprcha-polovicni.html" title="Trik se ètyømi míèky."><? echo img("p4sprchac.png",""); ?></a>
Trik se ètyømi míèky. Z pravé ruky hází¹ 5, z levé 3.
</p>

<pre>
    P L P L P L P L P L P L ...
    5 3 5 3 5 3 5 3 5 3 5 3 ...
</pre>

<p>
Trik se jmenuje <a href="/micky/4/sprcha-polovicni.html" title="Trik se ètyømi míèky.">polovièní sprcha se ètyømi míèky</a>.
</p>

<h3>Jak poznám s kolika míèky se ¾ongluje&nbsp;53?</h3>

<p>
Seète¹ v¹echny èísla v posloupnosti a vydìlí¹ je délkou posloupnosti. 5+3=8 8/2=4 a tak jde o trik se ètyømi míèky. Jestli¾e nevyjde celé èíslo pak je siteswap ¹patnı.
</p>

<h3>Zápis slo¾itìj¹ích trikù</h3>
<p>
Vyhození dvou míèkù najednou - synchronní hody se znaèí dvìma èísly v závorce. Souèasné vyhození dvou míèkù rovnì nahoru oznaèí¹ jako:
<pre class="vyrazne">
[4,4]
</pre>
</p>

<p>
Pøipojení písmene "x" za èíslo znamená hod øí¾em.
<pre class="vyrazne">
[4,2x][2x,4]
</pre>
</p>

<p>
Pokud je trik symetrickı, mù¾e se zápis zkrátit a oznaèit hvìzdièkou
<pre class="vyrazne">
[4,2x]<sup>*</sup>
</pre>
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
