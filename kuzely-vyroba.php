<?php
require("hlavicka.inc");
$title="V�roba ku�el�";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">
<div id="ramecek">



<div id="obsah">
<h1>V�roba ku�el�</h1>

<h3>Ku�el z novin</h3>

<p>
K v�rob� bude� pot�ebovat noviny, lepic� p�sku a n��. Vyrobit jeden ku�el trv� asi 15 minut.
</p>

<p>
<? echo img("kuzely-vyrobaa.png",""); ?>
Poskl�dej na sebe 25 novinov�ch dvojstran. Pravou polovinu str�nky p�ehni v polovin� a od��zni no�em. �tvercov� listy sroluj a omotej lepic� p�skou.
</p>


<p>
<? echo img("kuzely-vyrobab.png",""); ?>
Pruhy novin kter� ti zbyly z p�edchoz�ho kroku omotej kolem dr�adla. Asi 4-5 cm od konce. V�e op�t zajisti lepic� p�skou.
</p>


<p>
<? echo img("kuzely-vyrobac.png",""); ?>
Vezmi dal��ch 10 str�nek novin a roz��zni je na �tvrtiny.
</p>


<p>
<? echo img("kuzely-vyrobad.png",""); ?>
V�echny pruhy dej na sebe, omotej kolem p�edchoz� vrstvy a zajisti lepic� p�skou. 
</p>

<p>
<? echo img("kuzely-vyrobae.png",""); ?>
Na z�v�r m��e� ku�el vylep�it barevnou lepic� p�skou.
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
