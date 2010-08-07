<h3>Petr Kletečka</h3>
<p>{obrazek soubor="pek.jpg" popisek="Petr Kletečka"}</p>
<h3>Zeptej se na cokoliv</h3>
<p>
{assign var='mail' value='admin@zonglovani.info'}
Elektronická pošta: {$mail|mailobfuscate}
</p>
<p>
{assign var='tel' value='+420 732 766 740'}
Telefon: {$tel|telobfuscate}
</p>
<p>Lepší je použít elektronickou poštu. Přece jen telefon nemám pořád u sebe a zapnutý.</p>

<h3>Sháníš žongléry?</h3>
<p>Koukni do <a href="{$smarty.const.LIDE_URL}" title="Seznam uživatelů žonglérova slabikáře.">seznamu žonglérů</a>. Jsou tam lidé, kteří umí:</p>
<ul>
<li><a href="{$smarty.const.LIDE_URL}dovednost/show.html" title="Žongléři kteří umí veřejně vystupovat.">Žonglérské vystoupení</a></li>
<li><a href="{$smarty.const.LIDE_URL}dovednost/workshop.html" title="Žongléři kteří tě naučí žonglovat.">Naučit žonglovat</a></li>
<li><a href="{$smarty.const.LIDE_URL}dovednost/manufactory.html" title="Žongléři kteří výrábějí žonglérské hračky.">Vyrábět žonglérské hračky</a></li>
<li><a href="{$smarty.const.LIDE_URL}dovednost/shop.html" title="Žongléři kteří prodávají věci na žonglování.">Prodej věcí na žonglování</a></li>
</ul>
