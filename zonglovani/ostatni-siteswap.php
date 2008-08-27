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
<? echo img("siteswapa.png","Z�kladn� druhy hod�."); ?>
Z�pis �onglov�n� pomoc� ��sel.
</p>

<h3>Z�kladn� pravidla</h3>
<p>
<ul>
<li>��sla ozna�uj� jak vysoko a kterou rukou h�z�.</li>
<li>Ruce se p�i h�zen� st��daj�.</li>
<li>Posloupnost ��sel se opakuje dokola.</li>
</ul>

</p>

<h3>0, 1 a 2</h3>
<p>
0 znamen� pauzu - v ruce nem� m��ek. 1 zna�� hod rovn� nap��� a 2 je podobn� 0, pauza. Rozd�l je v tom, �e 0 je pauza bez m��ku, 2 je pauza s m��kem, dr�en�.
</p>


<h3>3</h3>
<p>
Nejednodu�� siteswap zap�eme ��slem 3. Za�ni pravou rukou a opakuj dokola.
</p>

<pre>
P = prav� ruka  L = lev� ruka

    P L P L P L P L P L P L ...
    3 3 3 3 3 3 3 3 3 3 3 3 ...
</pre>

<p>
<a href="/zonglovani/micky/3/kaskada.html" title="Z�kladn� trik se t�emi m��ky."><? echo img("kaskadaa.png",""); ?></a>
Prav� ruka h�z� m��ek tak jako kdy� �ongluje� se t�emi m��ky (docela n�zko, z jedn� ruky do druh�). Levou rukou hod� stejn� hod. Potom prav�, pak lev�...</p>

<p>
Trojka znamen�, <a href="/zonglovani/micky/3/kaskada.html" title="Z�kladn� trik se t�emi m��ky.">kask�du se 3 m��ky</a>.
</p>

<h3>4</h3>
<p>
Dal�� jednoduch� p��klad: <a href="/zonglovani/micky/4/fontana.html" title="Z�kladn� trik se �ty�mi m��ky.">font�na se �ty�mi m��ky</a> se zap�e jako 4.
</p>
<pre>
    P L P L P L P L P L P L ...
    4 4 4 4 4 4 4 4 4 4 4 4 ...
</pre>
<p>
<a href="/zonglovani/micky/4/fontana.html" title="Z�kladn� trik se �ty�mi m��ky."><? echo img("fontanaa.png",""); ?></a>
�ty�i m��ky mus� h�ze jako asynchronn� font�nu. V siteswaps v�echny sud� ��sla z�st�vaj� ve stejn� ruce, lich� zna�� hody do druh� ruky.
</p>

<h3>5, 6, ...</h3>
<p>
<a href="/zonglovani/micky/6/" title="Trik se �esti m��ky."><? echo img("micky-6-fontanaa.png",""); ?></a>
V�echny z�kladn� triky se zapisuj� jedn�m ��slem (5 je <a href="/zonglovani/micky/5/kaskada.html" title="Trik s p�ti m��ky.">kask�da s p�ti</a> m��ky, 8 je font�na s osmi m��ky, atd.).
</p>

<h3>555000</h3>
<p>
<a href="/zonglovani/micky/3/blesk.html" title="blesk"><? echo img("bleskc.png",""); ?></a>
Trik se t�emi m��ky. Prvn� t�i hody jsou jako p�i <a href="/zonglovani/micky/5/kaskada.html" title="Trik s p�ti m��ky.">kask�d� s p�ti</a> m��ky. Pak n�sleduj� dv� pauzy bez m��ku (0).
</p>

<pre>
    P L P L P L P L P L P L ...
    5 5 5 0 0 5 5 5 0 0 5 5 ...
</pre>

<p>
V�t�ina �ongl�r� zn� tento trik pod n�zvem <a href="/zonglovani/micky/3/blesk.html" title="blesk">blesk</a>.
</p>

<h3>53</h3>
<p>
<a href="/zonglovani/micky/4/sprcha-polovicni.html" title="Trik se �ty�mi m��ky."><? echo img("p4sprchac.png",""); ?></a>
Trik se �ty�mi m��ky. Z prav� ruky h�z� 5, z lev� 3.
</p>

<pre>
    P L P L P L P L P L P L ...
    5 3 5 3 5 3 5 3 5 3 5 3 ...
</pre>

<p>
Trik se jmenuje <a href="/zonglovani/micky/4/sprcha-polovicni.html" title="Trik se �ty�mi m��ky.">polovi�n� sprcha se �ty�mi m��ky</a>.
</p>

<h3>Jak pozn�m s kolika m��ky se �ongluje&nbsp;53?</h3>

<p>
Se�te� v�echny ��sla v posloupnosti a vyd�l� je d�lkou posloupnosti. 5+3=8 8/2=4 a tak jde o trik se �ty�mi m��ky. Jestli�e nevyjde cel� ��slo pak je siteswap �patn�.
</p>

<h3>Co nejde pomoc� siteswaps zapsat?</h3>
<p>
Siteswaps nerozli�uje mezi <a href="/zonglovani/micky/3/mm.html" title="T쾹� trik se t�emi m��ky.">mills' mess</a> a <a href="/zonglovani/micky/3/kaskada.html" title="Z�kladn� trik se t�emi m��ky.">kask�dou</a> (nap��klad). Proto�e se nestar� o pohyb rukou, ale o h�zen� m��k�.
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
