<?php
require("hlavicka.inc");
$title="V�roba kruh�";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">
<div id="ramecek">



<div id="obsah">
<h1>V�roba kruh�</h1>

<h3>Kruh z pap�ru</h3>

<p>
K v�rob� bude� pot�ebovat kartonovou krabici, lepic� p�sku a n��ky. Vyrobit jeden kruh trv� asi 15 minut.
</p>

<p>
<? echo img("/zonglovani/img/kruhy-vyrobaa.png",""); ?>
Krabici rozlo� a p�edkresli si obrys kruhu. Vn�j�� pr�m�r je 30 cm, vnit�n� 25 cm.
</p>


<p>
<? echo img("/zonglovani/img/kruhy-vyrobab.png",""); ?>
Dva vyst�i�en� kruhy p�ilo� k sob� a oto� je o 90�. Tak aby, dr�ky v kartonu byly kolmo na sebe. Te� u� sta�� jen cel� kruh omotat lep�c� p�skou.
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
