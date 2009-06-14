<?php
require('init.php');

$smarty->assign("titulek","Zm�ny v �ongl�rov� slabik��i");

$smarty->display('hlavicka.tpl');

?>

<p>
�ongl�r�v slabik�� pou��v� <a href="http://subversion.tygris.org" title="Str�nky projektu Subversion (anglicky)." class="external" onclick="pageTracker._trackPageview('/goto/svn.tygris.org');">syst�m spr�vy verz�</a>. Na t�to str�nce najde� v�pis p��kazu "<code>svn log</code>".
</p>

<p>
Jednotliv� revize jsou odd�len� ��dkem m�nus�. Na dal��m ��dku je postupn�: ��slo revize, autor zm�ny, datum a po�et ��dk� popisuj�c�ch zm�nu. Pak n�sleduje pr�zdn� ��dek a vlastn� popis zm�ny.
</p>

<pre><?
if(is_readable("ChangeLog")){
include("ChangeLog");};?>
</pre>
<h3>Zm�ny ve star��m ulo�i�ti svn</h3>
<pre><?
include(".ChangeLog.old");?>
</pre>

<h3>Star�� zm�ny</h3>
<p>
<ul>
<li>jaro 2005 - <a href="/proc-a-jak.html" title="Pro� a jak vznikl �ongl�r�v slabik��">prvn� verze</a> �ongl�rova slabik��e</li>
</ul>
</p>
<?php
$smarty->display('paticka.tpl');
?>
